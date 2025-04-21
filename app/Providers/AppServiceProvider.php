<?php

namespace App\Providers;

use App\Core\Adapters\Theme;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Helpers\CurrencyHelper;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $theme = theme();

        // Share theme adapter class
        View::share('theme', $theme);

        // Set demo globally
        $theme->setDemo(request()->input('demo', 'demo9'));
        // $theme->setDemo('demo2');

        $theme->initConfig();

        bootstrap()->run();

        if (isRTL()) {
            // RTL html attributes
            Theme::addHtmlAttribute('html', 'dir', 'rtl');
            Theme::addHtmlAttribute('html', 'direction', 'rtl');
            Theme::addHtmlAttribute('html', 'style', 'direction:rtl;');
            Theme::addHtmlAttribute('body', 'direction', 'rtl');
        }

        // Currency formatting directive
        Blade::directive('chf', function ($expression) {
            return "<?php echo App\Helpers\CurrencyHelper::formatCHF($expression); ?>";
        });

        Blade::directive('chfNoSymbol', function ($expression) {
            return "<?php echo App\Helpers\CurrencyHelper::formatCHFWithoutSymbol($expression); ?>";
        });
    }
}
