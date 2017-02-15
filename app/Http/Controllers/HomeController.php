<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;

/**
 * Class HomeController 前台主页控制器
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
//        $this->middleware('auth'); // 取消前台登录认证
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->withArticles(Article::all());
    }
}
