{!! '<'.'?xml version="1.0" encoding="UTF-8"?'.'>' !!}
{!! '<'.'?xml-stylesheet type="text/xsl" href="/sitemap.xsl"?'.'>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    {{-- Halaman Statis Utama --}}
    @foreach ($staticUrls as $url)
        <url>
            <loc>{{ $url }}</loc>
            <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>1.0</priority>
        </url>
    @endforeach

    {{-- Halaman Kota Aktif --}}
    @foreach ($cities as $city)
        @if(!empty($city->slug))
        <url>
            <loc>{{ route('local.city', ['city' => $city->slug]) }}</loc>
            <lastmod>{{ $city->updated_at ? $city->updated_at->tz('UTC')->toAtomString() : now()->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
        @endif
    @endforeach

    {{-- Halaman Kecamatan Aktif --}}
    @if(isset($districts))
    @foreach ($districts as $district)
        @if(!empty($district->slug) && $district->city && !empty($district->city->slug) && $district->city->is_active)
        <url>
            <loc>{{ route('local.district', ['city' => $district->city->slug, 'district' => $district->slug]) }}</loc>
            <lastmod>{{ $district->updated_at ? $district->updated_at->tz('UTC')->toAtomString() : now()->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
        @endif
    @endforeach
    @endif

    {{-- Posts / Artikel Tips --}}
    @foreach ($posts as $post)
        @if(!empty($post->slug))
        <url>
            <loc>{{ route('tips.detail', ['slug' => $post->slug]) }}</loc>
            <lastmod>{{ $post->updated_at ? $post->updated_at->tz('UTC')->toAtomString() : now()->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.7</priority>
        </url>
        @endif
    @endforeach

    {{-- Wikis --}}
    @foreach ($wikis as $wiki)
        @if(!empty($wiki->slug))
        <url>
            <loc>{{ route('wiki.detail', ['slug' => $wiki->slug]) }}</loc>
            <lastmod>{{ $wiki->updated_at ? $wiki->updated_at->tz('UTC')->toAtomString() : now()->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
        @endif
    @endforeach
</urlset>
