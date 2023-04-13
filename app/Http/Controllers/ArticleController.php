<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function addArticle(Request $request){
        $title = $request->title; // Читаем из input name="title"
        $content = $request->contentField; // Читаем из textare name="contentField"
        $article = new \App\Models\Article(); // Модель Article
        $article->title = $title; // Значение столбца title
        $article->content = $content; // Значение столбца content
        $article->author_id = 1; // Значение столбца author_id
        $article->save(); // Сохраняем в БД
        return redirect()->intended('/addArticle');
    }
    public function showArticleById(Request $request){
        $articleId = $request->id;
        $article = Article::where('id', $articleId)->first();
        return view('pages.article', ['article'=>$article]);
    }
}
