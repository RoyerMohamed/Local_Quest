<template>
  <div class="shop-filters">
    <form action="">
      <div class="shop-filters-top">
        <div class="shop-filters-top-produit">
          <form @submit.prevent="sort" action="">
            <!-- filter by departments -->
            <div class="filter_department">
              <select name="department" v-model="selectDepartment">
                <option :value="null"></option>
                <option
                  :value="department.id"
                  v-for="department in this.departments"
                >
                  {{ department.department_name }}
                </option>
              </select>
            </div>
            <!-- filter by category -->
            <div class="filter_category">
              <select name="categories" v-model="selectCategory">
                <option :value="null"></option>
                <option
                  :value="categorie.id"
                  v-for="categorie in this.categories"
                >
                  {{ categorie.category_name }}
                </option>
              </select>
            </div>
            <!-- filter by opening hours -->
            <!-- <div class="filter_openingHours">
                            <select name="" v-model="selectOpeningHours">
                                <optgroup :label="openingHours.day" v-for="openingHours in this.OpeningHours">
                                    <option :value="openingHours.morning_opening_hour">{{ openingHours.morning_opening_hour
                                    }}</option>
                                    <option :value="openingHours.morning_closing_hour">{{ openingHours.morning_closing_hour
                                    }}</option>
                                    <option :value="openingHours.afternoon_opening_hour">{{
                                        openingHours.afternoon_opening_hour }}</option>
                                    <option :value="openingHours.afternoon_closing_hour">{{
                                        openingHours.afternoon_closing_hour }}</option>
                                </optgroup>
                            </select>
                        </div> -->

            <div class="search">
              <input
                type="search"
                name="shop_title"
                id=""
                v-model="shop_title"
              />
            </div>

            <div class="filter_product">
              <div class="filter_products_selected">
                <span
                  v-for="product in checkValues"
                  :key="product"
                  class="badge rounded-pill bg-success"
                  >{{ product }}</span
                >
              </div>
              <div class="filter_products_list">
                <div v-for="product in products" :key="product">
                  <input
                    type="checkbox"
                    name="product"
                    @click="selectedProductsHandler(product.product_name)"
                  />
                  <label for="scales">{{ product.product_name }}</label>
                </div>
              </div>
            </div>

            <button type="submit">filtré</button>
          </form>

          <form @submit.prevent="resetFilter">
            <button type="submit">reset filters</button>
          </form>
        </div>
        <div class="shop-filters-top-departement"></div>
        <div class="shop-filters-top-region"></div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapState, mapActions, mapWritableState } from "pinia";
import { useShopStore } from "../../stores/shopStore";
import axios from "axios";

export default {
  data() {
    return {
      selectDepartment: null,
      selectCategory: null,
      shop_title: null,
      checkValues: [],
      sortedShops: [],

    };
  },props:['allShops'],
  computed: {
    ...mapState(useShopStore, [
      "departments",
      "categories",
      "OpeningHours",
      "products",
      "getFilteredShopByProducts",
    ]),
    ...mapWritableState(useShopStore, ["shops"]),
  },
  methods: {
    ...mapActions(useShopStore, ["filterShops", "setShop"]),

    sort() {
      // console.log(typeof this.selectDepartment , typeof this.selectCategory  , typeof this.shop_title );
      if (
        this.selectDepartment !== null ||
        this.selectCategory !== null ||
        this.shop_title !== null
      ) {
        this.filterShops({
          department_id:
            this.selectDepartment === null ? null : this.selectDepartment,
          category_id:
            this.selectCategory === null ? null : this.selectCategory,
          shop_title: this.shop_title !== null ? this.shop_title : null,
        });
      }
    },
    resetFilter() {
      this.selectDepartment = null;
      this.selectCategory = null;
      this.shop_title = null;

      this.setShop();
    },
    selectedProductsHandler(product_name) {
      
      //this.shops = this.allShops; 

      if (!this.checkValues.includes(product_name)) {
        this.checkValues.push(product_name);
      } else {
        this.checkValues = this.checkValues.filter(
          (value) => value !== product_name
        );
      }

      
      const result= this.shops.filter((shop) => {
        // on fait le tableau des noms de produits vendus par le shop
        let nomsProduits = shop.products.map((product) => {
          return product.product_name;
        });
        // on retourne true si ces noms contiennent au moins un des filtres choisis
        return nomsProduits.some((produit) => {
          return this.checkValues.includes(produit);
        });
      });
      
      console.log(product_name);
    },
  },
};
</script>

<style scoped></style>