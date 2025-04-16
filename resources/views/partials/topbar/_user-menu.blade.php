<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <div class="menu-content d-flex align-items-center px-3">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px me-5">
                <img alt="Logo" src="{{ auth()->user()->avatar_url }}"/>
            </div>
            <!--end::Avatar-->

            <!--begin::Username-->
            <div class="d-flex flex-column">
                <div class="fw-bolder d-flex align-items-center fs-5">
                    {{ auth()->user()->name }}
                    <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span>
                </div>
                <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
            </div>
            <!--end::Username-->
        </div>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->

    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="{{ route('admin.products.index') }}" class="menu-link px-5">
            <i class="ki-duotone ki-basket fs-2 me-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            <span class="menu-text">Produkte</span>
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="{{ route('admin.orders.index') }}" class="menu-link px-5">
            <i class="ki-duotone ki-handcart fs-2 me-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            <span class="menu-text">Bestellungen</span>
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="{{ route('admin.bookings.index') }}" class="menu-link px-5">
            <i class="ki-duotone ki-calendar fs-2 me-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            <span class="menu-text">Buchungen</span>
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="{{ route('admin.services.index') }}" class="menu-link px-5">
            <i class="ki-duotone ki-gear fs-2 me-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            <span class="menu-text">Dienstleistungen</span>
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->

    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="#" data-action="{{ route('logout') }}" data-method="post" data-csrf="{{ csrf_token() }}" data-reload="true" class="button-ajax menu-link px-5">
            <i class="ki-duotone ki-exit fs-2 me-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            <span class="menu-text">Abmelden</span>
        </a>
    </div>
    <!--end::Menu item-->

    @if (theme()->isDarkModeEnabled())
        <!--begin::Menu separator-->
        <div class="separator my-2"></div>
        <!--end::Menu separator-->

        <!--begin::Menu item-->
        <div class="menu-item px-5">
            <div class="menu-content px-5">
                <label class="form-check form-switch form-check-custom form-check-solid pulse pulse-success" for="kt_user_menu_dark_mode_toggle">
                    <input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="skin" id="kt_user_menu_dark_mode_toggle" {{ theme()->isDarkMode() ? 'checked' : '' }} data-kt-url="{{ theme()->getPageUrl('', '', theme()->isDarkMode() ? '' : 'dark') }}"/>
                    <span class="pulse-ring ms-n1"></span>

                    <span class="form-check-label text-gray-600 fs-7">
                        {{ __('Dark Mode') }}
                    </span>
                </label>
            </div>
        </div>
        <!--end::Menu item-->
    @endif
</div>
<!--end::Menu-->
