<?php

use App\Models\MasterMapel;
use App\Models\User;
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
        Schema::create('master_bank_soals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MasterMapel::class);
            $table->enum('kelas', [7, 8, 9]);
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->boolean('active');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignIdFor(User::class, 'created_by');
            $table->foreignIdFor(User::class, 'updated_by')->nullable();
            $table->foreignIdFor(User::class, 'deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_bank_soals');
    }
};
