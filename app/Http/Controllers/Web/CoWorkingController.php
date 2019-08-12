<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Web\CoWorking;
use Helpers;

class CoWorkingController extends Controller
{
    private $coWorking;

    public function __construct(CoWorking $coWorking)
    {
        $this->coWorking = $coWorking;
    }

    /**
     * Load list coworking-space
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        try {
            $listCoworking = $this->coWorking->getAllCoworking();
            return view('web.coworking.coworking_space', compact('listCoworking'));
        } catch(\Exception $e) {
            return redirect()->route('web.index');
        }
    }

    /**
     * Load detail coworking-space by Id
     * @param $name
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDetailCoworking($name, $id)
    {
        try {
            $objCoworking = $this->coWorking->getCoworking($id);
            $title = Helpers::changeLanguage($objCoworking->name, $objCoworking->jp_name);
            $configurations = Helpers::convertToJson($objCoworking->social_link);
            return view('web.coworking.coworking_detail', compact('objCoworking', 'configurations', 'title'));
        } catch(\Exception $e) {
            return redirect()->route('web.index');
        }
    }
}
