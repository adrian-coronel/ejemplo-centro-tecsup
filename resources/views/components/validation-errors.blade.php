@if ($errors->any())
    <div {{ $attributes }}>
        <div class="fw-medium text-danger">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="mt-3 text-danger">
            @foreach ($errors->all() as $error)
                <li style="front-size: 11px;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif