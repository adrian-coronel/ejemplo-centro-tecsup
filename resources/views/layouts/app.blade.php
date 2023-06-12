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
        {{-- FONT ICONS --}}
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        {{-- Alpine JS --}}
        <script src="//unpkg.com/alpinejs" defer></script>
        

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            {{-- @livewire('navigation-menu') --}}
            {{-- @include('includes.nav') --}}
            @include('includes.lateral-menu')
            <!-- Page Heading -->
            @if (View::exists('includes.nav'))
                <header class="d-flex bg-white shadow py-3 align-items-center">
                    <div class="ml-4 bg-white shadow-md py-1 rounded elemento-beat" style="width:40px;">
                        <svg style="width: 20px;" class="navbar-toggler mx-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" xmlns="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                    </div>

                    <div class="container">
                        <div class="d-flex ">
                            <x-b-nav-link href="{{route('dashboard')}}" class="{{request()->is('dashboard') ? 'border-b-2 border-indigo-400' : ''}}">Home</x-b-nav-link>
                            <x-b-nav-link href="{{route('services.index')}}" class="{{request()->is('services') ? 'border-b-2 border-indigo-400' : ''}}">Servicios</x-b-nav-link>
                            <x-b-nav-link href="{{route('incidents.index')}}" class="{{request()->is('incidents') ? 'border-b-2 border-indigo-400' : ''}}">Incidentes</x-b-nav-link>
                        </div>
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
