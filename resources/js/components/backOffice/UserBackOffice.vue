<template>
  <div>
    <h1 @click="getAllAdminUsers" class="btn btn-primary">liste utilisateur</h1>
    <div v-if="Array.isArray(this.all_users) && this.all_users.length > 0" :style="this.show">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Pseudo</th>
            <th scope="col">Emails</th>
            <th scope="col">Roles</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in this.all_users" :key="user.id">
            
            <th scope="row">{{ user.id }}</th>
            <td>{{ user.user_name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.role.role_name }}</td>
            <td><button @click="deleteUser(user.id)" class="btn btn-danger" type="submit">supprimer</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import {mapState , mapActions} from 'pinia'
import { useUserStore } from '../../stores/userStore';
import axios from 'axios';
export default {
  name: "UserBackOffice",
  data() {
    return {
      toggle: false,
      show: "display : none",
    };
  },
computed:{
  ...mapState(useUserStore,['all_users'] ),
},
methods: {
    ...mapActions(useUserStore,['setAllUsers'] ),
    getAllAdminUsers() {
      if (this.show == "display : none" ) {
        this.show = "display : flex"
      }else{
        this.show = "display : none"
      }
      this.toggle = !this.toggle  
     
    },
    deleteUser(id){
    
      axios.delete(`http://127.0.0.1:8000/api/users/${id}`).then((res) => {
        console.log(this.all_users.filter(user => user.id !== id));
        this.setAllUsers(this.all_users.filter(user => user.id !== id));
          //this.setShops(res.data.commercant)
        }).catch((err) => console.log(err))
    }
  },
};
</script>

<style lang="scss" scoped>
</style>