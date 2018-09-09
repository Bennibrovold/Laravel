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
    $records = DB::table('records')->orderBy('views')->limit(2)->get();
    return view('main.index',['categories' => $categories,'records' => $records]);
  }
    public function show($category,$id)
    {
      $record = DB::table('records')->find($id);

      return view('main.records',['record' => $record]);
    }
}
