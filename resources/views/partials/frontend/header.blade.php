<header x-data="{ open: false }" class="bg-green text-white shadow">
    <div class="container mx-auto flex items-center justify-between p-4">

        {{-- Logo / Brand --}}
        <a href="{{ url('/') }}" class="text-2xl md:text-3xl font-bold hover:text-gold transition">
            KUPPET Homabay Branch
        </a>

        {{-- Desktop Navigation --}}
        <nav class="hidden md:flex items-center space-x-6">
            <a href="{{ url('/') }}" class="hover:text-gold transition font-medium">Home</a>
            <a href="{{ url('/bec-office') }}" class="hover:text-gold transition font-medium">BEC Office</a>
            <a href="{{ url('/reports') }}" class="hover:text-gold transition font-medium">Reports</a>
            <a href="{{ url('/agency-payer') }}" class="hover:text-gold transition font-medium">Agency Payer</a>

            {{-- Resources Dropdown --}}
            <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                <button class="hover:text-gold transition font-medium flex items-center gap-1">
                    Resources <i class='bx bx-chevron-down text-sm'></i>
                </button>
                <div x-show="open" 
                     x-transition
                     class="absolute bg-green mt-2 rounded shadow-lg w-56 z-50">
                    <a href="{{ url('/downloads') }}" class="block px-4 py-2 hover:bg-green-dark transition">Downloads</a>
                    <a href="{{ url('/bec-circulars') }}" class="block px-4 py-2 hover:bg-green-dark transition">BEC Circulars</a>
                    <a href="{{ url('/petitions-memoranda') }}" class="block px-4 py-2 hover:bg-green-dark transition">
                        Petitions & Memoranda
                    </a>
                </div>
            </div>

            {{-- BBF Dropdown --}}
            <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                <button class="hover:text-gold transition font-medium flex items-center gap-1">
                    BBF <i class='bx bx-chevron-down text-sm'></i>
                </button>
                <div x-show="open" 
                     x-transition
                     class="absolute bg-green mt-2 rounded shadow-lg w-48 z-50">
                    <a href="{{ url('/bbf/constitution') }}" class="block px-4 py-2 hover:bg-green-dark transition">Constitution</a>
                    <a href="{{ url('/bbf/make-claim') }}" class="block px-4 py-2 hover:bg-green-dark transition">Make Claim</a>
                </div>
            </div>

            <a href="{{ url('/news') }}" class="hover:text-gold transition font-medium">News</a>

            @guest
                <a href="{{ route('login') }}"
                   class="ml-4 bg-gold text-green px-4 py-2 rounded-lg font-semibold hover:bg-yellow-400 transition">
                    Login
                </a>
            @endguest

            @auth
                <a href="{{ route('dashboard') }}"
                   class="ml-4 bg-gold text-green px-4 py-2 rounded-lg font-semibold hover:bg-yellow-400 transition">
                    Dashboard
                </a>

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
        <a href="{{ url('/bec-office') }}" class="block px-4 py-2 hover:bg-green-dark transition">BEC Office</a>
        <a href="{{ url('/reports') }}" class="block px-4 py-2 hover:bg-green-dark transition">Reports</a>
        <a href="{{ url('/agency-payer') }}" class="block px-4 py-2 hover:bg-green-dark transition">Agency Payer</a>

        {{-- Mobile Resources --}}
        <div x-data="{ open: false }" class="border-t border-green-dark">
            <button @click="open = !open" class="w-full text-left px-4 py-2 hover:bg-green-dark flex justify-between items-center">
                Resources <i :class="open ? 'bx bx-chevron-up' : 'bx bx-chevron-down'"></i>
            </button>
            <div x-show="open" x-transition class="bg-green-dark">
                <a href="{{ url('/downloads') }}" class="block px-6 py-2 hover:bg-green transition">Downloads</a>
                <a href="{{ url('/bec-circulars') }}" class="block px-6 py-2 hover:bg-green transition">BEC Circulars</a>
                <a href="{{ url('/petitions-memoranda') }}" class="block px-6 py-2 hover:bg-green transition">
                    Petitions & Memoranda
                </a>
            </div>
        </div>

        {{-- Mobile BBF --}}
        <div x-data="{ open: false }" class="border-t border-green-dark">
            <button @click="open = !open" class="w-full text-left px-4 py-2 hover:bg-green-dark flex justify-between items-center">
                BBF <i :class="open ? 'bx bx-chevron-up' : 'bx bx-chevron-down'"></i>
            </button>
            <div x-show="open" x-transition class="bg-green-dark">
                <a href="{{ url('/bbf/constitution') }}" class="block px-6 py-2 hover:bg-green transition">Constitution</a>
                <a href="{{ url('/bbf/make-claim') }}" class="block px-6 py-2 hover:bg-green transition">Make Claim</a>
            </div>
        </div>

        <a href="{{ url('/news') }}" class="block px-4 py-2 hover:bg-green-dark transition">News</a>

        @guest
            <a href="{{ route('login') }}" 
               class="block px-4 py-2 bg-gold text-green font-semibold hover:bg-yellow-400 transition">
                Login
            </a>
        @endguest

        @auth
            <a href="{{ route('dashboard') }}"
               class="block px-4 py-2 bg-gold text-green font-semibold hover:bg-yellow-400 transition">
                Dashboard
            </a>

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