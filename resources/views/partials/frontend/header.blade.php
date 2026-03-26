<header x-data="{ open: false }" class="bg-green text-white shadow">
    <div class="container mx-auto flex items-center justify-between p-4">

        {{-- Logo / Brand --}}
        <a href="{{ url('/') }}" class="text-2xl md:text-3xl font-bold hover:text-gold transition">
            KUPPET Homabay Branch
        </a>

        {{-- Desktop Navigation --}}
        <nav class="hidden md:flex items-center space-x-6">
            <a href="{{ url('/') }}" class="hover:text-gold transition font-medium">Home</a>
            <a href="{{ url('/about') }}" class="hover:text-gold transition font-medium">About Us</a>
            <a href="{{ url('/news') }}" class="hover:text-gold transition font-medium">News</a>
            <a href="{{ url('/contact') }}" class="hover:text-gold transition font-medium">Contact</a>

            @guest
                {{-- Login Button --}}
                <a href="{{ route('login') }}"
                   class="ml-4 bg-gold text-green px-4 py-2 rounded-lg font-semibold hover:bg-yellow-400 transition">
                    Login
                </a>
            @endguest

            @auth
                {{-- Dashboard Link --}}
                <a href="{{ route('dashboard') }}"
                   class="ml-4 bg-gold text-green px-4 py-2 rounded-lg font-semibold hover:bg-yellow-400 transition">
                    Dashboard
                </a>

                {{-- Logout Form --}}
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                        class="ml-2 bg-red-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-red-700 transition">
                        Logout
                    </button>
                </form>
            @endauth
        </nav>

        {{-- Mobile menu button --}}
        <div class="md:hidden">
            <button @click="open = !open" class="focus:outline-none">
                <i :class="open ? 'bx bx-x' : 'bx bx-menu'" class="text-3xl transition-transform duration-300"></i>
            </button>
        </div>

    </div>

    {{-- Mobile Menu --}}
    <nav 
        x-show="open" 
        @click.away="open = false" 
        x-transition:enter="transition ease-out duration-300" 
        x-transition:enter-start="opacity-0 transform -translate-y-2" 
        x-transition:enter-end="opacity-100 transform translate-y-0" 
        x-transition:leave="transition ease-in duration-200" 
        x-transition:leave-start="opacity-100 transform translate-y-0" 
        x-transition:leave-end="opacity-0 transform -translate-y-2"
        class="md:hidden bg-green text-white"
    >
        <a href="{{ url('/') }}" class="block px-4 py-2 hover:bg-green-dark transition">Home</a>
        <a href="{{ url('/about') }}" class="block px-4 py-2 hover:bg-green-dark transition">About Us</a>
        <a href="{{ url('/news') }}" class="block px-4 py-2 hover:bg-green-dark transition">News</a>
        <a href="{{ url('/contact') }}" class="block px-4 py-2 hover:bg-green-dark transition">Contact</a>

        @guest
            {{-- Mobile Login --}}
            <a href="{{ route('login') }}" 
               class="block px-4 py-2 bg-gold text-green font-semibold hover:bg-yellow-400 transition">
                Login
            </a>
        @endguest

        @auth
            {{-- Mobile Dashboard --}}
            <a href="{{ route('dashboard') }}"
               class="block px-4 py-2 bg-gold text-green font-semibold hover:bg-yellow-400 transition">
                Dashboard
            </a>

            {{-- Mobile Logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left px-4 py-2 bg-red-600 text-white font-semibold hover:bg-red-700 transition">
                    Logout
                </button>
            </form>
        @endauth
    </nav>
</header>