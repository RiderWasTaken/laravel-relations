@extends('layouts.app')

@section('content')

<div class="card-container d-block">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1 class="white mb-5">Edit the book you already posted here :)</h1>

    <form class="white" action="{{route('articles.update', $article)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">        
            <input type="text" name="title" id="title" value="{{$article->title}}">
            <label for="title">Article Title</label>
        </div>

        <div class="form-group">        
            <input type="text" name="subtitle" id="subtitle" value="{{$article->subtitle}}">
            <label for="subtitle">Article Subtitle</label>
        </div>

        <div class="form-group">
            <input type="text" name="description" id="description" value="{{$article->description}}">
            <label for="description">Article Description</label>
        </div>

        <div class="form-group">
            <input type="date" name="date" id="date" value="{{$article->date}}">
            <label for="date">Date of Release</label>
        </div>        

        <input type="submit" value="save">

    </form>

</div>

@endsection

