<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class GaransiController extends Controller
{
    public function index()
    {
        $title = "Ketentuan & SOP Klaim Garansi 30 Hari - RooterIN";
        $description = "Pahami jaminan garansi 30 hari tanpa biaya tambahan dari RooterIN. Panduan prosedur klaim garansi 1x24 jam, syarat & ketentuan resmi pengerjaan pipa mampet.";

        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(url('/garansi-layanan'));
        SEOTools::opengraph()->setUrl(url('/garansi-layanan'));
        SEOTools::opengraph()->addProperty('type', 'website');

        return view('pages.garansi-layanan');
    }
}
