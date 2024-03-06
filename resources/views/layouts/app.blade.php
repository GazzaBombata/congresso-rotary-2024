<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Congresso Rotary') }}</title>
        <link rel="icon" type="image/png" href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.cleanpng.com%2Fpng-rotary-international-rotary-club-of-toronto-clip-a-6307279%2F&psig=AOvVaw2DRXVY5OTbyYQXXJWGMN0S&ust=1709801997033000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCOiPhfii34QDFQAAAAAdAAAAABAS" alt="Rotary Logo">
        
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
