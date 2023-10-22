<?php

use App\Models\MasterBankSoal;
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
        Schema::create('sub_bank_soals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MasterBankSoal::class)->nullable();
            $table->enum('tipe_pertanyaan', ['pg', 'essay']);
            $table->longText('pertanyaan');
            $table->string('gambar')->nullable();
            $table->integer('essay_bobot')->unsigned()->default(0);
            $table->string('temp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_bank_soals');
    }
};
