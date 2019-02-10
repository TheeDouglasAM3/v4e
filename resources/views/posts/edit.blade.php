@extends('layouts.app')

@section('content')
    <h1>Criar Postagem</h1>
    {!! Form::open([
        'action' => ['PostsController@update', $post->id],
        'method' => 'POST'
    ]) !!}
   
        <div class="form-group">
            {{Form::label('title', 'Título')}}
            {{Form::text('title', $post->title, ['class' => 'form-control mb-2', 'placeholder' => 'Título'])}}
            
            {{Form::label('link', 'Video')}}
            {{Form::text('link', $post->link, ['class' => 'form-control mb-2', 'placeholder' => 'Link do Video'])}}

            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Enviar', ['class' => 'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}
@endsection