@extends ('layouts.default')

@section('content')




<!-- Jumbotron -->
<div class="jumbotron">
    <h1>Добро пожаловать!</h1>
    <p class="lead">Для доступа Вам необходимо войти или зарегистрироваться</p>
    <p><a class="btn btn-lg btn-success" href="/login" role="button">Вход</a></p>
    <p><a class="btn btn-lg btn-success" href="/registration" role="button">Регистрация</a></p>
</div>
<div class="row">
    <div class="col-lg-4">
        <h2>JS</h2>
        <p class="text-danger">Gist №1</p>
        <p> Code</p>
        <p><a class="btn btn-primary" href="#" role="button">More &raquo;</a></p>
    </div>
    <div class="col-lg-4">
        <h2>Python</h2>
        <p class="text-danger">Gist №2</p>
        <p> Code </p>
        <p><a class="btn btn-primary" href="#" role="button">More &raquo;</a></p>

    </div>
    <div class="col-lg-4">
        <h2>PHP</h2>
        <p class="text-danger">Gist №3</p>
        <p> Code </p>
        <p><a class="btn btn-primary" href="#" role="button">More &raquo;</a></p>

    </div>
</div>

@endsection
