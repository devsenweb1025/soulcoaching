<?php

use App\Core\Adapters\Theme;

return array(
    'demo9-aside' => array(
        // Dashboard
        'dashboard' => array(
            "breadcrumb-title" => "Home",
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
            "path" => "admin/dashboard",
        ),

        // Products
        'products' => array(
            "breadcrumb-title" => "Products",
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
                        'content' => '<span class="menu-section fs-5 fw-bolder ps-1 py-1">Products</span>',
                    ),

                    array(
                        'title' => 'Overview',
                        'path' => 'admin/products',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'Categories',
                        'path' => 'admin/products/categories',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Orders
        'orders' => array(
            "breadcrumb-title" => "Orders",
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
                        'content' => '<span class="menu-section fs-5 fw-bolder ps-1 py-1">Orders</span>',
                    ),

                    array(
                        'title' => 'Overview',
                        'path' => 'admin/orders',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Bookings
        'bookings' => array(
            "breadcrumb-title" => "Bookings",
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
                        'content' => '<span class="menu-section fs-5 fw-bolder ps-1 py-1">Bookings</span>',
                    ),

                    array(
                        'title' => 'Calendar',
                        'path' => 'admin/bookings',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Services
        'services' => array(
            "breadcrumb-title" => "Services",
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
                        'content' => '<span class="menu-section fs-5 fw-bolder ps-1 py-1">Services</span>',
                    ),

                    array(
                        'title' => 'Overview',
                        'path' => 'admin/services',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'Create New',
                        'path' => 'admin/services/create',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),
    ),
);
