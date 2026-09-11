@extends('layouts.backend')

@section('title', 'KNEC Reimbursement Announcements - KUPPET Homabay')

@section('content')
<section class="bg-white py-6" x-data="{
    async toggleStatus(id, event) {
        let response = await fetch(`/admin/knec-reimbursements/${id}/status`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        });
        if (response.ok) {
            let data = await response.json();
            Swal.fire({
                icon: 'success',
                title: 'Updated!',
                text: data.message,
                timer: 1500,
                showConfirmButton: false
            }).then(() => window.location.reload());
        }
    }
}">
    <div class="container mx-auto px-2 sm:px-4 max-w-7xl">

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl md:text-2xl font-bold text-green">
                KNEC Reimbursement Announcements & Portals
            </h2>

            <a href="{{ route('admin.knec-reimbursements.create') }}" 
               class="bg-green text-white text-xs sm:text-sm px-3 py-2 rounded hover:bg-green-dark transition">
                Create New Portal
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 text-xs sm:text-sm rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="w-full overflow-x-auto">
            <table class="w-full text-xs sm:text-sm table-auto border border-gray-300">
                <thead class="bg-green text-white">
                    <tr>
                        <th class="p-2 border text-center">Year</th>
                        <th class="p-2 border text-left">Title</th>
                        <th class="p-2 border text-center">Level</th>
                        <th class="p-2 border text-center">Applications</th>
                        <th class="p-2 border text-center">Status</th>
                        <th class="p-2 border text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($announcements as $announcement)
                        <tr class="hover:bg-gray-50">
                            <td class="p-2 border text-center font-bold text-green">
                                {{ $announcement->year }}
                            </td>
                            <td class="p-2 border font-medium">
                                <a href="{{ route('admin.knec-reimbursements.show', [$announcement->id, $announcement->slug]) }}" class="text-green hover:underline">
                                    {{ $announcement->title }}
                                </a>
                            </td>
                            <td class="p-2 border text-center font-medium">
                                {{ ucwords(str_replace('_', ' ', $announcement->level)) }}
                            </td>
                            <td class="p-2 border text-center">
                                <a href="{{ route('admin.knec-reimbursements.show', [$announcement->id, $announcement->slug]) }}" 
                                   class="inline-flex items-center gap-1.5 bg-indigo-50 text-indigo-700 hover:bg-indigo-100 border border-indigo-200 px-2.5 py-1 rounded-full font-semibold transition shadow-sm"
                                   title="Click to view announcement details">
                                    <svg class="w-3.5 h-3.5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    <span>{{ $announcement->applications_count }} <span class="text-xs font-normal underline">View &rarr;</span></span>
                                </a>
                            </td>
                            <td class="p-2 border text-center">
                                <button @click="toggleStatus({{ $announcement->id }}, $event)" 
                                        class="px-2 py-1 rounded text-xs font-semibold {{ $announcement->status === 'open' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ ucfirst($announcement->status) }}
                                </button>
                            </td>
                            <td class="p-2 border text-center space-x-1 whitespace-nowrap">
                                <a href="{{ route('admin.knec-reimbursements.edit', [$announcement->id, $announcement->slug]) }}" class="bg-green text-white px-2 py-1 rounded text-xs font-semibold hover:bg-green-dark">
                                    Edit
                                </a>
                                <form action="{{ route('admin.knec-reimbursements.destroy', [$announcement->id, $announcement->slug]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this announcement portal? All related applications will be deleted.');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded text-xs font-semibold hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-4 text-center text-gray-500">
                                No reimbursement announcement portals created yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $announcements->links() }}
        </div>
    </div>
</section>
@endsection