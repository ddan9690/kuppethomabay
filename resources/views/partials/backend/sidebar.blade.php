<aside 
    :class="sidebarOpen ? 'fixed inset-0 z-50 flex flex-col' : 'hidden md:flex flex-col'" 
    class="w-64 bg-green text-white flex-shrink-0 transition-all duration-300" 
    @click.away="sidebarOpen = false">

    {{-- Close button on mobile --}}
    <div class="flex justify-end p-4 md:hidden">
        <button @click="sidebarOpen = false" class="text-white text-2xl">
            <i class='bx bx-x'></i>
        </button>
    </div>

    {{-- Sidebar navigation links --}}
    <nav class="flex-1 px-4 py-6 space-y-2 mt-0">
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
        {{-- Add more links as needed --}}
    </nav>
</aside>