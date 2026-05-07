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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id('id_karyawan');
            $table->string('nik', 20)->unique();
            $table->string('nama_karyawan', 100);
            $table->date('tgl_masuk');
            $table->unsignedBigInteger('id_jabatan');
            $table->foreign('id_jabatan')
                ->references('id_jabatan')
                ->on('jabatans')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->index('id_jabatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
