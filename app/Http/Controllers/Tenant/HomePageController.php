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
        $title = __('About');
        $page = Page::where('slug', 'about')->first();

        return view('page', compact('title'));
    }

    public function terms()
    {
        $title = __('Terms');
        $page = Page::where('slug', 'terms')->first();

        return view('page', compact('title'));
    }

    public function privacyPolicy()
    {
        $title = __('Privacy Policy');
        $page = Page::where('slug', 'privacy-policy')->first();

        return view('page', compact('title'));
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
