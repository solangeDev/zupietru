<template>
    <div>
        <!-- Retornamos a la ultima vista -->
        <returnback></returnback>
    
    <div class="container-fluid pt-1 pb-1">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-uppercase mt-4">Contattaci</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 header-contact d-flex justify-content-center align-items-center">
                <h2 class="text-white text-uppercase text-center m-0">Zu'Pietru sulle reti sociali</h2>
            </div>
        </div>
    </div>


    <!-- CONTACT REDES SOCIALES -->

    <div class="container-fluid bg-light">
        <div class="row post mt-2 mb-3">
            <div class="col-12 mt-1 mb-1">
                <h3 class="text-center text-uppercase lead text-red">Seguici</h3>
            </div>
            <div class="col-12 d-flex justify-content-center align-item-center">
                <a href="#" class="font-icons-social text-center">
                    <i class="fab fa-facebook"></i>
                    <span class="font-weight-bold">Zu'Pietru</span>
                </a>
                <a href="#" class="font-icons-social text-center">
                    <i class="fab fa-twitter-square"></i>
                    <span class="font-weight-bold">@ZuPietru</span>
                </a>
                <a href="#" >
                       
                </a>
                <a href="#" class="font-icons-social text-center">
                        <i class="fab fa-youtube"></i>
                        <span class="font-weight-bold">Zu'Pietru</span>
                </a>
            </div>

        </div>

    </div>

    <!-- CONTACTO NUMERO DE TELEFONO -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 contact-numbers d-flex justify-content-center align-items-center">
                <h2 class="text-white text-uppercase text-center m-0">Numeri Di Contatto</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-light">
        <div class="row post mt-2 mb-3 justify-content-center">
            <div class="col-10 mt-1 mb-1">
                <p class="font-weight-light text-center">
                    Potete chiamarci attraverso i seguenti numeri Siamo Disponibili 9:00 am to 5:00pm)
                </p>
                <h3 class="text-center">
                    <a href="tel:3397299634" class="text-uppercase text-red">
                        3397299634
                    </a>
                </h3>
                <h3 class="text-center">
                    <a href="tel:+008976784567" class="text-uppercase text-red">
                        +008976784567
                    </a>
                </h3>
            </div>

        </div>

    </div>


    <!-- CONTACTO SEND MESSEGE -->

    <div class="container-fluid">
            <div class="row">
                <div class="col-12 contact-numbers d-flex justify-content-center align-items-center">
                    <h2 class="text-white text-uppercase text-center m-0">Inviaci una mail</h2>
                </div>
            </div>
        </div>
    
        <div class="container-fluid bg-light">
            <div class="row post mt-2 mb-3 justify-content-center">
                <div class="col-10 mt-1 mb-1">
                    <p class="font-weight-light text-center mb-4">
                        Puoi anche inviare i tuoi dubbi o suggerimenti attraverso il nostro modulo di
                        contatto (saremo in contatto con voi al più presto)
                    </p>
                    <form action="">
                            <div class="form-group">
                                <label class="mb-0">Primo nome</label>
                                <input type="text" class="form-control form-material" placeholder="Primo nome">
                            </div>
                            <div class="form-group">
                                <label class="mb-0">Email</label>
                                <input type="text" class="form-control form-material" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label class="mb-0">Oggetto</label>
                                <input type="text" class="form-control form-material" placeholder="Oggetto">
                            </div>
                            <div class="form-group">
                                <label class="mb-0">Telefono</label>
                                <input type="tel" class="form-control form-material" placeholder="Telefono">
                            </div>
                            <div class="form-group">
                                <label class="mb-0">Messaggio</label>
                                <textarea class="form-control form-material" placeholder="Messaggio" rows="3"></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-danger btn-block btn-lg">
                                    Invia
                                </button>
                            </div>
        
        
                        </form>
                </div>
    
            </div>
    
        </div>


        <!-- CONTACTO GOOGLE MAPS -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 contact-numbers d-flex justify-content-center align-items-center">
                    <h2 class="text-white text-uppercase text-center m-0">Nostra Posizione</h2>
                </div>
            </div>
        </div>
    
        <div class="google-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d48231.14912506808!2d9.457852248836538!3d40.92787350217037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sve!4v1533570752113" frameborder="0" style="border:0; width:100%; height: 100%; " allowfullscreen></iframe>
        </div>

    </div>
    
</template>
