<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SeoCity;

class SeoCitySeeder extends Seeder
{
    public function run(): void
    {
        // 1. Deactivate old/out-of-scope cities
        SeoCity::whereNotIn('slug', [
            'jakarta-pusat', 'jakarta-selatan', 'jakarta-barat', 'jakarta-timur', 'jakarta-utara',
            'bogor', 'depok', 'tangerang', 'tangerang-selatan', 'bekasi',
            'semarang', 'semarang-barat', 'semarang-selatan', 'banyumanik', 'ungaran',
            'bandar-lampung', 'metro-lampung', 'natar'
        ])->update(['is_active' => false]);

        // 2. Define targeted geo-cities dataset
        $cities = [
            // Kluster Jabodetabek
            [
                'name' => 'Jakarta Selatan',
                'slug' => 'jakarta-selatan',
                'region' => 'DKI Jakarta',
                'description_prefix' => 'Jasa pelancar saluran pipa mampet area Jakarta Selatan tercepat, profesional, tanpa bongkar dan bergaransi resmi 30 hari.',
                'lsi_keywords' => 'jasa pipa mampet jakarta selatan, tukang saluran mampet jaksel, pelancar wastafel jakarta selatan, sedot wc jakarta selatan, cuci toren jakarta selatan',
                'fresh_headline' => 'Respon Cepat 15 Menit Wilayah Jakarta Selatan & Sekitarnya!',
                'is_active' => true,
            ],
            [
                'name' => 'Jakarta Pusat',
                'slug' => 'jakarta-pusat',
                'region' => 'DKI Jakarta',
                'description_prefix' => 'Layanan khusus perbaikan saluran air & pipa mampet perkantoran serta perumahan di Jakarta Pusat.',
                'lsi_keywords' => 'jasa pipa mampet jakarta pusat, tukang ledeng jakpus, pelancar wc mampet jakarta pusat',
                'fresh_headline' => 'Teknisi Standby 24 Jam Area Jakarta Pusat!',
                'is_active' => true,
            ],
            [
                'name' => 'Jakarta Barat',
                'slug' => 'jakarta-barat',
                'region' => 'DKI Jakarta',
                'description_prefix' => 'Solusi tuntas pipa mampet dan pembersihan drainase di Jakarta Barat dengan mesin hidro spiral modern.',
                'lsi_keywords' => 'jasa pipa mampet jakarta barat, pelancar pipa mampet jakbar, tukang pipa jakarta barat',
                'fresh_headline' => 'Garansi 30 Hari Tanpa Bongkar Pipa Jakarta Barat!',
                'is_active' => true,
            ],
            [
                'name' => 'Jakarta Timur',
                'slug' => 'jakarta-timur',
                'region' => 'DKI Jakarta',
                'description_prefix' => 'Panggilan teknisi saluran mampet profesional untuk wilayah Jakarta Timur dan sekitarnya.',
                'lsi_keywords' => 'jasa pipa mampet jakarta timur, tukang mampet jaktim, pembersihan saluran mampet jakarta timur',
                'fresh_headline' => 'Layanan Darurat Saluran Mampet Jakarta Timur!',
                'is_active' => true,
            ],
            [
                'name' => 'Jakarta Utara',
                'slug' => 'jakarta-utara',
                'region' => 'DKI Jakarta',
                'description_prefix' => 'Ahli pelancar pipa tersumbat lemak & kerak untuk rumah tangga dan resto di Jakarta Utara.',
                'lsi_keywords' => 'jasa pipa mampet jakarta utara, pelancar grease trap jakarta utara, tukang ledeng jakut',
                'fresh_headline' => 'Peralatan Modern Bebas Bongkar Area Jakarta Utara!',
                'is_active' => true,
            ],
            [
                'name' => 'Bogor',
                'slug' => 'bogor',
                'region' => 'Jawa Barat',
                'description_prefix' => 'Jasa perbaikan pipa mampet dan cuci toren air bersih area Kota & Kabupaten Bogor.',
                'lsi_keywords' => 'jasa pipa mampet bogor, tukang saluran mampet bogor, pelancar wastafel bogor, cuci toren bogor',
                'fresh_headline' => 'Pelayanan Tercepat Area Kota & Kabupaten Bogor!',
                'is_active' => true,
            ],
            [
                'name' => 'Depok',
                'slug' => 'depok',
                'region' => 'Jawa Barat',
                'description_prefix' => 'Solusi praktis mengatasi kran air kecil dan saluran pembuangan mampet di Depok.',
                'lsi_keywords' => 'jasa pipa mampet depok, tukang mampet depok, pelancar wc depok, service pipa depok',
                'fresh_headline' => 'Harga Terjangkau & Bergaransi Resmi di Depok!',
                'is_active' => true,
            ],
            [
                'name' => 'Tangerang',
                'slug' => 'tangerang',
                'region' => 'Banten',
                'description_prefix' => 'Jasa pelancar saluran air kotor dan instalasi sanitary bergaransi di Kota & Kabupaten Tangerang.',
                'lsi_keywords' => 'jasa pipa mampet tangerang, tukang saluran tangerang, pelancar wastafel tangerang',
                'fresh_headline' => 'Armada Teknisi Siap Meluncur ke Lokasi Anda di Tangerang!',
                'is_active' => true,
            ],
            [
                'name' => 'Tangerang Selatan',
                'slug' => 'tangerang-selatan',
                'region' => 'Banten',
                'description_prefix' => 'Layanan cepat dan profesional perbaikan pipa tersumbat kawasan BSD, Bintaro, dan Tangsel.',
                'lsi_keywords' => 'jasa pipa mampet tangerang selatan, tukang mampet bsd bintaro, pelancar wc tangsel',
                'fresh_headline' => 'Fast Response 15 Menit Wilayah Tangsel!',
                'is_active' => true,
            ],
            [
                'name' => 'Bekasi',
                'slug' => 'bekasi',
                'region' => 'Jawa Barat',
                'description_prefix' => 'Pusat penanganan masalah saluran mampet rumah & ruko di Bekasi Barat, Timur, Utara, Selatan.',
                'lsi_keywords' => 'jasa pipa mampet bekasi, tukang saluran air bekasi, pelancar wastafel bekasi',
                'fresh_headline' => 'Teknisi Ahli Berpengalaman di Seluruh Titik Bekasi!',
                'is_active' => true,
            ],

            // Kluster Semarang
            [
                'name' => 'Semarang',
                'slug' => 'semarang',
                'region' => 'Jawa Tengah',
                'description_prefix' => 'Jasa pelancar saluran pipa mampet nomor 1 di Kota Semarang. Pengerjaan cepat tanpa bongkar bergaransi.',
                'lsi_keywords' => 'jasa pipa mampet semarang, tukang saluran mampet semarang, pelancar wastafel semarang, sedot wc semarang',
                'fresh_headline' => 'Pusat Layanan Pipa Mampet Terbaik Kota Semarang!',
                'is_active' => true,
            ],
            [
                'name' => 'Semarang Barat',
                'slug' => 'semarang-barat',
                'region' => 'Jawa Tengah',
                'description_prefix' => 'Spesialis pelancar saluran pembuangan air kotor mampet untuk wilayah Semarang Barat.',
                'lsi_keywords' => 'jasa pipa mampet semarang barat, tukang ledeng semarang barat, pelancar wc semarang barat',
                'fresh_headline' => 'Teknisi Standby Wilayah Semarang Barat!',
                'is_active' => true,
            ],
            [
                'name' => 'Semarang Selatan',
                'slug' => 'semarang-selatan',
                'region' => 'Jawa Tengah',
                'description_prefix' => 'Layanan pembersihan pipa dan perbaikan saluran air mampet di Semarang Selatan.',
                'lsi_keywords' => 'jasa pipa mampet semarang selatan, pelancar wastafel semarang selatan',
                'fresh_headline' => 'Solusi Mampet Bergaransi 30 Hari Semarang Selatan!',
                'is_active' => true,
            ],
            [
                'name' => 'Banyumanik',
                'slug' => 'banyumanik',
                'region' => 'Jawa Tengah',
                'description_prefix' => 'Teknisi terdekat penanganan pipa tersumbat di area Banyumanik & sekitarnya.',
                'lsi_keywords' => 'jasa pipa mampet banyumanik, tukang mampet banyumanik semarang',
                'fresh_headline' => 'Kedatangan Cepat 15 Menit Area Banyumanik!',
                'is_active' => true,
            ],
            [
                'name' => 'Ungaran',
                'slug' => 'ungaran',
                'region' => 'Jawa Tengah',
                'description_prefix' => 'Jasa pelancar pipa mampet dan saluran pembuangan rumah tangga di Ungaran & Kabupaten Semarang.',
                'lsi_keywords' => 'jasa pipa mampet ungaran, tukang ledeng ungaran, pelancar saluran ungaran',
                'fresh_headline' => 'Layanan Pipa Mampet Tanpa Bongkar di Ungaran!',
                'is_active' => true,
            ],

            // Kluster Lampung
            [
                'name' => 'Bandar Lampung',
                'slug' => 'bandar-lampung',
                'region' => 'Lampung',
                'description_prefix' => 'Jasa pelancar saluran pipa mampet & cuci toren terbaik di Bandar Lampung. Garansi tuntas tanpa bongkar.',
                'lsi_keywords' => 'jasa pipa mampet bandar lampung, tukang saluran mampet lampung, pelancar wastafel bandar lampung, sedot wc bandar lampung',
                'fresh_headline' => 'Solusi Saluran Mampet Nomor 1 di Bandar Lampung!',
                'is_active' => true,
            ],
            [
                'name' => 'Metro Lampung',
                'slug' => 'metro-lampung',
                'region' => 'Lampung',
                'description_prefix' => 'Layanan profesional tukang pipa mampet dan instalasi sanitary di Kota Metro Lampung.',
                'lsi_keywords' => 'jasa pipa mampet metro lampung, tukang ledeng metro lampung, pelancar wc metro lampung',
                'fresh_headline' => 'Teknisi Handal Siap Datang ke Lokasi Anda di Metro Lampung!',
                'is_active' => true,
            ],
            [
                'name' => 'Natar',
                'slug' => 'natar',
                'region' => 'Lampung',
                'description_prefix' => 'Jasa perbaikan saluran pipa tersumbat dan pembersihan drainase wilayah Natar & Lampung Selatan.',
                'lsi_keywords' => 'jasa pipa mampet natar, tukang mampet natar lampung, pelancar wastafel natar',
                'fresh_headline' => 'Layanan Cepat 24 Jam Wilayah Natar & Sekitarnya!',
                'is_active' => true,
            ],
        ];

        foreach ($cities as $cityData) {
            SeoCity::updateOrCreate(
                ['slug' => $cityData['slug']],
                $cityData
            );
        }
    }
}
