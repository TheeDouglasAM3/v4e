@extends('layouts.app')

@section('content')
    <h1>Criar Postagem</h1>
    {!! Form::open([
        'action' => 'PostsController@store',
        'method' => 'POST'
    ]) !!}
   
        <div class="form-group">
            {{Form::label('title', 'Título')}}
            {{Form::text('title', '', ['class' => 'form-control mb-2', 'placeholder' => 'Título'])}}
            
            {{Form::label('link', 'Video')}}
            {{Form::text('link', '', ['class' => 'form-control mb-2', 'placeholder' => 'Link do vídeo'])}}

            {{Form::submit('Enviar', ['class' => 'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}
@endsection