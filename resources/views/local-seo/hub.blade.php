<x-app-layout>
{{-- HERO SECTION AREA LAYANAN --}}
<section class="relative pt-36 sm:pt-48 pb-32 overflow-hidden bg-[#061417] text-white min-h-[70vh] flex items-center">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1557683316-973673baf926?q=80&w=2029" 
             width="1920"
             height="1080"
             loading="eager"
             decoding="async"
             class="w-full h-full object-cover opacity-15 grayscale brightness-50" 
             alt="RooterIN Geo Coverage Area Directory">
        <div class="absolute inset-0 bg-gradient-to-b from-[#061417]/90 via-[#061417]/80 to-[#061417]" style="background: radial-gradient(circle at top right, rgba(16,185,129,0.18), transparent 65%);"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 relative z-10 text-center">
        <div class="max-w-4xl mx-auto">
            <nav class="flex items-center justify-center gap-2 text-xs font-bold uppercase tracking-widest text-slate-400 mb-8">
                <a href="{{ route('home') }}" class="hover:text-[#00e599] transition-colors">Home</a>
                <i class="ri-arrow-right-s-line text-[#10b981]"></i>
                <span class="text-[#00e599] font-black">Jangkauan Direktori Wilayah</span>
            </nav>

            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold text-white leading-tight mb-8 tracking-tight">
                Pusat Direktori <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-300 to-green-400 font-black">Jasa Pipa Mampet</span> Terdekat.
            </h1>
            
            <p class="text-lg sm:text-xl text-slate-300 leading-relaxed mb-10 max-w-3xl mx-auto">
                Pilih kota dan kecamatan Anda di bawah ini untuk terhubung langsung dengan armada teknisi profesional RooterIN terdekat di <strong class="text-white">Jabodetabek, Semarang, dan Lampung</strong>. Fast response 15-30 menit, 100% tanpa bongkar, dan garansi 30 hari.
            </p>
        </div>
    </div>
</section>

<!-- Regional Cities Grid (Deep Midnight Navy #0b1220) -->
<section class="py-24 bg-[#0b1220] text-white relative overflow-hidden">
    <div class="container mx-auto px-4 sm:px-6 relative z-10">
        @foreach($groupedCities as $region => $regionCities)
        <div class="mb-20">
            <div class="flex items-center gap-4 mb-10 border-b border-slate-800/80 pb-4">
                <div class="w-3 h-8 bg-[#00e599] rounded-full"></div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Wilayah {{ $region }}</h2>
                <span class="px-3 py-1 bg-[#10b981]/20 border border-[#10b981]/40 text-[#00e599] rounded-full text-xs font-bold uppercase tracking-widest">
                    {{ $regionCities->count() }} Area Kota Aktif
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($regionCities as $c)
                <a href="{{ route('local.city', $c->slug) }}" 
                   class="group p-6 bg-[#132226]/80 backdrop-blur-md border border-[#10b981]/20 rounded-3xl hover:border-[#00e599]/60 hover:bg-[#132226] transition-all duration-300 shadow-xl flex flex-col justify-between hover:-translate-y-1.5">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-[10px] font-extrabold text-[#00e599] uppercase tracking-widest">{{ $c->region }}</span>
                            <div class="flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-[#10b981]/15 border border-[#10b981]/30">
                                <span class="w-2 h-2 bg-[#00e599] rounded-full animate-pulse"></span>
                                <span class="text-[10px] font-bold text-slate-300 uppercase">Standby 24h</span>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-white group-hover:text-[#00e599] mb-2 transition-colors">{{ $c->name }}</h3>
                        <p class="text-slate-300 text-xs line-clamp-2 mb-6 leading-relaxed">{{ $c->description_prefix }}</p>
                    </div>

                    <div class="flex items-center justify-between text-[#00e599] font-bold text-xs uppercase tracking-widest pt-4 border-t border-slate-800/80 transition-colors">
                        <span>Lihat Layanan {{ $c->name }}</span>
                        <i class="ri-arrow-right-line group-hover:translate-x-2 transition-transform"></i>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

@isset($schemaJson)
<script type="application/ld+json">
{!! $schemaJson !!}
</script>
@endisset

</x-app-layout>
