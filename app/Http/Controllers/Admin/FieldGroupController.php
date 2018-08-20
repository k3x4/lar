<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\FieldGroup;
use Yajra\Datatables\Datatables;

class FieldGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return view('admin.fieldgroups.index');
    }

    public function data()
    {
        return Datatables::of(FieldGroup::query())
            ->addColumn('action', 'datatables.action')
            ->editColumn('title', 'datatables.fieldgroups.edit')
            ->editColumn('created_at', 'datatables.created_at')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fieldGroups = FieldGroup::all();

        $parentCategories = Category::whereNull('category_id')->get();
        $categoriesTable = [];
        
        foreach($parentCategories as $parentCategory){
            $categoriesTable[$parentCategory->title] = $parentCategory->childs()->get();
        }

        return view('admin.fieldgroups.create', compact('fieldGroups', 'categoriesTable'));
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
        ]);
        
        $fieldGroup = new FieldGroup();
        $fieldGroup->title = $request->input('title');
        $fieldGroup->save();

        $fieldGroup->categories()->sync($request->input('categories'));

        return redirect()->route('admin.fieldgroups.index')
                        ->with('success','Field group created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fieldGroup = FieldGroup::find($id);
        return view('admin.fieldgroups.show', compact('fieldGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fieldGroup = FieldGroup::find($id);

        $parentCategories = Category::whereNull('category_id')->get();
        $categoriesTable = [];
        
        foreach($parentCategories as $parentCategory){
            $categoriesTable[$parentCategory->title] = $parentCategory->childs()->get();
        }

        $attachCategories = $fieldGroup->categories()->get()->pluck('id')->toArray();

        // $attachCategories = DB::table("category_field_group")->where("field_group_id", $id)
        //     ->pluck('category_id')->toArray();

        return view('admin.fieldgroups.edit', compact('fieldGroup', 'categoriesTable', 'attachCategories'));
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

        $fieldGroup = FieldGroup::find($id);   
        $fieldGroup->update($request->all());

        $fieldGroup->categories()->sync($request->input('categories'));

        return redirect()->route('admin.fieldgroups.index')
                        ->with('success','Field group updated successfully');
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
        FieldGroup::destroy($ids);
        return redirect()->route('admin.fieldgroups.index')
                        ->with('success','Field groups deleted successfully');
    }

}
