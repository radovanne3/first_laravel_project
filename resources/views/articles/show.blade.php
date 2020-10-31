@extends('layout.layout')
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <h2>{{$article->title}}</h2>
                </div>
                <p><img src="/css/images/banner.jpg" alt="" class="image image-full"/></p>
                {{$article->body}}
                <p>
                    @forelse($article->tags as $tag)
                        <a href="{{ route('articles.index',['tag'=>$tag->name]) }}">{{$tag->name}}</a>
                    @empty
                    <p>No relevant articles yet.</p>
                    @endforelse
                </p>
            </div>

        </div>
    </div>
@endsection
