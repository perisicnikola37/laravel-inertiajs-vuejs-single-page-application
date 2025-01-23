<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- <title inertia>{{ config('app.name', 'Laravel') }}</title> --}}
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        {{-- Font Awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-X4uW4UXofX9BAbTCfajPCJZr8rZk+/Q2IcGdCs+gMf/diK1tX9s3OMnLTwYjrmnZG05LsTcCAzpRwHXyTj+fKw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="icon" href="{{ $page['props']['favicon'] }}" type="image/x-icon">
        
        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
