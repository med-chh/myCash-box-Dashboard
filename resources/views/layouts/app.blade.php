<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'myCash-box') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        @paddleJS
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Breadcrumbs-->
            <header class="shadow">
                <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ Breadcrumbs::render() }}
                </div>
            </header>
             <!-- Page Heading -->
            @if (isset($header))
            <header>
                <div class="mx-auto  px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class=" mx-auto sm:px-6 lg:px-8">
                        {{ $slot }}

                    </div>
                </div>
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
