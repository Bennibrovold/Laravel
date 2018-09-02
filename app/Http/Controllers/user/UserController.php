<?php

namespace App\Http\Controllers\User;

use Auth;
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

      return view('user.profile',['user' => $user]);
    }

    public function delete()
    {

    }
}
