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

    public static function showJsonAddress($name_en, $jp_name)
    {
        return json_decode(Helpers::changeLanguage($name_en, $jp_name), true);
    }

    public static  function showJsonSocial($social_link) {
        return json_decode($social_link, true);

    }
}

?>