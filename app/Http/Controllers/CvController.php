<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class CvController extends Controller
{
    public function index()
    {
        $cv = Cache::flexible('cv', [10, 30], function () {
            return Storage::json(('cvs/cv.json'));
        });

        return view('cv.index', ['cv' => $cv]);
    }

    public function download()
    {
        $cv = Cache::flexible('cv', [10, 30], function () {
            return Storage::json(('cvs/cv.json'));
        });

        $pdf = Pdf::loadView('cv.pdf',['cv'=>$cv]);

        $name = $cv['personal']['name']['first'] . '_' . $cv['personal']['name']['last'] . '_CV.pdf';
        return $pdf->download($name);
    }
}
