import Vue from 'vue'
import Router from 'vue-router'

import returnback from '../components/general/return_back.vue';
import jumperr from '../components/general/jumperr.vue';
import appContent from '../components/landing/AppContent.vue';
import navheader from '../components/landing/header.vue';
import navBar from '../components/landing/navbar.vue';
import delivery from '../components/landing/delivery.vue';
import vitrina from '../components/landing/vitrina.vue';
import topproduct from '../components/landing/topproduct.vue';
import deliveryslider from '../components/landing/delivery_slider.vue';
import category from '../components/landing/category.vue';
import newsletter from '../components/landing/newsletter.vue';
import channel from '../components/landing/channel.vue';
import footer from '../components/landing/footer.vue';
import ourgallery from '../components/landing/ourgallery.vue';


/* Productos */
import detailproduct from '../components/products/detailproduct.vue';
import newproductslider from '../components/products/newproduct_slider.vue';
import storeslider from '../components/products/store_slider.vue';
import myorder from '../components/products/myorder.vue';
import editaddress from '../components/products/edit_billing_address.vue';
import payment from '../components/products/payment.vue';
import catalog from '../components/products/catalog.vue';
import orderdelivery from '../components/products/myorder_delivery.vue';
import orderstore from '../components/products/myorder_store.vue';


/* componentes pedro */
import contact from '../components/general/contact.vue';
import about from '../components/about/about.vue';
import blog from '../components/blog/blog.vue';
import post from '../components/blog/post.vue';
import terms from '../components/polity/terms.vue';
import policies from '../components/polity/policies.vue';
import services from '../components/services/services.vue';
import createAccount from '../components/user/create-account.vue';
import myAccount from '../components/user/my-account.vue';
import reservations from '../components/reserve/reservations.vue';




import login from '../components/user/login.vue';





/*
import products from '../components/landing/products.vue';
import catering from '../components/landing/catering.vue';
import sectionvideo from '../components/landing/sectionvideo.vue';
import subscribe from '../components/landing/subscribe.vue';
import events from '../components/landing/events.vue';
import contact from '../components/landing/contact.vue';
import footer from '../components/landing/footer.vue';
*/

Vue.use(Router)

Vue.component('appContent',appContent);
Vue.component('navheader',navheader);
Vue.component('nav-bar',navBar);
Vue.component('delivery',delivery);
Vue.component('vitrina',vitrina);
Vue.component('topproduct',topproduct);
Vue.component('deliveryslider',deliveryslider);
Vue.component('returnback', returnback);
Vue.component('jumperr', jumperr);
Vue.component('newproductslider',newproductslider);
Vue.component('category',category);
Vue.component('storeslider',storeslider);
Vue.component('ourgallery',ourgallery);
Vue.component('newsletter',newsletter);
Vue.component('channel',channel);
Vue.component('navfooter',footer);
Vue.component('orderdelivery',orderdelivery);
Vue.component('orderstore',orderstore);




/*
Vue.component('products',products);
Vue.component('catering',catering);
Vue.component('sectionvideo',sectionvideo);
Vue.component('subscribe',subscribe);
Vue.component('events',events);
Vue.component('contact',contact);
Vue.component('navfooter',footer);
*/




let router = new Router({
    mode:'history',
    routes: [
        { 
            path: '/',
            name: 'appContent',
            component: appContent
        },
        { 
            path: '/detailproduct/:id',
            name: 'detailproduct',
            component: detailproduct
        },
        { 
            path: '/myorder',
            name: 'myorder',
            component: myorder
        },
        { 
            path: '/editaddress',
            name: 'editaddress',
            component: editaddress
        }, 
        { 
            path: '/login',
            name: 'login',
            component: login
        },
        { 
            path: '/payment',
            name: 'payment',
            component: payment
        },
        { 
            path: '/catalog/:idpresent/:idcateg',
            name: 'catalog',
            component: catalog
        },
        { 
            path: '/catalog/:idpresent',
            name: 'catalog',
            component: catalog
        },

        // Pedro 
        { 
            path: '/reservations',
            name: 'reservations',
            component: reservations
        },
        { 
            path: '/contact',
            name: 'contact',
            component: contact
        },
        { 
            path: '/my-account',
            name: 'myaccount',
            component: myAccount
        },
        { 
            path: '/create-account',
            name: 'createaccount',
            component: createAccount
        },
        { 
            path: '/services',
            name: 'services',
            component: services
        },
        { 
            path: '/policies',
            name: 'policies',
            component: policies
        },
        { 
            path: '/terms',
            name: 'terms',
            component: terms
        },
        { 
            path: '/post',
            name: 'post',
            component: post
        },
        { 
            path: '/blog',
            name: 'blog',
            component: blog
        },
        { 
            path: '/about',
            name: 'about',
            component: about
        },

         
        
    ]
})

export default router