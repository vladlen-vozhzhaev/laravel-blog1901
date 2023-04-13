@extends('template')
@section('content')
    <h1 class="text-center">Авторизация</h1>
    <div class="col-md-6 mx-auto">
        @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" name="email" placeholder="E-mail">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Пароль">
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary" value="Войти на сайт">
            </div>
        </form>
    </div>
@endsection
