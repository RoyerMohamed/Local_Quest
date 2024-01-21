<template>
  <div class="backOffice">
    <h1 class="text-center">BackOffice</h1>
    <section class="mt-5 d-flex justify-content-around">
      <div class="btn-container d-flex flex-column">
        
        <button   @click="getAllAdminShop" class=" mb-2 ">
          liste de commerces
        </button>
        <button @click="getAllAdminUser" class="btn">liste utilisateur</button>
      </div>
      <div class="component-container">
        <ShopsBackOffice :toggle="this.toggle" />
        <UserBackOffice :toggle="this.toggleUser"/>
      </div>
    </section>
  </div>
</template>

<script>
import ShopsBackOffice from "./shopsBackOffice.vue";
import UserBackOffice from "./UserBackOffice.vue";
export default {
  name: "IndexBackOffice",
  data() {
    return {
      users: [],
      toggle: false,
      toggleUser: false,
    };
  },
  components: { ShopsBackOffice, UserBackOffice },
  methods: {
    getAllAdminShop() {
      this.toggle = !this.toggle;
      if (this.toggleUser) {
        this.toggleUser = !this.toggleUser;
      }
    },
    getAllAdminUser() {
      this.toggleUser = !this.toggleUser;
      if (this.toggle) {
        this.toggle = !this.toggle;
      }
    },
  },
  created() {
    axios
      .get("http://127.0.0.1:8000/api/admin")
      .then((res) => {
        this.users = res.data.users;
        //this.shops = res.data.shops;
      })
      .catch((err) => {
        console.log(err);
      });
  },
};
</script>

<style lang="scss" scoped>
.backOffice {
  min-height: 100dvh;
}
.btn-container{
min-width: 15%;
}
.component-container{
  width: 80%;
}
</style>