@extends('template')
@section('content')
    <h1 class="text-center my-3">Добавить статью</h1>
    <div class="col-sm-12 mx-auto">
        <form action="/addArticle" method="post">
            @csrf
            <div class="mb-3">
                <input name="title" type="text" class="form-control" placeholder="Заголовок">
            </div>
            <div class="mb-3">
                <textarea name="contentField" type="text" class="form-control" placeholder="Контент"></textarea>
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary" value="Добавить статью">
            </div>
        </form>
    </div>
@endsection
