<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Helpers;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upLoadImage(Request $request){
        $imageFile = $request->file('image');
        $thubnail = Helpers::resizeImage($imageFile,1);
        dd(Helpers::upLoadImageToCDNDetail_H($thubnail->content(),$imageFile->getClientOriginalName(),1));
    }

    public function deletImage(Request $request){
        $imageName = $request->get('imageName');
        dd(Helpers::deleteImageFromCDN($imageName));
    }
}
