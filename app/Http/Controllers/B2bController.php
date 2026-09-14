<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class B2bController extends Controller
{
    public function index()
    {
        $title = "Solusi B2B & Layanan Pipa Komersial / Industri - RooterIN";
        $description = "Jasa pelancar saluran mampet skala komersial untuk gedung, restoran, hotel, mall & industri. Kontrak perawatan berkala, Hydro Jetting, Faktur Pajak & TOP flexible.";

        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(url('/b2b-layanan-komersial'));
        SEOTools::opengraph()->setUrl(url('/b2b-layanan-komersial'));
        SEOTools::opengraph()->addProperty('type', 'website');

        return view('pages.b2b-layanan-komersial');
    }
}
