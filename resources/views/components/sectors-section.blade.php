@props([
    'namaWilayah' => 'Jakarta',
    'whatsappNumber' => null
])

@php
    $waNumber = $whatsappNumber ?? \App\Models\Setting::get('whatsapp_number', '6285609009009');
    $cleanWa = preg_replace('/[^0-9]/', '', $waNumber);

    $sectors = [
        [
            'name' => 'Hunian Rumah Tinggal',
            'badge' => 'Paling Banyak Ditangani',
            'icon' => 'ri-home-4-line',
            'points' => [
                'Wastafel dapur, WC & floor drain',
                'Bebas kimia korosif soda api',
                'Garansi tuntas 30 hari resmi'
            ],
            'message' => 'Halo Admin RooterIN, saya butuh layanan pelancaran pipa sektor Rumah Tinggal untuk area ' . $namaWilayah . '. Mohon info jadwal teknisi terdekat.',
        ],
        [
            'name' => 'Restoran, Cafe & F&B',
            'badge' => null,
            'icon' => 'ri-restaurant-line',
            'points' => [
                'Hydro Jetting pengikis lemak 300 Bar',
                'Pengerjaan Shift Malam tanpa bau operasional',
                'Pembersihan Grease Trap & Pipa Dapur'
            ],
            'message' => 'Halo Admin RooterIN, saya butuh layanan pelancaran pipa sektor Restoran, Cafe & F&B untuk area ' . $namaWilayah . '. Mohon info jadwal teknisi terdekat.',
        ],
        [
            'name' => 'Apartemen & Kondominium',
            'badge' => null,
            'icon' => 'ri-building-2-line',
            'points' => [
                'Kabel spiral fleksibel Ridgid USA',
                'Metode tanpa bising & tanpa getar ke unit bawah',
                'Penanganan aman di gedung tinggi'
            ],
            'message' => 'Halo Admin RooterIN, saya butuh layanan pelancaran pipa sektor Apartemen & Kondominium untuk area ' . $namaWilayah . '. Mohon info jadwal teknisi terdekat.',
        ],
        [
            'name' => 'Ruko Bisnis & Rukan',
            'badge' => null,
            'icon' => 'ri-store-2-line',
            'points' => [
                'Pelancaran bak kontrol & talang',
                'Respon siaga teknisi terdekat',
                'Pencegahan genangan air hujan & banjir'
            ],
            'message' => 'Halo Admin RooterIN, saya butuh layanan pelancaran pipa sektor Ruko Bisnis & Rukan untuk area ' . $namaWilayah . '. Mohon info jadwal teknisi terdekat.',
        ],
        [
            'name' => 'Gedung Perkantoran',
            'badge' => null,
            'icon' => 'ri-building-4-line',
            'points' => [
                'Kepatuhan K3 & APD Lengkap',
                'Kontrak Maintenance Berkala',
                'Penanganan toilet massal & shaft vertikal'
            ],
            'message' => 'Halo Admin RooterIN, saya butuh layanan pelancaran pipa sektor Gedung Perkantoran untuk area ' . $namaWilayah . '. Mohon info jadwal teknisi terdekat.',
        ],
        [
            'name' => 'Area Pabrik & Industri',
            'badge' => null,
            'icon' => 'ri-factory-line',
            'points' => [
                'Hydro-Jetting 300 Bar industri',
                'Faktur Pajak PPN 11% e-Faktur',
                'Kapasitas debit besar & saluran drainase utama'
            ],
            'message' => 'Halo Admin RooterIN, saya butuh layanan pelancaran pipa sektor Pabrik & Industri untuk area ' . $namaWilayah . '. Mohon info jadwal teknisi terdekat.',
        ],
    ];
@endphp

<section id="sectors" class="py-24 bg-[#0f172a] text-white relative overflow-hidden">
    <!-- Subtle Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#0a1618]/90 via-[#0f172a] to-[#0a1618]/90"></div>

    <div class="container mx-auto px-4 sm:px-6 relative z-10">
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#10b981]/10 border border-[#10b981]/30 text-[#00e599] text-xs font-bold uppercase tracking-widest mb-4">
                <i class="ri-community-line text-base"></i>
                <span>SPESIALISASI LINTAS SEKTOR</span>
            </div>

            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight mb-6 leading-tight">
                Solusi Saluran Pipa Tersumbat untuk <br class="hidden sm:inline" />
                Berbagai Properti di <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#10b981] to-[#00e599] font-black">{{ $namaWilayah }}</span>
            </h2>

            <p class="text-slate-300 text-base sm:text-lg leading-relaxed">
                Penanganan mekanis modern tanpa bongkar untuk hunian residensial, area kuliner, hingga fasilitas komersial skala besar.
            </p>
        </div>

        <!-- 6 Sectors Grid (1 col on mobile, 2 cols on md, 3 cols on lg) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @foreach($sectors as $sector)
                <div class="group relative bg-[#132226]/80 backdrop-blur-md rounded-3xl p-6 sm:p-8 border border-[#10b981]/20 hover:border-[#00e599]/50 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_15px_35px_-10px_rgba(16,185,129,0.25)] flex flex-col justify-between">
                    <div>
                        <!-- Header Icon & Badge -->
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-14 h-14 rounded-2xl bg-[#10b981]/10 border border-[#10b981]/30 flex items-center justify-center text-[#00e599] group-hover:scale-110 group-hover:bg-[#10b981] group-hover:text-slate-950 transition-all duration-300">
                                <i class="{{ $sector['icon'] }} text-2xl"></i>
                            </div>

                            @if($sector['badge'])
                                <span class="px-3 py-1 text-[10px] sm:text-xs font-semibold uppercase tracking-wider rounded-full bg-[#10b981]/20 border border-[#10b981]/40 text-[#00e599]">
                                    {{ $sector['badge'] }}
                                </span>
                            @endif
                        </div>

                        <!-- Title -->
                        <h3 class="text-xl sm:text-2xl font-bold text-white mb-4 group-hover:text-[#00e599] transition-colors">
                            {{ $sector['name'] }}
                        </h3>

                        <!-- Points List -->
                        <ul class="space-y-3 mb-8">
                            @foreach($sector['points'] as $point)
                                <li class="flex items-start gap-3 text-slate-300 text-sm">
                                    <span class="w-5 h-5 rounded-full bg-[#10b981]/20 text-[#00e599] flex items-center justify-center shrink-0 mt-0.5">
                                        <i class="ri-check-line text-xs"></i>
                                    </span>
                                    <span>{{ $point }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- CTA Link Button -->
                    <div class="pt-4 border-t border-slate-800/80">
                        <a href="https://wa.me/{{ $cleanWa }}?text={{ urlencode($sector['message']) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           onclick="trackWhatsAppClick && trackWhatsAppClick('sector_{{ Str::slug($sector['name']) }}')"
                           class="inline-flex items-center gap-2 text-sm font-bold text-[#00e599] hover:text-white transition-colors group/link">
                            <span>Konsultasi Sektor Ini</span>
                            <i class="ri-arrow-right-line text-base group-hover/link:translate-x-1.5 transition-transform"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
