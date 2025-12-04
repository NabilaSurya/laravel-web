<?php

namespace Database\Seeders;

use App\Models\Warga;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 1000; $i++) {
            Warga::create([
                'nik' => $faker->unique()->numerify('################'),
                'nama' => $faker->name(),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'alamat' => $faker->address(),
                'no_hp' => $faker->phoneNumber(),
            ]);
        }
    }
}
