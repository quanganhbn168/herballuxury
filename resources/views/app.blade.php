<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900">
    <div id="app">
        <!-- Test 1: Tailwind từ Blade -->
  <div class="test-blade bg-red-500 text-white p-4 mb-4">
    Test Tailwind từ Blade (phải đỏ)
  </div>
  
  <!-- Test 2: Style cứng -->
  <div style="background: red; color: white; padding: 1rem;">
    Test CSS thủ công (phải đỏ)
  </div>
    </div>
    
</body>
</html>