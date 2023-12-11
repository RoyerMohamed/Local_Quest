<template>
  <div>
    <h1 @click="getAllAdminShop" class="btn btn-primary">liste de commerces</h1>
    <div
      class="favoris_valide"
      v-if="Array.isArray(this.shops) && this.shops.length > 0"
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
            <th scope="col">Description</th>
            <th scope="col">images</th>
            <th scope="col">site internet</th>
            <th scope="col">Numero de Telephone</th>
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
            <td>{{ shop.description }}</td>
            <td>
              <img
                :src="
                  shop.images[0].image_name === 'default_shop.jpg'
                    ? this.previewImagePublic + shop.images[0].image_name
                    : this.previewImageStorage + shop.images[0].image_name
                "
                class=""
                alt=""
              />
            </td>
            <td>{{ shop.website }}</td>
            <td>{{ shop.phone_number }}</td>
            <td>
              <form @submit.prevent="shopUpdate">
                <button type="submit">Modifier</button>
              </form>
            </td>
            <td>
              <form @submit.prevent="deleteShop(shop.id)">
                <button type="submit">supprimer</button>
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
import axios from "axios";
export default {
  name: "ShopsBackOffice",
  data() {
    return {
      shops: [],
      previewImagePublic: "http://[::1]:5173/public/images/",
      previewImageStorage: "http://[::1]:5173/public/storage/",
    };
  },
  methods: {
    getAllAdminShop() {
      axios
        .get("http://127.0.0.1:8000/api/adminShops")
        .then((res) => {
          this.shops = res.data.Commerçants;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    deleteShop(id) {
      //const shopStore = useShopStore();
      axios
        .delete(`http://127.0.0.1:8000/api/adminShops/${id}`)
        .then((res) => {
          console.log(res);
          axios
        .get("http://127.0.0.1:8000/api/adminShops")
        .then((res) => {
          this.shops = res.data.Commerçants;
        })
        .catch((err) => {
          console.log(err);
        });
          // shopStore.getShopByUserId();
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>