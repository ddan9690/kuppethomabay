@extends('layouts.frontend')

@section('title', 'Comparison: BBF By-Laws (2021–2026) vs Welfare By-Laws (2026–2031)')

@section('content')

{{-- ================= HERO ================= --}}
<section class="relative bg-green text-white py-28 overflow-hidden">

    {{-- SVG BACKGROUND --}}
    <div class="absolute inset-0 opacity-10 rellax" data-rellax-speed="-3">
        <svg viewBox="0 0 1440 320" class="w-full h-full">
            <path fill="white"
                d="M0,160L80,181.3C160,203,320,245,480,240C640,235,800,181,960,160C1120,139,1280,149,1440,170.7V320H0Z">
            </path>
        </svg>
    </div>

    {{-- OVERLAY FIX FOR READABILITY --}}
    <div class="absolute inset-0 bg-green-dark opacity-60"></div>

    <div class="relative container mx-auto px-6 text-center" data-aos="fade-up">

        <h1 class="text-4xl md:text-6xl font-bold text-white">
            Strengthening Teacher Welfare
        </h1>

        <p class="mt-6 text-lg text-white max-w-3xl mx-auto leading-relaxed">
            A comparison of how the 2026–2031 Welfare By-Laws build on an existing foundation
            to enhance support, inclusivity, and coordination across all teachers.
        </p>

    </div>
</section>

{{-- ================= CONTEXT ================= --}}
<section class="bg-white py-16">
    <div class="container mx-auto px-6 max-w-4xl text-center">

        <h2 class="text-3xl font-bold mb-6 text-gray-dark" data-aos="fade-up">
            A Continuous Journey of Improvement
        </h2>

        <p class="text-gray-dark leading-relaxed" data-aos="fade-up" data-aos-delay="100">
            The welfare system has evolved through contributions from leadership and members over time.
            The current updates build on that foundation with a focus on strengthening structure,
            improving coordination, and enhancing inclusivity for all teachers.
        </p>

    </div>
</section>

{{-- ================= DIRECT BENEFITS COMPARISON ================= --}}
<section class="bg-gray-light py-16">
    <div class="container mx-auto px-6">

        <h2 class="text-3xl font-bold text-center mb-4 text-gray-dark" data-aos="fade-up">
            Direct Benefits to Teachers
        </h2>

        <p class="text-center text-gray-dark max-w-2xl mx-auto mb-12" data-aos="fade-up" data-aos-delay="100">
            A clear comparison of welfare support before and after the revised by-laws.
        </p>

        <div class="grid md:grid-cols-3 gap-8">

            {{-- CHILD --}}
            <div class="bg-white border border-gray p-6 rounded-xl shadow-sm" data-aos="zoom-in">

                <div class="flex items-center justify-between mb-4">
                    <i class='bx bx-heart text-3xl text-red'></i>
                    <span class="text-xs bg-green text-white px-3 py-1 rounded-full">Updated</span>
                </div>

                <h3 class="font-semibold text-gray-dark mb-4">Loss of Child</h3>

                <div class="space-y-2">
                    <p class="text-xs text-gray-dark">Before (2021–2026)</p>
                    <p class="text-red font-bold">Ksh 20,000</p>

                    <p class="text-xs text-gray-dark mt-3">After (2026–2031)</p>
                    <p class="text-green font-bold text-lg">Ksh 30,000</p>
                </div>

                <div class="mt-4 bg-gray h-2 rounded">
                    <div class="bg-green h-2 rounded w-3/4"></div>
                </div>
            </div>

            {{-- PARENT --}}
            <div class="bg-white border border-gray p-6 rounded-xl shadow-sm" data-aos="zoom-in" data-aos-delay="100">

                <div class="flex items-center justify-between mb-4">
                    <i class='bx bx-user text-3xl text-blue'></i>
                    <span class="text-xs bg-green text-white px-3 py-1 rounded-full">Updated</span>
                </div>

                <h3 class="font-semibold text-gray-dark mb-4">Loss of Biological Parent</h3>

                <div class="space-y-2">
                    <p class="text-xs text-gray-dark">Before (2021–2026)</p>
                    <p class="text-red font-bold">Ksh 10,000</p>

                    <p class="text-xs text-gray-dark mt-3">After (2026–2031)</p>
                    <p class="text-green font-bold text-lg">Ksh 20,000</p>
                </div>

                <div class="mt-4 bg-gray h-2 rounded">
                    <div class="bg-green h-2 rounded w-4/5"></div>
                </div>
            </div>

            {{-- SPOUSE --}}
            <div class="bg-white border border-gray p-6 rounded-xl shadow-sm" data-aos="zoom-in" data-aos-delay="200">

                <div class="flex items-center justify-between mb-4">
                    <i class='bx bx-home-heart text-3xl text-green'></i>
                    <span class="text-xs bg-green text-white px-3 py-1 rounded-full">Updated</span>
                </div>

                <h3 class="font-semibold text-gray-dark mb-4">Loss of Spouse</h3>

                <div class="space-y-2">
                    <p class="text-xs text-gray-dark">Before (2021–2026)</p>
                    <p class="text-red font-bold">Ksh 30,000</p>

                    <p class="text-xs text-gray-dark mt-3">After (2026–2031)</p>
                    <p class="text-green font-bold text-lg">Ksh 40,000</p>
                </div>

                <div class="mt-4 bg-gray h-2 rounded">
                    <div class="bg-green h-2 rounded w-full"></div>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- ================= STRUCTURE ================= --}}
