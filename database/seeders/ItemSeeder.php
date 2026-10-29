<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $places = Place::all()->keyBy('name');
    $tags = Tag::all()->keyBy('name');

    $items = [
        [
            'place' => 'Quai 1',
            'name' => 'Trottinette électrique pliée',
            'description' => 'Autocollant « Team Brocoli » sur le guidon, batterie à moitié vide.',
            'color' => Color::Black,
            'found_on' => '2026-10-03',
            'returned_at' => null,
            'tags' => ['électronique', 'encombrant'],
        ],
        [
            'place' => 'Train IC Bruxelles – Wavre',
            'name' => 'Hamster dans une boîte à chaussures',
            'description' => 'Répond (parfois) au nom de Biscotte. Boîte percée de petits trous.',
            'color' => Color::Brown,
            'found_on' => '2026-10-08',
            'returned_at' => '2026-10-09',
            'tags' => ['vivant', 'fragile'],
        ],
        // ... tes 13 autres objets
    ];

    foreach ($items as $data) {
        $item = $places[$data['place']]->items()->create(
            Arr::except($data, ['place', 'tags'])
        );

        $item->tags()->attach($tags->only($data['tags'])->pluck('id'));
    }
}
