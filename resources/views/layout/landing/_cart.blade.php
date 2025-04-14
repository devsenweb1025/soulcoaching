@auth
    <!--begin::Audio Section-->
    <div class="position-fixed bottom-0 start-0 z-index-3 d-block d-lg-none">
        <a href="{{ route('cart.index') }}" id="cartToggle"
            class="btn btn-icon btn-badge btn-badge-light-primary position-relative bg-primary rounded-circle">
            <!-- Satellite icon (shown when playing) -->
            {!! theme()->getIcon('handcart', 'fs-3tx text-white', 'solid') !!}
            <!-- Muted icon (shown when stopped) -->
            <span class="badge badge-light-primary badge-circle cart-count">{{ Cart::count() }}</span>
        </a>
    </div>
    <!--end::Audio Section-->

    <style>
        #cartToggle {
            left: 14px;
            bottom: 74px;
            width: 54px;
            height: 54px;
        }
    </style>
@endauth
