export default {
    state: {
      user:[
        
      ]
    },
    actions:{
        setSession({ commit },item){
          commit('setSession',{ list: item});
        },
    },
    getters:{
       getSession:  state => {
         return state.user;
       }
    },
    mutations:{
        setSession(state,{ list }){
          let obj={};
          obj.id=1;
          obj.email=list.login;
          state.user=obj;  
        }
    }
}