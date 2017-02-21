<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class ArticleController 前台文章控制器
 * @package App\Http\Controllers
 */
class ArticleController extends Controller
{
    public function show($id)
    {
        return view('article/show')->withArticle(Article::with('hasManyComments')->find($id));
    }
}
