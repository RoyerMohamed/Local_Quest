<template>
  <div class="form-container" >
    <form @submit.prevent="handleLogin">
      <input type="text" name="user_name" v-model="user.user_name" placeholder="user_name" />
      <input type="password" name="password" v-model="user.password" placeholder="Password" />
      <button type="submit">Login</button>
    </form>
  </div>
</template>
  
<script>
import axios from "axios"
import { mapActions } from "pinia";
import { useShopStore } from '../../stores/shopStore'
import { useUserStore } from '../../stores/userStore'
export default {
  name : 'Login',

  data(){
    return {
      user: {
        user_name : "",
        password : ""
      }
    }
  }, 

  methods : {
    ...mapActions(useUserStore ,['setUser']),
    ...mapActions(useShopStore ,['setShop']),
    handleLogin(){
      axios.get("sanctum/csrf-cookie").then(()=>{
        axios.post('http://127.0.0.1:8000/api/login', {user_name : this.user.user_name , password : this.user.password })
        .then((res)=>{
          console.log(res.data);
          //this.setShop();
         this.setUser(res.data.user)
         axios.defaults.headers.common.Authorization = `Bearer ${useUserStore().token}`
         this.$router.push('/')
        }).catch(err => console.log(err) )
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

  