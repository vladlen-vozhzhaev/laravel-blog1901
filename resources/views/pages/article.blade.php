@extends('template')
@section('content')
    <h1 class="text-center">{{$article->title}}</h1>
    <div>
        {{$article->content}}
    </div>
@endsection
