<?php

namespace App\Http\Controllers\Web;

use App\Models\Web\Category;
use App\Models\Web\Customer;
use App\Models\Web\Project;
use App\Models\Web\ProjectSubmit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendWelcomeEmail;
use Carbon\Carbon;
use App\Http\Requests\SubmitProjectRequest;


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

    public function postProjectSubmit(SubmitProjectRequest $request)
    {
        $this->projectSubmit->addProject($request);
    }
}
