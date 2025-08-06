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

        // Static Pages - Landing
        $sitemap->add(Url::create('/')->setPriority(1.0))
                ->add(Url::create('/ueber-mich')->setPriority(0.8))
                ->add(Url::create('/kontakt')->setPriority(0.8))
                ->add(Url::create('/medien')->setPriority(0.8))
                ->add(Url::create('/impressum')->setPriority(0.5))
                ->add(Url::create('/datenschutz')->setPriority(0.5))
                ->add(Url::create('/agb')->setPriority(0.5))
                ->add(Url::create('/seelenlounge')->setPriority(0.8))
                ->add(Url::create('/transformationsraum')->setPriority(0.8))
                ->add(Url::create('/buchung')->setPriority(0.8))
                ->add(Url::create('/zahlung')->setPriority(0.8));

        // Shop Routes
        $sitemap->add(Url::create('/shop')->setPriority(0.9))
                ->add(Url::create('/shop/suchen')->setPriority(0.7));

        // Add all products
        Product::where('is_active', true)->get()->each(function ($product) use ($sitemap) {
            $sitemap->add(Url::create("/shop/{$product->slug}")
                ->setPriority(0.8)
                ->setLastModificationDate($product->updated_at));
        });

        // Course Routes
        $sitemap->add(Url::create('/kurs')->setPriority(0.9));

        // Add all courses
        Course::where('is_active', true)->get()->each(function ($course) use ($sitemap) {
            $sitemap->add(Url::create("/kurs/{$course->id}")
                ->setPriority(0.8)
                ->setLastModificationDate($course->updated_at));
        });

        // Cart Routes (public pages only)
        $sitemap->add(Url::create('/warenkorb')->setPriority(0.7))
                ->add(Url::create('/warenkorb/checkout')->setPriority(0.6))
                ->add(Url::create('/warenkorb/checkout/erfolg')->setPriority(0.5));

        // Service Routes
        $sitemap->add(Url::create('/dienstleistungen')->setPriority(0.9))
                ->add(Url::create('/transformationscoaching')->setPriority(0.8))
                ->add(Url::create('/dienstleistungen/live-chat')->setPriority(0.8));

        // Add all active services
        Service::where('is_active', true)->get()->each(function ($service) use ($sitemap) {
            $sitemap->add(Url::create("/dienstleistungen/{$service->id}")
                ->setPriority(0.8)
                ->setLastModificationDate($service->updated_at));
        });

        // Write the sitemap to file
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}
