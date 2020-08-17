<template>
    <div>

        <div class="container-fluid">
            <div class="row pt-2 pb-2">
                    <div class="col-12">
                        <h2 class="mt-2 mb-0 text-centertext-uppercase">
                            I più venduti
                        </h2>
                    </div>
            </div>
        </div> 

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- :scrollPerPage="true" :perPageCustom="[[480, 2], [768, 3]]" -->
                    <carousel :perPageCustom="[[768, 3], [1024, 4]]" paginationActiveColor="#ef0000" paginationColor="#ccc" :paginationPadding="3" :paginationSize="8" :paginationEnabled="false">
                        <template v-for="item in products" v-if="item.id_category == 1">
                            <slide class="padding">
                                    <a href="#" class="contentimg" @click.prevent="pushCatalog(item.id_presentation, item.id_category)">
                                        <img class="rounded imgproduct img-fluid" :src="root_origin+'/imagenes/assets/imagenes/products/'+item.image" alt="">
                                    </a>
                                    <a href="#" @click.prevent="pushCatalog(item.id_presentation, item.id_category)" class=""><h6 class="mt-1 text-capitalize">{{item.title}}</h6></a>
                                    <!--<p class="text-white">{{item.description}}</p>
                                    <p class="text-white lead">{{item.price}} €</p> -->
                            </slide>
                        </template>
                    </carousel>
                </div>
            </div>
        </div> 
    </div>
</template>
<style scoped>
    .padding{
        padding: 0.3rem;
    }
    .rounded {
        border-radius: .5rem!important;
    }
    
</style>
<script>
    export default {
        data(){
           return{
                root_origin:null,
                monto_delivery:30.00,
                templates:[],
                orden_secundario:[],
                id_presentation:this.$route.params.idpresent,
                id_category:this.$route.params.idcateg,
                list_category:[
                    {
                        id:1,
                        name:'PASTICCERIA',
                    },
                    {
                        id:2,
                        name:'GASTRONOMIA',
                    },
                    {
                        id:3,
                        name:'GELATO',
                    },
                ],
                list_presentation:[
                    {
                        id:1,
                        name:'DELIVERY',
                    },
                    {
                        id:2,
                        name:'STORE',
                    }
                ],
                products:[
                     {
                        id:1,
                        title: 'Cannolo',
                        description:'pistacchio-nocciola-tradizonale-limone',
                        price:'1',
                        image:'3837619-OrangeCannoli-1080.jpg',
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:2,
                        title: 'setteveli',
                        description:'pistacchio-cioccolato',
                        price:'1',
                        image:'torta2.jpg',
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:3,
                        title: 'chescake',
                        description:'',
                        price:'1',
                        image:'IMG_6054-6.jpg',
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:5,
                        title: 'mousse forma',
                        description:'fragola-mela-mandarino',
                        price:'1',
                        image:'espumamandarina.jpg',
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:4,
                        title: 'giardino di frutta',
                        description:'',
                        price:'1',
                        image:'IMG_1393.jpg',
                        id_category: 1,
                        id_presentation:1
                     },
                     
                     {
                        id:6,
                        title: 'rocher',
                        description:'',
                        price:'1',
                        image:'receta-tarta-ferrero-rocher-640x480.jpg',
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:7,
                        title: 'sfoglie da banco',
                        description:'',
                        price:'1',
                        image:'ovetti-di-sfoglia-ripieni-due.jpg',
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:11,
                        title: 'dessert di burro',
                        description:'',
                        price:'1',
                        image:'maxresdefault.jpg',
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:8,
                        title: 'dessert di mandorla',
                        description:'',
                        price:'1',
                        image:'hd650x433_wm.jpg',
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:9,
                        title: 'paste frolle da banco',
                        description:'',
                        price:'1',
                        image:'biscotti-senza-farina-3.jpg',
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:10,
                        title: 'tiramisu',
                        description:'',
                        price:'1',
                        image:'torta2.jpg',
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:12,
                        title: 'biscotti da the',
                        description:'',
                        price:'1',
                        image:'31936080_1127498927405515_3739091389938401280_n.jpg',
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:13,
                        title: 'gelato',
                        description:"",
                        price:'1',
                        image:"gelato.jpg",
                        id_category: 3,
                        id_presentation:1
                     },
                     {
                        id:14,
                        title: 'granite',
                        description:'limone-fragola',
                        price:'1',
                        image:"granita-limone-menta-2.jpg",
                        id_category: 3,
                        id_presentation:1
                     },

                     {
                        id: 15,
                        title: 'arancina',
                        description:"ragu'-prosciutto-cacio pepe e cozze-spinaci",
                        price:'1',
                        image:'arancina.jpg',
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 16,
                        title: 'papillon',
                        description:'salmone-spinaci-mozarella',
                        price:'1',
                        image:'papillon.jpeg',
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 17,
                        title: 'calzone',
                        description:'forno-fritto',
                        price:'1',
                        image:'calzone.jpg',
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 18,
                        title: 'iris',
                        description:'forno fritta',
                        price:'1',
                        image:'iris.jpg',
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 19,
                        title: 'pizzotto',
                        description:'crudo-filadelfia e pomodorini',
                        price:'1',
                        image:'pizzotto.jpg',
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 20,
                        title: 'rollò al wurstel',
                        description:'',
                        price:'1',
                        image:'rollo-al-wurstel.jpg',
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 21,
                        title: 'ciambella',
                        description:'',
                        price:'1',
                        image:'ciambella.jpg',
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 22,
                        title: 'krapfen',
                        description:'nutella e pistacchio-nocciola-crema pasticcera-marmellata albicocca',
                        price:'1',
                        image:'krapfen.jpg',
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 23,
                        title: 'crostino',
                        description:'',
                        price:'1',
                        image:'crostino.jpg',
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 24,
                        title: 'spiedino',
                        description:'',
                        price:'1',
                        image:'spiedino.jpg',
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 25,
                        title: 'panzertotto',
                        description:'bakon e emmental',
                        price:'1',
                        image:'panzertotto.jpg',
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 26,
                        title: 'pizzetta ',
                        description:'classica-parmigiana',
                        price:'1',
                        image:'pizzetta.jpg',
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 27,
                        title: 'ravazzata frono',
                        description:'',
                        price:'1',
                        image:'ravazzata.jpg',
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 28,
                        title: 'ravazzata fritta',
                        description:'',
                        price:'1',
                        image:'ravazzata-frita.jpg',
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 29,
                        title: 'mezzaluna',
                        description:'mortadella e ricotta fresca-pistacchio',
                        price:'1',
                        image:'mezzaluna.jpg',
                        id_category: 2,
                        id_presentation: 1
                    }, 
                    {
                        id: 30,
                        title: 'ravazzata frono',
                        description:'',
                        price:'1',
                        image:'ravazzata.jpg',
                        id_category: 1,
                        id_presentation: 2
                    },
                    {
                        id: 31,
                        title: 'ravazzata fritta',
                        description:'',
                        price:'1',
                        image:'ravazzata-frita.jpg',
                        id_category: 2,
                        id_presentation: 2
                    },
                    {
                        id: 32,
                        title: 'mezzaluna',
                        description:'mortadella e ricotta fresca-pistacchio',
                        price:'1',
                        image:'mezzaluna.jpg',
                        id_category: 3,
                        id_presentation: 2
                    },                                       
                ],

            }
        },
        mounted(){
            this.root_origin=window.location.origin;
        },
        methods:{
            pushCatalog(id_presentation, id_category){
              this.$router.push('/catalog/'+id_presentation+'/'+id_category);
              
            },
        }
    }
</script>


