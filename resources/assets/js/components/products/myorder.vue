<template>
    <div>
      <returnback></returnback>
      <div class="container-fluid mb-4 mt-2">
          <div class="row mb-2">
              <div class="col-12">
                  <h2 class="uppercase">
                      I miei ordini
                  </h2>
              </div>
          </div>
          <orderdelivery v-show="validCartDelivery"></orderdelivery>
          <br>
          <orderstore v-show="validCartStore"></orderstore>
      </div>
    </div>
</template>
<script>
    export default {
        data(){
            return{
              cart_store:[],
              cart_delivery:[]
            }
        },
        mounted(){
          this.validTotal();
        },
        methods:{
           validTotal(){
            if(this.cart_store.length==0 && this.cart_delivery.length==0){
              Vue.swal({
                title: 'Error!!',
                text: 'Empty Cart',
                type: 'error',
              }).then((result) => {
                  if (result.value) {
                      this.$router.push('/');
                  }
              });
            }
          }
        },
        computed:{
          validCartDelivery(){
            var data=this.$store.getters.getStoreDelivery; 
            console.log(data);
            this.cart_delivery=data;
            if(data.length>0){
              return true;
            }else{
              return false;
            }
          },
           validCartStore(){
            var data=this.$store.getters.getCartStore;
            this.cart_store=data; 
            if(data.length>0){
              return true;
            }else{
              return false;
            }
          }
        }
    }
</script>

