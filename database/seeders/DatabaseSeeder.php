<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        \App\Models\User::create([
            'nama'                  => 'Root Administrator',
            'username'              => 'root',
            'email'                 => 'admin@admin.com',
            'password'              => bcrypt('12345678'),
            'no_tlpn'              => '085213298664',
            'role'                  => 'admin'
           
        ]);

        \App\Models\User::create([
            'nama'                  => 'user2',
            'username'              => 'user2',
            'email'                 => 'admin@admin.com',
            'password'              => bcrypt('12345678'),
            'no_tlpn'              => '085213298664',
           
        ]);
        \App\Models\User::create([
            'nama'                  => 'user3',
            'username'              => 'user3',
            'email'                 => 'admin@admin.com',
            'password'              => bcrypt('12345678'),
            'no_tlpn'              => '085213298664',
           
        ]);
    }
}
