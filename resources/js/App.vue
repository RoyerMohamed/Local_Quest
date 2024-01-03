<template>
  <HeaderNav />
  <main>
    <section v-if="$route.path == '/'">
      <div class="shops_type">
        <div class="shops_type_title">
          <h2>Quel type de commerce cherchez-vous ?</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipiscing elit, luctus nisi
            malesuada taciti turpis habitant hendrerit, auctor augue nulla non
            dui dapibus. Ante montes ullamcorper aptent malesuada dui nisi n
          </p>
        </div>
        <div class="shops_type_grid">
          <div class="shops_type_grid_top">
            <div class="shops_type_grid_top_card_one">
              <router-link to="/commerces" @click="this.categories(1)">
                <div class="shops_type_grid_infos">
                  <div class="shops_type_grid_infos_image">
                    <img
                      :src="this.previewImage + 'epicerie-icon.png'"
                      alt=""
                      srcset=""
                    />
                  </div>
                  <div class="shops_type_grid_infos_text">
                    <strong>Épicerie</strong>
                    <span>Voir la sélection</span>
                  </div>
                </div>
              </router-link>
            </div>

            <div class="shops_type_grid_top_card_two">
              <router-link to="/commerces" @click="this.categories(7)">
                <div class="shops_type_grid_infos">
                  <div class="shops_type_grid_infos_image">
                    <img
                      :src="this.previewImage + 'des-legumes.png'"
                      alt=""
                      srcset=""
                    />
                  </div>
                  <div class="shops_type_grid_infos_text">
                    <strong>Fruits et légumes</strong>
                    <span>Voir la sélection</span>
                  </div>
                </div>
              </router-link>
            </div>
          </div>
          <div class="shops_type_grid_buttom">
            <div class="shops_type_grid_buttom_card_one">
              <router-link to="/commerces" @click="this.categories(2)">
                <div class="shops_type_grid_infos">
                  <div class="shops_type_grid_infos_image">
                    <img
                      :src="this.previewImage + 'epicerie.png'"
                      alt=""
                      srcset=""
                    />
                  </div>
                  <div class="shops_type_grid_infos_text">
                    <strong>boulangeries</strong>
                    <span>Voir la sélection</span>
                  </div>
                </div>
              </router-link>
            </div>
            <div class="shops_type_grid_buttom_card_two">
              <router-link to="/commerces" @click="this.categories(6)">
                <div class="shops_type_grid_infos">
                  <div class="shops_type_grid_infos_image">
                    <img
                      :src="this.previewImage + 'epicerie.png'"
                      alt=""
                      srcset=""
                    />
                  </div>
                  <div class="shops_type_grid_infos_text">
                    <strong>Poissonnerie</strong>
                    <span>Voir la sélection</span>
                  </div>
                </div>
              </router-link>
            </div>
            <div class="shops_type_grid_buttom_card_three">
              <router-link to="/commerces" @click="this.categories(5)">
                <div class="shops_type_grid_infos">
                  <div class="shops_type_grid_infos_image">
                    <img
                      :src="this.previewImage + 'epicerie.png'"
                      alt=""
                      srcset=""
                    />
                  </div>
                  <div class="shops_type_grid_infos_text">
                    <strong>Fromagerie</strong>
                    <span>Voir la sélection</span>
                  </div>
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
          <div
            v-for="recipe in this.homeRecipes"
            :key="recipe.id"
            class="see_recipes_wrapper"
          >
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
                  <h4>{{ recipe.recipe_title }}</h4>
                </div>
                <div class="see_recipes_card_infos_wrapper">
                  <div class="see_recipes_card_infos_time">
                    <i
                      class="fa-solid fa-hourglass-start"
                      style="color: #ff8528"
                    ></i>
                    <span>{{ recipe.preparation_time }} minn</span>
                  </div>
                  <div class="see_recipes_card_infos_time">
                    <i
                      class="fa-solid fa-hourglass-start"
                      style="color: #ff8528"
                    ></i>
                    <span>{{ recipe.difficulty }}</span>
                  </div>
                  <div class="see_recipes_card_infos_time">
                    <i
                      class="fa-solid fa-hourglass-start"
                      style="color: #ff8528"
                    ></i>
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

      <div class="howitswork">
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
    </section>
    <div class="" v-else>
      <router-view v-bind:key="$route.fullPath"></router-view>
    </div>
  </main>
</template>

<script>
import HeaderNav from "./components/template/HeaderNav.vue";
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
.shops_type {
  margin: 5rem 5%;
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
  gap: 2rem;
}
.shops_type_title {
  text-align: center;
  width: 50%;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.shops_type_title > h2 {
  font-size: 32px;
}
.shops_type_grid_top,
.shops_type_grid_buttom {
  display: flex;
  max-width: 80vw;
  gap: 2rem;
}
.shops_type_grid {
  display: flex;
  flex-direction: column;
  gap: 2rem;
}
.shops_type_grid_top_card_one {
  background: url(../../public/images/epicerie-photo.jpg);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  height: 40vh;
  width: 30vw;
}
.shops_type_grid_top_card_two {
  background: url(../../public/images/Fruits-photo.jpg);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  height: 40vh;
  width: 70vw;
}
.shops_type_grid_buttom_card_one {
  background: url(../../public/images/Boucherie-photo.jpg);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  height: 40vh;
  width: 33vw;
}
.shops_type_grid_buttom_card_two {
  background: url(../../public/images/Poissonnerie-photo.jpg);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  height: 40vh;
  width: 33vw;
}
.shops_type_grid_buttom_card_three {
  background: url(../../public/images/Fromagerie-photo.jpg);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  height: 40vh;
  width: 33vw;
}
.shops_type_grid_infos_image > img {
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
.cta_recipes_title > h2 {
  font-size: 40px;
  font-weight: 600;
}
.search_bar_btn {
  display: flex;
  gap: 1rem;
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
.see_recipes_card {
}
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
.see_recipes_card_infos_title > h4 {
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

.howitswork{
  width: 80vw;
  margin: 4rem auto;
  display: flex;

}

.howitswork-box{
  display: flex;
  flex-direction: column;
}
.howitswork-box-title{
  text-align: center;
  font-size: 2rem;
  padding-bottom: 2rem;
}
.howitswork-step{
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 2rem;
}
.howitswork-step-item{
  width: 30%;
  min-width: 400px;
}

.howitswork-step-item > span{
  font-size: 5rem;
  font-weight: 800;
  color: grey;
}
.howitswork-step-item > h4{
  width: 90%;
  font-weight: 700;

}
.howitswork-step-item > p{
  width: 90%;
}
</style>
