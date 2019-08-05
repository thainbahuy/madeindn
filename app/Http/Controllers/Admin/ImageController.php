<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upLoadImage(Request $request){
        $path = $request->file('image');
//        $disk = Storage::disk('gcs');
//        //dd($path->getClientOriginalExtension());
//        $url = $disk->put($path->getClientOriginalName() , file_get_contents($path));
//        $urlImage = $disk->url($path->getClientOriginalName());
//        dd ($urlImage);
        dd(Helpers::upLoadImageToCDN($path));
    }


}
