<template>
  <header v-if="this.$route.name == 'Home'">
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
                  <router-link to="/">Accueil</router-link>
                </li>
                <li>
                  <router-link @click="this.setAllShop" to="/commerces">Commerçants</router-link>
                </li>

              </div>
              <div class="menu_visitor_links_right">
                <li>
                  <router-link to="/login"> Connexion </router-link>
                </li>
              </div>
            </div>
            <div v-else class="menu_user_links">
              <div class="menu_visitor_links_left">
                <li>
                  <router-link to="/">Accueil</router-link>
                </li>
                <li>
                  <router-link @click="this.setAllShop" to="/commerces">Commerçants</router-link>
                </li>

              </div>
              <div class="menu_visitor_links_right">
                <li id="btn_add_shop">
                  <router-link @click="this.setAllShop" to="/ajoutCommerce">Proposer un commerçant <i
                      class="fa-solid fa-plus"></i></router-link>
                </li>
                <li id="profil_btn" @click="showLinks">
                  <i class="fa-solid fa-user" style="color: #ffffff"></i>
                </li>
                <div id="toggle_menu">
                  <li>
                    <router-link to="/profil" @click="setUserShop">Profil</router-link>
                  </li>
                  <li v-if="this.is_admin" @click="getAllAdminShop">
                    <router-link to="/admin">Admin</router-link>
                  </li>
                  <li>
                    <a @click="logOut" id="log_out"><i class="fa-solid fa-right-from-bracket"
                        style="color: #ffffff"></i></a>
                  </li>
                </div>
              </div>
            </div>
          </ul>
        </div>
      </div>
    </nav>
    <!-- SEARCH SHOP -->
    <div class="hero-search">
      <div class="hero-search-icons">
        <a href="">
          <div class="hero-search-icons-item">
            <i class="fa-solid fa-shop"></i>
            <p>Épicerie</p>
          </div>
        </a>
        <a href="">
          <div class="hero-search-icons-item">
            <i class="fa-solid fa-carrot"></i>
            <p>Fruits & Légumes</p>
          </div>
        </a>
        <a href="">
          <div class="hero-search-icons-item ">
            <i class="fa-solid fa-bread-slice"></i>
            <p>Boulangerie</p>
          </div>
        </a>
        
        <a href="">
          <div class="hero-search-icons-item ">
            <i class="fa-solid fa-cookie"></i>
            <p>Pâtisserie</p>
          </div>
        </a>
        <a href="">
          <div class="hero-search-icons-item">
          <i class="fa-solid fa-cow"></i>
          <p>Boucherie</p>
        </div>
        </a>
        <a href="">
          <div class="hero-search-icons-item">
            <i class="fa-solid fa-fish"></i>
            <p>Poissonnerie</p>
          </div>
        </a>
        <a href="">
          <div class="hero-search-icons-item">
            <i class="fa-solid fa-cheese"></i>
            <p>Fromagerie</p>
          </div>
        </a>
        <div class="hero-search-icons-item">
          <i class="fa-solid fa-wine-bottle"></i>
          <p>Caviste</p>
        </div>
        <a href="">
          <div class="hero-search-icons-item">
            <i class="fa-solid fa-tractor"></i>
            <p>Fermes</p>
          </div>
        </a>
        <a href="">
          <div class="hero-search-icons-item">
            <i class="fa-solid fa-jar"></i>
            <p>Produits locaux</p>
          </div>
        </a>
        <a href="">
          <div class="hero-search-icons-item">
            <i class="fa-solid fa-store"></i>
            <p>Marché de producteurs </p>
          </div>
        </a>

      </div>
      <form class="input-group " @submit.prevent="handleForm">
        <select class="form-select" v-model="selectCategory" id="inputGroupSelect04"
          aria-label="Example select with button addon">
          <option value="" disabled selected>Sélectionnez une catégorie de commerçant</option>
          <option v-for="category in this.categories" :key="category.id" :value="category.id">
            {{ category.category_name }}
          </option>
        </select>

        <button type="submit" class="master-btn d-flex align-items-center">
          Trouver un commerçant
        </button>
      </form>
    </div>
  </header>

  <header v-else style="height: 10vh; background-image: none">
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
              <div class="menu_visitor_links_left nav2">
                <li>
                  <router-link to="/">Accueil</router-link>
                </li>
                <li>
                  <router-link @click="this.setAllShop" to="/commerces">Commerçants</router-link>
                </li>
              </div>
              <div class="menu_visitor_links_right nav2">
                <li>
                  <router-link to="/login"> Connexion </router-link>
                </li>
              </div>
            </div>
            <div v-else class="menu_user_links">
              <div class="menu_visitor_links_left nav2">
                <li>
                  <router-link to="/">Accueil</router-link>
                </li>
                <li>
                  <router-link @click="this.setAllShop" to="/commerces">Commerçants</router-link>
                </li>
              </div>
              <div class="menu_visitor_links_right nav2">
                <li id="btn_add_shop">
                  <router-link @click="this.setAllShop" to="/ajoutCommerce">Ajouter un commerçant <i
                      class="fa-solid fa-plus"></i></router-link>
                </li>
                <li id="profil_btn" @click="showLinks">
                  <i class="fa-solid fa-user" style="color: black"></i>
                </li>
                <div id="toggle_menu">
                  <li>
                    <router-link to="/profil" @click="setUserShop" style="color: black">Profil</router-link>
                  </li>
                  <li v-if="this.is_admin" @click="getAllAdminShop">
                    <router-link to="/admin" style="color: black">Admin</router-link>
                  </li>
                  <li>
                    <a @click="logOut" id="log_out"><i class="fa-solid fa-right-from-bracket"
                        style="color: black"></i></a>
                  </li>
                </div>
              </div>
            </div>
          </ul>
        </div>
      </div>
    </nav>
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
      headerStyle: "style='height:0vh'",
      selectCategory: "",
    };
  },
  computed: {
    ...mapState(useUserStore, ["token", "userLocationAnswered", "is_admin"]),
    ...mapState(useShopStore, ["categories"]),
  },
  methods: {
    ...mapActions(useUserStore, ["setLocationAnswered", "setLocation"]),
    ...mapActions(useShopStore, ["getShopByUserId", "filterShops", "setShop"]),
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
    setUserShop() {
      this.getShopByUserId();
    },
    getAllAdminData() {
      axios
        .get("http://127.0.0.1:8000/api/admin")
        .then((res) => {
          this.shops = res.data.Commerçants;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    handleForm() {
      this.filterShops({ category_id: this.selectCategory });
      this.$router.push("/commerces");
    },
    showLinks() {
      let toggle_menu = document.getElementById("toggle_menu");

      if (toggle_menu.style.display == "flex") {
        console.log(toggle_menu.style.display == "flex");
        toggle_menu.style.display = "none";
      } else {
        console.log("no");
        toggle_menu.style.display = "flex";
      }
    },
  },
  created() {
    if (this.$route.name != "Home") {
      this.headerStyle = "height:10vh";
    }
    this.setShop();
  },
};
</script>

<style  scoped>
@import url("https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap");

header {
  background-image: url(../../../../public/images/hero.png);
  background-repeat: no-repeat;
  background-position: top;
  background-size: cover;
  height: 90vh;
}

@keyframes show {
  0% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}

a:hover {
  color: #ff8528;
}

a {
  color: white;
}

.menu_wrapper {
  display: flex;
  margin: 0 5%;
  padding-top: 1rem;
}

#toggle_menu {
  position: absolute;
  right: 0;
  top: 130%;
  display: flex;
  width: 35%;
  flex-direction: column;
  align-items: flex-end;
  gap: 0.5rem;
  display: none;
  animation-name: show;
  animation-duration: 500ms;
  z-index: 1;
}

.menu_logo {
  flex-basis: 20%;
  display: flex;
  align-items: center;
}

.menu_logo>img {
  width: 100%;
}

.menu_links {
  flex-basis: 100%;
}

.menu_links>ul {
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
  justify-content: space-around;
  flex-basis: 30%;
}

.menu_visitor_links_right {
  display: flex;
  gap: 2rem;
  align-items: center;
  position: relative;
}

#btn_add_shop {
  transition: all 250ms;
  height: 4rem;
  padding: 1rem;
  border-radius: 8px;
  border: 1px solid #ff8528;
  background-color: #ff85280f;
  text-decoration: none;
  font-size: .85rem;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
  letter-spacing: 1.248px;
  text-transform: uppercase;
}

