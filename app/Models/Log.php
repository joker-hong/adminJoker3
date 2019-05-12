<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //允许操作的字段
    protected $fillable = ['user_id','data','type'];
}
