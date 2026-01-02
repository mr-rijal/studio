<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Page;

class HomePageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function about()
    {
        $page = Page::where('slug', 'about')->published()->first();
        return view('page', compact('page'));
    }

    public function terms()
    {
        $page = Page::where('slug', 'terms')->published()->first();
        return view('page', compact('page'));
    }

    public function privacyPolicy()
    {
        $page = Page::where('slug', 'privacy-policy')->published()->first();
        return view('page', compact('page'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function familyRegistration()
    {
        return view('family-registration');
    }
}
