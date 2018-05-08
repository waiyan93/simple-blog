@extends('layouts.app')
@section('title', '| Edit Book')
@section('content')
    <div class="container">
    @include('partials.messages')
    {!! Form::model($book,[
            'route' => ['books.update', $book->id],
            'method' => 'PUT',
            'files' => true
            ]) 
    !!}
        <div class="row">
            <div class="col-md-2">
                <img src="{{ $book->cover_image_url }}" id="imgPreview" alt="{{ $book->cover_image }}" class="rounded" width="175px" height="250px">
            </div>
            <div class="col-md-6">
                <label for="title">Title :</label>
                {{ Form::text('title', null, ['class' => 'form-control form-control-lg']) }}
                <label for="pruce" class="form-spacing-top">Price :</label>
                {{ Form::text('price', null, ['class' => 'form-control']) }}
                <label for="author" class="form-spacing-top">Author :</label>
                {{ Form::text('author', $author, ['class' => 'form-control']) }}
                <label for="publisher" class="form-spacing-top">Publisher :</label>
                {{ Form::text('publisher', $publisher, ['class' => 'form-control']) }}
                <br>
                <label for="cover_image">Cover Image :</label>
                <br>
                <input type="file" name="cover_image" class="form-control" id="cover_image">
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Created At:</dt>
                            <dd class="col-sm-8">{{ date('M j, Y h :ia', strtotime($book->created_at)) }}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4">Updated At:</dt>
                            <dd class="col-sm-8">{{ date('M j, Y h :ia', strtotime($book->updated_at)) }}</dd>
                        </dl>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                            </div>
                            <div class="col-sm-6">
                                {!! Html::linkRoute('posts.show', 'Cancel', array($book->id), ['class' => 'btn btn-danger btn-block']) !!}
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
         {!! Form::close() !!}
    </div>
@endsection


