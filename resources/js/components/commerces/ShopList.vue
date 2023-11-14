<template>
    <div>
        <!-- <div>
            <h1 @click="location">localisation</h1>
        </div> -->
        <ShopFilter :allShops="this.shops" />


        <div class="shops-container">
            <div class="shop-list-card" v-if="this.shops">
                <Shop  v-for="shop in this.shops" :shop="shop" :key="shop.id" />
            </div>
            <div class="shop-list-map">
                <div style="height:600px; width:800px">
                    <l-map ref="map" v-model:zoom="zoom" v-model:center="center">
                        <l-tile-layer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"></l-tile-layer>
                        <l-marker v-for="shop in this.shops" :key="shop.id" :lat-lng="[shop.latitude, shop.longitude]">
                            <l-icon :icon-url="previewImage + shop.category.category_icon"
                                :icon-size="[45, 45]" />
                                <l-popup>
                                    <div class="row">
                                        <div class="col col-sm-6">   <img width="30" :src="previewImage + shop.images[0].image_name" alt=""></div>
                                        <div class="col col-sm-6"><h1>{{ shop.shop_title }}</h1></div>
                                    </div>
                                <p>{{ shop.category.category_name }}</p>
                                <h3>{{ shop.adresse }}</h3>
                                <div>
                               
                                </div>
                            </l-popup>
                        </l-marker>
                    </l-map>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import 'leaflet/dist/leaflet.css'; // Chargez également les styles CSS
import Shop from "./Shop.vue";
import ShopFilter from "./ShopFilter.vue";
import { useShopStore } from "../../stores/shopStore";
// import { useUserStore } from "../../stores/userStore";
import { mapState } from 'pinia';
import { ref } from 'vue';
import { LMap, LIcon, LMarker, LTileLayer, LPopup } from '@vue-leaflet/vue-leaflet';

export default {
    data() {
        return {
            map: null,
            userLatitude: null,
            userLongitude: null,
            zoom: ref(9),
            center: [48.925, 2.625],// init map in france 
            previewImage: "http://[::1]:5173/public/images/",
        }
    },
    computed: {
        ...mapState(useShopStore, ['shops']),

    }, components: {
        Shop,
        ShopFilter,
        LMap,
        LMarker,
        LTileLayer,
        LIcon,
        LPopup
    }, methods: {

    }
}
</script>

<style lang="scss" scoped>
.shops-container {
    display: flex;
    width: 90%;
    flex-wrap: wrap;
    margin: 2rem auto;
    gap: 2rem;
}

.shop-list-map {
    width: 30%;
    position: fixed;
    right: 10%;
}

.shop-list-card {
    width: 60%;
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
}
</style>