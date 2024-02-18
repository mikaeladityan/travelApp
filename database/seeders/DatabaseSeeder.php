<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Developer User
        \App\Models\User::factory()->create([
            'firstName' => 'Mikael',
            'lastName' => 'Aditya Nugroho',
            'username' => 'mikaeladityan',
            'email' => "mikaeladityan.99@gmail.com",
            'password' => Hash::make('@Laborare11'),
            'role_id' => '2',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);



        \App\Models\Role::factory()->create([
            'role' => 'Member',
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'Developer',
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'Owner',
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'Manajer',
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'Staff',
        ]);
        \App\Models\Role::factory()->create([
            'role' => 'Driver',
        ]);
    }
}
