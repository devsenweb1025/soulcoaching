<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Kartenlegung in Verbindung zur Seele',
                'description' => 'Eine spirituelle Sitzung zur Kartenlegung und Seelenverbindung',
                'event_date' => '2025-08-07',
                'start_time' => '19:00:00',
                'end_time' => '21:00:00',
                'zoom_link' => 'https://us05web.zoom.us/j/82853488675?pwd=xnzs0DvSuI5aXOCbs0CdCBondIZerl.1',
                'category' => 'Kartenlegung',
                'category_color' => 'bg-primary',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Meditation zum Herzplaneten',
                'description' => 'Eine tiefgreifende Meditation zur Verbindung mit dem Herzplaneten',
                'event_date' => '2025-08-14',
                'start_time' => '19:00:00',
                'end_time' => '21:00:00',
                'zoom_link' => 'https://us06web.zoom.us/j/2592102293?pwd=5VEWvnucpVpXaDjAwM1vgdWbmNKzBx.1',
                'category' => 'Meditation',
                'category_color' => 'bg-success',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Gefühle und ihre Wichtigkeit',
                'description' => 'Ein Workshop über die Bedeutung und den Umgang mit Gefühlen',
                'event_date' => '2025-08-24',
                'start_time' => '19:00:00',
                'end_time' => '21:00:00',
                'zoom_link' => 'https://us06web.zoom.us/j/2592102293?pwd=5VEWvnucpVpXaDjAwM1vgdWbmNKzBx.1',
                'category' => 'Emotionen',
                'category_color' => 'bg-info',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Transformation auf Energieebene',
                'description' => 'Eine energetische Transformationssitzung für Körper, Geist und Seele',
                'event_date' => '2025-08-28',
                'start_time' => '19:00:00',
                'end_time' => '21:00:00',
                'zoom_link' => 'https://us06web.zoom.us/j/2592102293?pwd=5VEWvnucpVpXaDjAwM1vgdWbmNKzBx.1',
                'category' => 'Energie',
                'category_color' => 'bg-warning',
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($events as $eventData) {
            Event::create($eventData);
        }
    }
}
