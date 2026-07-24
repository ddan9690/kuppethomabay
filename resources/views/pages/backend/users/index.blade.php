@extends('layouts.backend')

@section('title', 'System Users - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-6">
    <div class="container mx-auto px-2 sm:px-4 max-w-6xl">

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl md:text-2xl font-bold text-green">
                Users
            </h2>
        </div>

        <!-- Flash Message -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 text-xs sm:text-sm rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="w-full overflow-x-auto shadow-sm">
            <table class="w-full text-xs sm:text-sm table-auto border border-gray-300 whitespace-nowrap">

                <thead class="bg-green text-white">
                    <tr>
                        <th class="p-2 sm:p-2.5 border text-center">#</th>
                        <th class="p-2 sm:p-2.5 border text-left">Name</th>
                        <th class="p-2 sm:p-2.5 border text-left">Email</th>
                        <th class="p-2 sm:p-2.5 border text-left">Phone</th>
                        <th class="p-2 sm:p-2.5 border text-left">Role</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="p-2 sm:p-2.5 border text-center">
                                {{ $users->firstItem() + $loop->index }}
                            </td>
                            <td class="p-2 sm:p-2.5 border font-medium">
                                {{ $user->name ?? '-' }}
                            </td>
                            <td class="p-2 sm:p-2.5 border">
                                {{ $user->email ?? '-' }}
                            </td>
                            <td class="p-2 sm:p-2.5 border">
                                {{ $user->phone ?? '-' }}
                            </td>
                            <td class="p-2 sm:p-2.5 border">
                                @if($user->getRoleNames()->isNotEmpty())
                                    <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                        {{ ucwords(str_replace('-', ' ', $user->getRoleNames()->implode(', '))) }}
                                    </span>
                                @else
                                    <span class="text-gray-400 italic">No Role</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center text-gray-dark text-xs sm:text-sm">
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 text-xs sm:text-sm">
            {{ $users->links() }}
        </div>

    </div>
</section>
@endsection