@extends('layouts.app')
@section('title', '| View Post')
@section('content')
    <div class="container">
    @include('partials.messages')
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $post->title }}</h1>
                <p class="lead">{{ $post->body }}</p>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Created At:</dt>
                            <dd class="col-sm-8">{{ date('M j, Y h :ia', strtotime($post->created_at)) }}</dd>
                        </dl>

                        <dl class="row">
                            <dt class="col-sm-4">Updated At:</dt>
                            <dd class="col-sm-8">{{ date('M j, Y h :ia', strtotime($post->updated_at)) }}</dd>
                        </dl>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), ['class' => 'btn btn-primary btn-block']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::open([
                                    'route' => ['posts.destroy', $post->id],
                                    'method' => 'DELETE'
                                    ])
                                !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
@endsection
