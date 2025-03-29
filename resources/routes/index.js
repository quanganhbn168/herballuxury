import { createRouter, createWebHistory } from 'vue-router'
import Home from './components/Home.vue' // Đảm bảo có component này

const routes = [
  { path: '/', component: Home }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

app.use(router)