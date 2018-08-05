<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use App\Media;
use App\Libraries\Media as MediaLibrary;
use Yajra\Datatables\Datatables;

class MediaController extends Controller
{

    public function index(Request $request)
    {
        return view('admin.media.index');
    }

    public function data()
    {
        return Datatables::of(Media::query())
            ->addColumn('action', 'datatables.action')
            ->addColumn('thumb', 'datatables.thumb')
            ->editColumn('created_at', 'datatables.created_at')
            ->make(true);
    }

    public function datapopup()
    {
        return Datatables::of(Media::query())
            ->addColumn('action', 'datatables.action')
            ->addColumn('thumb', 'datatables.thumblink')
            ->editColumn('filename', 'datatables.media.filename')
            ->editColumn('created_at', 'datatables.created_at')
            ->make(true);
    }

    public function store(Request $request)
    {
        $photos = $request->file('file');

        if (!is_array($photos)) {
            $photos = [$photos];
        }

        foreach($photos as $photo){
            MediaLibrary::store($photo);
        }

        return Response::json([
            'message' => 'Image saved Successfully'
        ], 200);

    }

    public function destroy(Request $request)
    {
        $ids = explode(',', $request->input('ids'));

        $photos = Media::find($ids);

        foreach($photos as $photo){
            MediaLibrary::destroy($photo);
        }

        //return redirect()->route('admin.media.index')
        return redirect()->back()
                         ->with('success','Media deleted successfully');
    }

}
