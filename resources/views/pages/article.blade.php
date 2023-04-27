@extends('template')
@section('content')
    <h1 class="text-center">{{$article->title}}</h1>
    <div>
        {{$article->content}}
    </div>
    @auth
        <div>
            <form action="/addComment" method="post">
                @csrf
                <input type="hidden" name="article_id" value="{{$article->id}}">
                <div class="mb-3">
                    <textarea name="comment" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Добавить комментарий">
                </div>
            </form>
        </div>
    @else
        <div>Добавить комментарий может только зарегистрированный пользователь</div>
    @endauth
    <div class="my-3">
        <h4>Комментарии</h4>
        @foreach($comments as $comment)
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">{{$comment->user_id}}</div>
                        @if($isAdmin or auth()->user()->getAuthIdentifier() == $comment->user_id)
                            <div class="col-6 text-end">
                                <a href="/deleteComment/{{$comment->id}}">X</a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text m-0">
                        {{$comment->comment}}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
