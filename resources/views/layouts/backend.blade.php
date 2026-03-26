<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | KUPPET Homabay</title>

    {{-- TailwindCSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Boxicons --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    @stack('styles')
</head>
<body class="bg-gray-light flex h-screen font-sans overflow-hidden" x-data="{ sidebarOpen: false }">

    {{-- Sidebar --}}
    @include('partials.backend.sidebar')

    <div class="flex-1 flex flex-col overflow-hidden">
        
        {{-- Navigation / Topbar --}}
        @include('partials.backend.navigation')

        {{-- Main Content --}}
        <main class="flex-1 overflow-auto p-6 bg-gray-light">
            @yield('content')
        </main>

        {{-- Footer --}}
        @include('partials.backend.footer')
    </div>

    @stack('scripts')
    <script>
        // Initialize DataTables
        document.addEventListener('DOMContentLoaded', function () {
            $('.datatable').DataTable();
        });
    </script>
</body>
</html>