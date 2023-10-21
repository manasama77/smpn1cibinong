<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubBankSoal extends Model
{
    use HasFactory;

    protected $fillable = [
        'master_bank_soal_id',
        'tipe_pertanyaan',
        'pertanyaan',
        'essay_bobot',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function master_bank_soal()
    {
        return $this->belongsTo(MasterBankSoal::class);
    }

    public function pg_bank_soal()
    {
        return $this->hasMany(PgBankSoal::class)->where('tipe_pertanyaan', 'pg');
    }

    public function jawaban_ujian()
    {
        return $this->hasMany(JawabanUjian::class);
    }
}
