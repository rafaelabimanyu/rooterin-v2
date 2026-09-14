<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\WikiEntity;
use App\Models\SeoCity;
use App\Models\SeoDistrict;
use App\Models\Service;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $xml = \Illuminate\Support\Facades\Cache::remember('sitemap.xml', now()->addHours(12), function () {
            // 1. Halaman statis utama
            $staticUrls = [
                route('home'),
                route('about'),
                route('services'),
                route('gallery'),
                route('tips'),
                route('harga'),
                route('contact'),
                route('local.hub'),
                route('holding.legalitas'),
                route('garansi.layanan'),
                route('b2b.komersial'),
            ];

            // 2. Halaman tips/artikel (Post dengan status published)
            $posts = Post::where('status', 'published')->orderBy('updated_at', 'desc')->get();

            // 3. Halaman wiki (WikiEntity)
            $wikis = WikiEntity::orderBy('updated_at', 'desc')->get();

            // 4. Halaman area kota (SeoCity dengan is_active true)
            $cities = SeoCity::where('is_active', true)->orderBy('updated_at', 'desc')->get();

            // 5. Halaman kota-layanan (SeoCity x Service)
            $services = Service::where('is_active', true)->get();
            $cityServices = [];
            foreach ($cities as $city) {
                foreach ($services as $service) {
                    $cityServices[] = [
                        'city_slug' => $city->slug,
                        'service_slug' => $service->slug,
                        'updated_at' => max($city->updated_at, $service->updated_at)
                    ];
                }
            }

            // 6. Halaman Kecamatan & Kecamatan-Layanan (SeoDistrict Programmatic)
            $districts = SeoDistrict::with('city')->where('is_active', true)->orderBy('updated_at', 'desc')->get();
            $districtServices = [];
            foreach ($districts as $district) {
                if ($district->city && $district->city->is_active) {
                    foreach ($services as $service) {
                        $districtServices[] = [
                            'city_slug' => $district->city->slug,
                            'district_slug' => $district->slug,
                            'service_slug' => $service->slug,
                            'updated_at' => max($district->updated_at, $service->updated_at)
                        ];
                    }
                }
            }

            return view('sitemap', [
                'staticUrls' => $staticUrls,
                'posts' => $posts,
                'wikis' => $wikis,
                'cities' => $cities,
                'cityServices' => $cityServices,
                'districts' => $districts,
                'districtServices' => $districtServices,
            ])->render();
        });

        return response($xml)->header('Content-Type', 'text/xml');
    }
}
