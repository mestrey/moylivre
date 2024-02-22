<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>МойЛивр - {{ $title }}</title>

    <link href="https://fonts.cdnfonts.com/css/tt-livret-text-trial" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full bg-[#F7F7F7]">
    @yield('app')
</body>

</html>