@extends('layouts.frontend')

@section('title', $news->title . ' - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-10">
    <div class="container mx-auto px-4 max-w-3xl">

        {{-- News Title --}}
        <h2 class="text-2xl md:text-3xl font-bold text-green mb-4">
            {{ $news->title }}
        </h2>

        {{-- News Image (only if it exists) --}}
        @if($news->image)
            <div class="mb-6">
                <img src="{{ asset('storage/' . $news->image) }}" 
                     alt="{{ $news->title }}" 
                     class="w-full h-72 md:h-96 object-cover rounded shadow">
            </div>
        @endif

        {{-- News Body --}}
        <div class="text-gray-dark leading-relaxed mb-8">
            {!! $news->body !!}
        </div>

        {{-- Back Button --}}
        <div class="text-center">
            <a href="/" 
               class="inline-block bg-green text-white font-semibold px-6 py-2 rounded hover:bg-green-dark transition">
               ← Back to Home
            </a>
        </div>

    </div>
</section>
@endsection