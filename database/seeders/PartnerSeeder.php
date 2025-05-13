<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run()
    {
        $partners = [
            [
                'name' => 'Bericht',
                'description' => 'FTMedien ist ein regionaler Medienpartner mit Fokus auf lokale Sichtbarkeit und wirkungsvolle Werbung. Durch die Verbindung von Print und digitalen Kanälen bietet FTMedien vielfältige Möglichkeiten, um Zielgruppen gezielt und professionell anzusprechen.',
                'domain' => 'https://www.ftmedien.ch/',
                'image' => 'partner4.png',
                'type' => 'Bericht',
                'sort_order' => 1
            ],
            [
                'name' => 'Eingetragene Therapeutin',
                'description' => 'Auf gesund.ch bin ich als Therapeutin gelistet – einer Plattform, die sich ganz dem bewussten Lebensstil widmet. Hier treffen Themen wie Gesundheit, Achtsamkeit und ganzheitliches Wohlbefinden auf echtes Wissen – verständlich, inspirierend und lebensnah. Ich freue mich, Teil dieser wertvollen Community zu sein und Menschen genau dort zu erreichen, wo Interesse an Gesundheit auf fundierte Begleitung trifft.',
                'domain' => 'https://www.gesund.ch/therapeutinnen-suche/therapeutinnen-praxen#q=Seelenfluesterin',
                'image' => 'partner3.png',
                'type' => 'Eingetragene Therapeutin',
                'sort_order' => 2
            ],
            [
                'name' => 'Partner',
                'description' => 'Mit Berk verbindet uns eine echte Partnerschaft. Ihre Produkte – von Räucherwaren bis hin zu spirituellen Begleitern – schaffen Raum für Achtsamkeit, innere Ruhe und bewusstes Leben. Wir schätzen die Zusammenarbeit mit Berk sehr, denn hier geht es nicht nur um Produkte, sondern um Haltung, Qualität und eine gemeinsame Vision.',
                'domain' => 'https://www.berk.de/',
                'image' => 'partner2.png',
                'type' => 'Partner',
                'sort_order' => 3
            ],
            [
                'name' => 'Partner',
                'description' => 'AuraSomaShop bringt Farbe ins Leben – im wahrsten Sinne des Wortes. Die Philosophie hinter Aura-Soma passt perfekt zu unserem Verständnis von Balance und Selbstfürsorge. Als Partner unterstützt uns AuraSomaShop mit hochwertigen Produkten, die helfen, die eigene Mitte zu stärken und sich selbst besser kennenzulernen.',
                'domain' => 'https://www.aurasomashop.ch/',
                'image' => 'partner1.png',
                'type' => 'Partner',
                'sort_order' => 4
            ],
            [
                'name' => 'Partner',
                'description' => 'Aqua Schweiz ist ein Unternehmen mit Sitz in Würenlos, das sich auf die Aufbereitung und den Vertrieb von levitiertem Wasser spezialisiert hat. Ihr levitiertes Wasser wird an einem besonderen Kraftort abgefüllt, der Energiewerte von über 100\'000 Boviseinheiten aufweist. Diese hohe Energie soll sich positiv auf die Qualität des Wassers auswirken. Zusätzlich bietet Aqua Schweiz Himalaya-Kristallsalzprodukte an, die das Wohlbefinden fördern. Die Zusammenarbeit mit Aqua Schweiz ermöglicht es uns, unseren Kunden hochwertige Produkte für Gesundheit und Wohlbefinden anzubieten.',
                'domain' => 'https://aquaschweiz.ch/',
                'image' => 'partner5.png',
                'type' => 'Partner',
                'sort_order' => 5
            ],
            [
                'name' => 'Vereinsmitglied',
                'description' => 'Ich bin Mitglied im Tarot e.V. – Berufsverband für Tarot und ganzheitliche Lebensberatung. Der Verband fördert die Qualität und Ethik in der Tarot-Beratung und bietet eine Plattform für Austausch, Weiterbildung und fachliche Entwicklung. Als Teil dieser Gemeinschaft engagiere ich mich für eine verantwortungsvolle und achtsame Beratungspraxis.',
                'domain' => 'https://tarotverband.de/',
                'image' => 'partner6.png',
                'type' => 'Vereinsmitglied',
                'sort_order' => 6
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
