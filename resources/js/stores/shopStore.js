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
    setShops(data) {
     
    this.shops = data
    },
    setDepartments(data){
      this.departments = data
    },
    setCategories(data){
      this.categories = data
    },
    setOpeningHours(data){
      this.OpeningHours = data
    },
    setProducts(data){
      this.products = data
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
       
        res.data.commercant.length !== 0 ? this.shops = res.data.commercant : this.shops = []
      }).catch((err) => console.log(err))
    }, 
    addShop(data){
     
      let validation = ""
      axios.post(`http://127.0.0.1:8000/api/shops`,data).then((res) => {
        validation = res.data.message;
      
      }).catch((err) => console.log(err))
      
    },
    getShopByUserId(){
      
      axios.get("http://127.0.0.1:8000/api/getShopByUserId").then(res => {
       this.userShop = res.data.commercant;
      }).catch(err =>{
        console.log(err);
      })
     
    },
    sortShopByProduct(data){
      
      if (data.length > 0) {
        this.shops = data
        
      } else {
        
       this.setShops();
      }
    }
  },
  getters: {
    getShopById: (state) => {
      return (shopId) => state.shops.find((shop) => shop.id === shopId)
    } , 
    getFilteredShopByProducts() {
      return(filters)=>{

        
      }

     
    }
  },
  persist: true,
});
