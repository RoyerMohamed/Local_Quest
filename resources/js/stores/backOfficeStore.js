import { defineStore } from 'pinia';
import axios from 'axios';

export const useBackOfficeStore = defineStore({
  id: 'useBackOfficeStore',
  state: () => ({
    shops: []
  }),

  actions: {

  },
  getters: {
   
  },
  persist: true,
});
