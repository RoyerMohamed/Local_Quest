<template>
  <div class="toto">
    <div id="map"></div>
  </div>
</template>
  
  <script>
import { mapActions, mapState } from "pinia";
import { useUserStore } from "../../stores/userStore";
import { useShopStore } from "../../stores/shopStore";

export default {
  name: "MapShop",
  data(){
    return{
      previewImage: "http://[::1]:5173/public/images/",
    }
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
            zoom: 13,
          });
          
          L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            maxZoom: 19,
            attribution: "© OpenStreetMap",
          }).addTo(map);
          
          this.shops.forEach((shop) => {
            
              let fontAwesomeIcon = L.divIcon({
                // on crée un icône correspondant à celui choisi pour la catégorie
                html: `<<img src="${this.previewImage + shop.category.category_icon}"/>>`,
                html: `<span>${shop.category.category_icon}</span>`,
                iconSize: [60, 60],
                className: 'dummy',
          });

          L.marker([shop.latitude, shop.longitude],{icon: fontAwesomeIcon}).addTo(map);

          });

         
        } else {
          map = L.map("map", {
            center: [46.321829377357595, -0.4690948369241785],
            zoom: 13,
          });
          L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            maxZoom: 19,
            attribution: "© OpenStreetMap",
          }).addTo(map);
          
          console.log(this.shops);
          this.shops.forEach((shop) => {
            let fontAwesomeIcon = L.divIcon({
            // on crée un icône correspondant à celui choisi pour la catégorie
            html: `<span style="text-shadow: 2px 2px 4px #fff; color: ${shop.category.category_color}"><img src='${this.previewImage +shop.category.category_icon }' alt="${shop.category.category_name}"/></span>`,
            iconSize: [40, 40],
          });

          L.marker([shop.latitude, shop.longitude], {
            icon: fontAwesomeIcon,
          }).addTo(map);
          });
        }
      }
    },
  },
  watch: {
    userLocationAnswered() {
      this.initMap();
    },
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
#map {
  height: 75vh;
  min-width: 300px;
  width: 50vw;
  max-width: 800px;
  margin: auto;
  position: fixed;
  right: 5%;
  border-radius: 5px;

  box-shadow: -1px 1px 9px 1px #ABABAB;
-webkit-box-shadow: -1px 1px 9px 1px  #ABABAB;
-moz-box-shadow: -1px 1px 9px 1px #ABABAB;
}

</style>