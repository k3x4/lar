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
        return Datatables::of(Media::all())
            ->addColumn('action', function ($media) {
                $html  = '<div class="dtable-td-wrapper">';
                $html .= \Form::checkbox('action', $media->id, false, ['class' => 'select']);
                $html .= '</div>';
                return $html;
            })
            ->addColumn('thumb', function ($media) {
                $html  = '<div class="dtable-td-wrapper">';
                $html .= \Html::tag('span', '', ['class' => 'dtable-helper']);
                $html .= \Html::image('/uploads/' . $media->get('mini'));
                $html .= '</div>';
                return $html;
            })
            ->editColumn('created_at', '{{ date("d/m/Y H:i", strtotime($created_at)) }}')
            ->make(true);
    }

    public function datapopup()
    {
        $medias = Media::all();

        // $posts->map(function ($post) {
        //     $post['url'] = 'http://your.url/here';
        //     return $post;
        // });

        return Datatables::of($medias)
            ->addColumn('action', function ($media) {
                $html  = '<div class="dtable-td-wrapper">';
                $html .= \Form::checkbox('action', $media->id, false, ['class' => 'select']);
                $html .= '</div>';
                return $html;
            })
            // ->addColumn('thumb', function ($media) {
            //     $html  = '<div class="dtable-td-wrapper">';
            //     $html .= \Html::tag('span', '', ['class' => 'dtable-helper']);
            //     $html .= '<a data-id="' . $media->id . '" href="/uploads/' . $media->filename . '">' . \Html::image('/uploads/' . $media->get('mini')) . '</a>';
            //     $html .= '</div>';
            //     return $html;
            // })
            ->addColumn('thumb', '{{ $filename }}')
            // ->editColumn('filename', function ($media) {
            //     $html  = \Html::link('/uploads/' . $media->filename, $media->filename, [
            //         "data-id" => $media->id,
            //         "data-thumb" => $media->get('mini')
            //     ]);
            //     return $html;
            // })
            //->editColumn('filename', '{{ $filename }}')
            //->editColumn('filename', 'admin.media.datatables.filename')
            ->editColumn('filename', '<a href="/uploads/{{ $filename }}" data-id="{{ $id }}">{{ $filename }}</a>')
            ->editColumn('created_at', '{{ date("d/m/Y H:i", strtotime($created_at)) }}')
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
