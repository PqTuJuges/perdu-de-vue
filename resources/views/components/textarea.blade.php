{{-- Une zone de texte. Le contenu va dans le slot. Même mécanisme d'erreur que <x-input>. --}}
@props(['name'])

@php
    $invalid = $errors->has($name);
@endphp

<textarea
    name="{{ $name }}"
    @if ($invalid) aria-invalid="true" aria-describedby="{{ $name }}-error" @endif
        {{ $attributes->merge(['id' => $name])->class([
        'mt-2 block w-full rounded-lg border bg-white px-3 py-2 text-slate-900 shadow-xs focus:ring-3 focus:outline-hidden',
        'border-zinc-300 placeholder:text-zinc-400 focus:border-brand-600 focus:ring-brand-600/20' => ! $invalid,
        'border-red-500 text-red-900 focus:border-red-600 focus:ring-red-600/20' => $invalid,
    ]) }}

>{{ $slot }}</textarea>
