<template>
   <section>
        <div class="black-title p-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center m-0 text-white">
                            <img class="ml-2 mr-1" src="imagenes/assets/iconos/cupcake-icon-red.png" alt="">
                            La Nostra Galleria
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <template v-for="(item,key) in products">
                      <li data-target="#carouselExampleIndicators" :data-slide-to="key" :class="active(key)"></li>
                  </template>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-inner">
                          <div class="carousel-item" :class="active(key)"  v-for="(item,key) in products">
                            <img class="d-block w-100" :src="'imagenes/assets/imagenes/'+item.image" alt="">
                          </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>     
        </div>
    </section>
</template>
<script>
    export default {
        data(){
            return{
                products:[
                    {
                        'id':1,
                        'image':'dessert.jpg',
                    },
                    {
                        'id':2,
                        'image':'dessert1.jpg',
                    },
                    {
                        'id':3,
                        'image':'dessert2.jpg',
                    },
                    {
                        'id':4,
                        'image':'dessert3.jpg',
                    },
                    {
                        'id':5,
                        'image':'dessert4.jpg',
                    },
                    {
                        'id':6,
                        'image':'dessert5.jpg',
                    }
                ]
            }
        },
        mounted(){

        },
        methods:{
            active(key){
                if(key==0){
                    return 'active';
                }
            }
        }
    }
</script>