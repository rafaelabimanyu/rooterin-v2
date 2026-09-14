<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class HoldingController extends Controller
{
    public function index()
    {
        $title = "Profil J&J Group Holding & Legalitas Resmi - RooterIN";
        $description = "Profil resmi J&J Group Holding sebagai induk entitas RooterIN. Informasi legalitas badan usaha, sertifikasi K3, NIB, NPWP, dan standar APD sanitasi teknisi.";

        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(url('/holding-legalitas'));
        SEOTools::opengraph()->setUrl(url('/holding-legalitas'));
        SEOTools::opengraph()->addProperty('type', 'website');

        return view('pages.holding-legalitas');
    }
}
