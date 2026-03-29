@extends('layouts.frontend')

@section('title', 'Petitions & Memoranda - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-10">
    <div class="container mx-auto px-4 max-w-4xl">

        {{-- Heading --}}
        <h2 class="text-2xl md:text-3xl font-bold text-green mb-2">
            Petitions & Memoranda
        </h2>

        {{-- Documents List --}}
        <div class="bg-gray-50 shadow rounded-xl p-5">

            <ul class="space-y-4 text-gray-800">

                {{-- Document 1 --}}
                <li class="border-b pb-3">
                    <a href="{{ asset('assets/documents/memorandum-and-petitions/ELECTION OR NOMINATION_ SOLVING THE STALEMATE ON THE BURIAL _ BENEVOLENT FUND (BBF) DELEGATES.pdf') }}"
                       class="hover:text-green hover:underline transition">
                        Election or Nomination: Solving the Stalemate on the Burial Benevolent Fund (BBF) Delegates
                    </a>
                </li>

                {{-- Document 2 --}}
                <li class="border-b pb-3">
                    <a href="{{ asset('assets/documents/memorandum-and-petitions/JAMES ARIANDA - BBF LETTER.pdf') }}"
                       class="hover:text-green hover:underline transition">
                        James Arianda - BBF Letter
                    </a>
                </li>

                {{-- Document 3 --}}
                <li>
                    <a href="{{ asset('assets/documents/memorandum-and-petitions/MEMORANDUM ON THE HOMA BAY Benevolence Benefit Scheme DELEGATE - 2026.pdf') }}"
                       class="hover:text-green hover:underline transition">
                        Memorandum on the Homa Bay Benevolence Benefit Scheme Delegate - 2026
                    </a>
                </li>

            </ul>

        </div>

    </div>
</section>
@endsection