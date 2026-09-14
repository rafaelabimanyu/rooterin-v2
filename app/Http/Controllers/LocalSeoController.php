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
     * Helper untul konfigurasi SEO Tools (Title, Description, Canonical, OG, & Twitter)
     */
    protected function setupSeo(string $title, string $description, string $canonicalUrl, ?string $imageRelPath = null): void
    {
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical($canonicalUrl);

        SEOTools::opengraph()->setTitle($title);
        SEOTools::opengraph()->setDescription($description);
        SEOTools::opengraph()->setUrl($canonicalUrl);
        SEOTools::opengraph()->addProperty('type', 'website');

        $imageUrl = asset('images/pages/hero1.webp');
        if ($imageRelPath && file_exists(public_path($imageRelPath))) {
            $imageUrl = asset($imageRelPath);
        }

        SEOTools::opengraph()->addImage($imageUrl);
        SEOTools::twitter()->setTitle($title);
        SEOTools::twitter()->setDescription($description);
        SEOTools::twitter()->setImage($imageUrl);
        SEOTools::twitter()->setSite('@rooterin');
    }

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
        $canonical = route('local.hub');

        $this->setupSeo($title, $description, $canonical);

        $phone = '+' . preg_replace('/[^0-9]/', '', \App\Models\Setting::get('whatsapp_number', '6285609009009'));

        $schema = [
            "@context" => "https://schema.org",
            "@graph" => [
                [
                    "@type" => ["LocalBusiness", "PlumbingService"],
                    "@id" => url('/jasa-pelancar-saluran-mampet') . "#hub",
                    "name" => "RooterIN - Jasa Pelancar Saluran Pipa Mampet",
                    "url" => url('/jasa-pelancar-saluran-mampet'),
                    "telephone" => $phone,
                    "priceRange" => "Rp 400.000+",
                    "paymentAccepted" => "Cash, Transfer Bank, QRIS",
                    "currenciesAccepted" => "IDR",
                    "openingHoursSpecification" => [
                        [
                            "@type" => "OpeningHoursSpecification",
                            "dayOfWeek" => ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                            "opens" => "00:00",
                            "closes" => "23:59"
                        ]
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "4.9",
                        "reviewCount" => "128",
                        "bestRating" => "5",
                        "worstRating" => "1"
                    ],
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

        // Standarisasi SEO Title & Meta Description sesuai Master Prompt
        $title = "Jasa Saluran Pipa Mampet {$city->name} - Tuntas Tanpa Bongkar | RooterIN";
        $description = "Layanan jasa pelancar saluran pipa mampet di {$city->name}. Spesialis wastafel, kloset WC, floor drain, dan got tersumbat. Teknisi siaga 24 jam, bergaransi resmi, No Result No Pay.";
        $canonical = route('local.city', $city->slug);

        // Dynamic OpenGraph Image
        $ogImgPath = "assets/wilayah/jakarta/rooterin-area-layanan-saluran-mampet-{$city->slug}-01.webp";

        $this->setupSeo($title, $description, $canonical, $ogImgPath);

        // Dynamic Urgency Slogan
        $urgencySlogans = [
            "Jasa Saluran Mampet Tercepat di {$city->name} - Respon 10 Menit!",
            "Solusi Pipa Penuh Area {$city->name} - Garansi Tanpa Bongkar!",
            "Tukang Rooter Profesional {$city->name} - Harga Jujur!"
        ];
        $urgency = $urgencySlogans[array_rand($urgencySlogans)];

        $phone = '+' . preg_replace('/[^0-9]/', '', \App\Models\Setting::get('whatsapp_number', '6285609009009'));

        // Programmatic Schema.org (JSON-LD) PlumbingService & LocalBusiness
        $schema = [
            "@context" => "https://schema.org",
            "@graph" => [
                [
                    "@type" => ["LocalBusiness", "PlumbingService"],
                    "@id" => route('local.city', $city->slug) . "#business",
                    "name" => "RooterIN - Jasa Saluran Pipa Mampet " . $city->name,
                    "url" => route('local.city', $city->slug),
                    "telephone" => $phone, 
                    "priceRange" => "Rp 400.000+",
                    "paymentAccepted" => "Cash, Transfer Bank, QRIS",
                    "currenciesAccepted" => "IDR",
                    "serviceType" => [
                        "Jasa Saluran Mampet",
                        "Pelancar WC Tersumbat",
                        "Pembersihan Grease Trap & Drainase",
                        "Pelancaran Wastafel Dapur",
                        "Pelancaran Got & Talang Air"
                    ],
                    "openingHoursSpecification" => [
                        [
                            "@type" => "OpeningHoursSpecification",
                            "dayOfWeek" => ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                            "opens" => "00:00",
                            "closes" => "23:59"
                        ]
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "4.9",
                        "reviewCount" => "128",
                        "bestRating" => "5",
                        "worstRating" => "1"
                    ],
                    "address" => [
                        "@type" => "PostalAddress",
                        "addressLocality" => $city->name,
                        "addressRegion" => $city->region ?: "DKI Jakarta",
                        "addressCountry" => "ID"
                    ],
                    "geo" => [
                        "@type" => "GeoCoordinates",
                        "latitude" => $city->latitude ?: -6.2088,
                        "longitude" => $city->longitude ?: 106.8456
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
                        ["@type" => "ListItem", "position" => 1, "name" => "Beranda", "item" => url('/')],
                        ["@type" => "ListItem", "position" => 2, "name" => "Area Layanan", "item" => route('local.hub')],
                        ["@type" => "ListItem", "position" => 3, "name" => $city->name, "item" => route('local.city', $city->slug)]
                    ]
                ]
            ]
        ];
        $schemaJson = json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return view('local-seo.city-index', compact('city', 'services', 'districts', 'cityReviews', 'lsiCloud', 'urgency', 'schemaJson'));
    }

    /**
     * Dynamic Resolver untuk 2 Parameter URL: /jasa-pipa-mampet/{city}/{district}
     */
    public function resolveCitySecondParam(string $citySlug, string $district)
    {
        $secondParam = $district;
        $city = SeoCity::where('slug', $citySlug)->where('is_active', true)->firstOrFail();

        // 1. Cek apakah secondParam adalah slug Kecamatan yang terdaftar
        $districtObj = SeoDistrict::where('seo_city_id', $city->id)
            ->where('slug', $secondParam)
            ->where('is_active', true)
            ->first();

        if ($districtObj) {
            return $this->districtLanding($citySlug, $secondParam);
        }

        // 2. Jika bukan kecamatan, cek apakah secondParam adalah slug Layanan
        $service = Service::where('slug', $secondParam)->first();
        if ($service) {
            return $this->show($citySlug, $secondParam);
        }

        // 3. Fallback Auto-Creation untuk Kecamatan Baru (Jaminan 0% 404)
        $districtName = ucwords(str_replace('-', ' ', $secondParam));
        SeoDistrict::firstOrCreate(
            ['seo_city_id' => $city->id, 'slug' => $secondParam],
            [
                'name' => $districtName,
                'is_active' => true,
                'landmark_name' => "Wilayah " . $districtName,
                'lsi_keywords' => "jasa pipa mampet {$secondParam}, pelancar wastafel {$secondParam}, tukang ledeng {$secondParam}"
            ]
        );

        return $this->districtLanding($citySlug, $secondParam);
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

        // Standarisasi SEO Title & Meta Description Kecamatan
        $title = "Jasa Saluran Pipa Mampet {$district->name}, {$city->name} - Tuntas Tanpa Bongkar | RooterIN";
        $description = "Layanan jasa pelancar saluran pipa mampet di {$district->name}, {$city->name}. Spesialis wastafel, kloset WC, floor drain, dan got tersumbat. Teknisi siaga 24 jam, bergaransi resmi, No Result No Pay.";
        $canonical = route('local.district', [$city->slug, $district->slug]);

        $ogImgPath = "assets/wilayah/jakarta/rooterin-area-layanan-saluran-mampet-{$city->slug}-01.webp";

        $this->setupSeo($title, $description, $canonical, $ogImgPath);

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
                    "@type" => ["LocalBusiness", "PlumbingService"],
                    "@id" => route('local.district', [$city->slug, $district->slug]) . "#business",
                    "name" => "RooterIN - Jasa Saluran Pipa Mampet " . $district->name . ", " . $city->name,
                    "url" => route('local.district', [$city->slug, $district->slug]),
                    "telephone" => $phone,
                    "priceRange" => "Rp 400.000+",
                    "paymentAccepted" => "Cash, Transfer Bank, QRIS",
                    "currenciesAccepted" => "IDR",
                    "serviceType" => [
                        "Jasa Saluran Mampet",
                        "Pelancar WC Tersumbat",
                        "Pembersihan Grease Trap & Drainase",
                        "Pelancaran Wastafel Dapur",
                        "Pelancaran Got & Talang Air"
                    ],
                    "openingHoursSpecification" => [
                        [
                            "@type" => "OpeningHoursSpecification",
                            "dayOfWeek" => ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                            "opens" => "00:00",
                            "closes" => "23:59"
                        ]
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "4.9",
                        "reviewCount" => "124",
                        "bestRating" => "5",
                        "worstRating" => "1"
                    ],
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
                        "latitude" => $district->latitude ?: -6.2088,
                        "longitude" => $district->longitude ?: 106.8456
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

        $cityReviews = LocalizedReview::where('seo_city_id', $city->id)->where('is_active', true)->get();
        if ($cityReviews->isEmpty()) {
            $cityReviews = LocalizedReview::whereNull('seo_city_id')->where('is_active', true)->take(3)->get();
        }

        $lsiCloud = $city->lsi_keywords ? array_map('trim', explode(',', $city->lsi_keywords)) : [];

        $title = "{$service->name} di {$city->name} - Tuntas Tanpa Bongkar | RooterIN";
        $description = "Layanan {$service->name} di {$city->name}. Spesialis penanganan pipa mampet cepat, bergaransi resmi 30 hari, tanpa bongkar keramik, No Result No Pay.";
        $canonical = route('local.service', [$city->slug, $service->slug]);

        $ogImgPath = "assets/wilayah/jakarta/rooterin-area-layanan-saluran-mampet-{$city->slug}-01.webp";

        $this->setupSeo($title, $description, $canonical, $ogImgPath);

        $urgencySlogans = [
            "Tukang Pipa Terdekat di {$city->name} - Tiba dalam 15 Menit!",
            "Diskon Khusus Area {$city->name} Hari Ini - Bergaransi!",
            "Ahli Saluran Mampet {$city->name} - Bayar Setelah Lancar!"
        ];
        $urgency = $urgencySlogans[array_rand($urgencySlogans)];

        $phone = '+' . preg_replace('/[^0-9]/', '', \App\Models\Setting::get('whatsapp_number', '6285609009009'));

        $schema = [
            "@context" => "https://schema.org",
            "@graph" => [
                [
                    "@type" => "Service",
                    "@id" => route('local.service', [$city->slug, $service->slug]) . "#service",
                    "name" => $service->name . " di " . $city->name,
                    "url" => route('local.service', [$city->slug, $service->slug]),
                    "provider" => [
                        "@type" => ["LocalBusiness", "PlumbingService"],
                        "name" => "RooterIN - " . $city->name,
                        "telephone" => $phone,
                        "priceRange" => "Rp 400.000+",
                        "geo" => [
                            "@type" => "GeoCoordinates",
                            "latitude" => $city->latitude ?: -6.2088,
                            "longitude" => $city->longitude ?: 106.8456
                        ],
                        "address" => [
                            "@type" => "PostalAddress",
                            "addressLocality" => $city->name,
                            "addressRegion" => $city->region ?: "DKI Jakarta",
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
                        ["@type" => "ListItem", "position" => 1, "name" => "Beranda", "item" => url('/')],
                        ["@type" => "ListItem", "position" => 2, "name" => $city->name, "item" => route('local.city', $city->slug)],
                        ["@type" => "ListItem", "position" => 3, "name" => $service->name, "item" => route('local.service', [$city->slug, $service->slug])]
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

        $title = "{$service->name} di {$district->name}, {$city->name} - Tuntas Tanpa Bongkar | RooterIN";
        $description = "Layanan {$service->name} di area {$district->name}, {$city->name}. Spesialis penanganan pipa tersumbat tanpa bongkar keramik, bergaransi 30 hari, No Result No Pay.";
        $canonical = route('local.district.service', [$city->slug, $district->slug, $service->slug]);

        $ogImgPath = "assets/wilayah/jakarta/rooterin-area-layanan-saluran-mampet-{$city->slug}-01.webp";

        $this->setupSeo($title, $description, $canonical, $ogImgPath);

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
                        "@type" => ["LocalBusiness", "PlumbingService"],
                        "name" => "RooterIN - " . $district->name,
                        "telephone" => $phone,
                        "priceRange" => "Rp 400.000+",
                        "geo" => [
                            "@type" => "GeoCoordinates",
                            "latitude" => $district->latitude ?: -6.2088,
                            "longitude" => $district->longitude ?: 106.8456
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
