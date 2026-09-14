@props([
    'namaWilayah' => 'Jakarta'
])

@php
    $steps = [
        [
            'number' => '01',
            'title' => 'Hubungi CS & Konsultasi',
            'subtitle' => 'Fast Response 24/7',
            'icon' => 'ri-whatsapp-line',
            'desc' => 'Konsultasikan masalah saluran mampet Anda via WhatsApp. Tim CS siap melayani 24 jam nonstop tanpa antre.',
        ],
        [
            'number' => '02',
            'title' => 'Teknisi Meluncur ke Lokasi',
            'subtitle' => 'Estimasi 15-30 Menit',
            'icon' => 'ri-truck-line',
            'desc' => 'Armada posko terdekat di wilayah ' . $namaWilayah . ' meluncur ke lokasi pengerjaan lengkap dengan peralatan SOP K3.',
        ],
        [
            'number' => '03',
            'title' => 'Pengerjaan Non-Bongkar',
            'subtitle' => 'Ridgid Spiral & Hydro Jetting',
            'icon' => 'ri-tools-line',
            'desc' => 'Pembersihan kerak lemak jenuh & sampah dilakukan secara mekanis tanpa membongkar meja dapur atau keramik ubin.',
        ],
        [
            'number' => '04',
            'title' => 'Test Aliran & Garansi 30 Hari',
            'subtitle' => 'No Result No Pay',
            'icon' => 'ri-checkbox-circle-line',
            'desc' => 'Pengujian debit air bersama Anda. Bayar hanya saat saluran 100% lancar, lengkap dengan nota garansi resmi 30 hari.',
        ],
    ];
@endphp

<section id="workflow" class="py-24 bg-[#08181c] text-white relative overflow-hidden border-t border-b border-[#10b981]/15">
    <!-- Ambient Background Glow -->
    <div class="absolute top-1/2 left-0 w-96 h-96 bg-[#10b981]/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 sm:px-6 relative z-10">
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#10b981]/10 border border-[#10b981]/30 text-[#00e599] text-xs font-bold uppercase tracking-widest mb-4">
                <i class="ri-route-line text-base"></i>
                <span>SOP ALUR KERJA PRAKTIS</span>
            </div>

            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight mb-6 leading-tight">
                Cara Kerja Praktis RooterIN di <br class="hidden sm:inline" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-300 to-green-400 font-black">{{ $namaWilayah }}</span>
            </h2>

            <p class="text-slate-300 text-base sm:text-lg leading-relaxed">
                4 langkah mudah mendapatkan solusi pelancaran saluran mampet profesional, cepat, dan bergaransi resmi.
            </p>
        </div>

        <!-- 4 Steps Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 relative">
            @foreach($steps as $index => $step)
                <div class="relative bg-[#132226]/80 backdrop-blur-md rounded-3xl p-6 sm:p-8 border border-[#10b981]/20 hover:border-[#00e599]/60 transition-all duration-500 hover:-translate-y-2 group flex flex-col justify-between">
                    <div>
                        <!-- Step Number Badge & Icon -->
                        <div class="flex items-center justify-between mb-6">
                            <span class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-[#10b981] to-[#00e599]">
                                {{ $step['number'] }}
                            </span>
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-400 to-cyan-400 text-slate-950 flex items-center justify-center font-bold shadow-lg shadow-emerald-500/20 group-hover:scale-110 transition-transform">
                                <i class="{{ $step['icon'] }} text-xl"></i>
                            </div>
                        </div>

                        <h3 class="text-xl font-bold text-white mb-1 group-hover:text-[#00e599] transition-colors">
                            {{ $step['title'] }}
                        </h3>

                        <span class="inline-block text-xs font-semibold text-[#00e599] uppercase tracking-wider mb-4">
                            {{ $step['subtitle'] }}
                        </span>

                        <p class="text-slate-300 text-sm leading-relaxed">
                            {{ $step['desc'] }}
                        </p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-800/80 flex items-center gap-2 text-xs text-slate-400">
                        <i class="ri-check-double-line text-[#00e599]"></i>
                        <span>Langkah {{ $index + 1 }} dari 4</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
