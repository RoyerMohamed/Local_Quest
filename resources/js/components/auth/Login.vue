<template>
  <div class="bg">
    <ValidationErrors
      class="w-50 text-center"
      v-if="this.validationErrors"
      :errors="this.validationErrors"
    />
    <div class="auth">
      <div class="auth_btns">
        <ul>
          <li class="active_link" id="connexion" @click="this.toggleBtns('login')"><span>Connexion</span></li>
          <li class="non_active_link" id="inscription" @click="this.toggleBtns('register')" ><span>Inscription</span></li>
        </ul>
      </div>
      <div class="login" id="login">
        <form @submit.prevent="handleLogin">
          <div class="mb-3">
            <input
              type="text"
              name="local_user_name"
              v-model="user.user_name"
              placeholder="user_name"
            />
          </div>
          <div class="mb-3">
            <input
            type="password"
            name="login_password"
            v-model="user.password"
            placeholder="Password"
          />
          </div>
        
          <div class="btns">
            <button type="Submit" class="btn_signUp">Se connecter</button>
          </div>
        </form>
      </div>
      <div class="register" id="register">
        <form @submit.prevent="register" enctype="multipart/form-data">
          <div class="mb-3">
            <input
              type="text"
              id="pseudo"
              placeholder="Pseudo"
              name="pseudo"
              v-model="user_name"
            />
          </div>
          <div class="mb-3">
            <input
              type="email"
              placeholder="Adresse mail"
              id="email"
              name="email"
              v-model="email"
            />
          </div>
          <div class="mb-3">
            <input
              required
              type="password"
              placeholder="Mot de passe"
              id="password"
              name="password"
              v-model="password"
            />
          </div>
          <div class="mb-3">
            <input
              type="file"
              id="image"
              ref="image"
              class="form-control"
              name="image"
            />
          </div>

          <div class="btns">
            <button type="Submit" class="btn_signUp">S’inscrire</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
  
<script type="module">
import axios from "axios";
import { mapActions } from "pinia";
import { useShopStore } from "../../stores/shopStore";
import { useUserStore } from "../../stores/userStore";
import ValidationErrors from "../utils/ValidationErrors.vue";
export default {
  name: "Login",
  components: { ValidationErrors },
  data() {
    return {
      user: {
        user_name: "",
        password: "",
      },
      formData: new FormData(),
      validationErrors: "",
    };
  },

  methods: {
    ...mapActions(useUserStore, ["setUser", "setIsAdmin"]),
    ...mapActions(useShopStore, ["setShop"]),

    async handleLogin() {
      axios
        .get("sanctum/csrf-cookie")
        .then(() => {
          axios
            .post("http://127.0.0.1:8000/api/login", {
              user_name: this.user.user_name,
              password: this.user.password,
            })
            .then((res) => {
              if (res.data.user.role.role_name === "admin") {
              
                this.setIsAdmin(true);
              } else {
                this.setIsAdmin(false);
              }

              this.setUser(res.data.user);
              axios.defaults.headers.common.Authorization = `Bearer ${
                useUserStore().token
              }`;
              this.$router.push("/");
            })
            .catch((err) => {
              //console.log(err.response);
              this.validationErrors = err.response.data;
            });
        })
        .catch((err) => console.log(err));
    },
    register() {
      this.formData.append("user_name", this.user_name);
      this.formData.append("email", this.email);
      this.formData.append("image", this.$refs.image.files[0]);
      this.formData.append("password", this.password);
      // console.log({user_name :this.user_name ,email: this.email ,image : this.$refs.image.files[0] , password :this.password},);
      axios
        .post(
          "http://127.0.0.1:8000/api/users",
          {
            user_name: this.user_name,
            email: this.email,
            image: this.$refs.image.files[0],
            password: this.password,
          },
          {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          }
        )
        .then((res) => {
          this.validationErrors = "";
          this.$router.push("/");
          console.log("res", res);
        })
        .catch((err) => {
          console.log("err", err);
          this.validationErrors = err.response.data[0].errors;
        });
    },
    toggleBtns(data){
      const register = document.getElementById("register")
      const login = document.getElementById("login")
      const inscription = document.getElementById('inscription')
      const connexion = document.getElementById('connexion')
      if(data == "register"){
        connexion.classList.remove('active_link')
        connexion.classList.add('non_active_link')

        inscription.classList.add('active_link')
        inscription.classList.remove('non_active_link')

        register.style.display = 'block'
        login.style.display = 'none'
      }else{
        login.style.display = 'block'
        register.style.display = 'none'
        connexion.classList.add('active_link')
        connexion.classList.remove('non_active_link')

        inscription.classList.remove('active_link')
        inscription.classList.add('non_active_link')
      }
 
    }
  },
};
</script>
<style>
.bg {
  background-color: #f4f1e9;
  min-height: 90vh;
  display: flex;
  justify-content: center;
  align-items: center;
}
.auth {
  width: 20%;
  min-width: 400px;
}
.auth_btns > ul {
  display: flex;
  padding: 0;
  margin: 0;
}
.login {
  padding: 2rem;
  background-color: #edeae1;
  animation-name: show;
  animation-duration: 1s;
}
@keyframes show { 
  0% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}
.register  {
  background-color: #edeae1;
  padding: 2rem;
  display: none;
  animation-name: show;
  animation-duration: 1s;
}
.login > form > div > input {
  padding: 0.75rem;
  width: 100%;
  border-radius: 5px;
}
.register > form > div > input {
  padding: 0.75rem;
  width: 100%;
  border-radius: 5px;
}
.btns {
  width: 100%;
}
.btn_signUp {
  background: #ff8528;
  padding: .5rem 1rem;
  border-radius: 5px;
  color: white;
  font-family: "Raleway", sans-serif;
  display: flex;
  align-items: center;
  font-size: 1rem;
  width: 100%;
  justify-content: center;
  border-radius: 5px;
}
.active_link {
  background-color: #edeae1;
}
.non_active_link {
  background-color: white;
}
.auth_btns > ul > li {
  width: 35%;
  padding: 1.5rem 2rem;
  cursor: pointer;
}
.auth_btns > ul > li > span {
  width: 100%;
}
</style>

  