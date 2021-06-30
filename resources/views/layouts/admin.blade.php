<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- fontAwesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Alertify - CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Alertify- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    

</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- menu escritorio y movil -->
        @include('layouts.admin.menu')
    
        <div class="flex flex-col flex-1 w-full">
            <!-- parte superior -->
            @include('layouts.admin.header')

            
            <!-- cuerpo/main -->
            <main class="h-full overflow-y-auto mt-4 p-4">
                @yield('content')
            </main>
        </div>
    </div>

    @livewireScripts
    <!-- alertifyjs -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    {{--funcion de data para el layout admin --}}
    
    {{--@if(session('info'))
        <script>
            let mensaje = "{{session('info')}}";
        </script>
        {{ Session::forget('info') }}     
    @else
        <script>
            let mensaje = "";
        </script>
    @endif--}}
    
    <script>
        Livewire.on('confirm', mensaje => {
            alertify.success(mensaje);
        })
    </script>
    <script>
        function data() {
            function getThemeFromLocalStorage() {
                // if user already changed the theme, use it
                if (window.localStorage.getItem('dark')) {
                    return JSON.parse(window.localStorage.getItem('dark'))
                }

                // else return their preferences
                return (
                    !!window.matchMedia &&
                    window.matchMedia('(prefers-color-scheme: dark)').matches
                )
            }

            function setThemeToLocalStorage(value) {
                window.localStorage.setItem('dark', value)
            }

            return {
                dark: getThemeFromLocalStorage(),
                toggleTheme() {
                    this.dark = !this.dark
                    setThemeToLocalStorage(this.dark)
                },
                isSideMenuOpen: false,
                toggleSideMenu() {
                    this.isSideMenuOpen = !this.isSideMenuOpen
                },
                closeSideMenu() {
                    this.isSideMenuOpen = false
                },
                isNotificationsMenuOpen: false,
                toggleNotificationsMenu() {
                    this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
                },
                closeNotificationsMenu() {
                    this.isNotificationsMenuOpen = false
                },
                isProfileMenuOpen: false,
                toggleProfileMenu() {
                    this.isProfileMenuOpen = !this.isProfileMenuOpen
                },
                closeProfileMenu() {
                    this.isProfileMenuOpen = false
                },
                isPagesMenuOpen: false,
                togglePagesMenu() {
                    this.isPagesMenuOpen = !this.isPagesMenuOpen
                },
                // Modal
                isModalOpen: false,
                trapCleanup: null,
                openModal() {
                    this.isModalOpen = true
                    this.trapCleanup = focusTrap(document.querySelector('#modal'))
                },
                closeModal() {
                    this.isModalOpen = false
                    this.trapCleanup()
                },
            }
        }
    </script>

    @stack('js')

</body>

</html>
