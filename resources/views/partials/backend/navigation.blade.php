<header class="bg-green text-white flex items-center justify-between p-4 shadow-md">
    {{-- Mobile toggle button (only visible on mobile) --}}
    <button @click="sidebarOpen = !sidebarOpen" class="text-white text-2xl md:hidden">
        <i class='bx bx-menu'></i>
    </button>

    <div class="flex items-center gap-4 font-bold text-lg">
        KUPPET Homa Bay
        {{-- Home button --}}
        <a href="{{ url('/') }}" 
           class="bg-white text-green px-3 py-1 rounded hover:bg-gray-100 hover:text-green-800 transition">
            Home
        </a>
    </div>

    {{-- User dropdown --}}
    <div class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="flex items-center gap-2 focus:outline-none">
            <i class='bx bx-user text-2xl'></i>
        </button>

        <div x-show="open" @click.away="open = false"
             class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded shadow-lg z-50">
            <div class="px-4 py-2 border-b border-gray-200">
                {{ auth()->user()->name }}
            </div>
            <a href="{{ route('password.request') }}" class="block px-4 py-2 hover:bg-gray-100">
                Reset Password
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                    Logout
                </button>
            </form>
        </div>
    </div>
</header>