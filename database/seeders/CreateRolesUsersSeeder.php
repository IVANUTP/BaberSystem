<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class CreateRolesUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // ADMIN
        User::updateOrCreate(
            ['email' => 'admin@barber.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('Admin12345'),
                'role' => 'admin'
            ]
        );
    }
}
