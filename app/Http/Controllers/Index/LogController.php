<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\UserModel;



class LogController extends Controller
{
   public function log()
   {
    return view('login.log');
   }

   // 注册展示
   public function reg()
   {
    return view('login.reg');
   }

   // 注册执行
   public function reg_do(Request $request){
        $data=$request->except('_token');
        unset($data['u_pwd1']);
        $res=UserModel::create($data);
        if ($res) {
            echo "注册成功";
        }else{
            echo "注册失败";
        }
    }
}