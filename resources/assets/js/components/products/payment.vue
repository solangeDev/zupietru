<template>
	<div>
		<!-- Retornamos a la ultima vista -->
    	<returnback></returnback>
		<!-- <div style="height:80px; width: 100%;"></div> -->

	    <div class="container-fluid">
	    	<div class="row">
	    		<div class="col-12">
	    			<div class="alert m-2" :class="msj.oper" v-show="msj.show">
			          {{msj.msj}}
			      </div>
	    		</div>
	    	</div>
	        <div class="row">
	            <div class="col-12 text-center">
	                <h2 class="text-uppercase mt-3">
	                    Modalità di pagamento
	                </h2>
					<img class="img-fluid mt-3" src="imagenes/assets/paypal.jpg" alt="">
                    <!-- <div id="paypal-button" class="mt-2"></div> -->
					<button type="button" class="btn btn-danger btn-block mt-3 mb-5" @click.prevent="policies()">Pagamento</button>
	               
	                <!-- <form action="">
	                    <div class="form-group">
	                        <label class="mb-0">Card Type</label>
	                        <input type="text" class="form-control form-material" placeholder="select a credit card type">
	                    </div>
	                    <div class="form-group">
	                        <label class="mb-0">Card number</label>
	                        <input type="text" class="form-control form-material" placeholder="Add your credit card number">
	                    </div>
	                    <div class="form-group">
	                        <label class="mb-0">Expire date</label>
	                        <input type="text" class="form-control form-material" placeholder="mm | yy">
	                    </div>
	                    <div class="form-group">
	                        <label class="mb-0">CSC</label>
	                        <input type="text" class="form-control form-material" placeholder="Add your credit card CSC code">
	                    </div>


	                

	                    <div class="form-group mt-3">
	                        <button type="submit" class="btn btn-danger btn-block btn-lg">
	                            Payment
	                        </button>
	                    </div>


	                </form> -->
	            </div>
        	</div>
    	</div>


		<!-- Modal proceder a pagar-->
          <div class="modal fade" id="politica" tabindex="-1" role="dialog" aria-labelledby="politicaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="politicaLabel">Informativa sulla privacy</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
					<div class="">
                    	<h2>Informativa sulla privacy</h2>
                    	<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Voluptate sequi assumenda cupiditate deleniti dolores repudiandae atque, 
                            debitis nemo aliquid ex totam ullam culpa qui ea! 
                            Consequatur hic voluptate rem nulla saepe officia maxime distinctio nisi? 
                            Vel, repellendus ut reiciendis debitis ullam placeat, necessitatibus, 
                            cumque vitae rem odio laudantium? Quos, vitae.
                        </p>
                    	<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Voluptate sequi assumenda cupiditate deleniti dolores repudiandae atque, 
                            debitis nemo aliquid ex totam ullam culpa qui ea! Consequatur hic voluptate 
                            rem nulla saepe officia maxime distinctio nisi? Vel, repellendus ut reiciendis 
                            debitis ullam placeat, necessitatibus, cumque vitae rem odio laudantium? Quos, vitae.
                        </p>
					</div>	
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">annullare</button>
                  <button @click.prevent="pagar()" type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- final Modal proceder a pagar-->



	</div>
</template>
<script>
    export default {
        data(){
            return{
                form:[],
                msj:{
                	oper:'',
                	show:false,
                	msj:'',
                }
            }
        },
        mounted(){
        	this.loadSession();
            //this.test();
        },
        methods:{
			policies(){           
              $('#politica').modal('show') //Modal
          	},
            /*test(){
                var slf = this;
                var order_data=this.$store.getters.getStore;
                var total=0.1;
                if(order_data.presentation_act==1){
                    total=parseFloat(order_data.total_delivery);
                }else if(order_data.presentation_act==2){
                    total=parseFloat(order_data.total_store);
                }
                var slf=this;
                paypal.Button.render({
                  // Configure environment
                  env: 'sandbox',
                  client: {
                    sandbox: 'ATZncLewNuK1sFTdeWN0PVQJ6kXuOjV_P5vF3SsL1-AwgopnEQ1VoXipCuNUHWAlmVXlPO-jwho5Q2-Z',
                    production: 'demo_production_client_id'
                  },
                  // Customize button (optional)
                  locale: 'en_US',
                  style: {
                    size: 'small',
                    color: 'gold',
                    shape: 'pill',
                    label: 'paypal'
                  },
                  // Set up a payment
                  payment: function (form, actions) {
                    return actions.payment.create({
                      transactions: [{
                        amount: {
                          total: total,
                          currency: 'EUR'
                        }
                      }]
                    });
                  },
                  // Execute the payment
                  onAuthorize: function (data, actions) {
                    return actions.payment.execute()
                      .then(function () {
                        // Show a confirmation message to the buyer
                        //window.alert('Thank you for your purchase!');
                        var form={};
                        form.data=order_data;
                        form.data.total=total;
                        form.info_paypal=data;

                        axios.post('/saveOrder',form).then((res)=>{
                             if (res.status == 200) {
                                    slf.$store.dispatch('deleteStore');
                                    slf.msj.show=true;
                                    slf.msj.oper='alert-success';
                                    slf.msj.msj="Operazione riuscita Un'email è stata inviata al cliente";
                                    setTimeout(function(){ 
                                        slf.$router.push('/');
                                    },2000);
                                }else{
                                    slf.msj.show=true;
                                    slf.msj.oper='alert-danger';
                                    slf.msj.msj='Errore di Coonexion';
                                }
                             })
                             .catch((error)=>{
                               slf.msj.show=true;
                               slf.msj.oper='alert-danger';
                               slf.msj.msj='Operacion error';
                         })
                      });
                  }
                }, '#paypal-button');
            },*/
			pagar(){
                var slf = this;
             	let data=this.$store.getters.getStore;
                console.log(data);
                let form={};
                var total=0.1;
                if(data.presentation_act==1){
                    total=data.total_delivery;
                }else if(data.presentation_act==2){
                    total=data.store;
                 }
                form.data=data;
                form.data.total=total;
                console.log(form);
				 axios.post('/paypal',form).then((res)=>{
			     //console.log(res);
			     if (res.status == 200) {
			     	if(res.data.url!=null)
			     		location.href = res.data.url;
			     	 }
			     })
			     .catch((error)=>{
                    this.msj.show=true;
                    this.msj.oper='alert-danger';
                    this.msj.msj='Operacion error';	
			  	})
            },
            loadSession(){
            	let slf=this;
            	axios.get('/getSession').then((res)=>{
				     if (res.status == 200) {
				     	if(res.data!=""){
                            console.log(res);
                            if(res.data.status=='true'){
                                this.$store.dispatch('deleteStore');
                                this.msj.show=true;
                                this.msj.oper='alert-success';
                                this.msj.msj="Operazione riuscita Un'email è stata inviata al cliente";
                                setTimeout(function(){ 
                                    slf.$router.push('/');
                                },2000);
                            }else{
				     			this.msj.show=true;
								this.msj.oper='alert-danger';
				     			this.msj.msj='Errore di Coonexion';
				     		}
				     	}else{
				     		console.log("vacio");
				     	}
				        }
				     })
				     .catch((error)=>{
					   this.msj.show=true;
					   this.msj.oper='alert-danger';
		     		   this.msj.msj='Operacion error';
				 })
            }
        }
    }
</script>

