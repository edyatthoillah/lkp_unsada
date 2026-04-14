<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin LKP Unsada',
            'email' => 'lkpunsada@gmail.com',
            'password' => Hash::make('lkpunsada2026'),
        ]);

        // Assign role dari Spatie
        $user->assignRole('admin');
    }
}
