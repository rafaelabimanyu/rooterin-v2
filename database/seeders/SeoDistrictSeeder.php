<?php

namespace Database\Seeders;

use App\Models\SeoCity;
use App\Models\SeoDistrict;
use Illuminate\Database\Seeder;

class SeoDistrictSeeder extends Seeder
{
    public function run(): void
    {
        $jakartaSelatan = SeoCity::where('slug', 'jakarta-selatan')->first();
        if ($jakartaSelatan) {
            SeoDistrict::firstOrCreate(
                ['seo_city_id' => $jakartaSelatan->id, 'slug' => 'kebayoran-baru'],
                [
                    'name' => 'Kebayoran Baru',
                    'zip_code' => '12110',
                    'landmark_name' => 'Blok M / Senopati',
                    'lsi_keywords' => 'pipa mampet kebayoran baru, tukang pelancar saluran senopati, sedot pipa blok m'
                ]
            );
            SeoDistrict::firstOrCreate(
                ['seo_city_id' => $jakartaSelatan->id, 'slug' => 'cilandak'],
                [
                    'name' => 'Cilandak',
                    'zip_code' => '12430',
                    'landmark_name' => 'Cilandak Town Square / Fatmawati',
                    'lsi_keywords' => 'pipa mampet cilandak, pelancar wastafel fatmawati'
                ]
            );
        }

        $semarang = SeoCity::where('slug', 'semarang')->first();
        if ($semarang) {
            SeoDistrict::firstOrCreate(
                ['seo_city_id' => $semarang->id, 'slug' => 'banyumanik'],
                [
                    'name' => 'Banyumanik',
                    'zip_code' => '50261',
                    'landmark_name' => 'Jl. Setiabudi Banyumanik',
                    'lsi_keywords' => 'pipa mampet banyumanik, tukang pipa setiabudi semarang'
                ]
            );
        }
    }
}
