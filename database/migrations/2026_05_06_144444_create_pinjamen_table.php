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
        Schema::create('pinjamans', function (Blueprint $table) {
            $table->id('id_pinjaman');
            $table->unsignedBigInteger('id_karyawan');
            $table->integer('tenor')->unsigned();
            $table->integer('cicilan_per_bulan')->unsigned();
            $table->integer('jumlah_pinjaman')->unsigned();
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawans')->onDelete('restrict')->onUpdate('cascade');
            $table->enum('status', ['Aktif', 'Lunas'])->default('Aktif');
            $table->index('id_karyawan');
            $table->index('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjamen');
    }
};
