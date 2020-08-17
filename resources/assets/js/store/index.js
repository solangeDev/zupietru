import Vue from 'vue'
import Vuex from 'vuex'
import Store from './modules/Store.js'
import Session from './modules/Session.js'
import createPersistedState from 'vuex-persistedstate'
import * as Cookie from 'js-cookie'
Vue.use(Vuex)

let store = new Vuex.Store({
    modules:{
        Store,
        Session
    },plugins: [
         createPersistedState({
             paths: ['Store.store','Session.session'],
             getState: (key) => Cookie.getJSON(key), 
             setState: (key, state) => Cookie.set(key, state, { expires: 1, secure: false })
         })
      ]   
})

export default store;