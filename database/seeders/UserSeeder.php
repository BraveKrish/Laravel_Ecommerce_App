<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Manager User',
            'email' => 'manager@gmail.com',
            'phone' => '9804074883',
            'password' => Hash::make('admin1234'),
            'role' => 'manager',
            'status' => 1
        ]);
    }
}
