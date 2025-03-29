<template>
  <div class="home">
    <Hero />
    <Features />
    <Testimonials />
    <CTA />
  </div>
</template>

<script>
import Hero from './sections/Hero.vue'
import Features from './sections/Features.vue'
import Testimonials from './sections/Testimonials.vue'
import CTA from './sections/CTA.vue'

export default {
  name: 'Home',
  components: {
    Hero,
    Features,
    Testimonials,
    CTA
  }
}
</script>