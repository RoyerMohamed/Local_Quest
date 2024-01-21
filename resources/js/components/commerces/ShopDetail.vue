<template>
  <!-- add slider simple hugo  -->
  <div id="shop">
    <swiper
      :slidesPerView="3"
      :spaceBetween="0"
      :freeMode="true"
      :pagination="{
        clickable: true,
      }"
      :modules="modules"
      class="mySwiper"
      v-if="this.setCurrentShop.images.length > 1"
    >
      <swiper-slide
        style="width: clamp(200px, 500px, 550px)"
        v-for="image in this.setCurrentShop.images"
        :key="image.id"
      >
        <img
          class="slider-img"
          :src="this.previewImageStorage + image.image_name"
          alt=""
        />
      </swiper-slide>
    </swiper>

    <swiper
      :slidesPerView="3"
      :spaceBetween="30"
      :freeMode="true"
      :pagination="{
        clickable: true,
      }"
      :modules="modules"
      class="mySwiper"
      v-if="
        this.setCurrentShop.images.length == 1 &&
        this.setCurrentShop.images[0].image_name !== 'default_shop.jpg'
      "
    >
      <swiper-slide v-for="image in this.setCurrentShop.images" :key="image.id">
        <img
          class="slider-img"
          :src="this.previewImageStorage + image.image_name"
          alt=""
        />
      </swiper-slide>
    </swiper>

    <!-- <swiper
      :slidesPerView="3"
      :spaceBetween="30"
      :freeMode="true"
      :pagination="{
        clickable: true,
      }"
      :modules="modules"
      class="mySwiper"
      v-else
    >
      <swiper-slide  
        :key="image.id" >
        <img
        :src="this.previewImage + this.setCurrentShop.images[0].image_name"
        alt=""
        srcset=""
      />
      </swiper-slide>
    </swiper> -->
    <!-- 
    <div v-if="this.setCurrentShop.images.length > 1" class="shop_hero">
      <img
        v-for="image in this.setCurrentShop.images"
        :key="image.id"
        :src="this.previewImageStorage + image.image_name"
        alt=""
      />
    </div> -->

    <div
      v-if="
        this.setCurrentShop.images.length == 1 &&
        this.setCurrentShop.images[0].image_name !== 'default_shop.jpg'
      "
      class="shop_hero"
    >
      <img
        v-for="image in this.setCurrentShop.images"
        :key="image.id"
        :src="this.previewImageStorage + image.image_name"
        alt=""
      />
      <img
        :src="this.previewImage + this.setCurrentShop.images[0].image_name"
        alt=""
        srcset=""
      />
      <img
        :src="this.previewImage + this.setCurrentShop.images[0].image_name"
        alt=""
        srcset=""
      />
      <img
        :src="this.previewImage + this.setCurrentShop.images[0].image_name"
        alt=""
        srcset=""
      />
    </div>
    <div class="after-hero">
      <div class="after-hero-wrapper pt-3">
        <Breadcrumb class="" />
        <h3 class="after-hero-title">{{ this.setCurrentShop.shop_title }}</h3>
        <span
          >{{ this.setCurrentShop.adresse }}
          {{ this.setCurrentShop.department.department_name }},
          {{ this.setCurrentShop.zip_code }}
        </span>
        <div class="after-hero-stars">
          <div v-for="star in 5" :key="star">
            <i
              v-if="star > Math.round(this.setCurrentShop.rating)"
              class="fa-regular fa-star"
            ></i>
            <i v-else class="fa-solid fa-star" style="color: #f2072b"></i>
          </div>
        </div>
        <div v-if="this.setCurrentShop.products" class="shop-products">
          <h2><b>nos produit</b></h2>
          <ul class="">
            <li
              v-for="product in this.setCurrentShop.products"
              :key="product.id"
            >
              <i class="fa-solid fa-check"></i> {{ product.product_name }}
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="shop-wrapper">
      <div class="shop-desc">
        <div class="shop-desc-container">
          <div class="">
            <p>{{ this.setCurrentShop.description }}</p>
          </div>
        </div>
        <div class="shop-info">
          <div class="shop-info-map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2737.4299181666224!2d-1.4400013233069364!3d46.67751525167163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48042555dcf502a3%3A0xdc43a33df073e0f2!2sARINFO%20La%20Roche-sur-Yon!5e0!3m2!1sfr!2sfr!4v1698059375670!5m2!1sfr!2sfr"
              width="400"
              height="300"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            >
            </iframe>

            <div class="shop-info-map-title">
              <h4>{{ this.setCurrentShop.shop_title }}</h4>
            </div>
            <div class="shop-info-map-adress">
              <span
                >{{ this.setCurrentShop.adresse }}
                {{ this.setCurrentShop.department.department_name }},
                {{ this.setCurrentShop.zip_code }}
              </span>
            </div>
            <div class="shop-info-map-number">
              <i class="fa-solid fa-phone"></i>
              <a href="">{{ this.setCurrentShop.phone_number }}</a>
            </div>
            <div class="shop-info-map-website">
              <i class="fa-solid fa-globe"></i>
              <a href="http://"> https:// {{ this.setCurrentShop.website }}</a>
            </div>
          </div>
        </div>
      </div>

      <div class="shop-review">
        <Reviews
          class=""
          :reviews="this.setCurrentShop.reviews"
          :shop_id="this.setCurrentShop.id"
        />
      </div>
    </div>
  </div>
