<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PgBankSoal extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_bank_soal_id',
        'jawaban_a',
        'jawaban_b',
        'jawaban_c',
        'jawaban_d',
        'jawaban_e',
        'right_answer',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function sub_bank_soal()
    {
        return $this->belongsTo(SubBankSoal::class);
    }
}
