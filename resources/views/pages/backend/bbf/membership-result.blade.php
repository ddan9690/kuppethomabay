@extends('layouts.backend')

@section('title', 'BBF Application Result')

@section('content')

<section class="bg-white py-16">
    <div class="container mx-auto px-4 max-w-2xl text-center">

        {{-- SUCCESS --}}
        @if($status === 'success')

            <h2 class="text-3xl font-bold text-green mb-6">
                Application Received
            </h2>

            <p class="text-gray-700 text-lg leading-relaxed">
                Dear <span class="font-semibold">{{ $name }}</span>, <br><br>

                Your BBF membership request for KUPPET Homabay has been successfully received.

                The office is working on it and you will be notified and/or contacted in due course.

                Thank you for being a member of KUPPET Homabay Branch.

                Together we can make our union better.
            </p>

        @else

            <h2 class="text-2xl font-bold text-red mb-4">
                Submission Failed
            </h2>

            <p class="text-gray-700 mb-4">
                {{ $message ?? 'Something went wrong.' }}
            </p>

        @endif

        <a href="{{ url('/') }}"
           class="inline-block mt-6 bg-green text-white px-6 py-2 rounded shadow">
            Go Back Home
        </a>

    </div>
</section>

@endsection