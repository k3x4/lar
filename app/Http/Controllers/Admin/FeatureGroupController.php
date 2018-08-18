<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\FeatureGroup;
use Yajra\Datatables\Datatables;

class FeatureGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return view('admin.featuregroups.index');
    }

    public function data()
    {
        return Datatables::of(FeatureGroup::query())
            ->addColumn('action', 'datatables.action')
            ->editColumn('title', 'datatables.featuregroups.edit')
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
        $featureGroups = FeatureGroup::all();

        $parentCategories = Category::whereNull('category_id')->get();
        $categoriesTable = [];
        
        foreach($parentCategories as $parentCategory){
            $categoriesTable[$parentCategory->title] = $parentCategory->childs()->get();
        }

        return view('admin.featuregroups.create', compact('featureGroups', 'categoriesTable'));
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
        
        $featureGroup = new FeatureGroup();
        $featureGroup->title = $request->input('title');
        $featureGroup->save();

        $featureGroup->categories()->sync($request->input('categories'));

        return redirect()->route('admin.featuregroups.index')
                        ->with('success','Feature group created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $featureGroup = FeatureGroup::find($id);
        return view('admin.featuregroups.show', compact('featureGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $featureGroup = FeatureGroup::find($id);

        $parentCategories = Category::whereNull('category_id')->get();
        $categoriesTable = [];
        
        foreach($parentCategories as $parentCategory){
            $categoriesTable[$parentCategory->title] = $parentCategory->childs()->get();
        }

        $attachCategories = $featureGroup->categories()->get()->pluck('id')->toArray();

        // $attachCategories = DB::table("category_feature_group")->where("feature_group_id", $id)
        //     ->pluck('category_id')->toArray();

        return view('admin.featuregroups.edit', compact('featureGroup', 'categoriesTable', 'attachCategories'));
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

        $featureGroup = FeatureGroup::find($id);   
        $featureGroup->update($request->all());

        $featureGroup->categories()->sync($request->input('categories'));

        return redirect()->route('admin.featuregroups.index')
                        ->with('success','Feature group updated successfully');
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
        FeatureGroup::destroy($ids);
        return redirect()->route('admin.featuregroups.index')
                        ->with('success','Feature groups deleted successfully');
    }

}
