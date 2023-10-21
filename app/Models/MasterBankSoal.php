<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function ujian()
    {
        return $this->hasMany(Ujian::class);
    }
}
