<template>
  <div v-if="this.shop" class="shop-card">
    <img
      :src="
        this.shop.images[0].image_name === 'default_shop.jpg'
          ? this.previewImagePublic + this.shop.images[0].image_name
          : this.previewImageStorage + this.shop.images[0].image_name
      "
      class=""
      alt=""
    />
    <div class="">
      <h5 class="">{{ shop.shop_title }}</h5>
      <p class="">{{ shop.description }}</p>
      <router-link class="" :to="`/commerce/${this.shop.id}`"
        >en savoir plus</router-link
      >
    </div>
  </div>
</template>

<script>
export default {
  props: ["shop"],
  data() {
    return {
      previewImagePublic: "http://[::1]:5173/public/images/",
      previewImageStorage: "http://[::1]:5173/public/storage/",
    };
  },
};
</script>

<style lang="scss" scoped>
p {
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 10;
  overflow: hidden;
}
</style>