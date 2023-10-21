<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanUjian extends Model
{
    use HasFactory;

    protected $fillable = [
        'ujian_id',
        'sub_bank_soal_id',
        'tipe_pertanyaan',
        'answer',
        'pg_bobot',
        'essay_bobot',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }

    public function sub_bank_soal()
    {
        return $this->belongsTo(SubBankSoal::class);
    }
}
