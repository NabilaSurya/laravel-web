<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // User utama
        User::create([
            'name' => 'Nabila',
            'email' => 'nabila@gmail.com',
            'password' => Hash::make('nabila123'),
        ]);

        // Generate 1000 user lain
        for ($i = 0; $i < 1000; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
            ]);
        }
    }
}
