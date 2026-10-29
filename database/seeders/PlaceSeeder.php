<?php

namespace Database\Seeders;

use App\Enums\PlaceKind;
use App\Models\Place;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places = [
            ['name' => 'Hall des guichets', 'kind' => PlaceKind::Hall],
            ['name' => 'Quai 1', 'kind' => PlaceKind::Platform],
            ['name' => 'Quai 3', 'kind' => PlaceKind::Platform],
            ['name' => 'Train IC Bruxelles – Wavre', 'kind' => PlaceKind::Train],
        ];

        foreach ($places as $place) {
            Place::create($place);
        }
    }
}
