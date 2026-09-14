<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SeoCity extends Model
{
    protected $fillable = ['name', 'slug', 'region', 'description_prefix', 'lsi_keywords', 'fresh_headline', 'is_active'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($city) {
            if (empty($city->slug)) {
                $city->slug = Str::slug($city->name);
            }
        });
    }

    public function reviews()
    {
        return $this->hasMany(LocalizedReview::class);
    }

    public function districts()
    {
        return $this->hasMany(SeoDistrict::class);
    }

    /**
     * Map precision GeoCoordinates for SERP Local SEO Schema
     */
    public function getLatitudeAttribute()
    {
        $coords = [
            'jakarta-pusat' => '-6.1805',
            'jakarta-selatan' => '-6.2615',
            'jakarta-barat' => '-6.1683',
            'jakarta-timur' => '-6.2250',
            'jakarta-utara' => '-6.1384',
            'bogor' => '-6.5971',
            'depok' => '-6.4025',
            'tangerang' => '-6.1783',
            'tangerang-selatan' => '-6.2886',
            'bekasi' => '-6.2383',
            'semarang' => '-6.9666',
            'semarang-barat' => '-6.9806',
            'semarang-selatan' => '-7.0006',
            'banyumanik' => '-7.0600',
            'ungaran' => '-7.1394',
            'bandar-lampung' => '-5.4292',
            'metro-lampung' => '-5.1133',
            'natar' => '-5.3167',
        ];

        return $coords[$this->slug] ?? '-6.2088';
    }

    public function getLongitudeAttribute()
    {
        $coords = [
            'jakarta-pusat' => '106.8284',
            'jakarta-selatan' => '106.8106',
            'jakarta-barat' => '106.7588',
            'jakarta-timur' => '106.9004',
            'jakarta-utara' => '106.8640',
            'bogor' => '106.7996',
            'depok' => '106.7942',
            'tangerang' => '106.6319',
            'tangerang-selatan' => '106.7179',
            'bekasi' => '106.9756',
            'semarang' => '110.4166',
            'semarang-barat' => '110.3800',
            'semarang-selatan' => '110.4200',
            'banyumanik' => '110.4200',
            'ungaran' => '110.4047',
            'bandar-lampung' => '105.2611',
            'metro-lampung' => '105.3067',
            'natar' => '105.1917',
        ];

        return $coords[$this->slug] ?? '106.8456';
    }

    public function getMetaTitleAttribute()
    {
        return "Jasa Pelancar Saluran Pipa Mampet {$this->name} - Tanpa Bongkar";
    }

    public function getMetaDescriptionAttribute()
    {
        return "Jasa pipa mampet & pelancar saluran air tersumbat di {$this->name} bergaransi resmi 30 hari. Layanan profesional, tanpa bongkar, respon 15 menit.";
    }
}
