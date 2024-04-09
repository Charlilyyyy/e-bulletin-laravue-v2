import '../css/app.css';

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './views/App.vue'
import router from './router/index.js'

createApp(App).use(router).use(createPinia()).mount("#app")