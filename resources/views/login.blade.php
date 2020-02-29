<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @include('partials.bootstrap-cdn-css')

    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>
<body>
    <form class="form-signin" method="POST">
        @csrf
        <center>
            <img class="mb-4" src="{{ asset('assets/img/user.png') }}" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Área de Login</h1>
        </center>
        @if (isset($loginerr))

            <div class="alert alert-danger">
                {{$loginerr}}        
            </div>

        @endif
        <label for="inputEmail" class="sr-only">E-mail</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus name="email">
        
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required name="password">

        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
    @include('partials.bootstrap-cdn-js')
</body>
</html>