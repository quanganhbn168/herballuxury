import { createApp } from 'vue'
import App from './App.vue'
import router from '../routes/index' // Đường dẫn chính xác
// import './bootstrap'


const app = createApp(App)
app.use(router)
app.mount('#app')