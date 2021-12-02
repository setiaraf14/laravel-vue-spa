import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './components/pages/Home.vue';
import About from './components/pages/About.vue';
import Product from './components/pages/Product/index.vue';
import ProductForm from './components/pages/Product/form.vue';
import ProductEdit from './components/pages/Product/Edit.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/product',
            name: 'product',
            component: Product
        },
        { 
            path: '/product/form',
            name: 'product-form',
            component: ProductForm
        },
        {
            path: '/product/edit',
            name: 'productedit', 
            component: ProductEdit
        }
    ]
});

export default router;