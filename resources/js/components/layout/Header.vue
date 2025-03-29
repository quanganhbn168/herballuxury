<template>
    <header class="top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                  <a href="#" class="text-2xl font-bold text-primary-600">
                    <img src="/images/static/logo-tomorder.png" alt="Logo" width="200">
                  </a>
                </div>
                <nav class="hidden md:flex space-x-8">
                  <a href="#aboutus" class="text-gray-600 hover:text-primary-600 transition">Về chúng tôi</a>
                  <a href="#why" class="text-gray-600 hover:text-primary-600 transition">Testimonials</a>
                  <a href="#pricing" class="text-gray-600 hover:text-primary-600 transition">Pricing</a>
                  <a href="#luckywheel" class="text-gray-600 hover:text-primary-600 transition">Pricing</a>
                </nav>
                <button class="md:hidden text-gray-600">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                  </svg>
                </button>
            </div>
        </div>
    </header>
</template>

<script setup>
    import Button from '../ui/Button.vue'
</script>