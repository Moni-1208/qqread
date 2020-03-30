<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\UserModel;



class LogController extends Controller
{
   // 登陆展示 .
   public function log()
   {
    return view('login.log');
   }

   // 登陆执行
   public function log_do(Request $request)
   {
        $data=$request->except('_token');
        $res=UserModel::where(['u_pwd'=>$data['u_pwd']])->first();
        if($res){
            echo "<script>alert('登陆成功');location.href='/';</script>";exit;
        }else{
            echo "<script>alert('登陆失败');location.href='/login/log';</script>";exit;
        }
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
            echo "<script>alert('注册成功');location.href='/login/log';</script>";exit;
        }else{
            echo "注册失败";
        }
    }
}