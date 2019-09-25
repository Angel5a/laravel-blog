@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        {{ __('users.error') }}
    </div>
@endif

<div class="form-group">
    {!! Form::label('name', __('users.name_label')) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'aria-describedby' => 'titleHelpBlock', 'required' =>'']) !!}
    @error('name')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    <small id="nameHelpBlock" class="form-text text-muted">
       {{ __('users.name_help') }}
    </small>
</div>


<div class="form-group">
    {!! Form::label('info', __('users.info_label')) !!}
    {!! Form::textarea('info', null, ['class' => 'form-control', 'aria-describedby' => 'infoHelpBlock']) !!}
    @error('info')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @enderror
    <small id="infoHelpBlock" class="form-text text-muted">
        {{ __('users.info_help') }}
    </small>
</div>

@if (Auth::user()->isAdmin() || Auth::user()->isModerator())
    <div class="form-group">
        {!! Form::label('role', __('users.role_label')) !!}
        @if (Auth::user()->isAdmin())
            {!! Form::select('role', ['banned' => __('users.roles.banned'), 'user' => __('users.roles.user'), 'moderator' => __('users.roles.moderator'), 'admin' => __('users.roles.admin'), ], null, ['class' => 'form-control', 'aria-describedby' => 'roleHelpBlock', 'required' =>'']) !!}
        @elseif (Auth::user()->isModerator())
            {!! Form::select('role', ['banned' => __('users.roles.banned'), 'user' => __('users.roles.user'), ], null, ['class' => 'form-control', 'aria-describedby' => 'roleHelpBlock', 'required' =>'']) !!}
        @else
            {!! Form::text('role', null, ['class' => 'form-control', 'aria-describedby' => 'titleHelpBlock', 'required' =>'', 'disabled' => '']) !!}
        @endif
        @error('role')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        <small id="iroleHelpBlock" class="form-text text-muted">
            {{ __('users.role_help') }}
        </small>
    </div>
@else
    {!! Form::hidden('role') !!}
@endif

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

