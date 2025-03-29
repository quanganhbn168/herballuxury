<template>
  <section class="bg-gradient-to-r from-primary-500 to-primary-600 text-white py-20">
    <div class="container mx-auto px-4">
      <div class="max-w-3xl mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Build amazing products faster</h1>
        <p class="text-xl mb-8 opacity-90">
          Our platform helps you create beautiful websites without coding skills.
          Get started today and launch your dream project.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
          <Button size="lg" class="shadow-lg">Get Started</Button>
          <Button variant="outline" size="lg" class="border-white text-white hover:bg-white hover:text-primary-600">
            Learn More
          </Button>
        </div>
      </div>
      
      <div class="mt-16 rounded-xl overflow-hidden shadow-2xl">
        <img 
          src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
          alt="Dashboard preview" 
          class="w-full h-auto"
        >
      </div>
    </div>
  </section>
</template>

<script setup>
import Button from '../ui/Button.vue'
</script>