<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        DB::table('m_kategori')->upsert(
            [
                ['kategori_id' => 1, 'kategori_kode' => 'ELC', 'kategori_nama' => 'Elektronik', 'created_at' => $now, 'updated_at' => $now],
                ['kategori_id' => 2, 'kategori_kode' => 'SNK', 'kategori_nama' => 'Snack/Makanan Ringan', 'created_at' => $now, 'updated_at' => $now],
                ['kategori_id' => 3, 'kategori_kode' => 'MNM', 'kategori_nama' => 'Minuman', 'created_at' => $now, 'updated_at' => $now],
                ['kategori_id' => 4, 'kategori_kode' => 'SMB', 'kategori_nama' => 'Sembako', 'created_at' => $now, 'updated_at' => $now],
                ['kategori_id' => 5, 'kategori_kode' => 'LNY', 'kategori_nama' => 'Lainnya', 'created_at' => $now, 'updated_at' => $now],
            ],
            ['kategori_id'],
            ['kategori_kode', 'kategori_nama', 'updated_at']
        );
    }
}
