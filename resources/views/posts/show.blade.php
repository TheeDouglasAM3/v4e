@extends('layouts.app')

@section('content')
    <!--<a href="/posts" class="btn btn-primary mt-2">Voltar</a>-->
    <h1 class="mt-1">{{$post->title}}</h1>
    <div class="container">
    <div class="row">
        <div class="md-6">
            <small>Postagem criada em: {{$post->created_at}}</small>
            <div>
                <iframe width="560" height="315" src="{!!$post->link!!}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <hr>
            <small>Postagem criada em: {{$post->created_at}}</small>
        </div>
        <div class="md-6" style="padding:10px;margin-left:10px; margin-top:20px; overflow-y: scroll;auto; height:315px; width:500px" id="trad-destacada">

        </div>
    </div>
    </div>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id === $post->user_id)
            <div class="row">
                <div class="col-md-1">
                    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Editar</a>
                </div>
                <div class="col-md-1">
                    {!!Form::open([
                        'action' => ['PostsController@destroy', $post->id], 
                        'method' => 'POST',
                        'class' => 'pull-right'
                    ])!!}

                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

                    {!!Form::close()!!}
                </div>
            </div>
        @endif
    @endif

    @foreach($answers as $answer)
        <div style="background:#ccc;padding:10px;border-radius:3px;margin-bottom:5px;overflow-y: scroll;auto; height:150px;">
            <small>{{$answer->user->name}} postou em {{$answer->created_at}}</small>
            <hr>
            <div class="campo-traducao" style="cursor:pointer">
                <span class="traducao">{!!$answer->traducao!!}</span>
            </div>
        </div>
        @if(!Auth::guest())
            @if($answer->user_id === Auth::user()->id)
                <div class="row">
                    <div class="col-md-1">
                <a href="/answers/{{$answer->id}}/edit" class="btn btn-primary">Editar</a>
                    </div>
                    <div class="col-md-1">
                {!!Form::open([
                    'action' => ['AnswersController@destroy', $answer->id], 
                    'method' => 'POST',
                    'class' => 'pull-right'
                ])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

                {!!Form::close()!!}
                    </div>
                </div>
            @endif
        @endif
        <br>
    @endforeach




    <br>
    @if(!Auth::guest())
        @if(Auth::user()->tipo_user === 2)
        <h1>Enviar tradução</h1>
        {!! Form::open([
            'action' => 'AnswersController@store',
            'method' => 'POST'
        ]) !!}
    
            <div class="form-group">
                {{Form::hidden('post_id', $post->id)}}
                {{Form::hidden('user_id', Auth::user()->id)}}
                {{Form::label('traducao', 'Tradução')}}
                {{Form::textarea('traducao', '', ['id' => 'article-ckeditor', 'class' => 'form-control mb-2', 'placeholder' => 'Tradução'])}}
                {{Form::submit('Enviar', ['class' => 'btn btn-primary'])}}
            </div>
        {!! Form::close() !!}
        @endif
    @endif

    <script>
        let campo_trad = document.querySelectorAll(".campo-traducao");
        campo_trad.forEach(elem => {
            elem.addEventListener("click", destacarTraducao);
        })

        function destacarTraducao(event){
            document.querySelector('#trad-destacada').innerHTML = event.target.parentNode.innerHTML;
        }
    </script>
    
@endsection