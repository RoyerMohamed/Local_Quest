<template >
  <ValidationErrors
    :errors="this.validationErrors"
    v-if="this.validationErrors"
  />
  <ValidationResponse
    :message="this.validationResponse"
    v-if="this.validationResponse"
  />
  <div class="profil">
    <h1>Profil</h1>
    <div class="profil_wrapper">
      <div class="profil_infos">
        <form @submit.prevent="userUpdate" enctype="multipart/form-data">
          <h3 class=""><strong>Vos informations</strong></h3>
          <div class="mb-3">
            <input
              type="text"
              class="form-control"
              id="pseudo"
              placeholder="pseudo"
              v-model="user_name"
              @change="this.changeUser_name = true"
            />
          </div>
          <div class="mb-3">
            <input
              type="email"
              placeholder="email"
              class="form-control"
              id="email"
              v-model="email"
              @change="this.changeEmail = true"
            />
          </div>
          <div class="profil_edit-import-img">
            <img v-bind:src="this.previewImage + this.image" alt="" srcset="" />
            <input ref="fileInput" type="file" name="image" />
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>

      <div class="profil_password">
        
        <form @submit.prevent="updatePassword">
          <h3 class=""><strong>Modifier votre mot de passe</strong></h3>
          <div class="mb-3">
           
            <input
              name="currentPassword"
              placeholder="Mot de pass actuel"
              type="password"
              class="form-control"
              id="currentPassword"
              v-model="this.password"
            />
          </div>
          <div class="mb-3">
          
            <input
              name="new_password"
              placeholder="Nouveau mot de pass"
              type="password"
              @keyup="validationMotDePass"
              class="form-control"
              id="new_password"
              v-model="this.new_password"
            />
          </div>
          <div class="mb-3">
           
            <input
              name="new_password_confirmation"
              placeholder="Confirmation du nouveau mot de pass"
              type="password"
              class="form-control"
              id="new_password_confirmation"
              v-model="this.new_password_confirmation"
            />
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
      <div class="">
        <h2>liste de commerce ajouté</h2>
        <div
          class="favoris_valide"
          v-if="Array.isArray(this.userShop) && this.userShop.length > 0"
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
              <tr v-for="shop in this.userShop" :key="shop.id">
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
                  <router-link :to="`/editShop/${shop.id}`"
                    >modifier</router-link
                  >
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
    </div>
  </div>
</template>

<script>
import { mapWritableState, mapActions, mapState } from "pinia";
import { useUserStore } from "../../stores/userStore";
import { useShopStore } from "../../stores/shopStore";
import ValidationErrors from "../utils/ValidationErrors.vue";
import ValidationResponse from "../utils/ValidationResponse.vue";
import axios from "axios";

export default {
  name: "Profil",
  components: { ValidationErrors, ValidationResponse },
  data() {
    return {
      previewImage: "http://[::1]:5173/public/images/",
      validationErrors: "",
      validationResponse: "",
      password: "",
      new_password: "",
      new_password_confirmation: "",
      formData: new FormData(),
      changeEmail: false,
      changeUser_name: false,
      previewImagePublic: "http://[::1]:5173/public/images/",
      previewImageStorage: "http://[::1]:5173/public/storage/",
      // en faire un composent
      shop_title: "",
      adresse: "",
      selectCategory: "",
      selectDepartment: "",
      ville: "",
      description: "",
      zipCode: "",
      web_site: "",
      selectOpeningHours: "",
      phone_number: "",
      longitude: "",
      latitude: "",
      validationErrors: "",
      validationResponse: "",
      formData: new FormData(),
      products_id: [],
    };
  },
  components: {
    ValidationErrors,
    ValidationResponse,
  },
  computed: {
    ...mapWritableState(useUserStore, ["id", "user_name", "email", "image"]),
    ...mapState(useShopStore, ["userShop"]),
  },
  methods: {
    ...mapActions(useUserStore, ["setUser", "setUserImage"]),
    ...mapActions(useShopStore, ["setShop"]),
    deleteShop(id) {
      const shopStore = useShopStore();
      axios
        .delete(`http://127.0.0.1:8000/api/shops/${id}`)
        .then((res) => {
          shopStore.getShopByUserId();
        })
        .catch((err) => {
          console.log(err);
        });
    },
    userUpdate() {
      if (this.changeEmail || this.changeUser_name) {
        const params = {};
        this.changeEmail ? (params.email = this.email) : "";
        this.changeUser_name ? (params.user_name = this.user_name) : "";

        axios
          .put(`http://127.0.0.1:8000/api/users/${this.id}`, params)
          .then((res) => {
            this.setUser(res.data.user);
            this.validationResponse = res.data.message;
            this.validationErrors = "";
            //console.log( res.data.message);
            //this.$router.push('/')
          })
          .catch((err) => {
            this.validationResponse = "";
            //console.log(err);
            this.validationErrors = err.response.data[0].errors;
          });
      }

      if (this.$refs.fileInput.files[0] !== undefined) {
        this.formData.append("image", this.$refs.fileInput.files[0]);

        axios
          .post(
            `http://127.0.0.1:8000/api/users/updateImage/${this.id}`,
            this.formData,
            { "content-type": "multipart/form-data" }
          )
          .then((res) => {
            this.setUserImage(res.data.userImage);
          })
          .catch((err) => {
            // this.validationResponse = ""
            console.log(err);
            this.validationErrors = err.response.data[0].errors;
          });
      }
    },
    updatePassword() {
      console.log(this.new_password === this.new_password_confirmation);

      axios
        .put(`http://127.0.0.1:8000/api/update-password/${this.id}?`, {
          password: this.password,
          new_password: this.new_password,
          new_password_confirmation: this.new_password_confirmation,
        })
        .then((res) => {
          console.log(res);
          this.validationResponse = res.data.message;
          this.validationErrors = "";
        })
        .catch((err) => {
          console.log(err);
          this.validationResponse = "";
          this.validationErrors = err.response.data;
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.profil_wrapper {
  width: 35%;
  background-color: #edeae1;
  margin: 0 auto;
  padding: 2rem;
}
.profil_infos > form > h3{
  margin-bottom: 1.5rem;
}
.profil_infos > form > div > input{
  padding: .75rem;
}
.profil_edit-import-img{
  display: flex;
  align-items: center;
  gap: 1rem;
  margin: 1rem 0;
}
.profil_infos > form > div > img{
  width: 100px;
  border-radius: 50%;
}
.profil {
  background-color: #f4f1e9;
  min-height: 90vh;
}
.profil_password > form > h3{
  margin-bottom: 1.5rem;
}
.profil_password > form > div > input{
  padding:.75rem;
}
</style>