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

            .carousel-open:checked+.carousel-item {
            position: static;
            opacity: 100;
            }

            .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
            }

            .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
            }

            /*Instalaciones*/
            #carousel-1:checked~.control-1,
            #carousel-2:checked~.control-2,
            #carousel-3:checked~.control-3 {
            display: block;
            }

            #carousel-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
            #carousel-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
            #carousel-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #2b6cb0;
            }

            /*Restaurante*/
            #carousel-r-1:checked~.control-1,
            #carousel-r-2:checked~.control-2,
            #carousel-r-3:checked~.control-3 {
            display: block;
            }

            #carousel-r-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
            #carousel-r-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
            #carousel-r-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #2b6cb0;

            }
            /*Juegos*/
            #carousel-j-1:checked~.control-1,
            #carousel-j-2:checked~.control-2,
            #carousel-j-3:checked~.control-3 {
            display: block;
            }

            #carousel-j-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
            #carousel-j-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
            #carousel-j-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #2b6cb0;
            }

            #medio{
                background: linear-gradient(125deg, #ECFCFF 0%, #ECFCFF 40%, #B2FCFF calc(40% + 1px), #B2FCFF 60%, #5EDFFF calc(60% + 1px), #5EDFFF 72%, #3E64FF calc(72% + 1px), #3E64FF 100%);
            }
        </style>
    </head>
    <body class="font-sans antialiased">

        <!--<div class="min-h-screen bg-gray-100">-->
        <div class="bg-gray-100"
            x-data="{active:'inicio'}"
            @scroll.window="active = document.querySelector('#contacto').getBoundingClientRect().top <= 500 ? 'contacto' :
            (document.querySelector('#restaurante').getBoundingClientRect().top <=300 ? 'restaurante':
            (document.querySelector('#instalaciones').getBoundingClientRect().top <= 300 ? 'instalaciones' : 'inicio'))">
            <x-header.main/>
            <x-header.menu/>
            <!-- Page Content -->
            <main>
                <x-main.inicio/>
                <div id="medio">
                    <x-main.instalaciones/>
                    <x-main.restaurante/>
                </div>
                <x-main.contacto/>
            </main>
        </div>
    </body>
</html>
