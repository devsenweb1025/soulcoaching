<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PageContent;

class PageContentSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $contents = [
            [
                'page' => 'services',
                'section' => 'elisabeth-kartenlegerin-telefonberatung-seelenfluesterin',
                'content' => ''
            ],
            [
                'page' => 'services',
                'section' => 'beraterprofil-platzhalter-hotline-seelenfluesterin',
                'content' => '"Wer seine Schattenseiten nicht erfahren hat, wird sein Licht nicht erkennen."'
            ],
        ];

        foreach ($contents as $content) {
            PageContent::create($content);
        }
    }
}
