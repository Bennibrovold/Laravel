<?php

namespace App\Http\Controllers\User;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\MainModel;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //


    public function index()
    {
      $name = Auth::user()->id;
      return redirect('user/'.$name);
    }

    public function showProfile($id)
    {
      $user = MainModel::findOrFail($id);
      $categories = DB::table('categories')->orderBy('count', 'desc')->limit(10)->get();

      return view('user.profile',['user' => $user,'categories' => $categories]);
    }

    public function delete()
    {

    }
}
