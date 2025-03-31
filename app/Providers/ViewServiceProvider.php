<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\GoogleReviewController;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer('pages.landing._partials._reviews', function ($view) {
            $controller = new GoogleReviewController();
            $googleReviews = $controller->getGoogleReviews();
            $view->with('googleReviews', $googleReviews);
        });
    }
}
