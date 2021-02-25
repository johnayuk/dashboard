<?php

// "barryvdh/laravel-snappy": "^0.4.8",

namespace App\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\Patient;
use PDF;

class PdfController extends Controller
{
    public function downloadPDF($id)
    {
        $patient= Patient::find($id);

        $data = App::make('dompdf.wrapper');
        $data = PDF::loadView('PDFs.patientpdf',compact('patient'));

        // return $data->download('disney.pdf');

        return $data->stream();
    }
}
