<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class ArticleController 后台文章管理控制器
 * @package App\Http\Controllers\Admin
 */
class ArticleController extends Controller
{
    // 文章管理主页
    public function index()
    {
        return view('admin/article/index')->withArticles(Article::all());
    }

    // 新增
    public function create()
    {
        return view('admin/article/create');
    }

    // 保存
    public function store(Request $request)
    {
        // articles 是表名；空格敏感
        $this->validate($request, ['title' => 'required|unique:articles|max:255', 'body' => 'required']);

        $article = new Article();
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id;
        if ($article->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }


    public function show(Article $article)
    {
        // 防止出现 505
        return view('admin/article/edit')->withArticle($article);
    }

    // 编辑
    public function edit(Article $article)
    {
        // withXXX()，XXX 跟前端页面上的变量名一致
        return view('admin/article/edit')->withArticle($article);
    }

    // 更新
    public function update(Request $request, $id)
    {
        // articles 是表名
        $this->validate($request, ['title' => 'required|unique:articles,title,' . $id . '|max:255', 'body' => 'required']);

        $article = Article::find($id);
        var_dump($article);
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        // 更改用户
//        $article->user_id = $request->user()->id;
        if ($article->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
    }

    // 删除
    public function destroy($id)
    {
        if (Article::find($id)->delete()) {
            return redirect()->back()->withInput()->withErrors('删除成功！');
        }
    }

}
