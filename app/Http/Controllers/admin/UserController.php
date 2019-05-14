<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Services\RoleService;

class UserController extends Controller
{
    //用户属性
    protected $userService;
    //角色属性
    protected $roleService;

    public function __construct(UserService $userService,RoleService $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
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

        if(isset($request->username)){
            $condition[] = ['username','like','%'.$request->username.'%'];
            $get = $request->username;
        }

        $lists = $this->userService->lists($condition);

        return view('admin.user.index',compact('get','lists'));
    }

    /**
     * 显示创建页
     *
     * @access public
     * @return boolean
     */
    public function create()
    {
        $roles = $this->roleService->get();
        return view('admin.user.create',compact('roles'));
    }
}
