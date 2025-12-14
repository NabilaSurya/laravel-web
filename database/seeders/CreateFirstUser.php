<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // User utama
        User::updateOrCreate(
            ['email' => 'nabila@gmail.com'],
            [
                'name' => 'Nabila',
                'password' => Hash::make('nabila123'),
                'role' => 'admin'
            ]
        );

        // Tambahkan 1000 user Indonesia
        for ($i = 0; $i < 1000; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'), // default
                'role' => 'user',  // sesuaikan kalau pakai enum/role lain
            ]);
        }
    }
}
