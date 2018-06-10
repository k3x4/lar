<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use DB;
use App\Libraries\Category as CategoryTools;
use App\Libraries\Tools;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return view('admin.categories.index');
    }

    public function data()
    {
        $categories = Category::whereNull('category_id')->get();
        $categories = CategoryTools::makeTree($categories);
        $categories = collect($categories);

        return Datatables::of($categories)
            ->addColumn('action', function ($category) {
                $html  = '<div class="dtable-td-wrapper">';
                $html .= \Form::checkbox('action', $category->id, false, ['class' => 'select']);
                $html .= '</div>';
                return $html;
            })
            ->editColumn('title', '{!! Html::link(route("admin.categories.edit", [$id]), $title) !!}')
            ->editColumn('description', '{{ strip_tags($description) }}')
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
        $categories = CategoryTools::makeOptions($categories);

        return view('admin.categories.create', compact('categories'));
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
            'title' => 'required'
        ]);
        
        if($request->input('slug')){
            $slug = Tools::slug($request->input('slug'));
        } else {
            $slug = Tools::slug($request->input('title'));
        }

        $fillable = [
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'slug' => $slug,
            'description' => $request->input('description'),
        ];
        
        $category = Category::create($fillable);

        return redirect()->route('admin.categories.index')
                        ->with('success','Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        $categories = Category::whereNull('category_id')->get();
        $categories = CategoryTools::makeOptions($categories);

        return view('admin.categories.edit',compact('category', 'categories'));
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
            'title' => 'required'
        ]);

        $category = Category::find($id);

        if($request->input('slug')){
            $slug = Tools::slug($request->input('slug'));
        } else {
            $slug = Tools::slug($request->input('title'));
        }
        
        $fillable = [
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'slug' => $slug,
            'description' => $request->input('description'),
        ];
        
        $category->update($fillable);

        return redirect()->route('admin.categories.index')
                        ->with('success','Category updated successfully');
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
        Category::destroy($ids);
        return redirect()->route('admin.categories.index')
                        ->with('success','Categories deleted successfully');
    }

}
