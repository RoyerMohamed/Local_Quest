import { defineStore } from 'pinia';
import axios from 'axios';

export const useRecipeStore = defineStore({
  id: 'useRecipeStore',

  state: () => ({
    recipes: [],
  }),

  actions: {
    setRecipe() {
        axios.get('http://127.0.0.1:8000/api/recipes').then((res) => {
          this.recipes = res.data.Recette
        }).catch((err) => console.log(err))
    }
  },

  persist: true,
});
