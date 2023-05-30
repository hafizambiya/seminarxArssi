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
        Schema::create('pesertas', function (Blueprint $table) {
            // $table->id();
            $table->id();
            $table->string('idpeserta', 9);
            $table->string('idpesanan');
            $table->string('nama_peserta');
            $table->string('email')->unique();
            $table->char('no_hp');
            $table->string('jabatan');
            $table->string('instansi');
            $table->string('email_instansi');
            $table->text('alamat_instansi');
            $table->char('no_telp_instansi');
            $table->string('nama_pendaftar');
            $table->string('no_hp_pendaftar');
            $table->boolean('seminar')->default(false);
            $table->enum('workshop', ['1', '2', '3', '4', '5', '6'])->nullable();
            $table->char('pembelian');
            $table->boolean('pelunasan');
            $table->string('password');
            $table->string('snaptoken')->nullable();
            $table->string("role")->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
