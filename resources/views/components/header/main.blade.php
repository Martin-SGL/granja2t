<nav id="inicio" x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-2 py-2 sm:px-6 lg:px-8">
        <div class="flex h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center">
                    <img src="{{asset('img/1.jpg')}}" width="100px">
                    <div class="w-96 mt-2 italic text-2xl font-bold text-red-500">Granja Doble T</div>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex w-full ">
                    {{--<x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') 
                    </x-jet-nav-link>--}}
                </div>
            </div>
           <!-- login -->
            <div class="sm:flex sm:flex-row-reverse items-center w-full ">
                <div class="hidden sm:flex items-center transition-all duration-500 border-b-4 hover:border-transparent transform hover:-translate-y-1 cursor-pointer">
                    <i class="far fa-user"></i> 
                    <a class="mt-1 ml-2" href="{{ route('login') }}" class="text-sm text-gray-700">Iniciar sesión</a>
                </div>
            </div>
        </div>
    </div>
</nav>
