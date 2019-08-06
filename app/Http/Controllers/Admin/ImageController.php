<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Helpers;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upLoadImage(Request $request){
        $path = $request->file('image');
        dd(Helpers::upLoadImageToCDN($path));
    }

    public function deletImage(Request $request){
        $imageName = $request->get('imageName');
        dd(Helpers::deleteImageFromCDN($imageName));
    }
}
