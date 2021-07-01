<?php
$menu = collect([
    ['titulo' => 'Resumen', 'icono' => 'fas fa-chart-line','route' => 'admin.index'], 
    ['titulo' => 'Ventas', 'icono' => 'fas fa-money-check-alt','route' =>'admin.ventas.index'],
    ['titulo' => 'Clientes', 'icono' => 'fas fa-user-tie','route' => 'admin.clientes.index'],
    ['titulo' => 'Estanques', 'icono' => 'fas fa-fish','route' => 'admin.estanques.index']
]); 
?>
<!-- Desktop sidebar -->
<aside x-data="{active:'{{Route::currentRouteName()}}'}" class="z-20 hidden w-64 text-center overflow-y-auto bg-gray-600 lg:block">
    <div class="py-4 block text-white">
        <a class="block text-lg font-bold transition-all duration-500 transform hover:-translate-y-1" href="{{route('home')}}" title="Ir a inicio">
          <i class=" mr-1 fas fa-home"></i>
            Granja Doble T
        </a>
        <ul class="mt-6">
            @foreach ($menu as $m)
                <li :class="{'bg-gray-300 text-black': active == '{{$m['route']}}'}" class="relative hover:bg-gray-100">
                    <a class="py-3 px-3 inline-flex items-center w-full text-sm font-semibold transition-all duration-500 transform hover:translate-x-3 hover:text-black" href="{{route($m['route'])}}">
                        <i class="{{ $m['icono'] }}"></i>
                        <span class="ml-4">{{ $m['titulo'] }}</span>
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
</aside>
<!-- Mobile sidebar -->
<aside class="fixed inset-y-0 z-20 w-64 overflow-y-auto bg-gray-700 text-white lg:hidden" x-show="isSideMenuOpen"
    x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu">
    <div x-data="{active:'{{Route::currentRouteName()}}'}" class="py-4 text-center">
        <a class="block text-lg font-bold duration-500 transform hover:-translate-y-1" href="{{route('home')}}">
          <i class=" mr-1 fas fa-home"></i>
            Granja doble T 
        </a>
        <ul class="mt-6">
          <li class="relative">
            @foreach ($menu as $m)
            <li  class="relative hover:bg-gray-100" :class="{'bg-gray-300 text-black': active == '{{$m['route']}}'}">
                <a class="hover:text-black px-6 py-2 inline-flex items-center w-full text-sm font-semibold transition-all duration-500 transform hover:translate-x-3" href="{{route($m['route'])}}">
                    <i class="{{ $m['icono'] }}"></i>
                    <span class="ml-4">{{ $m['titulo'] }}</span>
                </a>
            </li>
            @endforeach
            <hr class="mx-auto mt-4 mb-2 pb-2" width="90%">
            <img class="mx-auto object-cover w-10 h-10 rounded-full mb-2"
                src="{{ Auth::user()->profile_photo_url }}"
                alt="" aria-hidden="true" />
                
            <li class="relative hover:bg-gray-100" :class="{'bg-gray-300 text-black': active == 'profile.show'}">
                <a class="hover:text-black px-6 py-2 inline-flex items-center w-full text-sm font-semibold transition-all duration-500 transform hover:translate-x-3" 
                href="{{ route('profile.show') }}">
                    <i class="mr-2 fas fa-user-cog"></i>
                    <span>Perfil</span>
                </a>
            </li>
            <li class="relative hover:bg-gray-100">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="hover:text-black px-6 py-2 inline-flex items-center w-full text-sm font-semibold transition-all duration-500 transform hover:translate-x-3" 
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                        <i class="mr-2 fas fa-sign-out-alt"></i>
                        <span>Cerrar Sesión</span>
                    </a>
                </form>
            </li>                              
        </ul>
    </div>
</aside>
