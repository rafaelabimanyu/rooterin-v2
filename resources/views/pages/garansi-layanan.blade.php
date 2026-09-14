<x-app-layout>
    {{-- Hero Section --}}
    <section class="relative pt-36 sm:pt-48 pb-32 overflow-hidden bg-slate-900 min-h-[60vh] flex items-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/pages/hero1.webp') }}" class="w-full h-full object-cover opacity-20 grayscale brightness-50" alt="Garansi 30 Hari RooterIN">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900 to-stone-50"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center lg:text-left">
            <div class="max-w-3xl">
                <div class="inline-flex items-center px-4 py-2 rounded-full border border-primary/30 bg-primary/10 text-primary font-bold text-xs uppercase tracking-[0.2em] mb-6">
                    <i class="ri-shield-check-fill mr-2"></i> 100% Risk Free Guarantee
                </div>
                
                <h1 class="text-4xl sm:text-6xl font-heading font-black text-white leading-tight mb-8">
                    Ketentuan & SOP Klaim <br><span class="text-primary italic">Garansi 30 Hari Resmi</span>
                </h1>
                
                <p class="text-slate-300 text-lg sm:text-xl leading-relaxed font-medium mb-10">
                    Pipa tersumbat lagi dalam 30 hari setelah penanganan? Kami perbaiki <strong>GRATIS 100%</strong> tanpa biaya tambahan apapun. Komitmen garansi nyata dari RooterIN!
                </p>
            </div>
        </div>
    </section>

    {{-- Prosedur Klaim Garansi Timeline --}}
    <section class="py-24 bg-stone-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-black text-primary uppercase tracking-[0.3em] mb-3 inline-block">SOP Klaim Garansi</span>
                <h2 class="text-3xl sm:text-5xl font-heading font-black text-slate-900 leading-tight">Alur Klaim Garansi Fast-Response 1x24 Jam</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 relative">
                <!-- Step 1 -->
                <div class="p-8 bg-white rounded-3xl border border-slate-100 shadow-xl">
                    <div class="w-12 h-12 bg-primary text-white font-black rounded-2xl flex items-center justify-center text-xl mb-6 shadow-lg shadow-primary/30">
                        1
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3">Hubungi WhatsApp Hotline</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Kirim pesan WhatsApp ke nomor hotline garansi resmi dengan menyebutkan kendala yang berulang.</p>
                </div>

                <!-- Step 2 -->
                <div class="p-8 bg-white rounded-3xl border border-slate-100 shadow-xl">
                    <div class="w-12 h-12 bg-primary text-white font-black rounded-2xl flex items-center justify-center text-xl mb-6 shadow-lg shadow-primary/30">
                        2
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3">Verifikasi Kuitansi / Alamat</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Tim customer service memverifikasi data tanggal pengerjaan sebelumnya berdasarkan kuitansi/nota digital.</p>
                </div>

                <!-- Step 3 -->
                <div class="p-8 bg-white rounded-3xl border border-slate-100 shadow-xl">
                    <div class="w-12 h-12 bg-primary text-white font-black rounded-2xl flex items-center justify-center text-xl mb-6 shadow-lg shadow-primary/30">
                        3
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3">Penjadwalan Ulang Cepat</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Teknisi dijadwalkan ulang untuk tiba di lokasi dalam kurun waktu 1x24 jam tanpa antrean.</p>
                </div>

                <!-- Step 4 -->
                <div class="p-8 bg-white rounded-3xl border border-slate-100 shadow-xl">
                    <div class="w-12 h-12 bg-primary text-white font-black rounded-2xl flex items-center justify-center text-xl mb-6 shadow-lg shadow-primary/30">
                        4
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3">Penanganan Ulang Gratis</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Saluran dikuras dan dibersihkan ulang hingga lancar sempurna tanpa memungut biaya rupiah pun.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Terms & Conditions Section --}}
    <section class="py-24 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-heading font-black text-slate-900 mb-8 text-center">Syarat & Ketentuan Garansi Resmi</h2>
            
            <div class="bg-stone-50 rounded-3xl p-8 sm:p-12 border border-slate-200 space-y-6 text-slate-700 leading-relaxed font-medium text-base">
                <div class="flex items-start gap-4">
                    <i class="ri-checkbox-circle-line text-primary text-2xl shrink-0 mt-1"></i>
                    <div>
                        <strong class="text-slate-900 font-bold">Masa Berlaku Garansi:</strong>
                        <p class="text-slate-600 text-sm mt-1">Garansi berlaku selama 30 hari kalender terhitung sejak tanggal pengerjaan selesai yang tertera pada invoice/nota transaksi.</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <i class="ri-checkbox-circle-line text-primary text-2xl shrink-0 mt-1"></i>
                    <div>
                        <strong class="text-slate-900 font-bold">Cakupan Jalur Pipa yang Dikerjakan:</strong>
                        <p class="text-slate-600 text-sm mt-1">Garansi berlaku untuk titik/jalur saluran pipa spesifik yang pernah dibersihkan oleh teknisi RooterIN.</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <i class="ri-checkbox-circle-line text-primary text-2xl shrink-0 mt-1"></i>
                    <div>
                        <strong class="text-slate-900 font-bold">Pengecualian Garansi:</strong>
                        <p class="text-slate-600 text-sm mt-1">Garansi gugur jika terjadi kerusakan fisik pipa secara permanen (seperti pipa pecah/ambles karena bencana alam), penyumbatan akibat semen/proyek konstruksi pasca-pengerjaan, atau pembongkaran mandiri oleh pihak luar.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-20 bg-slate-900 text-white text-center">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl sm:text-4xl font-heading font-black mb-6">Ingin Mengajukan Klaim Garansi?</h2>
            <p class="text-slate-400 text-lg mb-10">Tim customer care kami siap membantu memproses klaim Anda dengan cepat dan ramah.</p>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', \App\Models\Setting::get('whatsapp_number', '6285609009009')) }}?text=Halo%20Admin%20RooterIN%2C%20saya%20mau%20klaim%20garansi%20pengerjaan%20dong" class="px-10 py-5 bg-primary text-white font-black rounded-full text-lg hover:bg-[#e65a00] hover:scale-105 transition-all shadow-2xl inline-block">
                <i class="ri-whatsapp-line mr-2"></i> Klaim Garansi via WhatsApp
            </a>
        </div>
    </section>
</x-app-layout>
