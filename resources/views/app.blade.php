<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @env('local')
    <link href="http://localhost:5173/resources/css/app.css" rel="stylesheet">
    @endenv
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900">
    <div id="app">
        <div class="test-blade bg-red-500 text-white p-4">
            Test Tailwind trong Blade (nếu đỏ thì Vite hoạt động)
        </div>
    </div>
    
</body>
</html>