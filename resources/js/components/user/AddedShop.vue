<template>
  <div
    class="favoris_valide"
    v-if="Array.isArray(this.userShop) && this.userShop.length > 0"
  >
    <div class="card" v-for="shop in this.userShop" :key="shop.id">
      <div class="header" >

        <img
        v-if="
          shop.images.length === 1 &&
          shop.images[0].image_name !== 'default_shop.jpg'
        "
        :src="this.previewImageStorage + shop.images[0].image_name"
        alt=""
      />
        <img
        v-else-if="
          shop.images.length === 1 &&
          shop.images[0].image_name === 'default_shop.jpg'
        "
        :src="this.previewImagePublic + shop.images[0].image_name"
        alt=""
      />
        <img
        v-else-if="
          shop.images.length > 1 &&
          shop.images[0].image_name !== 'default_shop.jpg'
        "
        :src="this.previewImageStorage + shop.images[0].image_name"
        alt=""
       
      />
    </div>
    <div class="info">
        
        <p class="title">{{ shop.shop_title }}</p>
        <p>
            {{ shop.adresse }} , {{ shop.zip_code }}
        </p>
      </div>
      <div class="footer">
        <router-link :to="`/commerce/${shop.id}`" class="action">voir</router-link>
        <router-link :to="`/editShop/${shop.id}`"  class="action">modifier</router-link>
      </div>
    </div>

  </div>
  <div class="favoris_valide" v-else>
    <h3>vous avez pas encore ajouter de commerce</h3>
  </div>
</template>

<script>
import { useShopStore } from "../../stores/shopStore";
import { mapState } from "pinia";
export default {
  name: "AddedShop",
  data(){
    return {
      previewImagePublic: "http://[::1]:5173/public/images/",
      previewImageStorage: "http://[::1]:5173/public/storage/",
    };
  }, 
  computed: {
    ...mapState(useShopStore, ["userShop"]),
  },
};
</script>

<style lang="scss" scoped>
.favoris_valide {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
  min-height: 100vh;
  justify-content: center;
  margin: 2rem 0;
}
.card {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  border-radius: 0.75rem;
  background-color: white;
  width: 300px;
  height: 370px;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
    0 2px 4px -2px rgba(0, 0, 0, 0.1);
}

.header {
  position: relative;
  background-clip: border-box;
  margin-top: 1.5rem;
  margin-left: 1rem;
  margin-right: 1rem;
  border-radius: 0.75rem;
  height: 14rem;
  display: flex;
  justify-content: center;
  align-items: center;
}
.header > img{
  width: 200px;
  height: 150px;
}

.info {
  border: none;
  padding: 1.5rem;
  text-align: center;
}

.title {
  color: rgb(38 50 56);
  letter-spacing: 0;
  line-height: 1.375;
  font-weight: 600;
  font-size: 1.25rem;
  margin-bottom: 0.5rem;
}

.footer {
  padding: 0.75rem;
  border: 1px solid rgb(236 239 241);
  display: flex;
  align-items: center;
  justify-content: space-between;
  background-color: rgba(0, 140, 255, 0.082);
}

.tag {
  font-weight: 300;
  font-size: 0.75rem;
  display: block;
}

.action {
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
  border: none;
  outline: none;
  box-shadow: 0 4px 6px -1px rgba(33, 150, 243, 0.4),
    0 2px 4px -2px rgba(33, 150, 243, 0.4);
  color: rgb(255 255 255);
  text-transform: uppercase;
  font-weight: 700;
  font-size: 0.75rem;
  padding: 0.75rem 1.5rem;
  background-color: rgb(33 150 243);
  border-radius: 0.5rem;
}
</style>