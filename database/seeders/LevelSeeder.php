<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_level')->upsert(
            [
                ['level_kode' => 'ADM', 'level_nama' => 'Administrator'],
                ['level_kode' => 'KSR', 'level_nama' => 'Kasir'],
                ['level_kode' => 'MNG', 'level_nama' => 'Manager'],
                ['level_kode' => 'CUS', 'level_nama' => 'Pelanggan'],
            ],
            ['level_kode'],
            ['level_nama']
            );
    }
}
