<!--begin::Header-->
<div class="landing-header card card-flush container fixed z-index-3 p-0 justify-content-center" data-kt-sticky="true"
    data-kt-sticky-name="landing-header" data-kt-sticky-top="10px">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Wrapper-->
        <div class="d-flex align-items-center justify-content-between">
            <!--begin::Logo-->
            <div class="d-flex align-items-center flex-equal justify-content-between">
                <!--begin::Mobile menu toggle-->
                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
                    <i class="ki-duotone ki-abstract-14 fs-2hx">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </button>
                <!--end::Mobile menu toggle-->
                <!--begin::Logo image-->
                <a href="{{ route('home') }}">
                    <img alt="Logo" src="{{ asset(theme()->getMediaUrlPath() . 'logos/landing.png') }}"
                        class="logo-default h-70px h-lg-70px" />
                    <img alt="Logo" src="{{ asset(theme()->getMediaUrlPath() . 'logos/landing.png') }}"
                        class="logo-sticky h-70px h-lg-100px" />
                </a>
                <!--end::Logo image-->

                <!--begin::Toolbar-->
                <div class="me-3 d-flex d-lg-none">
                    @auth
                        <!--begin::User menu-->
                        <div class="d-flex align-items-center">
                            <div class="position-relative">
                                <button class="btn btn-gradient-dark dropdown-toggle" type="button" id="userDropdownMobile"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="display-none">
                                        {!! theme()->getIcon('user', 'fs-1 text-white') !!}
                                    </span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdownMobile">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                            <i class="ki-duotone ki-profile-user fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <span>Mein Profil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('course') }}">
                                            <i class="ki-duotone ki-basket fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <span>Meine Bestellungen</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('course') }}">
                                            <i class="ki-duotone ki-book fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <span>Meine Kurse</span>
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                                            <i class="ki-duotone ki-exit fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <span>Abmelden</span>
                                        </a>
                                        <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--end::User menu-->
                    @else
                        <a href="{{ route('login') }}" class="btn btn-gradient-dark">
                            <span class="display-none">
                                {!! theme()->getIcon('user', 'fs-1 text-white') !!}
                            </span>
                        </a>
                    @endauth
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Logo-->
            <!--begin::Menu wrapper-->
            <div class="d-lg-block" id="kt_header_nav_wrapper">
                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                    <!--begin::Menu-->
                    <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-semibold"
                        id="kt_landing_menu">
                        <!--begin::Menu item-->
                        <div class="menu-item mx-2">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link btn btn-active-light-primary py-3 px-4 {{ url()->current() == route('home') ? 'active' : '' }}"
                                href="{{ route('home') }}" data-kt-scroll-toggle="true"
                                data-kt-drawer-dismiss="true">Startseite</a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mx-2">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link btn btn-active-light-primary py-3 px-4 {{ url()->current() == route('about') ? 'active' : '' }}"
                                href="{{ route('about') }}" data-kt-scroll-toggle="true"
                                data-kt-drawer-dismiss="true">Über
                                mich</a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mx-2">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link btn btn-active-light-primary py-3 px-4 {{ url()->current() == route('medien') ? 'active' : '' }}"
                                href="{{ route('medien') }}" data-kt-scroll-toggle="true"
                                data-kt-drawer-dismiss="true">Medien & Partner</a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mx-2">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link btn btn-active-light-primary py-3 px-4 {{ url()->current() == route('services') ? 'active' : '' }}"
                                href="{{ route('services') }}" data-kt-scroll-toggle="true"
                                data-kt-drawer-dismiss="true">Dienstleistungen</a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mx-2">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link btn btn-active-light-primary py-3 px-4 {{ url()->current() == route('prices') ? 'active' : '' }}"
                                href="{{ route('prices') }}" data-kt-scroll-toggle="true"
                                data-kt-drawer-dismiss="true">Preise</a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mx-2">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link btn btn-active-light-primary py-3 px-4 {{ url()->current() == route('course') ? 'active' : '' }}"
                                href="{{ route('course') }}" data-kt-scroll-toggle="true"
                                data-kt-drawer-dismiss="true">Online
                                Kurse</a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mx-2">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link btn btn-active-light-primary py-3 px-4 {{ url()->current() == route('shop.index') ? 'active' : '' }}"
                                href="{{ route('shop.index') }}" data-kt-scroll-toggle="true"
                                data-kt-drawer-dismiss="true">Online
                                Shop</a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mx-2">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link btn btn-active-light-primary py-3 px-4 {{ url()->current() == route('contact') ? 'active' : '' }}"
                                href="{{ route('contact') }}" data-kt-scroll-toggle="true"
                                data-kt-drawer-dismiss="true">Kontakt</a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
            </div>
            <!--end::Menu wrapper-->

            <!--begin::Toolbar-->
            <div class="flex-equal text-end ms-1 me-3 d-none d-lg-flex">
                @auth
                    <!--begin::User menu-->
                    <div class="d-flex align-items-center">
                        <div class="position-relative">
                            <button class="btn btn-gradient-dark dropdown-toggle" type="button" id="userDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span>{{ Auth::user()->name }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="ki-duotone ki-profile-user fs-2 me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <span>Mein Profil</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('account.orders') }}">
                                        <i class="ki-duotone ki-book fs-2 me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <span>Meine Orders</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('course') }}">
                                        <i class="ki-duotone ki-teacher fs-2 me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <span>Meine Kurse</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('cart.index') }}" class="dropdown-item">
                                        <i class="ki-duotone ki-handcart fs-2 me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Shopping Cart
                                        <span class="badge bg-primary rounded-pill ms-2 cart-count">{{ Cart::count() }}</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="ki-duotone ki-exit fs-2 me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <span>Abmelden</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end::User menu-->
                @else
                    <a href="{{ route('login') }}" class="btn btn-gradient-dark">
                        <span>Einloggen</span>
                    </a>
                @endauth
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
