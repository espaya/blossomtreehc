<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'admin',
                'firstname' => 'Super',
                'lastname' => 'Admin',
                'phone' => '0505650790',
                'email' => 'admin@blossomtreehc.com',
                'password' => Hash::make('admin'),
                'role' => 'ADMIN'
            ]
        );
    }
}
