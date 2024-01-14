<template>
  <HeaderNav />
  <main>
    <section v-if="$route.path == '/'">

      <!-- Catégories commerçants  -->
      <!-- <div class="commerçants mt-5 mb-5">
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
      </div> -->

      <!-- Commerçants à l'honner  -->

      <div class="commerçants">
        <div class="commerçants-title">
          <h3>Les commerçants à l'honneur</h3>
          <p>Avec Local Quest, changez vos habitudes de consommation en douceur tout en soutenant l’économie locale !
          </p>
        </div>
        <div class="commerçants-box">
          <div class="commerçants-box-content">
            <a href="" class="commerçants-box-content-item">
              <div>
                <div class="commerçants-box-content-item-icon"><i class="fa-solid fa-shop"></i></div>
                <div class="commerçants-box-content-item-img">
                  <img src="/images/epicerie-1.png" alt="">
                </div>
                <div class="commerçants-box-content-item-info">
                  <h4>La ferme en colis</h4>
                  <p>12 Rue de la Reine des Prés, 79460 Magné</p>
                  <div class="commerçants-box-content-item-info-rate">
                    <span>5</span>
                    <div>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>

            <a href="" class="commerçants-box-content-item">
              <div>
                <div class="commerçants-box-content-item-icon"><i class="fa-solid fa-cow"></i></div>
                <div class="commerçants-box-content-item-img">
                  <img src="/images/boucherie-1.png" alt="">
                </div>
                <div class="commerçants-box-content-item-info">
                  <h4>Loic Chouc Bessines</h4>
                  <p>Zone de la Mude, 79000 Bessines</p>
                  <div class="commerçants-box-content-item-info-rate">
                    <span>4</span>
                    <div>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-regular fa-star"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            <a href="" class="commerçants-box-content-item">
              <div>
                <div class="commerçants-box-content-item-icon"><i class="fa-solid fa-cheese"></i></div>
                <div class="commerçants-box-content-item-img">
                  <img src="/images/fromaegrie-1.png" alt="">
                </div>
                <div class="commerçants-box-content-item-info">
                  <h4>L'opéra des fromages</h4>
                  <p>2 Bd Louis Blanc, 85000 La Roche-sur-Yon</p>
                  <div class="commerçants-box-content-item-info-rate">
                    <span>5</span>
                    <div>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            <a href="" class="commerçants-box-content-item">
              <div>
                <div class="commerçants-box-content-item-icon"><i class="fa-solid fa-wine-bottle"></i></div>
                <div class="commerçants-box-content-item-img">
                  <img src="/images/vin-1.png" alt="">
                </div>
                <div class="commerçants-box-content-item-info">
                  <h4>Le Pied de Vigne</h4>
                  <p>109 Av. Gambetta, 17100 Saintes</p>
                  <div class="commerçants-box-content-item-info-rate">
                    <span>5</span>
                    <div>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
      <!-- Banner CTA  -->
      <!-- CTA Banner -->
      <div class="cta_banner">
        <div class="cta_banner_wrapper">
          <div class="cta_banner_title">
            <h2>Améliorez votre consommation au quotidien</h2>
          </div>
          <div class="cta_banner_text">
            <p>
              Lorem ipsum dolor sit amet consectetur adipiscing elit, luctus
              nisi malesuada taciti turpis habitant hendrerit, auctor augue
              nulla non dui dapibus. Ante montes ullamcorper aptent malesuada
              dui nisi nunc, vehicula accumsan conubia pulvinar habitant
              sollicitudin auctor, a fringilla dignissim at mattis parturient.
            </p>
          </div>
          <div class="cta_banner_btn">
              <div  class="master-btn">
                Voir les commerçants locaux 
                <i class="fa-solid fa-magnifying-glass" style="color: #ffffff"></i>
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
      <div class="cta_banner">
        <div class="cta_banner_wrapper">
          <div class="cta_banner_title">
            <h2>Enregistrez votre commerce pour atteindre vos clients</h2>
          </div>
          <div class="cta_banner_text">
            <p>
              Lorem ipsum dolor sit amet consectetur adipiscing elit, luctus
              nisi malesuada taciti turpis habitant hendrerit, auctor augue
              nulla non dui dapibus. Ante montes ullamcorper aptent malesuada
              dui nisi nunc, vehicula accumsan conubia pulvinar habitant
              sollicitudin auctor, a fringilla dignissim at mattis parturient.
            </p>
          </div>
          <div class="cta_banner_btn">
              <div  class="master-btn">
                Créer mon compte commerçant 
                <i class="fa-solid fa-chevron-right"></i>
              </div>
          </div>
        </div>
      </div>

      <!-- Avis clients -->
      <div class="avisclient">
        <div class="avisclient-title">
          <h3>Ce que pense les utilisateurs de Local Quest</h3>
          <p>Déja plus de 8 milles utilisateurs</p>
        </div>
        <div class="avisclient-box">
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
          <!-- <div class="apple">
            <a href=""><img src="/images/download-on-the-app-store-icon-logo_FR.png" alt=""></a>
          </div>
          <div class="android">
            <a href=""><img src="/images/Google_Play_Store_badge_FR.svg" alt=""></a>
          </div> -->
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
import Footer from "./components/template/Footer.vue";
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


