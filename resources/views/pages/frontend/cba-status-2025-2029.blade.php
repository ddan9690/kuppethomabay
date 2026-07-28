@extends('layouts.frontend')

@section('title', 'Update to Members on the Status of Implementation of the 2025–2029 CBA')

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

        <span class="inline-block bg-gold text-white text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full mb-4">
            Official Member Update
        </span>

        <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-white leading-tight">
            Status of Implementation of the 2025–2029 CBA
        </h1>

        <p class="mt-6 text-lg text-white max-w-3xl mx-auto leading-relaxed">
            KUPPET Homa Bay Branch is actively working, agitating, and standing as a strong defense for teachers to ensure absolute transparency, accountability, and fairness in the execution of the Collective Bargaining Agreement.
        </p>

    </div>
</section>

{{-- ================= OVERVIEW / KEY PILLARS ================= --}}
<section class="bg-white py-16">
    <div class="container mx-auto px-6">

        <h2 class="text-3xl font-bold text-center mb-4 text-gray-dark" data-aos="fade-up">
            Key Implementation Metrics & Breakdown
        </h2>

        <p class="text-center text-gray-dark max-w-2xl mx-auto mb-12" data-aos="fade-up" data-aos-delay="100">
            A structural overview of the 2025–2029 CBA rollout, highlighting current challenges and our unwavering union stance.
        </p>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

            {{-- PILLAR 1 --}}
            <div class="bg-gray-light border-t-4 border-green p-6 rounded-xl shadow-sm" data-aos="zoom-in">
                <div class="flex items-center justify-between mb-4">
                    <i class='bx bx-calendar text-3xl text-green'></i>
                    <span class="text-xs bg-green text-white px-2.5 py-1 rounded-full font-semibold">1</span>
                </div>
                <h3 class="font-bold text-lg text-gray-dark mb-2">Effective Date</h3>
                <p class="text-sm text-gray-dark leading-relaxed">
                    The 2025–2029 Collective Bargaining Agreement (CBA) took effect in July 2025, immediately after the expiry of the previous CBA in June 2024.
                </p>
            </div>

            {{-- PILLAR 2 --}}
            <div class="bg-gray-light border-t-4 border-green p-6 rounded-xl shadow-sm" data-aos="zoom-in" data-aos-delay="100">
                <div class="flex items-center justify-between mb-4">
                    <i class='bx bx-trending-up text-3xl text-green'></i>
                    <span class="text-xs bg-green text-white px-2.5 py-1 rounded-full font-semibold">2</span>
                </div>
                <h3 class="font-bold text-lg text-gray-dark mb-2">Salary Award</h3>
                <p class="text-sm text-gray-dark leading-relaxed">
                    The negotiated award was not uniform. Lower job grades (B5–C3) received higher percentage increases of up to 26%, while higher grades (C4–D5) received up to 5%.
                </p>
            </div>

            {{-- PILLAR 3 --}}
            <div class="bg-gray-light border-t-4 border-green p-6 rounded-xl shadow-sm" data-aos="zoom-in" data-aos-delay="200">
                <div class="flex items-center justify-between mb-4">
                    <i class='bx bx-buildings text-3xl text-green'></i>
                    <span class="text-xs bg-green text-white px-2.5 py-1 rounded-full font-semibold">3</span>
                </div>
                <h3 class="font-bold text-lg text-gray-dark mb-2">Responsibility</h3>
                <p class="text-sm text-gray-dark leading-relaxed">
                    Implementation responsibility was left jointly to the Teachers Service Commission (TSC), Salaries and Remuneration Commission (SRC), and The National Treasury.
                </p>
            </div>

            {{-- PILLAR 4 --}}
            <div class="bg-gray-light border-t-4 border-green p-6 rounded-xl shadow-sm" data-aos="zoom-in" data-aos-delay="300">
                <div class="flex items-center justify-between mb-4">
                    <i class='bx bx-search-alt text-3xl text-red'></i>
                    <span class="text-xs bg-red text-white px-2.5 py-1 rounded-full font-semibold">4</span>
                </div>
                <h3 class="font-bold text-lg text-gray-dark mb-2">Current Situation</h3>
                <p class="text-sm text-gray-dark leading-relaxed">
                    TSC did not publish annual formulas or percentage allocations per year, releasing only final scales expected at the end of the period, preventing independent verification.
                </p>
            </div>

        </div>

    </div>
