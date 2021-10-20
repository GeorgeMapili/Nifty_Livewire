<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/main.css') }}">
        @trixassets
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ mix('js/main.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">

        <div id="container" class="effect aside-float aside-bright mainnav-lg">
        
            @include('structure.navbar_nifty');
    
            <div class="boxed">
    
                @yield('content')
    
            </div>
    
            @include('structure.footer')
            @include('structure.scroll_page_nifty')
    
        </div>

        @livewireScripts
    </body>
</html>
