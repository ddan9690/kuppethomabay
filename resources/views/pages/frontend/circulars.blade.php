@extends('layouts.frontend')

@section('title', 'BEC Circulars - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-10">
    <div class="container mx-auto px-4 max-w-3xl">

        {{-- Heading --}}
        <h2 class="text-2xl md:text-3xl font-bold text-green mb-6">
            BEC Circulars
        </h2>

        {{-- Circulars List --}}
        <ul class="space-y-3 text-gray-800">

            {{-- Amendments to BBF By-Laws --}}
            <li class="flex justify-between items-center border-b pb-2">
                <span>Amendments to BBF By-Laws</span>
                <a href="{{ asset('assets/images/circulars/amendments-to-bbf-by-laws.jpg') }}" download
                   class="text-green hover:underline font-medium">
                    Download
                </a>
            </li>

            {{-- Handing Over Notice --}}
            <li class="flex justify-between items-center border-b pb-2">
                <span>Handing Over Notice</span>
                <a href="{{ asset('assets/images/circulars/handing-over-notice.jpg') }}" download
                   class="text-green hover:underline font-medium">
                    Download
                </a>
            </li>

            {{-- Nomination of Women Representatives to BEC --}}
            <li class="flex justify-between items-center border-b pb-2">
                <span>Nomination of Women Representatives to BEC</span>
                <a href="{{ asset('assets/images/circulars/nomination-of-women-representatives-to-bec.jpg') }}" download
                   class="text-green hover:underline font-medium">
                    Download
                </a>
            </li>

        </ul>

    </div>
</section>
@endsection