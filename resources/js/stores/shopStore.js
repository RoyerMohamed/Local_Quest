import { defineStore } from 'pinia';
import axios from 'axios';

export const useShopStore = defineStore({
  id: 'useShopStore',

  state: () => ({
    shops: [],
    departments: [],
    categories: [],
    OpeningHours: [], 
    products : [], 
    userShop : []
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
      
      if(this.products.length === 0){
        axios.get('http://127.0.0.1:8000/api/products').then((res) => {
          this.products = res.data.Produits
        }).catch((err) => console.log(err))

      }
    },
    filterShops(data) {
      this.shops = [];
      let result = [];

      for (const key in data) {
          if (data.hasOwnProperty(key) && data[key] !== null) {
              result.push(`filter[${key}]=${data[key]}`);
          }
      }
  
    result = result.join('&');

      axios.get(`http://127.0.0.1:8000/api/sortShops?${result}`).then((res) => {
        console.log(res.data.Commerçants) 
        res.data.Commerçants.length !== 0 ? this.shops = res.data.Commerçants : this.shops = []
      }).catch((err) => console.log(err))
    }, 
    addShop(data){
      console.log(data);
      let validation = ""
      axios.post(`http://127.0.0.1:8000/api/shops`,data).then((res) => {
        validation = res.data.message;
        
        // res.data.Commerçants.forEach(element => {
        //   this.shops.push(element)
        // });
      }).catch((err) => console.log(err))
      
    },
    getShopByUserId(){
      
      axios.get("http://127.0.0.1:8000/api/getShopByUserId").then(res => {
       this.userShop = res.data.Commerçants;
      }).catch(err =>{
        console.log(err);
      })
     
    },
    sortShopByProduct(data){
      console.log(this.shops);
      if (data.length > 0) {
        this.shops = data
        console.log(this.shops);
      } else {
        console.log("no data");
       this.setShop();
      }
    }
  },
  getters: {
    getShopById: (state) => {
      return (shopId) => state.shops.find((shop) => shop.id === shopId)
    } , 
    getFilteredShopByProducts() {
      return(filters)=>{

        //console.log(filters);
      }

     
    }
  },
  persist: true,
});
