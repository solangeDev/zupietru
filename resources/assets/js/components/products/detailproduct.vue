<template>
    <div>
        <div class="position-relative">

            <div class="">
                <img class="img-fluid" :src="root+'/imagenes/assets/imagenes/products/'+product_image" alt="">
            </div>

            <!-- retornamos a la ultima vista @click router -->
            <div class="w-100 bottom-0 position-absolute bg-black-transparent pt-2 pb-2" @click="$router.go(-1)">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <p class="m-0 text-white">
                                <i class="fas fa-angle-left"></i>
                                <img class="ml-2 mr-1" :src="root+'/imagenes/assets/iconos/cupcake-icon-red.png'" alt="">    
                                {{product_name}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- CIERRE DE  <div class="position-relative"> -->
    
        <div class="container-fluid bg-light">
            <div class="row">
                <div class="col-8 mt-3">
                    <h2 class="lead font-weight-bold">{{product_name}}</h2> <!-- Name -->
                    <p>{{product_description}}</p>
                </div>
                <div class="col-4 align-self-center text-right">
                    <span class="font-weight-bold lead">{{amount}} €</span> <!-- Price -->
                </div>

                <div class="col-4 text-center">
                    <span class="d-block font-weight-bold lead mb-2" ref="quantity">{{quantity}}</span> <!-- Cantidad -->
                    <label class="mb-0 lead font-weight-bold">Quantità</label>
                </div>
                <div class="col-8 align-self-end text-right">
                    <button @click="AddCant('mas')" class="btn btn-sm btn-danger">
                    <i class="fas fa-plus"></i>
                    </button>
                    <button @click="AddCant('menos')" class="btn btn-sm btn-danger">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>                        
            </div>
            <div class="row">
              <div class="col-12">
                <label for="">Comentario</label>
                <textarea name="" v:model="comentario" placeholder="Comentario"></textarea>
              </div>
            </div>


            <!-- TEXTAREA -->    
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control form-material text-capitalize" rows="2" placeholder="acquistare osservazioni"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <div class="form-group mt-4">
                        <button type="button" :disabled="disabled" @click="addCart()" class="btn btn-danger btn-block btn-lg">
                            Aggiungi al mio ordine
                        </button>
                    </div>

                    <div class="form-group mt-3">
                        <button type="button" @click="goToOrder()" class="btn btn-danger btn-block btn-lg">
                            I mie ordini
                        </button>
                    </div>

                    <div class="form-group mt-3">
                        <button type="button" @click="backCar()" class="btn btn-outline-danger btn-block btn-lg">
                            Continua a fare acquisti
                        </button>
                    </div>
                </div>      
            </div>
            <!-- Cierre de row -->

        </div>
        <!-- CIERRE DE CONTAINER-FLUID -->        
    </div> 
</template>
<script>
    export default {
        data(){
            return{
                id: this.$route.params.id,
                root: null,
                quantity:1,
                amount: null,
                product_name:null,
                product_description:null,
                product_image:null,
                product_selected:[],
                disabled:false
            }
        },
        mounted(){
            this.root=window.location.origin;
            this.product_selected=this.$store.getters.getProductSelect;
            this.test();  

        },
        methods:{
           test(){
            this.amount=this.product_selected.price;
            this.product_name=this.product_selected.title;
            this.product_description=this.product_selected.description;
            this.product_image=this.product_selected.image[0].url;
           },
           backCar(){
            let prese=this.product_selected.id_presentation;
            let catg=this.product_selected.id_category;
            this.$router.push('/catalog/'+prese+'/'+catg);
           },
           goToOrder(){
            if(this.$store.getters.getCant!=0){
              this.$router.push('/myorder');
            }else{
                Vue.swal({
                  title: 'Error!!',
                  text: "empty cart",
                  type: 'error',
                  //showCancelButton: true,
                  //confirmButtonColor: '#3085d6',
                  //cancelButtonColor: '#216619',
                  //confirmButtonText: 'Pagare',
                  //cancelButtonText: 'Seguire'
                }).then((result) => {
                    /*if (result.value) {
                        this.$router.push('/catalog');
                    }*/
                })
            }
           },
           addCart(){
               this.product_selected.price=parseFloat(this.product_selected.price);
               this.product_selected.amount_total=parseFloat(this.product_selected.price)*parseInt(this.quantity);
               this.product_selected.cant=parseInt(this.quantity);
               this.$store.dispatch('setStore',this.product_selected);
               this.disabled=true;
               let slf=this;
               setTimeout(function(){ 
                   slf.disabled=false;
                },1800);
           },AddCant(oper){        
            var cant=parseInt(this.quantity);
            switch(oper){
              case 'mas':
                cant=cant+1;
              break;
              case 'menos':
                cant=cant-1;
              break;
            }
           if(cant!=0){
            this.quantity=cant;
           }
          }

        },
    }
</script>

