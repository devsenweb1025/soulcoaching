<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view("pages.landing.index");
    }

    public function about()
    {
        return view("pages.landing.about");
    }

    public function services()
    {
        return view("pages.landing.services");
    }

    public function prices()
    {
        return view("pages.landing.prices");
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
}
