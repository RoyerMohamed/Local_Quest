<template>
  <div>
    <div class="addShop_wrapper">
      <form @submit.prevent="shopUpdate(this.shop.id)" enctype="multipart/form-data">
        <div class="addShop_shopName">
          <label for="">Identité</label>
          <input
            type="text"
            name=""
            id=""
            placeholder="Entrez l’identité du commerce"
            v-model="this.shop.shop_title"
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
              v-model="this.shop.adresse"
              placeholder="Adresse"
            />
            <input
              type="number"
              name=""
              id=""
              max="99999"
              v-model="this.shop.zip_code"
              placeholder="Code postale"
            />
            <input
              type="text"
              name="city"
              id=""
              v-model="this.shop.city"
              placeholder="Ville"
            />
          </div>
        </div>
        <div class="addShop_department">
          <label for="">Départment</label>
          <select name="department" v-model="selectDepartment">
            <optgroup label="departement du commmerce">
              <option selected="selected">
                {{ this.shop.department.department_name }}
              </option>
            </optgroup>
            <optgroup label="changer le departement du commmerce">
              <option
                :value="department.id"
                v-for="department in this.departments"
                :key="department.id"
              >
                {{ department.department_name }}
              </option>
            </optgroup>
            
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
              <div v-for="product in this.products" :key="product">
                <input
                  type="checkbox"
                  name="product"
                  id="checkbox"
                  :value="product.id"
                  v-model="products_id" 
                />
                <label for="scales">{{ product.product_name }}</label>
              </div>
            </div>
        </div>

        <div class="addShop_description">
          <label for="description">Description : </label>
          <textarea
            name="description"
            id=""
            v-model="this.shop.description"
          ></textarea>
        </div>

        <div class="assShop_image">
          <div class="assShop_image_img">

          </div>
          <label for="image">images </label>
          <input type="file" ref="image" name="image" />
        </div>

        <label for="">
          site internet
          <input type="url" name="" id="" v-model="this.shop.website" />
        </label>

        <label for=""> horaires d'ouverture personalisé </label>
        <label for="">
          Numero de Telephone
          <input type="number" v-model="this.shop.phone_number" />
        </label>
        <!-- latitude,longitude-->
        <div class="btn_validation">
          <button type="submit">modifier mon commerce</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "EditShop",
  data() {
    return {
      shop_id: this.$route.params.id,
      shop: [],
      selectDepartment: [],
      selectCategory : [],
      departments: [],
      categories : [], 
      products : [],
      products_id : []
    };
  },
  created() {
    axios
      .get(`http://127.0.0.1:8000/api/shops/${this.shop_id}`)
      .then((res) => {
        this.shop = res.data.shop;
      })
      .catch((err) => {
        console.log(err);
      });

    axios
      .get("http://127.0.0.1:8000/api/department")
      .then((res) => {
        this.departments = res.data.Departement;
      })

      .catch((err) => console.log(err));
      axios.get('http://127.0.0.1:8000/api/categories').then((res) => {
          this.categories = res.data.Categories
        }).catch((err) => console.log(err))

        axios.get('http://127.0.0.1:8000/api/products').then((res) => {
          this.products = res.data.Produits
        }).catch((err) => console.log(err))
  },
  methods: {
    shopUpdate(id) {
      axios.put(`http://127.0.0.1:8000/api/shops/${id}`,{shop_title: this.shop.shop_title,
              adresse: this.shop.adresse,
              category_id: this.selectCategory,
              department_id: this.selectDepartment,
              city: this.shop.city,
              description: this.shop.description,
              zip_code: this.shop.zip_code,
              website: this.shop.website,
              phone_number: this.shop.phone_number,
              longitude: this.shop.longitude,
              latitude: this.shop.latitude,
              image: this.$refs.image.files[0],
              products_id: this.products_id}).then((res) => {
          console.log(res);
        }).catch((err) => console.log(err))



      console.log({shop_title: this.shop.shop_title,
              adresse: this.shop.adresse,
              category_id: this.selectCategory,
              department_id: this.selectDepartment,
              city: this.shop.city,
              description: this.shop.description,
              zip_code: this.shop.zip_code,
              website: this.shop.website,
              phone_number: this.shop.phone_number,
              longitude: this.shop.longitude,
              latitude: this.shop.latitude,
              image: this.$refs.image.files[0],
              products_id: this.products_id});
    },
  },
};
</script>

<style lang="scss" scoped>
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
.addShop_department {
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
.addShop_description {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  margin: 1.5rem 0;
}
.addShop_description > textarea {
  height: 20vh;
}
</style>