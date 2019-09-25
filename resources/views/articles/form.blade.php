@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        {{ __('articles.error') }}
    </div>
@endif

<div class="form-group">
    {!! Form::label('title', __('articles.title_label')) !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'aria-describedby' => 'titleHelpBlock', 'required' =>'']) !!}
    @error('title')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    <small id="titleHelpBlock" class="form-text text-muted">
       {{ __('articles.title_help') }}
    </small>
</div>

<div class="form-group">
    {!! Form::label('body', __('articles.body_label')) !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'aria-describedby' => 'bodyHelpBlock', 'required' =>'']) !!}
    @error('body')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    <small id="bodyHelpBlock" class="form-text text-muted">
        {{ __('articles.body_help') }}
    </small>
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

