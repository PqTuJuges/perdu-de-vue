<x-layouts.app :title="$place->name">
    <a href="{{ route('items.index') }}"
       class="rounded text-sm font-medium text-blue-800 hover:underline focus-visible:outline-2 focus-visible:outline-blue-600">
        ← Retour à la liste
    </a>

    <div class="mt-4 mb-6 flex flex-wrap items-center gap-3">
        <h1 class="text-2xl font-bold">{{ $place->name }}</h1>
        <x-badge :classes="$place->kind->badgeClasses()">{{ $place->kind->label() }}</x-badge>
    </div>

    @if ($items->isEmpty())
        <p class="text-slate-600">Aucun objet n'a été trouvé à cet endroit.</p>
    @else
        <p class="mb-6 text-slate-600">{{ $items->count() }} objet(s) trouvé(s) ici.</p>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($items as $item)
                <x-item-card :item="$item" :show-status="true" />
            @endforeach
        </div>
    @endif
</x-layouts.app>
