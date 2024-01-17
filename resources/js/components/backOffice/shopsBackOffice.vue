<template>
 <ValidationErrors
      :errors="this.validationErrors"
      v-if="this.validationErrors"
    />
    <ValidationResponse
      :message="this.validationResponse"
      v-if="this.validationResponse"
    />
  <!-- message de validation checkbox -->
  <div>
    <h1 @click="getAllAdminShop" class="btn btn-primary">liste de commerces</h1>
    <div
      class="favoris_valide"
      v-if="Array.isArray(this.shops) && this.shops.length > 0 && this.toggle"
      :style="this.show"
    >
      <table class="table">
        <thead>
          <tr>
            <th scope="col">numeros du commerce</th>
            <th scope="col">Identité</th>
            <th scope="col">Adresse</th>
            <th scope="col">Ville</th>
            <th scope="col">Code postal</th>
            <th scope="col">Départment</th>
            <th scope="col">Type de commerce</th>
            <th scope="col">Products</th>      
            <th scope="col">images</th>
            <th scope="col">site internet</th>
            <th scope="col">Numero de Telephone</th>
            <th scope="col"> Validé </th>
            <th scope="col">Modifier</th>
            <th scope="col">supprimer</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="shop in this.shops" :key="shop.id">
            <th scope="row">{{ shop.id }}</th>
            <td>
              <input type="text" v-model="shop.shop_title" />
            </td>
            <td>{{ shop.adresse }}</td>
            <td>{{ shop.city }}</td>
            <td>{{ shop.zip_code }}</td>
            <td>{{ shop.department.department_name }}</td>
            <td>{{ shop.category.category_name }}</td>
            <td>
              <span v-for="product in shop.products" :key="product.id">{{
                product.product_name + "\n"
              }}</span>
            </td>
            <td>
             
              <img v-if="shop.images[0] "
                :src="
                  shop.images[0].image_name === 'default_shop.jpg'
                    ? this.previewImagePublic + shop.images[0].image_name
                    : this.previewImageStorage + shop.images[0].image_name
                "
                class=""
                alt=""
              />
              <p v-else> Aucune image trouvé</p>
            </td>
            <td>{{ shop.website }}</td>
            <td>{{ shop.phone_number }}</td>
            
            <td class=""> <input type="checkbox" class="form-check-input"  :checked="shop.shop_status" @click="getId(shop.id)" @change="updateStatus" />  </td>
            <td>
                <router-link :to="`/editShop/${shop.id}`" ><button type="button" class="btn btn-warning">Modifier</button></router-link>
            </td>
            <td>
              <form @submit.prevent="deleteShop(shop.id)">
                <button class="btn btn-danger" type="submit">supprimer</button>
              </form>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="favoris_valide" v-else>
      <h3>vous avez pas encore ajouter de commerce</h3>
    </div>
  </div>
</template>

<script>
import ValidationErrors from "../utils/ValidationErrors.vue";
import ValidationResponse from "../utils/ValidationResponse.vue";
import {mapWritableState , mapActions } from 'pinia'
import { useShopStore } from '../../stores/shopStore';
import axios from "axios";
export default {
  name: "ShopsBackOffice",
 
  data() {
    return {
      previewImagePublic: "http://[::1]:5173/public/images/",
      previewImageStorage: "http://[::1]:5173/public/storage/",
      toggle:false,
      show:"display : none", 
      shop_id : "",
      validationErrors: "",
      validationResponse: "",
    };
  },
  components: { ValidationErrors, ValidationResponse },
  computed: {
    ...mapWritableState(useShopStore , ["shops"]), 
  },
  methods: {
    ...mapActions(useShopStore, ['setShops']),
    getId(id){
      this.shop_id = id; 
    },
    updateStatus(event){
      const newValue = event.target.checked;
      
      axios.put(`http://127.0.0.1:8000/api/editShopStatus/${this.shop_id}`,
      {
        shop_status : newValue
      } 
      ).then((res)=>{
        let index =  this.shops.findIndex(shop => shop.id === this.shop_id);
       
        this.shops[index] = res.data.commercant
        this.setShops(this.shops); 
      }).catch((err)=>{
        console.log(err);
      })
    }, 

    getAllAdminShop() {

      if (this.show == "display : none" ) {
        this.show = "display : flex"
      }else{
        this.show = "display : none"
      }
      this.toggle = !this.toggle
     
    },
    deleteShop(id) {
      //const shopStore = useShopStore();
      axios
        .delete(`http://127.0.0.1:8000/api/shops/${id}`)
        .then((res) => {
         this.setShops(this.shops.filter(shop => shop.id !== id));
         this.validationErrors = ""; 
         this.validationResponse = res.data.message;
        })
        .catch((err) => {
          this.validationResponse = '';
          this.validationErrors = err.response.data[0].errors;
        });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>