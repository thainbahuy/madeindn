<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Background;
use Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct(Background $background)
    {
        $this->background = $background;
    }

    /**Dashboard Page Display
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDashboard()
    {
        $backgroundHome = $this->background->getBackgroundHome();
        return view('admin.dashboard', compact('backgroundHome'));
    }

    /**Change new background in Home Page
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeBackgroundHome(Request $request)
    {
        $data = $request->file('imageBackground');
        $name = $data->getClientOriginalName();
        $newNameImage = Helpers::createNewNameImage($name);
        $linkImage = "https://storage.googleapis.com/madeindn/" . $newNameImage;

        $resultChangeBackgroundHome = $this->background->changeBackgroundHome($linkImage);
        if ($resultChangeBackgroundHome) {
            Helpers::deleteImageFromCDN($request->image_link);
            Helpers::upLoadImageToCDN_N($data, $newNameImage);
            return redirect()->route('dashboard');
        }
    }
}
