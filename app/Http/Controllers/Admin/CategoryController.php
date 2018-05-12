<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        
        $categories = DB::table('categories')
            ->leftJoin('categories as cat', 'categories.parent_id', '=', 'cat.id')
            ->select('categories.*', 'cat.display_name as parent_display_name')
            ->orderBy('id', 'DESC')
            ->paginate(5);
            //->get();
        
        //$categories = Category::orderBy('id', 'DESC')->paginate(5);
        return view('admin.categories.index', compact('categories'))
                        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'display_name' => 'required'
        ]);
        
        $categoryName = slug($request->input('display_name'));
        
        $fillable = [
            'parent_id' => $request->input('parent_id'),
            'name' => $categoryName,
            'display_name' => $request->input('display_name'),
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
        
        $categories = DB::table('categories')
            ->select('id', 'display_name')
            ->where('id', '!=', $id)    
            ->pluck('display_name', 'id')
            ->toArray();

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
            'display_name' => 'required'
        ]);

        $category = Category::find($id);
        $categoryName = slug($request->input('display_name'));
        
        $fillable = [
            'parent_id' => $request->input('parent_id'),
            'name' => $categoryName,
            'display_name' => $request->input('display_name'),
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
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('admin.categories.index')
                        ->with('success','Category deleted successfully');
    }
}
