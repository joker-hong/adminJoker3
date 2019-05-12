<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    //允许操作的字段
    protected $fillable = ['name', 'fonts', 'route', 'parent_id', 'is_hidden', 'sort', 'status'];

    /**
     * 只获取显示的数据
     * @param $query
     * @return mixed
     */
    public function scopePublic($query)
    {
        return $query->where('is_hidden', 0);
    }
}
