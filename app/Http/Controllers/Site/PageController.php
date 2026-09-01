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

    public function editorialTeam(): View
    {
        return view('site.pages.editorial-team');
    }

    public function medicalDisclaimer(): View
    {
        return view('site.pages.medical-disclaimer');
    }

    public function contact(): View
    {
        return view('site.pages.contact');
    }
    public function privacyPolicy(): View
    {
        return view('site.pages.privacy-policy');
    }

    public function termsOfUse(): View
    {
        return view('site.pages.terms-of-use');
    }
    public function newsletter(): View
    {
        return view('site.pages.newsletter');
    }
}