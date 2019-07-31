<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    public static function getConfig()
    {
        $content = file_get_contents(Helpers::getFileFromStorage('config.json'));
        return Helpers::convertToJson($content);
    }

    public static function getFileFromStorage($patch)
    {
        return storage_path($patch);
    }
}

?>