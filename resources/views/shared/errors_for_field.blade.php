@if ($errors->has($field))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->get($field) as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
