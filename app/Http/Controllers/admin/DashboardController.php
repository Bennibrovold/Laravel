<?php

namespace App\Http\Controllers\admin;

use App\Models\Categories;

use Auth;
use App\Records;
use App\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
      
    }

    public function dashboard()
    {
      $categories = Categories::all();
      $countCategories = Categories::all()->count();
      // $countCategories = $categories-count();

      return view('admin.dashboard',['countCategories' => $countCategories,'categories' => $categories]);
    }

    public function createCategory()
    {
      return view('admin.createCategory');
    }

    protected function validator(Request $data)
    {
      if($data->isMethod('post')) {
      return Validator::make($data->all(), [
          'name' => 'required|string|unique:categories|',
      ])->validate();
      $this->addCategory($data);
    } else {
      echo 'Error';
    }
    }

    protected function addCategory(Request $data)
    {
      $data = dashboardController::validator($data);
      Admin::create([
          'name' => $data['name'],
      ]);
      return redirect()->back();
    }

    public function createRecord()
    {
      $categories = Categories::all();

      return view('admin.createRecord',['categories' => $categories]);
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
