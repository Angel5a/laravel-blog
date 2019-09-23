@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        {{ __('Error occured while processing request.') }}
    </div>
@endif

<div class="form-group">
    {!! Form::label('name', __('Name:')) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'aria-describedby' => 'titleHelpBlock', 'required' =>'']) !!}
    @error('name')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    <small id="nameHelpBlock" class="form-text text-muted">
       {{ _('Name is required and should be less than 256 characters long.') }}
    </small>
</div>


<div class="form-group">
    {!! Form::label('info', __('Info:')) !!}
    {!! Form::textarea('info', null, ['class' => 'form-control', 'aria-describedby' => 'infoHelpBlock']) !!}
    @error('body')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    <small id="infoHelpBlock" class="form-text text-muted">
        {{ __('Tell us something about yourself.') }}
    </small>
</div>

@if (Auth::user()->isAdmin() || Auth::user()->isModerator())
    <div class="form-group">
        {!! Form::label('role', __('Role:')) !!}
        @if (Auth::user()->isAdmin())
            {!! Form::select('role', ['banned' => __('Banned user'), 'user' => __('User'), 'moderator' => __('Moderator'), 'admin' => __('Admin'), ], null, ['class' => 'form-control', 'aria-describedby' => 'roleHelpBlock', 'required' =>'']) !!}
        @elseif (Auth::user()->isModerator())
            {!! Form::select('role', ['banned' => __('Banned user'), 'user' => __('User'), ], null, ['class' => 'form-control', 'aria-describedby' => 'roleHelpBlock', 'required' =>'']) !!}
        @else
            {!! Form::text('role', null, ['class' => 'form-control', 'aria-describedby' => 'titleHelpBlock', 'required' =>'', 'disabled' => '']) !!}
        @endif
        @error('role')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        <small id="iroleHelpBlock" class="form-text text-muted">
            {{ __('User\'s role on site.') }}
        </small>
    </div>
@else
    {!! Form::hidden('role') !!}
@endif

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

