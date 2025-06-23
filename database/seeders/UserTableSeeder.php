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
            'matricule' => '123456',
            'nom' => 'OUEDRAOGO Ousseni',
            'telephone' => '123456789',
            'services_id' => 1,
            'role' => 'Superviseur',
            'email' => 'ousseneoued@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
