@extends('layouts.app')
@section('title', '| All Posts')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-4">Welcome To Simple Blog...</h1>
                    <p class="lead">This is a simple blog using Laravel and MySQL.</p>
                    <p><a href="#" class="btn btn-primary btn-lg">Popular Posts</a></p>
                </div>
            </div>
        </div>
        @foreach ($posts as $post)
        <div class="row">
            <div class="col-md-12">
                <h4>{{ $post->title }}</h4>
                <p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "....." : "" }}</p>
                <a href="#" class="btn btn-primary">Read More</a>
                <hr>
            </div>
        </div>
         @endforeach
    </div>
@endsection