@extends('layouts.app')

@section('content')
    <div class="card-container">
        <div class="single-container">
            <h3 id="single-title">{{$article->title}}</h3>
            <h5 id="single-subtitle">{{$article->subtitle}}</h5>
            <p id="single-desc">{{$article->description}}</p>
            <span id="single-author">{{$article->authorName}}</span>
            <div id="single-date">{{$article->date}}</div>
            <div id="single-tools">
            <a href="{{route('index')}}"><button class="back-to">Back To Index</button></a>
            </div>
        </div>
    </div>
@endsection