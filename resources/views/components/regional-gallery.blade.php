@props([
    'namaWilayah' => 'Jakarta',
    'citySlug' => 'jakarta-selatan'
])

@php
    // Clean city slug prefix for area photos
    $slugClean = Str::slug($citySlug);
    if (!Str::contains($slugClean, ['jakarta-selatan', 'jakarta-barat', 'jakarta-pusat', 'jakarta-timur', 'jakarta-utara'])) {
        $slugClean = 'jakarta-selatan';
    }

    // Regional area photos
    $areaPhotos = [
        [
            'img' => asset('assets/wilayah/jakarta/rooterin-area-layanan-saluran-mampet-' . $slugClean . '-01.webp'),
            'title' => 'Posko Cepat ' . $namaWilayah . ' - Unit 01',
            'desc' => 'Armada siaga teknisi pelancar pipa mampet area ' . $namaWilayah,
            'tag' => 'Posko Siaga'
        ],
        [
            'img' => asset('assets/wilayah/jakarta/rooterin-area-layanan-saluran-mampet-' . $slugClean . '-02.webp'),
            'title' => 'Peralatan Ridgid USA ' . $namaWilayah,
            'desc' => 'Mesin spiral kabel baja fleksibel standar pembersihan tanpa bobok',
            'tag' => 'Peralatan Modern'
        ],
        [
            'img' => asset('assets/wilayah/jakarta/rooterin-area-layanan-saluran-mampet-' . $slugClean . '-03.webp'),
            'title' => 'Teknisi Handal ' . $namaWilayah,
            'desc' => 'Tim spesialis plumbing tersertifikasi & berpengalaman di ' . $namaWilayah,
            'tag' => 'Tim Profesional'
        ],
    ];

    // Field job documentation photos
    $jobDocs = [
        [
            'img' => asset('assets/dokumentasipekerjaan/rooterin-inspeksi-kamera-saluran-mampet-pertamina-sunter.webp'),
            'title' => 'Inspeksi Kamera Pipa Gedung',
            'desc' => 'Deteksi titik sumbatan pipa kloset & drainase fasilitas Pertamina Sunter',
            'location' => 'Jakarta Utara',
            'tag' => 'Inspeksi Kamera'
        ],
        [
            'img' => asset('assets/dokumentasipekerjaan/rooterin-saluran-mampet-resto-haka-dimsum-tebet-jaksel.webp'),
            'title' => 'Pelancaran Pipa Resto Haka Dimsum',
            'desc' => 'Pembersihan kerak lemak jenuh dapur resto tanpa mengganggu operasional',
            'location' => 'Tebet, Jakarta Selatan',
            'tag' => 'F&B Restoran'
        ],
        [
            'img' => asset('assets/dokumentasipekerjaan/rooterin-saluran-mampet-grease-trap-lemak-restoran.webp'),
            'title' => 'Pembersihan Grease Trap Lemak',
            'desc' => 'Hydro-jetting pengikis endapan lemak membatu di saluran pembuangan utama',
            'location' => 'Komersial Jakarta',
            'tag' => 'Hydro Jetting'
        ],
        [
            'img' => asset('assets/dokumentasipekerjaan/rooterin-jasa-saluran-mampet-restoran-almaz-fried-chicken.webp'),
            'title' => 'Saluran Dapur Restoran Almaz',
            'desc' => 'Pelancaran pipa wastafel cuci piring & got buangan minyak dapur',
            'location' => 'Area Jabodetabek',
            'tag' => 'Commercial F&B'
        ],
        [
            'img' => asset('assets/dokumentasipekerjaan/rooterin-saluran-mampet-floor-drain-kamar-mandi-01.webp'),
            'title' => 'Floor Drain Kamar Mandi Rumah',
            'desc' => 'Pembersihan gumpalan rambut & sisa sabun yang menyumbat pipa keramik',
            'location' => 'Residensial ' . $namaWilayah,
            'tag' => 'Rumah Tinggal'
        ],
        [
            'img' => asset('assets/dokumentasipekerjaan/rooterin-saluran-mampet-kloset-toilet-rumah-warga.webp'),
            'title' => 'Pelancaran WC & Kloset Tersumbat',
            'desc' => 'Penanganan kloset meluap tanpa sedot tinja, tuntas dengan kabel spiral',
            'location' => $namaWilayah,
            'tag' => 'Kloset Toilet'
        ],
    ];
@endphp

