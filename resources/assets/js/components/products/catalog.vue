<template>
	<div>
    <!-- Retornamos a la ultima vista -->
    <returnback></returnback>


	    <div class="products w-100">
        <!--  :scrollPerPage="true" :perPageCustom="[[480, 2], [768, 3]]" -->
          <!-- <carousel  >
              <template v-for="item in products">
                  <slide>
                    <img class="rounded img-fluid" :src="'imagenes/assets/imagenes/products/'+item.image" alt="">
                  </slide>
              </template>
            </carousel> -->
        </div>
      <div class="alert alert-info m-2 alert-delivery" v-show="id_presentation!=2">
          Importo minimo per la consegna <b>€ {{monto_delivery}}</b>
      </div>
      <div class="alert alert-info m-2 alert-delivery" v-show="id_presentation!=1">
          Ordina adesso i tuoi prodotti, puoi anche pagare comodamente al ritiro in un negozio a tua scelta dalle 2 ore successive all´ordine..</b>
      </div>

        <div class="products w-100 mt-3 mb-4" v-for="item in listTemplates">
            <div class="container-fluid">
                <h4 class="mt-2 mb-2">{{item.title_principal}}</h4>
                <div class="row">
                    <template v-for="detail in item.products" >
                            <div class="col-12 mt-2 mb-1">
                                <div class="row">
                                    <div class="col-6" @click="addCart(detail)">
                                        <h4 class="mb-3 text-capitalize ">{{detail.title}}</h4>
                                        <div class="row">
                                            <div class="col-6">
                                                <a class="btn btn-sm btn-danger text-white mr-auto">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                            </div>
                                            <div class="col-6 text-right">
                                                <span class="d-inline-block">{{parseFloat(detail.price).toFixed(2)}} €</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 align-self-center">
                                        <!-- Boton modal #################################-->
                                        <a class="contentimg" data-toggle="modal" :data-target="'#modal-' + detail.id">
                                            <template v-for="img in detail.image" v-if="img.id == 0">
                                                <img class="rounded img-fluid" :src="root_origin+'/imagenes/assets/imagenes/products/'+img.url" alt="">
                                            </template>
                                            <i class="fas fa-expand-arrows-alt"></i>
                                        </a>


                                        <!-- Contenido modal #############################-->
                                        <div class="modal fade" :id="'modal-' + detail.id" tabindex="-1" role="dialog" :aria-labelledby="'modal-' + detail.id" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-capitalize" id="exampleModalLabel"> {{detail.title}} </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div :id="'carousel' + detail.id" class="carousel slide" data-ride="carousel">
                                                            <div class="carousel-inner">
                                                                <template v-for="img in detail.image">
                                                                    <div class="carousel-item" :class="{ active: img.id == 0 }">
                                                                        <img class="d-block w-100" :src="root_origin+'/imagenes/assets/imagenes/products/'+img.url" alt="">
                                                                    </div>
                                                                </template>
                                                            </div>
                                                            <a class="carousel-control-prev" :href="'#carousel'+ detail.id" role="button" data-slide="prev">
                                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                            <a class="carousel-control-next" :href="'#carousel'+ detail.id" role="button" data-slide="next">
                                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                        </div>
                                                        <div class="info-product">
                                                            <a><h4 class="mt-4 mb-1 text-capitalize ">{{detail.title}}</h4></a>
                                                            <p class="text-small mb-1">{{detail.description}}</p>
                                                        </div>
                                                        <div class="" @click="addCart(detail)">
                                                            <a class="btn btn-sm btn-danger btn-block text-white text-uppercase">
                                                                dettagli
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="hr-full"></div>
                    </template>
                </div>
            </div>
        </div>
	</div>
