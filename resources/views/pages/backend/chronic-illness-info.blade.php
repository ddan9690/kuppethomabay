@extends('layouts.backend')

@section('title', 'Chronic Illness Services Access Reports - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-10">
    <div class="container mx-auto px-4 max-w-5xl">

        {{-- Heading with Download PDF Button --}}
        <div class="flex items-center justify-between mb-4">
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

        {{-- Informational Subheading / Context --}}
        <div class="bg-gray-50 p-4 mb-6 text-sm md:text-base text-gray-700">
            <p class="font-semibold text-gray-900">
                Feedback from teachers of Homa Bay County regarding the SHA Mwalimu Medical Scheme.
            </p>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full table-auto border border-gray-300">
                <colgroup>
                    <col style="width: 50px;">
                    <col style="width: 110px;">
                    <col style="width: 110px;">
                    <col style="width: auto;">
                    <col style="width: 110px;">
                </colgroup>
                <thead class="bg-green text-white">
                    <tr>
                        <th class="p-2 border text-center">#</th>
                        <th class="p-2 border">Sub-County</th>
                        <th class="p-2 border whitespace-normal">Affected Party</th>
                        <th class="p-2 border">Experience / Challenges</th>
                        <th class="p-2 border text-center">Submitted On</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($records as $record)
                        <tr class="hover:bg-gray-100">
                            <td class="p-2 border text-center align-top">{{ $loop->iteration + ($records->currentPage() - 1) * $records->perPage() }}</td>
                            <td class="p-2 border align-top text-xs md:text-sm">{{ $record->subCounty->name ?? '-' }}</td>
                            <td class="p-2 border align-top">
                                <span class="px-2 py-1 text-xs rounded bg-gray-200 font-semibold inline-block">
                                    {{ $record->affected_party }}
                                </span>
                            </td>
                            <td class="p-2 border text-sm align-top">
                                <div class="whitespace-normal break-words">{{ $record->experience_description }}</div>
                            </td>
                            <td class="p-2 border text-center align-top text-xs md:text-sm">
                                <div>{{ $record->created_at->format('d M Y') }}</div>
                                <div class="text-gray-500">{{ $record->created_at->format('g:i a') }}</div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 border text-center text-gray-500">
                                No feedback received
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