<?php

namespace App\Http\Controllers;
use App\Models\VkModel;
use Illuminate\Http\Request;

class vk extends Controller
{
    public function index()
    {
      $content = VkModel::getContent(null,'https://vk.com/audio');
      dd($content);
      return view('vk',['content' => $content]);
    }
}
