<template>
    <div>
        
        <!-- Retornamos a la ultima vista -->
        <returnback></returnback>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="mt-3 text-uppercase">
                    Crea la tua account
                </h2>
                <form action="">
                    <div class="form-group">
                        <label class="mb-0">Primo nome</label>
                        <input type="text" class="form-control form-material" placeholder="Pedro Elias">
                    </div>
                    <div class="form-group">
                        <label class="mb-0">Cognome</label>
                        <input type="text" class="form-control form-material" placeholder="Gonzalez Matos">
                    </div>
                    <div class="form-group">
                        <label class="mb-0">Email</label>
                        <input type="text" class="form-control form-material" placeholder="pedro.gonzalez@jumperr.com">
                    </div>
                    <div class="form-group">
                        <label class="mb-0">Telefono</label>
                        <input type="tel" class="form-control form-material" placeholder="555-55">
                    </div>
                    <div class="form-group">
                        <label class="mb-0">Password attuale</label>
                        <input type="password" class="form-control form-material" placeholder="Os*1w-m.">
                    </div>
                    <div class="form-group">
                        <label class="mb-0">Nuova Password</label>
                        <input type="password" class="form-control form-material" placeholder="Os*1w-m.">
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-danger btn-block btn-lg">
                            Salva
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
    </div>
</template>
