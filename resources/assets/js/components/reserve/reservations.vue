<template>
    <div>
        

        <!-- Retornamos a la ultima vista -->
        <returnback></returnback>
    
        <div class="container-fluid mt-3 pb-1">
            <div class="row">
                <div class="col-12 align-self-center">
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 header-contact d-flex justify-content-center align-items-center">
                    <h2 class="text-white text-uppercase text-center m-0">Reserve our services below</h2>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-light pt-3 pb-3">
            <div class="row">
                <div class="col-12">
                    <p>
                        To reserv a service, you only have to fill
                        in the form fields below. Zu'Pietru  has
                        services such as : catering, brevery
                        and private events, but if you have a 
                        particular request, do not hesitate to ask us
                    </p>
                    <p>
                        We are at your service.
                    </p>
                </div>

                <div class="col-12 mt-5">
                        <form action="">
                                <div class="form-group">
                                    <label class="mb-0">First Name</label>
                                    <input type="text" class="form-control form-material" placeholder="Add your name">
                                </div>
                                <div class="form-group">
                                    <label class="mb-0">Phone</label>
                                    <input type="tel" class="form-control form-material" placeholder="Add your phone number">
                                </div>
                                <div class="form-group">
                                    <label class="mb-0">Date</label>
                                    <input type="text" class="form-control form-material" placeholder="Select a date for the reservation">
                                </div>
                                <div class="form-group">
                                    <label class="mb-0">Hour</label>
                                    <input type="text" class="form-control form-material" placeholder="Select an hour for the reservation">
                                </div>
                                <div class="form-group">
                                    <label class="mb-0">Email</label>
                                    <input type="text" class="form-control form-material" placeholder="Add your Email">
                                </div>
                                <div class="form-group">
                                    <label class="mb-0">Message</label>
                                    <textarea rows="3" class="form-control form-material" placeholder="Specify your reservation"></textarea>
                                </div>
            
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-danger btn-block btn-lg">
                                        Submit
                                    </button>
                                </div>
            
            
                            </form>
                </div>
            </div>
        </div>
    </div>
</template>
