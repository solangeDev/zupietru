<template>
  <div>
      <nav class="navbar navbar-expand-lg navbar-dark bg-black w-100">
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        

          <a class="logo" href="#">
              <img src="imagenes/assets/logo/zupietru-logo-horizontal.svg" width="100px" alt="">
          </a>

          <!--ICONS -->
          <div>
            <div class="d-inline-block">
              
              <router-link to="/myorder" class="ext-white d-inline-block position-relative">
                 <img :src="root+'/imagenes/assets/iconos/shopping-cart.svg'" width="24" alt="">
                  <span class="badge badge-danger count-cart" v-show="validItem()">{{cantProd}}</span>
              </router-link>

             <!--  <a href="#" class="text-white d-inline-block position-relative">
                 
              </a> -->
            </div>
            <router-link to="/login" class="ml-2">
              <img :src="root+'/imagenes/assets/iconos/user-1.svg'" width="24" alt="">
            </router-link>

           <!--  <a href="#" class="ml-2">
                <img :src="root+'/imagenes/assets/iconos/user-1.svg'" width="24" alt="">
            </a> -->
          </div>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <router-link to="/" class="nav-link" data-toggle="collapse" data-target="#navbarSupportedContent">
                      Home
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <router-link to="/catalog/1/1" class="nav-link" data-toggle="collapse" data-target="#navbarSupportedContent">
                        Catalogo
                      </router-link>
                    </li>
                    <li class="nav-item">
                      
                    </li>
                    <li class="nav-item">
                      <router-link to="/services" class="nav-link" data-toggle="collapse" data-target="#navbarSupportedContent">
                        Services
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <router-link to="/Contact" class="nav-link" data-toggle="collapse" data-target="#navbarSupportedContent">
                        Contattaci
                      </router-link>
                    </li>
                  </ul>
          </div>
    </nav>
  </div>
</template>
<style>
.badge.count-cart {
    color: #fff;
    background-color: #dc3545;
    position: absolute;
    top: -6px;
    right: -10px;
    font-size: .6rem;
}
</style>
<script>
    export default {
        data(){
            return{
                root: null,
                cant:null,
            }
        },
        mounted(){
            this.root=window.location.origin;
            
        },
        methods:{
          validItem(){
            return this.cant!=0;
          }
        },computed:
        {
          cantProd(){
            this.cant=this.$store.getters.getCant;
            return this.cant;  
          }
          
        }
    }
</script>

