<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Search Console Verification -->
    <meta name="google-site-verification" content="OvNhTcRWHYd9JhvzkmvuFnVlrrmH9fMcoAJRRUx6EGw" />

    {!! \Artesaos\SEOTools\Facades\SEOTools::generate() !!}
    
    {{-- Hreflang Automator --}}
    {!! $hreflangTags ?? '' !!}
    
    {{-- Headless Semantic Entity Graph --}}
    {!! $semanticSchema ?? '' !!}

    {{-- ================================================================
         GLOBAL ENTITY AUTHORITY SCHEMA — Organization (J&J Group Holding)
         Prevents schema collision with page-specific LocalBusiness schemas
         ================================================================ --}}
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@type": "Organization",
      "@id": "{{ url('/') }}/#organization",
      "name": "RooterIN",
      "legalName": "RooterIN - Naungan J&J Group Holding",
      "alternateName": ["RooterIN Indonesia", "Jasa Saluran Mampet RooterIN"],
      "description": "RooterIN adalah penyedia layanan plumbing, deteksi & pelancar saluran pipa mampet profesional di bawah naungan J&J Group Holding.",
      "url": "{{ url('/') }}",
      "logo": {
        "@type": "ImageObject",
        "url": "{{ url('/images/logo.png') }}",
        "width": 200,
        "height": 60
      },
      "image": [
        "{{ url('/images/logo.png') }}"
      ],
      "telephone": "+62-856-0900-9009",
      "email": "hello@rooterin.com",
      "sameAs": [
        "https://www.instagram.com/rooterin",
        "https://www.facebook.com/rooterin",
        "https://www.tiktok.com/@rooterin",
        "https://wa.me/6285609009009"
      ],
      "parentOrganization": {
        "@type": "Organization",
        "name": "J&J Group Holding"
      }
    }
    </script>

    <script>
        function trackWhatsAppClick(source = 'general') {
            fetch('/api/track-whatsapp', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    url: window.location.href,
                    source: source
                })
            });
        }
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Core Web Vitals LCP Hero Image Preload -->
    <link rel="preload" as="image" href="{{ $heroPreload ?? asset('images/pages/hero1.webp') }}" type="image/webp" fetchpriority="high">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Local Edge Pre-Rendering (Speculative Rules API) --}}
    <script type="speculationrules">
    {
      "prerender": [{
        "source": "list",
        "urls": ["{{ route('home') }}", "{{ route('services') }}"]
      }, {
        "source": "document",
        "where": { "and": [
          { "href_matches": "/area/*" },
          { "not": { "href_matches": "/admin/*" }}
        ]},
        "eagerness": "moderate"
      }]
    }
    </script>
</head>
<body class="font-sans antialiased bg-stone-50 text-slate-800">
    <div id="site-content" class="min-h-screen flex flex-col transition-all duration-300">
        @include('layouts.navigation')

        <main class="flex-grow">
            {{ $slot }}
        </main>

        @include('layouts.footer')
        
        <x-sticky-footer />
    </div>
    
    <x-accessibility-menu />

    <!-- Service Worker Registration -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(reg => {
                        console.log('Service Worker Registered');
                        // NOTE: Auto-reload disabled to prevent interrupting Diagnostic modal
                        // reg.onupdatefound fires but we DON'T force reload anymore
                        reg.onupdatefound = () => {
                            const installingWorker = reg.installing;
                            installingWorker.onstatechange = () => {
                                if (installingWorker.state === 'installed' && navigator.serviceWorker.controller) {
                                    console.log('New SW version available (manual refresh to apply).');
                                    // DO NOT auto-reload — would disrupt Diagnostic modal result display
                                }
                            };
                        };
                    })
                    .catch(err => console.log('Service Worker Failed', err));
            });
        }
    </script>
</body>
</html>
