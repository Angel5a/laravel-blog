@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        {{ __('Error occured.') }}
        <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
