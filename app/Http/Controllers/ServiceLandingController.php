<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Artesaos\SEOTools\Facades\SEOTools;

class ServiceLandingController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('Layanan Pelancar Pipa Mampet & Plumbing - RooterIN');
        SEOTools::setDescription('Layanan lengkap pelancar wastafel mampet, kran tersumbat, toilet mampet, cuci toren air, dan instalasi pipa plumbing profesional tanpa bongkar.');
        SEOTools::setCanonical(url('/layanan'));
        SEOTools::opengraph()->setUrl(url('/layanan'));
        SEOTools::opengraph()->addProperty('type', 'website');

        $services = Service::where('is_active', true)->get();
        return view('layanan', compact('services'));
    }
}
