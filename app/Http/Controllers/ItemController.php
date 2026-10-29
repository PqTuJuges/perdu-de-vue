<?php

namespace App\Http\Controllers;

use App\Enums\Color;
use App\Models\Item;
use App\Models\Place;
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
}
