import { createRouter , createWebHistory } from "vue-router";
const routes = [
    {
        name: 'Home', 
        path: '/',
        component :() => import('../App.vue')
    },
    {
        name: 'login', 
        path: '/login',
        component : () => import('../components/auth/Login.vue')
    },
    {
        name: 'register', 
        path: '/register',
        component : () => import('../components/auth/Register.vue')
    },
    {
        name: 'Profil', 
        path: '/profil',
        component : () => import('../components/user/Profil.vue')
    },
    {
        name: 'Commerces', 
        path: '/commerces',
        component : () => import('../components/commerces/ShopList.vue')
    },
    {
        name: 'DetailCommerce',
        path: '/commerce/:id',
        component : () => import('../components/commerces/ShopDetail.vue')
    },
    {
        name: 'Blog',
        path: '/blog',
        component : () => import('../components/blog/BlogList.vue')
    },
    {
        name: 'BlogDetail',
        path: '/blogDetail/:id',
        component : () => import('../components/blog/BlogDetail.vue')
    },
    {
        name: 'Recipe',
        path: '/recipes',
        component : () => import('../components/recipe/RecipeList.vue')
    },
    {
        name: 'RecipeDetail',
        path: '/recipe/:id',
        component : () => import('../components/recipe/RecipeDetail.vue')
    },
];

const router = createRouter({
    history : createWebHistory(), 
    routes
});

export default router; 