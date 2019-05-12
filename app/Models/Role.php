<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //允许操作的字段
    protected $fillable = ['name', 'remark', 'order', 'status'];

    /**
     * 关联权限表
     *
     * @return void
     */
    public function rules()
    {
        return $this->belongsToMany(Rule::class,'role_rule')->withTimestamps();//自动维护时间戳
    }

    /**
     * 获取显示的权限
     *
     * @return mixed
     */
    public function rulesPublic()
    {
        return $this->rules()->public()->where('status',1)->orderBy('sort','asc')->get();
    }
}
