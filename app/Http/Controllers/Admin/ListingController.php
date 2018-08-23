<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use App\Listing;
use App\ListingMeta;
use App\Field;
use App\Category;
use App\Media;
use DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Libraries\Category as CategoryTools;
use App\Libraries\Tools;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::whereNull('category_id')->get();
        $categories = CategoryTools::makeOptionGroup($categories);

        return view('admin.listings.index', compact('categories'));
    }

    public function indexByAuthor(Request $request)
    {
        $categories = Category::whereNull('category_id')->get();
        $categories = CategoryTools::makeOptionGroup($categories);

        $author = $request->id;

        return view('admin.listings.index_author', compact('categories', 'author'));
    }

    public function data(Request $request)
    {
        $query = Listing::query();

        if($request->filled('category')){
            $query = $query->where('category_id', $request->category);
        }

        if($request->filled('status')){
            $query = $query->where('status', $request->status);
        }

        if($request->filled('author')){
            $query = $query->where('author_id', $request->author);
        }

        return Datatables::of($query)
            ->addColumn('action', 'datatables.action')
            ->addColumn('thumb', 'datatables.thumb')
            ->editColumn('title', 'datatables.listing.edit')
            ->addColumn('category', 'datatables.listing.category')
            ->addColumn('author', 'datatables.listing.author')
            ->editColumn('created_at', 'datatables.created_at')
            ->make(true);
    }

    public function fields(Request $request)
    {
        $category = $request->get('category');
        $category = Category::find($category);

        $listingId = $request->get('listing_id');
        
        $fieldGroups = $category->fieldGroups()->get()->pluck('id')->toArray();

        $fields = DB::table('fields')
            ->select('fields.*', 'field_listing.value')
            ->leftJoin('field_listing', 'field_listing.field_id', '=', 'fields.id')
            ->where('field_listing.listing_id', $listingId)
            ->whereIn('fields.field_group_id', $fieldGroups)
            ->get();

        // if($request->get('listing_id')){
        //     $listingId = $request->get('listing_id');
        //     $listingFields = Listing::find($listingId)->fields()->pluck('value', 'field_id')->toArray();
        //     if($listingFields){
        //         $fields = $fields->map(function ($item, $key) use ($listingFields) {
        //             $item->value = $listingFields[$item->id];
        //             return $item;
        //         });
        //     }
        // }

        if($fields){
            return view('admin.fields.show', compact('fields'));
        } else {
            return '';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('category_id')->get();
        $categories = CategoryTools::makeOptionGroup($categories);

        //$category = Category::find($listing->category_id);
        //$fieldGroups = $category->fieldGroups()->get();

        // $fields = $listing->fields()->get();//->pluck('field_id')->all();
        // $fields = $fields->map(function ($item, $key) {
        //     $item->options = unserialize(Field::find($item->id)->options);
        //     return $item;
        // });

        // $category = Category::find('2');
        // $fields = $category->fields()->get();

        return view('admin.listings.create', compact('categories'));//, 'fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
        ]);
        
        //$product = Product::create($request->except('feature_image'));

        $slug = $request->input('slug');

        if($slug){
            $slug = Tools::slug($request->input('slug'));
        } else {
            $slug = Tools::slug($request->input('title'));
        }

        $author_id = 1;
        if (Auth::check()){
            $author_id = Auth::user()->id;
        }
        
        $listing = new Listing();
        $listing->category_id = $request->input('category_id');
        $listing->author_id = $author_id;
        $listing->image_id = $request->input('featuredImage');
        $listing->title = $request->input('title');
        $listing->slug = $slug;
        $listing->content = $request->input('content');
        $listing->status = $request->input('status');
        $listing->save();

        $gallery = $request->input('gallery');
        if($gallery){
            $gallery = explode(',', $gallery);
            $meta = $listing->meta()->create(['meta_key' => 'gallery', 'meta_value' => serialize($gallery)]);
            $gallery = array_map('intval', $gallery);
        } else {
            $gallery = [];
        }

        if($request->input('featuredImage')){
            $gallery[] = intval($request->input('featuredImage'));
        }

        $listing->media()->sync($gallery);

        if($request->input('fields')){
            $fields = $request->input('fields');
            array_walk($fields, [$this, 'fieldsValues']);
            $listing->fields()->sync($fields);
        }

        // $listing->meta()->create([
        //     'meta_key' => 'gallery',
        //     'meta_value' => serialize(['a' => 1833, 'b' => 1834])
        // ]);

        // $variant = $item->variants()->where('text', $result->variant)->update(['price' => $price]);

        return redirect()->route('admin.listings.index')
                        ->with('success','Listing created successfully');
    }

    private function fieldsValues(&$value, $key){
        $value = ['value' => $value];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::find($id);
        return view('admin.listings.show', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);

        $categories = Category::whereNull('category_id')->get();
        $categories = CategoryTools::makeOptionGroup($categories);

        $featuredImage = Media::find($listing->image_id);

        $gallery = $listing->meta()->where('meta_key', 'gallery')->first();
        if($gallery){
            $galleryIds = unserialize($gallery->meta_value);
            $gallery = Media::getUnsorted($galleryIds);
        }

        $category = Category::find($listing->category_id);
        //$fieldGroups = $category->fieldGroups()->get();
        $featureGroups = $category->featureGroups()->get();
        //dd($featureGroups);

        // $fields = $listing->fields()->get();//->pluck('field_id')->all();
        // $fields = $fields->map(function ($item, $key) {
        //     $item->options = unserialize(Field::find($item->id)->options);
        //     return $item;
        // });

        //dd($fields);
        $features = $listing->features()->pluck('feature_id')->toArray();

        return view('admin.listings.edit', compact(
            'listing',
            'categories',
            'featuredImage',
            'gallery',
            //'fieldGroups',
            'featureGroups',
            //'fields',
            'features'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
        ]);

        $listing = Listing::find($id);
        $slug = $listing->slug;

        if($request->input('slug')){
            if($slug != $request->input('slug')){
                $slug = Tools::slug($request->input('slug'));
            }
        } else {
            $slug = Tools::slug($request->input('title'));
        }

        $fillable = [
            'title' => $request->input('title'),
            'slug' => $slug,
            'category_id' => $request->input('category_id'),
            'image_id' => $request->input('featuredImage') ?: NULL,
            'content' => $request->input('content'),
            'status' => $request->input('status'),
        ];

        $listing->update($fillable);

        $gallery = $request->input('gallery');
        if($gallery){
            $gallery = explode(',', $gallery);
            $meta = $listing->meta()->updateOrCreate(['meta_key' => 'gallery'], ['meta_value' => serialize($gallery)]);
            $gallery = array_map('intval', $gallery);
        } else {
            $gallery = [];
        }

        if($request->input('featuredImage')){
            $gallery[] = intval($request->input('featuredImage'));
        }

        $listing->media()->sync($gallery);

        if($request->input('fields')){
            $fields = $request->input('fields');
            array_walk($fields, [$this, 'fieldsValues']);
            $listing->fields()->sync($fields);
        }

        $features = $request->input('features');
        if($features){
            $listing->features()->sync($features);
        }

        return redirect()->route('admin.listings.index')
                        ->with('success','Listing updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $ids = explode(',', $request->input('ids'));
        Listing::destroy($ids);
        return redirect()->route('admin.listings.index')
                        ->with('success','Listings deleted successfully');
    }

}
