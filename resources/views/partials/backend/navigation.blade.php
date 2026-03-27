<header class="bg-green text-white flex items-center justify-between p-4 shadow-md">

    {{-- Mobile hamburger --}}
    <button @click="sidebarOpen = !sidebarOpen" class="text-white text-2xl md:hidden">
        <i class='bx bx-menu'></i>
    </button>

    <div class="flex items-center gap-4 font-bold text-lg">
        KUPPET Homa Bay
        <a href="{{ url('/') }}" 
           class="bg-white text-green px-3 py-1 rounded hover:bg-gray-light hover:text-green-dark transition">
            Home
        </a>
    </div>

    {{-- User dropdown --}}
    <div class="relative" x-data="{ open: false }">
        <button @click="open = !open" 
                class="flex items-center gap-1 focus:outline-none bg-green px-3 py-1 rounded hover:bg-green-dark transition">
            <i class='bx bx-user text-2xl'></i>
            <i :class="{'rotate-180': open}" class='bx bx-chevron-down text-lg transition-transform'></i>
        </button>

        <div x-show="open" x-cloak
             @click.away="open = false"
             class="absolute right-0 mt-2 w-48 bg-white text-gray-dark rounded shadow-lg z-50">
            
            {{-- Username --}}
            <div class="px-4 py-2 border-b border-gray-light font-semibold">
                {{ auth()->user()->name }}
            </div>

            <a href="{{ route('password.request') }}" 
               class="block px-4 py-2 text-gray-dark hover:bg-gray-light">
                Reset Password
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-gray-dark hover:bg-gray-light">
                    Logout
                </button>
            </form>
        </div>
    </div>
</header>