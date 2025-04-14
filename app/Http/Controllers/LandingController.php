<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class LandingController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->orderBy('order', 'asc')->get();
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
