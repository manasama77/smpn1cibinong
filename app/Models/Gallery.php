<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'foto',
        'description',
        'active',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getFotoUrlAttribute()
    {
        $foto = $this->getRawOriginal('foto');
        return '<img src="' . Storage::url($foto) . '" class="img-thumbnail" alt="" style="width: 200px;" />';
    }

    public function getFotoUrlFeAttribute()
    {
        $foto = $this->getRawOriginal('foto');
        return '<img src="' . Storage::url($foto) . '" class="img-fluid" alt="" />';
    }

    public function getActiveBadgeAttribute()
    {
        $active = $this->getRawOriginal('active');

        if ($active == 1) {
            return '<span class="badge badge-success">Aktif</span>';
        }
        return '<span class="badge badge-danger">Tidak Aktif</span>';
    }
}
