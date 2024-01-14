<template>
  <HeaderNav />
  <main>
    <section v-if="$route.path == '/'">      
      <!-- Catégories commerçants  -->
      <div class="commerçants mt-5 mb-5">
        <div class="commerçants-title">
          <h3>Les commerçants à l'honneur</h3>
          <p>Avec Local Quest, changez vos habitudes de consommation en douceur tout en soutenant l’économie locale !
          </p>
        </div>
        <div class="commerçants-box">
          <div class="commerçants-box-content">
            <div class="commerçants-box-content-item">
              <router-link to="/commerces" @click="this.categories(1)">
                <div class="shops_type_grid_infos_image">
                  <i class="fa-solid fa-cow"></i>
                  </div>
                <div class="shops_type_grid_infos_text">
                    <strong>Fromagerie</strong>
                    <span>Voir la sélection</span>
                  </div>
              </router-link>
            </div>
            <div class="commerçants-box-content-item">
              <router-link to="/commerces" @click="this.categories(1)">
                <div class="shops_type_grid_infos_image">
                  <i class="fa-solid fa-cow"></i>
                  </div>
                <div class="shops_type_grid_infos_text">
                    <strong>Fromagerie</strong>
                    <span>Voir la sélection</span>
                  </div>
              </router-link>
            </div>
            <div class="commerçants-box-content-item">
              <router-link to="/commerces" @click="this.categories(1)">
                <div class="shops_type_grid_infos_image">
                  <i class="fa-solid fa-cow"></i>
                  </div>
                <div class="shops_type_grid_infos_text">
                    <strong>Fromagerie</strong>
                    <span>Voir la sélection</span>
                  </div>
              </router-link>
            </div>
            <div class="commerçants-box-content-item">
              <router-link to="/commerces" @click="this.categories(1)">
                <div class="shops_type_grid_infos_image">
                  <i class="fa-solid fa-cow"></i>
                  </div>
                <div class="shops_type_grid_infos_text">
                    <strong>Fromagerie</strong>
                    <span>Voir la sélection</span>
                  </div>
              </router-link>
            </div>
            <div class="commerçants-box-content-item">
              <router-link to="/commerces" @click="this.categories(1)">
                <div class="shops_type_grid_infos_image">
                  <i class="fa-solid fa-cow"></i>
                  </div>
                <div class="shops_type_grid_infos_text">
                    <strong>Fromagerie</strong>
                    <span>Voir la sélection</span>
                  </div>
              </router-link>
            </div>
            <div class="commerçants-box-content-item">
              <router-link to="/commerces" @click="this.categories(1)">
                <div class="shops_type_grid_infos_image">
                  <i class="fa-solid fa-cow"></i>
                  </div>
                <div class="shops_type_grid_infos_text">
                    <strong>Fromagerie</strong>
                    <span>Voir la sélection</span>
                  </div>
              </router-link>
            </div>
            <div class="commerçants-box-content-item">
              <router-link to="/commerces" @click="this.categories(1)">
                <div class="shops_type_grid_infos_image">
                  <i class="fa-solid fa-cow"></i>
                  </div>
                <div class="shops_type_grid_infos_text">
                    <strong>Fromagerie</strong>
                    <span>Voir la sélection</span>
                  </div>
              </router-link>
            </div>
            <div class="commerçants-box-content-item">
              <router-link to="/commerces" @click="this.categories(1)">
                <div class="shops_type_grid_infos_image">
                  <i class="fa-solid fa-cow"></i>
                  </div>
                <div class="shops_type_grid_infos_text">
                    <strong>Fromagerie</strong>
                    <span>Voir la sélection</span>
                  </div>
              </router-link>
            </div>

            
          </div>
        </div>
      </div>


      <div class="cta_recipes">
        <div class="cta_recipes_wrapper">
          <div class="cta_recipes_title">
            <h2>Réalisez vos meilleurs recette locales !</h2>
          </div>
          <div class="cta_recipes_text">
            <p>
              Lorem ipsum dolor sit amet consectetur adipiscing elit, luctus
              nisi malesuada taciti turpis habitant hendrerit, auctor augue
              nulla non dui dapibus. Ante montes ullamcorper aptent malesuada
              dui nisi nunc, vehicula accumsan conubia pulvinar habitant
              sollicitudin auctor, a fringilla dignissim at mattis parturient.
            </p>
          </div>
          <div class="cta_recipes_btn">
            <div class="search_bar_btn">
              <button type="submit">
                Ajouter a la list
                <i class="fa-solid fa-greater-than" style="color: #ffffff"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="see_recipes mt-5 mb-5">
        <div class="see_recipes_title">
          <h2>Les recettes locales proposées</h2>
        </div>

        <div class="see_recipes-flex">
          <div v-for="recipe in this.homeRecipes" :key="recipe.id" class="see_recipes_wrapper">
            <div class="see_recipes_card">
              <div class="see_recipes_card_bg">
                <div class="see_recipes_card_img">
                  <i class="fa-solid fa-utensils p-3" style="color: #ff8528"></i>
                </div>
              </div>
              <div class="see_recipes_card_infos">
                <div class="see_recipes_card_infos_title">
                  <h4>{{ recipe.recipe_title }}</h4>
                </div>
                <div class="see_recipes_card_infos_wrapper">
                  <div class="see_recipes_card_infos_time">
                    <i class="fa-solid fa-hourglass-start" style="color: #ff8528"></i>
                    <span>{{ recipe.preparation_time }} minn</span>
                  </div>
                  <div class="see_recipes_card_infos_time">
                    <i class="fa-solid fa-hourglass-start" style="color: #ff8528"></i>
                    <span>{{ recipe.difficulty }}</span>
                  </div>
                  <div class="see_recipes_card_infos_time">
                    <i class="fa-solid fa-hourglass-start" style="color: #ff8528"></i>
                    <span>{{ recipe.num_persons }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="see_recipes_wrapper">
            <div class="see_recipes_card">
              <div class="see_recipes_card_bg">
                <div class="see_recipes_card_img">
                  <i
                    class="fa-solid fa-utensils p-3"
                    style="color: #ff8528"
                  ></i>
                </div>
              </div>
              <div class="see_recipes_card_infos">
                <div class="see_recipes_card_infos_title">
                  <h4>Recipie label</h4>
                </div>
                <div class="see_recipes_card_infos_wrapper">
                  <div class="see_recipes_card_infos_time">
                    <i
                      class="fa-solid fa-hourglass-start"
                      style="color: #ff8528"
                    ></i>
                    <span>20 minn</span>
                  </div>
                  <div class="see_recipes_card_infos_time">
                    <i
                      class="fa-solid fa-hourglass-start"
                      style="color: #ff8528"
                    ></i>
                    <span>Facile</span>
                  </div>
                  <div class="see_recipes_card_infos_time">
                    <i
                      class="fa-solid fa-hourglass-start"
                      style="color: #ff8528"
                    ></i>
                    <span>Bon marché</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="see_recipes_wrapper">
            <div class="see_recipes_card">
              <div class="see_recipes_card_bg">
                <div class="see_recipes_card_img">
                  <i
                    class="fa-solid fa-utensils p-3"
                    style="color: #ff8528"
                  ></i>
                </div>
              </div>
              <div class="see_recipes_card_infos">
                <div class="see_recipes_card_infos_title">
                  <h4>Recipie label</h4>
                </div>
                <div class="see_recipes_card_infos_wrapper">
                  <div class="see_recipes_card_infos_time">
                    <i
                      class="fa-solid fa-hourglass-start"
                      style="color: #ff8528"
                    ></i>
                    <span>20 minn</span>
                  </div>
                  <div class="see_recipes_card_infos_time">
                    <i
                      class="fa-solid fa-hourglass-start"
                      style="color: #ff8528"
                    ></i>
                    <span>Facile</span>
                  </div>
                  <div class="see_recipes_card_infos_time">
                    <i
                      class="fa-solid fa-hourglass-start"
                      style="color: #ff8528"
                    ></i>
                    <span>Bon marché</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="see_recipes_wrapper">
            <div class="see_recipes_card">
              <div class="see_recipes_card_bg">
                <div class="see_recipes_card_img">
                  <i
                    class="fa-solid fa-utensils p-3"
                    style="color: #ff8528"
                  ></i>
                </div>
              </div>
              <div class="see_recipes_card_infos">
                <div class="see_recipes_card_infos_title">
                  <h4>Recipie label</h4>
                </div>
                <div class="see_recipes_card_infos_wrapper">
                  <div class="see_recipes_card_infos_time">
                    <i
                      class="fa-solid fa-hourglass-start"
                      style="color: #ff8528"
                    ></i>
                    <span>20 minn</span>
                  </div>
                  <div class="see_recipes_card_infos_time">
                    <i
                      class="fa-solid fa-hourglass-start"
                      style="color: #ff8528"
                    ></i>
                    <span>Facile</span>
                  </div>
                  <div class="see_recipes_card_infos_time">
                    <i
                      class="fa-solid fa-hourglass-start"
                      style="color: #ff8528"
                    ></i>
                    <span>Bon marché</span>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>


      <!-- CTA Banner -->
      <div class="cta_recipes">
        <div class="cta_recipes_wrapper">
          <div class="cta_recipes_title">
            <h2>Réalisez vos meilleurs recette locales !</h2>
          </div>
          <div class="cta_recipes_text">
            <p>
              Lorem ipsum dolor sit amet consectetur adipiscing elit, luctus
              nisi malesuada taciti turpis habitant hendrerit, auctor augue
              nulla non dui dapibus. Ante montes ullamcorper aptent malesuada
              dui nisi nunc, vehicula accumsan conubia pulvinar habitant
              sollicitudin auctor, a fringilla dignissim at mattis parturient.
            </p>
          </div>
          <div class="cta_recipes_btn">
            <div class="search_bar_btn">
              <button type="submit">
                Ajouter a la list
                <i class="fa-solid fa-greater-than" style="color: #ffffff"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!--Comment fonctionne l'app-->
      <div class="howitswork ">
        <div class="howitswork-box">
          <div class="howitswork-box-title">
            <h3>Comment fonctionne Local Quest</h3>
          </div>
          <div class="howitswork-step">
            <div class="howitswork-step-item">
              <span>1</span>
              <h4>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Inventore</h4>
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Inventore, optio nesciunt, possimus repellat natus sequi
                architecto velit ullam maiores a quae consequatur voluptatum
                culpa quisquam incidunt ea sapiente, facilis maxime!
              </p>
            </div>
            <div class="howitswork-step-item">
              <span>2</span>
              <h4>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Inventore</h4>
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Inventore, optio nesciunt, possimus repellat natus sequi
                architecto velit ullam maiores a quae consequatur voluptatum
                culpa quisquam incidunt ea sapiente, facilis maxime!
              </p>
            </div>
            <div class="howitswork-step-item">
              <span>3</span>
              <h4>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Inventore</h4>
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Inventore, optio nesciunt, possimus repellat natus sequi
                architecto velit ullam maiores a quae consequatur voluptatum
                culpa quisquam incidunt ea sapiente, facilis maxime!
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- CTA Banner -->
      <div class="cta_recipes">
        <div class="cta_recipes_wrapper">
          <div class="cta_recipes_title">
            <h2>Réalisez vos meilleurs recette locales !</h2>
          </div>
          <div class="cta_recipes_text">
            <p>
              Lorem ipsum dolor sit amet consectetur adipiscing elit, luctus
              nisi malesuada taciti turpis habitant hendrerit, auctor augue
              nulla non dui dapibus. Ante montes ullamcorper aptent malesuada
              dui nisi nunc, vehicula accumsan conubia pulvinar habitant
              sollicitudin auctor, a fringilla dignissim at mattis parturient.
            </p>
          </div>
          <div class="cta_recipes_btn">
            <div class="search_bar_btn">
              <button type="submit">
                Ajouter a la list
                <i class="fa-solid fa-greater-than" style="color: #ffffff"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Actus locales -->
      <div class="actus mt-5 mb-5">
        <div class="actus-title">
          <h3>L’actualité de Local Quest</h3>
          <p>Avec Local Quest, changez vos habitudes de consommation en douceur tout en soutenant l’économie locale !
          </p>
        </div>
        <div class="actus-box">
          <div class="actus-box-content">
            <div class="actus-box-content-item">
              <div class="actus-box-content-item-category">
                <span>Blog category</span>
              </div>
              <div class="actus-box-content-item-img">
                <img src="/images/actus-1.png" alt="">
              </div>
              <div class="actus-box-content-item-info">
                <h4>L'analyse des conditions de vie des vâches en Deux sèvres</h4>
                <div class="actus-box-content-item-info-preparation">
                  <div class="actus-box-content-item-info-preparation-cook">
                    <div>
                      <i class="fa-regular fa-calendar"></i>
                    </div>
                    <span>16/08/2022</span>
                  </div>
                  <div class="actus-box-content-item-info-preparation-cook">
                    <div>
                      <i class="fa-regular fa-message"></i>
                    </div>
                    <span>32</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="actus-box-content-item">
              <div class="actus-box-content-item-category">
                <span>Blog category</span>
              </div>
              <div class="actus-box-content-item-img">
                <img src="/images/actus-2.png" alt="">
              </div>
              <div class="actus-box-content-item-info">
                <h4>L'analyse des conditions de vie des vâches en Deux sèvres</h4>
                <div class="actus-box-content-item-info-preparation">
                  <div class="actus-box-content-item-info-preparation-cook">
                    <div>
                      <i class="fa-regular fa-calendar"></i>
                    </div>
                    <span>16/08/2022</span>
                  </div>
                  <div class="actus-box-content-item-info-preparation-cook">
                    <div>
                      <i class="fa-regular fa-message"></i>
                    </div>
                    <span>32</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="actus-box-content-item">
              <div class="actus-box-content-item-category">
                <span>Blog category</span>
              </div>
              <div class="actus-box-content-item-img">
                <img src="/images/actus-3.png" alt="">
              </div>
              <div class="actus-box-content-item-info">
                <h4>L'analyse des conditions de vie des vâches en Deux sèvres</h4>
                <div class="actus-box-content-item-info-preparation">
                  <div class="actus-box-content-item-info-preparation-cook">
                    <div>
                      <i class="fa-regular fa-calendar"></i>
                    </div>
                    <span>16/08/2022</span>
                  </div>
                  <div class="actus-box-content-item-info-preparation-cook">
                    <div>
                      <i class="fa-regular fa-message"></i>
                    </div>
                    <span>32</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="actus-box-content-item">
              <div class="actus-box-content-item-category">
                <span>Blog category</span>
              </div>
              <div class="actus-box-content-item-img">
                <img src="/images/actus-4.png" alt="">
              </div>
              <div class="actus-box-content-item-info">
                <h4>L'analyse des conditions de vie des vâches en Deux sèvres</h4>
                <div class="actus-box-content-item-info-preparation">
                  <div class="actus-box-content-item-info-preparation-cook">
                    <div>
                      <i class="fa-regular fa-calendar"></i>
                    </div>
                    <span>16/08/2022</span>
                  </div>
                  <div class="actus-box-content-item-info-preparation-cook">
                    <div>
                      <i class="fa-regular fa-message"></i>
                    </div>
                    <span>32</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Avis clients -->
      <div class="avisclients">
        <div class="avisclient-title">
          <h3>Ce que pense les utilisateurs de Local Quest</h3>
          <p>Déja plus de 8 milles utilisateurs</p>
        </div>
        <div class="avisclients-box">
          <div class="avisclient-box-content">
            <div class="avisclient-box-content-item">
              <div class="avisclient-box-content-item-avatar">
                <img src="/images/avatar.png" alt="">
                <div class="avisclient-box-content-item-avatar-icon">
                  <i class="fa-solid fa-quote-right"></i>
                </div>
              </div>
              <div class="avisclient-box-content-item-info">
                <span>Work</span>
                <h3>Pseudo</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipiscing elit netus at nibh velit sociis a
                  venenatis. Consequat mattis venenatis tortor mollis imperdiet ligula tempus eni.</p>
              </div>
            </div>
            <div class="avisclient-box-content-item">
              <div class="avisclient-box-content-item-avatar">
                <img src="/images/avatar.png" alt="">
                <div class="avisclient-box-content-item-avatar-icon">
                  <i class="fa-solid fa-quote-right"></i>
                </div>
              </div>
              <div class="avisclient-box-content-item-info">
                <span>Work</span>
                <h3>Pseudo</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipiscing elit netus at nibh velit sociis a
                  venenatis. Consequat mattis venenatis tortor mollis imperdiet ligula tempus eni.</p>
              </div>
            </div>
            <div class="avisclient-box-content-item">
              <div class="avisclient-box-content-item-avatar">
                <img src="/images/avatar.png" alt="">
                <div class="avisclient-box-content-item-avatar-icon">
                  <i class="fa-solid fa-quote-right"></i>
                </div>
              </div>
              <div class="avisclient-box-content-item-info">
                <span>Work</span>
                <h3>Pseudo</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipiscing elit netus at nibh velit sociis a
                  venenatis. Consequat mattis venenatis tortor mollis imperdiet ligula tempus eni.</p>
              </div>
            </div>
          </div>
          <div class="avisclient-box-content">
            <div class="avisclient-box-content-item">
              <div class="avisclient-box-content-item-avatar">
                <img src="/images/avatar.png" alt="">
                <div class="avisclient-box-content-item-avatar-icon">
                  <i class="fa-solid fa-quote-right"></i>
                </div>
              </div>
              <div class="avisclient-box-content-item-info">
                <span>Work</span>
                <h3>Pseudo</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipiscing elit netus at nibh velit sociis a
                  venenatis. Consequat mattis venenatis tortor mollis imperdiet ligula tempus eni.</p>
              </div>
            </div>
            <div class="avisclient-box-content-item">
              <div class="avisclient-box-content-item-avatar">
                <img src="/images/avatar.png" alt="">
                <div class="avisclient-box-content-item-avatar-icon">
                  <i class="fa-solid fa-quote-right"></i>
                </div>
              </div>
              <div class="avisclient-box-content-item-info">
                <span>Work</span>
                <h3>Pseudo</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipiscing elit netus at nibh velit sociis a
                  venenatis. Consequat mattis venenatis tortor mollis imperdiet ligula tempus eni.</p>
              </div>
            </div>
            <div class="avisclient-box-content-item">
              <div class="avisclient-box-content-item-avatar">
                <img src="/images/avatar.png" alt="">
                <div class="avisclient-box-content-item-avatar-icon">
                  <i class="fa-solid fa-quote-right"></i>
                </div>
              </div>
              <div class="avisclient-box-content-item-info">
                <span>Work</span>
                <h3>Pseudo</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipiscing elit netus at nibh velit sociis a
                  venenatis. Consequat mattis venenatis tortor mollis imperdiet ligula tempus eni.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Social Banner -->
      <div class="banner-links">
        <div class="banner-links-img-maps">
          <a href="#"></a>
        </div>
        <div class="banner-links-img-recipes">
          <a href="#"></a>
        </div>
        <div class="banner-links-img-social">
          <a href="#"></a>
        </div>
      </div>

      <!--Download app-->
      <div class="download-banner-content">
        <div class="download-banner-content-title">
          <h3>Téléchargez l'application !</h3>
          <p>Téléchargez Local Quest et devenez contributeur de l’économie locale de votre ville tout en
            améliorant votre alimentation</p>
        </div>
        <div class="download-banner-content-btn">
          <div class="apple">
            <a href=""><img src="/images/download-on-the-app-store-icon-logo_FR.png" alt=""></a>
          </div>
          <div class="android">
            <a href=""><img src="/images/Google_Play_Store_badge_FR.svg" alt=""></a>
          </div>
        </div>
      </div>
    </section>
    <div class="" v-else>
      <router-view v-bind:key="$route.fullPath"></router-view>
    </div>
  </main>
  <Footer />
</template>

<script>
import HeaderNav from "./components/template/HeaderNav.vue";
import Footer from "./components/template/footer.vue";
import { useShopStore } from "./stores/shopStore";
import { mapActions, mapState } from "pinia";
import axios from "axios";
export default {
  data() {
    return {
      previewImage: "http://[::1]:5173/public/images/",
      homeRecipes: [],
    };
  },
  components: {
    HeaderNav,
    Footer,
  },
  methods: {
    ...mapActions(useShopStore, ["setShop", "filterShops"]),
    categories(type) {
      this.filterShops({
        category_id: type,
      });
    },
  },
  created() {
    axios
      .get("http://127.0.0.1:8000/api/getRecipesHome")
      .then((res) => {
        this.homeRecipes = res.data.Recette;
      })
      .catch((err) => {
        console.log(err);
      });
  },
};
</script>
<style>
html {
  scroll-behavior: smooth;
}

a {
  text-decoration: none !important;
}



.shops_type_grid_infos_image>img {
  background-color: #ff8528;
  border-radius: 50%;
  max-width: 32px;
}

.shops_type_grid_infos_text {
  display: flex;
  flex-direction: column;
  color: white;
}

.shops_type_grid_infos {
  display: flex;
  gap: 10px;
  padding: 1.5rem 1.5rem;
}



/* categorie jasmina */

.commerçants {
  display: flex;
  flex-direction: column;
  align-items: center;
  max-width: 80%;
  margin: 0 auto;
  padding-bottom: 2rem;
  text-align: center;
}

.commerçants-title {
  width: 50%;
  margin: 0 auto;
  padding-bottom: 2rem;
  text-align: center;
}

.commerçants-box {
  display: flex;
  width: 100%;

}

.commerçants-box-content {
  display: flex;
  justify-content: center;
  gap: 1rem;
  width: 100%;
  flex-wrap: wrap;
}

.commerçants-box-content-item {
  background: url('../../public/images/epicerie-1.png');
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  height: 40vh;
  width: 23%;
  min-width: 300px;
  max-width: 500px;
}
.commerçants-box-content-item > a {
  display: flex;
  gap: 1rem;
  align-items: center;
  text-align: left;
  margin: 1rem 0 0 1rem;
}
.commerçants-box-content-item > a > .shops_type_grid_infos_image{
  background-color: #ff8528;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  border-radius: 50px;
}
.commerçants-box-content-item > a > .shops_type_grid_infos_image > i{
  font-size: 1rem;
  color: white;
}

.cta_recipes {
  background-image: url("../../public/images/bg-section-img.png");
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  background-attachment: fixed;
  height: 50vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.cta_recipes_wrapper {
  width: 50%;
  color: white;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1rem;
}

.cta_recipes_title>h2 {
  font-size: 40px;
  font-weight: 600;
}

.search_bar_btn {
  display: flex;
  gap: 1rem;
}

.search_bar_btn>button {
  background: #ff8528;
  padding: 1rem;
  border-radius: 5px;
  color: white;
  font-family: "Raleway", sans-serif;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 20px;
  min-width: 150px;
  justify-content: center;
}

.see_recipes {
  width: 80vw;
  margin: 0 auto;
}

.see_recipes_title {
  text-align: center;
  font-size: 2rem;
}

.see_recipes_card_bg {
  background-image: url(../../public/images/recette-burger.jpg);
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  min-height: 240px;
  min-width: 340px;
  display: flex;
}

/* .see_recipes_card {
} */
.see_recipes_card_infos {
  border-right: 1px solid #efefef;
  border-left: 1px solid #efefef;
  border-bottom: 1px solid #efefef;
  padding: 1.5rem;
}

.see_recipes_card_infos_wrapper {
  display: flex;
  justify-content: space-between;
  gap: 2rem;
  padding: 1.5rem;
}

.see_recipes_card_infos_title>h4 {
  font-size: 1.5rem;
}

.see_recipes_card_infos_time {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.see_recipes-flex {
  display: flex;
  justify-content: center;
  gap: 2rem;
  flex-wrap: wrap;
}

.see_recipes_wrapper {
  margin: 1.5rem 0;
}

/* COMMENT ÇA MARCHE */
.howitswork {
  width: 80vw;
  margin: 4rem auto;
  display: flex;

}

.howitswork-box {
  display: flex;
  flex-direction: column;
}

.howitswork-box-title {
  text-align: center;
  font-size: 2rem;
  padding-bottom: 2rem;
}

.howitswork-step {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 2rem;
}

.howitswork-step-item {
  width: 30%;
  min-width: 400px;
}

.howitswork-step-item>span {
  font-size: 5rem;
  font-weight: 800;
  color: grey;
}

.howitswork-step-item>h4 {
  width: 90%;
  font-weight: 700;

}

.howitswork-step-item>p {
  width: 90%;
}

/* ---- ACTUS LOCALES ---- */

.actus {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
  margin: 0 auto;
  padding-bottom: 2rem;
  text-align: center;

}

.actus-title {
  width: 50%;
  margin: 0 auto;
  padding-bottom: 2rem;
  text-align: center;

}

.actus-box {
  display: flex;
}

.actus-box-content {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 2rem;
}

.actus-box-content-item {
  max-width: 400px;
  min-width: 80px;
  width: 23%;
  display: flex;
  flex-direction: column;
  position: relative;
}

.actus-box-content-item-img {
  width: 100%;
}

.actus-box-content-item-img img {
  height: 250px;
}

.actus-box-content-item-icon {
  background-color: #ff8528;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  border-radius: 50px;
  position: absolute;
  top: 1rem;
  left: 1rem;
}

.actus-box-content-item-icon i {
  font-size: 1rem;
  color: white;
}

.actus-box-content-item-category {
  background-color: #ff8528;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 30%;
  height: 10%;
  border-radius: 50px;
  position: absolute;
  top: 1rem;
  left: 1rem;
}

.actus-box-content-item-category span {
  color: white;
}

.actus-box-content-item-img {
  width: 100%;
}

.actus-box-content-item-img img {
  width: 100%;
}

.actus-box-content-item-info {
  display: flex;
  flex-direction: column;
  text-align: left;
  padding: 1.5rem;
  border-right: 1px solid var(--Light-grey, #D5D5D5);
  border-bottom: 1px solid var(--Light-grey, #D5D5D5);
  border-left: 1px solid var(--Light-grey, #D5D5D5);
  background: #FFF;
}

.actus-box-content-item-info-preparation {
  display: flex;
  gap: 2rem;
}

.actus-box-content-item-info-preparation-cook {
  display: flex;
  gap: 0.5rem;
}

.actus-box-content-item-info-preparation-cook i {
  color: #ff8528;
}

.actus-box-content-item-info-preparation-cook span {
  color: #93989B;
}

.actus-box-content-item-info-rate {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: #ff8528;
}

.actus-box-content-item-info-rate span {
  border: 1px solid #ff8528;
  display: flex;
  justify-content: center;
  width: 30px;
  height: 30px;
  border-radius: 50px;
}


/* ---- AVIS CLIENTS ---- */

.avisclient {
  display: flex;

}

.avisclient-title {
  margin-top: 5rem;
  width: 50%;
  margin: 0 auto;
  text-align: center;
}

.avisclient-box-content {
  width: 70%;
  margin: 5rem auto;
  display: flex;
  flex-direction: row;
  gap: 2rem;
}

.avisclient-box-item {
  display: flex;
  width: 50%;
}

.avisclient-box-item-avatar {
  width: 70%;
  display: flex;
}

.avisclient-box-item-avatar img {
  width: 140px;
  height: 120px;
  border-radius: 200px;
}

.avisclient-box-item-avatar-icon {
  width: 50%;
  margin-left: -2rem;
  display: flex;
  align-items: center;
}

.avisclient-box-item-avatar-icon i {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 40px;
  height: 40px;
  font-size: 1rem;
  padding: 0.5rem;
  color: white;
  background-color: #ff8528;
  border-radius: 100px;
  border: 2px solid white;
}

.avisclient-box-item-info>span {
  color: #ff8528;
}

/* ---- PRE FOOTER ---- */

/*Social banner links*/
.banner-links {
  display: flex;
  margin: 0 auto;
}

.banner-links-img {
  display: flex;
}

.banner-links-img-maps {
  background-image: url(../../public/images/footer-maps.png);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  width: 100%;
  min-height: 300px;
}

.banner-links-img-recipes {
  background-image: url(../../public/images/footer-recipes.png);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  width: 100%;
  min-height: 300px;
}

.banner-links-img-social {
  background-image: url(../../public/images/footer-social.png);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  width: 100%;
}

/* CTA banner*/
.download-banner-content {
  background-color: #ff8528;
  padding: 5rem;
  display: flex;
  flex-direction: column;
}

.download-banner-content-title {
  display: flex;
  flex-direction: column;
}

.download-banner-content-btn {
  display: flex;
  gap: 2rem;
}
</style>
