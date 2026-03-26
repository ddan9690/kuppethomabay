<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | KUPPET Homa Bay Branch</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-light min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md mx-auto px-4">

        <!-- LOGO -->
        <div class="text-center mb-6">
            <img src="{{ asset('assets/images/kuppet-logo.png') }}" alt="KUPPET Logo"
                class="mx-auto w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 object-contain">
            <h1 class="font-bold text-green text-2xl sm:text-3xl mt-2">KUPPET</h1>
            <p class="text-gold text-sm sm:text-base">Homa Bay Branch</p>
        </div>

        <!-- CARD -->
        <div class="bg-white shadow-xl rounded-xl p-6">

            <h2 class="text-center font-semibold text-gray-dark mb-4">Login</h2>

            <!-- Display errors at top -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 text-sm p-2 rounded mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-sm text-gray-dark mb-1">Email</label>
                    <input type="email" name="email" required value="{{ old('email') }}"
                        class="w-full border border-gray rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm text-gray-dark mb-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full border border-gray rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green">
                </div>

                <!-- Remember -->
                <div class="flex items-center text-sm">
                    <label class="flex items-center gap-2"><input type="checkbox" name="remember"> Remember me</label>
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-green hover:bg-green-dark text-white font-semibold py-2 rounded-lg shadow transition">
                    Login
                </button>

            </form>

        </div>

        <!-- FOOTER -->
        <div class="text-center text-xs text-gray-dark mt-4">
            © {{ date('Y') }} KUPPET Homa Bay Branch
        </div>

    </div>

</body>

</html>