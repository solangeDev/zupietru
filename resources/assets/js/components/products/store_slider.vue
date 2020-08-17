<template>
   <div class="products w-100">
        <div class="container-fluid">
            <h4 class="mt-2 mb-2 text-uppercase">Prodotti del negozio</h4>
        </div>
       <!--  :scrollPerPage="true" :perPageCustom="[[480, 2], [768, 3]]" -->
       <carousel  >
          <template v-for="item in products">
              <slide>
                    <a @click="addCar()" >
                        <img class="rounded img-fluid" :src="'imagenes/assets/imagenes/'+item.image" alt="">
                    </a>
                    <a href="#"><h6 class="mt-1">{{item.title}}</h6></a>
                    <p>{{item.description}}</p>
                    <p class="lead">{{item.price}} €</p>
              </slide>
          </template>
        </carousel>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                products:[
                    {
                        'id':1,
                        'title': 'Cannoli Siciliano',
                        'description': 'Stuffed candy mallet of chocolate and fruits',
                        'price':'18,00',
                        'image':'dessert.jpg',
                    },
                    {
                        'id':2,
                        'title': 'Cannoli Siciliano',
                        'description': 'Stuffed candy mallet of chocolate and fruits',
                        'price':'18,00',
                        'image':'dessert1.jpg',
                    },
                    {
                        'id':3,
                        'title': 'Cannoli Siciliano',
                        'description': 'Stuffed candy mallet of chocolate and fruits',
                        'price':'18,00',
                        'image':'dessert2.jpg',
                    },
                    {
                        'id':4,
                        'title': 'Cannoli Siciliano',
                        'description': 'Stuffed candy mallet of chocolate and fruits',
                        'price':'18,00',
                        'image':'dessert3.jpg',
                    },
                    {
                        'id':5,
                        'title': 'Cannoli Siciliano',
                        'description': 'Stuffed candy mallet of chocolate and fruits',
                        'price':'18,00',
                        'image':'dessert4.jpg',
                    },
                    {
                        'id':6,
                        'title': 'Cannoli Siciliano',
                        'description': 'Stuffed candy mallet of chocolate and fruits',
                        'price':'18,00',
                        'image':'dessert5.jpg',
                    }
                ]
            }
        },
        mounted(){

        },
        methods:{
            addCar(){
              this.$router.push('/catalog');
              //this.$router.push('/detailproduct/'+id);   
            },
        }
    }
</script>