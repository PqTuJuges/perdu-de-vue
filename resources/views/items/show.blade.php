<x-layouts.app :title="$item->name">
    <a href="{{ route('items.index') }}"
       class="rounded text-sm font-medium text-blue-800 hover:underline focus-visible:outline-2 focus-visible:outline-blue-600">
        ← Retour à la liste
    </a>

    <x-card class="mt-4 flex flex-col gap-6">
        <div class="flex flex-wrap items-start justify-between gap-4">
            <h1 class="text-2xl font-bold">{{ $item->name }}</h1>

            @if ($item->isReturned())
                <x-badge classes="bg-green-100 text-green-800">Restitué</x-badge>
            @else
                <x-badge classes="bg-yellow-100 text-yellow-900">En attente</x-badge>
            @endif
        </div>

        <dl class="grid gap-4 sm:grid-cols-2">
            <div>
                <dt class="text-sm font-medium text-slate-500">Lieu</dt>
                <dd class="mt-1 flex flex-wrap items-center gap-2">
                    <a href="{{ route('places.show', $item->place) }}"
                       class="rounded font-semibold text-blue-800 hover:underline focus-visible:outline-2 focus-visible:outline-blue-600">
                        {{ $item->place->name }}
                    </a>
                    <x-badge :classes="$item->place->kind->badgeClasses()">{{ $item->place->kind->label() }}</x-badge>
                </dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-slate-500">Trouvé le</dt>
                <dd class="mt-1">{{ $item->found_on->format('d/m/Y') }}</dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-slate-500">Couleur</dt>
                <dd class="mt-1">
                    <x-badge :classes="$item->color->badgeClasses()">{{ $item->color->label() }}</x-badge>
                </dd>
            </div>

            @if ($item->isReturned())
                <div>
                    <dt class="text-sm font-medium text-slate-500">Restitué le</dt>
                    <dd class="mt-1">{{ $item->returned_at->format('d/m/Y') }}</dd>
                </div>
            @endif
        </dl>

        <div>
            <h2 class="text-sm font-medium text-slate-500">Description</h2>
            <p class="mt-1 whitespace-pre-line">{{ $item->description ?? 'Aucune description.' }}</p>
        </div>

        <div>
            <h2 class="text-sm font-medium text-slate-500">Étiquettes</h2>
            <div class="mt-1 flex flex-wrap gap-2">
                @forelse ($item->tags as $tag)
                    <x-badge>{{ $tag->name }}</x-badge>
                @empty
                    <p class="text-slate-600">Aucune étiquette.</p>
                @endforelse
            </div>
        </div>

        <div class="flex flex-wrap gap-2 border-t border-slate-200 pt-6">
            <x-button variant="secondary" :href="route('items.edit', $item)">Modifier</x-button>

            @unless ($item->isReturned())
                <form method="POST" action="{{ route('items.return', $item) }}">
                    @csrf
                    @method('PATCH')
                    <x-button variant="success">Marquer comme restitué</x-button>
                </form>
            @endunless

            <form method="POST" action="{{ route('items.destroy', $item) }}"
                  onsubmit="return confirm('Supprimer définitivement cet objet ?')">
                @csrf
                @method('DELETE')
                <x-button variant="danger">Supprimer</x-button>
            </form>
        </div>
    </x-card>
</x-layouts.app>
