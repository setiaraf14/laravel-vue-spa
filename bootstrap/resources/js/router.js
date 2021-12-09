import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './components/pages/Home.vue';
import About from './components/pages/About.vue';
import Product from './components/pages/Product/index.vue';
import ProductForm from './components/pages/Product/form.vue';
import ProductEdit from './components/pages/Product/Edit.vue';
import Login from './components/Auth/login.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
            // meta : { requires : true }
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
        },
        {
            path: '/about',
            name: 'about',
            component: About,
            meta : { requiresAuth : true }
        },
        {
            path: '/product',
            name: 'product',
            component: Product,
            meta : { requiresAuth : true }
        },
        { 
            path: '/product/form',
            name: 'product-form',
            component: ProductForm,
            meta : { requiresAuth : true }
        },
        {
            path: '/product/edit',
            name: 'productedit', 
            component: ProductEdit
        },
    ]
});

function loggedIn() {
    return localStorage.getItem('_token');
}

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (!loggedIn()) {
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else if (to.matched.some(record => record.meta.guest)) {
        if (loggedIn()) {
            next({
                path: '/sign-in',
                query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else {
        next() // make sure to always call next()!

    }
})

export default router;