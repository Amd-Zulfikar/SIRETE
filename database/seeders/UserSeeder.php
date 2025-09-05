<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    User::create([
        'name' => 'Admin User',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('qwerqwer'),
        'role' => 'admin',
    ]);
    User::create([
        'name' => 'Drafter User',
        'email' => 'drafter@gmail.com',
        'password' => Hash::make('qwerqwer'),
        'role' => 'drafter',
    ]);
    User::create([
        'name' => 'Checker User',
        'email' => 'checker@gmail.com',
        'password' => Hash::make('qwerqwer'),
        'role' => 'checker',
    ]);
}
}
