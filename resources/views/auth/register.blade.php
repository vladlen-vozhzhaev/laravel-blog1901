@extends('template')
@section('content')
        <h1 class="text-center">Регистрация на сайте</h1>
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
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Имя">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="email" placeholder="E-mail">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Пароль">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Подтверждение пароля">
                </div>
                <div class="mb-3">
                    <input type="submit" class="form-control btn btn-primary    " value="Зарегистрироваться">
                </div>
            </form>
        </div>
@endsection