<section id="gallery" class="py-24 bg-[#0f172a] text-white relative overflow-hidden">
    <!-- Glow Details -->
    <div class="absolute top-0 right-0 w-80 h-80 bg-[#10b981]/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 sm:px-6 relative z-10">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#10b981]/10 border border-[#10b981]/30 text-[#00e599] text-xs font-bold uppercase tracking-widest mb-4">
                <i class="ri-gallery-line text-base"></i>
                <span>DOKUMENTASI LAPANGAN & REKAM JEJAK</span>
            </div>

            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight mb-6 leading-tight">
                Galeri Wilayah & Bukti Pengerjaan <br class="hidden sm:inline" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#10b981] to-[#00e599] font-black">{{ $namaWilayah }}</span>
            </h2>

            <p class="text-slate-300 text-base sm:text-lg leading-relaxed">
                Lihat hasil nyata pengerjaan teknisi RooterIN di berbagai titik properti dan area layanan {{ $namaWilayah }}.
            </p>
        </div>

        <!-- 1. FOTO WILAYAH AREA LAYANAN (3 Highlights) -->
        <div class="mb-16">
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-3">
                    <span class="w-3 h-8 bg-[#00e599] rounded-full"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white">Armada & Operasional Area {{ $namaWilayah }}</h3>
                </div>
                <span class="text-xs font-semibold text-[#00e599] bg-[#10b981]/10 px-3 py-1 rounded-full border border-[#10b981]/30">
                    Posko {{ $namaWilayah }}
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                @foreach($areaPhotos as $area)
                    <div class="group relative rounded-3xl overflow-hidden bg-[#132226] border border-[#10b981]/20 hover:border-[#00e599]/60 transition-all duration-500 shadow-xl">
                        <div class="aspect-[4/3] overflow-hidden relative">
                            <img src="{{ $area['img'] }}" 
                                 alt="{{ $area['title'] }}" 
                                 width="800"
                                 height="600"
                                 loading="lazy"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 brightness-90 group-hover:brightness-100" />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0a1618] via-transparent to-transparent opacity-80 group-hover:opacity-60 transition-opacity"></div>
                            
                            <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-[#0a1618]/80 backdrop-blur-md border border-[#10b981]/40 text-[#00e599] text-[11px] font-bold tracking-wider uppercase">
                                {{ $area['tag'] }}
                            </span>
                        </div>
                        <div class="p-6 relative">
                            <h4 class="text-lg font-bold text-white mb-2 group-hover:text-[#00e599] transition-colors">
                                {{ $area['title'] }}
                            </h4>
                            <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
                                {{ $area['desc'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 2. HASIL KERJA DOKUMENTASI PEKERJAAN LAPANGAN -->
        <div>
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-3">
                    <span class="w-3 h-8 bg-[#10b981] rounded-full"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white">Dokumentasi Hasil Kerja Lapangan</h3>
                </div>
                <span class="text-xs font-semibold text-slate-400">
                    Real Field Work
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach($jobDocs as $doc)
                    <div class="group relative rounded-3xl overflow-hidden bg-[#132226]/90 backdrop-blur-md border border-[#10b981]/20 hover:border-[#00e599]/60 transition-all duration-500 hover:-translate-y-1.5 shadow-xl flex flex-col justify-between">
                        <div>
                            <div class="aspect-[16/10] overflow-hidden relative">
                                <img src="{{ $doc['img'] }}" 
                                     alt="{{ $doc['title'] }}" 
                                     width="800"
                                     height="500"
                                     loading="lazy"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                                <div class="absolute inset-0 bg-gradient-to-t from-[#132226] via-transparent to-transparent opacity-90"></div>
                                
                                <div class="absolute top-4 left-4 right-4 flex items-center justify-between">
                                    <span class="px-3 py-1 rounded-full bg-[#0a1618]/90 backdrop-blur-md border border-[#10b981]/40 text-[#00e599] text-[10px] font-extrabold uppercase tracking-wider">
                                        {{ $doc['tag'] }}
                                    </span>
                                    <span class="px-2.5 py-0.5 rounded-md bg-slate-900/80 text-slate-300 text-[10px] font-medium flex items-center gap-1">
                                        <i class="ri-map-pin-line text-[#00e599]"></i>
                                        {{ $doc['location'] }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-6">
                                <h4 class="text-lg font-bold text-white mb-2 group-hover:text-[#00e599] transition-colors">
                                    {{ $doc['title'] }}
                                </h4>
                                <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
                                    {{ $doc['desc'] }}
                                </p>
                            </div>
                        </div>

                        <div class="px-6 pb-6 pt-2 flex items-center justify-between border-t border-slate-800/60 text-xs text-slate-400">
                            <span class="flex items-center gap-1.5 text-[#00e599] font-semibold">
                                <i class="ri-checkbox-circle-line"></i>
                                <span>Garansi Tuntas 30 Hari</span>
                            </span>
                            <span class="font-bold text-slate-300">Non-Bongkar</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
