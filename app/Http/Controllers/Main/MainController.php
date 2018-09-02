<?php

namespace App\Http\Controllers\Main;

use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index() {
    $categories = DB::table('categories')->orderBy('count', 'desc')->limit(10)->get();

    return view('main.index',['categories' => $categories]);
  }
}
