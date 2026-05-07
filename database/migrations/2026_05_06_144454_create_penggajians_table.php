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
        Schema::create('penggajians', function (Blueprint $table) {
            $table->id('id_penggajian');
            $table->unsignedBigInteger('id_karyawan');
            $table->string('bulan_tahun', 20);
            $table->integer('potongan_pinjaman')->default(0);
            $table->integer('gaji_bersih');
            $table->timestamps();
            $table->foreign('id_karyawan')
                ->references('id_karyawan')
                ->on('karyawans')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->unique(['id_karyawan', 'bulan_tahun']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggajians');
    }
};
