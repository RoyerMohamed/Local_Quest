<template>
  <div>
    <h1>IndexBackOffice</h1>
    <ShopsBackOffice :shops="this.shops" />
    <UserBackOffice />
  </div>
</template>

<script>
import { mapWritebleState } from "pinia";
import { useShopStore } from "../../stores/shopStore";
import { useUserStore } from "../../stores/userStore";
import ShopsBackOffice from "./shopsBackOffice.vue";
import UserBackOffice from "./UserBackOffice.vue";
export default {
  name: "IndexBackOffice",
  data(){
    return {
      users :[], 
      shops : []
    }
  },
  components: { ShopsBackOffice , UserBackOffice },
  computed: {
   ...mapWritebleState(useShopStore, ['shops'])
   
  },created(){
    
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
</style>