<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class Helpers
{
    /**
     * return language folowing locale
     * @param $name_en
     * @param $jp_name
     * @return languege string
     */
    public static function changeLanguage($name_en, $jp_name)
    {
        if (Session::get('locale') == 'en') {
            return $name_en;
        } else {
            return $jp_name;
        }

    }

    /**
     * convert json file to array
     * @param $jsonVarible
     * @return Array
     */
    public static function convertToJson($jsonVarible)
    {
        return json_decode($jsonVarible, true);
    }

    /**
     * get file config and convert to array
     * @return Array
     */
    public static function convertArrayToJson($jsonVarible)
    {
        return json_encode($jsonVarible, true);
    }


    public static function getConfig()
    {
        $content = file_get_contents(Helpers::getFilePathFromStorage('config.json'));
        return Helpers::convertToJson($content);
    }

    /**
     * return path of file in storage folder
     * @param $patch
     * @return string
     */
    public static function getFilePathFromStorage($patch)
    {
        return storage_path($patch);
    }

    /**
     * Upload image to CDN ,THIS JUST FOR TEST DO NOT DELETE
     * @param $file
     * @return url
     */

    public static function upLoadImageToCDNTest($file)
    {
        $disk = Storage::disk('gcs');
        try {
            $disk->put($file->getClientOriginalName(), file_get_contents($file));
            $urlImage = $disk->url($file->getClientOriginalName());
            Log::info('Photos uploaded: ' . $file->getClientOriginalName());
            return $urlImage;
        } catch (Exception $e) {
            Log::info('Exception upload image');
            Log::info($e);
        }
    }

    /**
     * delete file from CDN
     * @param $name
     * @return bool
     */
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

    /**
     * get name image from url
     * @param $image
     * @return string
     */
    public static function getNameImage($image)
    {
        return basename($image);
    }

    /**
     * random name for image
     * @param $nameImage
     * @return string
     */
    public static function createNewNameImage($nameImage)
    {
        return rand(10000000, 99999999) . "_" . rand(10000000, 99999999) . "_" . rand(10000000, 99999999) . "_" . $nameImage;
    }

    /**
     * upload image to cdn
     * @param $file file
     * @param $nameImage string
     * @return mixed
     */
    public static function upLoadImageToCDN_N($file, $nameImage)
    {
        $disk = Storage::disk('gcs');
        $nameImage = $nameImage;
        try {
            $disk->put($nameImage, file_get_contents($file));
            $urlImage = $disk->url($nameImage);
            Log::info('Photos uploaded: ' . $nameImage);
            return $urlImage;

        } catch (Exception $e) {
            Log::info('Exception upload image');
            Log::info($e);
        }
    }
}

