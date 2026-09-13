<?php

namespace App\Http\Controllers;

use App\Models\SeoCity;
use App\Models\Service;
use App\Models\LocalizedReview;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class LocalSeoController extends Controller
{
    /**
     * Landing Hub Geo Utama (/jasa-pelancar-saluran-mampet)
     */
    public function hub()
    {
        $cities = SeoCity::where('is_active', true)->orderBy('region')->orderBy('name')->get();
        $groupedCities = $cities->groupBy('region');
        $services = Service::where('is_active', true)->get();

        $title = "Area Jangkauan Jasa Pelancar Saluran Pipa Mampet - RooterIN";
        $description = "Cek jangkauan armada RooterIN di Jabodetabek, Semarang, dan Lampung. Fast response 15 menit, teknisi tersertifikasi, garansi 30 hari tanpa bongkar.";

        SEOTools::setTitle($title);
        SEOTools::setDescription($description);

        $phone = '+' . preg_replace('/[^0-9]/', '', \App\Models\Setting::get('whatsapp_number', '6285609009009'));

        $schema = [
            "@context" => "https://schema.org",
            "@graph" => [
                [
                    "@type" => ["LocalBusiness", "PlumbingContractor"],
                    "@id" => url('/jasa-pelancar-saluran-mampet') . "#hub",
                    "name" => "RooterIN - Jasa Pelancar Saluran Pipa Mampet",
                    "url" => url('/jasa-pelancar-saluran-mampet'),
                    "telephone" => $phone,
                    "priceRange" => "Rp 600.000 - Rp 2.500.000",
                    "description" => $description,
                    "areaServed" => $cities->pluck('name')->map(function($name) {
                        return ["@type" => "City", "name" => $name];
                    })->toArray()
                ],
                [
                    "@type" => "BreadcrumbList",
                    "itemListElement" => [
                        ["@type" => "ListItem", "position" => 1, "name" => "Beranda", "item" => url('/')],
                        ["@type" => "ListItem", "position" => 2, "name" => "Area Jangkauan Layanan", "item" => url('/jasa-pelancar-saluran-mampet')]
                    ]
                ]
            ]
        ];
        $schemaJson = json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return view('local-seo.hub', compact('cities', 'groupedCities', 'services', 'schemaJson'));
    }

    /**
     * Tampilkan landing page utama untuk kota tertentu (/jasa-pipa-mampet/{city:slug})
     */
    public function cityLanding(string $citySlug)
    {
        $city = SeoCity::where('slug', $citySlug)->where('is_active', true)->firstOrFail();
        $services = Service::where('is_active', true)->get();
        
        $cityReviews = LocalizedReview::where('seo_city_id', $city->id)->where('is_active', true)->get();
        if ($cityReviews->isEmpty()) {
            $cityReviews = LocalizedReview::whereNull('seo_city_id')->where('is_active', true)->take(3)->get();
        }

        $lsiCloud = $city->lsi_keywords ? array_map('trim', explode(',', $city->lsi_keywords)) : [];

        $title = "Jasa Pelancar Saluran Pipa Mampet {$city->name} - Tanpa Bongkar";
        $description = "Solusi mampet nomor 1 di {$city->name}. Kami melayani seluruh area {$city->name} dengan peralatan modern tanpa bongkar & garansi 30 hari.";

        SEOTools::setTitle($title);
        SEOTools::setDescription($description);

        // Dynamic Urgency Slogan
        $urgencySlogans = [
            "Jasa Saluran Mampet Tercepat di {$city->name} - Respon 10 Menit!",
            "Solusi Pipa Penuh Area {$city->name} - Garansi Tanpa Bongkar!",
            "Tukang Rooter Profesional {$city->name} - Harga Jujur!"
        ];
        $urgency = $urgencySlogans[array_rand($urgencySlogans)];

        $phone = '+' . preg_replace('/[^0-9]/', '', \App\Models\Setting::get('whatsapp_number', '6285609009009'));

        // Programmatic Schema.org (JSON-LD) Multi-Location Graph
        $schema = [
            "@context" => "https://schema.org",
            "@graph" => [
                [
                    "@type" => ["LocalBusiness", "PlumbingContractor"],
                    "@id" => route('local.city', $city->slug) . "#business",
                    "name" => "RooterIN " . $city->name . " - Jasa Pelancar Saluran Pipa Mampet",
                    "url" => route('local.city', $city->slug),
                    "telephone" => $phone, 
                    "priceRange" => "Rp 600.000 - Rp 2.500.000",
                    "address" => [
                        "@type" => "PostalAddress",
                        "addressLocality" => $city->name,
                        "addressRegion" => $city->region ?: "Indonesia",
                        "addressCountry" => "ID"
                    ],
                    "geo" => [
                        "@type" => "GeoCoordinates",
                        "latitude" => $city->latitude,
                        "longitude" => $city->longitude
                    ],
                    "areaServed" => [
                        [
                            "@type" => "City",
                            "name" => $city->name
                        ]
                    ],
                    "description" => $description
                ],
                [
                    "@type" => "BreadcrumbList",
                    "itemListElement" => [
                        [
                            "@type" => "ListItem",
                            "position" => 1,
                            "name" => "Beranda",
                            "item" => url('/')
                        ],
                        [
                            "@type" => "ListItem",
                            "position" => 2,
                            "name" => "Area Layanan",
                            "item" => route('local.hub')
                        ],
                        [
                            "@type" => "ListItem",
                            "position" => 3,
                            "name" => $city->name,
                            "item" => route('local.city', $city->slug)
                        ]
                    ]
                ]
            ]
        ];
        $schemaJson = json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return view('local-seo.city-index', compact('city', 'services', 'cityReviews', 'lsiCloud', 'urgency', 'schemaJson'));
    }

    /**
     * Tampilkan halaman layanan spesifik di kota tertentu (/jasa-pipa-mampet/{city:slug}/{service:slug})
     */
    public function show(string $citySlug, string $serviceSlug)
    {
        $city = SeoCity::where('slug', $citySlug)->where('is_active', true)->firstOrFail();
        $service = Service::where('slug', $serviceSlug)->firstOrFail();

        // Trust Architect: Pull localized reviews for this city
        $cityReviews = LocalizedReview::where('seo_city_id', $city->id)->where('is_active', true)->get();
        if ($cityReviews->isEmpty()) {
            $cityReviews = LocalizedReview::whereNull('seo_city_id')->where('is_active', true)->take(3)->get();
        }

        // Semantic Keyword Cloud (LSI)
        $lsiCloud = $city->lsi_keywords ? array_map('trim', explode(',', $city->lsi_keywords)) : [];

        // SEO Magic: Hyper-Localized Content
        $title = "{$service->name} di {$city->name} - Pipa Mampet Beres!";
        $description = "Cari {$service->name} di {$city->name}? RooterIN hadir dengan layanan profesional di wilayah {$city->name} dan sekitarnya. Terbukti amanah & bergaransi.";

        SEOTools::setTitle($title);
        SEOTools::setDescription($description);

        // Dynamic Urgency Slogan
        $urgencySlogans = [
            "Tukang Pipa Terdekat di {$city->name} - Tiba dalam 15 Menit!",
            "Diskon Khusus Area {$city->name} Hari Ini - Bergaransi!",
            "Ahli Saluran Mampet {$city->name} - Bayar Setelah Lancar!"
        ];
        $urgency = $urgencySlogans[array_rand($urgencySlogans)];

        $phone = '+' . preg_replace('/[^0-9]/', '', \App\Models\Setting::get('whatsapp_number', '6285609009009'));

        // Programmatic Schema.org (JSON-LD)
        $schema = [
            "@context" => "https://schema.org",
            "@graph" => [
                [
                    "@type" => "Service",
                    "@id" => route('local.service', [$city->slug, $service->slug]) . "#service",
                    "name" => $service->name . " di " . $city->name,
                    "url" => route('local.service', [$city->slug, $service->slug]),
                    "provider" => [
                        "@type" => ["LocalBusiness", "PlumbingContractor"],
                        "name" => "RooterIN " . $city->name,
                        "telephone" => $phone,
                        "priceRange" => "$$",
                        "geo" => [
                            "@type" => "GeoCoordinates",
                            "latitude" => $city->latitude,
                            "longitude" => $city->longitude
                        ],
                        "address" => [
                            "@type" => "PostalAddress",
                            "addressLocality" => $city->name,
                            "addressRegion" => $city->region ?: "Indonesia",
                            "addressCountry" => "ID"
                        ]
                    ],
                    "areaServed" => [
                        "@type" => "City",
                        "name" => $city->name
                    ],
                    "description" => $description
                ],
                [
                    "@type" => "BreadcrumbList",
                    "itemListElement" => [
                        [
                            "@type" => "ListItem",
                            "position" => 1,
                            "name" => "Beranda",
                            "item" => url('/')
                        ],
                        [
                            "@type" => "ListItem",
                            "position" => 2,
                            "name" => $city->name,
                            "item" => route('local.city', $city->slug)
                        ],
                        [
                            "@type" => "ListItem",
                            "position" => 3,
                            "name" => $service->name,
                            "item" => route('local.service', [$city->slug, $service->slug])
                        ]
                    ]
                ]
            ]
        ];
        $schemaJson = json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return view('local-seo.service-city', compact('city', 'service', 'cityReviews', 'lsiCloud', 'urgency', 'schemaJson'));
    }
}
