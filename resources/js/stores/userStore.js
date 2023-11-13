import { defineStore } from 'pinia';

export const useUserStore = defineStore({
  id: 'useUserStore',

  state: () => ({
    id: '',
    user_name: '',
    email: '',
    role_id: '',
    token: '',
    image: '', 
    logitude : '', 
    latitude : '', 
    userLocation : false, 

  }),

  actions: {
    setUser(user) {
      this.id = user.id;
      this.user_name = user.user_name;
      this.email = user.email;
      this.role_id = user.role_id;
      this.token = this.token ? this.token : user.token;
      this.image = user.profil_picture;
    },
    setLocation(data){
      console.log(data);
      // this.latitude = userlatitude;
      // this.logitude = userlogitude; 
    }

  },

  persist: true,
});
