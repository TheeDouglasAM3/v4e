@extends('layouts.app')

@section('content')
    <h1>Editar Tradução</h1>
    {!! Form::open([
        'action' => ['AnswersController@update', $answer->id],
        'method' => 'POST'
    ]) !!}
   
        <div class="form-group">
            {{Form::label('traducao', 'Tradução')}}
            {{Form::textarea('traducao', $answer->traducao, ['id' => 'article-ckeditor', 'class' => 'form-control mb-2', 'placeholder' => 'Tradução'])}}
            
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Enviar', ['class' => 'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}
@endsection