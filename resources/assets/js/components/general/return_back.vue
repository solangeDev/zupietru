<template>
    <div>
        <div class="container-fluid bg-red pt-1 pb-1" @click="$router.go(-1)">
            <div class="row">
                <div class="col-2 text-white align-self-center">
                    <i class="fas fa-angle-left"></i>
                </div>
                <div class="col-8 text-center">
                    <span class="text-white lead">Indietro</span>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
    .bg-red{
        background-color: #e11616;
    }
</style>

