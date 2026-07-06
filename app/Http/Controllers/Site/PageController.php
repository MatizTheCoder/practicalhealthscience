<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('site.pages.about');
    }

    public function editorialPolicy(): View
    {
        return view('site.pages.editorial-policy');
    }

    public function medicalDisclaimer(): View
    {
        return view('site.pages.medical-disclaimer');
    }

    public function contact(): View
    {
        return view('site.pages.contact');
    }
}