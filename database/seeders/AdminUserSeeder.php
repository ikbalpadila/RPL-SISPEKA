<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::updateOrCreate(
            ['email' => 'admin@sispeka.com'], // kondisi pencarian
            [
                'name' => 'Admin SISPEKA',
                'username' => 'adminsispeka',
                'password' => Hash::make('sispeka123'),
                'role' => 'admin',
            ]
        );

    }
}
