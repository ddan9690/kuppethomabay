<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Dynamic Title --}}
    <title>@yield('title', 'KUPPET Homabay Branch')</title>

    {{-- SEO Meta --}}
    <meta name="description"
        content="KUPPET Homabay Branch - Kenya Union of Post Primary Education Teachers. Promoting teacher welfare, professional development, and quality education in Homabay, Kenya.">
    <meta name="keywords"
        content="KUPPET, Kenya Union of Post Primary Education Teachers, Homabay teachers, teacher welfare, education development, teacher union, post-primary education, professional development, education advocacy, Homabay Branch">

    {{-- Open Graph / Social Sharing --}}
    <meta property="og:title" content="@yield('title', 'KUPPET Homabay Branch')">
    <meta property="og:description"
        content="KUPPET Homabay Branch - Advancing teacher welfare, professional growth, and educational development in Kenya.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/kupet-homabay-logo.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'KUPPET Homabay Branch')">
    <meta name="twitter:description"
        content="KUPPET Homabay Branch - Advancing teacher welfare, professional growth, and educational development in Kenya.">
    <meta name="twitter:image" content="{{ asset('images/kupet-homabay-logo.png') }}">

    {{-- FAVICONS --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('assets/images/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets/images/favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/favicon_io/site.webmanifest') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon_io/favicon.ico') }}" type="image/x-icon">

    {{-- Theme Color --}}
    <meta name="theme-color" content="#16a34a">

    {{-- Tailwind + Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Boxicons --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    {{-- Alpine --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Anime --}}
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    {{-- SweetAlert2 --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    {{-- AOS JS --}}
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    {{-- Rellax --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js"></script>

    {{-- Google Analytics --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LCKK65BC2Z"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-LCKK65BC2Z');
    </script>

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

    {{-- Core JS --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // DataTables
            const tables = document.querySelectorAll('table.data-table');
            tables.forEach(table => $(table).DataTable());

            // AOS
            AOS.init({
                duration: 900,
                once: true,
                offset: 120,
                easing: 'ease-in-out'
            });

            // Rellax
            new Rellax('.rellax');

        });
    </script>

    {{-- 🔥 MENTAL HEALTH CAMPAIGN POPUP (FIXED: SHOWS ON EVERY REFRESH) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // Only homepage
            if (window.location.pathname !== '/') return;

            setTimeout(() => {

                Swal.fire({
                    title: '<span style="font-size:1.8rem;font-weight:600;">Your Mind Matters 💚</span>',

                    html: `
                        <p style="font-size:0.95rem; line-height:1.7; opacity:0.85;">
                            Teaching shapes lives; but it should not cost you your peace.
                            Join the <strong>Teacher Mental Health & Wellness Campaign</strong>
                            and stand with fellow teachers across Homa Bay.
                        </p>
                    `,

                    confirmButtonText: '💚 Take the Wellness Pledge',
                    cancelButtonText: 'Maybe Later',

                    showCancelButton: true,

                    confirmButtonColor: '#52b788',
                    cancelButtonColor: '#6b7280',

                    background: 'rgba(13, 43, 29, 0.95)',
                    color: '#ffffff',

                    backdrop: `
                        rgba(0,0,0,0.75)
                        url("/assets/images/mental-health/mental-health-image.jpg")
                        center top
                        no-repeat
                    `,

                    width: '600px',
                    padding: '2.5rem',

                    allowOutsideClick: true,
                    allowEscapeKey: true

                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('mental.health') }}";
                    }
                });

            }, 1200);

        });
    </script>

</body>
</html>