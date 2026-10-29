<x-layouts.app :title="'Modifier '.$item->name">
    <a href="{{ route('items.show', $item) }}"
       class="rounded text-sm font-medium text-blue-800 hover:underline focus-visible:outline-2 focus-visible:outline-blue-600">
        ← Retour à la fiche
    </a>

    <h1 class="mt-4 mb-6 text-2xl font-bold">Modifier « {{ $item->name }} »</h1>

    <x-card>
        <form method="POST" action="{{ route('items.update', $item) }}" class="flex flex-col gap-6">
            @csrf
            @method('PUT')

            @include('items._form')

            <div class="flex flex-wrap gap-2">
                <x-button>Enregistrer les modifications</x-button>
                <x-button variant="secondary" :href="route('items.show', $item)">Annuler</x-button>
            </div>
        </form>
    </x-card>
</x-layouts.app>
