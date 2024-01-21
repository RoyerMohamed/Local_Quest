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
    userShop : [], 
    bestRaitingShops : []
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
      this.shops = []
      this.shops = data ;
      console.log(this.shops);
    }, 
    updateShop(data){
      let shop = this.shops.filter(shop => shop.id !== data.id);
      shop.push(data);
      this.shops = shop.sort((a, b) => a.id - b.id);
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
        
         axios.get('http://127.0.0.1:8000/api/shops').then((res) => {
          this.shops = res.data.commercant
        }).catch((err) => console.log(err))
      }
    }, 
   async sortByDepartment(data){
     
       await axios.get('http://127.0.0.1:8000/api/shops').then((res) => {
        this.shops = res.data.commercant
      }).catch((err) => console.log(err))

      console.log(this.shops.filter((shop) => shop.department_id == data));
     this.shops = this.shops.filter((shop) => shop.department_id == data)
    //let filterShops = temps.filter((shop) => shop.department_id == data);
    },
   async sortByCategory(data){
     
       await axios.get('http://127.0.0.1:8000/api/shops').then((res) => {
        this.shops = res.data.commercant
      }).catch((err) => console.log(err))

      this.shops = this.shops.filter((shop) => shop.category_id == data)
      console.log(this.shops);
    //let filterShops = temps.filter((shop) => shop.department_id == data);
    },
   async sortByTitle(data){
     
       await axios.get('http://127.0.0.1:8000/api/shops').then((res) => {
        this.shops = res.data.commercant
      }).catch((err) => console.log(err))

       this.shops = this.shops.filter((shop) => shop.shop_title.includes(data))
      
    },
    setRaitingShops(data){
      this.bestRaitingShops = data
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
