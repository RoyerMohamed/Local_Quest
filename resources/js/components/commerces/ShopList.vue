<template>
  <div class="ShopContent">
    <div class="ShopContent-info">
      <div class="ShopContent_filter">
        <ShopFilter  :allShops="this.shops" />
      </div>
     
      <div class="shop-list-card "  v-if="this.shops.length >= 0">
        <Shop v-for="shop in this.shops" :shop="shop" :key="shop.id" />
      </div>
      <div class="shop-list-card " v-else>
        <h3>pas de commerces trouvé</h3>
      </div>
    </div>

    <div class="ShopContent-map ">
      <MapShop />
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
.ShopContent {
  display: flex;
}
.shop-list-card{
  display: flex;
  flex-wrap: wrap;
  gap: .5rem;
  padding: 0 1rem

}
.ShopContent-info {
  width: 50%;
}
.ShopContent-map {
  width: 50%;
}
</style>