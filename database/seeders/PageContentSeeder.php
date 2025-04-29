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
                'page' => 'home',
                'section' => 'hero_description',
                'content' => 'Entdecke mein vielseitiges Angebot rund um spirituelles Coaching, energetisches Heilen, Tierkommunikation, Kartenlegen und meine spirituelle Hotline.<br /><br />Ob du dich in einer Lebenskrise befindest, deine Chakren reinigen möchtest oder Hilfe bei der Verbindung zu deinem Tier suchst – ich begleite dich mit Herz und Intuition auf deinem Weg zu mehr Klarheit, Energie und Selbstheilung.'
            ],
            [
                'page' => 'hotline',
                'section' => 'hotline_content',
                'content' => '<h1 class="text-primary fw-bolder lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">
                    NEU!
                </h1>
                <div class="text-gray-600 fs-2 mb-5">
                    Brauchst du schnelle und kompetente Unterstützung?
                </div>
                <div class="text-gray-600 fs-2 mb-5">
                    Dann ruf jetzt die Seelenflüsterin-Hotline unter 0901 881 881 an und erhalte deine
                    intuitive Kartenlegung bequem über das Telefon – ganz ohne Wartezeit, vertrauensvoll
                    und direkt auf deine Frage abgestimmt.
                </div>
                <div class="text-gray-600 fw-bold fs-2 fw-bolder">
                    Ruf die liebenswürdige Elisabeth an:
                </div>
                <div class="text-gray-600 fs-2 mb-5">
                    Ich möchte mit meinen Fähigkeiten Menschen helfen, die Probleme haben oder denen der
                    gegenwärtige klare Blick für das Wesentliche verloren gegangen ist. Ich verfüge über
                    eine sehr ausgeprägte Feinfühligkeit und habe seit 17 Jahren eine starke Bindung zu
                    meinen Kipper - Karten.
                    Sei nicht ängstlich. Jeder Mensch hat mal Probleme. Aber die können wir gemeinsam
                    lösen.<br />
                </div>
                <div class="text-gray-600 fw-bold fs-2 fw-bolder">
                    Elisabeth ist Kartenlegerin in der 4. Generation du bist also in den Besten
                    Händen!<br /><br />
                </div>
                <div class="text-gray-600 fw-bold fs-2 fw-bolder mb-5">
                    Zeiten:<br />
                    Montag: 08:00 – 10:30 Uhr & 14:30 – 18:00 Uhr<br />
                    Dienstag: 08:00 – 10:30 Uhr & 14:30 – 18:00 Uhr<br />
                    Mittwoch: 08:00 – 23:00 Uhr<br />
                    Donnerstag: 08:00 – 23:00 Uhr<br />
                    Freitag: 08:00 – 10:30 Uhr & 14:30 – 18:00 Uhr<br />
                    Samstag: 08:00 – 10:30 Uhr & 14:30 – 18:00 Uhr<br />
                    Sonntag: 17:30 – 23:00 Uhr
                </div>
                <div class="text-gray-600 fw-bold fs-2 fw-bolder mb-5">
                    @chf(2.5).- / min
                </div>
                <div class="text-gray-600 fw-bold fs-2 fw-bolder mb-5">
                    Diese Hotline eignet sich ideal für:<br />
                </div>
                <div class="text-gray-600 fw-bold fs-2 fw-bolder mb-5">
                    🔮 Lenormand-Kartenlegung <br />
                    🔮 Hellsehen per Telefon<br />
                    🔮 Spirituelle Lebensfragen (Liebe, Beruf, Klarheit)
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center mb-10">
                    <img src="{{ asset(theme()->getMediaUrlPath() . \'landing/beraterprofil-platzhalter-hotline-seelenfluesterin.webp\') }}"
                        alt="" class="w-50 d-md-none d-block">
                    <div
                        class="text-center d-flex justify-content-center align-items-center mt-10 d-md-none d-block">
                        {!! theme()->getIcon(\'faceid\', \'fs-2hx text-gray-700\') !!}
                        <span class="ms-2 fs-xs-2 fs-sm-2 fs-md-2x text-gray-700">Hier könnte dein Bild
                            sein.</span>
                    </div>
                </div>
                <div class="text-gray-600 fs-2 fw-bolder mb-5">
                    Möchtest auch du einmal die Hotline bedienen?<br />
                    Dann melde Dich bei mir über das Kontaktformular und vielleicht bedienst schon bald
                    du die Hotline.
                </div>
                <div>
                    <div class="d-flex justify-content-start align-items-center mb-5">
                        <a href="{{ route(\'contact\') }}" class="btn btn-primary">Kontaktformular</a>
                    </div>
                </div>'
            ]
        ];

        foreach ($contents as $content) {
            PageContent::create($content);
        }
    }
}
