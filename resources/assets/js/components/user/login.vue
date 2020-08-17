<template>
    <div>
		<!-- Retornamos a la ultima vista -->
        <returnback></returnback>
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-12">
	                <h2 class="mt-3 text-uppercase">
	                    Registrati
	                </h2>
	                <form action="" class="mt-5 mb-5">
	                    <div class="form-group">
	                        <label class="mb-0">Email</label>
	                        <input type="text" v-model="form.login" v-validate="'required'" name="login" :class="{'is-danger': errors.has('login') }" class="form-control form-material" placeholder="">
	                    </div>
	                    <div class="form-group">
	                        <label class="mb-0">Password</label>
	                        <input type="password" v-model="form.password" v-validate="'required'" name="login" :class="{'is-danger': errors.has('login') }" class="form-control form-material" placeholder="">
	                    </div>

	                    <div class="form-group mt-3">
	                        <button @click="autenticar()" type="button" class="btn btn-danger btn-block btn-lg">
	                           registrati
	                        </button>
	                    </div>
	                    <div class="form-group">
	                            <button type="button" class="btn btn-outline-danger btn-block">
	                                Non hai un account?
	                            </button>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	  </div>
</template>
<script>
    export default {
        data(){
            return{
                form:{
                    login:null,
                    password:null
                }
            }
        },
        mounted(){
        
        },
        methods:{
            autenticar(){
             this.$validator.validateAll().then((result) => {
                if(result){
                 this.$store.dispatch('setSession',this.form).then((r) => {
                    this.$router.push('/');
                 }).catch(() => {console.log('error store')});
                }
              }).catch(() => {console.log('error form')});
            }
        }
    }
</script>