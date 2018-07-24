<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Listing;
use App\ListingMeta;
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
        return view('admin.listings.index');
    }

    public function data()
    {
        $listings = Listing::all();
        return Datatables::of($listings)
            ->addColumn('action', function ($listing) {
                $html  = '<div class="dtable-td-wrapper">';
                $html .= \Form::checkbox('action', $listing->id, false, ['class' => 'select']);
                $html .= '</div>';
                return $html;
            })
            ->addColumn('thumb', function ($listing) {
                $media = Media::find($listing->image_id);
                $html  = '<div class="dtable-td-wrapper">';
                if($media):
                    $html .= \Html::tag('span', '', ['class' => 'dtable-helper']);
                    $html .= \Html::image('/uploads/' . $media->get('mini'));
                endif;    
                $html .= '</div>';
                return $html;
            })
            ->editColumn('title', '{!! Html::link(route("admin.listings.edit", [$id]), $title) !!}')
            //->editColumn('content', '{{ strip_tags($content) }}')
            ->addColumn('category', function ($listing) {
                if($listing->category){
                    return $listing->category->title;
                } else {
                    return '<span style="color:red;">Without category</span>';
                }
            })
            ->editColumn('created_at', '{{ date("d/m/Y H:i", strtotime($created_at)) }}')
            ->make(true);
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

        return view('admin.listings.create', compact('categories'));
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
        
        $listing = new Listing();
        $listing->category_id = $request->input('category_id');
        $listing->image_id = $request->input('featuredImage');
        $listing->title = $request->input('title');
        $listing->slug = $slug;
        $listing->content = $request->input('content');
        $listing->status = $request->input('status');
        $listing->save();

        // $listing->meta()->create([
        //     'meta_key' => 'gallery',
        //     'meta_value' => serialize(['a' => 1833, 'b' => 1834])
        // ]);

        // $variant = $item->variants()->where('text', $result->variant)->update(['price' => $price]);

        return redirect()->route('admin.listings.index')
                        ->with('success','Listing created successfully');
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
        $featuredImage = $featuredImage ? $featuredImage->filename : NULL;

        $gallery = $listing->meta()->where('meta_key', 'gallery')->first();
        $gallery = $gallery ? unserialize($gallery->meta_value) : null;
        $gallery = $gallery ? Media::find($gallery) : null;

        return view('admin.listings.edit', compact('listing', 'categories', 'featuredImage', 'gallery'));
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
        
        $data = $request->all();
        if(!$data['slug']){
            $data['slug'] = Tools::slug($data['title']);
        }

        $listing->update($data);
        $listing->image_id = $request->input('featuredImage') ?: NULL;
        $listing->save();
        //$listing->featuredImage()->sync($request->input('featuredImage'));

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
