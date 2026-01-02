<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomePageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function about()
    {
        $page = Page::where('slug', 'about')->published()->firstOrFail();
        return view('page', compact('page'));
    }

    public function terms()
    {
        $page = Page::where('slug', 'terms')->published()->firstOrFail();
        return view('page', compact('page'));
    }

    public function privacyPolicy()
    {
        $page = Page::where('slug', 'privacy-policy')->published()->firstOrFail();
        return view('page', compact('page'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:dns,rfc',
            'phone' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // send email to admin
        Mail::to(config('mail.from.address'))->send(new ContactMail($request));

        return redirect()->route('t.contact')->with('success', 'Message sent successfully');
    }

    public function familyRegistration()
    {
        return view('family-registration');
    }
}
