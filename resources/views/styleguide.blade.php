@php
    // Un objet de démonstration construit en mémoire, sans requête en base.
    $demoItem = (new \App\Models\Item)->forceFill([
        'id' => 1,
        'name' => 'Objet de démonstration',
        'color' => \App\Enums\Color::Blue,
        'found_on' => '2026-10-20',
    ]);
    $demoItem->setRelation('place', new \App\Models\Place([
        'name' => 'Quai 1',
        'kind' => \App\Enums\PlaceKind::Platform,
    ]));
    $demoItem->setRelation('tags', new \Illuminate\Database\Eloquent\Collection([
        new \App\Models\Tag(['name' => 'fragile']),
        new \App\Models\Tag(['name' => 'précieux']),
    ]));
@endphp

<x-layouts.app title="Composants">
    <h1 class="mb-8 text-2xl font-bold">Composants</h1>

    <div class="flex flex-col gap-10">
        <section>
            <h2 class="mb-4 text-lg font-semibold">Boutons : &lt;x-button&gt;</h2>
            <div class="flex flex-wrap gap-2">
                <x-button type="button">Primaire</x-button>
                <x-button type="button" variant="secondary">Secondaire</x-button>
                <x-button type="button" variant="success">Succès</x-button>
                <x-button type="button" variant="danger">Danger</x-button>
                <x-button href="#">Lien en bouton</x-button>
            </div>
        </section>

        <section>
            <h2 class="mb-4 text-lg font-semibold">Badges : &lt;x-badge&gt;</h2>

            <h3 class="mb-2 text-sm font-medium text-slate-500">Statut</h3>
            <div class="mb-4 flex flex-wrap gap-2">
                <x-badge classes="bg-yellow-100 text-yellow-900">En attente</x-badge>
                <x-badge classes="bg-green-100 text-green-800">Restitué</x-badge>
                <x-badge>étiquette</x-badge>
            </div>

            <h3 class="mb-2 text-sm font-medium text-slate-500">Sortes de lieu</h3>
            <div class="mb-4 flex flex-wrap gap-2">
                @foreach (\App\Enums\PlaceKind::cases() as $kind)
                    <x-badge :classes="$kind->badgeClasses()">{{ $kind->label() }}</x-badge>
                @endforeach
            </div>

            <h3 class="mb-2 text-sm font-medium text-slate-500">Couleurs</h3>
            <div class="flex flex-wrap gap-2">
                @foreach (\App\Enums\Color::cases() as $color)
                    <x-badge :classes="$color->badgeClasses()">{{ $color->label() }}</x-badge>
                @endforeach
            </div>
        </section>

        <section>
            <h2 class="mb-4 text-lg font-semibold">Carte : &lt;x-card&gt;</h2>
            <x-card class="max-w-sm">
                <p>Le contenu d'une carte.</p>
            </x-card>
        </section>

        <section>
            <h2 class="mb-4 text-lg font-semibold">Carte d'objet : &lt;x-item-card&gt;</h2>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <x-item-card :item="$demoItem" />
                <x-item-card :item="$demoItem" :show-status="true" />
            </div>
        </section>

        <section>
            <h2 class="mb-4 text-lg font-semibold">Champs de formulaire</h2>
            <x-card class="flex max-w-xl flex-col gap-6">
                <div>
                    <x-label for="demo-input">&lt;x-input&gt;</x-label>
                    <x-input name="demo-input" placeholder="Un texte" />
                </div>
                <div>
                    <x-label for="demo-select">&lt;x-select&gt;</x-label>
                    <x-select name="demo-select">
                        <option>Première option</option>
                        <option>Deuxième option</option>
                    </x-select>
                </div>
                <div>
                    <x-label for="demo-textarea">&lt;x-textarea&gt;</x-label>
                    <x-textarea name="demo-textarea">Un texte plus long.</x-textarea>
                </div>
            </x-card>
        </section>
    </div>
</x-layouts.app>
