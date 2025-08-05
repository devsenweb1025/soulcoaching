<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Product;
use App\Models\Service;
use App\Models\Course;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap.xml';

    public function handle()
    {
        $sitemap = Sitemap::create();

        // Static Pages
        $sitemap->add(Url::create('/')->setPriority(1.0))
                ->add(Url::create('/ueber-mich')->setPriority(0.8))
                ->add(Url::create('/kontakt')->setPriority(0.8))
                ->add(Url::create('/medien')->setPriority(0.8))
                ->add(Url::create('/impressum')->setPriority(0.5))
                ->add(Url::create('/datenschutz')->setPriority(0.5))
                ->add(Url::create('/agb')->setPriority(0.5))
                ->add(Url::create('/buchung')->setPriority(0.8))
                ->add(Url::create('/zahlung')->setPriority(0.8));

        // Shop Routes
        $sitemap->add(Url::create('/shop')->setPriority(0.9));

        // Add all products
        Product::where('is_active', true)->get()->each(function ($product) use ($sitemap) {
            $sitemap->add(Url::create("/shop/{$product->slug}")
                ->setPriority(0.8)
                ->setLastModificationDate($product->updated_at));
        });

        // Services Routes
        $sitemap->add(Url::create('/dienstleistungen')->setPriority(0.9))
                ->add(Url::create('/transformationscoaching')->setPriority(0.8))
                ->add(Url::create('/dienstleistungen/live-chat')->setPriority(0.8));

        // Course Routes
        $sitemap->add(Url::create('/kurs')->setPriority(0.9));

        // Write the sitemap to file
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}
