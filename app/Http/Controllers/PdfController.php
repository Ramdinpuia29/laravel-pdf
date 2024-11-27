<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;

class PdfController extends Controller
{
    public function index()
    {
        return Pdf::view('pdf')
            ->save('sample.pdf');
    }
}
