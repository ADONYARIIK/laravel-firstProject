<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    public function index()
    {
        $cv = Cache::flexible('cv', [10, 30], function () {
            return Storage::json(('cvs/cv.json'));
        });

        return view('cv', ['cv' => $cv]);
    }
}
