import './bootstrap'
import { createApp } from 'vue'
import Header from './components/layout/Header.vue'
import Footer from './components/layout/Footer.vue'
import Hero from './components/sections/Hero.vue'
import Features from './components/sections/Features.vue'
import Testimonials from './components/sections/Testimonials.vue'
import CTA from './components/sections/CTA.vue'

const app = createApp({})

// Register global components
app.component('Header', Header)
app.component('Footer', Footer)
app.component('Hero', Hero)
app.component('Features', Features)
app.component('Testimonials', Testimonials)
app.component('CTA', CTA)

app.mount('#app')