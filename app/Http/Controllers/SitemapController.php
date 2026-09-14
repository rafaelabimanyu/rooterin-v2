<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\WikiEntity;
use App\Models\SeoCity;
use App\Models\SeoDistrict;
use App\Models\Service;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $xml = \Illuminate\Support\Facades\Cache::remember('sitemap.xml', now()->addHours(6), function () {
            // 1. Halaman statis utama
            $staticUrls = [
                route('home'),
                route('about'),
                route('services'),
                route('gallery'),
                route('tips'),
                route('harga'),
                route('contact'),
                route('local.hub'),
                route('holding.legalitas'),
                route('garansi.layanan'),
                route('b2b.komersial'),
            ];

            // 2. Halaman tips/artikel
            $posts = Post::where('status', 'published')->orderBy('updated_at', 'desc')->get();

            // 3. Halaman wiki
            $wikis = WikiEntity::orderBy('updated_at', 'desc')->get();

            // 4. Halaman kota aktif (Priority: 0.9, Weekly)
            $cities = SeoCity::where('is_active', true)->orderBy('updated_at', 'desc')->get();

            // 5. Halaman kecamatan aktif (Priority: 0.8, Weekly)
            $districts = SeoDistrict::with('city')->where('is_active', true)->orderBy('updated_at', 'desc')->get();

            return view('sitemap', compact('staticUrls', 'posts', 'wikis', 'cities', 'districts'))->render();
        });

        return response($xml, 200)->header('Content-Type', 'text/xml; charset=utf-8');
    }
}
