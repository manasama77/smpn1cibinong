<?php

use App\Models\SubBankSoal;
use App\Models\Ujian;
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
        Schema::create('jawaban_ujians', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Ujian::class);
            $table->foreignIdFor(SubBankSoal::class);
            $table->enum('tipe_pertanyaan', ['pg', 'essay']);
            $table->string('answer');
            $table->integer('pg_bobot')->unsigned()->default(0);
            $table->integer('essay_bobot')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_ujians');
    }
};
