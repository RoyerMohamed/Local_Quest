<template>
  
 
    <div v-if="this.shop" class="card shop-card">
      <img :src="this.previewImage + this.shop.images[0].image_name" class="card-img-top" alt="">
      <div class="card-body">
        <h5 class="card-title">{{ shop.shop_title }}</h5>
        <p class="card-text">{{ shop.description }}</p>
        <router-link class="btn btn-primary" :to="`/commerce/${this.shop.id}`">en savoir plus</router-link>
      </div>
    </div>
    
 
</template>

<script>
export default {
  props: ['shop'],
  data() {
    return {
      previewImage: "http://[::1]:5173/public/images/",
    }
  },

}
</script>

<style lang="scss" scoped>
.shop-card{
  width: 45%;
}
p{
  display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 10;
    overflow: hidden;
}
</style>