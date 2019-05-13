<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Services\UserService;
use App\Services\RoleService;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
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
     * 首页
     *
     * @access public
     * @return boolean
     */
    public function index()
    {
        if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']=='http://'.$_SERVER["HTTP_HOST"].'/login/submit'){
            flash('欢迎回来！','success');
        }

        return view('admin.index.index');
    }

    /**
     * 首页数据
     *
     * @access public
     * @return boolean
     */
    public function main()
    {
        return view('admin.index.main');
    }

    /**
     * 基本资料
     *
     * @access public
     * @return boolean
     */
    public function info()
    {
        $id = Auth::guard('web')->user()->id;
        $admin = $this->userService->ById($id);
        $role_id = $admin->roles->pluck('id')->toArray();//选择id这一列
        $role = $this->roleService->ById($role_id[0]);
        return view('admin.index.edit',compact('admin','role'));
    }

    /**
     * 修改个人资料
     *
     * @access public
     * @param  Request $request  提交的数据
     * @return boolean
     */
    public function update(Request $request)
    {
        $id = Auth::guard('web')->user()->id;
        $datas = $request->all();
        if(isset($datas['checkpassword'])){
            if($datas['checkpassword']!=$datas['password']){
                flash('两次输入的密码不一致！')->error();
                return redirect()->route('password');
            }
        }
        if(isset($datas['oldpassword'])){
            $admin = $this->userService->ById($id);
            if(!Hash::check($datas['oldpassword'],$admin->password)){
                flash('旧密码错误！')->error();
                return redirect()->route('password');
            }
        }
        $this->userService->update($request,$id);
        flash('更新资料成功！','success');
        if(isset($datas['checkpassword'])) {
            return redirect()->route('password');
        }
        return redirect()->route('myInfo');
    }

    /**
     * 修改密码
     *
     * @access public
     * @param  Request $request  提交的数据
     * @return boolean
     */
    public function password()
    {
        return view('admin.index.password');
    }

}
