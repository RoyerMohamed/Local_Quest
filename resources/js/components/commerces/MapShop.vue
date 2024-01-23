<template>
  <div id="map"></div>
</template>
  
  <script>
import { mapActions, mapState } from "pinia";
import { useUserStore } from "../../stores/userStore";
import { useShopStore } from "../../stores/shopStore";

export default {
  name: "MapShop",
  data() {
    return {
      previewImage: "http://[::1]:5173/public/images/",
      renderComponent: true,
    };
  },
  computed: {
    ...mapState(useUserStore, [
      "longitude",
      "latitude",
      "userLocationAnswered",
    ]),
    ...mapState(useShopStore, ["shops"]),
  },
  methods: {
    ...mapActions(useUserStore, ["setLocationAnswered", "setLocation"]),
    initMap() {
      let map = "";
      if (this.userLocationAnswered) {

        if (this.longitude) {
          map = L.map("map", {
            center: [this.latitude, this.longitude],
            zoom: 6,
          });

          L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            maxZoom: 19,
            attribution: "© OpenStreetMap",
          }).addTo(map);

          this.shops.forEach((shop) => {
            let fontAwesomeIcon = L.divIcon({
              // on crée un icône correspondant à celui choisi pour la catégorie
              //html: `${shop.category.category_icon}`,
              html: `<span style="text-shadow: 2px 2px 4px #fff;font-size: 2rem; color: ${shop.category.category_color}">${shop.category.category_icon}</span>`,
              iconSize: [200, 200],
              className: "dummy",
            });

            L.marker([shop.latitude, shop.longitude], {
              icon: fontAwesomeIcon,
            }).addTo(map);
          });
        } else {
          map = L.map("map", {
            center: [46.321829377357595, -0.4690948369241785],
            zoom: 6,
          });
          L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            maxZoom: 19,
            attribution: "© OpenStreetMap",
          }).addTo(map);

          console.log(this.shops);
          this.shops.forEach((shop) => {
            let fontAwesomeIcon = L.divIcon({
              // on crée un icône correspondant à celui choisi pour la catégorie
              html: `<span style="text-shadow: 2px 2px 4px #fff; color: ${shop.category.category_color}">${shop.category.category_name}</span>`,
              iconSize: [40, 40],
              className: "dummy",
            });

            L.marker([shop.latitude, shop.longitude], {
              icon: fontAwesomeIcon,
            }).addTo(map);
          });
        }
      }
    },
    async forceRerender() {
      // Remove MyComponent from the DOM
      this.renderComponent = false;

            // Wait for the change to get flushed to the DOM
      await this.$nextTick();

      // Add the component back in
      this.renderComponent = true;
    }
  },
  watch: {
    userLocationAnswered() {
      this.initMap();
    },
     shops(){
      console.log("tr");
      //this.removeMap()
      // this.initMap();
      this.$forceUpdate()
       this.forceRerender()
    
    }
  },
  mounted() {
    if (!this.userLocationAnswered) {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          (position) => {
            this.setLocationAnswered();
            this.setLocation({
              latitude: position.coords.latitude,
              longitude: position.coords.longitude,
            });
          },
          () => {
            this.setLocationAnswered();
          }
        );
      }
    } else {
      this.initMap();
    }
  },
};
</script>
  
  <style lang="css" scoped>
@media (max-width: 1100px) {
  #map {
    height: 40dvh !important;
    width: 100% !important;
    min-width: 300px;
    position: absolute !important;
    top:10%; 
  }
}
#map {
  height: 90vh;
  width: clamp(50% , 100% , 1200px);
  margin: auto;
  position: sticky;
  border-radius: 5px;
  box-shadow: -1px 1px 9px 1px #ababab;
  -webkit-box-shadow: -1px 1px 9px 1px #ababab;
  -moz-box-shadow: -1px 1px 9px 1px #ababab;
}
</style>