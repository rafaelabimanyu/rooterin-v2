@props([
    'namaWilayah' => 'Jakarta',
    'whatsappNumber' => null
])

@php
    $waNumber = $whatsappNumber ?? \App\Models\Setting::get('whatsapp_number', '6285609009009');
    $cleanWa = preg_replace('/[^0-9]/', '', $waNumber);
    
    $services = [
        [
            'title' => 'Wastafel & Kitchen Sink',
            'badge' => 'Paling Sering Dipesan',
            'featured' => true,
            'icon' => 'ri-drop-line',
            'description' => 'Pelancaran kerak lemak jenuh dapur tanpa membongkar meja keramik.',
            'price' => 'Mulai dari Rp 400.000-an',
            'cta' => 'Order Wastafel ' . $namaWilayah,
            'message' => 'Halo Admin RooterIN, saya butuh layanan pelancaran Wastafel & Kitchen Sink untuk area ' . $namaWilayah . '. Mohon info jadwal teknisi terdekat.',
        ],
        [
            'title' => 'Kloset WC & Toilet',
            'badge' => 'Respon Cepat 24 Jam',
            'featured' => false,
            'icon' => 'ri-shield-flash-line',
            'description' => 'Penanganan WC meluap / tersumbat pembalut & tisu tanpa sedot tinja.',
            'price' => 'Mulai dari Rp 400.000-an',
            'cta' => 'Order WC ' . $namaWilayah,
            'message' => 'Halo Admin RooterIN, saya butuh layanan pelancaran Kloset WC & Toilet untuk area ' . $namaWilayah . '. Mohon info jadwal teknisi terdekat.',
        ],
        [
            'title' => 'Floor Drain Kamar Mandi',
            'badge' => null,
            'featured' => false,
            'icon' => 'ri-contrast-drop-line',
            'description' => 'Pembersihan rontokan rambut, gumpalan sabun, & endapan pasir ubin.',
            'price' => 'Mulai dari Rp 400.000-an',
            'cta' => 'Order Kamar Mandi',
            'message' => 'Halo Admin RooterIN, saya butuh layanan pelancaran Floor Drain Kamar Mandi untuk area ' . $namaWilayah . '. Mohon info jadwal teknisi terdekat.',
        ],
        [
            'title' => 'Pipa Utama, Got & Talang',
            'badge' => null,
            'featured' => false,
            'icon' => 'ri-tools-line',
            'description' => 'Pembersihan pipa pembuangan utama, saluran got luar, serta talang air atap dari endapan lumpur, pasir, sampah, dan daun kering tanpa bongkar saluran.',
            'price' => 'Mulai dari Rp 400.000-an',
            'cta' => 'Order Pipa Utama & Talang',
            'message' => 'Halo Admin RooterIN, saya butuh layanan pelancaran Pipa Utama, Got & Talang untuk area ' . $namaWilayah . '. Mohon info jadwal teknisi terdekat.',
        ],
    ];
@endphp

