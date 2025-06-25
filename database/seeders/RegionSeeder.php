<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regions')->insert([
            ['libelle' => 'Région sanitaire des Hauts Bassins', 'region_ordinal_id' => 1],
            ['libelle' => 'Région sanitaire des Cascades', 'region_ordinal_id' => 1],
            ['libelle' => 'Région sanitaire du Sud-Ouest', 'region_ordinal_id' => 1],
            ['libelle' => 'Région sanitaire de la Boucle du Mouhoun', 'region_ordinal_id' => 1],

            ['libelle' => 'Région sanitaire du Centre', 'region_ordinal_id' => 2],
            ['libelle' => 'Région sanitaire du Centre-Ouest', 'region_ordinal_id' => 2],
            ['libelle' => 'Région sanitaire du Nord', 'region_ordinal_id' => 3],
            ['libelle' => 'Région sanitaire du Plateau-Central', 'region_ordinal_id' => 2],
            ['libelle' => 'Région sanitaire du Centre-Sud', 'region_ordinal_id' => 2],

            ['libelle' => 'Région sanitaire de l’Est', 'region_ordinal_id' => 3],
            ['libelle' => 'Région sanitaire du Sahel', 'region_ordinal_id' => 3],
            ['libelle' => 'Région sanitaire du Centre-Est', 'region_ordinal_id' => 3],
            ['libelle' => 'Région sanitaire du Centre-Nord', 'region_ordinal_id' => 3],
        ]);
    }
}
