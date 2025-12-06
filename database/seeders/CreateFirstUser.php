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

        // User utama (replace/update berdasarkan email)
        User::updateOrCreate(
            ['email' => 'nabila@gmail.com'],
            [
                'name' => 'Nabila',
                'password' => Hash::make('nabila123'),
                'role' => 'admin'
            ]
        );
    }
}
