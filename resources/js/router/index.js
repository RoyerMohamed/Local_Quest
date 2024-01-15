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
        name: 'AjoutCommerce',
        path: '/ajoutCommerce',
        component : () => import('../components/commerces/AddShop.vue')
    },
    {
        name: 'DetailCommerce',
        path: '/commerce/:id',
        component : () => import('../components/commerces/ShopDetail.vue')
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
    {
        name: 'IndexBackOffice',
        path: '/admin',
        component : () => import('../components/backOffice/IndexBackOffice.vue')
    },
    {
        name: 'editShop',
        path: '/editShop/:id',
        component : () => import('../components/user/EditShop.vue')
    },
    {
        name: 'AddedShop',
        path: '/AddedShop',
        component : () => import('../components/user/AddedShop.vue')
    },
];

const router = createRouter({
    history : createWebHistory(), 
    routes
});

export default router; 