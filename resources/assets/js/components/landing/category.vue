<template>
    <section>
        <div id="delivery" class="black-title p-3">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <img class="img-fluid" src="imagenes/assets/iconos/delivery-icon-red.png" alt="">
                    </div>
                    <div class="col-10">
                        <h5 class="m-0 text-white">DELIVERY</h5>
                    </div>
                </div>
            </div>
        </div>
        
        <router-link to="/catalog/1/1">
        <div class="position-relative">
            <div class="">
                <img class="img-fluid" src="imagenes/assets/imagenes/postres.jpg" alt="">
            </div>
            <div class="w-100 bottom-0 position-absolute bg-black-transparent pt-2 pb-2">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <p class="m-0 text-white text-uppercase">
                                <img class="ml-2 mr-1" src="imagenes/assets/iconos/cupcake-icon-red.png" alt="">    
                                Pasticceria
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </router-link>

        <router-link to="/catalog/1/2">
        <div class="position-relative">
                <div class="">
                    <img class="img-fluid" src="imagenes/assets/imagenes/gastronomy.jpg" alt="">
                </div>
                <div class="w-100 bottom-0 position-absolute bg-black-transparent pt-2 pb-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <p class="m-0 text-white text-uppercase">
                                    <img class="ml-2 mr-1" src="imagenes/assets/iconos/icon-pizza-red.png" alt="">    
                                    Gastronomia
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </router-link>

        <router-link to="/catalog/1/3">
        <div class="position-relative">
                <div class="">
                    <img class="img-fluid" src="imagenes/assets/imagenes/helados.jpg" alt="">
                </div>
                <div class="w-100 bottom-0 position-absolute bg-black-transparent pt-2 pb-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <p class="m-0 text-white text-uppercase">
                                    <img class="ml-2 mr-1" src="imagenes/assets/iconos/dulce.png" alt="">    
                                    Gelateria
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </router-link>
</section>
</template>