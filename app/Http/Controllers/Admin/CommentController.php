<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class CommentController 后台评论管理控制器
 * @package App\Http\Controllers\Admin
 */
class CommentController extends Controller
{
    // 评论管理主页
    public function index()
    {
        return view('admin/comment/index')->withComments(Comment::all());
    }

    // 新增
    public function create()
    {
        // 防止出现 505
        return redirect('admin/comment');
    }

    // 保存
    public function store()
    {
        // 防止出现 505
        return redirect('admin/comment');
    }

    // 编辑
    public function edit(Comment $comment)
    {
        // withXXX()，XXX 跟前端页面上的变量名一致
        return view('admin/comment/edit')->withComment($comment);
    }

    // 更新
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nickname' => 'required|max:255',
            'email' => 'email|max:255',
            'website' => 'url|max:255',
            'content' => 'required']);

        $comment = Comment::find($id);
        $comment->nickname = $request->get('nickname');
        $comment->email = $request->get('email');
        $comment->website = $request->get('website');
        $comment->content = $request->get('content');

        if ($comment->save()) {
            return redirect('admin/comment');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
    }

    // 删除
    public function destroy($id)
    {
        if (Comment::find($id)->delete()) {
            return redirect()->back()->withInput()->withErrors('删除成功！');
        }
    }

}
