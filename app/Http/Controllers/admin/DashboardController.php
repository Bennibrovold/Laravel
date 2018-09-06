<?php

namespace App\Http\Controllers\admin;

use App\Models\Categories;

use Auth;
use App\Records;
use App\CategoriesModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {

    }

    public function dashboard(request $request)
    {
      $categories = Categories::all();
      $countCategories = Categories::all()->count();
      // $countCategories = $categories-count();
      if(request()->ajax()) {
        return view('admin.contentFiles.main',['countCategories' => $countCategories,'categories' => $categories]);
      } else {
      return view('admin.dashboard',['countCategories' => $countCategories,'categories' => $categories]);
      }
    }

    public function ajaxContent($params)
    {
      if(request()->ajax()) {
        $page = 'test';
        return view('admin.contentFiles.'.$page)->with([
          $params,
        ]);
      }
    }

    public function createCategory()
    {
      if(request()->ajax()) {
        return view('admin.contentFiles.createCategory');
      } else {
      return view('admin.createCategory');
      }
    }

    protected function validator(Request $data)
    {
      return Validator::make($data->all(), [
          'name' => 'required|string|unique:categories|',
      ])->validate();
    }

    protected function addCategory(Request $data)
    {
      $validator = dashboardController::validator($data);
      if (!dashboardController::validator($data))
      {
        return response()->json([
              'success' => 'success',
              'errors'  => $validator->errors()->all(),
          ], 400);
      } else {
      CategoriesModel::create([
          'name' => $data['name'],
      ]);
      return redirect()->back();
      }
    }

    public function createRecord()
    {
      $categories = Categories::all();
      if(request()->ajax()) {
        return view('admin.contentFiles.createRecord',['categories' => $categories]);
      } else {
      return view('admin.createRecord',['categories' => $categories]);
      }
    }

    protected function validatorRecords(Request $data)
    {
      if($data->isMethod('post')) {
      return Validator::make($data->all(), [
          'title' => 'required|string|',
          'description' => 'required|string|',
          'pre_title' => 'required|string|',
          'category' => 'required|string|',

      ])->validate();
    } else {
      echo 'Error';
    }
    }

    protected function addRecord(Request $data)
    {
      $data = DashboardController::validatorRecords($data);
      var_dump($data);
      Records::create([
          'title' => $data['title'],
          'description' => $data['description'],
          'pre_title' => $data['pre_title'],
          'category' => $data['category'],
      ]);
    }

    public function deleteCategory($id)
    {
      $category = Categories::findOrFail($id);
      $category->delete();
      return redirect('admin');
    }
}
