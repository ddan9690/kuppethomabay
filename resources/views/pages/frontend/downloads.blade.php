@extends('layouts.frontend')

@section('title', 'Downloads - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-10">
    <div class="container mx-auto px-4 max-w-3xl">

        {{-- Heading --}}
        <h2 class="text-2xl md:text-3xl font-bold text-green mb-6">
            Downloads
        </h2>

        {{-- Simple List --}}
        <ul class="space-y-3 text-gray-800">

            {{-- Constitution --}}
            <li class="flex justify-between items-center border-b pb-2">
                <span>KUPPET Constitution</span>
                <a href="{{ asset('assets/documents/KUPPET CONSTITUTION.pdf') }}" download
                   class="text-green hover:underline font-medium">
                    Download
                </a>
            </li>

            {{-- Welfare Scheme --}}
            <li class="flex justify-between items-center border-b pb-2">
                <span>KUPPET Homabay Welfare Scheme By-Laws 2026</span>
                <a href="{{ asset('assets/documents/KUPPET HB WELFAFE SCHEME BY LAWS 2026.pdf') }}" download
                   class="text-green hover:underline font-medium">
                    Download
                </a>
            </li>

            {{-- BBF Guidelines --}}
            <li class="flex justify-between items-center border-b pb-2">
                <span>Official KUPPET BBF Guidelines</span>
                <a href="{{ asset('assets/documents/OFFICIAL KUPPET BBF GUIDELINES.pdf') }}" download
                   class="text-green hover:underline font-medium">
                    Download
                </a>
            </li>

            {{-- Press Brief --}}
            <li class="flex justify-between items-center pb-2">
                <span>KUPPET Homabay Press Conference - 24th April 2026</span>
                <a href="{{ asset('assets/documents/KUPPET Homabay Press Conference.pdf') }}" download
                   class="text-green hover:underline font-medium">
                    Download
                </a>
            </li>

        </ul>

    </div>
</section>
@endsection