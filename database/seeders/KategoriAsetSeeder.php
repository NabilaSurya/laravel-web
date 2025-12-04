<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriAsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        // Generate 1000 data baru
        for ($i = 1; $i <= 1000; $i++) {
            $data[] = [
                'nama' => 'Kategori Aset ' . $i,
                'kode' => 'KA' . $i,
                'deskripsi' => 'Deskripsi kategori aset ke-' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('kategori_aset')->insert($data);
    }
}
