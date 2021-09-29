<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <title>Laravel Relations</title>
</head>
@extends('layouts.app')

@section('content')
<div class="card-container">
    <a href="{{route('articles.create')}}"><button class="new">+</button></a>
    @foreach($articles as $article)
        <div class="article-container">
                <span  id="article-id" scope="row">{{$article->id}}</span>
                <h3 id="article-title">{{$article->title}}</h3>
                <h5 id="article-subtitle">{{$article->subtitle}}</h5>
                <span id="article-desc">{{$article->description}}</span>
                <span id="article-author">{{$article->authorName}}</span>
                <div id="article-date">{{$article->date}}</div>
                <div id="article-tools">
                    <a href="{{route('articles.show', $article)}}"><div class="btn btn-primary">Show</div></a>
                    <a href="{{route('articles.edit', $article)}}"><div class="btn btn-primary">Edit</div></a>
                    <form action="{{route('articles.destroy', $article)}}" method="POST">
                            @csrf
                            @method ('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection