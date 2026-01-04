<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ]
        );

        // Create Guru 1
        User::updateOrCreate(
            ['username' => 'guru1'],
            [
                'name' => 'Budi Santoso',
                'password' => Hash::make('password'),
                'role' => 'guru',
            ]
        );

        // Create Guru 2
        User::updateOrCreate(
            ['username' => 'guru2'],
            [
                'name' => 'Siti Aminah',
                'password' => Hash::make('password'),
                'role' => 'guru',
            ]
        );
    }
}
