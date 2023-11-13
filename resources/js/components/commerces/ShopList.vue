<template>
    <div>
        <!-- <div>
            <h1 @click="location">localisation</h1>
        </div> -->
        <ShopFilter />


        <div class="shops-container">
            <div class="shop-list-card">
                <Shop v-if="this.shops" v-for="shop in this.shops" :shop="shop" />

            </div>
            <div class="shop-list-map">
                <div style="height:600px; width:800px">
                    <l-map ref="map" v-model:zoom="zoom" v-model:center="center">
                        <l-tile-layer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"></l-tile-layer>
                        <l-marker v-for="shop in this.shops" :key="shop.id" :lat-lng="[shop.latitude, shop.longitude]">
                            <l-icon :icon-url="previewImage + shop.images[0].image_name"
                                :icon-size="[45, 45]" />
                            <l-popup>
                                <h1>{{ shop.shop_title }}</h1>
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
import Shop from "../commerces/shop.vue";
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
            zoom: ref(6),
            center: [48.8534100, 2.3488000],// init map in france 
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