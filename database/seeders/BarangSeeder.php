<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            KategoriSeeder::class,
            SupplierSeeder::class,
        ]);

        $kategoriIds = DB::table('m_kategori')->orderBy('kategori_id')->pluck('kategori_id')->all();
        $supplierIds = DB::table('m_supplier')->orderBy('supplier_id')->pluck('supplier_id')->all();

        if (count($kategoriIds) < 1 || count($supplierIds) < 1) {
            return;
        }

        // 15 barang berbeda (5 barang per supplier)
        $now = now();
        $rows = [];
        $kategoriIndex = 0;

        foreach ($supplierIds as $supplierIndex => $supplierId) {
            for ($i = 1; $i <= 5; $i++) {
                $kategoriId = $kategoriIds[$kategoriIndex % count($kategoriIds)];
                $kategoriIndex++;

                $barangKode = sprintf('BRG-S%02d-%02d', $supplierIndex + 1, $i);
                $barangNama = sprintf('Barang Supplier %d - %d', $supplierIndex + 1, $i);

                $hargaBeli = 10000 + ($supplierIndex * 500) + ($i * 250);
                $hargaJual = $hargaBeli + 2000;

                $rows[] = [
                    'kategori_id' => $kategoriId,
                    'supplier_id' => $supplierId,
                    'barang_kode' => $barangKode,
                    'barang_nama' => $barangNama,
                    'harga_beli' => $hargaBeli,
                    'harga_jual' => $hargaJual,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        DB::table('m_barang')->upsert(
            $rows,
            ['barang_kode'],
            ['kategori_id', 'supplier_id', 'barang_nama', 'harga_beli', 'harga_jual', 'updated_at']
        );
    }
}
