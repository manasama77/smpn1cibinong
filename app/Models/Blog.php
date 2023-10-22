<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'judul',
        'description',
        'banner',
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

    public function getBannerUrlAttribute()
    {
        $banner = $this->getRawOriginal('banner');
        return '<img src="' . Storage::url($banner) . '" class="img-thumbnail" alt="" style="width: 200px;" />';
    }

    public function getBannerUrlFeAttribute()
    {
        $banner = $this->getRawOriginal('banner');
        $judul  = $this->getRawOriginal('judul');
        return '<img src="' . Storage::url($banner) . '" class="card-img-top" alt="' . $judul . '" />';
    }

    public function getBannerUrlFeListAttribute()
    {
        $banner = $this->getRawOriginal('banner');
        $judul  = $this->getRawOriginal('judul');
        return '<img src="' . Storage::url($banner) . '" class="img-fluid" alt="' . $judul . '" />';
    }

    public function getBannerUrlFeDetailAttribute()
    {
        $banner = $this->getRawOriginal('banner');
        $judul  = $this->getRawOriginal('judul');
        return '<img src="' . Storage::url($banner) . '" class="img-thumbnail w-50" alt="' . $judul . '" />';
    }

    public function getActiveBadgeAttribute()
    {
        $active = $this->getRawOriginal('active');

        if ($active == 1) {
            return '<span class="badge badge-success">Aktif</span>';
        }
        return '<span class="badge badge-danger">Tidak Aktif</span>';
    }

    public function getSlugUrlAttribute()
    {
        $slug = $this->getRawOriginal('slug');
        $link = config('app.url') . '/informasi-kegiatan/' . $slug;
        return '<a href="' . $link . '" target="_blank">' . $link . '</a>';
    }

    public function getDescriptionLimitAttribute()
    {
        $description = $this->getRawOriginal('description');
        return strip_tags(Str::limit($description, 150, '...'));
    }
}
