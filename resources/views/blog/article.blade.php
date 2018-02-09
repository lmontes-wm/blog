@extends('blog.template.main')

@section('title','Contenido de articulos')

@section('content')
        <hr>
        <h2>{{ $article->content }}</h2>
        <hr>
        {{ $article->user->name  }}| {{$article->user->email}} | {{$article->user->type }}
        <hr>
        {{ $article->category->name }}
        <hr>
        @foreach( $article->tags as $tag)
        {{ $tag->name}}
        @endforeach
        <hr>
        @if( 1 == 1)
        {{ "igual a 1" }}
        @endif
@endsection



