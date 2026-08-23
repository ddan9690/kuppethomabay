@extends('layouts.frontend')

@section('title', 'KNEC Reimbursement - KUPPET Homabay')

@section('content')
<section class="bg-white py-8">
    <div class="container mx-auto px-4 max-w-5xl">

        <div class="mb-6">
            <h2 class="text-2xl md:text-3xl font-bold text-green">
                KUPPET Homa Bay Reimbursement of KNEC Examiner Training Expense
            </h2>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 text-sm rounded-lg mb-6 border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @forelse($announcements as $announcement)
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-5 flex flex-col justify-between shadow-sm hover:shadow transition">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="bg-green-100 text-green-800 text-xs font-bold px-2.5 py-0.5 rounded">
                                {{ ucwords(str_replace('_', ' ', $announcement->level)) }}
                            </span>
                            <span class="text-xs font-semibold text-gray-500">
                                Year: {{ $announcement->year }}
                            </span>
                        </div>

                        <h3 class="text-lg font-bold text-gray-800 mb-2">
                            {{ $announcement->title }}
                        </h3>

                        <p class="text-xs text-gray-500 mb-4">
                            Announced On: {{ optional($announcement->announced_on)->format('d M, Y') ?? 'N/A' }}
                        </p>
                    </div>

                    <div>
                        <a href="{{ route('knec-reimbursements.create', [$announcement->id, $announcement->slug]) }}" 
                           class="block w-full text-center bg-green text-white py-2 rounded text-xs sm:text-sm font-semibold hover:bg-green-dark transition">
                            Apply Now &rarr;
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-2 text-center py-12 bg-gray-50 rounded-lg border border-gray-200">
                    <p class="text-gray-500 text-sm">No active reimbursement portals are currently open.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $announcements->links() }}
        </div>

    </div>
</section>
@endsection