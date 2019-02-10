@extends('layouts.app')

@section('content')
    <h1>Videos</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="div-post">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Postagem criada em: {{$post->created_at}} por {{$post->user->name}}</small>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>Nenhuma postagem foi realizada :(</p>
    @endif
@endsection