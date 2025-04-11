@extends('base.base')

@section('content')
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid">
                <!--begin::Logo-->
                <div class="text-center">
                    <a href="{{ route('home') }}">
                        <img alt="Logo" src="{{ asset(theme()->getMediaUrlPath() . 'logos/landing.png') }}" class="h-70px">
                    </a>
                </div>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <div class="w-100">
                        {{ $slot }}
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Authentication-->
    </div>
@endsection
