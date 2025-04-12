<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Ritualkerze - Abschiedskerze',
                'slug' => 'ritualkerze-abschiedskerze',
                'price' => 28.90,
                'description' => 'Vielleicht ist dein Herzenstier über die Regenbogenbrücke gegangen, oder aber auch ein geliebter Mensch hat diesen Planeten verlassen. Diese Kerze kannst du als Ritualkerze nehmen, um deinem verstorbenen zur Seite zu stehen.',
                'image' => 'products/1.webp',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Ritual - Herzensöffner',
                'slug' => 'ritual-herzensoffner',
                'price' => 24.90,
                'description' => 'Wir denken, dass unser Hirn uns leitet, aber in Wirklichkeit ist es unser Herz, welches uns den Weg weist.',
                'image' => 'products/2.webp',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Ritual - Aurareinigung',
                'slug' => 'ritual-aurareinigung',
                'price' => 24.90,
                'description' => 'Die Aura ist dein persönliches Energiefeld. Als Ritual kannst du sie täglich durch Räucherware reinigen.',
                'image' => 'products/3.webp',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Ritualkerze - Vollmond',
                'slug' => 'ritualkerze-vollmond',
                'price' => 24.90,
                'description' => 'Der Vollmond hat einige Kräfte die du in diesem Leben für dich Nutzen kannst.',
                'image' => 'products/4.webp',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Ritual - Neumond',
                'slug' => 'ritual-neumond',
                'price' => 24.90,
                'description' => 'Der Neumond ist eine Zeit der Neuanfänge und der inneren Einkehr.',
                'image' => 'products/5.webp',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Energetisches Räumereinigen',
                'slug' => 'energetisches-raumereinigen',
                'price' => 40.00,
                'description' => 'Egal, ob an deinem Arbeitsplatz oder in deinem gemütlichen Zuhause. Alle Energien werden an Orten gesammelt.',
                'image' => 'products/6.webp',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Palo Santo',
                'slug' => 'palo-santo',
                'price' => 4.50,
                'description' => 'Palo Santo ist - wie es schon der Name sagt - das "heilige Holz" Südamerikas.',
                'image' => 'products/7.webp',
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Räucherstäbchen - Engel der Fülle',
                'slug' => 'raucherstabchen-engel-der-fulle',
                'price' => 5.50,
                'description' => 'Egal, um welche Art Fülle es sich handelt. Ob Finanzen, Gesundheit, Beziehungen oder eine andere Fülle.',
                'image' => 'products/8.webp',
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Räucherstäbchen - Engel der Liebe',
                'slug' => 'raucherstabchen-engel-der-liebe',
                'price' => 5.50,
                'description' => 'Engel wünschen sich für uns nur das Beste. Egal ob du gerade deine Selbstliebe oder die grosse Liebe entdecken willst.',
                'image' => 'products/9.webp',
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Räucherstäbchen - Engel des Vertrauens',
                'slug' => 'raucherstabchen-engel-des-vertrauens',
                'price' => 5.50,
                'description' => 'Vertrauen ist ein Grundkonstrukt für dein Leben. Egal, ob es sich um Selbst-Vertrauen handelt oder darum anderen zu vertrauen.',
                'image' => 'products/10.webp',
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Kartenset - Engel der Neuzeit',
                'slug' => 'kartenset-engel-der-neuzeit',
                'price' => 30.90,
                'description' => 'Als du dich entschieden hast noch einmal auf diesen Planten zu kommen und erneut deine Seele lernen zu lassen, warst du wirklich mutig.',
                'image' => 'products/11.webp',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Dein Persönlicher Seelencode',
                'slug' => 'dein-personlicher-seelencode',
                'price' => 120.00,
                'description' => 'Mit deinem Seelencode erfährst du nochmals genau, mit welchen Stärken und Schwächen du geboren wurdest.',
                'image' => 'products/12.webp',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Herzens Gutschein',
                'slug' => 'herzens-gutschein-a',
                'price' => 80.00,
                'description' => 'Du möchtest jemanden einen persönlichen Gutschein schenken, bei dem du jemandem auch noch etwas Gutes tust.',
                'image' => 'products/13.webp',
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Herzens Gutschein',
                'slug' => 'herzens-gutschein-b',
                'price' => 50.00,
                'description' => 'Du möchtest jemanden einen persönlichen Gutschein schenken, bei dem du jemandem auch noch etwas Gutes tust.',
                'image' => 'products/14.webp',
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'id' => 15,
                'name' => 'Herzens Gutschein',
                'slug' => 'herzens-gutschein-c',
                'price' => 120.00,
                'description' => 'Du möchtest jemanden einen persönlichen Gutschein schenken, bei dem du jemandem auch noch etwas Gutes tust.',
                'image' => 'products/15.webp',
                'is_active' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
