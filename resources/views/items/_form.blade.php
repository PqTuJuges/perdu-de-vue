@php
    $checkedTags = session()->hasOldInput()
        ? array_map('intval', old('tags', []))
        : $item->tags->pluck('id')->all();
@endphp

<div>
    <x-label for="name">Nom</x-label>
    <x-input name="name" :value="old('name', $item->name)" />
    @error('name')
        <p id="name-error" class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="grid gap-6 sm:grid-cols-3">
    <div>
        <x-label for="place_id">Lieu</x-label>
        <x-select name="place_id">
            <option value="">Choisir un lieu</option>
            @foreach ($places as $place)
                <option value="{{ $place->id }}" @selected((int) old('place_id', $item->place_id) === $place->id)>
                    {{ $place->name }}
                </option>
            @endforeach
        </x-select>
        @error('place_id')
            <p id="place_id-error" class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <x-label for="color">Couleur</x-label>
        <x-select name="color">
            <option value="">Choisir une couleur</option>
            @foreach (\App\Enums\Color::cases() as $color)
                <option value="{{ $color->value }}" @selected(old('color', $item->color?->value) === $color->value)>
                    {{ $color->label() }}
                </option>
            @endforeach
        </x-select>
        @error('color')
            <p id="color-error" class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <x-label for="found_on">Date de découverte</x-label>
        <x-input type="date" name="found_on" :value="old('found_on', $item->found_on?->format('Y-m-d'))" />
        @error('found_on')
            <p id="found_on-error" class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>

<div>
    <x-label for="description">Description</x-label>
    <x-textarea name="description">{{ old('description', $item->description) }}</x-textarea>
    @error('description')
        <p id="description-error" class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<fieldset>
    <legend class="block text-sm font-medium">Étiquettes</legend>
    <div class="mt-2 flex flex-wrap gap-2">
        @foreach ($tags as $tag)
            <label class="inline-flex cursor-pointer items-center gap-2 rounded-lg border border-slate-300 bg-white px-3 py-1.5 text-sm hover:bg-slate-50 has-checked:border-blue-700 has-checked:bg-blue-50">
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                       @checked(in_array($tag->id, $checkedTags, true))
                       class="focus-visible:outline-2 focus-visible:outline-blue-600">
                {{ $tag->name }}
            </label>
        @endforeach
    </div>
    @error('tags')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
    @error('tags.*')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</fieldset>
