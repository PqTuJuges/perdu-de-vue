@props(['classes' => 'bg-slate-100 text-slate-700'])

<span {{ $attributes->class(['inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold', $classes]) }}>
    {{ $slot }}
</span>
