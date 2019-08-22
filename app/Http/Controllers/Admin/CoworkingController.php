<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CoworkingRequest;
use App\Models\Admin\CoWorking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Helpers;

class CoworkingController extends Controller
{

    public function __construct(CoWorking $coWorking)
    {
        $this->coWorking = $coWorking;
    }

    /**Display All Coworking
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllCowroking()
    {
        $listCoworkingSpace = $this->coWorking->getAllCoworking();
        return view('admin.coworking.coworking_space', compact('listCoworkingSpace'))->with('title','List Co-working');
    }

    /**Delete selected coworking and delete image on CDN
     * @param Request $request
     * @return mixed
     */
    public function deleteCoworking(Request $request)
    {

        $id = $request->get('id');
        $objCoworking = $this->coWorking->getCoworking($id);
        try {
            if ($this->coWorking->deleteCoworking($id)) {
                Log::info('Delete coworking titled: ' . $objCoworking->name);
                Helpers::deleteImageFromCDN(Helpers::$THUMBNAIL.$objCoworking->image_link);
                Helpers::deleteImageFromCDN(Helpers::$DETAIL.$objCoworking->image_link);
                return \Response::json(['msg' => 'DELETE SUCCESS']);
            } else {
                Log::info('The deleted coworking titled: ' . $objCoworking->name);
                return \Response::json(['msg' => 'NO DELETE SUCCESS']);
            }
        } catch (\Exception $e) {
            Log::info($e);
            return \Response::json(['msg' => 'NO DELETE SUCCESS']);
        }
    }

    /**Display All Coworking
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAddCoworking()
    {
        return view('admin.coworking.add_coworking_space')->with('title','Add New Co-working');
    }

    /**Add new Coworking
     * @param CoworkingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAddCoworking(CoworkingRequest $request)
    {
        $data = $request->all();
        if (isset($data['location']) && isset($data['location_jp']) && isset($data['social'])) {
            $arrSocial = array_combine($data['social']['key'], $data['social']['value']);
            $location = Helpers::convertArrayToJson($data['location']);
            $location_jp = Helpers::convertArrayToJson($data['location_jp']);
            $social = Helpers::convertArrayToJson($arrSocial);
        }
        $newNameImage = Helpers::createNewNameImage($data["imageCoworking"]->getClientOriginalName());
        $this->uploadImageToCDN($newNameImage,$data["imageCoworking"]);
        $resultAddCowork = $this->coWorking->addCoworking($data['name'], $data['name_jp'], $data['overview'], $data['overview_jp'], $location, $location_jp, $newNameImage, $data['position'], $social);

        if ($resultAddCowork) {
            Log::info('You just added coworking named: ' . $data['name']);
            $request->session()->flash('msg', 'Success !');
            return redirect()->route('view.admin.coworking.coworking_space');
        } else {
            Log::info('Add new coworking failed');
            $request->session()->flash('msg', 'Fail !');
            return redirect()->route('view.admin.coworking.coworking_space');
        }
    }

    /** Display Coworking need to edit
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEditCoworking($id)
    {
        $infoCoworking = $this->coWorking->getCoworking($id);
        return view('admin.coworking.edit_coworking_space', compact('infoCoworking'))->with('title','Edit Co-working');
    }

    /**Update coworking information just modified to the database
     * @param $id
     * @param CoworkingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEditCoworking($id, CoworkingRequest $request)
    {
        $data = $request->all();
        $oldCoworking = $this->coWorking->getCoworking($id);

        if ($request->file('imageCoworking')) {
            $newNameImage = Helpers::createNewNameImage($data["imageCoworking"]->getClientOriginalName());
            $linkImage = $newNameImage;
            $this->uploadImageToCDN($newNameImage,$request->file('imageCoworking'));

            //delete old image cdn
            Helpers::deleteImageFromCDN(Helpers::$THUMBNAIL.$oldCoworking->image_link);
            Helpers::deleteImageFromCDN(Helpers::$DETAIL.$oldCoworking->image_link);
        } else {
            $linkImage = $oldCoworking->image_link;
        }

        if (isset($data['location']) && isset($data['location_jp']) && isset($data['social'])) {
            $arrSocial = array_combine($data['social']['key'], $data['social']['value']);
            $location = Helpers::convertArrayToJson($data['location']);
            $location_jp = Helpers::convertArrayToJson($data['location_jp']);
            $social = Helpers::convertArrayToJson($arrSocial);
        }

        $resultAddCowork = $this->coWorking->editCoworking($id, $data['name'], $data['name_jp'], $data['overview'], $data['overview_jp'], $location, $location_jp, $linkImage, $data['position'], $social);

        if ($resultAddCowork) {
            Log::info('You just edited coworking named: ' . $oldCoworking->name);
            $request->session()->flash('msg', "Success");
            return redirect()->route('view.admin.coworking.coworking_space');
        } else {
            Log::info('Edit new coworking failed');
            $request->session()->flash('msg', 'Fail');
            return redirect()->route('view.admin.coworking.coworking_space');
        }
    }

    private function uploadImageToCDN($name,$imageFile){
        //for thumbnail
        $thubnail = Helpers::resizeImage($imageFile,1);
        Helpers::upLoadImageToCDNDetail_H($thubnail->content(),$name,1);

        //for detail
        $detail = Helpers::resizeImage($imageFile,2);
        Helpers::upLoadImageToCDNDetail_H($detail->content(),$name,2);

    }
}
