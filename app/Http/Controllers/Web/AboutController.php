<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Web\About;


class AboutController extends Controller
{
    private $about;

    public function __construct(About $about)
    {
        $this->about = $about;
    }

    /**
     * Load about page
     * @param $name
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index($name, $id)
    {
        $listAbout = $this->about->getAllAbout();
        $listFirstAbout = $this->about->getAboutById($id);
        if ($listFirstAbout != null) {
            return view('web.more.about', compact('listAbout', 'listFirstAbout'))->with('id', $id);
        } else {
            return redirect()->route('web.index');
        }

    }
}