</template>
<script>
import { useShopStore } from "../../stores/shopStore";
import { useUserStore } from "../../stores/userStore";
import { mapState } from "pinia";
import Breadcrumb from "../utils/Breadcrumb.vue";
import Reviews from "../reviews/Review.vue";
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from "swiper/vue";
// Import Swiper styles
import "swiper/css";
import "swiper/css/free-mode";
import "swiper/css/pagination";
// import required modules
import { FreeMode, Pagination } from "swiper/modules";

export default {
  data() {
    return {
      previewImage: "http://[::1]:5173/public/images/",
      previewImageStorage: "http://[::1]:5173/public/storage/",
      shop: "",
      modules: [FreeMode, Pagination],
    };
  },
  components: {
    Breadcrumb,
    Reviews,
    Swiper,
    SwiperSlide,
  },
  computed: {
    ...mapState(useUserStore, ["id"]),
    setCurrentShop() {
      const store = useShopStore();
      return store.getShopById(parseInt(this.$route.params.id));
    },
  },
  methods: {},
};
</script>



<style lang="scss" scoped>
@media (max-width: 425px) {
  .shop-desc {
    flex-direction: column-reverse;
  }
}
@media (max-width: 769px) {
  .shop-info{
    margin-top : 0; 
  }
  .shop-desc-container{
    width: 100%;
  }
  .shop-desc {
    flex-direction: column-reverse;
  }
}
iframe {
  width: 100%;
}
#map {
  height: 20vh;
  min-width: 300px;
  width: 100%;
  /* max-width: 800px; */
  margin: auto;
  //position: fixed;
  /* right: 5%; */
  border-radius: 5px;

  box-shadow: -1px 1px 9px 1px #ababab;
  -webkit-box-shadow: -1px 1px 9px 1px #ababab;
  -moz-box-shadow: -1px 1px 9px 1px #ababab;
}

.shop_hero {
  display: flex;
  height: 30vh;
}

.after-hero {
  border-bottom: 1px solid gray;
  // background: #FAFAFA;
}
.after-hero-wrapper {
  width: 80%;
  margin: 0 auto;
}
.after-hero-title {
  font-size: 2rem;
  font-weight: bold;
  margin: 0.5rem 0;
}

.after-hero-stars {
  display: flex;
  justify-content: space-between;
  width: 10%;
  margin: 0.5rem 0;
}

.shop-wrapper {
  background-color: #f4f4f4;
}

.shop-desc {
  display: flex;
  margin: 0 auto;
  gap: 2rem;
  justify-content: space-between;
  width: calc(85% - 2rem);
}

.shop_hero > img {
  width: 100%;
  height: 100%;
}

.shop-info {
  margin-top: -5%;
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

.shop-info-hours {
  background-color: white;
  padding: 1.5rem;
  border: 1px solid #fafafa;
}

.shop-info-hours > h4 {
  font-size: 1.5rem;
  font-weight: bold;
  text-transform: capitalize;
}

.shop-info-hours > div > span {
  font-weight: bold;
  text-transform: capitalize;
}

.shop-info-hours > div {
  display: flex;
  justify-content: space-between;
  width: 60%;
  gap: 1rem;
  margin: 1rem 0;
}

.shop-info-map {
  background-color: white;
  padding: 1.5rem;
  border: 1px solid #fafafa;
}

.shop-info > p {
  margin: 1rem;
  text-align: justify;
}

.shop-info-map-title {
  font-weight: bold;
  font-size: 1.5rem;
  margin-top: 1rem;
}

.shop-info-map-adress {
  margin-bottom: 1rem;
}

.shop-info-map-number > i {
  margin-right: 0.5rem;
}

.shop-info-map-website > i {
  margin-right: 0.5rem;
}

.shop-desc-container {
  padding: 2rem;
  text-align: justify;
  display: flex;
  flex-direction: column;
  gap: 2rem;
  width: 65%;
  // -webkit-line-clamp: 3;
}
.shop-desc-container > div > p {
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 6;
  overflow: hidden;
}

.shop-review {
  padding: 1rem;
  width: 85%;
  margin: 0 auto;
}

.shop-products > ul {
  display: flex;
  gap: 1rem;
  margin-top: 1rem;
  padding: 0;
}

.shop-products > h2 {
  font-size: 1.5rem;
  text-transform: capitalize;
}
.slider-img {
  width: 100%;
  height: 300px;
}
</style>