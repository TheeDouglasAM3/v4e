@extends('layouts/app')

@section('content')
    <div class="jumbotron text-center">
        <img src="/img/logo.png" width="20%"><br><br>
        <h2>Bem vindo a plataforma Videos4Everyone</h2><br>
        <h4>Colabore traduzindo os videos que os usuários defecientes auditivos enviam, pois todos nós temos o direito de se entrenter, divertir e até mesmo aprender assistindo vídeos, não é mesmo?</h4>
        @if(Auth::guest())
            <p><a class="btn btn-primary btn-lg" href="/login" role="button">Entrar</a> <a class="btn btn-success btn-lg" href="/register" role="button">Registrar</a></p>
        @endif
    </div>
@endsection