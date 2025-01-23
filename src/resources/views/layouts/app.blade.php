@php
    $lang = str_replace('_', '-', app()->getLocale());
@endphp

<!DOCTYPE html>
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xml:lang="{{ $lang }}" lang="{{ $lang }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="{{ route('home') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $meta_title ?? $title ?? config('settings.meta.home.title', 'Page Title') }}</title>
        <meta name="description" content="{{ $meta_description ?? config('settings.meta.home.description', 'Page Description') }}">
        <meta name="keywords" content="{{ $meta_keywords ?? config('settings.meta.home.keyword', 'Page Keywords') }}">

        <!-- Favicons -->

        <!-- END Favicons -->

        @vite('resources/css/app.css')

        @livewireStyles
    </head>
    <body x-data="{}">
        <x-header />

        @if(isset($title) || isset($breadcrumbs) || isset($back))
            <section class="section section--breadcrumbs">
                <div class="container">
                    @if(isset($back))
                        <a href="{{ $back['link'] }}" class="btn btn--white btn--sm back" wire:navigate>
                            <svg width="16" height="8">
                                <use xlink:href="storage/image/sprite.svg#back"></use>
                            </svg>
                            <span>{{ $back['name'] }}</span>
                        </a>
                    @endif

                    @include('partials.breadcrumbs', [$breadcrumbs ?? []])

                    @if(isset($title))
                        <h1>{!! $title !!}</h1>
                    @endif

                    @if(isset($description))
                        <div class="description">{!! $description !!}</div>
                    @endif
                </div>
            </section>
        @endif

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('toast_success'))
            <div id="toast__success" style="display: none;">
                {{ session('toast_success') }}
            </div>
        @endif

        @livewire('offline')

        {{ $slot }}

        @include('partials.footer')

        @vite('resources/js/app.js')
        
        @livewire('modals')

        @livewireScripts
    </body>
</html>



