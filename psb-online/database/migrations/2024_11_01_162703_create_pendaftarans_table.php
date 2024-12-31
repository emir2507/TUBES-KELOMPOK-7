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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('Alamat_KTP');
            $table->string('Alamat_lengkap');
            $table->string('kecamatan');
            $table->foreignId('kabupaten_id')->constrained('kabupatens');
            $table->foreignId('provinsi_id')->constrained('provinsis');
            $table->string('nomor_telpon');
            $table->string('nomor_hp');
            $table->string('email')->unique();
            $table->string('kewarganegaraan');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('optional_tempat');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->enum('status_menikah', ['Belum menikah', 'Menikah', 'Lain-lain(janda/duda)']);
            $table->foreignId('agama_id')->constrained('agamas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
