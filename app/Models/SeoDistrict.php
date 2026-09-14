<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SeoDistrict extends Model
{
    protected $fillable = [
        'seo_city_id',
        'name',
        'slug',
        'zip_code',
        'latitude',
        'longitude',
        'landmark_name',
        'lsi_keywords',
        'is_active',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($district) {
            if (empty($district->slug)) {
                $district->slug = Str::slug($district->name);
            }
        });
    }

    public function city()
    {
        return $this->belongsTo(SeoCity::class, 'seo_city_id');
    }

    public function getLatitudeAttribute($value)
    {
        return $value ?: $this->city->latitude ?? '-6.2088';
    }

    public function getLongitudeAttribute($value)
    {
        return $value ?: $this->city->longitude ?? '106.8456';
    }

    public function getMetaTitleAttribute()
    {
        return "Jasa Saluran Pipa Mampet {$this->name}, {$this->city->name} - Tanpa Bongkar";
    }

    public function getMetaDescriptionAttribute()
    {
        return "Jasa pipa mampet & pelancar saluran air tersumbat di area {$this->name}, {$this->city->name} bergaransi resmi 30 hari. Layanan cepat 15 menit lokasi.";
    }
}
