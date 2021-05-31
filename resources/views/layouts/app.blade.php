<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- kikiassets --}}
    @include('layouts.kikiassets')


    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>



    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script> --}}

    {{$stylehalaman}}

</head>

<body class="bg-gray-100 f-opensans font-sans antialiased">
    @include('layouts.loaderhalaman')


    {{-- nav atas --}}
    {{ $header }}


    {{ $slot }}


    {{ $footer }}
    {{-- nav bawah --}}


    {{$scripthalaman}}
</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script>
    $(function () {
        // $('#navbarSupportedContent a[href~="' + location.href + '"]').parents('li').addClass('active');
        $('#navbarMobile a[href~="' + location.href + '"]').css("color", "#2a9d43"); //#E5E5E5
        $('#tabTask a[href~="' + location.href + '"]').addClass('border-b-4 border-green-200'); //#E5E5E5
    });
</script>



</html>
