<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class CommentController  前台评论控制器
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    public function store(Request $request)
    {
        // 批量赋值
        if (Comment::create($request->all())) {
            return redirect()->back();
        } else {
            return redirect()->back()->withInput()->withErrors('评论发表失败！');
        }
    }
}
