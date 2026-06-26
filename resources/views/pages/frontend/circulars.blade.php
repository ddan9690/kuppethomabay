@extends('layouts.frontend')

@section('title', 'BEC Circulars - KUPPET Homabay Branch')

@section('content')
<section class="bg-gray-50 py-12">
    <div class="container mx-auto px-4 max-w-4xl">

        {{-- Header Section --}}
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-gray-900">BEC Circulars</h2>
            <p class="text-gray-600 mt-2">Access the latest official circulars and documents from KUPPET Homa Bay.</p>
        </div>

        {{-- Circulars List --}}
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg overflow-hidden">
            <ul class="divide-y divide-gray-100">
                
                @php
                    $circulars = [
                        ['title' => 'SHA Update and List of Empannelled Facilities', 'url' => 'assets/documents/SHA UPDATE AND LIST OF EMPANNELLED FACILITIES.pdf'],
                        ['title' => 'Amendments to BBF By-Laws', 'url' => 'assets/images/circulars/amendments-to-bbf-by-laws.jpg'],
                        ['title' => 'Handing Over Notice', 'url' => 'assets/images/circulars/handing-over-notice.jpg'],
                        ['title' => 'Nomination of Women Representatives to BEC', 'url' => 'assets/images/circulars/nomination-of-women-representatives-to-bec.jpg'],
                        ['title' => 'KUPPET-Homa-Bay-Branch-Elected-Leaders-List-2026-2031', 'url' => 'assets/documents/KUPPET-Homa-Bay-Branch-Elected-Leaders-List-2026-2031.pdf'],
                        ['title' => 'Highlights of the Proposed Revised CPG (Teachers & CSOs)', 'url' => 'assets/documents/PROPOSED REVISED CPG.pdf'],
                        ['title' => 'Teachers Service Commission - Monthly Newsletter (Update 134)', 'url' => 'assets/documents/UPDATE 134.pdf'],
                    ];
                @endphp

                @foreach($circulars as $item)
                <li class="flex items-center justify-between p-4 hover:bg-gray-50 transition duration-150">
                    <div class="flex items-center gap-3">
                        <span class="text-green-600">
                            {{-- Simple Icon --}}
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </span>
                        <span class="font-medium text-gray-700">{{ $item['title'] }}</span>
                    </div>
                    <a href="{{ asset($item['url']) }}" download 
                       class="text-sm px-4 py-2 bg-green-50 text-green-700 rounded-md font-semibold hover:bg-green-100 transition">
                        Download
                    </a>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</section>
@endsection