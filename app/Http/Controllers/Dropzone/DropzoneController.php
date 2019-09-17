<?php

namespace App\Http\Controllers\Dropzone;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Response;
// models
use App\Models\TreshImage;
use App\Models\Gpimage;

class DropzoneController extends Controller
{
    public function uploadImage(Request $request){
        $width = 560;
        $height = 560;
        $zipping = 100;

        $photo = Input::file('file');
        $name = sha1(date('YmdHis') . str_random(30));
        $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();

        $image = Image::make($photo)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
//            $constraint->upsize();
        })->save('images/uploads/gproducts_img/' . $resize_name, $zipping);

        if($image){
            TreshImage::firstOrCreate(
                [
                    'image_path' => 'images/uploads/gproducts_img/'.$resize_name,
                ]
            );
        }

        if($image){
            return 'images/uploads/gproducts_img/'.$resize_name;
        }else{
            return Response::json([
                'status'=> 'danger',
                'msg' => 'Ошибка сервера, размер изображения слишком большой!'
            ], 500);
        }
    }

    public function deleteImage(Request $request){
        $filename = $request->image_path;
        $massage = unlink(public_path($filename));
        if($massage){

            Gpimage::where('image_path', $filename)->delete();
            TreshImage::where('image_path', $filename)->delete();

            return Response::json([
                'status'=> 'success',
                'msg' => 'Изображение успешно удалено!'
            ], 200);
        }else{
            return Response::json([
                'status'=> 'danger',
                'msg' => 'Ошибка сервера, удаление не прошло!'
            ], 200);
        }
    }
}