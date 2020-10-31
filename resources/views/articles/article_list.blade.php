@extends('layout.layout')
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    @foreach($articles as $article)
                        <a href="{{ route('articles.show', $article->id) }}"><h2>{{$article->title}}</h2>
                        </a>
                </div>
                <p><img src="/css/images/banner.jpg" alt="" class="image image-full"/></p>
    {{$article->body}}
    @endforeach
@endsection


