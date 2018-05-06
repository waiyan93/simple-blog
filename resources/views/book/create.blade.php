@extends('layouts.app-book')
@section('title', '| Create New Book')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Create New Book</h1>
            <hr>
            {!! Form::open([
                    'route' => 'books.store',
                    'method' => 'POST',
                    'files' => 'true'
                ]) 
            !!}
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Title :</label>
                {{ Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Enter title here...']) }}
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">Price :</label>
                {{ Form::text('price', old('price'), ['class' => 'form-control', 'placeholder' => 'Enter price here...']) }}
                @if ($errors->has('price'))
                    <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('price') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('author') ? 'has-error' : '' }}">
                <label for="author">Author :</label>
                {{ Form::text('author', old('author'), ['class' => 'form-control', 'placeholder' => 'Enter author here...']) }}
                @if ($errors->has('author'))
                    <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('author') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('publisher') ? 'has-error' : '' }}">
                <label for="publisher">Publisher :</label>
                {{ Form::text('publisher', old('publisher'), ['class' => 'form-control', 'placeholder' => 'Enter publisher here...']) }}
                @if ($errors->has('publisher'))
                    <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('publisher') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('cover_image') ? 'has-error' : '' }}">
                <label for="cover_image">Cover Image :</label>
                <br>
                {{ Form::file('cover_image', old('cover_image'), ['class' => 'form-control', 'placeholder' => 'Upload cover image here...']) }}
                <br>
                @if ($errors->has('cover_image'))
                    <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('cover_image') }}</strong>
                    </span>
                @endif
            </div>
            {{ Form::submit('Save Book', ['class' => 'btn btn-success btn-block']) }}
            {!! Form::close() !!}
        </div>
    </div>
</div>  
@stop