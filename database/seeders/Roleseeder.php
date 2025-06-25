<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'libelle' => 'Superviseur',
            ],
            [
                'libelle' => 'Administrateur',
            ],
            [
                'libelle' => 'Super Administrateur',
            ],
        ]);
    }
}
