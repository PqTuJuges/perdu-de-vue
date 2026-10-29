@props(['item', 'showStatus' => false])

<x-card class="flex flex-col gap-3">
    <div class="flex items-start justify-between gap-2">
        <h2 class="text-lg font-semibold">
            <a href="{{ route('items.show', $item) }}"
               class="rounded hover:text-blue-700 hover:underline focus-visible:outline-2 focus-visible:outline-blue-600">
                {{ $item->name }}
            </a>
        </h2>

        @if ($showStatus)
            @if ($item->isReturned())
                <x-badge classes="bg-green-100 text-green-800">Restitué</x-badge>
            @else
                <x-badge classes="bg-yellow-100 text-yellow-900">En attente</x-badge>
            @endif
        @endif
    </div>

    <p class="text-sm text-slate-600">
        Trouvé le {{ $item->found_on->format('d/m/Y') }} · {{ $item->place->name }}
    </p>

    <div class="flex flex-wrap gap-2">
        <x-badge :classes="$item->place->kind->badgeClasses()">{{ $item->place->kind->label() }}</x-badge>
        <x-badge :classes="$item->color->badgeClasses()">{{ $item->color->label() }}</x-badge>
    </div>

    @if ($item->tags->isNotEmpty())
        <div class="flex flex-wrap gap-2">
            @foreach ($item->tags as $tag)
                <x-badge>{{ $tag->name }}</x-badge>
            @endforeach
        </div>
    @endif
</x-card>
