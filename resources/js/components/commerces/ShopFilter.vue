<template>
  <div class="shop-filters">
    <div class="shop-filters-top">
      <div class="shop-filters-top-produit">
        <form @submit.prevent="sort" class="p-4">
          <!-- filter by departments -->
          <div class="wrapper d-flex">
            <div class="filter_department">
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

            <div class="filter_category">
              <select name="categories" v-model="selectCategory">
                <option :value="null"></option>
                <option
                  :value="categorie.id"
                  v-for="categorie in this.categories"
                  :key="categorie.id"
                >
                  {{ categorie.category_name }}
                </option>
              </select>
            </div>

            <div class="search">
              <input
                type="search"
                name="shop_title"
                id=""
                v-model="shop_title"
              />
            </div>
          </div>

          <div class="filter_product">
            <div>
              <h4>Filtrer par produis</h4>
            </div>
            <div class="filter_products_list form-check form-switch">
              <div v-for="product in products" :key="product">
                <input
                  type="checkbox"
                  name="product "
                  class="form-check-input"
                  @click="selectedProductsHandler(product.product_name)"
                />
                <label for="scales">{{ product.product_name }}</label>
              </div>
            </div>
          </div>
          <div class="search_bar_btn">
            <button type="submit">filtré</button>
            
                    <button @click="resetFilter()">reset filters</button>
          </div>
        </form>
      </div>
      <div class="shop-filters-top-departement"></div>
      <div class="shop-filters-top-region"></div>
    </div>
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
      selectOpeningHours: [],
    };
  },
  props: ["allShops"],
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
    ...mapActions(useShopStore, [
      "filterShops",
      "setShop",
      "sortShopByProduct",
    ]),

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

      const result = this.shops.filter((shop) => {
        // on fait le tableau des noms de produits vendus par le shop
        let nomsProduits = shop.products.map((product) => {
          return product.product_name;
        });
        // on retourne true si ces noms contiennent au moins un des filtres choisis
        return nomsProduits.some((produit) => {
          return this.checkValues.includes(produit);
        });
      });
      
        this.sortShopByProduct(result);
      
      //console.log(result);
    },
  },
};
</script>

<style scoped>
.wrapper {
  justify-content: space-between;
}
.filter_product {
  margin: 1rem 0;
}
.filter_department,
.filter_category,
.search {
  width: 33%;
}
.filter_department > select {
  width: 100%;
  padding: 0.5rem;
  border: 1px solid gray;
  border-radius: 5px;
}
.filter_category > select {
  width: 100%;
  padding: 0.5rem;
  border: 1px solid gray;
  border-radius: 5px;
}
.filter_products_list {
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
  margin: 2rem 0;
  border: 2px solid #ababab;
  padding: 1rem 3rem;
  border-radius: 5px;
}
.filter_products_list > div {
  display: flex;
  width: 25%;
  gap: 1rem;
}
.filter_products_list > div > label {
  font-size: 1.5rem;
}
.search > input {
  width: 100%;
  padding: 0.5rem;
  border: 1px solid gray;
  border-radius: 5px;
}
</style>