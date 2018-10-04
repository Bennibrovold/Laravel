<?php

namespace App\Http\Controllers\Main;

use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index() {
    $categories = DB::table('categories')->orderBy('count', 'desc')->get();
    $categories_limit = DB::table('categories')->orderBy('count', 'desc')->limit(7)->get();
    $popular_article = DB::table('records')->orderBy('views','desc')->first();
    $articles = DB::table('records')->limit(19)->get();
    return view('main.index',['categories' => $categories,'popular_article' => $popular_article,'articles' => $articles,'categories_limit' => $categories_limit]);
  }
    public function show($category,$id)
    {
      $record = DB::table('records')->find($id);

      return view('main.records',['record' => $record]);
    }

    public function CategoryShow($category)
    {
      $records = DB::table('records')->where('category','=',$category)->get();
      if(count($records) > 0) {
      $popular_record = DB::table('records')->where('category','=',$category)->orderBy('views','desc')->first();
      $categories = DB::table('categories')->orderBy('count', 'desc')->limit(7)->get();
      return view('main.category',['records' => $records,'categories' => $categories,'popular_record' => $popular_record]);
    } else {
      return redirect('/');
    }
    }

    public function getTable()
    {
      return $records = DB::table('records')->get();
    }

    public function getNews(Request $request)
    {
      if(request()->ajax()) {
      if(intval($request['count'])) {
      $articles = DB::table('records')->offset($request['count'])->limit($request['count'] + 18)->get();
      $request['count'] = $request['count'] + 18;
      if(count($articles) <= $request['count']) {
      $data = 1;
      return view('components.news',['articles' => $articles,'data' => $data]);
    } else {
      return view('components.news',['articles' => $articles]);
    }
        }
      }
    }
}
