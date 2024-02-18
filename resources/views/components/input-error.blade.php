@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@elseif(session()->has('success'))
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-teal-400 space-y-1']) }}>
        <li>{{ $message }}</li>
    </ul>
@endif
