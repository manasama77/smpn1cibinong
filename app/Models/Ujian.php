<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'master_bank_soal_id',
        'total_nilai',
        'nilai_pg',
        'nilai_essay',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function master_bank_soal()
    {
        return $this->belongsTo(MasterBankSoal::class);
    }

    public function jawaban_ujian_pg()
    {
        return $this->hasMany(JawabanUjian::class)->where('tipe_pertanyaan', 'pg');
    }

    public function jawaban_ujian_essay()
    {
        return $this->hasMany(JawabanUjian::class)->where('tipe_pertanyaan', 'essay');
    }
}
