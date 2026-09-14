@props([
    'namaWilayah' => 'Jakarta',
    'city' => null,
    'districts' => null,
    'allCities' => null
])

@php
    $waNumber = \App\Models\Setting::get('whatsapp_number', '6285609009009');
    $cleanWa = preg_replace('/[^0-9]/', '', $waNumber);

    // Fetch Jakarta cities for SEO Silo if not passed
    $jakartaCities = $allCities ?? \App\Models\SeoCity::where('region', 'DKI Jakarta')->where('is_active', true)->get();

    // Fetch districts if not passed but $city is present
    $currentDistricts = $districts;
    if (!$currentDistricts && $city && method_exists($city, 'districts')) {
        $currentDistricts = $city->districts()->where('is_active', true)->get();
    }

    $faqs = [
        [
            'question' => 'Berapa lama proses pengerjaan pelancaran pipa mampet di ' . $namaWilayah . '?',
            'answer' => 'Rata-rata proses pengerjaan pelancaran pipa mampet oleh teknisi RooterIN membutuhkan waktu sekitar 30 hingga 60 menit. Durasi tergantung pada tingkat keparahan sumbatan kerak lemak jenuh atau benda asing yang masuk ke dalam pipa.',
        ],
        [
            'question' => 'Apakah ada biaya jika saluran pipa tidak lancar (Sistem No Result No Pay)?',
            'answer' => 'TIDAK ADA BIAYA sama sekali (Rp 0 / Gratis) jika teknisi kami gagal melancarkan saluran Anda. Kami memegang teguh komitmen No Result No Pay — Anda hanya membayar jika saluran pipa sudah lancar dan teruji.',
        ],
        [
            'question' => 'Bagaimana ketentuan dan jangkauan garansi 30 hari RooterIN?',
            'answer' => 'Setiap pengerjaan pelancaran pipa di ' . $namaWilayah . ' dilindungi garansi resmi selama 30 hari kalender. Apabila saluran tersumbat kembali pada titik pengerjaan yang sama dalam masa garansi, teknisi kami akan datang servis ulang secara GRATIS.',
        ],
        [
            'question' => 'Metode dan peralatan apa yang digunakan teknisi RooterIN?',
            'answer' => 'Kami menggunakan mesin kabel spiral fleksibel Ridgid USA yang mampu meluncur ikuti belokan pipa tanpa merusak atau membongkar lantai keramik. Untuk kasus kerak lemak membatu di komersial F&B, kami menyediakan armada mesin Hydro Jetting tekanan tinggi (hingga 300 Bar).',
        ],
        [
            'question' => 'Berapa estimasi waktu kedatangan teknisi ke lokasi di ' . $namaWilayah . '?',
            'answer' => 'Tim teknisi posko siaga terdekat kami di ' . $namaWilayah . ' diproyeksikan tiba di lokasi Anda dalam waktu 15 hingga 30 menit setelah Anda mengonfirmasi alamat pengerjaan melalui WhatsApp.',
        ],
    ];

    // Schema.org FAQPage JSON-LD
    $faqSchema = [
        "@context" => "https://schema.org",
        "@type" => "FAQPage",
        "mainEntity" => array_map(function($faq) {
            return [
                "@type" => "Question",
                "name" => $faq['question'],
                "acceptedAnswer" => [
                    "@type" => "Answer",
                    "text" => $faq['answer']
                ]
            ];
        }, $faqs)
    ];
    $faqSchemaJson = json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
@endphp

