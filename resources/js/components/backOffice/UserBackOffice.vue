<template>
  <div>
    <h1 @click="getAllAdminUsers" class="btn btn-primary">liste utilisateur</h1>
    <div v-if="Array.isArray(this.users) && this.users.length > 0" :style="this.show">
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
          <tr v-for="user in this.users" :key="user.id">
            
            <th scope="row">{{ user.id }}</th>
            <td>{{ user.user_name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.role.role_name }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  name: "UserBackOffice",
  data() {
    return {
      users: [],
      toggle: false,
      show: "display : none",
    };
  },
  methods: {
    getAllAdminUsers() {
      console.log('res');
      if (this.show == "display : none" ) {
        this.show = "display : flex"
      }else{
        this.show = "display : none"
      }
      this.toggle = !this.toggle
    
      
    },
  },
};
</script>

<style lang="scss" scoped>
</style>