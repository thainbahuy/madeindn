<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitProjectRequest;
use App\Jobs\SendMailJob;
use App\Models\Web\Category;
use App\Models\Web\Customer;
use App\Models\Web\Project;
use App\Models\Web\ProjectSubmit;
use Helpers;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $projectModel, $category, $projectSubmit;

    function __construct(Project $projectModel, Category $category, ProjectSubmit $projectSubmit)
    {
        $this->projectModel = $projectModel;
        $this->category = $category;
        $this->projectSubmit = $projectSubmit;
        $this->config = Helpers::getConfig()['Project_Page'];
    }

    /**
     * Show Project By Category with Ajax
     * @param $name
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable
     */
    public function showProjectByCategory($name, Request $request)
    {
        $CategoryByProject = $this->category->where('name', $name)->first();
        if ($CategoryByProject != null) {
            $listProjects = $this->projectModel->getProjectByCategory($CategoryByProject['id'])->paginate($this->config['Quantity Post Project']);
            if ($request->ajax()) {
                $view = view('data_projectIndex_loadmore', compact('listProjects'))
                    ->with('valueCategory', $CategoryByProject['id'])
                    ->render();
                return response()->json(['html' => $view]);
            }
            return view('web.project.project_category', compact('listProjects'))
                ->with('title', ucwords($name))
                ->with('valueCategory', $CategoryByProject['id']);
        } else {
            return redirect()->route('web.index');
        }
    }

    /**
     * Show detail Project by Id
     * @param $name
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDetailProject($name, $id)
    {
        $getProject = $this->projectModel->getProjectById($id);
        if ($getProject != null) {
            return view('web.project.project_detail', compact('getProject'));
        } else {
            return redirect()->route('web.index');
        }

    }

    /**Save customer information in the database and shoot mail to the administrator
     * @param $name
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postCustomer($name, $id, Request $request)
    {
        $email = Helpers::getConfig()['System_Email']['Email'];
        $info_customer = new Customer();
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'phone' => 'required|max:15',
            'content_message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('web.project.project_detail', ['name' => $name, 'id' => $id]);
        } else {
            if ($request->ajax()) {
                if ($info_customer->postCustomer($request, $id)) {
                    $emailJob = (new SendMailJob('mail', array('email' => $request->email, 'mobile' => $request->phone, 'content_text' => $request->content_message, 'product_id' => $id, 'date' => date("d-m-Y H:i:s")), "Customer contact", "madeindn.system@gmail.com", "Customer contact", $email));
                    dispatch($emailJob);
                }
            };
        }
    }

    /**Display information of project entry form for customers
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProjectSubmit()
    {
        return view('web.project.project_submit');
    }

    /**Upload Image
     * @param Request $request
     * @param $image_startup
     * @return mixed|string
     */
    private function uploadImage(Request $request, $image_startup)
    {
        if (!is_null($image_startup)) {
            $request->new_name = rand(1, 5000) . $image_startup->getClientOriginalName();
        }
        return $request->new_name;
    }

    /**
     * Upload Files PDF , Word...
     * @param Request $request
     * @param $files_startup
     * @return array|mixed
     */
    private function uploadFiles(Request $request, $files_startup)
    {
        $arry_link = array();
        if ($files_startup) {
            foreach ($files_startup as $key => $valueFiles) {
                $name_file = rand(10000, 50000) . $valueFiles->getClientOriginalName();
                array_push($arry_link, $name_file);
            }
            $request->content_link = $arry_link;
        }

        return $request->content_link;
    }

    /**Save project information in the database
     * @param SubmitProjectRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postProjectSubmit(SubmitProjectRequest $request)
    {
        //Handler Upload Image Startup
//        $image_startup = $request->file('image_startup');
//        $this->uploadImage($request, $image_startup);

        //Handler Upload Files StartUp
        $files_startup = $request->file('files_startup');
        if ($files_startup) {
            $this->uploadFiles($request, $files_startup);
        }
        try {
            if ($this->projectSubmit->addProject($request)) {
//                $image_startup->move(Helpers::getFilePathFromStorage("project_submit/image_project"), $request->new_name);
                if ($files_startup) {
                    foreach ($files_startup as $key => $valueFiles) {
                        $valueFiles->move(Helpers::getFilePathFromStorage("project_submit/link_project"), Helpers::convertToJson($request->content_link)[$key]);
                    }
                }
            }
            $request->session()->flash('msg', 'success');
            return redirect()->route('web.project.project_submit');
        } catch (\Exception $e) {
            $request->session()->flash('msg', 'danger');
            return redirect()->route('web.project.project_submit');
        }
    }
}
