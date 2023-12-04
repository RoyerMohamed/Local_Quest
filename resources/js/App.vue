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
              <div class="shops_type_grid_infos">
                <div class="shops_type_grid_infos_image">
                  <img
                    :src="this.previewImage + 'epicerie.png'"
                    alt=""
                    srcset=""
                  />
                </div>
                <div class="shops_type_grid_infos_text">
                  <strong>Épicerie</strong>
                  <span>Voir la sélection</span>
                </div>
              </div>
            </div>
            <div class="shops_type_grid_top_card_two">
              <div class="shops_type_grid_infos">
                <div class="shops_type_grid_infos_image">
                  <img
                    :src="this.previewImage + 'epicerie.png'"
                    alt=""
                    srcset=""
                  />
                </div>
                <div class="shops_type_grid_infos_text">
                  <strong>Fruits et légumes</strong>
                  <span>Voir la sélection</span>
                </div>
              </div>
            </div>
          </div>
          <div class="shops_type_grid_buttom">
            <div class="shops_type_grid_buttom_card_one">
              <div class="shops_type_grid_infos">
                <div class="shops_type_grid_infos_image">
                  <img
                    :src="this.previewImage + 'epicerie.png'"
                    alt=""
                    srcset=""
                  />
                </div>
                <div class="shops_type_grid_infos_text">
                  <strong>Boucherie</strong>
                  <span>Voir la sélection</span>
                </div>
              </div>
            </div>
            <div class="shops_type_grid_buttom_card_two">
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
            </div>
            <div class="shops_type_grid_buttom_card_three">
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

      <div class="see_recipes">
        <div class="see_recipes_title">
          <h2>Les recettes locales proposées</h2>
        </div>
        <div class="see_recipes_wrapper">
          <div class="see_recipes_card">
            <div class="see_recipes_card_img">
              <img :src="this.previewImage + 'recipes.png'" alt="" srcset="">
            </div>
            <div class="see_recipes_card_infos">
              <div class="see_recipes_card_infos_time">
                <i class="fa-solid fa-hourglass-start" style="color: #ff8528;"></i>.
              </div>
            </div>
          </div>
          <div class="see_recipes_card"></div>
          <div class="see_recipes_card"></div>
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
import { mapActions } from "pinia";
export default {
  data() {
    return {
      previewImage: "http://[::1]:5173/public/images/",
    };
  },
  components: {
    HeaderNav,
  },
  methods: {
    ...mapActions(useShopStore, ["setShop"]),
  },
};
</script>
<style>
html {
  scroll-behavior: smooth;
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
  background: url(../../public/images/shop.png);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  height: 40vh;
  width: 30vw;
}
.shops_type_grid_top_card_two {
  background: url(../../public/images/shop.png);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  height: 40vh;
  width: 70vw;
}
.shops_type_grid_buttom_card_one {
  background: url(../../public/images/shop.png);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  height: 40vh;
  width: 33vw;
}
.shops_type_grid_buttom_card_two {
  background: url(../../public/images/shop.png);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  height: 40vh;
  width: 33vw;
}
.shops_type_grid_buttom_card_three {
  background: url(../../public/images/shop.png);
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
  justify-content: center;
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
</style>
