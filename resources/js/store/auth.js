// src/stores/auth.js
import { defineStore } from 'pinia';

export const useAuthStore = defineStore('auth', {
  state: () => ({
    isLoggedIn: false,
    userDetails: null
  }),
  actions: {
    login() {
      // Perform login actions (e.g., sending login request)
      // Once login is successful, set isLoggedIn to true
      this.isLoggedIn = true;
    },
    logout() {
      // Perform logout actions (e.g., clear session)
      // Once logout is successful, set isLoggedIn to false
      this.isLoggedIn = false;
    },
  },
});
