<div class="bg-white shadow md:sticky md:top-0 fixed bottom-0 w-full z-10">
    <div class="md:max-w-7xl mx-auto md:px-6 lg:px-8">
        <div class="md:flex grid grid-cols-4 h-14 items-center">
            <a  :class="{'bg-gray-500 text-white': active == 'inicio'}" @click="active='inicio'"
                class="active leading-tight h-14 px-3 flex items-center  hover:bg-gray-300 hover:text-white duration-500 transition-all"
                href="#inicio">
                <i class=" mr-1 fas fa-home"></i>
            Inicio</a>

            <a  :class="{'bg-gray-500 text-white': active == 'instalaciones'}"  @click="active='instalaciones'"
            class="leading-tight h-14 px-3 flex items-center hover:bg-gray-300 hover:text-white duration-500 transition-all"
            href="#instalaciones">
                <i class=" mr-1 fas fa-location-arrow"></i>
            Instalaciones</a>

            <a  :class="{'bg-gray-500 text-white': active == 'restaurante'}"   @click="active='restaurante'"
            class="leading-tight h-14 px-3 flex items-center hover:bg-gray-300 hover:text-white  duration-500 transition-all"
            href="#restaurante">
                <i class=" mr-1 fas fa-utensils"></i>
            Restaurante</a>

            <a  :class="{'bg-gray-500 text-white': active == 'contacto'}"  @click="active='contacto'"
            class="leading-tight h-14 px-3 flex items-center hover:bg-gray-300 hover:text-white duration-500 transition-all"
            href="#contacto">
                <i class="mr-1 fas fa-address-book"></i>
            Contacto</a>

        </div>
    </div>
</div>