/*Commerçant à l'honneur*/
.commerçants {
  width: 90%;
  margin: 5rem auto;  
  padding-bottom: 2rem;
}

.commerçants-title {
  width: 50%;
  margin: 0 auto;
  padding-bottom: 2rem;
  text-align: center;
}

.commerçants-box {
  display: flex;
}

.commerçants-box-content {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 2rem;
}

.commerçants-box-content-item {
  max-width: 400px;
  min-width: 80px;
  width: 23%;
  display: flex;
  flex-direction: column;
  position: relative;
  color: #3A3A3A;

}

.commerçants-box-content-item-img {
  width: 100%;
}

.commerçants-box-content-item-img img {
  height: 250px;
}

.commerçants-box-content-item-icon {
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

.commerçants-box-content-item-icon i {
  font-size: 1rem;
  color: #FFF;
}

.commerçants-box-content-item-category {
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

.commerçants-box-content-item-category span {
  color: #FFF;
}

.commerçants-box-content-item-img {
  width: 100%;
}

.commerçants-box-content-item-img img {
  width: 100%;
}

.commerçants-box-content-item-info {
  display: flex;
  flex-direction: column;
  padding: 1.5rem;
  border-right: 1px solid var(--Light-grey, #D5D5D5);
  border-bottom: 1px solid var(--Light-grey, #D5D5D5);
  border-left: 1px solid var(--Light-grey, #D5D5D5);
  background: #FFF;
}

.commerçants-box-content-item-info-preparation {
  display: flex;
  gap: 2rem;
}

.commerçants-box-content-item-info-preparation-cook {
  display: flex;
  gap: 0.5rem;
}

.commerçants-box-content-item-info-preparation-cook i {
  color: #ff8528;
}

.commerçants-box-content-item-info-preparation-cook span {
  color: #93989B;
}

.commerçants-box-content-item-info-rate {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: #ff8528;
}

.commerçants-box-content-item-info-rate span {
  border: 1px solid #ff8528;
  display: flex;
  justify-content: center;
  width: 30px;
  height: 30px;
  border-radius: 50px;
}

/*CTA BANNER*/
.cta_banner {
  background-image: url("../../public/images/marché-local 1.png");
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  background-attachment: fixed;
  height: 60vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.cta_banner_wrapper {
  width: 70%;
  color: white;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1rem;
}

.cta_banner_title>h2 {
  font-size: 40px;
  font-weight: 600;
}

.cta_banner_btn > .master-btn{
  display: flex;
  align-items: center;
  justify-items: center;
  gap: 1rem;
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

/* ---- AVIS CLIENTS ---- */

.avisclient {
  margin: 4rem auto;
  display: flex;
  flex-direction: column;

}

.avisclient-title {
  margin-top: 5rem;
  width: 50%;
  margin: 0 auto;
  text-align: center;
}

.avisclient-box-content {
  width: 80%;
  margin: 5rem auto;
  display: flex;
  flex-direction: row;
  gap: 3rem;
}

.avisclient-box-content-item {
  display: flex;
  width: 70%;
  gap: 1rem;
}

.avisclient-box-content-item-avatar {
  width: 100%;
  display: flex;
  flex-direction: row;
}

.avisclient-box-content-item-avatar > img {
  width: 140px;
  height: 120px;
  border-radius: 200px;
}

.avisclient-box-content-item-avatar-icon {
  width: 50%;
  margin-left: -2rem;
  display: flex;
  align-items: center;
}

.avisclient-box-content-item-avatar-icon >i {
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

.avisclient-box-content-item-info>span {
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
