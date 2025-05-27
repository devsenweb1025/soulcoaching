<!DOCTYPE html>
{{--
Product Name: {{ theme()->getOption('product', 'description') }}
Author: KeenThemes
Purchase: {{ theme()->getOption('product', 'purchase') }}
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: {{ theme()->getOption('product', 'license') }}
--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"{!! theme()->printHtmlAttributes('html') !!}
    {{ theme()->printHtmlClasses('html') }}>
{{-- begin::Head --}}

<head>
    <meta charset="utf-8" />
    <title>
        @hasSection('title')
            @yield('title')
        @else
            {{ ucfirst(theme()->getOption('meta', 'title')) }}
        @endif
    </title>
        <meta name="description" property="org:description"
            content="@hasSection('description')@yield('description')@else{{ ucfirst(theme()->getOption('meta', 'description')) }}@endif" />
    <meta name="keywords" content="{{ theme()->getOption('meta', 'keywords') }}" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="{{ getAsset(theme()->getOption('assets', 'favicon')) }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="{{ theme()->getOption('meta', 'google-site-verification') }}" />
    <meta property="org:title" content="@hasSection('title')@yield('title')@else{{ ucfirst(theme()->getOption('meta', 'title')) }}@endif" />
    <meta property="org:url" content="https://www.seelen-fluesterin.ch/"/>
    <base href="https://www.seelen-fluesterin.ch/">
    <script type="text/javascript">     (function(c,l,a,r,i,t,y){         c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};         t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;         y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);     })(window, document, "clarity", "script", "rb6z152s96"); </script>
    <link rel="alternate" hreflang="de-AT" href="https://www.seelenfluesterin.net/">


    {{-- begin::Fonts --}}
    {{ theme()->includeFonts() }}
    {{-- end::Fonts --}}

    @if (theme()->hasVendorFiles('css'))
        {{-- begin::Page Vendor Stylesheets(used by this page) --}}
        @foreach (array_unique(theme()->getVendorFiles('css')) as $file)
            @if (util()->isExternalURL($file))
                <link rel="stylesheet" href="{{ $file }}" />
            @else
                {!! preloadCss(getAsset($file)) !!}
            @endif
        @endforeach
        {{-- end::Page Vendor Stylesheets --}}
    @endif

    @if (theme()->hasOption('page', 'assets/custom/css'))
        {{-- begin::Page Custom Stylesheets(used by this page) --}}
        @foreach (array_unique(theme()->getOption('page', 'assets/custom/css')) as $file)
            {!! preloadCss(getAsset($file)) !!}
        @endforeach
        {{-- end::Page Custom Stylesheets --}}
    @endif

    @if (theme()->hasOption('assets', 'css'))
        {{-- begin::Global Stylesheets Bundle(used by all pages) --}}
        @foreach (array_unique(theme()->getOption('assets', 'css')) as $file)
            @if (strpos($file, 'plugins') !== false)
                {!! preloadCss(getAsset($file)) !!}
            @else
                <link href="{{ getAsset($file) }}" rel="stylesheet" type="text/css" />
            @endif
        @endforeach
        {{-- end::Global Stylesheets Bundle --}}
    @endif

    @yield('styles')
</head>
{{-- end::Head --}}

{{-- begin::Body --}}

<body {!! theme()->printHtmlAttributes('body') !!} {!! theme()->printHtmlClasses('body') !!} {!! theme()->printCssVariables('body') !!} data-kt-name="magentix">

    @yield('content')

    {{-- begin::Javascript --}}
    @if (theme()->hasOption('assets', 'js'))
        {{-- begin::Global Javascript Bundle(used by all pages) --}}
        @foreach (array_unique(theme()->getOption('assets', 'js')) as $file)
            <script src="{{ getAsset($file) }}"></script>
        @endforeach
        {{-- end::Global Javascript Bundle --}}
    @endif

    @if (theme()->hasVendorFiles('js'))
        {{-- begin::Page Vendors Javascript(used by this page) --}}
        @foreach (array_unique(theme()->getVendorFiles('js')) as $file)
            @if (util()->isExternalURL($file))
                <script src="{{ $file }}"></script>
            @else
                <script src="{{ getAsset($file) }}"></script>
            @endif
        @endforeach
        {{-- end::Page Vendors Javascript --}}
    @endif

    @if (theme()->hasOption('page', 'assets/custom/js'))
        {{-- begin::Page Custom Javascript(used by this page) --}}
        @foreach (array_unique(theme()->getOption('page', 'assets/custom/js')) as $file)
            <script src="{{ getAsset($file) }}"></script>
        @endforeach
        {{-- end::Page Custom Javascript --}}
    @endif
    {{-- end::Javascript --}}

    @yield('scripts')
</body>
{{-- end::Body --}}

</html>
