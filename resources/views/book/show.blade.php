@extends('layouts.app')
@section('title', '| View Book')
@section('content')
    <div class="container">
    @include('partials.messages')
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $book->title }}</h1>
                <p class="lead">Price : {{ $book->price }}</p>
                <p>Author : {{ $book->author->name }} </p>
                <p>Publisher : {{ $book->publisher->name }} </p>
            </div>
            <div class="col-md-4">
                <img src="/uploads/{{ $book->cover_image }}" alt="{{ $book->cover_image }}" class="img-fluid rounded">
            </div>
        </div>
    </div>
@endsection
