<template>
  <div class="app-wrapper">
    
    <Header />
    <div class="test-tailwind bg-red-500 text-white p-4">
      Nếu thấy nền đỏ chữ trắng là Tailwind hoạt động
    </div>
    <router-view></router-view>
    <Footer />
  </div>
</template>

<script>
import Header from './components/layout/Header.vue'
import Footer from './components/layout/Footer.vue'

export default {
  name: 'App',
  components: {
    Header,
    Footer
  }
}
</script>