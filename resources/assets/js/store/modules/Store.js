export default {
    state: {
      store:{
        cantidad:0,
        total_store:0,
        total_delivery:0,
        address:null,
        products_cart:{
          store:[],
          delivery:[]
        },
        presentation_act:null,
      }
    },
    actions:{
        setStore({ commit },item){
          commit('setStore',{ list: item});
        },
        setStoreDetail({ commit },item){
          commit('setStoreDetail',{ list: item});
        },
        /*setCantidadDetail({ commit },item){
          commit('setCantidadDetail',{ list: item});
        },*/
        deleteItem({ commit },item){
          commit('deleteItem',{ list: item});
        },
        deleteStore({ commit },item){
          commit('deleteStore',{ list: item});
        },
        setAdress({commit},item){
          commit('setAdress',{ list: item});
        },
        setProductSelect({commit},item){
          commit('setProductSelect',{ list: item});
        },
        setPresentActual({commit},item){
          commit('setPresentActual',{ list: item});
        }
    },
    getters:{
       getCant: state => {
         return state.store.cantidad;
       },       
       getProducts : (state) => (presentation_id) => {
         switch(presentation_id){
            case 1: //delivery
              return state.store.products_cart.delivery;
            break;
            case 2: //store
              return state.store.products_cart.store;
            break;
         }
       },getProductSelect:state => {
         return state.store.product_select;
       }
       ,getTotal:state =>  {
            return parseFloat(state.store.total_delivery)+parseFloat(state.store.total_store);
        },getTotalbyPresent : (state) => (presentation_id) => {
            switch(presentation_id){
              case 1: //delivery
                // var total=0;
                // var list_cart=state.store.products_cart.delivery;
                // for(var i in list_cart){
                //   total+=list_cart[i].amount_total;
                // }
                // return total;
                return state.store.total_delivery;
              break;
              case 2: //store
                // var total=0;
                // var list_cart=state.store.products_cart.store;
                // for(var i in list_cart){
                //   total+=list_cart[i].amount_total;
                // }
                // return total;
                return state.store.total_store;
              break;
           }
        },getStoreDelivery:state => {
          return state.store.products_cart.delivery;
       },getCartStore:state => {
          return state.store.products_cart.store;
       },
       getAdress:  state => {
         return state.store.address;
       },
       getStore:state => {
         return state.store;
       }
    },
    mutations:{
        setStore(state,{ list }){  
          switch(list.id_presentation){
            case 1: //delivery
              /*console.log(list);*/
              var list_cart=state.store.products_cart.delivery;
              var encontrado=false;
              for(var i in list_cart){
                if(parseInt(list_cart[i].id)==parseInt(list.id)){
                 encontrado=true;
                 let mascant=parseInt(list_cart[i].cant)+parseInt(list.cant);
                 let mastotal=parseFloat(list_cart[i].amount_total)+parseFloat(list.amount_total);
                 Vue.set(list_cart[i], 'cant', mascant);
                 Vue.set(list_cart[i], 'amount_total', mastotal);
                 break;
                }
              }
              if(encontrado==false){
                state.store.cantidad+=1;
                state.store.products_cart.delivery.push(list);
              }
              state.store.total_delivery=0;
              var total=0;
              for(var i in list_cart){
                total+=parseFloat(list_cart[i].amount_total);
              }
              state.store.total_delivery=total;
            break;
            case 2: //store
              /*console.log(list);*/
              var list_cart=state.store.products_cart.store;
              var encontrado=false;
              for(var i in list_cart){
                if(parseInt(list_cart[i].id)==parseInt(list.id)){
                 encontrado=true;
                 let mascant=parseInt(list_cart[i].cant)+parseInt(list.cant);
                 let mastotal=parseFloat(list_cart[i].amount_total)+parseFloat(list.amount_total);
                 Vue.set(list_cart[i], 'cant', mascant);
                 Vue.set(list_cart[i], 'amount_total', mastotal);
                 break;
                }
              }
              if(encontrado==false){
                state.store.cantidad+=1;
                state.store.products_cart.store.push(list);
              }
              state.store.total_delivery=0;
              var total=0;
              for(var i in list_cart){
                total+=parseFloat(list_cart[i].amount_total);
              }
              state.store.total_store=total;
            break;
          }
          //let cant=state.store.products_cart.store.length+state.store.products_cart.delivery.length;    
          

        },setProductSelect(state,{ list }){ 
          state.store.product_select=list;
        }
        ,setStoreDetail(state,{ list }){  
          switch(list.id_presentation){
            case 1: //delivery
              var list_cart=state.store.products_cart.delivery;
              for(var i in list_cart){
               if(list_cart[i].id==list.id){
                 Vue.set(list_cart[i], 'cant', list.cant);
                 Vue.set(list_cart[i], 'amount_total', list.amount_total);
               }
              }
              var total=0;
              for(var i in list_cart){
               total+=parseFloat(list_cart[i].amount_total);
              }
              state.store.total_delivery=0;
              state.store.total_delivery=parseFloat(total);              
            break;
            case 2: //store
              var list_cart=state.store.products_cart.store;
              for(var i in list_cart){
               if(list_cart[i].id==list.id){
                 Vue.set(list_cart[i], 'cant', list.cant);
                 Vue.set(list_cart[i], 'amount_total', list.amount_total);
               }
              }
              var total=0;
              for(var i in list_cart){
               total+=parseFloat(list_cart[i].amount_total);
              }
              state.store.total_store=0;
              state.store.total_store=parseFloat(total);  
            break;
          }
          //console.log(list);
         /*  var total=0;
           for(var i in state.store.products_cart){
             total+=state.store.products_cart[i].amount_total;
             if(state.store.products_cart[i].id_product==list.id_product){
               Vue.set(state.store.products_cart[i], 'cant', list.cant);
               Vue.set(state.store.products_cart[i], 'amount_total', list.amount_total);
             }
           }
           state.store.amount=total;*/
        }/*,setCantidadDetail(state,{ list }){ 
           state.store.cantidad+=parseInt(list.cant);  
        },setearCeroCantidad(state){ 
           state.store.cantidad=0;  
        }*/
        ,deleteItem(state,{ list }){ 
          switch(list.id_presentation){
            case 1: //delivery
              var total=0;
              for(var i in state.store.products_cart.delivery){
                 if(state.store.products_cart.delivery[i].id==list.id){
                   total+=state.store.products_cart.delivery[i].amount_total;
                   Vue.delete(state.store.products_cart.delivery,i);
                 }
              }
              state.store.total_delivery-=parseFloat(total);
              state.store.cantidad=state.store.cantidad-1;            
            break;
            case 2: //store
              var total=0;
              for(var i in state.store.products_cart.store){
                 if(state.store.products_cart.store[i].id==list.id){
                   total+=state.store.products_cart.store[i].amount_total;
                   Vue.delete(state.store.products_cart.store,i);
                 }
              }
              state.store.total_store-=parseFloat(total);
              state.store.cantidad=state.store.cantidad-1;
            break;           
          }
        },deleteStore(state,{ list }){ 
           let prese=state.store.presentation_act;
           console.log(prese);
           switch(prese){
            case 1: //delivery
                var list_cart=state.store.products_cart.delivery;
                var total=0;
                var cant=0;
                for(var i in list_cart){
                   total+=parseFloat(list_cart[i].amount_total);
                   cant+=1;
                }
                state.store.total_delivery=state.store.total_delivery-total;
                state.store.cantidad=state.store.cantidad-cant;
                state.store.products_cart.delivery=[];  
            break;
            case 2: //store
              var list_cart=state.store.products_cart.store;
              var total=0;
              var cant=0;
              for(var i in list_cart){
                   total+=parseFloat(list_cart[i].amount_total);
                   cant+=1;
              }
              state.store.total_store=state.store.total_store-total;
              state.store.cantidad=state.store.cantidad-cant;
              state.store.products_cart.store=[];
            break;          
          }
        },setAdress(state,{ list }){ 
          state.store.address=list;
        },setPresentActual(state,{ list }){ 
          state.store.presentation_act=list.prsentation_id;
        }
    }
}