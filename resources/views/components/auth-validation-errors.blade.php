@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red">
            <b>{{ __('Whoops! Something went wrong.') }}</b>
        </div>

        <div class="text-sm text-red">
            @foreach ($errors->all() as $error)
                <div class="text-red-600">{{ $error }}</div>
            @endforeach
        </div>
    </div>
@endif
