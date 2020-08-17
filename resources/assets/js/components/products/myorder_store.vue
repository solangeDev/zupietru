<template>
    <div class="container-fluid mb-4 mt-2">
           <div class="container-fluid mb-3">
            <div class="row">
              <div class="col-12">
                 <h4 class="uppercase">
                    Store
                </h4>
              </div>
            </div>
            <div class="hr-full mb-3"></div>
            <template v-for="(item,key) in listProducts">
              <div class="row item-order">
                  <div class="col-10">
                      <p class="font-weight-bold">{{item.title}} 
                        <span class="badge badge-warning">
                          Price: €  {{parseFloat(item.price).toFixed(2)}}
                        </span>
                      </p>
                      <p class="small">{{item.description}}</p>
                      
                  </div>
                   <div class="col-2 align-self-center">
                      <a @click="removeItem(item)" class="text-danger">
                          <i class="far fa-trash-alt"></i>
                      </a>
                  </div>

                  <div class="col-8 align-self-center">
                      <div class="form-group text-center">
                        <span class="d-block font-weight-bold lead mb-2" :id="'spanquanty_'+item.id">{{item.cant}}</span>
                        <label class="mb-0">Totale: € {{parseFloat(item.amount_total).toFixed(2)}}</label>
                      </div> 
                  </div>
                  <div class="col-4 align-self-center">
                      <div class="form-group text-center">

                            <button @click="AddCant('spanquanty_'+item.id,'mas',item)" class="btn btn-sm btn-danger">
                              <i class="fas fa-plus"></i>
                            </button>
                            <button @click="AddCant('spanquanty_'+item.id,'menos',item)" class="btn btn-sm btn-danger">
                              <i class="fas fa-minus"></i>
                            </button>

                      </div> 
                  </div>
                 
                  <div class="hr-full mb-3"></div>
              </div>
            </template>
            <div class="row sum">
                <!-- <div class="hr-full mb-1"></div> -->
                <div class="col-6">
                    <p class="font-weight-bold lead text-right">Totale</p>
                </div>
                <div class="col-6">
                    <p class="lead text-right">€ {{getTotalbyPresent2}}</p>
                </div>
                <div class="hr-full mb-3"></div>
            </div>
            <div class="row sum">
                <div class="col-12">
                    <p class="small">Nota: questo ordine ha costi aggiuntivi di spedizione.</p>
                </div>
            </div>
          </div>
            <div class="row mt-3">
              <div class="col-12">
                      <div class="form-group">
                              <button type="button" @click="addMore()" class="btn btn-outline-danger btn-block">
                                  Aggiungere altro
                              </button>
                      </div>
                      <div class="form-group">
                              <button type="button" @click="checkout()" class="btn btn-danger btn-block">
                                  Procedi all' acquisto
                              </button>
                      </div>
              </div>
          </div>

          <!-- Modal proceder a pagar-->
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Procedi all' acquisto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h4 class="mt-4 mb-2">Registrati e risparmia tempo</h4>
                <router-link to="/create-account" class="btn btn-danger btn-lg text-uppercase text-white btn-block">
                  Registrati
                </router-link>

                <h4 class="mt-4 mb-2">Continua senza registrarti</h4>
                <router-link to="/editaddress" class="btn btn-dark btn-lg text-uppercase text-white btn-block">Continua</router-link>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">annullare</button>
              </div>
            </div>
          </div>
        </div>
    </div>     <!-- final Modal proceder a pagar-->

</template>
<script>
    export default {
        data(){
            return{
                products:[],
                id_presentation:2,
                total:0.00,
            }
        },
        mounted(){

        },
        computed:{
            listProducts(){
                this.products=this.$store.getters.getProducts(this.id_presentation);
                return this.products;
            },getTotalbyPresent2(){
              let total=this.$store.getters.getTotalbyPresent(this.id_presentation);
              this.total=parseFloat(total).toFixed(2);
              return this.total;
            }
        },
        methods:{
          checkout(){           
              let obj={};
              obj.prsentation_id=this.id_presentation;
              this.$store.dispatch('setPresentActual',obj);
              var user=this.$store.getters.getSession;
              if(user.length==0){
                $('#exampleModal1').modal('show') //Modal
              }else{
                 this.$router.push('/editaddress');
              }
          },
          addMore(){
            this.$router.push('/catalog/'+this.id_presentation);
          },
          AddCant(idItem,oper,item){
            var cant=parseInt(document.getElementById(idItem).innerHTML);
            switch(oper){
              case 'mas':
                cant=cant+1;
              break;
              case 'menos':
                cant=cant-1;
              break;
            }
            if(cant!=0){
              document.getElementById(idItem).innerHTML=cant;
              item.cant=parseInt(cant);
              item.amount_total=parseFloat(item.price)*item.cant;
              this.$store.dispatch('setStoreDetail',item);
            }
          },removeItem(item){
            this.$store.dispatch('deleteItem',item);
          }
        }
    }
</script>

