<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Einzelsitzung',
                'description' => 'In einer Einzelsitzung widmen wir uns ganz deinem individuellen Anliegen. Gemeinsam finden wir die Ursachen für deine Blockaden und lösen sie auf allen Ebenen.',
                'short_description' => 'Individuelle Beratung und energetische Heilarbeit für deine persönlichen Anliegen.',
                'price' => 180.00,
                'duration' => '60 Minuten',
                'method' => 'hybrid',
                'features' => [
                    'Persönliche Beratung und energetische Heilarbeit',
                    'Auflösung von Blockaden auf allen Ebenen',
                    'Aktivierung der Selbstheilungskräfte',
                    'Transformation alter Muster',
                    'Integration neuer Energien'
                ],
                'included_items' => [
                    'Vor- und Nachbereitung',
                    'Energetische Reinigung',
                    'Persönliche Übungen für zuhause'
                ],
                'sort_order' => 1,
                'is_featured' => true
            ],
            [
                'title' => 'Chakra Healing',
                'description' => 'Eine tiefgehende Chakra-Heilung, die deine Energiezentren harmonisiert und Blockaden auf allen Ebenen löst.',
                'short_description' => 'Harmonisierung deiner Energiezentren und Auflösung von Blockaden.',
                'price' => 220.00,
                'duration' => '90 Minuten',
                'method' => 'in-person',
                'features' => [
                    'Analyse deiner Chakren',
                    'Energetische Reinigung und Harmonisierung',
                    'Aktivierung der Selbstheilungskräfte',
                    'Integration der neuen Energien',
                    'Praktische Übungen für den Alltag'
                ],
                'included_items' => [
                    'Chakra-Analyse',
                    'Energetische Heilarbeit',
                    'Persönliche Chakra-Übungen',
                    'Nachbesprechung'
                ],
                'sort_order' => 2,
                'is_featured' => true
            ],
            [
                'title' => 'Online Coaching',
                'description' => 'Flexibles Online-Coaching für spirituelle Entwicklung und energetische Heilarbeit von zuhause aus.',
                'short_description' => 'Spirituelles Coaching und energetische Heilarbeit online.',
                'price' => 150.00,
                'duration' => '60 Minuten',
                'method' => 'online',
                'features' => [
                    'Ortsunabhängige Beratung',
                    'Energetische Heilarbeit',
                    'Spirituelles Coaching',
                    'Praktische Übungen',
                    'Flexible Terminvereinbarung'
                ],
                'included_items' => [
                    'Video-Beratung',
                    'Energetische Fernheilung',
                    'Übungsmaterial',
                    'E-Mail Support'
                ],
                'sort_order' => 3,
                'is_active' => true
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
