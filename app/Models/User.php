<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Traits\RbacCheck;

class User extends Authenticatable
{
    use Notifiable;
    use RbacCheck;

    //允许操作的字段
    protected $fillable = ['username', 'password', 'headPortrait', 'status','receiver_name','receiver_mobile','receiver_province','receiver_city','receiver_area','receiver_address'];


    /**
     *  关联角色表
     *
     * @return  void
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class,'user_role')->withTimestamps();//自动维护时间戳
    }
}