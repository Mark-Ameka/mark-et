<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::factory()->create([
            'fname' => 'Mark',
            'lname' => 'Mendoza',
            'email' => 'mark@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('mark123123'),
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory()->create([
            'fname' => 'Kelly',
            'lname' => 'Cruz',
            'email' => 'kelly@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('kelly123123'),
            'remember_token' => Str::random(10),
        ]);

        // $this->call(UserSeeder::class);
        $this->call(MarketItemsSeeder::class);
    }
}
