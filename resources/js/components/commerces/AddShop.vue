<template>
  <ValidationErrors
    :errors="this.validationErrors"
    v-if="this.validationErrors"
  />
  <ValidationResponse
    :message="this.validationResponse"
    v-if="this.validationResponse"
  />
  <div class="addShop">
    <div class="addShop_title">
      <div><h1>Suggérer un commerçant</h1></div>
      <div>
        <p>
          Lorem ipsum dolor sit amet consectetur adipiscing elit nunc commodo
          ornare, lobortis cubilia ultrices odio luctus sed conubia.
        </p>
      </div>
    </div>
    <div class="addShop_wrapper">
      <form @submit.prevent="handleForm" enctype="multipart/form-data">
        <div class="addShop_shopName">
          <label for="">Identité</label>
          <input
            type="text"
            name=""
            id=""
            placeholder="Entrez l’identité du commerce"
            v-model="shop_title"
          />
        </div>

        <div class="addShop_adresse">
          <div class="addShop_adresse_label">
            <label for="adresse">Adresse</label>
          </div>
          <div class="addShop_adresse_inputs">
            <input
              type="text"
              name="adresse"
              id=""
              v-model="adresse"
              placeholder="Adresse"
            />
            <input
              type="number"
              name=""
              id=""
              max="99999"
              v-model="zipCode"
              placeholder="Code postale"
            />
            <input
              type="text"
              name="city"
              id=""
              v-model="ville"
              placeholder="Ville"
            />
          </div>
        </div>
        <div class="addShop_department">
          <label for="">Départment</label>
              <select name="department" v-model="selectDepartment">
                <option :value="null"></option>
                <option
                  :value="department.id"
                  v-for="department in this.departments"
                  :key="department.id"
                >
                  {{ department.department_name }}
                </option>
              </select>
        </div>
        <div class="addShop_category">
          <label for="category">Type de commerce</label>

          <select name="categories" v-model="selectCategory">
            <option id="placeholderValue" value="" disabled selected>
              Type de commerce
            </option>
            <option
              :value="categorie.id"
              v-for="categorie in this.categories"
              :key="categorie.id"
            >
              {{ categorie.category_name }}
            </option>
          </select>
        </div>
        <div class="addShop_product">
          <!-- a voir  -->
          <label for="product"> Products </label>
          <div class="filter_product">
            <div v-for="product in products" :key="product" >
              <input type="checkbox" name="product" id="checkbox" :value="product.id"  v-model="products_id"/>
              <label for="scales">{{ product.product_name }}</label>
            </div>
          </div>
        </div>

        <div class="addShop_description">
          <label for="description">Description : </label>
          <textarea name="description" id="" v-model="description"></textarea>
        </div>

        <div class="assShop_image">
          <label for="image">images </label>
          <input type="file" ref="image" name="image" />
        </div>

        <label for="">
          site internet
          <input type="url" name="" id="" v-model="web_site" />
        </label>

        

        <label for="">
          horaires d'ouverture proposé
          <select name="" v-model="selectOpeningHours">
            <optgroup
              :label="openingHours.day"
              v-for="openingHours in this.OpeningHours"
              :key="openingHours.id"
            >
              <option :value="openingHours.morning_opening_hour">
                {{ openingHours.morning_opening_hour }}
              </option>
              <option :value="openingHours.morning_closing_hour">
                {{ openingHours.morning_closing_hour }}
              </option>
              <option :value="openingHours.afternoon_opening_hour">
                {{ openingHours.afternoon_opening_hour }}
              </option>
              <option :value="openingHours.afternoon_closing_hour">
                {{ openingHours.afternoon_closing_hour }}
              </option>
            </optgroup>
          </select>
        </label>
        <label for=""> horaires d'ouverture personalisé </label>
        <label for="">
          Numero de Telephone
          <input type="number" v-model="phone_number" />
        </label>
        <!-- latitude,longitude-->
        <div class="btn_validation">
          <button type="submit">Ajouté mon commerce</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from "pinia";