<section id="faq-interlink" class="py-24 bg-[#0a1618] text-white relative overflow-hidden">
    <!-- Ambient Glow -->
    <div class="absolute bottom-0 left-1/3 w-96 h-96 bg-[#10b981]/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 sm:px-6 relative z-10">
        
        <!-- SECTION 1: FAQ ACCORDION -->
        <div class="max-w-4xl mx-auto mb-24">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#10b981]/10 border border-[#10b981]/30 text-[#00e599] text-xs font-bold uppercase tracking-widest mb-4">
                    <i class="ri-questionnaire-line text-base"></i>
                    <span>PERTANYAAN UMUM (FAQ)</span>
                </div>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight mb-6 leading-tight">
                    Pertanyaan Sering Diajukan di <br class="hidden sm:inline" />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#10b981] to-[#00e599] font-black">{{ $namaWilayah }}</span>
                </h2>

                <p class="text-slate-300 text-base sm:text-lg leading-relaxed">
                    Segala hal yang perlu Anda ketahui mengenai sistem pengerjaan, garansi, serta tarif transparan RooterIN.
                </p>
            </div>

            <!-- Accordion List (Alpine.js powered) -->
            <div x-data="{ openFaq: 0 }" class="space-y-4">
                @foreach($faqs as $index => $faq)
                    <div class="bg-[#132226]/80 backdrop-blur-md rounded-2xl border border-[#10b981]/20 overflow-hidden transition-all duration-300">
                        <button type="button"
                                @click="openFaq = (openFaq === {{ $index }} ? null : {{ $index }})"
                                class="w-full px-6 py-5 text-left flex items-center justify-between gap-4 font-bold text-base sm:text-lg text-white hover:text-[#00e599] transition-colors focus:outline-none">
                            <span class="flex items-center gap-3">
                                <span class="w-7 h-7 rounded-lg bg-[#10b981]/20 text-[#00e599] text-xs font-extrabold flex items-center justify-center shrink-0">
                                    0{{ $index + 1 }}
                                </span>
                                <span>{{ $faq['question'] }}</span>
                            </span>
                            <div class="w-8 h-8 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-[#00e599] shrink-0 transition-transform duration-300"
                                 :class="{ 'rotate-180 bg-[#10b981] text-slate-950': openFaq === {{ $index }} }">
                                <i class="ri-arrow-down-s-line text-xl"></i>
                            </div>
                        </button>

                        <div x-show="openFaq === {{ $index }}"
                             x-collapse
                             x-cloak
                             class="px-6 pb-6 pt-2 text-slate-300 text-sm sm:text-base leading-relaxed border-t border-slate-800/60">
                            <p class="pl-10">{{ $faq['answer'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Urgent Call Banner -->
            <div class="mt-10 p-6 rounded-2xl bg-gradient-to-r from-[#132226] via-[#0d2a2a] to-[#132226] border border-[#10b981]/30 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left">
                <div>
                    <h4 class="text-lg font-bold text-white mb-1">Ada pertanyaan lain mengenai pipa mampet di {{ $namaWilayah }}?</h4>
                    <p class="text-slate-300 text-xs sm:text-sm">Konsultasi gratis 24 jam via WhatsApp bersama teknisi ahli kami.</p>
                </div>
                <a href="https://wa.me/{{ $cleanWa }}?text={{ urlencode('Halo Admin RooterIN, saya mau konsultasi masalah pipa mampet di ' . $namaWilayah) }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="px-6 py-3 rounded-xl bg-[#10b981] hover:bg-[#00e599] text-slate-950 font-bold text-xs uppercase tracking-wider transition-all shadow-lg shadow-[#10b981]/20 whitespace-nowrap">
                    Chat WhatsApp Fast Response
                </a>
            </div>
        </div>

        <!-- SECTION 2: INTERNAL LINKING HUB (SEO SILO) -->
        <div class="pt-16 border-t border-slate-800/80">
            <div class="max-w-5xl mx-auto">
                <div class="flex items-center gap-3 mb-8">
                    <span class="w-3 h-8 bg-[#00e599] rounded-full"></span>
                    <div>
                        <span class="text-xs font-bold text-[#00e599] uppercase tracking-widest block">SEO SILO & INTERNAL LINKING</span>
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-white">
                            Jangkauan Area Layanan Jakarta & Sekitarnya
                        </h3>
                    </div>
                </div>

                <!-- 1. Kota Administrasi Jakarta Links -->
                <div class="mb-10">
                    <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 flex items-center gap-2">
                        <i class="ri-map-pin-2-line text-[#00e599]"></i>
                        <span>Kota Administrasi DKI Jakarta</span>
                    </h4>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3">
                        @foreach($jakartaCities as $jktCity)
                            @if(!empty($jktCity->slug))
                                @php
                                    $isCurrent = ($city && $city->slug === $jktCity->slug) || Str::slug($namaWilayah) === $jktCity->slug;
                                @endphp
                                <a href="{{ route('local.city', ['city' => $jktCity->slug]) }}"
                                   class="p-3.5 rounded-xl border text-center transition-all duration-300 flex flex-col items-center justify-center gap-1 group {{ $isCurrent ? 'bg-[#10b981]/20 border-[#00e599] text-[#00e599] font-bold' : 'bg-[#132226]/60 border-white/10 hover:border-[#10b981]/40 text-slate-300 hover:text-white hover:bg-[#132226]' }}">
                                    <span class="text-xs font-bold group-hover:text-[#00e599] transition-colors">
                                        {{ $jktCity->name }}
                                    </span>
                                    <span class="text-[10px] text-slate-400 font-medium">DKI Jakarta</span>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- 2. Kecamatan Links (If available for current city) -->
                @if($currentDistricts && count($currentDistricts) > 0)
                    <div class="p-6 sm:p-8 rounded-3xl bg-[#132226]/50 border border-[#10b981]/20">
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 flex items-center gap-2">
                            <i class="ri-compass-3-line text-[#00e599]"></i>
                            <span>Daftar Kecamatan di {{ $namaWilayah }}</span>
                        </h4>
                        <div class="flex flex-wrap gap-2.5">
                            @foreach($currentDistricts as $dist)
                                @if(!empty($dist->slug))
                                    @php
                                        $cSlug = is_object($city) ? $city->slug : Str::slug($namaWilayah);
                                    @endphp
                                    <a href="{{ route('local.district', ['city' => $cSlug, 'district' => $dist->slug]) }}"
                                       class="px-4 py-2 rounded-xl bg-white/5 border border-white/10 hover:border-[#00e599]/50 hover:bg-[#10b981]/15 text-slate-300 hover:text-[#00e599] text-xs font-semibold transition-all flex items-center gap-2 group">
                                        <i class="ri-map-pin-line text-[11px] text-[#10b981] group-hover:scale-110 transition-transform"></i>
                                        <span>Kecamatan {{ $dist->name }}</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @else
                    <!-- Fallback Popular Jakarta Districts if no specific district list -->
                    <div class="p-6 sm:p-8 rounded-3xl bg-[#132226]/50 border border-[#10b981]/20">
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 flex items-center gap-2">
                            <i class="ri-compass-3-line text-[#00e599]"></i>
                            <span>Kecamatan Populer Area Jakarta</span>
                        </h4>
                        <div class="flex flex-wrap gap-2.5">
                            @php
                                $popDistricts = [
                                    ['name' => 'Kebayoran Baru', 'city' => 'jakarta-selatan', 'dist' => 'kebayoran-baru'],
                                    ['name' => 'Cilandak', 'city' => 'jakarta-selatan', 'dist' => 'cilandak'],
                                    ['name' => 'Tebet', 'city' => 'jakarta-selatan', 'dist' => 'tebet'],
                                    ['name' => 'Kebon Jeruk', 'city' => 'jakarta-barat', 'dist' => 'kebon-jeruk'],
                                    ['name' => 'Puri Indah', 'city' => 'jakarta-barat', 'dist' => 'puri-indah'],
                                    ['name' => 'Senen', 'city' => 'jakarta-pusat', 'dist' => 'senen'],
                                    ['name' => 'Kelapa Gading', 'city' => 'jakarta-utara', 'dist' => 'kelapa-gading'],
                                    ['name' => 'Sunter', 'city' => 'jakarta-utara', 'dist' => 'sunter'],
                                    ['name' => 'Jatinegara', 'city' => 'jakarta-timur', 'dist' => 'jatinegara'],
                                    ['name' => 'Duren Sawit', 'city' => 'jakarta-timur', 'dist' => 'duren-sawit'],
                                ];
                            @endphp
                            @foreach($popDistricts as $pDist)
                                <a href="{{ route('local.district', ['city' => $pDist['city'], 'district' => $pDist['dist']]) }}"
                                   class="px-4 py-2 rounded-xl bg-white/5 border border-white/10 hover:border-[#00e599]/50 hover:bg-[#10b981]/15 text-slate-300 hover:text-[#00e599] text-xs font-semibold transition-all flex items-center gap-2 group">
                                    <i class="ri-map-pin-line text-[11px] text-[#10b981] group-hover:scale-110 transition-transform"></i>
                                    <span>Kec. {{ $pDist['name'] }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>

    </div>
</section>

<!-- JSON-LD FAQPage Schema output -->
<script type="application/ld+json">
{!! $faqSchemaJson !!}
</script>
