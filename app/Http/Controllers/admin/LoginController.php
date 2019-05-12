<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService;

class LoginController extends Controller
{
    //用户属性
    protected  $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

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
     * @return boolean
     */
    public function submit(Request $request)
    {
        $result = $this->userService->login($request);
        if(!$result)
        {
            //显示错误信息
            flash('用户名或密码错误')->error()->important();
            return redirect()->route('login');
        }

        return view('admin.index.index');
    }
}
