@extends('layouts.backend')

@section('title', 'Feedback Inbox - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-8">
    <div class="container mx-auto px-4 max-w-4xl">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-4">

            <h2 class="text-lg md:text-xl font-bold text-green-700">
                Teachers' Feedback
            </h2>

            <a href="{{ route('feedback.pdf') }}"
               class="bg-green hover:bg-green-700 text-white text-xs px-3 py-2 rounded">
                Download PDF
            </a>

        </div>

        {{-- Feedback List --}}
        <div class="space-y-2">

            @forelse($feedbacks as $feedback)

                <div class="border-b border-gray-200 py-3">

                    {{-- Name + Date (compact like PDF) --}}
                    <div class="flex items-center justify-between mb-1">

                        <div class="flex items-center space-x-2">
                            <span class="text-sm font-semibold text-gray-800">
                                {{ $feedback->name }}
                            </span>

                            <span class="text-xs text-gray-400">
                                • {{ $feedback->created_at->format('d M Y') }}
                            </span>
                        </div>

                    </div>

                    {{-- Full Message --}}
                    <div class="text-sm text-gray-700 leading-snug whitespace-pre-line">
                        {{ $feedback->message }}
                    </div>

                </div>

            @empty

                <div class="text-center py-8 text-gray-500 text-sm">
                    No feedback messages yet.
                </div>

            @endforelse

        </div>

        {{-- Pagination --}}
        <div class="mt-5">
            {{ $feedbacks->links() }}
        </div>

    </div>
</section>
@endsection