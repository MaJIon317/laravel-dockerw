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
        <title>{{ $meta_title ?? $title ?? config('settings.meta_title', 'Page Title') }}</title>
        <meta name="description" content="{{ $meta_description ?? config('settings.meta_description', 'Page Description') }}">
        <meta name="keywords" content="{{ $meta_keywords ?? config('settings.meta_keyword', 'Page Keywords') }}">

        <!-- Favicons -->

        <!-- END Favicons -->

        @vite('resources/css/app.css')

        @livewireStyles
    </head>
    <body x-data="{}">
        <x-header />
      
        @livewire('offline')

        <section class="section section--top section--account">
            <div class="container">
                <div class="account">
                    <div class="account__row">
                        <div class="account__left">
                            <div class="account_menu">
                                @livewire('user.menu')
                            </div>
                        </div>
                        <div class="account__right">
                            <div class="account__title">
                                @if(isset($back))
                                    <a href="{{ $back['link'] }}" class="account__title-back btn--dark" wire:navigate>
                                        <svg width="12" height="12">
                                            <use xlink:href="storage/image/sprite.svg#arrow-left"></use>
                                        </svg>
                                    </a>
                                @endif
                                @if(isset($title))
                                    <h1>{!! $title !!}</h1>
                                @endif
                            </div>

                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('partials.footer')

        @vite('resources/js/app.js')
        
        @livewire('modals')

        @livewireScripts
    </body>
</html>