<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * 首页
     *
     * @access public
     * @return view
     */
    public function index()
    {
        return view('admin.login.index');
    }

    /**
     * 验证登陆提交
     *
     * @access public
     * @param  object          $request
     * @return boolean
     */
    public function submit(Request $request)
    {
        $data['status'] = 1;
        $data['info']   = -2;
        return $data;
//        $result = $this->userService->login($request);
//        if(!$result)
//        {
//            return viewError('登录失败','login');
//        }
//
//        return viewError('登录成功!','index','success');
    }
}
