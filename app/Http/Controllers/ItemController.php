<?php

namespace App\Http\Controllers;

use App\Enums\Color;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\Place;
use App\Models\Tag;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $placeId = $request->integer('lieu');
        $color = Color::tryFrom((string) $request->query('couleur'));

        $items = Item::with(['place', 'tags'])
            ->whereNull('returned_at')
            ->when($placeId, fn ($query) => $query->where('place_id', $placeId))
            ->when($color, fn ($query) => $query->where('color', $color->value))
            ->orderByDesc('found_on')
            ->get();

        return view('items.index', [
            'items' => $items,
            'places' => Place::orderBy('name')->get(),
            'selectedPlace' => $placeId,
            'selectedColor' => $color,
        ]);
    }

    public function create()
    {
        return view('items.create', [
            'item' => new Item,
            'places' => Place::orderBy('name')->get(),
            'tags' => Tag::orderBy('name')->get(),
        ]);
    }

    public function store(ItemRequest $request)
    {
        $item = Item::create($request->safe()->except('tags'));
        $item->tags()->attach($request->validated('tags', []));

        return redirect()->route('items.show', $item)
            ->with('status', "L'objet a été ajouté.");
    }

    public function show(Item $item)
    {
        $item->load(['place', 'tags']);

        return view('items.show', ['item' => $item]);
    }

    public function return(Item $item)
    {
        if ($item->isReturned()) {
            return redirect()->route('items.show', $item)
                ->with('status', 'Cet objet a déjà été restitué le '.$item->returned_at->format('d/m/Y').'.');
        }

        $item->update(['returned_at' => today()]);

        return redirect()->route('items.show', $item)
            ->with('status', '« '.$item->name.' » a retrouvé son propriétaire.');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')
            ->with('status', "L'objet a été supprimé.");
    }
}
