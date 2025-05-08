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
    public function run(): void
    {
        //
        PageContent::updateOrCreate(
            [
                'page' => 'services',
                'section' => 'beraterprofil-platzhalter-hotline-seelenfluesterin',
            ],
            [
                'content' => ''
            ]
        );
    }
}
