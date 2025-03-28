import { createApp } from 'vue';
import App from './App.vue';

console.log('app.js is loaded');

const app = createApp(App);
app.mount('#app');

console.log('Vue app mounted');