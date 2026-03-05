<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        DB::table('m_supplier')->upsert(
            [
                ['supplier_id' => 1, 'supplier_nama' => 'Supplier A', 'created_at' => $now, 'updated_at' => $now],
                ['supplier_id' => 2, 'supplier_nama' => 'Supplier B', 'created_at' => $now, 'updated_at' => $now],
                ['supplier_id' => 3, 'supplier_nama' => 'Supplier C', 'created_at' => $now, 'updated_at' => $now],
            ],
            ['supplier_id'],
            ['supplier_nama', 'updated_at']
        );
    }
}
