<?php

namespace Database\Seeders;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Novita Syahwa Tri Hapsari',
            'email' => 'novitasyahwahapsari@gmail.com',
            'password' => bcrypt('Novita16,'),
            'no_ktp' => '3103',
            'no_hp' => '081229555381',
            'role' => 'admin'
        ]);
    }
}
