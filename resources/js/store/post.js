// src/stores/auth.js
import { defineStore } from 'pinia';

export const usePostStore = defineStore('post', {
  state: () => ({
    // isLoggedIn: localStorage.getItem('userDetails') != null ? true : false,
    // userDetails: localStorage.getItem('userDetails')
    posts: []
  }),
  actions: {
    async fetchPosts() {
        const response = await fetch('/api/allPosts')
        const data = await response.json()
        this.posts = data
      },
  },
});
