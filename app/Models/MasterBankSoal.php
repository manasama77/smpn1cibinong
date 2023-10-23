<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterBankSoal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'master_mapel_id',
        'kelas',
        'start_datetime',
        'end_datetime',
        'active',
        'slug',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function master_mapel()
    {
        return $this->belongsTo(MasterMapel::class);
    }

    public function sub_bank_soal()
    {
        return $this->hasMany(SubBankSoal::class);
    }

    public function sub_bank_soal_pg()
    {
        return $this->hasMany(SubBankSoal::class)->where('tipe_pertanyaan', 'pg');
    }

    public function sub_bank_soal_essay()
    {
        return $this->hasMany(SubBankSoal::class)->where('tipe_pertanyaan', 'essay');
    }

    public function ujian()
    {
        return $this->hasOne(Ujian::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function getStartDatetimeIndAttribute()
    {
        $start_datetime = $this->getRawOriginal('start_datetime');
        $tgl            = Carbon::parse($start_datetime)->isoFormat('D MMMM Y HH:mm');
        return $tgl;
    }

    public function getEndDatetimeIndAttribute()
    {
        $end_datetime = $this->getRawOriginal('end_datetime');
        $tgl            = Carbon::parse($end_datetime)->isoFormat('D MMMM Y HH:mm');
        return $tgl;
    }
}
