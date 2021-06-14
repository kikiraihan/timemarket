<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv=”Refresh” content=”0;URL=https://www.namawebsite.com”/>

        <title>{{ config('app.name', 'Laravel') }}</title>
        

        {{-- PWA MANIFEST --}}
        <link rel="manifest" href="/manifest.json">
        <link rel="apple-touch-icon" href="assets_kiki/icon_app/icon-192x192.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="white"/>
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Hello World">
        <meta name="msapplication-TileImage" content="assets_kiki/icon_app/icon-192x192.png">
        <meta name="msapplication-TileColor" content="#FFFFFF">
        {{-- PWA end --}}



        {{-- kikiassets --}}
        @include('layouts.kikiassets')
        

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        


        {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script> --}}



    </head>
    <body class="bg-gray-100 f-opensans font-sans antialiased ">
        @include('layouts.loaderhalaman')

        {{ $slot }}
        {{-- <div class="font-sans text-gray-900 antialiased">
        </div> --}}
    </body>

    {{-- <script>
        {{$scripthalaman}}
    </script> --}}
</html>
