<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Granja | Doble T</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- fontAwesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <style>
            html{
            scroll-behavior: smooth; 
            }
        </style>
    </head>
    <body class="font-sans antialiased">

        <!--<div class="min-h-screen bg-gray-100">-->
        <div class="bg-gray-100" 
            x-data="{active:'inicio'}" 
            @scroll.window="active = document.querySelector('#producto').getBoundingClientRect().top <= 300 ? 'producto' : 
            (document.querySelector('#restaurante').getBoundingClientRect().top <= 300 ? 'restaurante': 
            (document.querySelector('#instalaciones').getBoundingClientRect().top <= 300 ? 'instalaciones' : 'inicio'))">
            <x-header.main/>
            <x-header.menu/>
            <!-- Page Content -->
            <main>
                <x-main.inicio/>
                <x-main.instalaciones/>
                <x-main.restaurante/>
                <x-main.producto/>
            </main>
        </div>

        @stack('modals')
    </body>
</html>
