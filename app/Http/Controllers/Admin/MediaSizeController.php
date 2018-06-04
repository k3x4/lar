<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MediaSize;
use Yajra\Datatables\Datatables;

class MediaSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$mediaSizes = MediaSize::orderBy('id', 'ASC')->get();
        //return view('admin.mediasizes', compact('mediaSizes'));

        return view('admin.mediasizes.index');
        // return Datatables::of(User::all())->make(true);
    }

    public function data()
    {
        return Datatables::of(MediaSize::all())
            ->editColumn('tag', '<a href="{{ route(\'admin.mediasizes.edit\', $id) }}">{{ $tag }}</a>')
            ->editColumn('crop', '{{ $crop ? "yes" : "no" }}')
            ->editColumn('enabled', '{{ $enabled ? "yes" : "no" }}')
            ->addColumn('action', function($media_size){
                if(!in_array($media_size->id, [1, 2, 3, 4])){
                    return '<input type="checkbox" class="select" value="' . $media_size->id . '" />';
                }
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mediasizes.create');
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
            'tag' => 'required',
            'width' => 'required|integer',
            'height' => 'required|integer',
            'crop' => 'boolean',
            'crop_position' => 'required|string',
            'enabled' => 'boolean'
        ]);

        MediaSize::create($request->all());

        return redirect()->route('admin.mediasizes.index')
                        ->with('success','Media size created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mediaSize = MediaSize::find($id);
        return view('admin.mediasizes.show',compact('mediaSize'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mediaSize = MediaSize::find($id);
        return view('admin.mediasizes.edit',compact('mediaSize'));
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
            'tag' => 'required',
            'width' => 'required|integer',
            'height' => 'required|integer',
            'crop' => 'boolean',
            'crop_position' => 'required|string',
            'enabled' => 'boolean'
        ]);

        MediaSize::find($id)->update($request->all());

        return redirect()->route('admin.mediasizes.index')
                        ->with('success','Media size updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function destroy($id)
    {
        MediaSize::find($id)->delete();
        return redirect()->route('admin.mediasizes')
                        ->with('success','Media size deleted successfully');
    }
    */
    public function destroy(Request $request)
    {
        $ids = explode(',', $request->input('ids'));
        MediaSize::destroy($ids);
        return redirect()->route('admin.mediasizes.index')
                        ->with('success','Media sizes deleted successfully');
    }
}
