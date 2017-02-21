<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // 一对多关系
    public function hasManyComments()
    {
        // 关联的实体类、外键、主键
        return $this->hasMany('App\Comment', 'article_id', 'id');
    }
}
