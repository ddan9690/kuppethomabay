{{-- Sidebar Container --}}
<div>
    <!-- Mobile overlay (click outside to close) -->
    <div 
        x-show="sidebarOpen" 
        x-transition.opacity
        class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden"
        @click="sidebarOpen = false"
    ></div>

    <!-- Sidebar -->
    <aside
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed md:relative inset-y-0 left-0 w-64 bg-green text-white transform transition-transform duration-300 flex flex-col z-50"
    >
        <!-- Mobile close button -->
        <div class="flex justify-end p-4 md:hidden">
            <button @click="sidebarOpen = false" class="text-white text-2xl">
                <i class='bx bx-x'></i>
            </button>
        </div>

        <!-- Sidebar navigation links -->
        <nav class="flex-1 px-4 pt-4 space-y-2">
            <a href="{{ route('dashboard') }}" 
               class="flex items-center gap-2 p-2 rounded hover:bg-green-dark transition">
                <i class='bx bx-home'></i> Dashboard
            </a>
            <a href="#" 
               class="flex items-center gap-2 p-2 rounded hover:bg-green-dark transition">
                <i class='bx bx-user'></i> Users
            </a>
            <a href="#" 
               class="flex items-center gap-2 p-2 rounded hover:bg-green-dark transition">
                <i class='bx bx-file'></i> Reports
            </a>
        </nav>
    </aside>
</div>