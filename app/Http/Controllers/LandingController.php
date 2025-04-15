<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class LandingController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        return view("pages.landing.index", compact("services"));
    }

    public function about()
    {
        return view("pages.landing.about");
    }

    public function course()
    {
        return view("pages.landing.course");
    }

    public function shop()
    {
        return view("pages.landing.shop");
    }

    public function contact()
    {
        return view("pages.landing.contact");
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'description' => 'required|string',
            'confirm' => 'required|accepted'
        ]);

        try {
            // Send email to admin
            Mail::to(config('mail.admin_email'))->send(new ContactFormMail([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'service' => $request->service,
                'description' => $request->description
            ]));

            return response()->json([
                'message' => 'Ihre Nachricht wurde erfolgreich gesendet!'
            ]);
        } catch (\Exception $e) {
            dd($e);
            return response()->json([
                'message' => 'Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.'
            ], 500);
        }
    }

    public function medien()
    {
        return view("pages.landing.media");
    }

    public function booking()
    {
        return view("pages.landing.booking");
    }

    public function payment()
    {
        return view("pages.landing.payment");
    }

    public function impressum()
    {
        return view('pages.landing.impressum');
    }

    public function datenschutz()
    {
        return view('pages.landing.datenschutz');
    }

    public function agb()
    {
        return view('pages.landing.agb');
    }
}
