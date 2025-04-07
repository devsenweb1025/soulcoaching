@extends('base.base')

@section('content')
    @if (theme()->getOption('layout', 'main/type') === 'blank')
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            {{ $slot }}
        </div>
    @else
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root position-relative">
            <!--begin::Header Section-->
            <div class="position-relative" id="home">
                @include('layout.landing._header')
            </div>
            <!--end::Header Section-->
            {{ $slot }}
            @include('layout.landing._footer')
            @include('layout.landing._audio')
        </div>
        <!--end::Root-->

        @if (theme()->getOption('layout', 'scrolltop/display') === true)
            {{ theme()->getView('layout/_scrolltop') }}
        @endif
    @endif
    <!--end::Main-->

@endsection

@section('scripts')
    <script type="text/javascript">
        window.$crisp = [];
        window.CRISP_WEBSITE_ID = "2ee77e75-14f7-4bd0-b969-017a1703fc6b";
        (function() {
            d = document;
            s = d.createElement("script");
            s.src = "https://client.crisp.chat/l.js";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
    </script>
    <script type="text/javascript" src="{{ asset('plugins/custom/typedjs/typedjs.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/custom/aos/aos.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom/landing.js') }}"></script>
    @stack('scripts')
@endsection
