<template>
  <div>
    <ValidationErrors class="w-50 text-center" v-if="this.validationErrors" :errors="this.validationErrors" />
  
  <div class="form-container" >
    <form @submit.prevent="handleLogin">
      <input type="text" name="user_name" v-model="user.user_name" placeholder="user_name" />
      <input type="password" name="password" v-model="user.password" placeholder="Password" />
      <input type="submit" value="login"/>
    </form>
  </div>
</div>
</template>
  
<script>
import axios from "axios"
import { mapActions } from "pinia";
import { useShopStore } from '../../stores/shopStore'
import { useUserStore } from '../../stores/userStore'
import  ValidationErrors  from "../utils/ValidationErrors.vue";
export default {
  name : 'Login',
  components : {ValidationErrors},
  data(){
    return {
      user: {
        user_name : "",
        password : ""
      }, 
      validationErrors: "",
    }
  },

  methods : {
    ...mapActions(useUserStore ,['setUser', 'setIsAdmin']),
    ...mapActions(useShopStore ,['setShop']),

  async handleLogin(){
     axios.get("sanctum/csrf-cookie").then(()=>{
        axios.post('http://127.0.0.1:8000/api/login', {user_name : this.user.user_name , password : this.user.password })
        .then((res)=>{
          if(res.data.user.role.role_name === "admin"){
            console.log(res.data.user.role.role_name);
            this.setIsAdmin(true)
          }else{
            this.setIsAdmin(false)
          }

         this.setUser(res.data.user)
         axios.defaults.headers.common.Authorization = `Bearer ${useUserStore().token}`
         this.$router.push('/')
        }).catch(err =>{
          //console.log(err.response);
          this.validationErrors = err.response.data
        } )
      }).catch(err => console.log(err))
    } , 
  },
}

</script>
<style>
.form-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 50vh;
}
</style>

  