<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(BarangSeeder::class);

        // Stok untuk 15 barang
        if (DB::table('t_stok')->count() >= 15) {
            return;
        }

        $barangIds = DB::table('m_barang')
            ->orderBy('barang_id')
            ->limit(15)
            ->pluck('barang_id')
            ->all();

        if (count($barangIds) === 0) {
            return;
        }

        $now = now();
        $rows = [];
        foreach ($barangIds as $index => $barangId) {
            $rows[] = [
                'barang_id' => $barangId,
                'jumlah_stok' => 50 + ($index % 10),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('t_stok')->insert($rows);
    }
}