<section class="bg-white py-16">
    <div class="container mx-auto px-6">

        <h2 class="text-3xl font-bold text-center mb-12 text-gray-dark" data-aos="fade-up">
            Strengthening the Welfare Structure
        </h2>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-gray-light border border-gray p-6 rounded-xl shadow-sm text-center"
                 data-aos="zoom-in">
                <i class='bx bx-group text-4xl text-green'></i>
                <h3 class="mt-4 font-semibold text-gray-dark">Inclusive Representation</h3>
                <p class="text-sm mt-2 text-gray-dark">All sub-counties and teacher groups included</p>
            </div>

            <div class="bg-gray-light border border-gray p-6 rounded-xl shadow-sm text-center"
                 data-aos="zoom-in" data-aos-delay="100">
                <i class='bx bx-sitemap text-4xl text-green'></i>
                <h3 class="mt-4 font-semibold text-gray-dark">Better Coordination</h3>
                <p class="text-sm mt-2 text-gray-dark">Improved structure enhances efficiency</p>
            </div>

            <div class="bg-gray-light border border-gray p-6 rounded-xl shadow-sm text-center"
                 data-aos="zoom-in" data-aos-delay="200">
                <i class='bx bx-globe text-4xl text-green'></i>
                <h3 class="mt-4 font-semibold text-gray-dark">Digital Access</h3>
                <p class="text-sm mt-2 text-gray-dark">Transparent access to information</p>
            </div>

        </div>

    </div>
</section>

{{-- ================= REPRESENTATION + JSS ================= --}}
<section class="bg-gray-light py-16">
    <div class="container mx-auto px-6">

        <h2 class="text-3xl font-bold text-center mb-12 text-gray-dark" data-aos="fade-up">
            Inclusive Representation Across the Branch
        </h2>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-white border border-gray p-6 rounded-xl shadow-sm text-center" data-aos="zoom-in">
                <i class='bx bx-map text-4xl text-green'></i>
                <h3 class="mt-4 font-semibold text-gray-dark">All Sub-Counties</h3>
                <p class="text-sm mt-2 text-gray-dark">
                    Each sub-county now has a welfare representative.
                </p>
            </div>

            <div class="bg-white border border-gray p-6 rounded-xl shadow-sm text-center"
                 data-aos="zoom-in" data-aos-delay="100">
                <i class='bx bx-book-reader text-4xl text-green'></i>
                <h3 class="mt-4 font-semibold text-gray-dark">JSS Recognition</h3>
                <p class="text-sm mt-2 text-gray-dark">
                    Junior School teachers are fully included in representation.
                </p>
            </div>

            <div class="bg-white border border-gray p-6 rounded-xl shadow-sm text-center"
                 data-aos="zoom-in" data-aos-delay="200">
                <i class='bx bx-balance text-4xl text-green'></i>
                <h3 class="mt-4 font-semibold text-gray-dark">Fair Structure</h3>
                <p class="text-sm mt-2 text-gray-dark">
                    Equal participation opportunities across all teacher categories.
                </p>
            </div>

        </div>

        <div class="mt-12 text-center max-w-3xl mx-auto" data-aos="fade-up">

            <div class="bg-green text-white p-6 rounded-xl shadow">
                <p class="text-lg font-semibold text-white">
                    Every sub-county now has a voice — and all teachers, including JSS,
                    are fully represented in the welfare structure.
                </p>
            </div>

        </div>

    </div>
</section>



{{-- ================= FINAL ================= --}}
<section class="bg-green text-white py-20 text-center">

    <div class="container mx-auto px-6 max-w-3xl" data-aos="zoom-in">

        <h2 class="text-3xl font-bold mb-4 text-white">
            A Shared Commitment to Teachers
        </h2>

        <p class="text-white leading-relaxed">
            The welfare system continues to evolve with a shared focus,
            ensuring fairness, inclusivity, and meaningful support for every teacher.
        </p>

    </div>

</section>

@endsection