<!-- Deep Midnight Navy Background (#0b1220) -->
<section id="pricing" class="py-24 bg-[#0b1220] text-white relative overflow-hidden">
    <!-- Ambient Blur Background -->
    <div class="absolute top-1/4 -left-20 w-96 h-96 bg-[#10b981]/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-[#00e599]/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 sm:px-6 relative z-10">
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#10b981]/10 border border-[#10b981]/30 text-[#00e599] text-xs font-bold uppercase tracking-widest mb-4">
                <i class="ri-price-tag-3-line text-base animate-pulse"></i>
                <span>ESTIMASI BIAYA TRANSPARAN</span>
            </div>
            
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight mb-6 leading-tight">
                Daftar Biaya & Estimasi Layanan <br class="hidden sm:inline" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-300 to-green-400 font-black">
                    {{ $namaWilayah }}
                </span>
            </h2>
            
            <p class="text-slate-300 text-base sm:text-lg leading-relaxed">
                Estimasi biaya pelancaran pipa tersumbat di {{ $namaWilayah }}. Tanpa biaya tersembunyi, sistem <strong class="text-[#00e599]">No Result No Pay</strong> (Tuntas Baru Bayar).
            </p>
        </div>

        <!-- 4 Pricing Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 items-stretch">
            @foreach($services as $service)
                <div class="group relative rounded-3xl p-6 sm:p-8 flex flex-col justify-between transition-all duration-500 hover:-translate-y-2.5 
                            {{ $service['featured'] 
                                ? 'bg-[#13282c] border-2 border-[#00e599] shadow-[0_0_35px_rgba(0,229,153,0.25)] scale-102 z-10' 
                                : 'bg-white/[0.03] backdrop-blur-md border border-[#10b981]/20 hover:border-[#00e599]/60 hover:shadow-[0_20px_40px_-15px_rgba(16,185,129,0.3)]' }}">
                    
                    @if($service['featured'])
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-gradient-to-r from-[#10b981] to-[#00e599] text-slate-950 font-black text-[11px] uppercase tracking-wider shadow-md">
                            ★ {{ $service['badge'] }}
                        </div>
                    @endif

                    <div>
                        <!-- Card Top Icon & Badge -->
                        <div class="h-8 mb-4 flex items-center justify-between">
                            @if(!$service['featured'] && $service['badge'])
                                <span class="inline-block px-3 py-1 text-[11px] font-semibold tracking-wide uppercase rounded-full border bg-amber-500/20 text-amber-300 border-amber-500/40">
                                    {{ $service['badge'] }}
                                </span>
                            @else
                                <span></span>
                            @endif
                            
                            <div class="w-10 h-10 rounded-2xl {{ $service['featured'] ? 'bg-[#00e599] text-slate-950 font-bold' : 'bg-[#10b981]/10 border border-[#10b981]/20 text-[#00e599]' }} flex items-center justify-center group-hover:scale-110 transition-all duration-300">
                                <i class="{{ $service['icon'] }} text-xl"></i>
                            </div>
                        </div>

                        <!-- Card Title -->
                        <h3 class="text-xl sm:text-2xl font-bold text-white mb-3 group-hover:text-[#00e599] transition-colors">
                            {{ $service['title'] }}
                        </h3>

                        <!-- Card Description -->
                        <p class="text-slate-300 text-sm leading-relaxed mb-6">
                            {{ $service['description'] }}
                        </p>
                    </div>

                    <div>
                        <!-- Price Tag -->
                        <div class="pt-4 border-t border-slate-800/80 mb-6">
                            <span class="text-xs text-slate-400 font-medium block uppercase tracking-wider mb-1">Estimasi Tarif</span>
                            <span class="text-xl sm:text-2xl font-extrabold text-[#00e599]">
                                {{ $service['price'] }}
                            </span>
                        </div>

                        <!-- CTA Button -->
                        <a href="https://wa.me/{{ $cleanWa }}?text={{ urlencode($service['message']) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           onclick="trackWhatsAppClick && trackWhatsAppClick('pricing_{{ Str::slug($service['title']) }}')"
                           class="w-full inline-flex items-center justify-center gap-2 px-5 py-3.5 rounded-2xl text-slate-950 font-bold text-sm transition-all duration-300 group/btn
                                  {{ $service['featured'] ? 'bg-[#00e599] hover:bg-white shadow-lg shadow-[#00e599]/30' : 'bg-[#10b981] hover:bg-[#00e599] shadow-lg shadow-[#10b981]/20' }}">
                            <i class="ri-whatsapp-line text-lg"></i>
                            <span>{{ $service['cta'] }}</span>
                            <i class="ri-arrow-right-line text-base group-hover/btn:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Guarantee Note Footer -->
        <div class="mt-12 p-6 rounded-2xl bg-[#132226]/50 border border-[#10b981]/15 text-center max-w-2xl mx-auto flex flex-col sm:flex-row items-center justify-center gap-4">
            <div class="w-12 h-12 rounded-full bg-[#10b981]/20 border border-[#10b981]/30 flex items-center justify-center text-[#00e599] shrink-0">
                <i class="ri-shield-check-line text-2xl"></i>
            </div>
            <p class="text-slate-300 text-xs sm:text-sm text-center sm:text-left">
                <strong class="text-white">Jaminan Penuh Garansi 30 Hari:</strong> Biaya transparan disepakati di awal sebelum pengerjaan. Jika masalah mampet tidak teratasi, Anda <span class="text-[#00e599] font-bold">TIDAK PERLU BAYAR</span> (Sistem No Result No Pay).
            </p>
        </div>
    </div>
</section>
