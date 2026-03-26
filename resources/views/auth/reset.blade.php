<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | KUPPET Homabay</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-light flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white p-10 rounded-3xl shadow-xl flex flex-col items-center">
        
        <!-- Logo -->
        <img src="{{ asset('assets/images/kuppet-logo.jpg') }}" alt="KUPPET Logo" class="w-24 h-24 object-contain mb-4">

        <!-- Branding -->
        <h1 class="text-2xl md:text-3xl font-extrabold text-green-dark mb-10 text-center">
            Homabay <span class="text-gold">Branch</span>
        </h1>

        <!-- Session / Errors -->
        @if(session('success'))
            <div class="w-full bg-green text-white p-2 rounded mb-4 text-center">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="w-full bg-red text-white p-2 rounded mb-4 text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Reset Form -->
        <form action="{{ route('password.reset') }}" method="POST" class="w-full flex flex-col gap-6">
            @csrf

            <input 
                type="text" 
                name="login" 
                placeholder="Email or Phone" 
                class="w-full p-4 border border-gray rounded-xl focus:outline-none focus:ring-2 focus:ring-green-dark transition"
                required
            >

            <input 
                type="password" 
                name="password" 
                placeholder="New Password" 
                class="w-full p-4 border border-gray rounded-xl focus:outline-none focus:ring-2 focus:ring-green-dark transition"
                required
            >

            <input 
                type="password" 
                name="password_confirmation" 
                placeholder="Confirm Password" 
                class="w-full p-4 border border-gray rounded-xl focus:outline-none focus:ring-2 focus:ring-green-dark transition"
                required
            >

            <button type="submit" class="w-full bg-green-dark text-white p-4 rounded-xl font-bold hover:bg-green transition">
                Reset Password
            </button>
        </form>
    </div>

</body>
</html>