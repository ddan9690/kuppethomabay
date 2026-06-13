@extends('layouts.frontend')

@section('title', 'Petitions & Memoranda - KUPPET Homabay Branch')

@section('content')
<section class="bg-gray-50 py-12">
    <div class="container mx-auto px-4 max-w-4xl">

        {{-- Header Section --}}
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-gray-900">Petitions & Memoranda</h2>
            <p class="text-gray-600 mt-2">Formal documents and petitions submitted by the branch.</p>
        </div>

        {{-- Documents List --}}
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg overflow-hidden">
            <ul class="divide-y divide-gray-100">
                
                @php
                    $documents = [
                        ['title' => 'Election or Nomination: Solving the Stalemate on the Burial Benevolent Fund (BBF) Delegates', 'url' => 'assets/documents/memorandum-and-petitions/ELECTION OR NOMINATION_ SOLVING THE STALEMATE ON THE BURIAL _ BENEVOLENT FUND (BBF) DELEGATES.pdf'],
                        ['title' => 'James Arianda - BBF Letter', 'url' => 'assets/documents/memorandum-and-petitions/JAMES ARIANDA - BBF LETTER.pdf'],
                        ['title' => 'Memorandum on the Homa Bay Benevolence Benefit Scheme Delegate - 2026', 'url' => 'assets/documents/memorandum-and-petitions/MEMORANDUM ON THE HOMA BAY Benevolence Benefit Scheme DELEGATE - 2026.pdf'],
                        ['title' => 'Petition for the Comprehensive Review of the CPG - Fredrick Otieno', 'url' => 'assets/documents/memorandum-and-petitions/Fredrick_Otieno_Comprehensive_Petition_Automatic_Promotion.pdf'],
                    ];
                @endphp

                @foreach($documents as $item)
                <li class="p-4 hover:bg-gray-50 transition duration-150">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div class="flex items-start gap-3">
                            <span class="text-green-600 mt-0.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </span>
                            <span class="font-medium text-gray-700 leading-tight">{{ $item['title'] }}</span>
                        </div>
                        <a href="{{ asset($item['url']) }}" download 
                           class="w-full sm:w-auto text-center text-sm px-4 py-2 bg-green-50 text-green-700 rounded-md font-semibold hover:bg-green-100 transition whitespace-nowrap">
                            Download
                        </a>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>

    </div>
</section>
@endsection