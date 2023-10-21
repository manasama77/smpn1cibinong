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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nama_lengkap');
            $table->enum('kelas', [7, 8, 9])->nullable();
            $table->enum('role', ['admin', 'kepala sekolah', 'guru', 'orang tua wali', 'siswa']);
            $table->string('nisn')->nullable();
            $table->string('no_hp');
            $table->string('no_ktp_orang_tua_wali')->nullable();
            $table->string('nama_orang_tua_wali')->nullable();
            $table->string('no_hp_orang_tua')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->default(1);
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
