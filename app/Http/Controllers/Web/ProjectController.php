<?php

namespace App\Http\Controllers\Web;

use App\Models\Web\Category;
use App\Models\Web\Customer;
use App\Models\Web\Project;
use App\Models\Web\ProjectSubmit;
use Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendWelcomeEmail;
use Carbon\Carbon;
use App\Http\Requests\SubmitProjectRequest;
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    private $projectModel, $category;

    function __construct(Project $projectModel, Category $category, ProjectSubmit $projectSubmit)
    {
        $this->projectModel = $projectModel;
        $this->category = $category;
        $this->category = $category;
        $this->projectSubmit = $projectSubmit;
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
        $listProjects = $this->projectModel->getProjectByCategory($CategoryByProject['id']);
        if ($request->ajax()) {
            $view = view('data_projectIndex_loadmore', compact('listProjects'))
                ->with('valueCategory', $CategoryByProject['id'])
                ->render();
            return response()->json(['html' => $view]);
        }

        return view('web.project.project_category', compact('listProjects'))
            ->with('title', ucwords($name))
            ->with('valueCategory', $CategoryByProject['id']);
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
        return view('web.project.project_detail', compact('getProject'));
    }

    public function store($name, $id, Request $request)
    {
        $info_customer = new Customer;
        $info_customer->email_customer = $request->email;
        $info_customer->mobile_customer = $request->phone;
        $info_customer->content_customer = $request->content_message;
        $info_customer->product_id = $id;

        if ($request->ajax()) {
            if ($info_customer->save()) {
                $emailJob = (new SendWelcomeEmail($info_customer))->delay(Carbon::now()->addSeconds(1));
                dispatch($emailJob);
                return response()->json(['html' => true]);
            } else {
                return response()->json(['html' => false]);
            }
        };
    }

    public function showProjectSubmit()
    {
        return view('web.project.project_submit');
    }


    private function uploadImage(Request $request, $image_startup)
    {
        if (!is_null($image_startup)) {
            $request->new_name = rand(1, 5000) . $image_startup->getClientOriginalName();
        }
        return $request->new_name;
    }

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

    public function postProjectSubmit(SubmitProjectRequest $request)
    {
        //Handler Upload Image Startup
        $image_startup = $request->file('image_startup');
        $this->uploadImage($request, $image_startup);

        //Handler Upload Files StartUp
        $files_startup = $request->file('files_startup');
        $this->uploadFiles($request, $files_startup);

        try {
            if ($this->projectSubmit->addProject($request)) {
                $image_startup->move(Helpers::getFileFromStorage("project_submit/image_project"), $request->new_name);
                foreach ($files_startup as $key => $valueFiles) {
                    $valueFiles->move(Helpers::getFileFromStorage("project_submit/link_project"), Helpers::convertToJson($request->content_link)[$key]);
                }
            }
            $request->session()->flash('msg','success');
            return redirect()->route('web.project.project_submit');
        } catch (\Exception $e) {
            $request->session()->flash('msg','danger');
            return redirect()->route('web.project.project_submit');
        }

    }
}
