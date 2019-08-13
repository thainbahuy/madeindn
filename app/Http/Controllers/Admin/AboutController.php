<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\Admin\About;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AboutController extends Controller
{
    private $about;

    public function __construct(About $about)
    {
        $this->about = $about;
    }

    /**Display All about
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllAbout(Request $request)
    {
        $listAbout = $this->about->getAllAbout();
        return view('admin.about.about', compact('listAbout'))->with('title','List About');;
    }

    /**Add About
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAddAbout()
    {
        return view('admin.about.add_about')->with('title','Add New About');;
    }

    /**Add new About
     * @param AboutRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAddAbout(AboutRequest $request)
    {
        $data = $request->all();
        $newNameImage = Helpers::createNewNameImage($data["imageAbout"]->getClientOriginalName());
        $linkImage = "https://storage.googleapis.com/madeindn/" . $newNameImage;
        $resultAddAbout = $this->about->addAbout($data['name'], $data['jp_name'], $data['position'], $data['description'], $data['jp_description'], $linkImage);
        if ($resultAddAbout) {
            Log::info('You just added About name: ' . $data['name']);
            Helpers::upLoadImageToCDN_N($data['imageAbout'], $newNameImage);
            $request->session()->flash('msg', 'Success!');
            return redirect()->route('view.admin.about.about');
        } else {
            Log::info('Add new about failed');
            $request->session()->flash('msg', 'Fail!');
            return redirect()->route('view.admin.about.about');
        }
    }

    /** Display About need to edit
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEditAbout($id)
    {
        $infoAbout = $this->about->getAboutDetail($id);
        return view('admin.about.edit_about', compact('infoAbout'))->with('title','Edit About');;
    }

    /**Update edit new About
     * @param AboutRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEditAbout($id, AboutRequest $request)
    {
        $data = $request->all();
        $oldInfoAbout = $this->about->getAboutDetail($id);
        if ($request->file('imageAbout')) {
            $newNameImage = Helpers::createNewNameImage($data["imageAbout"]->getClientOriginalName());
            $linkImage = "https://storage.googleapis.com/madeindn/" . $newNameImage;
        } else {
            $linkImage = $oldInfoAbout->image_link;
        }
        $resultEditAbout = $this->about->editAbout($id, $data['name'], $data['jp_name'], $data['position'], $data['description'], $data['jp_description'], $linkImage);
        if ($resultEditAbout) {
            if ($request->file('imageAbout')) {
                $nameImage = Helpers::getNameImage($oldInfoAbout->image_link);
                Helpers::deleteImageFromCDN($nameImage);
                Helpers::upLoadImageToCDN_N($data['imageAbout'], $newNameImage);
            }
            Log::info('You just edit About name: ' . $data['name']);
            $request->session()->flash('msg', 'Success!');
            return redirect()->route('view.admin.about.about');
        } else {
            Log::info('Edit new about failed');
            $request->session()->flash('msg', 'Fail!');
            return redirect()->route('view.admin.about.about');
        }
    }

    /**Delete about
     * @param Request $request
     * @return mixed
     */
    public function deleteAbout(Request $request)
    {
        $id = $request->get('id');
        $objAbout = $this->about->getAbout($id);
        $nameImage = Helpers::getNameImage($objAbout->image_link);
        try {
            if ($this->about->deleteAbout($id)) {
                Log::info('Delete about title: ' . $objAbout->name);
                Helpers::deleteImageFromCDN($nameImage);
                return response()->json(['msg' => 'DELETE SUCCESS']);
            } else {
                Log::info('The deleted about titled: ' . $objAbout->name);
                return response()->json(['msg' => 'NO DELETE SUCCESS']);
            }
        } catch (\Exception $e) {
            Log::info($e);
            return response()->json(['msg' => 'NO DELETE SUCCESS']);
        }
    }
}