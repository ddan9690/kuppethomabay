{{-- Sidebar Wrapper --}}
<div>
    {{-- Mobile Overlay --}}
    <div 
        x-show="sidebarOpen" 
        x-transition.opacity
        class="fixed inset-0 bg-black/50 z-40 md:hidden"
        @click="sidebarOpen = false">
    </div>

    {{-- Sidebar --}}
    <aside
        class="fixed inset-y-0 left-0 z-50 w-64 bg-green text-white transform transition-transform duration-300 flex flex-col

        {{-- Mobile default --}}
        -translate-x-full

        {{-- Desktop always visible --}}
        md:translate-x-0 md:static md:inset-0"
        
        :class="sidebarOpen ? 'translate-x-0' : ''"
    >

        {{-- Mobile Header --}}
        <div class="flex justify-between items-center p-4 md:hidden border-b border-green-dark">
            <span class="font-bold text-lg">Menu</span>
            <button @click="sidebarOpen = false" class="text-white text-2xl">
                <i class='bx bx-x'></i>
            </button>
        </div>

        {{-- Desktop Title --}}
        <div class="hidden md:block p-4 text-xl font-bold border-b border-green-dark">
            KUPPET Homabay
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-4 py-4 space-y-2">

            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 p-2 rounded hover:bg-green-dark transition">
                <i class='bx bx-home text-xl'></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('agency_payer.index') }}"
                class="flex items-center gap-3 p-2 rounded hover:bg-green-dark transition">
                <i class='bx bx-user text-xl'></i>
                <span>Agency Payers</span>
            </a>

            <a href="#"
                class="flex items-center gap-3 p-2 rounded hover:bg-green-dark transition">
                <i class='bx bx-group text-xl'></i>
                <span>Users</span>
            </a>

            <a href="#"
                class="flex items-center gap-3 p-2 rounded hover:bg-green-dark transition">
                <i class='bx bx-file text-xl'></i>
                <span>Reports</span>
            </a>

        </nav>

    </aside>
</div>