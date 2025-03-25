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
            <div class="mt-5 position-relative" id="home">
                @include('layout.landing._header')
            </div>
            <!--end::Header Section-->
            {{ $slot }}
            @include('layout.landing._footer')
        </div>
        <!--end::Root-->

        @if (theme()->getOption('layout', 'scrolltop/display') === true)
            {{ theme()->getView('layout/_scrolltop') }}
        @endif
    @endif
    <!--end::Main-->
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('plugins/custom/typedjs/typedjs.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/custom/aos/aos.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom/landing.js') }}"></script>
@endsection
