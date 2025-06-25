<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'matricule' => '123456',
                'nom' => 'OUEDRAOGO',
                'prenom' => 'Ousseni',
                'telephone' => '123456789',
                'role_id' => 1,
                'section_id' => 1,
                'email' => 'ousseneoued@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'matricule' => '654321',
                'nom' => 'SOME',
                'prenom' => 'Aissatou',
                'telephone' => '987654321',
                'role_id' => 2,
                'section_id' => 2,
                'email' => 'aissatou.some@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'matricule' => '789012',
                'nom' => 'KABORE',
                'prenom' => 'Jean',
                'telephone' => '456789123',
                'role_id' => 3,
                'section_id' => 3,
                'email' => 'jean.kabore@example.com',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
