<template>
  <header>
    <!-- header navigations -->
    <nav>
      <div class="menu_wrapper">
        <div class="menu_logo">
          <router-link to="/" class="">
            <img src="../../../../public/images/logo.png" alt="" />
          </router-link>
        </div>
        <div class="menu_links">
          <ul>
            <div v-if="!this.token" class="menu_visitor_links">
              <div class="menu_visitor_links_left">
                <li>
                  <router-link to="/">Acceuil</router-link>
                </li>
                <li>
                  <router-link @click="this.setAllShop" to="/commerces"
                    >commerces</router-link
                  >
                </li>
                <li>
                  <router-link @click="this.setAllRecipe" to="/recipes"
                    >Recettes</router-link
                  >
                </li>
              </div>
              <div class="menu_visitor_links_right">
                <li>
                  <router-link to="/login"> connexion </router-link>
                </li>
                <li>
                  <router-link to="/register"> Inscription </router-link>
                </li>
              </div>
            </div>
            <div v-else class="menu_user_links">
              <div class="menu_visitor_links_left">
                <li>
                  <router-link to="/">Acceuil</router-link>
                </li>
                <li>
                  <router-link @click="this.setAllShop" to="/commerces"
                    >commerces</router-link
                  >
                </li>
                <li>
                  <router-link @click="this.setAllRecipe" to="/recipes"
                    >Recettes</router-link
                  >
                </li>
              </div>
              <div class="menu_visitor_links_right">
                <li>
                  <router-link @click="this.setAllShop" to="/ajoutCommerce" id="btn_add_shop"
                    >Ajouter un commerce <i class="fa-solid fa-plus"></i
                  ></router-link>
                </li>
                <li>
                  <router-link to="/profil" id="btn_profil" @click="setUserShop"
                    ><i class="fa-solid fa-user" style="color: #ffffff"></i
                  ></router-link>
                </li>

                <li v-if="this.is_admin" @click="getAllAdminShop">
                 <router-link  to="/admin">Admin</router-link>
                </li>
                
                <li>
                  <a @click="logOut" id="log_out"
                    ><i
                      class="fa-solid fa-right-from-bracket"
                      style="color: #ffffff"
                    ></i
                  ></a>
                </li>

              </div>
            </div>
          </ul>
        </div>
      </div>
    </nav>
    <!-- serch Shop -->
    <div class="search">
      <div class="search_categories">
        <div class="search_category">
          <div class="search_category_image">
            <img :src="this.previewImage + 'epicerie.png'" alt="" srcset="" />
          </div>
          <div class="search_category_name">
            <span>Épicerie</span>
          </div>
        </div>

        <div class="search_category">
          <div class="search_category_image">
            <img
            :src="this.previewImage + 'epicerie.png'"
              alt=""
              srcset=""
            />
          </div>
          <div class="search_category_name">
            <span>Fruits & légumes</span>
          </div>
        </div>

        <div class="search_category">
          <div class="search_category_image">
            <img :src="this.previewImage + 'epicerie.png'" alt="" srcset="" />
          </div>
          <div class="search_category_name">
            <span>Boucherie</span>
          </div>
        </div>

        <div class="search_category">
          <div class="search_category_image">
            <img :src="this.previewImage + 'epicerie.png'" alt="" srcset="" />
          </div>
          <div class="search_category_name">
            <span>Poissonerie</span>
          </div>
        </div>

        <div class="search_category">
          <div class="search_category_image">
            <img :src="this.previewImage + 'epicerie.png'" alt="" srcset="" />
          </div>
          <div class="search_category_name">
            <span>Fromagerie</span>
          </div>
        </div>

        <div class="search_category">
          <div class="search_category_image">
            <img :src="this.previewImage + 'epicerie.png'" alt="" srcset="" />
          </div>
          <div class="search_category_name">
            <span>Vin</span>
          </div>
        </div>

        <div class="search_category">
          <div class="search_category_image">
            <img
            :src="this.previewImage + 'epicerie.png'" 
              alt=""
              srcset=""
            />
          </div>
          <div class="search_category_name">
            <span>Marché producteurs</span>
          </div>
        </div>
      </div>
      <div class="search_bar">
        <form action="">
          <div class="serach_bar_container">
            <label for="">Recherche par mots-clés</label>
            <input type="text" />
            <span
              ><i
                class="fa-solid fa-magnifying-glass"
                style="color: #374957"
              ></i
            ></span>
          </div>
          <div class="search_bar_btn">
            <button type="submit">
              Trouver un commerçant
              <i class="fa-solid fa-greater-than" style="color: #ffffff"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
    
  </header>
</template>

