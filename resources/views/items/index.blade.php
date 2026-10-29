<x-layouts.app title="Objets trouvés">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <h1 class="text-2xl font-bold">Objets trouvés</h1>
        <x-button :href="route('items.create')">Ajouter un objet</x-button>
    </div>

    <form method="GET" action="{{ route('items.index') }}"
          class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end">
        <div class="flex flex-col gap-1">
            <label for="lieu" class="text-sm font-medium">Lieu</label>
            <select id="lieu" name="lieu"
                    class="rounded-lg border border-slate-300 bg-white px-3 py-2 focus-visible:outline-2 focus-visible:outline-blue-600">
                <option value="">Tous les lieux</option>
                @foreach ($places as $place)
                    <option value="{{ $place->id }}" @selected($selectedPlace === $place->id)>{{ $place->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col gap-1">
            <label for="couleur" class="text-sm font-medium">Couleur</label>
            <select id="couleur" name="couleur"
                    class="rounded-lg border border-slate-300 bg-white px-3 py-2 focus-visible:outline-2 focus-visible:outline-blue-600">
                <option value="">Toutes les couleurs</option>
                @foreach (\App\Enums\Color::cases() as $color)
                    <option value="{{ $color->value }}" @selected($selectedColor === $color)>{{ $color->label() }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-2">
            <x-button>Filtrer</x-button>
            <x-button variant="secondary" :href="route('items.index')">Réinitialiser</x-button>
        </div>
    </form>

    @if ($items->isEmpty())
        <p class="text-slate-600">Aucun objet ne correspond à ces filtres.</p>
    @else
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($items as $item)
                <x-item-card :item="$item" />
            @endforeach
        </div>
    @endif
</x-layouts.app>
