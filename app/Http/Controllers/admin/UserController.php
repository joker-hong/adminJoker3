<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService;

class UserController extends Controller
{
    //用户属性
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * 列表页
     *
     * @access public
     * @param  Request $request  提交的数据
     * @return boolean
     */
    public function index(Request $request)
    {
        $condition = [];
        $get = '';

        if(inset($request->username)){
            $condition = ['username','like','%'.$request->username.'%'];
            $get = $request->username;
        }

        $lists = $this->userService->lists($condition);

        return view('admin.user.index',compact('get','lists'));
    }
}
