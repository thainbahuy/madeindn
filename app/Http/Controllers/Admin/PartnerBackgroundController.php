<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerBackgroundRequest;
use App\Models\Admin\Partner;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PartnerBackgroundController extends Controller
{
    private $partner;

    public function __construct(Partner $partner)
    {
        $this->partner = $partner;
    }

    /**
     * show list partner logo with paginate 5
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        $listBackground = $this->partner->getListBackground();
        if ($request->ajax()) {
            $view = view('admin/partner/loadmore_list', compact('listBackground'))->render();
            return response()->json(['html' => $view]);
        }
        return view('admin/partner/partner_background_list', compact('listBackground'))->with('title','List Partner logo');;
    }

    /**
     * show add partner logo view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddNewPartnerBackground()
    {
        return view('admin/partner/add_partner_background')->with('title','Add New Partner Logo');;
    }

    /**
     * add new partner logo
     * @param PartnerBackgroundRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addNewPartnerBackground(PartnerBackgroundRequest $request)
    {
        $name = $request->get('name');
        $position = $request->get('position');
        $image_link = $request->file('image_link');

        //upload image to cdn and get url
        $newNameImage = Helpers::createNewNameImage($image_link->getClientOriginalName());
        $imageLinkCDN = Helpers::upLoadImageToCDN_N($image_link, $newNameImage);

        if ($this->partner->addNewPartnerBackground($name, $imageLinkCDN, $position) == true) {
            Log::info('add background partner success');
            return redirect()->route('view.admin.partner.add_partner_background')->with('message', 'Add New Partner Background Success');
        } else {
            Log::info('add background partner failed');
            return redirect()->route('view.admin.partner.add_partner_background')->with('message', 'Add New Partner Background Failed');
        }

    }

    /**
     * delete parter logo
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletePartnerBackground(Request $request)
    {
        $id = $request->get('id');
        $partner = $this->partner->getBackgroundById($id);
        $nameImage = Helpers::getNameImage($partner->image_link);
        if ($this->partner->deletePartnerBackground($id) == 1) {
            Helpers::deleteImageFromCDN($nameImage);
            Log::info('delete background partner success');
            return response()->json(['status' => 'success'], Response::HTTP_OK);
        } else {
            Log::info('delete background partner failed');
            return response()->json(['status' => 'fail'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
