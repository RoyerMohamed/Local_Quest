<template>
  <div v-if="this.shop" class="shop-card">
    <div class="shop-card-img">
    <img v-if="this.shop.images.length === 1 && this.shop.images[0].image_name !== 'default_shop.jpg'" :src=" this.previewImageStorage + this.shop.images[0].image_name" alt="">


      <img v-else
        :src=" this.previewImagePublic + 'default_shop.jpg'"
        class=""
        alt=""
      />
    </div>
    <div class="shop-card-wrapper p-3">
      <h5 class="">
        <router-link class="" :to="`/commerce/${this.shop.id}`">{{
          shop.shop_title
        }}</router-link>
      </h5>
      <span>{{
        this.shop.adresse + " ," + this.shop.city + " ," + this.shop.zip_code
      }}</span>
      <div class="shop-card-stars">
        <div class="shop-card-stars-num">
          <span>{{ Math.round(this.shop.rating) }}</span>
        </div>
        <div class="shop-card-stars-single">
          <div class="d-flex" v-for="star in 5" :key="star">
            <i
              v-if="star > Math.round(this.shop.rating)"
              class="fa-regular fa-star"
            ></i>
            <i v-else class="fa-solid fa-star" style="color: #ff8528"></i>
          </div>
        </div>
      </div>
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
.shop-card {
  width:45%;
}
.shop-card-img > img{
  border-radius: 5px;
width: clamp(300px , 100% , 500px);
height: 400px;
}
.shop-card-stars {
  display: flex;
  justify-content: start;
  align-items: center;
  padding: 1rem 0;
  gap: 1rem;
}
.shop-card-stars-single {
  display: flex;
}
.shop-card-wrapper {
  border: 2px solid #e3e3e3;
}
.shop-card-wrapper > h5 {
  font-size: 2rem;
  color: black;
}
.shop-card-wrapper > h5 > a{
  color: black;
}
.shop-card-wrapper > h5 > a:hover{
  color: #ff8528;
}
.shop-card-stars-num{
  border: 2px solid #ff8528;
  height: 30px;
  width: 30px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
}
p {
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 10;
  overflow: hidden;
}
</style>