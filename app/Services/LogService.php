<?php
/**
 * Created by PhpStorm.
 * User: Joker
 * Date: 2019/5/12
 * Time: 19:35
 */

namespace App\Services;

use Auth;
use App\Models\Log;

class LogService
{
    /**
     * 创建日志记录
     *
     * @param  array $request  具体数据
     * @param  boolean $status  状态
     * @param  int $type  日志类型
     * @return  boolean
     */
    public function create($request,$status = false,$type)
    {
        //登录日志
        if($type == 2){
            //获取当前登录管理员的信息
            $admin = Auth::guard('web')->user();
            //获取IP地址
            $ip = $request -> getClientIp();
            //记录信息
            $action = $status ? "管理员：{$request->username}登录成功" : "登录失败，登录账号为{$request->username},密码为{$request->password}";

            $data = [
                'ip' => $ip,
                'action' => $action
            ];
            $datas['user_id'] = $admin['id'] ?: 0;
            $datas['data']    = json_encode($data);
            $datas['type']    = 2;
            return Log::create($datas);
        }
    }
}