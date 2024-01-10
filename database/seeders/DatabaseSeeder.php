<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Febri',
            'email' => 'febri97@example.com',
            'phone' => '08816648184',
            'roles' => 'STAFF',
            'password' => Hash::make('Febri5656',)
        ]);

        $this->call([
            SoalSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
