@extends('layouts.frontend')

@section('title', 'KUPPET Homa Bay Attendance at Nyanza Term 2 Regional Championship')

@section('content')
<main class="bg-white py-12 px-4">
    <article class="container mx-auto max-w-4xl">
        <!-- Header -->
        <header class="mb-10 text-center border-b border-gray-100 pb-8">
            <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-4">
                KUPPET Homa Bay Attendance at Nyanza Term 2 Regional Championship
            </h1>
            <p class="text-gray-500 font-medium">8 July 2026 | By Media Office</p>
        </header>

        <!-- Content -->
        <div class="prose lg:prose-lg mx-auto text-gray-700 leading-relaxed space-y-8">
            
            <p>
                The KUPPET Homa Bay Branch delegation attended the Term 2 Nyanza Regional Championships held at Raila Odinga Stadium. The event was attended by various stakeholders, including the Deputy Governor of Homa Bay County and the Regional Director of Education.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <img src="{{ asset('assets/images/term-2-regionals/executive-secretary.jpg') }}" class="rounded-lg shadow-md w-full" alt="Executive Secretary at the event">
                <img src="{{ asset('assets/images/term-2-regionals/kuppet-officials-greeting.jpg') }}" class="rounded-lg shadow-md w-full" alt="KUPPET officials at the event">
            </div>

            <p>
                The KUPPET delegation was led by the Executive Secretary, Tom Thomas Odhiambo. Upon arrival at the stadium, the union officials joined other guests in the main pavilion to follow the opening proceedings. During the event, the officials engaged with teachers and local administrative staff present at the venue.
            </p>

            <img src="{{ asset('assets/images/term-2-regionals/executive-secretary-greeting-teachers.jpg') }}" class="rounded-lg shadow-md w-full my-6" alt="Executive Secretary greeting teachers">

            <p>
                In his address to the gathering, Executive Secretary Odhiambo spoke regarding the importance of student participation in extracurricular activities. Following the address, the KUPPET Homa Bay office handed over a donation of trophies to the tournament organizers. Additionally, the union provided several bales of water to the organizing committee to support the logistical needs of the event staff and participants during the championships.
            </p>

            <div class="grid grid-cols-2 gap-4">
                <img src="{{ asset('assets/images/term-2-regionals/a1tassitant-secretary-quinter-nyakiye-seated.jpg') }}" class="rounded-lg shadow-md w-full" alt="Assistant Secretary Quinter Nyakiye">
                <img src="{{ asset('assets/images/term-2-regionals/secretary-gender-rose-okeyo-enjoying-match.jpg') }}" class="rounded-lg shadow-md w-full" alt="Secretary for Gender Rose Okeyo">
            </div>

            <p>
                The opening day of the regional championships featured several competitive matches across different sports categories. Spectators were present in large numbers to witness the various fixtures scheduled for the day. A key event of the opening session was the football match between Ringa Boys and St. Mary’s Yala. The match concluded with a 1-1 draw after both teams completed the regulation time.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <img src="{{ asset('assets/images/term-2-regionals/asssistant-executive-kennedy-atanga.jpg') }}" class="rounded-lg shadow-md w-full" alt="Assistant Executive Kennedy Atanga">
                <img src="{{ asset('assets/images/term-2-regionals/kupept-officials-following-game.jpg') }}" class="rounded-lg shadow-md w-full" alt="KUPPET officials watching the game">
                <img src="{{ asset('assets/images/term-2-regionals/vice-chairman-mr-richard-follwoing.jpg') }}" class="rounded-lg shadow-md w-full" alt="Vice Chairman Mr. Richard">
            </div>

            <div class="pt-8 text-center">
                <a href="{{ route('press.statements') }}" class="text-green-600 font-bold hover:underline">← Back to Press Statements</a>
            </div>
        </div>
    </article>
</main>
@endsection