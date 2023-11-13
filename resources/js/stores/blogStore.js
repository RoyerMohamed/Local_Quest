import { defineStore } from 'pinia';
import axios from 'axios';

export const useBlogStore = defineStore({
  id: 'useBlogStore',

  state: () => ({
    blogs: [],
  }),

  actions: {
    setBlog() {
        axios.get('http://127.0.0.1:8000/api/articles').then((res) => {
          console.log(res);
        }).catch((err) => console.log(err))
    }
  },

  persist: true,
});
