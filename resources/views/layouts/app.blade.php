<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <head>
        <link rel="canonical" href="https://https://demo.themesberg.com/Farmland/" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Farmland - Tailwind CSS Landing Page Demo</title>
    
        <!-- Meta SEO -->
        <meta name="title" content="Farmland - Tailwind CSS Landing Page">
        <meta name="description" content="Get started with a free and open-source landing page built with Tailwind CSS and the Flowbite component library.">
        <meta name="robots" content="index, follow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="English">
        <meta name="author" content="Themesberg">
    
        <!-- Social media share -->
        <meta property="og:title" content="Farmland - Tailwind CSS Landing Page">
        <meta property="og:site_name" content="Themesberg">
        <meta property="og:url" content="https://https://demo.themesberg.com/Farmland/">
        <meta property="og:description" content="Get started with a free and open-source landing page for Tailwind CSS built with the Flowbite component library featuring dark mode, hero sections, pricing cards, and more.">
        <meta property="og:type" content="">
        <meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/github/Farmland/og-image.png">
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@themesberg" />
        <meta name="twitter:creator" content="@themesberg" />
    
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <link href="./output.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/output.css') }}">
        <script async defer src="https://buttons.github.io/buttons.js"></script>
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
