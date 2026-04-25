<div x-data="{ bbfOpen: false }">

    {{-- Overlay --}}
    <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 bg-black/50 z-40 md:hidden"
        @click="sidebarOpen = false">
    </div>

    {{-- Sidebar --}}
    <aside
        class="fixed md:static top-0 left-0 z-50 h-full w-64 bg-green text-white flex flex-col
               transform transition-transform duration-300
               -translate-x-full md:translate-x-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

        {{-- Mobile header --}}
        <div class="flex justify-between items-center p-4 md:hidden border-b border-green-dark">
            <span class="font-bold">Menu</span>
            <button @click="sidebarOpen = false">
                <i class='bx bx-x text-2xl'></i>
            </button>
        </div>

        {{-- Title --}}
        <div class="hidden md:block p-4 font-bold border-b border-green-dark">
            KUPPET Homabay
        </div>

        {{-- 🔥 QUICK ACCESS HOME (NEW) --}}
        <div class="px-4 pt-3">
            <a href="{{ url('/') }}"
                class="flex items-center gap-3 p-2 rounded bg-green-dark hover:bg-green-700 transition">
                <i class='bx bx-globe'></i>
                <span>Home</span>
            </a>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-4 py-4 space-y-2 overflow-y-auto">

            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 p-2 rounded hover:bg-green-dark">
                <i class='bx bx-home'></i> Dashboard
            </a>

            <a href="{{ route('agency_payer.index') }}" class="flex items-center gap-3 p-2 rounded hover:bg-green-dark">
                <i class='bx bx-user'></i> Agency Payers
            </a>

            {{-- BBF --}}
            <div>
                <button @click="bbfOpen = !bbfOpen" class="w-full flex justify-between p-2 rounded hover:bg-green-dark">

                    <span class="flex items-center gap-3">
                        <i class='bx bx-folder'></i> BBF
                    </span>

                    <i class='bx' :class="bbfOpen ? 'bx-chevron-up' : 'bx-chevron-down'"></i>
                </button>

                <div x-show="bbfOpen" x-transition class="ml-6 mt-2 space-y-2">

                    <a href="{{ route('sub_county_bbf_reps.index') }}" class="block p-2 hover:bg-green-dark rounded">
                        Sub-County Reps
                    </a>

                    <a href="{{ route('bbf.applications.index') }}" class="block p-2 hover:bg-green-dark rounded">
                        Membership Applications
                    </a>

                    <a href="#" class="block p-2 hover:bg-green-dark rounded">
                        Claims
                    </a>

                </div>
            </div>

            <a href="{{ route('admin.news.index') }}" class="flex items-center gap-3 p-2 rounded hover:bg-green-dark">
                <i class='bx bx-news'></i> Manage News
            </a>

        </nav>

    </aside>
</div>