</template>
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
                        price:'15',
                        image: [
                            { id: 0, url: '3837619-OrangeCannoli-1080.jpg' },
                            { id: 1, url: '3837619-OrangeCannoli-1080.jpg' }
                        ],
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:2,
                        title: 'setteveli',
                        description:'pistacchio-cioccolato',
                        price:'14',
                        image: [
                            {id: 0, url: 'torta2.jpg'},
                            {id: 1, url: 'torta2.jpg'},
                        ],
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:3,
                        title: 'chescake',
                        description:'',
                        price:'1',
                        image: [
                            {id: 0, url: 'IMG_6054-6.jpg'},
                            {id: 1, url: 'IMG_6054-6.jpg'},
                        ],
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:5,
                        title: 'mousse forma',
                        description:'fragola-mela-mandarino',
                        price:'1',
                        image: [
                            {id: 0, url: 'espumamandarina.jpg'},
                            {id: 1, url: 'espumamandarina.jpg'},
                        ],
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:4,
                        title: 'giardino di frutta',
                        description:'',
                        price:'1',
                        image: [
                            {id: 0, url: 'IMG_1393.jpg'},
                            {id: 1, url: 'IMG_1393.jpg'},
                        ],
                        id_category: 1,
                        id_presentation:1
                     },
                     
                     {
                        id:6,
                        title: 'rocher',
                        description:'',
                        price:'1',
                        image: [
                            {id: 0, url: 'receta-tarta-ferrero-rocher-640x480.jpg'},
                            {id: 1, url: 'receta-tarta-ferrero-rocher-640x480.jpg'},
                        ],
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:7,
                        title: 'sfoglie da banco',
                        description:'',
                        price:'1',
                        image: [
                            {id: 0, url: 'ovetti-di-sfoglia-ripieni-due.jpg'},
                            {id: 1, url: 'ovetti-di-sfoglia-ripieni-due.jpg'},
                        ],
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:11,
                        title: 'dessert di burro',
                        description:'',
                        price:'1',
                        image: [
                            {id: 0, url: 'maxresdefault.jpg'},
                            {id: 1, url: 'maxresdefault.jpg'},
                        ],
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:8,
                        title: 'dessert di mandorla',
                        description:'',
                        price:'1',
                        image: [
                            {id: 0, url: 'hd650x433_wm.jpg'},
                            {id: 1, url: 'hd650x433_wm.jpg'},
                        ],
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:9,
                        title: 'paste frolle da banco',
                        description:'',
                        price:'1',
                        image: [
                            {id: 0, url: 'biscotti-senza-farina-3.jpg'},
                            {id: 1, url: 'biscotti-senza-farina-3.jpg'},
                        ],
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:10,
                        title: 'tiramisu',
                        description:'',
                        price:'1',
                        image: [
                            {id: 0, url: 'torta2.jpg'},
                            {id: 1, url: 'torta2.jpg'},
                        ],
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:12,
                        title: 'biscotti da the',
                        description:'',
                        price:'1',
                        image: [
                            {id: 0, url: '31936080_1127498927405515_3739091389938401280_n.jpg'},
                            {id: 1, url: '31936080_1127498927405515_3739091389938401280_n.jpg'},
                        ],
                        id_category: 1,
                        id_presentation:1
                     },
                     {
                        id:13,
                        title: 'gelato',
                        description:"",
                        price:'1',
                        image: [
                            {id: 0, url: 'gelato.jpg'},
                            {id: 1, url: 'gelato.jpg'},
                        ],
                        id_category: 3,
                        id_presentation:1
                     },
                     {
                        id:14,
                        title: 'granite',
                        description:'limone-fragola',
                        price:'1',
                        image: [
                            {id: 0, url: 'granita-limone-menta-2.jpg'},
                            {id: 1, url: 'granita-limone-menta-2.jpg'},
                        ],
                        id_category: 3,
                        id_presentation:2
                     },

                     {
                        id: 15,
                        title: 'arancina',
                        description:"ragu'-prosciutto-cacio pepe e cozze-spinaci",
                        price:'1',
                        image: [
                            {id: 0, url: 'arancina.jpg'},
                            {id: 1, url: 'arancina.jpg'},
                        ],
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 16,
                        title: 'papillon',
                        description:'salmone-spinaci-mozarella',
                        price:'1',
                        image: [
                            {id: 0, url: 'papillon.jpeg'},
                            {id: 1, url: 'papillon.jpeg'},
                        ],
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 17,
                        title: 'calzone',
                        description:'forno-fritto',
                        price:'1',
                        image: [
                            {id: 0, url: 'calzone.jpg'},
                            {id: 1, url: 'calzone.jpg'},
                        ],
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 18,
                        title: 'iris',
                        description:'forno fritta',
                        price:'1',
                        image: [
                            {id: 0, url: 'iris.jpg'},
                            {id: 1, url: 'iris.jpg'},
                        ],
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 19,
                        title: 'pizzotto',
                        description:'crudo-filadelfia e pomodorini',
                        price:'1',
                        image: [
                            {id: 0, url: 'pizzotto.jpg'},
                            {id: 1, url: 'pizzotto.jpg'},
                        ],
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 20,
                        title: 'rollò al wurstel',
                        description:'',
                        price:'1',
                        image: [
                            {id: 0, url: 'rollo-al-wurstel.jpg'},
                            {id: 1, url: 'rollo-al-wurstel.jpg'},
                        ],
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 21,
                        title: 'ciambella',
                        description:'',
                        price:'1',
                        image: [
                            {id: 0, url: 'ciambella.jpg'},
                            {id: 1, url: 'ciambella.jpg'},
                        ],
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 22,
                        title: 'krapfen',
                        description:'nutella e pistacchio-nocciola-crema pasticcera-marmellata albicocca',
                        price:'1',
                        image: [
                            {id: 0, url: 'krapfen.jpg'},
                            {id: 1, url: 'krapfen.jpg'},
                        ],
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 23,
                        title: 'crostino',
                        description:'',
                        price:'1',
                        image: [
                            {id: 0, url: 'crostino.jpg'},
                            {id: 1, url: 'crostino.jpg'},
                        ],
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 24,
                        title: 'spiedino',
                        description:'',
                        price:'1',
                        image: [
                            {id: 0, url: 'spiedino.jpg'},
                            {id: 1, url: 'spiedino.jpg'},
                        ],
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 25,
                        title: 'panzertotto',
                        description:'bakon e emmental',
                        price:'1',
                        image: [
                            {id: 0, url: 'panzertotto.jpg'},
                            {id: 1, url: 'panzertotto.jpg'},
                        ],
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 26,
                        title: 'pizzetta ',
                        description:'classica-parmigiana',
                        price:'1',
                        image: [
                            {id: 0, url: 'pizzetta.jpg'},
                            {id: 1, url: 'pizzetta.jpg'},
                        ],
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 27,
                        title: 'ravazzata frono',
                        description:'',
                        price:'1',
                        image: [
                            {id: 0, url: 'ravazzata.jpg'},
                            {id: 1, url: 'ravazzata.jpg'},
                        ],
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 28,
                        title: 'ravazzata fritta',
                        description:'',
                        price:'1',
                        image: [
                            {id: 0, url: 'ravazzata-frita.jpg'},
                            {id: 1, url: 'ravazzata-frita.jpg'},
                        ],
                        id_category: 2,
                        id_presentation: 1
                    },
                    {
                        id: 29,
                        title: 'mezzaluna',
                        description:'mortadella e ricotta fresca-pistacchio',
                        price:'1',
                        image: [
                            {id: 0, url: 'mezzaluna.jpg'},
                            {id: 1, url: 'mezzaluna.jpg'},
                        ],
                        id_category: 2,
                        id_presentation: 1
                    }, 
                    {
                        id: 30,
                        title: 'ravazzata frono',
                        description:'',
                        price:'1',
                        image: [
                            {id: 0, url: 'ravazzata.jpg'},
                            {id: 1, url: 'ravazzata.jpg'},
                        ],
                        id_category: 1,
                        id_presentation: 2
                    },
                    {
                        id: 31,
                        title: 'ravazzata fritta',
                        description:'',
                        price:'1',
                        image: [
                            {id: 0, url: 'ravazzata-frita.jpg'},
                            {id: 1, url: 'ravazzata-frita.jpg'},
                        ],
                        id_category: 2,
                        id_presentation: 2
                    },
                    {
                        id: 32,
                        title: 'mezzaluna',
                        description:'mortadella e ricotta fresca-pistacchio',
                        price:'1',
                        image: [
                            {id: 0, url: 'mezzaluna.jpg'},
                            {id: 1, url: 'mezzaluna.jpg'},
                        ],
                        id_category: 2,
                        id_presentation: 2
                    },                                       
                ],

            }
                
        },
        mounted(){
            this.root_origin=window.location.origin;
            //condicion para mostrar el mismo catalogo pero segun la presentacion
            if(this.id_presentation==1){ //delivery
                this.templatePrincipal();
                this.templateSecuntadios();
            }else if(this.id_presentation==2){ //store
                 for (var i = 0; i < this.list_category.length; i++) {
                    this.orden_secundario.push(this.list_category[i].id);
                 }
                 this.templateSecuntadios();
            }
            //Necesario para que cada vez que cargamos el componente catalog nos lleve al top 
            let elmnt = document.getElementById("app");
            elmnt.scrollTop = 0;
            
        },
        methods:{
            templatePrincipal(){
                let slf=this;              
                slf.list_category.forEach(function(element) {
                  if(element.id==slf.id_category){
                    slf.getListTemplate(element.name,slf.id_category);
                  }else{
                    slf.orden_secundario.push(element.id);
                  }
                });
            },
            templateSecuntadios(){
                var slf=this;
                for (var i = 0; i < this.orden_secundario.length; i++) {
                    let obj={};  
                    slf.list_category.forEach(function(element) {
                        if(element.id==slf.orden_secundario[i]){
                            obj.title_principal=element.name;
                            obj.products=slf.getTemplateProducts(element.id);
                            slf.templates.push(obj);
                        }
                    });
                }
            },
            addCart(item){ 
              let id=item.id;
              let slf=this;   
              slf.$store.dispatch('setProductSelect',item).then(response => {
                    //slf.$router.push('/detailproduct/'+id);
                    location.href = '/detailproduct/'+id;
              }, error => {
                    reject(error);
              });
            },getListTemplate(title_pricipal,id_subcategory){
               var obj={};
               obj.title_principal=title_pricipal;
               obj.products=this.getTemplateProducts(id_subcategory);
               this.templates.push(obj);
            },getTemplateProducts(id_category){
                var arr=[];
                let slf=this;
                slf.products.forEach(function(element) {
                    if(element.id_presentation==slf.id_presentation){
                        if(element.id_category==id_category){        
                            arr.push(element);
                        }   
                    }  
                });
                return arr;
            }
        },computed:
        {
          listTemplates(){
            return this.templates;  
          }
          
        }
    }
</script>
<style>
    .title_product{
        font-size: 14px!important;
    }
    .text-small{
        font-size: .9rem !important;
    }
    .alert-delivery{
        font-size: 12px!important;
    }
    .fa-expand-arrows-alt{
        position: absolute;
        z-index: 1;
        bottom: 10%;
        right: 15%;
        color: #e13c2e91;
        font-size: 1.4rem;
    }
</style>
