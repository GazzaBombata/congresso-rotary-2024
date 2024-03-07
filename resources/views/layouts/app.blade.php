<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Congresso Rotary') }}</title>
        <link rel="icon" type="image/png" href="https://brandcenter.rotary.org/-/media/project/rotary/brandcenter/our-brand/brand-elements/rotarymoe-r.png?sc_lang=it-it&hash=36A0923F6434D285CDAE5A8509EBC3AB" alt="Rotary Logo">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased h-full">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="hidden sm:block bg-white shadow">
                    <div class="max-w-7xl mx-auto h-16 px-4">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content --> 
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
