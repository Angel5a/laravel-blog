@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        {{ __('comments.error') }}
    </div>
@endif

{!! Form::hidden('article_id', $article_id) !!}
@error('article_id')
    <div class="alert alert-danger" role="alert">
        {{ $message }}
    </div>
@enderror

<div class="form-group">
    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3, 'aria-describedby' => 'bodyHelpBlock']) !!}
    @error('body')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    <small id="bodyHelpBlock" class="form-text text-muted">
        {{ __('comments.body_help') }}
    </small>
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

