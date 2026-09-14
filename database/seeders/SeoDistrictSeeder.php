<?php

namespace Database\Seeders;

use App\Models\SeoCity;
use App\Models\SeoDistrict;
use Illuminate\Database\Seeder;

class SeoDistrictSeeder extends Seeder
{
    public function run(): void
    {
        $jakartaDistricts = [
            'jakarta-selatan' => [
                ['name' => 'Kebayoran Baru', 'slug' => 'kebayoran-baru', 'zip_code' => '12110', 'landmark_name' => 'Blok M / Senopati'],
                ['name' => 'Kebayoran Lama', 'slug' => 'kebayoran-lama', 'zip_code' => '12240', 'landmark_name' => 'Gandaria / Pondok Indah'],
                ['name' => 'Cilandak', 'slug' => 'cilandak', 'zip_code' => '12430', 'landmark_name' => 'Cilandak Town Square / Fatmawati'],
                ['name' => 'Tebet', 'slug' => 'tebet', 'zip_code' => '12810', 'landmark_name' => 'Stasiun Tebet / Kokas'],
                ['name' => 'Pancoran', 'slug' => 'pancoran', 'zip_code' => '12780', 'landmark_name' => 'Patung Pancoran / Kalibata'],
                ['name' => 'Pasar Minggu', 'slug' => 'pasar-minggu', 'zip_code' => '12510', 'landmark_name' => 'Pejaten / Ragunan'],
                ['name' => 'Jagakarsa', 'slug' => 'jagakarsa', 'zip_code' => '12620', 'landmark_name' => 'Lenteng Agung / Ciganjur'],
                ['name' => 'Mampang Prapatan', 'slug' => 'mampang-prapatan', 'zip_code' => '12790', 'landmark_name' => 'Kemang / Mampang'],
                ['name' => 'Pesanggrahan', 'slug' => 'pesanggrahan', 'zip_code' => '12250', 'landmark_name' => 'Bintaro / Petukangan'],
                ['name' => 'Setiabudi', 'slug' => 'setiabudi', 'zip_code' => '12910', 'landmark_name' => 'Kuningan / Rasuna Said'],
            ],
            'jakarta-barat' => [
                ['name' => 'Kebon Jeruk', 'slug' => 'kebon-jeruk', 'zip_code' => '11530', 'landmark_name' => 'RCTI / Kedoya'],
                ['name' => 'Puri Indah', 'slug' => 'puri-indah', 'zip_code' => '11610', 'landmark_name' => 'Puri Indah Mall / Kembangan'],
                ['name' => 'Kembangan', 'slug' => 'kembangan', 'zip_code' => '11620', 'landmark_name' => 'Meruya / Kembangan Selatan'],
                ['name' => 'Palmerah', 'slug' => 'palmerah', 'zip_code' => '11480', 'landmark_name' => 'Slipi / Kemanggisan'],
                ['name' => 'Grogol Petamburan', 'slug' => 'grogol-petamburan', 'zip_code' => '11450', 'landmark_name' => 'Grogol / Tomang / Mall Ciputra'],
                ['name' => 'Cengkareng', 'slug' => 'cengkareng', 'zip_code' => '11730', 'landmark_name' => 'Rawa Buaya / Daan Mogot'],
                ['name' => 'Kalideres', 'slug' => 'kalideres', 'zip_code' => '11840', 'landmark_name' => 'Terminal Kalideres / Semanan'],
                ['name' => 'Taman Sari', 'slug' => 'taman-sari', 'zip_code' => '11110', 'landmark_name' => 'Kota Tua / Glodok'],
                ['name' => 'Tambora', 'slug' => 'tambora', 'zip_code' => '11210', 'landmark_name' => 'Angke / Jembatan Lima'],
            ],
            'jakarta-pusat' => [
                ['name' => 'Senen', 'slug' => 'senen', 'zip_code' => '10410', 'landmark_name' => 'Stasiun Senen / Kwitang'],
                ['name' => 'Menteng', 'slug' => 'menteng', 'zip_code' => '10310', 'landmark_name' => 'Cikini / Bundaran HI'],
                ['name' => 'Kemayoran', 'slug' => 'kemayoran', 'zip_code' => '10610', 'landmark_name' => 'JIExpo Kemayoran'],
                ['name' => 'Tanah Abang', 'slug' => 'tanah-abang', 'zip_code' => '10250', 'landmark_name' => 'Pasar Tanah Abang / Benhil'],
                ['name' => 'Gambir', 'slug' => 'gambir', 'zip_code' => '10110', 'landmark_name' => 'Monas / Stasiun Gambir'],
                ['name' => 'Sawah Besar', 'slug' => 'sawah-besar', 'zip_code' => '10710', 'landmark_name' => 'Pasar Baru / Kartini'],
                ['name' => 'Cempaka Putih', 'slug' => 'cempaka-putih', 'zip_code' => '10510', 'landmark_name' => 'Cempaka Mas / Rawasari'],
                ['name' => 'Johar Baru', 'slug' => 'johar-baru', 'zip_code' => '10560', 'landmark_name' => 'Galur / Kampung Tinggi'],
            ],
            'jakarta-timur' => [
                ['name' => 'Jatinegara', 'slug' => 'jatinegara', 'zip_code' => '13310', 'landmark_name' => 'Stasiun Jatinegara / Kampung Melayu'],
                ['name' => 'Duren Sawit', 'slug' => 'duren-sawit', 'zip_code' => '13440', 'landmark_name' => 'BKT / Pondok Kelapa'],
                ['name' => 'Cakung', 'slug' => 'cakung', 'zip_code' => '13910', 'landmark_name' => 'Kawasan Industri Pulogadung / JGC'],
                ['name' => 'Kramat Jati', 'slug' => 'kramat-jati', 'zip_code' => '13510', 'landmark_name' => 'Pasar Induk Kramat Jati / PGC'],
                ['name' => 'Matraman', 'slug' => 'matraman', 'zip_code' => '13110', 'landmark_name' => 'Utan Kayu / Pramuka'],
                ['name' => 'Pasar Rebo', 'slug' => 'pasar-rebo', 'zip_code' => '13710', 'landmark_name' => 'Pekayon / Kalisari'],
                ['name' => 'Ciracas', 'slug' => 'ciracas', 'zip_code' => '13740', 'landmark_name' => 'Cibubur / Kampung Rambutan'],
                ['name' => 'Cipayung', 'slug' => 'cipayung', 'zip_code' => '13840', 'landmark_name' => 'TMII / Bambu Apus'],
                ['name' => 'Pulo Gadung', 'slug' => 'pulo-gadung', 'zip_code' => '13260', 'landmark_name' => 'Rawamangun / Pemuda'],
                ['name' => 'Makasar', 'slug' => 'makasar', 'zip_code' => '13570', 'landmark_name' => 'Bandara Halim Perdanakusuma / Pinang Ranti'],
            ],
            'jakarta-utara' => [
                ['name' => 'Kelapa Gading', 'slug' => 'kelapa-gading', 'zip_code' => '14240', 'landmark_name' => 'Mall Kelapa Gading / Boulevard'],
                ['name' => 'Sunter', 'slug' => 'sunter', 'zip_code' => '14350', 'landmark_name' => 'Danau Sunter / Pertamina Sunter'],
                ['name' => 'Tanjung Priok', 'slug' => 'tanjung-priok', 'zip_code' => '14310', 'landmark_name' => 'Pelabuhan Tanjung Priok'],
                ['name' => 'Penjaringan', 'slug' => 'penjaringan', 'zip_code' => '14440', 'landmark_name' => 'PIK / Pantai Indah Kapuk / Muara Karang'],
                ['name' => 'Pademangan', 'slug' => 'pademangan', 'zip_code' => '14410', 'landmark_name' => 'Ancol / Mangga Dua'],
                ['name' => 'Cilincing', 'slug' => 'cilincing', 'zip_code' => '14110', 'landmark_name' => 'Marunda / Rorotan'],
            ],
        ];

        foreach ($jakartaDistricts as $citySlug => $districts) {
            $city = SeoCity::where('slug', $citySlug)->first();
            if ($city) {
                foreach ($districts as $districtData) {
                    SeoDistrict::updateOrCreate(
                        [
                            'seo_city_id' => $city->id,
                            'slug' => $districtData['slug']
                        ],
                        [
                            'name' => $districtData['name'],
                            'zip_code' => $districtData['zip_code'],
                            'landmark_name' => $districtData['landmark_name'],
                            'is_active' => true,
                            'lsi_keywords' => "pipa mampet {$districtData['slug']}, pelancar wastafel {$districtData['name']}, tukang ledeng {$districtData['name']}, sedot wc {$districtData['name']}"
                        ]
                    );
                }
            }
        }

        // Semarang Districts
        $semarang = SeoCity::where('slug', 'semarang')->first();
        if ($semarang) {
            $semarangDistricts = [
                ['name' => 'Banyumanik', 'slug' => 'banyumanik', 'zip_code' => '50261', 'landmark_name' => 'Jl. Setiabudi Banyumanik'],
                ['name' => 'Semarang Barat', 'slug' => 'semarang-barat', 'zip_code' => '50141', 'landmark_name' => 'Krapyak / Bandara Ahmad Yani'],
                ['name' => 'Semarang Selatan', 'slug' => 'semarang-selatan', 'zip_code' => '50241', 'landmark_name' => 'Simpang Lima / Peterongan'],
                ['name' => 'Semarang Timur', 'slug' => 'semarang-timur', 'zip_code' => '50125', 'landmark_name' => 'Citarum / Karangturi'],
                ['name' => 'Semarang Utara', 'slug' => 'semarang-utara', 'zip_code' => '50171', 'landmark_name' => 'Stasiun Tawang / Kota Lama'],
                ['name' => 'Tembalang', 'slug' => 'tembalang', 'zip_code' => '50275', 'landmark_name' => 'Kampus UNDIP Tembalang'],
            ];

            foreach ($semarangDistricts as $distData) {
                SeoDistrict::updateOrCreate(
                    ['seo_city_id' => $semarang->id, 'slug' => $distData['slug']],
                    [
                        'name' => $distData['name'],
                        'zip_code' => $distData['zip_code'],
                        'landmark_name' => $distData['landmark_name'],
                        'is_active' => true,
                        'lsi_keywords' => "pipa mampet {$distData['slug']}, pelancar wastafel {$distData['name']} semarang"
                    ]
                );
            }
        }
    }
}
