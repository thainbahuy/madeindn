<?php

namespace App\Http\Controllers\Web;

use App\Models\Web\CoWorking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $listCoworking = $this->coWorking->getAllCoworking();
        return view('web.coworking.coworking_space', compact('listCoworking'));
    }

    /**
     * Load detail coworking-space by Id
     * @param $name
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDetailCoworking($name, $id)
    {
        $objCoworking = $this->coWorking->getCoworking($id);
        return view('web.coworking.coworking_detail', compact('objCoworking'));
    }
}
