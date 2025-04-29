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

        // Page Content
        'page-content' => array(
            "breadcrumb-title" => "Seiteninhalte",
            "icon" => '<i class="bi bi-file-text fs-2x"></i>',
            "path" => "admin/contents",
        ),

        // Products
        'products' => array(
            "breadcrumb-title" => "Produkte",
            "icon" => '<i class="bi bi-box fs-2x"></i>',
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
            "arrow" => false,
            "sub" => array(
                "class" => "menu-sub-dropdown w-225px px-1 py-4",
                "items" => array(
                    array(
                        'classes' => array('content' => ''),
                        'content' => '<span class="menu-section fs-5 fw-bolder ps-1 py-1">Produkte</span>',
                    ),

                    array(
                        'title' => 'Übersicht',
                        'path' => 'admin/products',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Orders
        'orders' => array(
            "breadcrumb-title" => "Bestellungen",
            "icon" => '<i class="bi bi-cart fs-2x"></i>',
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
            "arrow" => false,
            "sub" => array(
                "class" => "menu-sub-dropdown w-225px px-1 py-4",
                "items" => array(
                    array(
                        'classes' => array('content' => ''),
                        'content' => '<span class="menu-section fs-5 fw-bolder ps-1 py-1">Bestellungen</span>',
                    ),

                    array(
                        'title' => 'Übersicht',
                        'path' => 'admin/orders',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Bookings
        'bookings' => array(
            "breadcrumb-title" => "Buchungen",
            "icon" => '<i class="bi bi-calendar-check fs-2x"></i>',
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
            "arrow" => false,
            "sub" => array(
                "class" => "menu-sub-dropdown w-225px px-1 py-4",
                "items" => array(
                    array(
                        'classes' => array('content' => ''),
                        'content' => '<span class="menu-section fs-5 fw-bolder ps-1 py-1">Buchungen</span>',
                    ),

                    array(
                        'title' => 'Kalender',
                        'path' => 'admin/bookings',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Services
        'services' => array(
            "breadcrumb-title" => "Dienstleistungen",
            "icon" => '<i class="bi bi-briefcase fs-2x"></i>',
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
            "arrow" => false,
            "sub" => array(
                "class" => "menu-sub-dropdown w-225px px-1 py-4",
                "items" => array(
                    array(
                        'classes' => array('content' => ''),
                        'content' => '<span class="menu-section fs-5 fw-bolder ps-1 py-1">Dienstleistungen</span>',
                    ),

                    array(
                        'title' => 'Übersicht',
                        'path' => 'admin/services',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'Neu erstellen',
                        'path' => 'admin/services/create',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),
    ),
);
