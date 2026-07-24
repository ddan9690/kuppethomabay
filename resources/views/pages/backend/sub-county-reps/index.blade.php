@extends('layouts.backend')

@section('title', 'Sub-County BBF Reps - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-6">
    <div class="container mx-auto px-2 sm:px-4 max-w-6xl">

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl md:text-2xl font-bold text-green">
                Sub-County BBF Reps
            </h2>

            <a href="{{ route('sub_county_bbf_reps.create') }}" 
               class="bg-green text-white text-xs sm:text-sm px-3 py-2 rounded hover:bg-green-dark transition">
                Add New Rep
            </a>
        </div>

        <!-- Flash Message -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 text-xs sm:text-sm rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="w-full">
            <table class="w-full text-xs sm:text-sm table-auto border border-gray-300">

                <thead class="bg-green text-white">
                    <tr>
                        <th class="p-1.5 sm:p-2 border text-center">#</th>
                        <th class="p-1.5 sm:p-2 border text-left">Name</th>
                        <th class="p-1.5 sm:p-2 border text-left">Sub-County</th>
                        <th class="p-1.5 sm:p-2 border text-left">Level</th>
                        <th class="p-1.5 sm:p-2 border text-left">Phone</th>
                        <th class="p-1.5 sm:p-2 border text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($reps as $rep)
                        <tr class="hover:bg-gray-50">

                            <!-- pagination-safe numbering -->
                            <td class="p-1.5 sm:p-2 border text-center">
                                {{ $reps->firstItem() + $loop->index }}
                            </td>

                            <td class="p-1.5 sm:p-2 border font-medium">
                                {{ $rep->user->name ?? '-' }}
                            </td>

                            <td class="p-1.5 sm:p-2 border">
                                {{ $rep->subCounty->name ?? '-' }}
                            </td>

                            <td class="p-1.5 sm:p-2 border">
                                {{ ucfirst($rep->level ?? 'General') }}
                            </td>

                            <td class="p-1.5 sm:p-2 border">
                                {{ $rep->user->phone ?? '-' }}
                            </td>

                            <td class="p-1.5 sm:p-2 border text-center">
                                <form action="{{ route('sub_county_bbf_reps.destroy', $rep->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this representative?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red text-white px-2.5 py-1 rounded hover:opacity-90 transition text-xs font-semibold">
                                        Remove
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-4 text-center text-gray-dark text-xs sm:text-sm">
                                No sub-county BBF reps found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 text-xs sm:text-sm">
            {{ $reps->links() }}
        </div>

    </div>
</section>
@endsection