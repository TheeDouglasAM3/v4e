@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($user->tipo_user == 1)
                    <a href="/posts/create" class="btn btn-primary">Criar Postagem</a>
                    @endif
                    <br><br>
                    <h3>Suas postagens</h3>
                    @if(count($user->posts) > 0)
                    <table class="table table-striped">
                        @foreach($user->posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Editar</td>
                                <td>
                                        {!!Form::open([
                                            'action' => ['PostsController@destroy', $post->id], 
                                            'method' => 'POST',
                                            'class' => 'pull-right'
                                        ])!!}
                                    
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    
                                        {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <p>Você não tem nenhuma postagem.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
