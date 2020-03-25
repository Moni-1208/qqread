<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redis;

class PreventController extends Controller
{
    // 防止用户频发刷新浏览网站
    public function prevent()
    {
    	// print_r($_SERVER);die;
    	// 获取用户标识
    	$token=$_SERVER['HTTP_POSTMAN_TOKEN'];
    	// echo $token;
    	// 当前url
    	$request_uri=$_SERVER['REQUEST_URI'];
    	// echo $request_uri;
    	$url_hash=md5($token.$request_uri);
    	// echo 'url_hash:'.$url_hash;
    	$redis_key='count:url'.$url_hash;
    	// echo 'redis_key:'.$redis_key.'</br>';

    	// 检查次数是否超过上限
    	$count=Redis::get($redis_key);
    	echo '当前接口访问次数：'.$count;

    	if ($count>=5) {
    		$time=10;
    		echo "请勿频繁刷新接口,".$time." 秒后重试";
    		Redis::expire($redis_key,$time);
    		die;
    	}

    	// 访问数 +1
    	$count=Redis::incr($redis_key);
    	echo 'count:'.$count;
    }

    // 接收 api1905 pass/test 解密 get
    public function tests()
    {
        print_r($_GET);

        $key='1905';

        // 验签
        $data=$_GET['data'];
        $signature=$_GET['signature'];

        // 计算签名
        $ss=md5($data.$key);
        echo "接受计算的签名为：".$ss;

        // 对比
        if ($ss==$signature) {
            echo "验签成功";
        }else{
            echo "验签失败";
        }
    }

    // 签名解密
    // 接收 api1905 pass/md5post 解密 post
    public function md5post()
    {
        $enc_data=$_POST['enc_data'];

        $method='AES-256-CBC';
        $key='1905';
        $iv='qwertyuiop123456';

        $dec_data=openssl_decrypt($enc_data, $method, $key,OPENSSL_RAW_DATA,$iv);
        echo "解密后为：".$dec_data;
    }
}
