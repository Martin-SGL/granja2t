<div id='restaurante' class="lg:h-screen w-full flex flex-col items-center text-center pb-5 lg:mb-0 lg:pt-10">
    <div class="grid grid-cols-1 lg:grid-cols-2 content-center gap-x-3 gap-y-3 items-center w-11/12 mx-auto px-2 sm:px-6 lg:px-8" style="margin-top: 50px;">
       <div class="w-full  flex flex-col  justify-center mt-5 md:mt-0 mb-2">
            <div class="text-sm italic font-bold">Deletita tu paladar con nuestros platillos
                <button class="bg-blue-500 px-2 rounded-lg text-white text-bold hover:bg-blue-300"> Ver menu</button></div>
            <div class="rounded-xl overflow-hidden mt-2 shadow-xl">
                <x-carrousels.c_restaurante/>
            </div>
        </div>
        <div class="w-full  flex flex-col  justify-center mt-5 md:mt-0 mb-2">
            <div class="text-sm italic font-bold">Area de juegos y salón de fiestas</div>
            <div class="rounded-xl overflow-hidden mt-2 shadow-xl">
                <x-carrousels.c_juegos/>
            </div>
        </div>
   </div>
</div>
