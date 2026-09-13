<x-app-layout>
<section class="relative pt-36 sm:pt-48 pb-32 overflow-hidden bg-slate-900 min-h-[70vh] flex items-center">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1557683316-973673baf926?q=80&w=2029" class="w-full h-full object-cover opacity-20 grayscale brightness-50" alt="RooterIN Geo Coverage Area">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900 to-stone-50"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10 text-center">
        <div class="max-w-4xl mx-auto">
            <nav class="flex items-center justify-center gap-2 text-[10px] font-black uppercase tracking-[0.4em] text-white/40 mb-8">
                <a href="{{ route('home') }}">Home</a>
                <i class="ri-arrow-right-s-line"></i>
                <span class="text-primary italic">Jangkauan Wilayah</span>
            </nav>

            <h1 class="text-4xl sm:text-6xl md:text-7xl font-heading font-black text-white leading-tight mb-8">
                Pusat Jangkauan <br><span class="text-primary italic">Jasa Pipa Mampet</span> Terdekat.
            </h1>
            
            <p class="text-lg sm:text-xl text-slate-400 leading-relaxed mb-10 max-w-2xl mx-auto font-medium">
                Pilih wilayah Anda di bawah ini untuk terhubung langsung dengan armada teknisi profesional RooterIN terdekat di <strong>Jabodetabek, Semarang, dan Lampung</strong>. Fast response 15 menit, bebas bongkar, dan bergaransi 30 hari.
            </p>
        </div>
    </div>
</section>

<!-- Regional Cities Grid -->
<section class="py-24 bg-stone-50">
    <div class="container mx-auto px-6">
        @foreach($groupedCities as $region => $regionCities)
        <div class="mb-20">
            <div class="flex items-center gap-4 mb-10 border-b border-slate-200 pb-4">
                <div class="w-4 h-8 bg-primary rounded-full"></div>
                <h2 class="text-3xl font-heading font-black text-slate-900 tracking-tight">Wilayah {{ $region }}</h2>
                <span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-xs font-bold uppercase tracking-widest">{{ $regionCities->count() }} Area Aktif</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($regionCities as $c)
                <a href="{{ route('local.city', $c->slug) }}" class="group p-6 bg-white border border-slate-100 rounded-3xl hover:bg-secondary hover:border-secondary transition-all duration-300 shadow-sm hover:shadow-2xl flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-[10px] font-black text-primary group-hover:text-accent uppercase tracking-widest">{{ $c->region }}</span>
                            <div class="flex items-center gap-1.5">
                                <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
                                <span class="text-[9px] font-bold text-slate-400 group-hover:text-white/60 uppercase">Standby</span>
                            </div>
                        </div>
                        <h3 class="text-xl font-black text-slate-900 group-hover:text-white mb-2 transition-colors">{{ $c->name }}</h3>
                        <p class="text-slate-500 group-hover:text-white/70 text-xs line-clamp-2 mb-6 transition-colors">{{ $c->description_prefix }}</p>
                    </div>

                    <div class="flex items-center gap-2 text-primary group-hover:text-accent font-black text-xs uppercase tracking-widest transition-colors pt-4 border-t border-slate-100 group-hover:border-white/10">
                        Lihat Layanan
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
