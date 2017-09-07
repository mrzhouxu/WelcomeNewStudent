<?php
/**
 * Created by PhpStorm.
 * User: Mr.Wang
 * Date: 2017/9/6
 * Time: 21:55
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    //登录页面渲染
    public function index(){
        return view('index');
    }


    //登录
    public function login(){
        $account = request('account');
        $password = request('password');

        if($account == '1' && $password == '1'){
            session(['admin_id'=>$account]);
            return ['code' => 1, 'msg' => '登录成功'];
        }
        return ['code' => 0, 'msg' => '账号或密码错误'];
    }

    //登出
    public function logout(){

    }
}