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
        $targetCount = 3;
        $existingCount = DB::table('m_supplier')->count();

        if ($existingCount >= $targetCount) {
            return;
        }

        $now = now();
        $rowsToInsert = [];
        for ($i = $existingCount; $i < $targetCount; $i++) {
            $rowsToInsert[] = [
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('m_supplier')->insert($rowsToInsert);
    }
}
