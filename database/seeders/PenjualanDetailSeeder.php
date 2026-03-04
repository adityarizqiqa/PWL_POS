<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            BarangSeeder::class,
            PenjualanSeeder::class,
        ]);

        // 30 detail (3 barang untuk tiap transaksi penjualan)
        if (DB::table('t_penjualan_detail')->count() >= 30) {
            return;
        }

        $penjualanIds = DB::table('t_penjualan')
            ->orderBy('penjualan_id')
            ->limit(10)
            ->pluck('penjualan_id')
            ->all();

        $barang = DB::table('m_barang')
            ->orderBy('barang_id')
            ->limit(15)
            ->get(['barang_id', 'harga_jual']);

        if (count($penjualanIds) < 10 || $barang->count() < 15) {
            return;
        }

        $barangIds = $barang->pluck('barang_id')->all();
        $hargaJualByBarangId = $barang->pluck('harga_jual', 'barang_id');

        $now = now();
        $rows = [];

        foreach ($penjualanIds as $penjualanIndex => $penjualanId) {
            for ($i = 0; $i < 3; $i++) {
                $barangId = $barangIds[($penjualanIndex * 3 + $i) % count($barangIds)];
                $harga = (int) ($hargaJualByBarangId[$barangId] ?? 0);

                $rows[] = [
                    'penjualan_id' => $penjualanId,
                    'barang_id' => $barangId,
                    'jumlah' => $i + 1,
                    'harga' => $harga,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        DB::table('t_penjualan_detail')->insert($rows);

        // Update total_harga berdasarkan detail
        foreach ($penjualanIds as $penjualanId) {
            $total = (int) DB::table('t_penjualan_detail')
                ->where('penjualan_id', $penjualanId)
                ->selectRaw('COALESCE(SUM(jumlah * harga), 0) as total')
                ->value('total');

            DB::table('t_penjualan')
                ->where('penjualan_id', $penjualanId)
                ->update(['total_harga' => $total]);
        }
    }
}
