<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Ensure your Tailwind config colors are applied */
        @layer utilities {
            .bg-green { background-color: #008C45; }
            .text-green { color: #008C45; }
            .text-gold { color: #C8A265; }
        }
    </style>
</head>
<body class="bg-gray-light flex items-center justify-center min-h-screen">
    <div class="text-center p-6 max-w-md">
        <h1 class="text-6xl font-bold text-green mb-4">404</h1>
        <h2 class="text-2xl md:text-3xl font-semibold text-gray-dark mb-6">
            Oops! Page not available
        </h2>
        <p class="text-gray mb-6">
            This page is either being worked on or doesn’t exist.
        </p>
        <a href="/" class="inline-block px-6 py-3 bg-green text-white rounded-lg hover:bg-green-dark transition">
            Go Back Home
        </a>
    </div>
</body>
</html>