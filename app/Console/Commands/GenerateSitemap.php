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
                ->add(Url::create('/about')->setPriority(0.8))
                ->add(Url::create('/contact')->setPriority(0.8))
                ->add(Url::create('/medien')->setPriority(0.8))
                ->add(Url::create('/impressum')->setPriority(0.5))
                ->add(Url::create('/datenschutz')->setPriority(0.5))
                ->add(Url::create('/agb')->setPriority(0.5))
                ->add(Url::create('/booking')->setPriority(0.8))
                ->add(Url::create('/payment')->setPriority(0.8));

        // Shop Routes
        $sitemap->add(Url::create('/shop')->setPriority(0.9))
                ->add(Url::create('/shop/search')->setPriority(0.7));

        // Add all products
        Product::where('active', true)->get()->each(function ($product) use ($sitemap) {
            $sitemap->add(Url::create("/shop/{$product->slug}")
                ->setPriority(0.8)
                ->setLastModificationDate($product->updated_at));
        });

        // Services Routes
        $sitemap->add(Url::create('/services')->setPriority(0.9))
                ->add(Url::create('/prices')->setPriority(0.8));

        // Add all services
        Service::where('active', true)->get()->each(function ($service) use ($sitemap) {
            $sitemap->add(Url::create("/service/{$service->id}")
                ->setPriority(0.8)
                ->setLastModificationDate($service->updated_at));
        });

        // Course Routes
        $sitemap->add(Url::create('/course')->setPriority(0.9));

        // Add all courses
        Course::where('active', true)->get()->each(function ($course) use ($sitemap) {
            $sitemap->add(Url::create("/course/{$course->id}")
                ->setPriority(0.8)
                ->setLastModificationDate($course->updated_at));
        });

        // Write the sitemap to file
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}
