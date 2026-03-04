<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);

        // 10 transaksi penjualan
        if (DB::table('t_penjualan')->count() >= 10) {
            return;
        }

        $userIds = DB::table('m_user')->orderBy('user_id')->pluck('user_id')->all();
        if (count($userIds) === 0) {
            return;
        }

        $now = now();
        $rows = [];
        for ($i = 0; $i < 10; $i++) {
            $rows[] = [
                'user_id' => $userIds[$i % count($userIds)],
                'tanggal_penjualan' => $now->copy()->subDays(10 - $i)->setTime(10 + ($i % 5), 0, 0),
                'total_harga' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('t_penjualan')->insert($rows);
    }
}
