<template>
  <div>
    <form action="">

        <label for="adresse">adresse :<input type="text" name="adresse" id=""></label>
        <label for="category"> category  <select name="categories" v-model="selectCategory">
                <option :value="null"></option>
                <option
                  :value="categorie.id"
                  v-for="categorie in this.categories"
                  :key="categorie.id"
                >
                  {{ categorie.category_name }}
                </option>
              </select>     
    </label>
        <label for="department"> departements  <select name="department" v-model="selectDepartment">
                <option :value="null"></option>
                <option
                  :value="department.id"
                  v-for="department in this.departments"
                  :key="department.id"
                >
                  {{ department.department_name }}
                </option>
              </select>   
    </label>
    <label for="city">ville :<input type="text" name="city" id=""></label>
    <label for="description">description : <textarea name="description" id="" ></textarea></label>
    <label for="image">images :<input type="file" name="image" id="image"></label>

      <!-- 
   
latitude
longitude
opening_hours
phone_number
products
shop_title
user_id
website
zip_code -->
    </form>
  </div>
</template>

<script>
import { mapState } from 'pinia';
import { useShopStore } from '../../stores/shopStore';

export default {
  name: "AddShop",
  data() {
    return {
      shop_title: "",
    };
  },
  computed:{
...mapState(useShopStore , ['categories','departments'])
  }
};
</script>

<style lang="scss" scoped>
</style>