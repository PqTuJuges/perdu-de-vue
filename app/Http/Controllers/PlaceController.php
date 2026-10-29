<?php

namespace App\Http\Controllers;

use App\Models\Place;

class PlaceController extends Controller
{
    public function show(Place $place)
    {
        $items = $place->items()
            ->with(['place', 'tags'])
            ->orderByDesc('found_on')
            ->get();

        return view('places.show', [
            'place' => $place,
            'items' => $items,
        ]);
    }
}
