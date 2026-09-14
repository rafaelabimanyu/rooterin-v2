<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    echo "1. Testing Home page...\n";
    $response = app(App\Http\Controllers\HomeController::class)->index();
    $html = $response->render();
    echo "   [OK] Home page (" . strlen($html) . " bytes)\n";

    echo "2. Testing Holding Legalitas page...\n";
    $response = app(App\Http\Controllers\HoldingController::class)->index();
    $html = $response->render();
    echo "   [OK] Holding Legalitas page (" . strlen($html) . " bytes)\n";

    echo "3. Testing Garansi Layanan page...\n";
    $response = app(App\Http\Controllers\GaransiController::class)->index();
    $html = $response->render();
    echo "   [OK] Garansi Layanan page (" . strlen($html) . " bytes)\n";

    echo "4. Testing B2B Komersial page...\n";
    $response = app(App\Http\Controllers\B2bController::class)->index();
    $html = $response->render();
    echo "   [OK] B2B Komersial page (" . strlen($html) . " bytes)\n";

    echo "5. Testing City page...\n";
    $response = app(App\Http\Controllers\LocalSeoController::class)->cityLanding('jakarta-selatan');
    $html = $response->render();
    echo "   [OK] City page (" . strlen($html) . " bytes)\n";

    echo "6. Testing District page...\n";
    $response = app(App\Http\Controllers\LocalSeoController::class)->districtLanding('jakarta-selatan', 'kebayoran-baru');
    $html = $response->render();
    echo "   [OK] District page (" . strlen($html) . " bytes)\n";

    echo "7. Testing Sitemap XML generation...\n";
    $response = app(App\Http\Controllers\SitemapController::class)->index();
    echo "   [OK] Sitemap XML (" . strlen($response->getContent()) . " bytes)\n";

    echo "\n>>> ALL PAGES TESTED AND PASSED SUCCESSFULLY! <<<\n";

} catch (\Throwable $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "Trace:\n" . $e->getTraceAsString() . "\n";
}
