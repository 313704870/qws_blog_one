<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['content'];
    //获取拥有此微博的 用户 (反向一对一关联)
    public function user(){
        return $this->belongsTo(User::class);
    }
}
