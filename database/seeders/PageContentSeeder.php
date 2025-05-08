<?php

namespace Database\Seeders;

use App\Models\PageContent;
use Illuminate\Database\Seeder;

class PageContentSeeder extends Seeder
{
    public function run()
    {
        $contents = [
            [
                'page' => 'services',
                'section' => 'hero_description',
                'content' => ''
            ],
            [
                'page' => 'services',
                'section' => 'hotline_content',
                'content' => ''
            ],
            [
                'page' => 'services',
                'section' => 'elisabeth-kartenlegerin-telefonberatung-seelenfluesterin',
                'content' => ''
            ],
            [
                'page' => 'services',
                'section' => 'beraterprofil-platzhalter-hotline-seelenfluesterin',
                'content' => ''
            ],
            [
                'page' => 'ueber-mich',
                'section' => 'hero',
                'content' => 'Über mich'
            ],
            [
                'page' => 'ueber-mich',
                'section' => 'quote',
                'content' => '"Wer seine Schattenseiten nicht erfahren hat, wird sein Licht nicht erkennen."'
            ],
            [
                'page' => 'ueber-mich',
                'section' => 'signature',
                'content' => 'Seelenflüsterin Sarah'
            ],
            [
                'page' => 'ueber-mich',
                'section' => 'sarah_intro',
                'content' => 'Ich bin Sarah – spiritueller Coach und Heilerin aus der Schweiz.'
            ],
            [
                'page' => 'ueber-mich',
                'section' => 'sarah_description',
                'content' => 'Mein Weg ist geprägt von tiefem Wissen, persönlicher Transformation und der Verbindung zur feinstofflichen Welt.'
            ],
            [
                'page' => 'ueber-mich',
                'section' => 'sulana_intro',
                'content' => 'Seit über 16 Jahren ist Sulana meine treue Weggefährtin – und eine wundervolle Begleiterin.'
            ],
            [
                'page' => 'ueber-mich',
                'section' => 'sulana_description',
                'content' => 'Paddington begleitet Sulana mit einer speziellen Energie aus der Londoner Medialitätsschule. Sulana hat mich viel gelehrt, und viele meiner Erkenntnisse verdanke ich ihr.'
            ],
            [
                'page' => 'ueber-mich',
                'section' => 'attitude',
                'content' => 'Meine Grundhaltung'
            ],
            [
                'page' => 'ueber-mich',
                'section' => 'attitude_description',
                'content' => 'Ehrlichkeit, Liebe und Mitgefühl sind die Säulen meiner Arbeit. Ich glaube an die Kraft der Verbindung – zwischen Menschen, Tieren und der geistigen Welt. «Wir sind alle verbunden – alles ist eins."'
            ],
            [
                'page' => 'ueber-mich',
                'section' => 'qualifications',
                'content' => json_encode([
                    'Ausbildungen EFZ als Restaurationsfachfrau & Kauffrau',
                    'Kreditvermittlerin',
                    'Dipl. Versicherungs- und Vorsorgeberaterin VBV',
                    'Studium in Sozialpädagogik HF',
                    'Sprachen: DE, FR, EN und IT'
                ])
            ],
            [
                'page' => 'ueber-mich',
                'section' => 'trainings',
                'content' => json_encode([
                    'mediumship' => [
                        'Medialer Berater Kurs (Pascal Voggenhuber)',
                        'Medium-Weiterbildungen (Arthur Findlay College, 2024 & 2025)',
                        'Spiritueller Coach',
                        'Dipl. heilstein Trainerin'
                    ],
                    'quantum_healing' => [
                        'Quantenheilung & Spontanheilung'
                    ],
                    'healer_training' => [
                        'Masterclass Geistiges Heilen & Energetisches Heilen',
                        'Ausbildung kleiner Heiler',
                        'Schamanismus und die 4 Elemente',
                        'Heilen mit Symbolen und Zeichen',
                        'Reinigungen (Körper, Geist, Räumen)'
                    ],
                    'animal_communication' => [
                        'Tierkommunikation 1.0 & 2.0',
                        'Tierenergetik'
                    ],
                    'chakras_reiki' => [
                        'Chakren Harmonisierung',
                        'Reiki 1. Grad',
                        'Channeling'
                    ],
                    'other' => [
                        'Kartenlegen (Leonormand)',
                        'Tarot',
                        'Pendelkurs',
                        'Mitochondrien & TCM',
                        'Toxizitätskurs Suzanne Grieger-Langer'
                    ]
                ])
            ]
        ];

        foreach ($contents as $content) {
            PageContent::create($content);
        }
    }
}
