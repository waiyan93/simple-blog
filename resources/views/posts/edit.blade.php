@extends('layouts.app')
@section('title', '| Edit Blog Post')
@section('content')
    <div class="container">
    @include('partials.messages')
    {!! Form::model($post,[
            'route' => ['posts.update', $post->id],
            'method' => 'PUT'
            ]) 
    !!}
        <div class="row">
            <div class="col-md-8">
                <label for="title">Title :</label>
                {{ Form::text('title', null, ['class' => 'form-control form-control-lg']) }}
                <label for="body" class="form-spacing-top">Body :</label>
                {{ Form::textarea('body', null, ['class' => 'form-control']) }}
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
                                {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                            </div>
                            <div class="col-sm-6">
                                {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), ['class' => 'btn btn-danger btn-block']) !!}
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
         {!! Form::close() !!}
    </div>
@endsection
