<x-app-layout>
<section class="relative pt-36 sm:pt-48 pb-40 overflow-hidden">
    <!-- Background Decor -->
    <div class="absolute inset-0 z-0">
        <div class="absolute top-0 left-0 w-full h-full bg-slate-900"></div>
        <img src="{{ asset('images/pages/hero1.webp') }}" class="absolute w-full h-full object-cover opacity-20 mix-blend-overlay" alt="Rooter Service {{ $district->name }}">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/50 via-slate-900 to-stone-50"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row gap-20 items-center">
            <div class="lg:w-2/3 text-center lg:text-left">
                <nav class="flex items-center justify-center lg:justify-start gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-white/50 mb-10 flex-wrap">
                    <a href="{{ route('home') }}">Home</a>
                    <i class="ri-arrow-right-s-line"></i>
                    <a href="{{ route('local.city', $city->slug) }}">{{ $city->name }}</a>
                    <i class="ri-arrow-right-s-line"></i>
                    <a href="{{ route('local.district', [$city->slug, $district->slug]) }}">{{ $district->name }}</a>
                    <i class="ri-arrow-right-s-line"></i>
                    <span class="text-primary">{{ $service->name }}</span>
                </nav>

                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-heading font-black text-white leading-[1.1] mb-8">
                    {{ $service->name }} di <br><span class="text-primary italic">{{ $district->name }}</span>, {{ $city->name }}
                </h1>

                <div class="p-8 rounded-[2rem] bg-white/5 backdrop-blur-xl border border-white/10 text-white/80 text-lg leading-relaxed mb-12">
                    <p class="mb-4">Mengalami kendala <strong>{{ $service->name }}</strong> di area <strong>{{ $district->name }}</strong>? Tim teknisi RooterIN siap meluncur ke alamat Anda dengan garansi 30 hari & pengerjaan cepat tanpa bongkar.</p>
                </div>

                <!-- LSI Injector Cloud -->
                @if(!empty($lsiCloud))
                <div class="mb-12 flex flex-wrap justify-center lg:justify-start gap-2">
                    @foreach($lsiCloud as $tag)
                    <span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full text-[9px] font-bold text-slate-400 uppercase tracking-widest hover:text-primary hover:border-primary/50 cursor-default transition-all">
                        {{ $tag }}
                    </span>
                    @endforeach
                </div>
                @endif

                <div class="flex flex-col sm:flex-row items-center gap-6">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', \App\Models\Setting::get('whatsapp_number', '6285609009009')) }}?text=Halo%20Admin%20RooterIn%20{{ $district->name }}%2C%20saya%20butuh%20{{ $service->name }}" 
                       onclick="trackWhatsAppClick('district-service-page')"
                       class="w-full sm:w-auto px-10 py-5 bg-primary text-white rounded-full font-black text-lg hover:bg-[#e65a00] hover:scale-105 transition-all shadow-2xl shadow-primary/30 text-center">
                        Panggil Teknisi {{ $district->name }}
                    </a>
                </div>
            </div>

            <div class="lg:w-1/3 w-full">
                <!-- Trust Architect: Localized Reviews -->
                <div class="space-y-6">
                    @foreach($cityReviews->take(3) as $review)
                    <div class="p-8 bg-white rounded-3xl shadow-xl border border-slate-100 transform {{ $loop->index % 2 == 0 ? 'translate-x-2' : '-translate-x-2' }}">
                        <div class="flex gap-1 text-primary text-xs mb-3">
                            @for($i=1;$i<=$review->rating;$i++) ★ @endfor
                        </div>
                        <p class="text-slate-600 italic text-sm mb-4">"{{ $review->review_text }}"</p>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center font-black text-slate-400 text-[10px]">
                                {{ substr($review->customer_name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-xs font-black text-slate-900 uppercase tracking-widest">{{ $review->customer_name }}</p>
                                <p class="text-[8px] font-bold text-slate-400 uppercase tracking-widest">{{ $district->name }} Client</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@isset($schemaJson)
<script type="application/ld+json">
{!! $schemaJson !!}
</script>
@endisset

</x-app-layout>
