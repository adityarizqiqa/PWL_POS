<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('m_kategori', function (Blueprint $table) {
            $table->string('kategori_kode', 10)->nullable()->unique()->after('kategori_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_kategori', function (Blueprint $table) {
            $table->dropUnique(['kategori_kode']);
            $table->dropColumn('kategori_kode');
        });
    }
};
