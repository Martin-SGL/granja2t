<div class="bg-white text-xss md:text-xs shadow md:sticky md:top-0 fixed bottom-0 w-full z-10">
    <div class="md:max-w-7xl mx-auto md:px-6 lg:px-8">
        <div class="md:flex grid grid-cols-4 h-9 items-center">
            <a :class="{'bg-gray-500 text-white': active == 'inicio'}" @click="active='inicio'"
                class="active leading-tight h-9 px-3 flex items-center hover:bg-gray-300 hover:text-white duration-500 transition-all"
                href="#inicio">
                <div class="w-full bg-transparent text-center">
                    <i class="mr-1 fas fa-home"></i>
                    <span>Inicio</span>
                </div>
            </a>
            <a :class="{'bg-gray-500 text-white': active == 'instalaciones'}" @click="active='instalaciones'"
                class="leading-tight h-9 px-3 flex items-center hover:bg-gray-300 hover:text-white duration-500 transition-all"
                href="#instalaciones">
                <div class="w-full bg-transparent text-center">
                    <i class=" mr-1 fas fa-location-arrow"></i>
                    Instalaciones
                </div>
            </a>
            <a :class="{'bg-gray-500 text-white': active == 'restaurante'}" @click="active='restaurante'"
                class="leading-tight h-9 px-3 flex items-center hover:bg-gray-300 hover:text-white  duration-500 transition-all"
                href="#restaurante">
                <div class="w-full bg-transparent text-center">
                    <i class=" mr-1 fas fa-utensils"></i>
                    Restaurante
                </div>
            </a>
            <a :class="{'bg-gray-500 text-white': active == 'contacto'}" @click="active='contacto'"
                class="leading-tight h-9 px-3 flex items-center hover:bg-gray-300 hover:text-white duration-500 transition-all"
                href="#contacto">
                <div class="w-full bg-transparent text-center">
                    <i class="mr-1 fas fa-address-book"></i>
                    Contacto
                </div>
            </a>
        </div>
    </div>
</div>
