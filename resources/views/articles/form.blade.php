@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        {{ __('Error occured while processing request.') }}
    </div>
@endif

<div class="form-group">
    {!! Form::label('title', __('Title:')) !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'aria-describedby' => 'titleHelpBlock', 'required' =>'']) !!}
    @error('title')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    <small id="titleHelpBlock" class="form-text text-muted">
       {{ _('Article title required and should be less than 256 characters long.') }}
    </small>
</div>

<div class="form-group">
    {!! Form::label('body', __('Body:')) !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'aria-describedby' => 'titleHelpBlock', 'required' =>'']) !!}
    @error('body')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    <small id="textHelpBlock" class="form-text text-muted">
        {{ __('Fill the article body here.') }}
    </small>
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

