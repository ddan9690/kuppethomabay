<header class="bg-green text-white flex items-center justify-between p-4 shadow-md relative z-30">

    {{-- Hamburger --}}
    <button @click="sidebarOpen = !sidebarOpen"
            class="text-3xl md:hidden">
        <i class='bx bx-menu'></i>
    </button>

    {{-- Title --}}
    <div class="flex items-center gap-3 font-bold min-w-0">
        <span class="truncate">KUPPET Homa Bay</span>

        <a href="{{ url('/') }}"
           class="hidden sm:inline bg-white text-green px-2 py-1 rounded text-sm">
            Home
        </a>
    </div>

    {{-- User Dropdown --}}
    <div class="relative shrink-0" x-data="{ open: false }">

        <button @click="open = !open"
                class="flex items-center gap-2 bg-green-dark px-3 py-1 rounded">

            <i class='bx bx-user text-2xl'></i>
            <i class='bx bx-chevron-down'></i>

        </button>

        <div x-show="open"
             x-cloak
             @click.away="open = false"
             class="absolute right-0 mt-2 w-52 bg-white text-black rounded shadow-lg z-50 overflow-hidden">

            {{-- User Info --}}
            <div class="p-3 border-b bg-gray-50">
                <div class="font-semibold">
                    {{ auth()->user()->name }}
                </div>
                <div class="text-xs text-gray-500">
                    Account Menu
                </div>
            </div>

            {{-- Reset Password --}}
            <a href="{{ route('password.request') }}"
               class="block px-4 py-3 hover:bg-gray-100 flex items-center gap-2">

                <i class='bx bx-lock'></i>
                Reset Password
            </a>

            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full text-left px-4 py-3 hover:bg-gray-100 flex items-center gap-2">

                    <i class='bx bx-log-out'></i>
                    Logout
                </button>
            </form>

        </div>

    </div>

</header>