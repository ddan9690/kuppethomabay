@extends('layouts.backend')

@section('title', 'SHA Facility Experience Reports - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-8">
    <div class="container mx-auto px-4 max-w-4xl">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-4">

            <h2 class="text-lg md:text-xl font-bold text-green-700">
                SHA Facility Experience Reports
            </h2>

            {{-- PDF Export --}}
            <a href="{{ route('sha.reports.pdf') }}"
               class="bg-green hover:bg-green-dark text-white text-xs px-3 py-2 rounded shadow">
                Download PDF
            </a>

        </div>

        {{-- Reports List --}}
        <div class="space-y-2">

            @forelse($reports as $report)

                <div class="border-b border-gray-200 py-3">

                    {{-- Facility + Date --}}
                    <div class="flex items-center justify-between mb-1">

                        <div class="flex items-center space-x-2">

                            <span class="text-sm font-semibold text-gray-800">
                                {{ $report->facility_name }}
                            </span>

                            <span class="text-xs text-gray-400">
                                • {{ $report->created_at->format('d M Y') }}
                            </span>

                        </div>

                        {{-- Sub County --}}
                        <span class="text-xs text-green font-medium">
                            {{ $report->subCounty->name ?? 'N/A' }}
                        </span>

                    </div>

                    {{-- Details --}}
                    <div class="text-sm text-gray-700 leading-snug whitespace-pre-line">
                        {{ $report->details }}
                    </div>

                </div>

            @empty

                <div class="text-center py-8 text-gray-500 text-sm">
                    No SHA facility experience reports submitted yet.
                </div>

            @endforelse

        </div>

        {{-- Pagination --}}
        <div class="mt-5">
            {{ $reports->links() }}
        </div>

    </div>
</section>
@endsection