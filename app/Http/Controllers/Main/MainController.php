<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MainController extends BaseController
{
    public function index(Request $request)
    {
    	return view('main');
    }
    public function postRegister(Request $request) 
    {
    	$name = $request->input('name');
    	echo $name;
    }
}