</section>

{{-- ================= RESPONSIVE SALARY SCALES TABLE ================= --}}
<section class="bg-gray-light py-16">
    <div class="container mx-auto px-6">

        <div class="text-center max-w-3xl mx-auto mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-dark mb-4">
                CBA 2025–2029 Implementation Schedule (Salary Scales)
            </h2>
            <p class="text-gray-dark">
                Detailed breakdown of basic salary scales (minimum to maximum) across job grades in Kenyan Shillings (KES).
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray overflow-hidden" data-aos="fade-up" data-aos-delay="100">
            <div class="overflow-x-auto">
                <table class="min-w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-green text-white text-xs uppercase tracking-wider">
                            <th class="py-4 px-6 border-b border-green-dark">Job Grade</th>
                            <th class="py-4 px-6 border-b border-green-dark">July 2024 <br><span class="font-normal normal-case text-xs opacity-85">(Baseline - Previous CBA)</span></th>
                            <th class="py-4 px-6 border-b border-green-dark">July 2025</th>
                            <th class="py-4 px-6 border-b border-green-dark">July 2026</th>
                            <th class="py-4 px-6 border-b border-green-dark">July 2027 <br><span class="font-normal normal-case text-xs opacity-85">(Not Specified)</span></th>
                            <th class="py-4 px-6 border-b border-green-dark">July 2028 <br><span class="font-normal normal-case text-xs opacity-85">(Final Implementation)</span></th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-dark text-sm divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-3.5 px-6 font-bold">B5</td>
                            <td class="py-3.5 px-6">23,830 – 29,787</td>
                            <td class="py-3.5 px-6">25,028 – 31,615</td>
                            <td class="py-3.5 px-6">26,225 – 33,444</td>
                            <td class="py-3.5 px-6 text-center text-gray-400">—</td>
                            <td class="py-3.5 px-6 font-semibold text-green">28,620 – 37,100</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition bg-gray-50/50">
                            <td class="py-3.5 px-6 font-bold">C1</td>
                            <td class="py-3.5 px-6">29,787 – 37,234</td>
                            <td class="py-3.5 px-6">31,105 – 38,900</td>
                            <td class="py-3.5 px-6">32,423 – 41,072</td>
                            <td class="py-3.5 px-6 text-center text-gray-400">—</td>
                            <td class="py-3.5 px-6 font-semibold text-green">35,336 – 47,261</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-3.5 px-6 font-bold">C2</td>
                            <td class="py-3.5 px-6">38,286 – 47,858</td>
                            <td class="py-3.5 px-6">39,070 – 49,100</td>
                            <td class="py-3.5 px-6">41,100 – 50,287</td>
                            <td class="py-3.5 px-6 text-center text-gray-400">—</td>
                            <td class="py-3.5 px-6 font-semibold text-green">41,420 – 57,230</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition bg-gray-50/50">
                            <td class="py-3.5 px-6 font-bold">C3</td>
                            <td class="py-3.5 px-6">45,671 – 59,084</td>
                            <td class="py-3.5 px-6">46,699 – 60,871</td>
                            <td class="py-3.5 px-6">48,754 – 62,659</td>
                            <td class="py-3.5 px-6 text-center text-gray-400">—</td>
                            <td class="py-3.5 px-6 font-semibold text-green">49,781 – 66,233</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-3.5 px-6 font-bold">C4</td>
                            <td class="py-3.5 px-6">52,308 – 68,857</td>
                            <td class="py-3.5 px-6">56,922 – 70,923</td>
                            <td class="py-3.5 px-6">57,667 – 72,988</td>
                            <td class="py-3.5 px-6 text-center text-gray-400">—</td>
                            <td class="py-3.5 px-6 font-semibold text-green">58,585 – 77,120</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition bg-gray-50/50">
                            <td class="py-3.5 px-6 font-bold">C5</td>
                            <td class="py-3.5 px-6">62,272 – 79,651</td>
                            <td class="py-3.5 px-6">67,900 – 81,100</td>
                            <td class="py-3.5 px-6">68,948 – 82,160</td>
                            <td class="py-3.5 px-6 text-center text-gray-400">—</td>
                            <td class="py-3.5 px-6 font-semibold text-green">69,745 – 96,130</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-3.5 px-6 font-bold">D1</td>
                            <td class="py-3.5 px-6">78,625 – 96,381</td>
                            <td class="py-3.5 px-6">79,215 – 97,104</td>
                            <td class="py-3.5 px-6">80,500 – 97,827</td>
                            <td class="py-3.5 px-6 text-center text-gray-400">—</td>
                            <td class="py-3.5 px-6 font-semibold text-green">80,984 – 99,272</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition bg-gray-50/50">
                            <td class="py-3.5 px-6 font-bold">D2</td>
                            <td class="py-3.5 px-6">92,496 – 112,633</td>
                            <td class="py-3.5 px-6">93,190 – 113,478</td>
                            <td class="py-3.5 px-6">93,883 – 114,322</td>
                            <td class="py-3.5 px-6 text-center text-gray-400">—</td>
                            <td class="py-3.5 px-6 font-semibold text-green">95,271 – 116,012</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-3.5 px-6 font-bold">D3</td>
                            <td class="py-3.5 px-6">106,043 – 129,463</td>
                            <td class="py-3.5 px-6">106,838 – 130,434</td>
                            <td class="py-3.5 px-6">107,634 – 131,405</td>
                            <td class="py-3.5 px-6 text-center text-gray-400">—</td>
                            <td class="py-3.5 px-6 font-semibold text-green">109,224 – 133,347</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition bg-gray-50/50">
                            <td class="py-3.5 px-6 font-bold">D4</td>
                            <td class="py-3.5 px-6">118,242 – 146,286</td>
                            <td class="py-3.5 px-6">119,129 – 147,383</td>
                            <td class="py-3.5 px-6">120,016 – 148,480</td>
                            <td class="py-3.5 px-6 text-center text-gray-400">—</td>
                            <td class="py-3.5 px-6 font-semibold text-green">121,789 – 150,675</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-3.5 px-6 font-bold">D5</td>
                            <td class="py-3.5 px-6">131,380 – 162,539</td>
                            <td class="py-3.5 px-6">132,365 – 163,758</td>
                            <td class="py-3.5 px-6">133,351 – 164,977</td>
                            <td class="py-3.5 px-6 text-center text-gray-400">—</td>
                            <td class="py-3.5 px-6 font-semibold text-green">135,321 – 167,415</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="bg-gray-50 px-6 py-3 border-t border-gray text-xs text-gray-dark italic">
                * Figures represent basic salary scales (minimum – maximum) in Kenyan Shillings (KES).
            </div>
        </div>

    </div>
