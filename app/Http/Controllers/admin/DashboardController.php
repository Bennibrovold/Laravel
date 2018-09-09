<?php

namespace App\Http\Controllers\admin;

use App\Models\Categories;

use Auth;
use App\Records;
use App\CategoriesModel;
use App\Models\MainModel;
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
          'checkbox' => '',
      ])->validate();
    } else {
      echo 'Error';
    }
    }

    protected function addRecord(Request $data)
    {
      if(!isset($data['checkbox'])) {
        $data['checkbox'] = 0;
      } else {
        $data['checkbox'] = 1;
      }
      $data = DashboardController::validatorRecords($data);
      Records::create([
          'title' => $data['title'],
          'description' => $data['description'],
          'pre_title' => $data['pre_title'],
          'category' => $data['category'],
          'show' => $data['checkbox'],
      ]);
      return redirect()->back();
    }

    public function deleteCategory($id)
    {
      $category = Categories::findOrFail($id);
      $category->delete();
      return redirect('admin');
    }

    public function options()
    {
      if(request()->ajax()) {

      return view('admin.contentFiles.options');
      } else {
      dd(\Config::get('admin.hyppnotic'));
      return view('admin.options');
      }
    }

    public function users($name = null)
    {
        $users = MainModel::all();
      if(request()->ajax()) {
        if(!$name == null) {

            $users = MainModel::where('name', 'like', $name)->get();
        }
      return view('admin.contentFiles.users',['users' => $users]);
      } else {
      return view('admin.users',['users' => $users]);
      }
    }
    public function usersGet($post)
    {
      if(request()->ajax()) {
        dd('ok');
      } else {
        dd('no');
      }
      //$users = MainModel::where('name', '=', $post['name'])->get();
    }

    public function ajaxUsersGet(request $data)
    {
      if(request()->ajax()) {

    } else {
      return redirect()->back();
    }
    }
    public function usersDelete($id)
    {
      if(request()->ajax())
      {
      $user = MainModel::find($id);
      $user->delete();
      return response($id);
      }
    }
}
