<h1>Objets trouvés</h1>

@foreach ($items as $item)
    <article>
        <h2>{{ $item->name }}</h2>
        <p>
            {{ $item->place->name }} ({{ $item->place->kind->label() }})
            · {{ $item->found_on->format('d/m/Y') }}
            · {{ $item->color->label() }}
        </p>
        <p>
            @foreach ($item->tags as $tag)
                <span>{{ $tag->name }}</span>
            @endforeach
        </p>
    </article>
@endforeach
