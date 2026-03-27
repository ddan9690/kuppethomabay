<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Dynamic Title --}}
    <title>@yield('title', 'KUPPET Homabay Branch')</title>

    {{-- SEO Meta --}}
    <meta name="description" content="KUPPET Homabay Branch - Kenya Union of Post Primary Education Teachers. Promoting teacher welfare, professional development, and quality education in Homabay, Kenya.">
    <meta name="keywords" content="KUPPET, Kenya Union of Post Primary Education Teachers, Homabay teachers, teacher welfare, education development, teacher union, post-primary education, professional development, education advocacy, Homabay Branch">

    {{-- Open Graph / Social Sharing --}}
    <meta property="og:title" content="@yield('title', 'KUPPET Homabay Branch')">
    <meta property="og:description" content="KUPPET Homabay Branch - Advancing teacher welfare, professional growth, and educational development in Kenya.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/kupet-homabay-logo.png') }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'KUPPET Homabay Branch')">
    <meta name="twitter:description" content="KUPPET Homabay Branch - Advancing teacher welfare, professional growth, and educational development in Kenya.">
    <meta name="twitter:image" content="{{ asset('images/kupet-homabay-logo.png') }}">

    {{-- FAVICONS --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/favicon_io/site.webmanifest') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon_io/favicon.ico') }}" type="image/x-icon">

    {{-- Optional Theme Color --}}
    <meta name="theme-color" content="#16a34a"> {{-- Tailwind green --}}

    {{-- Tailwind + Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Boxicons CDN --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- DataTables CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Anime.js --}}
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    {{-- jQuery for DataTables --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

</head>
<body class="bg-gray-light text-gray-dark font-sans">

    {{-- Header --}}
    @include('partials.frontend.header')

    {{-- Main Content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.frontend.footer')

    {{-- Initialize DataTables --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tables = document.querySelectorAll('table.data-table');
            tables.forEach(table => $(table).DataTable());
        });
    </script>

</body>
</html>