<?php

namespace App\Http\Controllers;

use App\Models\SeoCity;
use App\Models\SeoDistrict;
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
        SEOTools::setCanonical(route('local.hub'));

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
        $districts = $city->districts()->where('is_active', true)->get();
        
        $cityReviews = LocalizedReview::where('seo_city_id', $city->id)->where('is_active', true)->get();
        if ($cityReviews->isEmpty()) {
            $cityReviews = LocalizedReview::whereNull('seo_city_id')->where('is_active', true)->take(3)->get();
        }

        $lsiCloud = $city->lsi_keywords ? array_map('trim', explode(',', $city->lsi_keywords)) : [];

        $title = "Jasa Saluran Pipa Mampet {$city->name} - Tanpa Bongkar";
        $description = "Solusi mampet nomor 1 di {$city->name}. Kami melayani seluruh area {$city->name} dengan peralatan modern tanpa bongkar & garansi 30 hari.";

        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(route('local.city', $city->slug));

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

        return view('local-seo.city-index', compact('city', 'services', 'districts', 'cityReviews', 'lsiCloud', 'urgency', 'schemaJson'));
    }

    /**
     * Dynamic Resolver untuk 2 Parameter URL: /jasa-pipa-mampet/{city}/{secondParam}
     */
    public function resolveCitySecondParam(string $citySlug, string $secondParam)
    {
        $city = SeoCity::where('slug', $citySlug)->where('is_active', true)->firstOrFail();

        // 1. Cek apakah secondParam adalah slug Kecamatan
        $district = SeoDistrict::where('seo_city_id', $city->id)
            ->where('slug', $secondParam)
            ->where('is_active', true)
            ->first();

        if ($district) {
            return $this->districtLanding($citySlug, $secondParam);
        }

        // 2. Jika bukan kecamatan, cek apakah secondParam adalah slug Layanan
        $service = Service::where('slug', $secondParam)->first();
        if ($service) {
            return $this->show($citySlug, $secondParam);
        }

        abort(404);
    }

    /**
     * Tampilkan landing page utama untuk kecamatan tertentu (/jasa-pipa-mampet/{city}/{district})
     */
    public function districtLanding(string $citySlug, string $districtSlug)
    {
        $city = SeoCity::where('slug', $citySlug)->where('is_active', true)->firstOrFail();
        $district = SeoDistrict::where('seo_city_id', $city->id)
            ->where('slug', $districtSlug)
            ->where('is_active', true)
            ->firstOrFail();

        $services = Service::where('is_active', true)->get();
        $cityReviews = LocalizedReview::where('seo_city_id', $city->id)->where('is_active', true)->get();
        if ($cityReviews->isEmpty()) {
            $cityReviews = LocalizedReview::whereNull('seo_city_id')->where('is_active', true)->take(3)->get();
        }

        $lsiKeywordsStr = $district->lsi_keywords ?: $city->lsi_keywords;
        $lsiCloud = $lsiKeywordsStr ? array_map('trim', explode(',', $lsiKeywordsStr)) : [];

        $title = "Jasa Saluran Pipa Mampet {$district->name}, {$city->name} - Tanpa Bongkar";
        $description = "Solusi mampet cepat & bergaransi di area {$district->name}, {$city->name}. Teknisi RooterIN tiba 15-30 menit, peralatan modern tanpa bobok.";

        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(route('local.district', [$city->slug, $district->slug]));

        $urgencySlogans = [
            "Tukang Saluran Mampet Terdekat di {$district->name} - Tiba 15 Menit!",
            "Solusi Pipa Tersumbat Area {$district->name} - Garansi Resmi 30 Hari!",
            "Ahli Rooter Pipa {$district->name}, {$city->name} - Bayar Setelah Lancar!"
        ];
        $urgency = $urgencySlogans[array_rand($urgencySlogans)];

        $phone = '+' . preg_replace('/[^0-9]/', '', \App\Models\Setting::get('whatsapp_number', '6285609009009'));

        $schema = [
            "@context" => "https://schema.org",
            "@graph" => [
                [
                    "@type" => ["LocalBusiness", "PlumbingContractor"],
                    "@id" => route('local.district', [$city->slug, $district->slug]) . "#business",
                    "name" => "RooterIN " . $district->name . ", " . $city->name,
                    "url" => route('local.district', [$city->slug, $district->slug]),
                    "telephone" => $phone,
                    "priceRange" => "Rp 600.000 - Rp 2.500.000",
                    "address" => [
                        "@type" => "PostalAddress",
                        "streetAddress" => $district->landmark_name ?: $district->name,
                        "addressLocality" => $district->name,
                        "addressRegion" => $city->name,
                        "postalCode" => $district->zip_code ?: '',
                        "addressCountry" => "ID"
                    ],
                    "geo" => [
                        "@type" => "GeoCoordinates",
                        "latitude" => $district->latitude,
                        "longitude" => $district->longitude
                    ],
                    "areaServed" => [
                        [
                            "@type" => "AdministrativeArea",
                            "name" => $district->name . ", " . $city->name
                        ]
                    ],
                    "description" => $description
                ],
                [
                    "@type" => "BreadcrumbList",
                    "itemListElement" => [
                        ["@type" => "ListItem", "position" => 1, "name" => "Beranda", "item" => url('/')],
                        ["@type" => "ListItem", "position" => 2, "name" => "Area Layanan", "item" => route('local.hub')],
                        ["@type" => "ListItem", "position" => 3, "name" => $city->name, "item" => route('local.city', $city->slug)],
                        ["@type" => "ListItem", "position" => 4, "name" => $district->name, "item" => route('local.district', [$city->slug, $district->slug])]
                    ]
                ]
            ]
        ];
        $schemaJson = json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return view('local-seo.district-index', compact('city', 'district', 'services', 'cityReviews', 'lsiCloud', 'urgency', 'schemaJson'));
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
        SEOTools::setCanonical(route('local.service', [$city->slug, $service->slug]));

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

    /**
     * Tampilkan halaman layanan spesifik di kecamatan tertentu (/jasa-pipa-mampet/{city}/{district}/{service})
     */
    public function districtService(string $citySlug, string $districtSlug, string $serviceSlug)
    {
        $city = SeoCity::where('slug', $citySlug)->where('is_active', true)->firstOrFail();
        $district = SeoDistrict::where('seo_city_id', $city->id)
            ->where('slug', $districtSlug)
            ->where('is_active', true)
            ->firstOrFail();
        $service = Service::where('slug', $serviceSlug)->firstOrFail();

        $cityReviews = LocalizedReview::where('seo_city_id', $city->id)->where('is_active', true)->get();
        if ($cityReviews->isEmpty()) {
            $cityReviews = LocalizedReview::whereNull('seo_city_id')->where('is_active', true)->take(3)->get();
        }

        $lsiKeywordsStr = $district->lsi_keywords ?: $city->lsi_keywords;
        $lsiCloud = $lsiKeywordsStr ? array_map('trim', explode(',', $lsiKeywordsStr)) : [];

        $title = "{$service->name} di {$district->name}, {$city->name} - Garansi 30 Hari";
        $description = "Butuh {$service->name} cepat di area {$district->name}, {$city->name}? RooterIN melayani penanganan tanpa bongkar dengan peralatan modern.";

        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(route('local.district.service', [$city->slug, $district->slug, $service->slug]));

        $urgencySlogans = [
            "Tukang {$service->name} di {$district->name} - Tiba 15 Menit!",
            "Layanan {$service->name} Bergaransi Area {$district->name}!",
            "Solusi Pipa Tuntas {$district->name}, {$city->name} - Bayar Setelah Lancar!"
        ];
        $urgency = $urgencySlogans[array_rand($urgencySlogans)];

        $phone = '+' . preg_replace('/[^0-9]/', '', \App\Models\Setting::get('whatsapp_number', '6285609009009'));

        $schema = [
            "@context" => "https://schema.org",
            "@graph" => [
                [
                    "@type" => "Service",
                    "@id" => route('local.district.service', [$city->slug, $district->slug, $service->slug]) . "#service",
                    "name" => $service->name . " di " . $district->name . ", " . $city->name,
                    "url" => route('local.district.service', [$city->slug, $district->slug, $service->slug]),
                    "provider" => [
                        "@type" => ["LocalBusiness", "PlumbingContractor"],
                        "name" => "RooterIN " . $district->name,
                        "telephone" => $phone,
                        "priceRange" => "$$",
                        "geo" => [
                            "@type" => "GeoCoordinates",
                            "latitude" => $district->latitude,
                            "longitude" => $district->longitude
                        ],
                        "address" => [
                            "@type" => "PostalAddress",
                            "addressLocality" => $district->name,
                            "addressRegion" => $city->name,
                            "addressCountry" => "ID"
                        ]
                    ],
                    "areaServed" => [
                        "@type" => "AdministrativeArea",
                        "name" => $district->name . ", " . $city->name
                    ],
                    "description" => $description
                ],
                [
                    "@type" => "BreadcrumbList",
                    "itemListElement" => [
                        ["@type" => "ListItem", "position" => 1, "name" => "Beranda", "item" => url('/')],
                        ["@type" => "ListItem", "position" => 2, "name" => $city->name, "item" => route('local.city', $city->slug)],
                        ["@type" => "ListItem", "position" => 3, "name" => $district->name, "item" => route('local.district', [$city->slug, $district->slug])],
                        ["@type" => "ListItem", "position" => 4, "name" => $service->name, "item" => route('local.district.service', [$city->slug, $district->slug, $service->slug])]
                    ]
                ]
            ]
        ];
        $schemaJson = json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return view('local-seo.district-service', compact('city', 'district', 'service', 'cityReviews', 'lsiCloud', 'urgency', 'schemaJson'));
    }
}
