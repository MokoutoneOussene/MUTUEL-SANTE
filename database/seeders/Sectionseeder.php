<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Sectionseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->insert([
            [
                'libelle' => 'Section A',
                'description' => 'Description de la Section A',
            ],
            [
                'libelle' => 'Section B',
                'description' => 'Description de la Section B',
            ],
            [
                'libelle' => 'Section C',
                'description' => 'Description de la Section C',
            ],
            [
                'libelle' => 'Section D',
                'description' => 'Description de la Section D',
            ],
        ]);
    }
}