<script>
import axios from "axios";
import { useUserStore } from "../../stores/userStore";
import { useShopStore } from "../../stores/shopStore";
import { useRecipeStore } from "../../stores/recipeShop";
import { mapState, mapActions } from "pinia";
export default {
  name: "HeaderNav",
  data() {
    return {
      previewImage: "http://[::1]:5173/public/images/",
    };
  },
  computed: {
    ...mapState(useUserStore, ["token", "userLocationAnswered" , "is_admin"]),
    ...mapState(useShopStore, ["categories"]),
  },
  methods: {
    ...mapActions(useUserStore, ["setLocationAnswered", "setLocation"]),
    ...mapActions(useShopStore, ["getShopByUserId"]),
    logOut() {
      const userStore = useUserStore();
      const shopStore = useShopStore();
      userStore.$reset();
      shopStore.$reset();
      axios.defaults.headers.common.Authorization = "";
      this.$router.push("/");
    },
    setAllShop() {
      const shopStore = useShopStore();

      if (shopStore.shops.length === 0) {
        shopStore.setShop();
      } else {
        shopStore.$reset();
        shopStore.setShop();
      }
    },
    
    setAllRecipe() {
      const useRecipe = useRecipeStore();
      if (useRecipe.recipes.length === 0) {
        useRecipe.setRecipe();
      } else {
        useRecipe.$reset();
        useRecipe.setRecipe();
      }
    },
    setUserShop(){
      this.getShopByUserId();
    },getAllAdminShop(){
        axios.get("http://127.0.0.1:8000/api/adminShops").then((res)=>{
           this.shops = res.data.Commerçants ;
        }).catch(err=>{
            console.log(err);
        })
    }
  },
};
</script>

<style  scoped>
  @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap');
header {
  background-image: url(../../../../public/images/hero.png);
  background-repeat: no-repeat;
  background-position: top;
  background-size: cover;
  height: 90vh;
}
a:hover {
  color: #ff8528 !important;
}
.menu_wrapper {
  display: flex;
  margin: 0 5%;
  padding-top: 1rem;
}
.menu_logo {
  flex-basis: 20%;
  display: flex;
  align-items: center;
}
.menu_logo > img {
  width: 100%;
}
.menu_links {
  flex-basis: 100%;
}
.menu_links > ul {
  margin: 0;
  height: 100%;
  display: flex;
  align-items: center;
}
.menu_visitor_links,
.menu_user_links {
  display: flex;
  justify-content: space-between;
  width: 100%;
  height: 65px;
  align-items: center;
}
.menu_visitor_links_left {
  display: flex;
  justify-content: space-between;
  flex-basis: 30%;
}
.menu_visitor_links_right {
  display: flex;
  gap: 2rem;
  align-items: center;
}
#btn_add_shop {
  border: 2px solid white;
  padding: 1rem;
  border-radius: 5px;
  display: flex;
  gap: 1rem;
}

#btn_add_shop:hover {
  background-color: #ff8528;
}
#btn_profil {
  border-radius: 50%;
  border: 2px solid white;
  padding: 0.75rem;
  font-size: 1rem;
}
#log_out {
  font-size: 1.5rem;
}
.menu_visitor_links_left,
.menu_visitor_links_right > li > a {
  color: white;
  font-family: "Raleway", sans-serif;
  font-size: 18px;
  text-transform: capitalize;
  display: flex;
  align-items: center;
}
/* search */
.search {
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
  gap: 25%;
  height: 75%;
 margin: 5rem auto;
}
.search_category {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}
.search_categories {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 60%;
}
.search_bar {
  width: 70%;
}
.search_bar > form {
  width: 100%;
}
.serach_bar_container {
  display: flex;
  width: 100%;
  background-color: white;
  border-radius: 5px;
  flex-wrap: wrap;
  padding: 0 1rem;
}
.serach_bar_container > label {
  width: 15%;
  display: flex;
  align-items: center;
}
.serach_bar_container > input {
  width: 80%;
  height: 60px;
}
.serach_bar_container > span {
  font-size: 2rem;
  width: 5%;
  display: flex;
  justify-content: center;
  align-items: center;
}
.search_category_image {
  display: flex;
  justify-content: center;
}
.search_category_image > img {
  width: 100%;
  max-width: 56px;
}
.search_category_name {
  color: white;
  text-align: center;
}
.search_bar_btn {
  display: flex;
  justify-content: center;
  margin-top: 2rem;
}
.search_bar_btn > button {
  background: #ff8528;
  padding: 1rem;
  border-radius: 5px;
  color: white;
  font-family: "Raleway", sans-serif;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 20px;
}
/* type of shops  */

</style>