#btn_add_shop>a {
  color: #ff8528;
  font-weight: 600;
}

#btn_add_shop:hover {
  border: 1px solid #ff8528;
  background-color: #ff8528;
}

#btn_add_shop:hover>a {
  color: white;
}

#btn_profil {
  border-radius: 50%;
  border: 2px solid white;
  padding: 0.75rem;
  font-size: 1rem;
}

#btn_profil>a:hover {
  color: white !important;
}

#log_out {
  font-size: 1.5rem;
}

.menu_visitor_links_left,
.menu_visitor_links_right>li {
  color: white;
  font-family: "Raleway", sans-serif;
  font-size: 18px;
  text-transform: capitalize;
  display: flex;
  align-items: center;
}

.nav2>li>a {
  color: black;
  font-family: "Raleway", sans-serif;
  font-size: 18px;
  text-transform: capitalize;
  display: flex;
  align-items: center;
}

/* search */
.hero-search {
  padding-top: 16rem;
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  gap: 2rem;
}

.hero-search-icons {
  width: 80%;
  display: flex;
  justify-content: center;
  gap: 2rem;
  color: white;
}

.hero-search-icons-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1rem;
}

.hero-search-icons-item i {
  font-size: 30px;
}

.hero-search-icons-item p {
  /* @include text-style('subtitle1'); */
  color: white;
}

.hero-search .input-group {
  width: 70%;
}

.master-btn {
  transition: all 250ms;
  height: 4rem;
  padding: 1rem;
  border-radius: 8px;
  border: 1px solid #ff8528;
  background-color: #ff8528;
  color: white;
  text-decoration: none;
  font-size: .85rem;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
  letter-spacing: 1.248px;
  text-transform: uppercase;
}

.master-btn:hover {
  border: 1px solid #ff8528;
  background-color: transparent;
  color: #ff8528;
}


/* type of shops  */
</style>