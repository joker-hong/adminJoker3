<?php
/**
 * Created by PhpStorm.
 * User: masswise
 * Date: 2019/5/13
 * Time: 14:16
 */

namespace App\Services;

use App\Models\Role;

class RoleService
{
    /**
     * 获取角色信息
     *
     * @parem  int   $id
     * @return array
     */
    public function ById($id)
    {
        return Role::find($id);
    }

    /**
     * 获取所有角色信息
     *
     * @parem  int   $id
     * @return array
     */
    public function get()
    {
        return Role::get();
    }
}