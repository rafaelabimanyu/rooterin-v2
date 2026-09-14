@props([
    'namaWilayah' => 'Jakarta'
])

@php
    $pillars = [
        [
            'title' => '100% Non-Bongkar',
            'subtitle' => 'Tanpa Merusak Keramik',
            'icon' => 'ri-tools-line',
            'description' => 'Metode kabel spiral fleksibel meluncur ikuti belokan pipa tanpa merusak ubin keramik.',
        ],
        [
            'title' => 'Garansi 30 Hari',
            'subtitle' => 'Jaminan Tuntas Kalender',
            'icon' => 'ri-shield-check-line',
            'description' => 'Jaminan tuntas 30 hari kalender. Jika mampet berulang pada titik sama, teknisi servis gratis.',
        ],
        [
            'title' => 'Respon Cepat 24/7',
            'subtitle' => 'Posko Siaga Terdekat',
            'icon' => 'ri-time-line',
            'description' => 'Armada posko siaga terdekat di wilayah ' . $namaWilayah . ' siap meluncur 24 jam nonstop.',
        ],
        [
            'title' => '0% Kimia Korosif',
            'subtitle' => 'Aman Pipa PVC',
            'icon' => 'ri-flask-line',
            'description' => 'Tanpa soda api atau zat kimia berbahaya yang melunakkan dan merusak sambungan pipa PVC.',
        ],
    ];

    $partners = [
        ['name' => 'PT Pertamina (Persero)', 'tag' => 'Fasilitas & BUMN', 'icon' => 'ri-building-line'],
        ['name' => 'PT Kereta Api Indonesia', 'tag' => 'Stasiun & Kantor KAI', 'icon' => 'ri-train-line'],
        ['name' => 'Almaz Fried Chicken', 'tag' => 'Restoran Kuliner', 'icon' => 'ri-restaurant-line'],
        ['name' => 'Haka Dimsum Tebet', 'tag' => 'Kuliner & Cafe', 'icon' => 'ri-cup-line'],
        ['name' => 'Sushi Tei Indonesia', 'tag' => 'Japanese Restaurant', 'icon' => 'ri-restaurant-2-line'],
        ['name' => 'Restoran Shoichiro', 'tag' => 'Commercial F&B', 'icon' => 'ri-hotel-line'],
        ['name' => 'Pengelola Apartemen Jakarta', 'tag' => 'Hunian Vertikal', 'icon' => 'ri-community-line'],
        ['name' => 'Kawasan Bisnis & Perkantoran', 'tag' => 'Komersial & Ruko', 'icon' => 'ri-briefcase-line'],
    ];
@endphp

<section id="features-partners" class="py-24 bg-[#0a1618] text-white relative overflow-hidden border-t border-b border-[#10b981]/15">
    <!-- Ambient Background glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[#10b981]/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 sm:px-6 relative z-10">
        
        <!-- 4 PILAR KEUNGGULAN UTAMA -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#10b981]/10 border border-[#10b981]/30 text-[#00e599] text-xs font-bold uppercase tracking-widest mb-4">
                <i class="ri-award-line text-base"></i>
                <span>STANDAR KUALITAS ROOTERIN</span>
            </div>

            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight mb-6 leading-tight">
                4 Keunggulan Utama Layanan <br class="hidden sm:inline" />
                di <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#10b981] to-[#00e599] font-black">{{ $namaWilayah }}</span>
            </h2>

            <p class="text-slate-300 text-base sm:text-lg leading-relaxed">
                Komitmen kami memberikan solusi pelancaran pipa tersumbat paling efektif, aman, dan tanpa merusak aset properti Anda.
            </p>
        </div>

        <!-- Pillars Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-24">
            @foreach($pillars as $pilar)
                <div class="relative bg-[#132226]/80 backdrop-blur-md rounded-3xl p-6 sm:p-8 border border-[#10b981]/20 hover:border-[#00e599]/50 transition-all duration-300 hover:-translate-y-2 group">
                    <div class="w-14 h-14 rounded-2xl bg-[#10b981]/10 border border-[#10b981]/30 flex items-center justify-center text-[#00e599] mb-6 group-hover:bg-[#10b981] group-hover:text-slate-950 transition-all duration-300">
                        <i class="{{ $pilar['icon'] }} text-2xl"></i>
                    </div>

                    <h3 class="text-xl font-bold text-white mb-1 group-hover:text-[#00e599] transition-colors">
                        {{ $pilar['title'] }}
                    </h3>

                    <span class="inline-block text-xs font-semibold text-[#00e599] uppercase tracking-wider mb-4">
                        {{ $pilar['subtitle'] }}
                    </span>

                    <p class="text-slate-300 text-sm leading-relaxed">
                        {{ $pilar['description'] }}
                    </p>
                </div>
            @endforeach
        </div>

        <!-- SECTION MITRA KLIEN -->
        <div class="pt-16 border-t border-slate-800/80">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest block mb-2">KEPERCAYAAN & REKAM JEJAK</span>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-white">
                    Dipercaya oleh Ratusan Pelanggan & Mitra Klien di {{ $namaWilayah }}
                </h3>
            </div>

            <!-- Partner Logo Grid Placeholder (Monochrome / White Opacity Style) -->
            <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-4 gap-4 sm:gap-6">
                @foreach($partners as $partner)
                    <div class="p-5 rounded-2xl bg-[#132226]/50 border border-white/5 hover:border-[#10b981]/30 hover:bg-[#132226] transition-all duration-300 flex flex-col items-center justify-center text-center group">
                        <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-white/60 group-hover:text-[#00e599] group-hover:bg-[#10b981]/10 transition-all mb-3">
                            <i class="{{ $partner['icon'] }} text-xl"></i>
                        </div>
                        <span class="text-sm font-bold text-slate-200 group-hover:text-white transition-colors block">
                            {{ $partner['name'] }}
                        </span>
                        <span class="text-[11px] font-medium text-slate-400 block mt-0.5">
                            {{ $partner['tag'] }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
