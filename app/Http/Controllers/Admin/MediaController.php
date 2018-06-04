<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use App\Media;
use App\Thumb;
use App\MediaSize;
use App\Libraries\ImageUtils;
use Yajra\Datatables\Datatables;

class MediaController extends Controller
{

    public function index(Request $request)
    {
        return view('admin.media');
    }

    public function data()
    {
        $medias = Media::all();
        return Datatables::of($medias)
            ->addColumn('thumb', function ($media) {
                $html  = '<div class="dtable-td-wrapper">';
                $html .= \Html::tag('span', '', ['class' => 'dtable-helper']);
                $html .= \Html::image('/uploads/' . $media->get('mini'));
                $html .= '</div>';
                return $html;
            })
            ->addColumn('action', function ($media) {
                $html  = '<div class="dtable-td-wrapper">';
                $html .= \Form::checkbox('action', $media->id, false, ['class' => 'select']);
                $html .= '</div>';
                return $html;
            })
            ->editColumn('created_at', '{{ date("d/m/Y H:i", strtotime($created_at)) }}')
            ->make(true);
    }

    public function store(Request $request)
    {
        $photos = $request->file('file');
        $photos_path = public_path('uploads');

        if (!is_array($photos)) {
            $photos = [$photos];
        }

        if (!is_dir($photos_path)) {
            mkdir($photos_path, 0777);
        }

        for ($i = 0; $i < count($photos); $i++) {
            $photo = $photos[$i];
            $name = sha1(date('YmdHis') . str_random(30));
            $save_name = $name . '.' . $photo->getClientOriginalExtension();

            $photo->move($photos_path, $save_name);

            $media = new Media();
            $media->filename = $save_name;
            $media->original_name = basename($photo->getClientOriginalName());
            $media->save();

            $media_sizes = MediaSize::all();
            $this->makeThumbs($media->id, $media_sizes, $save_name, $photo->getClientOriginalExtension()); 
        }

        return Response::json([
            'message' => 'Image saved Successfully'
        ], 200);

    }

    private function makeThumbs($media_id, $media_sizes, $save_name, $extension){

        $photos_path = public_path('uploads');

        foreach($media_sizes as $media_size){

            if( ! $media_size->enabled ){
                continue;
            }

            $image = new ImageUtils($photos_path . '/' .  $save_name);

            $media_width = $media_size->width;
            $media_height = $media_size->height;
            $image_width = $image->width();
            $image_height = $image->height();

            $image_size_max = ($image_width > $image_height) ? $image_width : $image_height;
            $media_size_max = ($media_width > $media_height) ? $media_width : $media_height;

            if ($image_size_max <= $media_size_max) {
                continue;
            }
    
            if ($media_size->crop) {
                $image->resizeCanvas($media_width, $media_height, $media_size->crop_position);
            } else {
                $image->resize($media_width, $media_height);
            }

            $name = sha1(date('YmdHis') . str_random(30));
            $resize_name = $name . '.' . $extension;

            $image->get()->save($photos_path . '/' . $resize_name);

            $thumb = new Thumb();
            $thumb->media_id = $media_id;
            $thumb->media_size_id = $media_size->id;
            $thumb->filename = $resize_name;
            $thumb->save();

        }
    }

    public function destroy(Request $request)
    {
        $ids = explode(',', $request->input('ids'));
        $photos_path = public_path('/uploads');

        $photos = Media::find($ids);
        foreach($photos as $photo){
            
            // delete photos
            $file_path = $photos_path . '/' . $photo->filename;
            var_dump($file_path);
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            // delete thumbs
            $thumbs = $photo->thumbs()->get();
            foreach($thumbs as $thumb){
                $file_path_thumb = $photos_path . '/' . $thumb->filename;
                if (file_exists($file_path_thumb)) {
                    unlink($file_path_thumb);
                }
            }

        }

        Media::destroy($ids);

        return redirect()->route('admin.media')
                         ->with('success','Media deleted successfully');
    }

}
