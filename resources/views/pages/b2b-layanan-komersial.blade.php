<x-app-layout>
    {{-- Hero Section --}}
    <section class="relative pt-36 sm:pt-48 pb-32 overflow-hidden bg-slate-900 min-h-[60vh] flex items-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/pages/hero1.webp') }}" class="w-full h-full object-cover opacity-20 grayscale brightness-50" alt="B2B Commercial Plumbing RooterIN">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900 to-stone-50"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center lg:text-left">
            <div class="max-w-3xl">
                <div class="inline-flex items-center px-4 py-2 rounded-full border border-primary/30 bg-primary/10 text-primary font-bold text-xs uppercase tracking-[0.2em] mb-6">
                    <i class="ri-building-2-fill mr-2"></i> Corporate & Industrial Division
                </div>
                
                <h1 class="text-4xl sm:text-6xl font-heading font-black text-white leading-tight mb-8">
                    Solusi Pipa Komersial & <br><span class="text-primary italic">Layanan B2B Industri</span>
                </h1>
                
                <p class="text-slate-300 text-lg sm:text-xl leading-relaxed font-medium mb-10">
                    Mitra terpercaya untuk restoran, hotel, gedung perkantoran, mall, dan fasilitas industri. Penanganan pipa mampet kapasitas besar dengan <strong>Hydro Jetting</strong>, Kontrak Perawatan Berkala, & Invoice Faktur Pajak Resmi.
                </p>

                <div class="flex flex-col sm:flex-row items-center gap-6 justify-center lg:justify-start">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', \App\Models\Setting::get('whatsapp_number', '6285609009009')) }}?text=Halo%20Team%20B2B%20RooterIN%2C%20mau%20konsultasi%20project%20komersial%20dong" class="w-full sm:w-auto px-10 py-5 bg-primary text-white font-black rounded-full text-lg hover:bg-[#e65a00] hover:scale-105 transition-all shadow-2xl text-center">
                        Konsultasi Proyek B2B
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Klien Sektor Komersial & Industri --}}
    <section class="py-24 bg-stone-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-black text-primary uppercase tracking-[0.3em] mb-3 inline-block">Industries We Serve</span>
                <h2 class="text-3xl sm:text-5xl font-heading font-black text-slate-900 leading-tight">Solusi Pipa Terintegrasi untuk Berbagai Sektor</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Industry 1 -->
                <div class="p-8 bg-white rounded-3xl border border-slate-100 shadow-xl">
                    <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center text-primary text-2xl mb-6">
                        <i class="ri-restaurant-2-line"></i>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3">Restoran & Kitchen Cafe</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Pembersihan lemak jenuh (grease trap) & pipa buangan dapur komersial bebas mampet tanpa mengganggu operasional usaha.</p>
                </div>

                <!-- Industry 2 -->
                <div class="p-8 bg-white rounded-3xl border border-slate-100 shadow-xl">
                    <div class="w-14 h-14 bg-accent/10 rounded-2xl flex items-center justify-center text-accent text-2xl mb-6">
                        <i class="ri-hotel-line"></i>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3">Hotel & Hospitality</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Perawatan drainase kamar mandi, shaft vertical, dan jaringan pipa air kotor hotel dengan standar higienis tinggi.</p>
                </div>

                <!-- Industry 3 -->
                <div class="p-8 bg-white rounded-3xl border border-slate-100 shadow-xl">
                    <div class="w-14 h-14 bg-secondary/10 rounded-2xl flex items-center justify-center text-secondary text-2xl mb-6">
                        <i class="ri-building-line"></i>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3">Gedung Perkantoran & Mall</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Pelancaran toilet urinal, risers pipa toilet umum, dan jaringan drainase utama gedung bertingkat.</p>
                </div>

                <!-- Industry 4 -->
                <div class="p-8 bg-white rounded-3xl border border-slate-100 shadow-xl">
                    <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center text-primary text-2xl mb-6">
                        <i class="ri-community-line"></i>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3">Apartemen & Real Estate</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Penanganan pembersihan pipa saluran bersama antar lantai apartemen tanpa membongkar keramik/dinding tenant.</p>
                </div>

                <!-- Industry 5 -->
                <div class="p-8 bg-white rounded-3xl border border-slate-100 shadow-xl">
                    <div class="w-14 h-14 bg-accent/10 rounded-2xl flex items-center justify-center text-accent text-2xl mb-6">
                        <i class="ri-factory-line"></i>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3">Pabrik & Kawasan Industri</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Penanganan limbah cair non-B3, pengurasan pipa saluran pabrik diameter besar menggunakan armada Hydro Jetting bertekanan tinggi.</p>
                </div>

                <!-- Industry 6 -->
                <div class="p-8 bg-white rounded-3xl border border-slate-100 shadow-xl">
                    <div class="w-14 h-14 bg-secondary/10 rounded-2xl flex items-center justify-center text-secondary text-2xl mb-6">
                        <i class="ri-hospital-line"></i>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3">Klinik & Fasilitas Kesehatan</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Sterilisasi dan pelancaran pipa buangan dengan protokol sanitasi aman dan cepat.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Fitur Layanan B2B Unggulan --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="text-xs font-black text-primary uppercase tracking-[0.3em] mb-3 inline-block">High Technology Equipment</span>
                    <h2 class="text-3xl sm:text-5xl font-heading font-black text-slate-900 mb-8 leading-tight">Teknologi Hydro Jetting & Kamera Inspeksi CCTV Pipa</h2>
                    <p class="text-slate-600 text-lg leading-relaxed mb-8">
                        Untuk skala industri dan gedung besar, kami menggunakan unit armada Hydro Jetting yang mampu menyemprotkan air bertekanan hingga 300 Bar untuk merontokkan kerak lemak dan endapan semen secara tuntas.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <i class="ri-checkbox-circle-fill text-primary text-2xl shrink-0 mt-1"></i>
                            <div>
                                <h4 class="font-black text-slate-900 text-lg">Rigid Drain Inspection Camera</h4>
                                <p class="text-slate-500 text-sm">Mendeteksi titik letak lokasi penyumbatan dan kebocoran pipa di dalam dinding/lantai secara akurat dalam format video.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <i class="ri-checkbox-circle-fill text-primary text-2xl shrink-0 mt-1"></i>
                            <div>
                                <h4 class="font-black text-slate-900 text-lg">Kontrak Perawatan Berkala (Preventive Maintenance)</h4>
                                <p class="text-slate-500 text-sm">Layanan pembersihan berkala (bulanan/triwulan) agar operasional tempat usaha Anda terhindar dari risiko pipa mampet mendadak.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <i class="ri-checkbox-circle-fill text-primary text-2xl shrink-0 mt-1"></i>
                            <div>
                                <h4 class="font-black text-slate-900 text-lg">Faktur Pajak & Syarat Pembayaran TOP Flexible</h4>
                                <p class="text-slate-500 text-sm">Dukungan kelengkapan dokumen keuangan perusahaan: e-Faktur, NPWP Badan, PO (Purchase Order), dan skema pembayaran TOP (Term of Payment).</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="relative rounded-[3rem] overflow-hidden shadow-2xl border-8 border-slate-100">
                        <img src="{{ asset('images/pages/hero1.webp') }}" loading="lazy" decoding="async" class="w-full h-full object-cover" alt="B2B Commercial Pipe Cleaning">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-20 bg-slate-900 text-white text-center">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl sm:text-4xl font-heading font-black mb-6">Ajukan Proposal & Survey Proyek B2B Gratis</h2>
            <p class="text-slate-400 text-lg mb-10">Tim engineer kami siap melakukan survey lokasi dan menyusun estimasi anggaran biaya resmi untuk perusahaan Anda.</p>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', \App\Models\Setting::get('whatsapp_number', '6285609009009')) }}?text=Halo%20Team%20B2B%20RooterIN%2C%20saya%20mau%20request%20survey%20lokasi%20proyek%20komersial" class="px-10 py-5 bg-primary text-white font-black rounded-full text-lg hover:bg-[#e65a00] hover:scale-105 transition-all shadow-2xl inline-block">
                <i class="ri-whatsapp-line mr-2"></i> Hubungi Divisi B2B RooterIN
            </a>
        </div>
    </section>
</x-app-layout>
