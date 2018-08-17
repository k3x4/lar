<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use App\Feature;
use App\FeatureGroup;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $featureGroups = FeatureGroup::all()->pluck('title', 'id')->toArray();
        return view('admin.features.index', compact('featureGroups'));
    }

    public function data(Request $request)
    {
        $query = Feature::query();

        if($request->filled('feature_group')){
            $query = $query->where('feature_group_id', $request->feature_group);
        }

        if($request->filled('status')){
            $query = $query->where('status', $request->status);
        }

        return Datatables::of($query)
            ->addColumn('action', 'datatables.action')
            ->editColumn('title', 'datatables.feature.edit')
            ->addColumn('feature_group', 'datatables.feature.feature_group')
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
        $featureGroups = FeatureGroup::all()->pluck('title', 'id')->toArray();
        return view('admin.features.create', compact('featureGroups'));
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
            'feature_group_id' => 'required',
        ]);
        
        Feature::create($request->all());

        return redirect()->route('admin.features.index')
                        ->with('success','Feature created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feature = Feature::find($id);
        return view('admin.features.show', compact('feature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feature = Feature::find($id);
        $featureGroups = FeatureGroup::all()->pluck('title', 'id')->toArray();

        return view('admin.features.edit', compact('feature', 'featureGroups'));
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
            'feature_group_id' => 'required',
        ]);

        $feature = Feature::find($id);
        $feature->update($request->all());

        return redirect()->route('admin.features.index')
                        ->with('success','Feature updated successfully');
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
        Feature::destroy($ids);
        return redirect()->route('admin.features.index')
                        ->with('success','Features deleted successfully');
    }

}
