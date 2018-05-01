{{ Form::open(['route' => 'posts.store','method' => 'POST']) }}
<div class="form-group">
    <label for="title">Title :</label>
    {{ Form::text('title', null, ['class' => 'form-control', 
                                 'placeholder' => 'Enter post title here...'])}}
</div>
<div class="form-group">
    <label for="body">Post Body :</label>
    {{ Form::textarea('body', null, ['class' => 'form-control', 
                                    'placeholder' => 'Enter post content here...']) }}
</div>
<button class="btn btn-success btn-block">Create Post</button>
{{ Form::close() }}