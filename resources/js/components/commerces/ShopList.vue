<template>
  <div class="ShopContent">
    <div>
        <MapShop />
      </div>
    <div class="ShopContent_map">
      <div class="ShopContent_filter">
      <ShopFilter :allShops="this.shops" />
    </div>
      <div class="shop-list-card" v-if="this.shops">
        <Shop v-for="shop in this.shops" :shop="shop" :key="shop.id" />
      </div>
     
    </div>
  </div>
</template>

<script>
import { mapState } from "pinia";
import MapShop from "./MapShop.vue";
import ShopFilter from "./ShopFilter.vue";
import Shop from "./Shop.vue";
import { useShopStore } from "../../stores/shopStore";

export default {
  name: "Commerces",
  components: {
    MapShop,
    ShopFilter,
    Shop,
  },
  computed: {
    ...mapState(useShopStore, ["shops"]),
  },
};
</script>

<style lang="scss" scoped>
.ShopContent_map{
  display: flex;
}
</style>