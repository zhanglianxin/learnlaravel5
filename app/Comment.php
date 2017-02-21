<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // 允许批量赋值的属性
    protected $fillable = ['nickname', 'email', 'website', 'content', 'article_id'];
}
