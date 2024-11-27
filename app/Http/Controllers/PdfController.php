<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use Spatie\LaravelPdf\Facades\Pdf;

class PdfController extends Controller
{
    public function index()
    {

        $filePath = storage_path('app/public/detailment-orders/') . 'sample.pdf';

        if (! file_exists(storage_path('app/public/detailment-orders'))) {
            mkdir(storage_path('app/public/detailment-orders'), 0777, true);
        }

        return Pdf::view('pdf')
            ->withBrowsershot(function (Browsershot $browsershot) {
                $browsershot->setNodeBinary('/usr/local/bin/node') // Env ah file path set tur (where node) 
                    ->setNpmBinary('/usr/local/bin/npm')  // Env ah file path set tur (where npm)
                    ->setChromePath("/usr/bin/chromium-browser")
                    ->newHeadless()
                    ->noSandbox()
                    ->setEnvironmentOptions([
                        'CHROME_CONFIG_HOME' => storage_path('app/chrome/.config')
                    ]);
            })
            ->save($filePath);
    }
}
