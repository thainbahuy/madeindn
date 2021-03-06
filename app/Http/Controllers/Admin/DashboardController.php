<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Background;
use App\Models\Admin\Contact;
use App\Models\Admin\CoWorking;
use App\Models\Admin\Customer;
use App\Models\Admin\ProjectSubmit;
use Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct(Background $background, Contact $contact, Customer $customer, CoWorking $coworking, ProjectSubmit $projectCustomer)
    {
        $this->background = $background;
        $this->contact = $contact;
        $this->customer = $customer;
        $this->coworking = $coworking;
        $this->projectCustomer = $projectCustomer;
    }

    /**Dashboard Page Display
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDashboard()
    {
        $Contact = $this->contact->countContat();
        $Customer = $this->customer->countContatInProject();
        $Coworking = $this->coworking->coutCoworking();
        $ProjectCustomer = $this->projectCustomer->coutProjectCustomer();
        $boxes = [
            'Contact' => [
                'count' => $Contact,
                'title' => 'Total contact',
                'icon'  => 'icon icon-shape bg-danger text-white rounded-circle shadow',
                'url'   => route('view.admin.contact.contact_customer'),
            ],
            'Contact in Project' => [
                'count' => $Customer,
                'title' => 'Contact in Project',
                'icon'  => 'icon icon-shape bg-gradient-success rounded-circle text-white',
                'url'   => route('view.admin.contact.project_customer'),
            ],
            'Coworking' => [
                'count' => $Coworking,
                'title' => 'Total Coworking',
                'icon'  => 'icon icon-shape bg-gradient-warning rounded-circle text-white',
                'url'   => route('view.admin.coworking.coworking_space'),
            ],
            'Project Customer' => [
                'count' => $ProjectCustomer,
                'title' => 'Project Customer',
                'icon'  => 'icon icon-shape bg-gradient-warning rounded-circle text-white',
                'url'   => route('view.admin.project.project_customer'),
            ],
        ];


        $backgroundHome = $this->background->getBackgroundHome();
        return view('admin.dashboard', compact('backgroundHome','boxes'))->with('title','Admin Dashboard');
    }

    /**Change new background in Home Page
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeBackgroundHome(Request $request)
    {
        $data = $request->file('imageBackground');
        $newNameImage = Helpers::createNewNameImage($data->getClientOriginalName());

        //resize and upload
        $newImageResize = $this->resizeImageBackground($data);
        Helpers::upLoadImageToCDNDetail_H($newImageResize->content(), $newNameImage,3);

        //insert into db
        $resultChangeBackgroundHome = $this->background->changeBackgroundHome($newNameImage);
        if ($resultChangeBackgroundHome) {
            Helpers::deleteImageFromCDN($request->image_link);
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('dashboard');
        }
    }

    /**
     * resize image for background
     * @param $imageFile
     * @return \Intervention\Image\Image
     */
    private function resizeImageBackground($imageFile){
        $imageResize = Helpers::resizeImage($imageFile,2);
        return $imageResize;
    }
}