</section>

{{-- ================= DEFENSIVE STANCE / BRANCH POSITION ================= --}}
<section class="bg-white py-16">
    <div class="container mx-auto px-6 max-w-4xl">

        <div class="bg-green text-white p-8 md:p-12 rounded-2xl shadow-xl relative overflow-hidden" data-aos="fade-up">
            
            <div class="absolute -right-10 -bottom-10 opacity-10">
                <i class='bx bx-shield-alt-2 text-9xl'></i>
            </div>

            <div class="relative z-10">
                <h3 class="text-2xl md:text-3xl font-bold mb-4 flex items-center gap-3">
                    <i class='bx bx-shield text-gold'></i> KUPPET Homa Bay Branch Position
                </h3>
                
                <p class="text-white text-opacity-95 text-lg leading-relaxed mb-6">
                    KUPPET Homa Bay Branch firmly believes that transparency is essential in the implementation of any Collective Bargaining Agreement. 
                </p>

                <p class="text-white text-opacity-90 leading-relaxed mb-8">
                    Members deserve full access to the annual implementation formula, exact percentages, and computation matrices used to arrive at the published salary scales. This promotes organizational accountability and enables independent verification. We remain actively on the ground, working for teachers, agitating for their rights, and fiercely defending their welfare and dignity.
                </p>

                <div class="border-t border-green-dark pt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div>
                        <p class="font-bold text-lg text-white">TOGETHER WE ARE STRONGER</p>
                        <p class="text-xs text-gold uppercase tracking-wider font-semibold">Informed Members, Empowered Teachers</p>
                    </div>
                    <a href="{{ url('/contact') }}" class="bg-gold hover:bg-gold-dark text-white px-6 py-3 rounded-lg font-semibold shadow transition whitespace-nowrap">
                        Contact Branch Office
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection