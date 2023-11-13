import { defineStore } from 'pinia';
import axios from 'axios';
import { Value } from 'sass';

export const useShopStore = defineStore({
  id: 'useShopStore',

  state: () => ({
    shops: [],
    departments: [],
    categories: [], 
    OpeningHours:[]
  }),

  actions: {
    setShop() {
      axios.get('http://127.0.0.1:8000/api/shops').then((res) => {
        res.data.Commerçants.forEach(element => {
          this.shops.push(element)
        });
      }).catch((err) => console.log(err))

      if (this.departments.length === 0) {
        axios.get('http://127.0.0.1:8000/api/department').then((res) => {
          res.data.Departement.forEach(element => {
            this.departments.push(element)
          });
        }).catch((err) => console.log(err))
      }

      if (this.categories.length === 0) {
        axios.get('http://127.0.0.1:8000/api/categories').then((res) => {
          this.categories = res.data.Categories
        }).catch((err) => console.log(err))
      }

      if (this.OpeningHours.length === 0) {
        axios.get('http://127.0.0.1:8000/api/opening_hours').then((res) => {
       // console.log(res.data.horaire); 
        this.OpeningHours = res.data.horaire
        }).catch((err) => console.log(err))
      }

    },

    filterShops(data) {
      this.shops = []
      let departmentFilter = data.department_id !== null ? `department_id=${data.department_id}` : ""
      let categoryFilter = data.category_id !== null ? `category_id=${data.categoriy_id}` : ""; // returns category_id=3 

      const params = [departmentFilter, categoryFilter]
      let filterParams = []
      params.map((value, key) => {
        key === (params.length - 1) ? filterParams.push(value) : filterParams.push(value + "&")
      })
      filterParams = filterParams.toString().replace(",", "");
      axios.get(`http://127.0.0.1:8000/api/sortShops?${filterParams}`).then((res) => {
        this.shops = res.data.Commerçants
      }).catch((err) => console.log(err))
    },
    
    filterShopsByCategory(category_id) {
      this.shops = this.categories.filter((c) => c.id === category_id)[0].shops
    }
  },
  getters: {
    getShopById: (state) => {
      return (shopId) => state.shops.find((shop) => shop.id === shopId)
    }
  },


  persist: true,
});
