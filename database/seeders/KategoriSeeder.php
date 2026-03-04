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
        $targetCount = 5;
        $existingCount = DB::table('m_kategori')->count();

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

        DB::table('m_kategori')->insert($rowsToInsert);
    }
}
