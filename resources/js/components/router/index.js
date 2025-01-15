import { createRouter, createWebHistory } from "vue-router";
import invoiceIndex from '../invoices/index.vue';
import invoiceShow from '../invoices/show.vue';

const routes = [
    {
        path: '/',
        component: invoiceIndex
    },
    {
        path: '/show',
        component: invoiceShow
    },
    {
        path: '/:pathMatch(.*)*',
        component: invoiceIndex
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
});


export default router