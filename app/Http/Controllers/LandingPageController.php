<?php

namespace App\Http\Controllers;

use App\Helpers\SchemaHelper;
use App\Mail\SendRegistrationConfirmationCompleteMail;
use App\Models\Company;
use App\Models\CompanyRegistrationToken;
use App\Models\Domain;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use function Pest\Laravel\session;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landing-page.index');
    }

    public function about()
    {
        return view('landing-page.about');
    }

    public function pricing()
    {
        return view('landing-page.pricing');
    }

    public function contact()
    {
        return view('landing-page.contact');
    }

    public function register()
    {
        return view('landing-page.auth.register');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email:dns,rfc|unique:users,email',
            'terms' => 'required|accepted',
        ]);

        // Generate a company registration token for the user
        $token = new CompanyRegistrationToken;
        $token->first_name = $request->first_name;
        $token->last_name = $request->last_name;
        $token->email = $request->email;
        $token->save();
        $token->generateToken();

        // Send email to user with a link to complete the registration
        Mail::to($token->email)->send(new SendRegistrationConfirmationCompleteMail($token));

        return redirect()->route('c.register.registration-complete')->with('registration_complete', 'mail_sent');
    }

    public function login()
    {
        return view('landing-page.auth.login');
    }

    public function loginStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns,rfc',
        ]);

        $user = User::where('email', $request->email)->first();
        if (! $user) {
            return redirect()->route('c.login')->with('error', 'Invalid email');
        }

        return redirect()->route('c.login.complete', ['token' => $user->token]);
    }

    public function registrationComplete()
    {
        if (! session()->has('registration_complete') || session()->get('registration_complete') !== 'mail_sent') {
            return redirect()->route('c.home')->with('error', 'Invalid registration complete link');
        }
        session()->forget('registration_complete');

        return view('landing-page.auth.registration-complete');
    }

    public function completeRegistration($token)
    {
        $token = CompanyRegistrationToken::where('token', $token)->first();
        if (! $token) {
            return redirect()->route('c.home')->with('error', 'Invalid token');
        }

        return view('landing-page.auth.complete-registration', ['token' => $token]);
    }

    public function completeRegistrationStore(Request $request, $token)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:dns,rfc|unique:users,email',
            'phone' => 'required|string|max:255',
            'state' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:255',
            'subdomain' => 'required|string|max:255',
        ]);

        $token = CompanyRegistrationToken::where('token', $token)->first();
        if (! $token) {
            return redirect()->route('c.home')->with('error', 'Invalid token');
        }

        // SchemaHelper::createSchema($companySchema->schema_name);
        // SchemaHelper::migrateTable($companySchema->schema_name);
        // SchemaHelper::seedTable($companySchema->schema_name);
        // SchemaHelper::makeActiveCompany($companySchema->schema_name);

        // create user
        $role = Role::where('guard', 'web')->first();

        // create company
        $company = Company::create([
            'name' => $request->name,
            'phone_number' => $request->phone,
            'mobile_number' => $request->phone,
            'organization_type' => 'dance',
            'email' => $request->email,
            'replyto_email' => $request->email,
            'city' => $request->city,
            'state' => $request->state ?? 'PA',
            'zip' => $request->zip,
            'taxid_label' => 'Tax ID',
            'status' => true,
        ]);
        $user = User::create([
            'company_id' => $company->id,
            'role_id' => $role->id,
            'first_name' => $token->first_name,
            'last_name' => $token->last_name,
            'email' => $token->email,
            'password' => Hash::make(Str::random(10)),
            'status' => true,
        ]);

        // create domain
        $domain = Domain::create([
            'company_id' => $company->id,
            'domain' => $request->subdomain.'.lancraft.test',
            'primary' => true,
            'status' => true,
        ]);

        // delete token
        $token->delete();

        return redirect()->to('//'.$domain->domain);
    }
}
