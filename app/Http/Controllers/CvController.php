<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    public function index()
    {
        $json = Storage::json(('cvs/cv.json'));

        return view('cv', ['data' => $json]);
    }
}
