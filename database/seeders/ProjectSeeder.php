<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear dummy/existing data for clean seeding
        Project::query()->delete();

        $projects = [
            [
                'title' => 'Inspeksi Kamera Saluran Kloset Gedung Perkantoran',
                'category' => 'Specialized',
                'location' => 'Jakarta',
                'img' => '/assets/dokumentasipekerjaan/rooterin-inspeksi-kamera-saluran-kloset-gedung-kantor.webp',
                'is_featured' => true,
            ],
            [
                'title' => 'Inspeksi Kamera Saluran Mampet Pertamina Sunter',
                'category' => 'Specialized',
                'location' => 'Sunter, Jakarta Utara',
                'img' => '/assets/dokumentasipekerjaan/rooterin-inspeksi-kamera-saluran-mampet-pertamina-sunter.webp',
                'is_featured' => true,
            ],
            [
                'title' => 'Pelancaran Saluran Mampet Restoran Almaz Fried Chicken',
                'category' => 'Commercial',
                'location' => 'Jabodetabek',
                'img' => '/assets/dokumentasipekerjaan/rooterin-jasa-saluran-mampet-restoran-almaz-fried-chicken.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Hasil Pelancaran Drainage Gutter Restoran',
                'category' => 'Specialized',
                'location' => 'Jabodetabek',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-after-gutter-resto-jabodetabek.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Pelancaran Drainase Gutter Dapur Restoran',
                'category' => 'Specialized',
                'location' => 'Jabodetabek',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-drainase-gutter-dapur-resto.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Pelancaran Floor Drain Kamar Mandi Utama',
                'category' => 'Residential',
                'location' => 'Jabodetabek',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-floor-drain-kamar-mandi-01.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Pelancaran Floor Drain Kamar Mandi Rumah',
                'category' => 'Residential',
                'location' => 'Jabodetabek',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-floor-drain-kamar-mandi-02.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Pelancaran Saluran Floor Drain Rumah Warga',
                'category' => 'Residential',
                'location' => 'Jabodetabek',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-floor-drain-rumah-warga.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Pelancaran Floor Drain Toilet Perkantoran',
                'category' => 'Commercial',
                'location' => 'Jakarta',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-floor-drain-toilet-perkantoran.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Pembersihan & Pelancaran Grease Trap Lemak Restoran',
                'category' => 'Commercial',
                'location' => 'Jabodetabek',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-grease-trap-lemak-restoran.webp',
                'is_featured' => true,
            ],
            [
                'title' => 'Pelancaran Pipa Saluran Kamar Mandi Rumah Tinggal',
                'category' => 'Residential',
                'location' => 'Jabodetabek',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-kamar-mandi-rumah-tinggal.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Pelancaran Saluran Mampet Gedung Kantor KAI Semarang',
                'category' => 'Commercial',
                'location' => 'Semarang, Jawa Tengah',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-kantor-kai-semarang.webp',
                'is_featured' => true,
            ],
            [
                'title' => 'Pelancaran Kitchen Sink Area Dapur Restoran',
                'category' => 'Commercial',
                'location' => 'Jabodetabek',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-kitchen-sink-area-restoran.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Pelancaran Kloset Toilet Kantor Pertamina Sunter',
                'category' => 'Commercial',
                'location' => 'Sunter, Jakarta Utara',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-kloset-kantor-pertamina-sunter.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Pelancaran Kloset & Toilet Rumah Warga',
                'category' => 'Residential',
                'location' => 'Jabodetabek',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-kloset-toilet-rumah-warga.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Pelancaran Grease Trap Restoran Haka Dimsum Tebet',
                'category' => 'Commercial',
                'location' => 'Tebet, Jakarta Selatan',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-resto-haka-dimsum-tebet-jaksel.webp',
                'is_featured' => true,
            ],
            [
                'title' => 'Pelancaran Saluran Mampet Restoran Sushi Tei Area Dapur',
                'category' => 'Commercial',
                'location' => 'Banjarmasin, Kalsel',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-resto-sushi-tei-banjarmasin-01.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Pembersihan Endapan Lemak Restoran Sushi Tei',
                'category' => 'Commercial',
                'location' => 'Banjarmasin, Kalsel',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-resto-sushi-tei-banjarmasin-02.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Pelancaran Saluran Pipa Restoran Shoichiro Area 1',
                'category' => 'Commercial',
                'location' => 'Jabodetabek',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-restoran-shoichiro-01.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Pelancaran Saluran Pipa Restoran Shoichiro Area 2',
                'category' => 'Commercial',
                'location' => 'Jabodetabek',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-restoran-shoichiro-02.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Pelancaran Pipa Drainase Utama Rumah Tinggal',
                'category' => 'Residential',
                'location' => 'Jabodetabek',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-rumah-tinggal-jabodetabek.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Pelancaran & Maintenance Saluran Stasiun KAI Tugu',
                'category' => 'Specialized',
                'location' => 'Yogyakarta',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-stasiun-kai-tugu.webp',
                'is_featured' => true,
            ],
            [
                'title' => 'Pembersihan & Pelancaran Talang Gutter Restoran',
                'category' => 'Specialized',
                'location' => 'Jabodetabek',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-talang-gutter-resto-bersih.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Pelancaran Wastafel Cuci Piring Rumah Tinggal',
                'category' => 'Residential',
                'location' => 'Jabodetabek',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-wastafel-cuci-piring-rumah.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Pelancaran Wastafel Dapur Tersumbat',
                'category' => 'Residential',
                'location' => 'Jabodetabek',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-wastafel-dapur-tersumbat.webp',
                'is_featured' => false,
            ],
            [
                'title' => 'Pelancaran Saluran Wastafel Rumah Warga',
                'category' => 'Residential',
                'location' => 'Jabodetabek',
                'img' => '/assets/dokumentasipekerjaan/rooterin-saluran-mampet-wastafel-rumah-warga-jabodetabek.webp',
                'is_featured' => false,
            ],
        ];

        foreach ($projects as $p) {
            Project::create([
                'title' => $p['title'],
                'category' => $p['category'],
                'location' => $p['location'],
                'images' => [$p['img']],
                'is_featured' => $p['is_featured'],
            ]);
        }
    }
}
