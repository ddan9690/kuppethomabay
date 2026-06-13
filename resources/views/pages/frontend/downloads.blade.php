@extends('layouts.frontend')

@section('title', 'Downloads - KUPPET Homabay Branch')

@section('content')
<section class="bg-gray-50 py-12">
    <div class="container mx-auto px-4 max-w-4xl">

        {{-- Header Section --}}
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-gray-900">Downloads</h2>
            <p class="text-gray-600 mt-2">Essential KUPPET documents, by-laws, and guidelines.</p>
        </div>

        {{-- Downloads List --}}
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg overflow-hidden">
            <ul class="divide-y divide-gray-100">
                
                @php
                    $downloads = [
                        ['title' => 'KUPPET Constitution', 'url' => 'assets/documents/KUPPET CONSTITUTION.pdf'],
                        ['title' => 'KUPPET Homabay Welfare Scheme By-Laws 2026', 'url' => 'assets/documents/KUPPET HB WELFAFE SCHEME BY LAWS 2026.pdf'],
                        ['title' => 'Official KUPPET BBF Guidelines', 'url' => 'assets/documents/OFFICIAL KUPPET BBF GUIDELINES.pdf'],
                        ['title' => 'KUPPET Homabay Press Conference - 24th April 2026', 'url' => 'assets/documents/KUPPET Homabay Press Conference.pdf'],
                    ];
                @endphp

                @foreach($downloads as $item)
                <li class="p-4 hover:bg-gray-50 transition duration-150">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div class="flex items-start gap-3">
                            {{-- Document Icon --}}
                            <span class="text-green-600 mt-0.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
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