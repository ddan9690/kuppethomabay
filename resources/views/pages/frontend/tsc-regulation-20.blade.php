@extends('layouts.frontend')

@section('title', 'TSC Regulation 20: Proposed Changes to Teacher Qualification Framework - KUPPET Homabay Branch')

@section('content')

{{-- ================= HERO ================= --}}
<section class="relative bg-green text-white py-20 overflow-hidden">

    <div class="absolute inset-0 opacity-10 rellax" data-rellax-speed="-3">
        <svg viewBox="0 0 1440 320" class="w-full h-full">
            <path fill="white" d="M0,160L80,181.3C160,203,320,245,480,240C640,235,800,181,960,160C1120,139,1280,149,1440,170.7V320H0Z"></path>
        </svg>
    </div>

    <div class="absolute inset-0 bg-green-dark opacity-60"></div>

    <div class="relative container mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-block bg-gold text-green-dark font-bold px-4 py-1 rounded-full text-sm mb-4">KUPPET HOMABAY BEC 2026-2031</div>
        <h1 class="text-4xl md:text-5xl font-bold text-white">TSC Regulation 20</h1>
        <p class="text-xl text-white/90 mt-4">Proposed Amendments to Teacher Qualification Framework</p>
    </div>
</section>

{{-- ================= MAIN CONTENT - EXACTLY AS ORIGINAL ================= --}}
<section class="bg-white py-16">
    <div class="container mx-auto px-6 max-w-4xl">

        {{-- Opening Statement --}}
        <div class="mb-10" data-aos="fade-up">
            <p class="text-gray-dark text-lg leading-relaxed">
                The Teachers Service Commission invited stakeholders to participate in changing Regulation 20 of the TSC Code of Regulations for Teachers by submitting their proposals.
            </p>
        </div>

        {{-- What Regulation 20 Covers --}}
        <div class="mb-10" data-aos="fade-up">
            <h2 class="text-2xl font-bold text-gray-dark mb-4">Regulation 20 covers the qualification framework for teacher registration such as</h2>
            <ul class="list-disc list-inside text-gray-dark space-y-2 ml-4">
                <li>Qualification for registration as a teacher</li>
                <li>Academic requirements for registration</li>
                <li>Professional standards for teachers</li>
            </ul>
        </div>

        {{-- In Simple Terms --}}
        <div class="mb-10 bg-gray-light p-6 rounded-xl border-l-4 border-green" data-aos="fade-right">
            <h2 class="text-xl font-bold text-gray-dark mb-3">In simple terms: TSC may be preparing to:</h2>
            <ul class="list-disc list-inside text-gray-dark space-y-1 ml-4">
                <li>Tighten teacher qualification requirements</li>
                <li>Review minimum grades/training standards</li>
                <li>Address CBC/JSS staffing realities</li>
                <li>Align teacher registration with current reforms</li>
            </ul>
        </div>

        {{-- This Could Directly Affect --}}
        <div class="mb-10" data-aos="fade-up">
            <h2 class="text-xl font-bold text-gray-dark mb-3">This could directly affect:</h2>
            <ul class="list-disc list-inside text-gray-dark space-y-1 ml-4">
                <li>Current trainee teachers</li>
                <li>P1 teachers upgrading qualifications</li>
                <li>Junior Secondary School (JSS) teachers</li>
                <li>Diploma and degree recognition</li>
                <li>Future teacher recruitment</li>
                <li>Registration of foreign-trained teachers</li>
            </ul>
        </div>

        {{-- Potentially, TSC Could --}}
        <div class="mb-10 bg-gray-light p-6 rounded-xl border-l-4 border-gold" data-aos="fade-left">
            <h2 class="text-xl font-bold text-gray-dark mb-3">Potentially, TSC could:</h2>
            <ul class="list-disc list-inside text-gray-dark space-y-1 ml-4">
                <li>Introduce stricter qualification thresholds</li>
                <li>Redefine acceptable teaching combinations</li>
                <li>Adjust requirements for registration in JSS/Senior School</li>
            </ul>
        </div>

        {{-- Deadline --}}
        <div class="mb-10 text-center bg-red/10 p-6 rounded-xl border border-red" data-aos="zoom-in">
            <p class="text-gray-dark text-lg">
                <span class="font-bold">The deadline for submission of memorandums is on</span> — <span class="font-bold text-red text-xl">13th May 2026</span>
            </p>
            <p class="text-gray-dark mt-2">
                Through: 📧 <a href="mailto:regulation20@tsc.go.ke" class="text-green font-mono font-bold">regulation20@tsc.go.ke</a>
            </p>
        </div>

        {{-- Enforceable Points --}}
        <div class="mb-10 bg-green/5 p-6 rounded-xl border border-green" data-aos="fade-up">
            <ul class="space-y-2 text-gray-dark">
                <li>✓ Once regulations are amended, they become enforceable</li>
                <li>✓ Future promotions, deployment, and registration could depend on them</li>
                <li>✓ Teachers may lose opportunities if requirements become stricter</li>
            </ul>
        </div>

        {{-- Focus on Implications --}}
        <div class="mb-8" data-aos="fade-up">
            <p class="text-gray-dark text-lg leading-relaxed">
                As we look at the proposed amendments, our focus should be on its implications on Teacher Trainees, The trained but unemployed, JSS teachers, Promotion, Safeguarding the experienced teachers
            </p>
        </div>

        {{-- Key Issues List --}}
        <div class="mb-10" data-aos="fade-up">
            <div class="grid md:grid-cols-2 gap-3">
                @php
                    $focusItems = [
                        "The raised qualification to be a teacher",
                        "The New requirements to qualify as a teacher",
                        "The future of already trained P1 teachers and their employment",
                        "New subject Combinations",
                        "The possibilities of upgrading our qualifications",
                        "The implications on fire deployment",
                        "The standard qualification for JSS teachers",
                        "Specialisation",
                        "Impacts of retrogressive application of the law",
                        "Mandatory professional development",
                        "Renewal of teacher registration and introduction of new licences",
                        "Continuous training",
                        "Stagnation / Exclusion from interviews",
                        "Discrimination of long serving teachers",
                    ];
                @endphp

                @foreach ($focusItems as $item)
                    <div class="flex items-start gap-2 p-3 bg-gray-light rounded-lg">
                        <span class="text-green text-lg font-bold">•</span>
                        <span class="text-gray-dark">{{ $item }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Signature --}}
        <div class="mt-12 text-center pt-8 border-t border-gray" data-aos="fade-up">
            <p class="text-gold-dark font-bold text-xl">KUPPET HOMABAY BEC 2026-2031</p>
        </div>

    </div>
</section>

@endsection