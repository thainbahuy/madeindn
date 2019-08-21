<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Helpers;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upLoadImage(Request $request){
        $imageFile = $request->file('image');
        $thubnail = Helpers::resizeImage($imageFile,2);
        dd(Helpers::upLoadImageToCDNDetail_H($thubnail->content(),$imageFile->getClientOriginalName(),2));
    }

    public function deletImage(Request $request){
        $imageName = $request->get('imageName');
        dd(Helpers::deleteImageFromCDN($imageName));
    }
}
