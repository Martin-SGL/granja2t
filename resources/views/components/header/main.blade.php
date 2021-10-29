<nav id="inicio" x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto py-2 px-8">
        <div class="w-full flex">
            <!-- Logo  y titutlo-->
            <div class="flex items-center w-3/6">
                <img src="{{ asset('img/1.jpg') }}" width="70px">
                <div class="mt-2 italic text-lg font-bold text-red-500">Granja Doble T</div>
            </div>
            <!-- inicio de sesión -->
            <div class="flex items-center w-3/6 justify-end">
                <div class="flex items-center ml-2 mt-2 transition-all duration-500 md:border-b-4 hover:border-transparent transform hover:-translate-y-1 cursor-pointer">
                    @if (Auth::check())
                        <a class="flex ml-2" href="{{ route('login') }}" class="text-sm text-gray-700">
                            <i class="far fa-user mr-2 mt-1"></i>
                            <span class="hidden md:flex">
                                {{ auth()->user()->name }}
                            </span>
                        </a>
                    @else
                        <a class="flex text-xs" href="{{ route('login') }}">
                            <i class="far fa-user mr-2"></i>
                            <span class="hidden md:flex">
                                Iniciar sesión
                            </span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
