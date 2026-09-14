@props([
    'namaWilayah' => 'Jakarta'
])

@php
    $comparisons = [
        [
            'feature' => 'Metode Pengerjaan',
            'rooterin' => '100% Non-Bongkar (Kabel Spiral Fleksibel Ridgid USA)',
            'traditional' => 'Bongkar ubin keramik / bobok dinding pipa berbiaya mahal',
        ],
        [
            'feature' => 'Penggunaan Bahan Kimia',
            'rooterin' => '0% Kimia Korosif (Aman untuk pipa PVC & lingkungan)',
            'traditional' => 'Soda api korosif yang melunakkan & merusak sambungan PVC',
        ],
        [
            'feature' => 'Jaminan Garansi',
            'rooterin' => 'Garansi Resmi 30 Hari Kalender (Servis ulang GRATIS)',
            'traditional' => 'Tanpa garansi (Mampet berulang ditagih biaya baru)',
        ],
        [
            'feature' => 'Sistem Pembayaran',
            'rooterin' => 'No Result No Pay (Bayar HANYA setelah saluran lancar)',
            'traditional' => 'Tetap bayar uang jalan/kedatangan walau tidak lancar',
        ],
        [
            'feature' => 'Peralatan & Teknologi',
            'rooterin' => 'Mesin Ridgid USA & Hydro Jetting 300 Bar standar industri',
            'traditional' => 'Peralatan bambu / kawat manual seadanya berisiko patah',
        ],
        [
            'feature' => 'Standard Operasional (SOP)',
            'rooterin' => 'Teknisi bersertifikasi, APD K3 lengkap & etika kerja bersih',
            'traditional' => 'Tanpa SOP, area pengerjaan berantakan & bau kotor',
        ],
    ];
@endphp

<section id="comparison" class="py-24 bg-[#0a1618] text-white relative overflow-hidden">
    <!-- Ambient Background Glow -->
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#00e599]/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 sm:px-6 relative z-10">
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#10b981]/10 border border-[#10b981]/30 text-[#00e599] text-xs font-bold uppercase tracking-widest mb-4">
                <i class="ri-scales-3-line text-base"></i>
                <span>KOMPARASI METODE PELANCARAN</span>
            </div>

            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight mb-6 leading-tight">
                Mengapa Memilih RooterIN di <br class="hidden sm:inline" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-300 to-green-400 font-black">{{ $namaWilayah }}</span>?
            </h2>

            <p class="text-slate-300 text-base sm:text-lg leading-relaxed">
                Bandingkan keunggulan solusi mekanis modern RooterIN dibanding metode tradisional atau kimia korosif.
            </p>
        </div>

        <!-- Desktop & Tablet Comparison Table / Cards -->
        <div class="max-w-5xl mx-auto">
            <!-- Table Header -->
            <div class="hidden md:grid grid-cols-12 gap-4 p-6 bg-[#132226] rounded-t-3xl border border-[#10b981]/30 font-bold text-sm uppercase tracking-wider text-slate-300">
                <div class="col-span-4 text-left">Faktor Pembanding</div>
                <div class="col-span-4 text-center text-[#00e599] flex items-center justify-center gap-2">
                    <i class="ri-checkbox-circle-fill text-lg"></i>
                    <span>Solusi RooterIN</span>
                </div>
                <div class="col-span-4 text-center text-slate-400">Tukang Biasa / Soda Api</div>
            </div>

            <!-- Table Rows -->
            <div class="space-y-4 md:space-y-0">
                @foreach($comparisons as $index => $item)
                    <div class="bg-[#132226]/80 backdrop-blur-md rounded-2xl md:rounded-none md:border-b border-[#10b981]/15 p-6 md:p-6 grid grid-cols-1 md:grid-cols-12 gap-4 items-center hover:bg-[#132226] transition-colors {{ $loop->last ? 'md:rounded-b-3xl' : '' }}">
                        <!-- Feature Name -->
                        <div class="md:col-span-4 font-bold text-white text-base md:text-sm flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#00e599]"></span>
                            <span>{{ $item['feature'] }}</span>
                        </div>

                        <!-- RooterIN Feature (Highlight) -->
                        <div class="md:col-span-4 p-4 md:p-3 rounded-xl bg-[#10b981]/10 border border-[#10b981]/30 text-white text-sm font-semibold flex items-start gap-2.5">
                            <i class="ri-check-fill text-[#00e599] text-xl shrink-0 mt-0.5"></i>
                            <span>{{ $item['rooterin'] }}</span>
                        </div>

                        <!-- Traditional Feature -->
                        <div class="md:col-span-4 p-4 md:p-3 rounded-xl bg-slate-900/60 border border-slate-800 text-slate-400 text-sm flex items-start gap-2.5">
                            <i class="ri-close-fill text-rose-400 text-xl shrink-0 mt-0.5"></i>
                            <span>{{ $item['traditional'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Guarantee Callout Footer -->
            <div class="mt-8 p-6 rounded-2xl bg-gradient-to-r from-[#10b981]/20 via-[#132226] to-[#10b981]/20 border border-[#10b981]/40 text-center flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-3 text-left">
                    <div class="w-10 h-10 rounded-full bg-[#10b981]/20 text-[#00e599] flex items-center justify-center shrink-0">
                        <i class="ri-shield-keyhole-line text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white">Investasi Jangka Panjang untuk Properti Anda</h4>
                        <p class="text-xs text-slate-300">Hindari kerusakan pipa PVC & biaya bongkar keramik puluhan juta rupiah.</p>
                    </div>
                </div>

                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', \App\Models\Setting::get('whatsapp_number', '6285609009009')) }}?text={{ urlencode('Halo Admin RooterIN, saya mau pesan jasa pelancaran pipa non-bongkar untuk area ' . $namaWilayah) }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="px-6 py-3 rounded-xl bg-[#10b981] hover:bg-[#00e599] text-slate-950 font-bold text-xs uppercase tracking-wider transition-all shadow-lg shadow-[#10b981]/20 shrink-0">
                    Pesan Teknisi Non-Bongkar
                </a>
            </div>
        </div>
    </div>
</section>