import { useShopStore } from "../../stores/shopStore";
import { useUserStore } from "../../stores/userStore";
import ValidationErrors from "../utils/ValidationErrors.vue";
import ValidationResponse from "../utils/ValidationResponse.vue";
import axios from "axios";

export default {
  name: "AddShop",
  components: { ValidationErrors, ValidationResponse },
  data() {
    return {
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
      products_id : []
    };
  },
  computed: {
    ...mapState(useShopStore, [
      "categories",
      "departments",
      "products",
      "OpeningHours",
    ]),
    ...mapState(useUserStore, ["id"]),
  },
  methods: {
    ...mapActions(useShopStore, ["addShop"]),

    async handleForm() {
      this.formData.append("image", this.$refs.image.files[0]);
      console.log(this.products_id);
      console.log(this.formData.get("image"));

      await axios
        .get(
          `https://nominatim.openstreetmap.org/search?street=${this.adresse}&city=${this.ville}&county=france&postalcode=${this.zipCode}&format=json`
        )
        .then((res) => {
          console.log(res.data[0].boundingbox);
          this.validationErrors = "";
          this.longitude = res.data[0].boundingbox[2];
          this.latitude = res.data[0].boundingbox[0];
        })
        .catch((err) => {
          this.validationErrors = err.response.data[0].errors;
        });

      if (this.longitude && this.latitude) {
        axios
          .post(
            `http://127.0.0.1:8000/api/shops`,
            {
              shop_title: this.shop_title,
              adresse: this.adresse,
              category_id: this.selectCategory,
              department_id: this.selectDepartment,
              city: this.ville,
              description: this.description,
              zip_code: this.zipCode,
              website: this.web_site,
              phone_number: this.phone_number,
              longitude: this.longitude,
              latitude: this.latitude,
              image: this.$refs.image.files[0],
              products_id :this.products_id
            },
            {
              headers: {
                "Content-Type": "multipart/form-data",
              },
            }
          )
          .then((res) => {
            this.validationResponse = res.data.message;
          })
          .catch((err) => (this.validationErrors = err));

        // this.addShop({
        //   shop_title: this.shop_title,
        //   adresse: this.adresse,
        //   category_id: this.selectCategory,
        //   department_id: this.selectDepartment,
        //   city: this.ville,
        //   description: this.description,
        //   zip_code: this.zipCode,
        //   website: this.web_site,
        //   phone_number: this.phone_number,
        //   longitude: this.longitude,
        //   latitude: this.latitude,
        // });
      }
    },
  },
};
</script>

<style lang="css" scoped>
input,
select,
textarea {
  min-height: 3rem;
  border-radius: 5px;
  padding: 1rem;
}
label {
  font-size: 1.25rem;
  font-weight: 600;
}
.addShop {
  display: flex;
  flex-direction: column;
  align-items: center;
}
.addShop_title {
  width: 40vw;
}
.addShop_title h1 {
  font-size: 1rem;
}
.addShop_wrapper {
  width: 40vw;
  background-color: #edeae1;
  padding: 2rem;
  border-radius: 15px;
}
.addShop_shopName {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  margin: 1.5rem 0;
}
.addShop_adresse {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  margin: 1.5rem 0;
}
.addShop_adresse_inputs {
  display: flex;
  justify-content: space-between;
  gap: 1rem;
}
.addShop_adresse_inputs input:nth-child(1) {
  width: 45%;
}
.addShop_adresse_inputs input:nth-child(2),
.addShop_adresse_inputs input:nth-child(3) {
  width: 30%;
}
.addShop_department{
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  margin: 1.5rem 0;
}
.addShop_category {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  margin: 1.5rem 0;
}
.addShop_category select {
  padding: 0.5rem;
}
.filter_product > div {
  display: flex;
  align-items: center;
  gap: 1rem;
  flex-basis: 25%;
}
.filter_product {
  display: flex;
  flex-wrap: wrap;

}
.addShop_description{
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  margin: 1.5rem 0;
}
.addShop_description > textarea{
height: 20vh;
}

</style>