{{-- Sidebar Wrapper --}}
<div x-data="{ sidebarOpen: false, bbfOpen: false }">
    
    {{-- Mobile Overlay --}}
    <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 bg-black/50 z-40 md:hidden"
        @click="sidebarOpen = false">
    </div>

    {{-- Sidebar --}}
    <aside
        class="fixed inset-y-0 left-0 z-50 w-64 bg-green text-white transform transition-transform duration-300 flex flex-col
        -translate-x-full
        md:translate-x-0 md:static md:inset-0"
        :class="sidebarOpen ? 'translate-x-0' : ''">

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

            {{-- BBF Dropdown --}}
            <div>
                <button @click="bbfOpen = !bbfOpen"
                    class="w-full flex items-center justify-between p-2 rounded hover:bg-green-dark transition">
                    
                    <div class="flex items-center gap-3">
                        <i class='bx bx-folder text-xl'></i>
                        <span>BBF</span>
                    </div>

                    <i :class="bbfOpen ? 'bx bx-chevron-up' : 'bx bx-chevron-down'"></i>
                </button>

                {{-- Dropdown Items --}}
                <div x-show="bbfOpen" x-transition class="ml-8 mt-2 space-y-2">

                    <a href="{{ route('sub_county_bbf_reps.index') }}"
                        class="block p-2 rounded hover:bg-green-dark transition">
                        Sub-County Reps
                    </a>

                    <a href=""
                        class="block p-2 rounded hover:bg-green-dark transition">
                        Membership Applications
                    </a>

                    <a href=""
                        class="block p-2 rounded hover:bg-green-dark transition">
                        Claims
                    </a>

                </div>
            </div>

            <a href="{{ route('admin.news.index') }}"
                class="flex items-center gap-3 p-2 rounded hover:bg-green-dark transition">
                <i class='bx bx-news text-xl'></i>
                <span>Manage News</span>
            </a>

            <a href="#"
                class="flex items-center gap-3 p-2 rounded hover:bg-green-dark transition">
                <i class='bx bx-file text-xl'></i>
                <span>Reports</span>
            </a>

        </nav>

    </aside>
</div>