<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function index()
    {
        $jsonLanguage = file_get_contents(storage_path('json_language/language.json'));
        $jsonDataLanguage = json_decode($jsonLanguage, true);
        return view('admin.config.index', compact('jsonDataLanguage'));
    }

    public function postLanguageJson(Request $request)
    {
        $dataEdit = $request->all();
        unset($dataEdit["_token"]);
        foreach ($dataEdit as $keyLang => $valueLang) {
            foreach ($dataEdit[$keyLang] as $key => $value) {
                foreach ($dataEdit[$keyLang][$key] as $keyValue => $title) {
                    $resultMessage[$keyLang][$key][$keyValue] = $title;
                }
            }
        }
        $newJsonString = json_encode($resultMessage, JSON_PRETTY_PRINT);
        if (file_put_contents(storage_path('json_language/language.json'), $newJsonString)) {
            $request->session()->flash('message','Cập nhật thành công !');
            return redirect()->route('admin.config.index');
        } else {
            $request->session()->flash('message','Cập nhật thất bại !');
            return redirect()->route('admin.config.index');
        }
    }
}
