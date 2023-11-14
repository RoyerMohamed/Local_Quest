<template>
  <HeaderNav />
  <main>
    <div v-if="$route.path == '/'">
      <p v-if="this.test"></p>
      <h1>HOME</h1>
    </div>
    <div class="" v-else>
      <router-view v-bind:key="$route.fullPath"></router-view>
    </div>
  </main>
</template>

<script>
  import HeaderNav from "./components/template/HeaderNav.vue";
  import { useShopStore } from "./stores/shopStore";
  import { mapActions } from "pinia";
  export default {
    components:{
      HeaderNav
    } , methods :{
      ...mapActions(useShopStore , ['setShop']),
      test(){
       // this.setShop();
        console.log('pngd');
      }
    }
  }

</script>
<style>

</style>
