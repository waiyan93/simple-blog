@extends('layouts.app')
@section('title', '| Create New Post')
@section('stylesheets')
 {!! Html::style('css/parsley.css') !!}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create New Post</h1>
                <hr>
                @include('partials.create-post')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('js/parsley.min.js') !!}
@endsection