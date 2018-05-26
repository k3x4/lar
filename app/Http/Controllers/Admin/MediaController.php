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

class MediaController extends Controller
{

    public function index(Request $request)
    {
        $photos = Media::all();
        return view('admin.media.index', compact('photos'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        $photos = $request->file('file');
        $photos_path = public_path('/uploads');

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

            foreach($media_sizes as $media_size){
                $image = new ImageUtils($photos_path . '/' .  $save_name);
                $image_width = $image->width();
                $image_height = $image->height();

                if( ($media_size->width > $image_width) || ($media_size->height > $image_height) ){
                    continue;
                }
                
                $width = $media_size->width;
                $height = $media_size->height;
                $crop = $media_size->crop;
                $crop_position = $media_size->crop_position;
        
                if($crop){
                    $image->fit($width, $height, $crop_position);
                } else {
                    $image->resize($width, $height);
                }

                $name = sha1(date('YmdHis') . str_random(30));
                $resize_name = $name . '.' . $photo->getClientOriginalExtension();

                $image->get()->save($photos_path . '/' . $resize_name);

                $thumb = new Thumb();
                $thumb->media_id = $media->id;
                $thumb->media_size_id = $media_size->id;
                $thumb->filename = $resize_name;
                $thumb->save();
            }

            /*
            Image::make($photo)
                ->resize(250, null, function ($constraints) {
                    $constraints->aspectRatio();
                })
                ->save($photos_path . '/' . $resize_name);
            */

            
        }
        return Response::json([
            'message' => 'Image saved Successfully'
        ], 200);


        /*
        // Creating a new time instance, we'll use it to name our file and declare the path
        $time = Carbon::now();
        // Requesting the file from the form
        $image = $request->file('file');
        // Getting the extension of the file
        $extension = $image->getClientOriginalExtension();
        // Creating the directory, for example, if the date = 18/10/2017, the directory will be 2017/10/
        $directory = date_format($time, 'Y') . '/' . date_format($time, 'm');
        // Creating the file name: random string followed by the day, random number and the hour
        $filename = str_random(5) . date_format($time, 'd') . rand(1, 9) . date_format($time, 'h') . "." . $extension;
        // This is our upload main function, storing the image in the storage that named 'public'
        $upload_success = $image->storeAs($directory, $filename, 'public');
        // If the upload is successful, return the name of directory/filename of the upload.
        if ($upload_success) {
            return response()->json($upload_success, 200);
        }
        // Else, return error 400
        else {
            return response()->json('error', 400);
        }
        */
    }

    public function destroy(Request $request)
    {
        $filename = $request->id;
        $uploaded_image = Media::where('original_name', basename($filename))->first();
        $photos_path = public_path('/uploads');

        if (empty($uploaded_image)) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }

        $file_path = $photos_path . '/' . $uploaded_image->filename;
        //$resized_file = $photos_path . '/' . $uploaded_image->resized_name;

        if (file_exists($file_path)) {
            unlink($file_path);
        }

        /*
        if (file_exists($resized_file)) {
            unlink($resized_file);
        }
        */

        if (!empty($uploaded_image)) {
            $uploaded_image->delete();
        }

        return Response::json(['message' => 'File successfully delete'], 200);
    }


}
