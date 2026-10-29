<?php

namespace Database\Seeders;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'fragile',
            'vivant',
            'électronique',
            'encombrant',
            'précieux',
            'vêtement',
            'odorant',
            'document'
        ];

        foreach ($names as $name) {
            Tag::create(['name' => $name]);
        }
    }
}
