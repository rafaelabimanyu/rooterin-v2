<x-app-layout>
{{-- HERO SECTION DISTRICT LEVEL - DEEP TEAL DARK (#061417) WITH RADIAL GLOW --}}
<section class="relative pt-36 sm:pt-48 pb-32 overflow-hidden bg-[#061417] text-white min-h-[85vh] flex items-center">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/pages/hero1.webp') }}" 
             width="1920"
             height="1080"
             loading="eager"
             decoding="async"
             class="w-full h-full object-cover opacity-15 grayscale brightness-50" 
             alt="Jasa Saluran Pipa Mampet {{ $district->name }} {{ $city->name }}">
        <div class="absolute inset-0 bg-gradient-to-b from-[#061417]/90 via-[#061417]/80 to-[#061417]" style="background: radial-gradient(circle at top right, rgba(16,185,129,0.18), transparent 65%);"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 relative z-10">
        <div class="max-w-4xl mx-auto text-center lg:text-left">
            <nav class="flex items-center justify-center lg:justify-start gap-2 text-xs font-bold uppercase tracking-widest text-slate-400 mb-8 flex-wrap">
                <a href="{{ route('home') }}" class="hover:text-[#00e599] transition-colors">Home</a>
                <i class="ri-arrow-right-s-line text-[#10b981]"></i>
                <a href="{{ route('local.hub') }}" class="hover:text-[#00e599] transition-colors">Area Layanan</a>
                <i class="ri-arrow-right-s-line text-[#10b981]"></i>
                <a href="{{ route('local.city', $city->slug) }}" class="hover:text-[#00e599] transition-colors">{{ $city->name }}</a>
                <i class="ri-arrow-right-s-line text-[#10b981]"></i>
                <span class="text-[#00e599] font-black">{{ $district->name }}</span>
            </nav>

            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold text-white leading-tight mb-8 tracking-tight">
                Jasa Saluran Pipa Mampet <br class="hidden sm:inline" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-300 to-green-400 font-black">
                    {{ $district->name }}
                </span>, {{ $city->name }}
            </h1>

            <div class="mb-10 inline-flex items-center gap-3 px-6 py-3 bg-[#132226]/90 border border-[#10b981]/40 rounded-2xl shadow-xl backdrop-blur-md">
                <i class="ri-flashlight-fill text-[#00e599] text-xl animate-pulse"></i>
                <span class="text-xs sm:text-sm font-bold text-slate-200 uppercase tracking-wider">{{ $urgency }}</span>
            </div>
            
            <p class="text-lg sm:text-xl text-slate-300 leading-relaxed mb-10 max-w-3xl">
                RooterIN melayani penanganan darurat pipa tersumbat, wastafel mampet, dan drainase kotor di area <strong class="text-white font-bold">Kecamatan {{ $district->name }}</strong> ({{ $city->name }}) dengan peralatan Ridgid tanpa bongkar & garansi 30 hari.
            </p>

            <div class="flex flex-col sm:flex-row items-center gap-4 justify-center lg:justify-start">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', \App\Models\Setting::get('whatsapp_number', '6285609009009')) }}?text={{ urlencode('Halo Admin RooterIN, saya butuh layanan pelancaran pipa mampet untuk area ' . $district->name . ', ' . $city->name . '. Mohon info jadwal teknisi terdekat.') }}" 
                   target="_blank"
                   rel="noopener noreferrer"
                   onclick="trackWhatsAppClick && trackWhatsAppClick('district_hero_{{ $district->slug }}')"
                   class="w-full sm:w-auto px-8 py-4 bg-[#10b981] hover:bg-[#00e599] text-slate-950 rounded-2xl font-extrabold text-base transition-all duration-300 shadow-xl shadow-[#10b981]/25 hover:scale-105 flex items-center justify-center gap-3 group">
                    <i class="ri-whatsapp-line text-2xl"></i>
                    <span>Hubungi Teknisi {{ $district->name }}</span>
                    <i class="ri-arrow-right-line text-lg group-hover:translate-x-1 transition-transform"></i>
                </a>

                <a href="#pricing" class="w-full sm:w-auto px-8 py-4 bg-[#132226]/80 hover:bg-[#132226] text-white border border-[#10b981]/30 hover:border-[#00e599]/60 rounded-2xl font-bold text-base transition-all duration-300 flex items-center justify-center gap-2">
                    <i class="ri-price-tag-3-line text-[#00e599]"></i>
                    <span>Daftar Estimasi Biaya</span>
                </a>
            </div>

            <div class="mt-12 pt-8 border-t border-slate-800/80 grid grid-cols-3 gap-4 text-center max-w-xl mx-auto lg:mx-0">
                <div>
                    <span class="text-2xl sm:text-3xl font-black text-[#00e599] block">15-30 mnt</span>
                    <span class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider block mt-1">Estimasi Tiba</span>
                </div>
                <div>
                    <span class="text-2xl sm:text-3xl font-black text-white block">30 Hari</span>
                    <span class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider block mt-1">Garansi Resmi</span>
                </div>
                <div>
                    <span class="text-2xl sm:text-3xl font-black text-[#00e599] block">0 Rupiah</span>
                    <span class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider block mt-1">No Result No Pay</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MODULAR COMPONENT 1: ESTIMASI BIAYA TRANSPARAN -->
<x-pricing-section :namaWilayah="$district->name . ', ' . $city->name" />

<!-- MODULAR COMPONENT: CARA KERJA PRAKTIS 4 LANGKAH -->
<x-workflow-section :namaWilayah="$district->name . ', ' . $city->name" />

<!-- MODULAR COMPONENT 2: SPESIALISASI LINTAS SEKTOR -->
<x-sectors-section :namaWilayah="$district->name . ', ' . $city->name" />

<!-- MODULAR COMPONENT: KOMPARASI METODE (ROOTERIN VS TRADISIONAL) -->
<x-comparison-section :namaWilayah="$district->name . ', ' . $city->name" />

<!-- MODULAR COMPONENT 3: KEUNGGULAN UTAMA & MITRA DUMMY -->
<x-features-partners :namaWilayah="$district->name" />

<!-- MODULAR COMPONENT 4: FOTO WILAYAH & DOKUMENTASI TERINTEGRASI -->
<x-regional-gallery :namaWilayah="$district->name . ', ' . $city->name" :citySlug="$city->slug" />

<!-- MODULAR COMPONENT 5: FAQ ACCORDION & INTERNAL LINKING SEO SILO -->
<x-faq-interlink :namaWilayah="$district->name . ', ' . $city->name" :city="$city" />

@isset($schemaJson)
<script type="application/ld+json">
{!! $schemaJson !!}
</script>
@endisset

</x-app-layout>
