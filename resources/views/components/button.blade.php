@props(['variant' => 'primary', 'href' => null])

@php
    $classes = [
        'inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2 text-sm font-semibold transition focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600',
        match ($variant) {
            'primary' => 'bg-blue-900 text-white hover:bg-blue-700',
            'secondary' => 'border border-slate-300 bg-white text-slate-800 hover:bg-slate-100',
            'success' => 'bg-green-600 text-white hover:bg-green-700',
            'danger' => 'bg-red-600 text-white hover:bg-red-700',
        },
    ];
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class($classes) }}>{{ $slot }}</a>
@else
    <button {{ $attributes->merge(['type' => 'submit'])->class($classes) }}>{{ $slot }}</button>
@endif
