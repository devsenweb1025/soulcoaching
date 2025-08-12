<x-landing-layout>
    @section('title', 'Transformationscoaching in Egnach – Seelenfluesterin')
    @section('description', 'Ganzheitliches Coaching auf 5 Bewusstseinsebenen – finde Klarheit & Balance durch spirituelle Begleitung und Energiearbeit.')
        @include('pages.landing._partials._background')
        @include('pages.landing._partials._hero')
        <div class="position-relative">
            <div class="clouds-4"></div>
            @include('pages.landing._partials._welcome')
            @include('pages.landing._partials._services')
            @include('pages.landing._partials._about')
            @include('pages.landing._partials._whyme')
            @include('pages.landing._partials._reviews')
            @include('pages.landing._partials._faqs')
            @include('pages.landing._partials._newsletter')
        </div>
    </x-landing-layout>
