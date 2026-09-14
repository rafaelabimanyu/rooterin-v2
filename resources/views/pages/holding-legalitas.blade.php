<x-app-layout>
    {{-- Hero Section --}}
    <section class="relative pt-36 sm:pt-48 pb-32 overflow-hidden bg-slate-900 min-h-[60vh] flex items-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/pages/hero1.webp') }}" class="w-full h-full object-cover opacity-20 grayscale brightness-50" alt="J&J Group Holding Legalitas">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900 to-stone-50"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center lg:text-left">
            <div class="max-w-3xl">
                <div class="inline-flex items-center px-4 py-2 rounded-full border border-primary/30 bg-primary/10 text-primary font-bold text-xs uppercase tracking-[0.2em] mb-6">
                    <i class="ri-shield-user-fill mr-2"></i> Official Holding & Compliance
                </div>
                
                <h1 class="text-4xl sm:text-6xl font-heading font-black text-white leading-tight mb-8">
                    Profil Holding J&J Group & <br><span class="text-primary italic">Legalitas K3 Resmi</span>
                </h1>
                
                <p class="text-slate-300 text-lg sm:text-xl leading-relaxed font-medium mb-10">
                    RooterIN beroperasi secara legal di bawah naungan resmi <strong>J&J Group Holding</strong>. Kami berkomitmen menjunjung tinggi kepatuhan hukum, standar K3 (Keselamatan dan Kesehatan Kerja), dan sterilisasi sanitasi modern.
                </p>
            </div>
        </div>
    </section>

    {{-- Legalitas & Corporate Compliance Section --}}
    <section class="py-24 bg-stone-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-black text-primary uppercase tracking-[0.3em] mb-3 inline-block">Official Documents</span>
                <h2 class="text-3xl sm:text-5xl font-heading font-black text-slate-900 leading-tight">Legalitas & Izin Operasional Badan Usaha</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Legal Card 1 -->
                <div class="p-8 bg-white rounded-3xl border border-slate-100 shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center text-primary text-2xl mb-6">
                        <i class="ri-file-text-line"></i>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3">NIB (Nomor Induk Berusaha)</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-4">Terdaftar resmi pada Online Single Submission (OSS) Kementerian Investasi/BKPM RI.</p>
                    <span class="inline-flex items-center px-3 py-1 bg-green-50 text-green-700 font-bold text-[10px] uppercase rounded-full tracking-widest border border-green-200">
                        <i class="ri-checkbox-circle-fill mr-1"></i> Verified Active
                    </span>
                </div>

                <!-- Legal Card 2 -->
                <div class="p-8 bg-white rounded-3xl border border-slate-100 shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="w-14 h-14 bg-accent/10 rounded-2xl flex items-center justify-center text-accent text-2xl mb-6">
                        <i class="ri-government-line"></i>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3">SK Kemenkumham</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-4">Pengesahan Akta Pendirian Badan Usaha resmi dari Menteri Hukum & HAM Republik Indonesia.</p>
                    <span class="inline-flex items-center px-3 py-1 bg-green-50 text-green-700 font-bold text-[10px] uppercase rounded-full tracking-widest border border-green-200">
                        <i class="ri-checkbox-circle-fill mr-1"></i> AHU Approved
                    </span>
                </div>

                <!-- Legal Card 3 -->
                <div class="p-8 bg-white rounded-3xl border border-slate-100 shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="w-14 h-14 bg-secondary/10 rounded-2xl flex items-center justify-center text-secondary text-2xl mb-6">
                        <i class="ri-bank-card-line"></i>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3">NPWP Wajib Pajak</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-4">Wajib Pajak Badan Usaha taat pajak dan siap menerbitkan Faktur Pajak e-Faktur untuk transaksi B2B.</p>
                    <span class="inline-flex items-center px-3 py-1 bg-green-50 text-green-700 font-bold text-[10px] uppercase rounded-full tracking-widest border border-green-200">
                        <i class="ri-checkbox-circle-fill mr-1"></i> Tax Compliant
                    </span>
                </div>

                <!-- Legal Card 4 -->
                <div class="p-8 bg-white rounded-3xl border border-slate-100 shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center text-primary text-2xl mb-6">
                        <i class="ri-award-line"></i>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3">Sertifikasi K3 Plumbing</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-4">Teknisi dibekali sertifikasi pelatihan keselamatan kerja dan penanganan limbah domestik aman.</p>
                    <span class="inline-flex items-center px-3 py-1 bg-green-50 text-green-700 font-bold text-[10px] uppercase rounded-full tracking-widest border border-green-200">
                        <i class="ri-checkbox-circle-fill mr-1"></i> Certified Team
                    </span>
                </div>
            </div>
        </div>
    </section>

    {{-- K3 & Sanitasi Protocol Section --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="text-xs font-black text-primary uppercase tracking-[0.3em] mb-3 inline-block">HSE & Health Protocol</span>
                    <h2 class="text-3xl sm:text-5xl font-heading font-black text-slate-900 mb-8 leading-tight">Standar K3 & Protokol APD Sterilisasi Sanitasi</h2>
                    <p class="text-slate-600 text-lg leading-relaxed mb-8">
                        Setiap pengerjaan pelancaran pipa mampet di properti Anda wajib mematuhi standar higienitas ketat untuk menjaga keamanan penghuni, teknisi, dan lingkungan.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-primary/10 text-primary font-black flex items-center justify-center shrink-0">1</div>
                            <div>
                                <h4 class="font-black text-slate-900 text-lg">APD Lengkap (Safety Gear)</h4>
                                <p class="text-slate-500 text-sm">Teknisi wajib mengenakan sepatu boots anti-slip, sarung tangan karet tebal, dan kacamata pelindung.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-primary/10 text-primary font-black flex items-center justify-center shrink-0">2</div>
                            <div>
                                <h4 class="font-black text-slate-900 text-lg">Bio-Sterilisasi Peralatan Mesin</h4>
                                <p class="text-slate-500 text-sm">Peralatan mekanis Ridgid & kawat kabel spiral didisinfeksi dengan cairan antiseptik ramah lingkungan sebelum dan sesudah pengerjaan.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-primary/10 text-primary font-black flex items-center justify-center shrink-0">3</div>
                            <div>
                                <h4 class="font-black text-slate-900 text-lg">Zero Chemical Hazard</h4>
                                <p class="text-slate-500 text-sm">Metode pelancaran 100% menggunakan teknologi mekanis spiral/hydro-jetting tanpa bahan kimia berbahaya yang merusak struktur pipa PVC.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="relative rounded-[3rem] overflow-hidden shadow-2xl border-8 border-slate-100">
                        <img src="{{ asset('images/pages/home/solution_main.webp') }}" loading="lazy" decoding="async" class="w-full h-full object-cover" alt="Teknisi APD K3 RooterIN">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-20 bg-slate-900 text-white text-center">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl sm:text-4xl font-heading font-black mb-6">Butuh Dokumen Legalitas untuk Pengadaan Proyek?</h2>
            <p class="text-slate-400 text-lg mb-10">Tim legal & administrasi RooterIN siap mengirimkan profil perusahaan lengkap beserta penawaran harga resmi.</p>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', \App\Models\Setting::get('whatsapp_number', '6285609009009')) }}?text=Halo%20Admin%20RooterIN%2C%20minta%20dokumen%20profil%20legalitas%20perusahaan%20dong" class="px-10 py-5 bg-primary text-white font-black rounded-full text-lg hover:bg-[#e65a00] hover:scale-105 transition-all shadow-2xl inline-block">
                Minta Profil Perusahaan & Legalitas
            </a>
        </div>
    </section>
</x-app-layout>
