<template>
    <div id="shop">
        <div class="shop_hero">
            <img :src="this.previewImage + this.setCurrentShop.images[0].image_name" alt="" srcset="">
            <img :src="this.previewImage + this.setCurrentShop.images[0].image_name" alt="" srcset="">
            <img :src="this.previewImage + this.setCurrentShop.images[0].image_name" alt="" srcset="">
            <img :src="this.previewImage + this.setCurrentShop.images[0].image_name" alt="" srcset="">
        </div>
        <div class="after-hero ">
            <div class="container pt-3">
                <Breadcrumb class="" />
                <h3 class="after-hero-title">{{ this.setCurrentShop.shop_title }}</h3>
                <span>{{ this.setCurrentShop.adresse }} {{ this.setCurrentShop.department.department_name }}, {{
                    this.setCurrentShop.zip_code }}</span>
                <div class="after-hero-stars">
                    <div v-for="star in 5" :key="star">
                        <i v-if="star > Math.round(this.setCurrentShop.rating)" class="fa-regular fa-star"></i>
                        <i v-else class="fa-solid fa-star" style="color: #f2072b;"></i>
                    </div>
                </div>
                <div v-if="this.setCurrentShop.products" class="shop-products">
                    <h2><b>nos produit</b></h2>
                    <ul class="">
                        <li v-for="product in this.setCurrentShop.products" :key="product.id"><i class="fa-solid fa-check"></i> {{
                            product.product_name }}</li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="shop-wrapper">
            <div class="shop-desc">
                <div class="shop-desc-container">

                    <div class="">
                        <p> {{ this.setCurrentShop.description }}</p>
                    </div>



                </div>
                <div class="shop-info">
                    <div class="shop-info-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2737.4299181666224!2d-1.4400013233069364!3d46.67751525167163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48042555dcf502a3%3A0xdc43a33df073e0f2!2sARINFO%20La%20Roche-sur-Yon!5e0!3m2!1sfr!2sfr!4v1698059375670!5m2!1sfr!2sfr"
                            width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                        <div class="shop-info-map-title">
                            <h4>{{ this.setCurrentShop.shop_title }}</h4>
                        </div>
                        <div class="shop-info-map-adress ">
                            <span>{{ this.setCurrentShop.adresse }} {{ this.setCurrentShop.department.department_name }}, {{
                                this.setCurrentShop.zip_code }} </span>

                        </div>
                        <div class="shop-info-map-number">
                            <i class="fa-solid fa-phone"></i> <a href="">{{ this.setCurrentShop.phone_number }}</a>

                        </div>
                        <div class="shop-info-map-website">
                            <i class="fa-solid fa-globe"></i> <a href="http://"> https:// {{ this.setCurrentShop.website
                            }}</a>
                        </div>


                    </div>
                    <div class="shop-info-hours">
                        <h4>heurs d'ouverture </h4>
                        <div v-for="opening_hours in this.setCurrentShop.opening_hours" :key="opening_hours.id">
                            <span>{{ opening_hours.day }}</span>
                            <ul>
                                <li> {{ opening_hours.morning_opening_hour }} - {{
                                    opening_hours.morning_closing_hour }}</li>
                                <li>{{ opening_hours.afternoon_opening_hour }} - {{
                                    opening_hours.afternoon_closing_hour }}</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

            <div class="shop-review">
                <Reviews class="" :reviews="this.setCurrentShop.reviews" :shop_id="this.setCurrentShop.id" />
            </div>

        </div>

    </div>
</template>
<script>
import { useShopStore } from '../../stores/shopStore'
import { useUserStore } from '../../stores/userStore'
import { mapState } from 'pinia'
import Breadcrumb from '../utils/Breadcrumb.vue'
import Reviews from '../reviews/Review.vue'

export default {
    data() {
        return {
            previewImage: "http://[::1]:5173/public/images/",
            shop: ''
        }
    }, components: {
        Breadcrumb,
        Reviews
    }
    , computed: {
        ...mapState(useUserStore, ["id"]),
        setCurrentShop() {
            const store = useShopStore();
            // this.shop = store.getShopById(parseInt(this.$route.params.id))
            console.log(this.id);
            return store.getShopById(parseInt(this.$route.params.id));
        }
    }, methods: {

    }

}
</script>



<style lang="scss" scoped>
.shop_hero {
    display: flex;
    height: 30vh;

}

.after-hero {
    border-bottom: 1px solid gray;
    // background: #FAFAFA;
}

.after-hero-title {
    font-size: 2rem;
    font-weight: bold;
    margin: .5rem 0;
}

.after-hero-stars {
    display: flex;
    justify-content: space-between;
    width: 10%;
    margin: .5rem 0;
}

.shop-wrapper {
    background-color: #F4F4F4;
}

.shop-desc {
    display: flex;
    width: 80vw;
    margin: 0 auto;
    gap: 2rem;

}

.shop_hero>img {
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

.shop-info-hours>h4 {
    font-size: 1.5rem;
    font-weight: bold;
    text-transform: capitalize;
}

.shop-info-hours>div>span {

    font-weight: bold;
    text-transform: capitalize;
}

.shop-info-hours>div {

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

.shop-info>p {
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

.shop-info-map-number>i {
    margin-right: .5rem;
}

.shop-info-map-website>i {
    margin-right: .5rem;
}

.shop-desc-container {
    padding: 2rem;
    text-align: justify;
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.shop-review {
    padding: 1rem;
    width: 85%;
    margin: 0 auto;
}

.shop-products>ul {
    display: flex;
    gap: 1rem;
    margin-top: 1rem;

}

.shop-products>h2 {
    font-size: 1.5rem;
    text-transform: capitalize;

}</style>