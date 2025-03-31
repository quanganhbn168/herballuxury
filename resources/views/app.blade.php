<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="test" content="123">
    @vite(['resources/css/app.css','resources/css/blade.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
    </div>
</body>
</html>