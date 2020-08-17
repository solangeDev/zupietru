<template>
    <div>

        <div class="position-relative" @click.prevent="pushCatalog()">
                <div class="">
                    <img class="img-fluid" src="imagenes/assets/imagenes/tienda.jpg" alt="">
                </div>
                <div class="w-100 position-mid position-absolute pt-2 pb-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h1 class="m-0 text-white text-center text-uppercase">
                                    prodotti nel negozio
                                </h1>
                                <a class="btn btn-outline-danger btn-lg mt-3 text-white text-uppercase">vedere</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>
</template>
<script>
export default {
    data(){
        return {

        }
    },
    methods:{
        pushCatalog(){
            this.$router.push('/catalog/2/');
            
        },
    }
}
</script>

<style scoped>
    .bg-white-transparent{
        background-color: rgba(255, 255, 255, 0.7);
    }
    .text-red{
        color: #e11616;
    }
    .top-0{
        top:0px !important;
    }
    .position-mid{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
    .vitrina{
        background-image: linear-gradient(to right, rgba(18, 194, 233,.7), rgba(196, 113, 237,.7), rgba(246, 79, 89,.7)), url('/imagenes/assets/imagenes/ice-cream.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 260px;
        -webkit-animation: AnimationName 0s ease infinite;
        -moz-animation: AnimationName 0s ease infinite;
        animation: AnimationName 0s ease infinite;
    }

        @-webkit-keyframes AnimationName {
            0%{background-position:0% 50%}
            50%{background-position:100% 50%}
            100%{background-position:0% 50%}
        }
        @-moz-keyframes AnimationName {
            0%{background-position:0% 50%}
            50%{background-position:100% 50%}
            100%{background-position:0% 50%}
        }
        @keyframes AnimationName { 
            0%{background-position:0% 50%}
            50%{background-position:100% 50%}
            100%{background-position:0% 50%}
        }
</style>
