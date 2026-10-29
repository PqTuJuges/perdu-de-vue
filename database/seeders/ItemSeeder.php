<?php

namespace Database\Seeders;

use App\Enums\Color;
use App\Models\Place;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

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
            [
                'place' => 'Hall des guichets',
                'name' => 'Pull de Noël avec un renne qui clignote',
                'description' => 'Taille L, le nez du renne s\'allume quand on appuie dessus. Pile presque morte.',
                'color' => Color::Red,
                'found_on' => '2026-10-01',
                'returned_at' => null,
                'tags' => ['vêtement'],
            ],
            [
                'place' => 'Quai 3',
                'name' => 'Classeur « Mémoire de fin d\'études – FINAL v7 »',
                'description' => 'Environ 80 pages annotées au fluo vert. Post-it « NE PAS PERDRE » sur la couverture.',
                'color' => Color::Blue,
                'found_on' => '2026-10-02',
                'returned_at' => '2026-10-05',
                'tags' => ['document', 'précieux'],
            ],
            [
                'place' => 'Train IC Bruxelles – Wavre',
                'name' => 'Boîte de 12 fromages de Herve',
                'description' => 'Emballage intact mais odeur très présente. Retrouvée grâce aux plaintes des voyageurs.',
                'color' => Color::Yellow,
                'found_on' => '2026-10-04',
                'returned_at' => null,
                'tags' => ['odorant'],
            ],
            [
                'place' => 'Hall des guichets',
                'name' => 'Ordinateur portable couvert d\'autocollants',
                'description' => 'Autocollants de chats astronautes. L\'écran de verrouillage montre un labrador.',
                'color' => Color::Grey,
                'found_on' => '2026-10-05',
                'returned_at' => null,
                'tags' => ['électronique', 'fragile'],
            ],
            [
                'place' => 'Quai 1',
                'name' => 'Cactus en pot nommé Kevin',
                'description' => 'Étiquette « Kevin, arrosage le dimanche » collée sur le pot. Une épine cassée.',
                'color' => Color::Green,
                'found_on' => '2026-10-06',
                'returned_at' => null,
                'tags' => ['vivant'],
            ],
            [
                'place' => 'Quai 3',
                'name' => 'Costume complet de licorne',
                'description' => 'Combinaison en peluche taille adulte, corne dorée un peu tordue.',
                'color' => Color::Pink,
                'found_on' => '2026-10-10',
                'returned_at' => null,
                'tags' => ['vêtement', 'encombrant'],
            ],
            [
                'place' => 'Train IC Bruxelles – Wavre',
                'name' => 'Pièce montée de mariage (à moitié)',
                'description' => 'Choux à la crème sur un plateau en carton, les figurines des mariés sont intactes.',
                'color' => Color::White,
                'found_on' => '2026-10-11',
                'returned_at' => null,
                'tags' => ['fragile'],
            ],
            [
                'place' => 'Hall des guichets',
                'name' => 'Parapluie de golf géant',
                'description' => 'Plus de 1,5 m d\'envergure, manche en bois gravé des initiales « J.-P. D. ».',
                'color' => Color::Purple,
                'found_on' => '2026-10-13',
                'returned_at' => null,
                'tags' => [],
            ],
            [
                'place' => 'Quai 1',
                'name' => 'Citrouille de 12 kilos',
                'description' => 'Visage déjà dessiné au marqueur, pas encore sculptée.',
                'color' => Color::Orange,
                'found_on' => '2026-10-15',
                'returned_at' => null,
                'tags' => ['odorant', 'encombrant'],
            ],
            [
                'place' => 'Train IC Bruxelles – Wavre',
                'name' => 'Doudou lapin avec une oreille recousue',
                'description' => 'Oreille gauche recousue en fil rouge, prénom « Lina » brodé sur la patte.',
                'color' => Color::Multicolor,
                'found_on' => '2026-10-17',
                'returned_at' => '2026-10-20',
                'tags' => ['précieux'],
            ],
            [
                'place' => 'Quai 3',
                'name' => 'Carnet de recettes de grand-mère',
                'description' => 'Couverture en cuir, recette de la tarte au riz marquée « secret ».',
                'color' => Color::Black,
                'found_on' => '2026-10-19',
                'returned_at' => null,
                'tags' => ['document'],
            ],
            [
                'place' => 'Hall des guichets',
                'name' => 'Enceinte Bluetooth qui joue encore',
                'description' => 'S\'est connectée toute seule et a diffusé de l\'accordéon dans le hall pendant une heure.',
                'color' => Color::Brown,
                'found_on' => '2026-10-22',
                'returned_at' => null,
                'tags' => ['électronique'],
            ],
            [
                'place' => 'Quai 1',
                'name' => 'Gant de boxe gauche, seul',
                'description' => 'Taille 12 oz, prénom « Momo » écrit au marqueur à l\'intérieur.',
                'color' => Color::Red,
                'found_on' => '2026-10-25',
                'returned_at' => null,
                'tags' => [],
            ],
        ];

        foreach ($items as $data) {
            $item = $places[$data['place']]->items()->create(
                Arr::except($data, ['place', 'tags'])
            );

            $item->tags()->attach($tags->only($data['tags'])->pluck('id'));
        }
    }
}
