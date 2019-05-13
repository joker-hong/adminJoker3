<?php
/**
 * Created by PhpStorm.
 * User: Joker
 * Date: 2019/5/12
 * Time: 19:30
 */

namespace App\Services;

use Auth;
use App\Services\LogService;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    //日志属性
    protected $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    /**
     * 验证登录信息
     * @param $request
     * @return  boolean
     */
    public function login($request)
    {
        //登录验证失败时，新增日志记录
        if(!Auth::guard('web')->attempt([
            'username' => $request->username,
            'password' => $request->password,
            'status' => 1
        ])){
            $this->logService->create($request,false,2);
            return false;
        }
        //获取管理员信息
        $admin = Auth::guard('web')->user();
        //增加管理员登录次数
        $admin->increment('login_count');
        //记录登录日志记录
        $this->logService->create($request,true,2);

        return true;
    }

    /**
     * 退出登录
     *
     * @return mixed
     */
    public function logout()
    {
        Auth::guard('web')->user()->clearRuleAndMenu();
        return Auth::guard('web')->logout();
    }

    /**
     * 获取个人信息
     *
     * @parem  int   $id
     * @return array
     */
    public function ById($id)
    {
        return User::find($id);
    }

    /**
     * 更新个人信息
     *
     * @parem  int   $id
     * @return array
     */
    public function update($request,$id)
    {
        $data = $request->all();
        $admin = $this->ById($id);

        if(isset($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }

        $admin->update($data);
        if (isset($request->role_id)) {
            //更新关联表数据
            $admin->roles()->sync($request->role_id);
        }
        return $admin;
    }

    /**
     * 根据搜索条件获取用户
     *
     * @parem  array   $condition
     * @return array
     */
    public function lists($condition)
    {
        return User::with('roles')->where($condition)->latest('update_at')->paginate('10');
    }

}