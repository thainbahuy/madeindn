<?php

namespace App\Http\Controllers\Admin;

use Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    /**Display language data to edit
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLanngJson()
    {
        $jsonLanguage = file_get_contents(storage_path('json_language/language.json'));
        $jsonDataLanguage = json_decode($jsonLanguage, true);
        return view('admin.config.lang_json', compact('jsonDataLanguage'))->with('title', 'Config language');
    }

    /**
     * Edit the required language data by Admin
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
            $request->session()->flash('message', 'Updated Success !');
            return redirect()->route('admin.config.lang_json');
        } else {
            $request->session()->flash('message', 'Updated Fail !');
            return redirect()->route('admin.config.lang_json');
        }
    }

    /**Display paginate data to edit
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPaginateJson()
    {
        $jsonPaginate = file_get_contents(storage_path('config.json'));
        $jsonDataPaginate = json_decode($jsonPaginate, true);
        return view('admin.config.paginate_json', compact('jsonDataPaginate'))->with('title', 'Config system');
    }

    /**
     * Edit the required paginate data by Admin
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postPaginateJson(Request $request)
    {
        $dataEdit = $request->all();
        unset($dataEdit["_token"]);
        foreach ($dataEdit as $keyLang => $valueLang) {
            foreach ($dataEdit[$keyLang] as $keyValue => $title) {
                $resultMessage[$keyLang][$keyValue] = $title;
            }
        }
        $newJsonString = json_encode($resultMessage, JSON_PRETTY_PRINT);
        if (file_put_contents(storage_path('config.json'), $newJsonString)) {
            $request->session()->flash('message', 'Updated Success !');
            return redirect()->route('admin.config.paginate_json');
        } else {
            $request->session()->flash('message', 'Updated Faild !');
            return redirect()->route('admin.config.paginate_json');
        }
    }

    public function showLangForm()
    {
        return view('admin.config.lang_form')->with('title', 'Config Language Form');
    }

    public function postLangProject(Request $request)
    {
        $files = $request->file('files_json');
        $result = $files->move(Helpers::getFilePathFromStorage("json_language"), "language_project.json");
        if($result){
            $request->session()->flash('message', 'Updated Success !');
            return redirect()->route('view.admin.config.lang_form');
        }else {
            $request->session()->flash('message', 'Updated Faild !');
            return redirect()->route('view.admin.config.lang_form');
        }
    }

    public function postLangContact(Request $request)
    {
        $files = $request->file('files_json_contact');
        $result = $files->move(Helpers::getFilePathFromStorage("json_language"), "language_contact.json");
        if($result){
            $request->session()->flash('message', 'Updated Success !');
            return redirect()->route('view.admin.config.lang_form');
        }else {
            $request->session()->flash('message', 'Updated Faild !');
            return redirect()->route('view.admin.config.lang_form');
        }
    }
}
