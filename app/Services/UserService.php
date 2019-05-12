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

}