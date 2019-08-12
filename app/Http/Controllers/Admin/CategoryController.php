<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function showAllCategory()
    {
        return view('admin.category.view_category')->with('title','List Category');
    }

    public function deleteCategory(Request $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        if ($request->ajax()) {
            if ($this->category->deleteCategory($id)) {
                Log::info('Delete category titled: ' . $name);
                return \Response::json(['msg' => 'DELETE SUCCESS']);
            } else {
                return \Response::json(['msg' => 'NO DELETE SUCCESS']);
            }
        }
    }

    public function getAddCategory()
    {
        return view('admin.category.add_category')->with('title','Add New Category');
    }

    public function postAddCategory(CategoryRequest $request)
    {
        $data = $request->all();
        $resultAddCategory = $this->category->addCategory($data['name'], $data['name_jp'], $data['position']);
        if ($resultAddCategory) {
            Log::info('You just added new Category named: ' . $data['name']);
            $request->session()->flash('msg', "Success");
            return redirect()->route('view.admin.category.view_category');
        } else {
            Log::info('Add new category failed');
            $request->session()->flash('msg', 'Fail');
            return redirect()->route('view.admin.category.view_category');
        }
    }

    public function getEditCategory($id)
    {
        $infoCategory = $this->category->getCategoryById($id);
        return view('admin.category.edit_category', compact('infoCategory'))->with('title','Edit Category');
    }

    public function postEditCategory($id, CategoryRequest $request)
    {
        $data = $request->all();
        $resultEdit = $this->category->editCategory($id, $data['name'], $data['name_jp'], $data['position']);
        if ($resultEdit) {
            Log::info('You just edited category named: ' . $data['name']);
            $request->session()->flash('msg', "Success");
            return redirect()->route('view.admin.category.view_category');
        } else {
            Log::info('Edit category failed');
            $request->session()->flash('msg', 'Fail');
            return redirect()->route('view.admin.category.view_category');
        }
    }
}
