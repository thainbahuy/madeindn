<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Helpers;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upLoadImage(Request $request){
        $path = $request->file('image');
        $newNameImage = Helpers::createNewNameImage($path->getClientOriginalName());
        dd(Helpers::upLoadImageToCDNTest($path,$newNameImage));
    }

    public function deletImage(Request $request){
        $imageName = $request->get('imageName');
        dd(Helpers::deleteImageFromCDN($imageName));
    }
}
