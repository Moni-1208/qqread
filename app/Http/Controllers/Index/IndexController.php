<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\UserModel;



class IndexController extends Controller
{
   // 登陆展示
   public function index()
   {
    return view('index.index');
   }

}