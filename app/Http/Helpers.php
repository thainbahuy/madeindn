<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class Helpers
{
    public static function changeLanguage($name_en, $jp_name)
    {
        if (Session::get('locale') == 'en') {
            return $name_en;
        } else {
            return $jp_name;
        }

    }

    public static function convertToJson($jsonVarible)
    {
        return json_decode($jsonVarible, true);
    }

    public static function convertArrayToJson($jsonVarible)
    {
        return json_encode($jsonVarible, true);
    }


    public static function getConfig()
    {
        $content = file_get_contents(Helpers::getFileFromStorage('config.json'));
        return Helpers::convertToJson($content);
    }

    public static function getFileFromStorage($patch)
    {
        return storage_path($patch);
    }

    public static function upLoadImageToCDN($file, $nameImage)
    {
        $disk = Storage::disk('gcs');
        $nameImage = $nameImage;
        try {
            $disk->put($nameImage, file_get_contents($file));
            $urlImage = $disk->url($nameImage);
            return $urlImage;

        } catch (Exception $e) {
            Log::info('Exception upload image');
            Log::info($e);
        }
    }

    public static function deleteImageFromCDN($name)
    {
        try {
            // verify if exists files inside object
            Storage::disk('gcs')->delete($name);
            Log::info('Photos deleted: ' . $name);
        } catch (Exception $e) {
            Log::info('Exception delete image');
            Log::info($e);
        }
    }

    public static function getNameImage($image)
    {
        return explode("/", $image)[4];
    }

    public static function createNewNameImage($nameImage){
        return rand(10000000, 99999999) . "_" . rand(10000000, 99999999) . "_" . rand(10000000, 99999999) . "_" .$nameImage;
    }
}

