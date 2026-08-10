@extends('layouts.backend')

@section('title', 'Chronic Illness Services Access Reports - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-10">
    <div class="container mx-auto px-4 max-w-5xl">

        {{-- Heading with Download PDF Button --}}
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-green">
                    SHA Chronic Illness Service Access Reports
                </h2>
            </div>

            {{-- Download PDF Button --}}
            <a href="{{ route('chronic-illness.pdf') }}" 
               class="bg-green text-white px-4 py-2 rounded hover:bg-green-dark transition inline-flex items-center gap-2">
                📥 Download PDF
            </a>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full table-auto border border-gray-300">
                <thead class="bg-green text-white">
                    <tr>
                        <th class="p-2 border">#</th>
                        <th class="p-2 border">Sub-County</th>
                        <th class="p-2 border">Affected Party</th>
                        <th class="p-2 border">Experience / Challenges</th>
                        <th class="p-2 border">Submitted On</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($records as $record)
                        <tr class="hover:bg-gray-100">
                            <td class="p-2 border text-center">{{ $loop->iteration + ($records->currentPage() - 1) * $records->perPage() }}</td>
                            <td class="p-2 border">{{ $record->subCounty->name ?? '-' }}</td>
                            <td class="p-2 border">
                                <span class="px-2 py-1 text-xs rounded bg-gray-200 font-semibold">
                                    {{ $record->affected_party }}
                                </span>
                            </td>
                            <td class="p-2 border text-sm max-w-md">
                                <div class="line-clamp-3">{{ $record->experience_description }}</div>
                            </td>
                            <td class="p-2 border whitespace-nowrap">{{ $record->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 border text-center text-gray-500">
                                No anonymous reports found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $records->links() }}
        </div>

    </div>
</section>
@endsection