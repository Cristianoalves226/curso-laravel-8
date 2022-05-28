@extends('admin.layouts.app')
@section('title','Listagem dos posts')
@section('content')

    <a href="{{route('posts.create')}}">Criar Novo Post</a>
    <hr>

    <h1>Posts</h1>

    <form action="{{route('posts.search')}}" method="post">
        @csrf
        <input type="text" name="search" id="search" placeholder="filtrar">
        <button type="submit">Filtrar</button>
    </form>


    @foreach($posts as $post)
        <p> Post {{$post->title}}
            [ <a href="{{route('posts.show',$post->id)}}">
                Ver
            </a>
            <a href="{{route('posts.edit',$post->id)}}">
                Editar
            </a>
            ]
        </p>
    @endforeach
    <hr>
    {@if (isset($filters))
        {{ $posts->appends($filters)->links() }}
    @else
        {{ $posts->links() }}
    @endif

@endsection
