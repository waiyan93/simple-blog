@extends('layouts.app')
@section('title', '| View Book')
@section('content')
    <div class="container">
    @include('partials.messages')
        <div class="row">
            <div class="col-md-2">
                 <img src="{{ $book->cover_image_url }}" alt="{{ $book->cover_image }}" class="rounded" width="175px" height="250px">
            </div>    
            <div class="col-md-6">
                <h1>{{ $book->title }}</h1>
                <p class="lead">Price : {{ $book->price }}</p>
                <p>Author : {{ $book->author->name }} </p>
                <p>Publisher : {{ $book->publisher->name }} </p>
               
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">

                        <dl class="row">
                            <dt class="col-sm-5">Created At :</dt>
                            <dd class="col-sm-7">{{ date('M j, Y h :ia', strtotime($book->created_at)) }}</dd>
                        </dl>

                        <dl class="row">
                            <dt class="col-sm-5">Updated At :</dt>
                            <dd class="col-sm-7">{{ date('M j, Y h :ia', strtotime($book->updated_at)) }}</dd>
                        </dl>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Html::linkRoute('books.edit', 'Edit', array($book->id), ['class' => 'btn btn-primary btn-block']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::open([
                                    'route' => ['books.destroy', $book->id],
                                    'method' => 'DELETE'
                                    ])
                                !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Html::linkRoute('books.index', 'See All Books', [], ['class' => 'btn btn-success btn-block']) !!}
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
@endsection
