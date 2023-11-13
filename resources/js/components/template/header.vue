<template>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <router-link to="/" class="navbar-brand">
                <img src="../../../../public/images/logo.png" alt="">
            </router-link>
            <ul>
                <div v-if='!this.token' class="d-flex ">
                    <li>
                        <router-link to="/login" class="navbar-brand">
                            connexion
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/register" class="navbar-brand">
                            Inscription
                        </router-link>
                    </li>
                    <li>
                       <router-link @click="this.setAllShop" to="/commerces"  class="navbar-brand" >commerces</router-link>
                    </li>
                    <li>
                       <router-link to="/blog" >Articles</router-link>
                    </li>
                    <li>
                       <router-link @click="this.setAllRecipe" to="/recipes"  class="navbar-brand">Recipe</router-link>
                    </li>
                </div>
                <div v-else class="d-flex">
                    <li>
                       <button @click="logOut"  class="navbar-brand" >deconnection</button>
                    </li>
                    <li>
                       <router-link to="/profil"  class="navbar-brand" >Profile</router-link>
                    </li>
                    <li>
                       <router-link @click="this.setAllShop" to="/commerces"  class="navbar-brand">commerces</router-link>
                    </li>
                    <li>
                       <router-link to="/blog"  class="navbar-brand" >Articles</router-link>
                    </li>
                    <li>
                       <router-link @click="this.setAllRecipe" to="/recipes"  class="navbar-brand">Recipe</router-link>
                    </li>
                </div>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </nav>
</template>

<script>
import axios from 'axios';
import { useUserStore } from '../../stores/userStore';
import { useShopStore } from '../../stores/shopStore'
import { useRecipeStore } from '../../stores/recipeShop'
import { mapState } from 'pinia';
export default {
    name : 'header',
    computed: {
        ...mapState(useUserStore, ['token', "userLocation"]),
    } ,
    methods : {
        logOut(){
            const userStore = useUserStore();
            const shopStore = useShopStore();
            userStore.$reset();
            shopStore.$reset();
            axios.defaults.headers.common.Authorization = ''
            this.$router.push('/')
        }, 
        setAllShop(){
            const shopStore = useShopStore();
            const userStore = useUserStore();
            

        if(!this.userLocation){
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(position =>{
                    userStore.setLocation({latutitude : position.coords.latitude, longitude : position.coords.longitude})
                })  
            }
        }

            if (shopStore.shops.length === 0) {
                shopStore.setShop()
            }else{
                shopStore.$reset()
                shopStore.setShop()
            }
        }, 
        setAllRecipe(){
            const useRecipe = useRecipeStore();
            if (useRecipe.recipes.length === 0) {
                useRecipe.setRecipe()
            }else{
                useRecipe.$reset()
                useRecipe.setRecipe()
            }
        }
    }
}
</script>

<style lang="scss" scoped></style>