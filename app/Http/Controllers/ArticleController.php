<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
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
        $comments = Comment::where('article_id', $articleId)->get(); // Получаем все записи
        return view('pages.article', ['article'=>$article, 'comments'=>$comments]);
    }
    public function addComment(Request $request){
        $userId = auth()->user()->getAuthIdentifier();
        $commentField = $request->comment;
        $articleId = $request->article_id;
        $comment = new Comment();
        $comment->article_id = $articleId;
        $comment->user_id = $userId;
        $comment->comment = $commentField;
        $comment->save();
        return redirect()->intended('/article/'.$articleId);
    }
    public function showAllArticle(){
        $articles = \App\Models\Article::all();
        foreach ($articles as $article){
            $authorId = $article->author_id;
            $article->author = \App\Models\User::where('id', $authorId)->first();
        }
        return view('pages.mainPage', ['articles'=>$articles]);
    }
}
