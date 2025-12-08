<?php

namespace Database\Seeders;

use App\Models\Aset;
use App\Models\KategoriAset;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Ambil semua kategori yang sudah ada
        $kategoris = KategoriAset::all();

        if ($kategoris->isEmpty()) {
            $this->command->info('Tidak ada kategori aset. Tambahkan kategori dulu!');
            return;
        }

        for ($i = 1; $i <= 1000; $i++) {
            $kategori = $kategoris->random(); // pilih kategori random

            Aset::create([
                'kategori_id' => $kategori->kategori_id,
                'kode_aset' => 'AST' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'nama_aset' => $faker->word . ' ' . $faker->randomElement(['Laptop', 'Printer', 'Meja', 'Kursi', 'Proyektor', 'AC']),
                'tgl_perolehan' => $faker->date('Y-m-d', 'now'),
                'nilai_perolehan' => $faker->numberBetween(500000, 20000000),
                'kondisi' => $faker->randomElement(['Baik', 'Cukup', 'Rusak']),
            ]);
        }
    }
}
