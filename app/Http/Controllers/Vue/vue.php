<?php

namespace App\Http\Controllers\Vue;

use App\Models\VkModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class vue extends Controller
{
    public function index() {
      VkModel::getContent('https://time100.ru/');
      return view('vue.index');
    }
}
