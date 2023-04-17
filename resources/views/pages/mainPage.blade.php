@extends('template')
@section('title', 'Главная страница')
@section('content')
    @foreach($articles as $article)
        <!-- Post preview-->
        <div class="post-preview">
            <a href="/article/{{$article->id}}">
                <h2 class="post-title">{{$article->title}}</h2>
                <h3 class="post-subtitle">{{$article->content}}</h3>
            </a>
            <p class="post-meta">
                Опубликован
                <a href="#!">{{$article->author_id}}</a>
                <br>
                {{$article->created_at}}
            </p>
        </div>
        <!-- Divider-->
        <hr class="my-4" />
    @endforeach
@endsection
