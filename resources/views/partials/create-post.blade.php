{{ Form::open(['route' => 'posts.store','method' => 'POST', 'data-parsley-validate' => '']) }}
<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <label for="title">Title :</label>
    {{ Form::text('title', old('title'), [
                    'class' => 'form-control', 
                    'placeholder' => 'Enter post title here...',
                    'required' => '',
                    'maxlength' => '255'
                    ]) 
    }}
    @if ($errors->has('title'))
        <span class="help-block">
            <strong class="text-danger">{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
    <label for="slug">Slug :</label>
    {{ Form::text('slug', old('slug'), [
                                    'class' => 'form-control',
                                    'placeholder' => 'Enter slug here...',
                                    'required' => '',
                                    'minlength' => '5',
                                    'maxlength' => '255'
        ])
    }}
      @if ($errors->has('slug'))
        <span class="help-block">
            <strong class="text-danger">{{ $errors->first('slug') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
    <label for="body">Post Body :</label>
    {{ Form::textarea('body', old('body'), [
                                    'class' => 'form-control', 
                                    'placeholder' => 'Enter post content here...',
                                    'required' => ''
                                    ]) 
    }}
    @if ($errors->has('body'))
        <span class="help-block">
            <strong class="text-danger">{{ $errors->first('body') }}</strong>
        </span>
    @endif
</div>
<button class="btn btn-success btn-block">Create Post</button>
{{ Form::close() }}