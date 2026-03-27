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

            <li class="flex justify-between items-center border-b pb-2">
                <span>KUPPET Constitution</span>
                <a href="{{ asset('assets/documents/KUPPET CONSTITUTION.pdf') }}" download
                   class="text-green hover:underline font-medium">
                    Download
                </a>
            </li>

        </ul>

    </div>
</section>
@endsection