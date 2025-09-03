<?php

use App\Core\Adapters\Theme;

return array(
    'demo9-aside' => array(
        // Dashboard
        'dashboard' => array(
            "breadcrumb-title" => "Dashboard",
            "icon" => '<i class="bi bi-house fs-2x"></i>',
            "attributes" => array(
                'link' => array(
                    "data-bs-trigger" => "hover",
                    "data-bs-dismiss" => "click",
                    "data-bs-placement" => "right",
                ),
            ),
            "classes" => array(
                "item" => "py-2",
                "link" => "menu-center",
                "icon" => "me-0",
            ),
            "path" => "admin/armaturenbrett",
        ),

        // Users & Bookings
        'users-bookings' => array(
            "breadcrumb-title" => "Benutzer & Buchungen",
            "icon" => '<i class="bi bi-people fs-2x"></i>',
            "classes" => array(
                "item" => "py-2",
                "link" => "menu-center",
                "icon" => "me-0",
            ),
            "attributes" => array(
                "item" => array(
                    "data-kt-menu-trigger" => "click",
                    "data-kt-menu-placement" => Theme::isRTL() ? "left-start" : "right-start",
                ),
                'link' => array(
                    "data-bs-trigger" => "hover",
                    "data-bs-dismiss" => "click",
                    "data-bs-placement" => "right",
                ),
            ),
            "arrow" => true,
            "sub" => array(
                "class" => "menu-sub-dropdown w-225px px-1 py-4",
                "items" => array(
                    array(
                        'classes' => array('content' => ''),
                        'content' => '<span class="menu-section fs-5 fw-bolder ps-1 py-1">Benutzerverwaltung</span>',
                    ),
                    array(
                        'title' => 'Benutzerübersicht',
                        'path' => 'admin/benutzer',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'Benutzer anlegen',
                        'path' => 'admin/benutzer/create',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'classes' => array('content' => ''),
                        'content' => '<span class="menu-section fs-5 fw-bolder ps-1 py-1">Buchungsverwaltung</span>',
                    ),
                    array(
                        'title' => 'Buchungskalender',
                        'path' => 'admin/buchungen',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'classes' => array('content' => ''),
                        'content' => '<span class="menu-section fs-5 fw-bolder ps-1 py-1">Eventsverwaltung</span>',
                    ),
                    array(
                        'title' => 'Eventsübersicht',
                        'path' => 'admin/events',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Products & Orders
        'products-orders' => array(
            "breadcrumb-title" => "Produkte & Bestellungen",
            "icon" => '<i class="bi bi-shop fs-2x"></i>',
            "classes" => array(
                "item" => "py-2",
                "link" => "menu-center",
                "icon" => "me-0",
            ),
            "attributes" => array(
                "item" => array(
                    "data-kt-menu-trigger" => "click",
                    "data-kt-menu-placement" => Theme::isRTL() ? "left-start" : "right-start",
                ),
                'link' => array(
                    "data-bs-trigger" => "hover",
                    "data-bs-dismiss" => "click",
                    "data-bs-placement" => "right",
                ),
            ),
            "arrow" => true,
            "sub" => array(
                "class" => "menu-sub-dropdown w-225px px-1 py-4",
                "items" => array(
                    array(
                        'classes' => array('content' => ''),
                        'content' => '<span class="menu-section fs-5 fw-bolder ps-1 py-1">Produktverwaltung</span>',
                    ),
                    array(
                        'title' => 'Produktübersicht',
                        'path' => 'admin/produkte',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'Produkt anlegen',
                        'path' => 'admin/produkte/create',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'classes' => array('content' => ''),
                        'content' => '<span class="menu-section fs-5 fw-bolder ps-1 py-1">Bestellverwaltung</span>',
                    ),
                    array(
                        'title' => 'Bestellübersicht',
                        'path' => 'admin/bestellungen',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Content & Services
        'content-services' => array(
            "breadcrumb-title" => "Inhalte & Dienstleistungen",
            "icon" => '<i class="bi bi-file-text fs-2x"></i>',
            "classes" => array(
                "item" => "py-2",
                "link" => "menu-center",
                "icon" => "me-0",
            ),
            "attributes" => array(
                "item" => array(
                    "data-kt-menu-trigger" => "click",
                    "data-kt-menu-placement" => Theme::isRTL() ? "left-start" : "right-start",
                ),
                'link' => array(
                    "data-bs-trigger" => "hover",
                    "data-bs-dismiss" => "click",
                    "data-bs-placement" => "right",
                ),
            ),
            "arrow" => true,
            "sub" => array(
                "class" => "menu-sub-dropdown w-225px px-1 py-4",
                "items" => array(
                    array(
                        'classes' => array('content' => ''),
                        'content' => '<span class="menu-section fs-5 fw-bolder ps-1 py-1">Seiteninhalte</span>',
                    ),
                    array(
                        'title' => 'Inhaltsübersicht',
                        'path' => 'admin/contents',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'classes' => array('content' => ''),
                        'content' => '<span class="menu-section fs-5 fw-bolder ps-1 py-1">Partnerverwaltung</span>',
                    ),
                    array(
                        'title' => 'Partnerübersicht',
                        'path' => 'admin/partners',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'Partner anlegen',
                        'path' => 'admin/partners/create',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'classes' => array('content' => ''),
                        'content' => '<span class="menu-section fs-5 fw-bolder ps-1 py-1">Dienstleistungsverwaltung</span>',
                    ),
                    array(
                        'title' => 'Dienstleistungsübersicht',
                        'path' => 'admin/dienstleistungen',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'Dienstleistung anlegen',
                        'path' => 'admin/dienstleistungen/create',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),
    ),
);
