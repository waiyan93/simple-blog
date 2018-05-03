@extends('layouts.app')
@section('title', '| All Posts')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>All Posts</h1>
            </div>
            <div class="col-md-2">
                {!! Html::linkRoute('posts.create', 'Create New Post', null, ['class' => 'btn btn-block btn-primary btn-h1-spacing']) !!}
            </div>
            <div class="col-md-12">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
             @include('partials.messages')
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($posts as $key => $post)
                            <tr>
                                <th>{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? "....." : ""}}</td>
                                <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                                <td>
                                    {!! Html::linkRoute('posts.show', 'View', array($post->id), ['class' => 'btn btn-secondary btn-sm']) !!}
                                    {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), ['class' => 'btn btn-secondary btn-sm']) !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>
    @foreach ($posts as $post)

    @endforeach
@endsection