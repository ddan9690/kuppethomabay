<section class="bg-gray-light py-16">
    <div class="container mx-auto px-4 text-center md:text-left">

        {{-- Section Heading --}}
        <h2 class="text-3xl md:text-4xl font-bold text-green mb-6">
            About KUPPET Homabay Branch
        </h2>

        {{-- Description / Mission --}}
        <p class="text-gray-dark text-lg md:text-xl mb-6 leading-relaxed">
            KUPPET, the Kenya Union of Post Primary Education Teachers, was founded as both a trade union and a professional organization. 
            Our mission is to unite all post-primary teachers in Kenya, safeguard their welfare, and promote professional growth. 
            The Homabay branch is fiercely committed to working for teachers, agitating for their rights, standing as a strong defense against exploitation, and fostering excellence in education.
        </p>

        {{-- Call to Action --}}
        <a href="{{ url('/contact') }}" class="inline-block bg-gold hover:bg-gold-dark text-white px-6 py-3 rounded font-semibold transition">
            Join Us / Get in Touch
        </a>

        {{-- Divider --}}
        <div class="border-t border-gray my-8 max-w-full"></div>

        {{-- Side-by-Side Notice Cards Grid for Desktop --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto md:mx-0 mb-8">
            
            {{-- Link to KNEC Reimbursements Page --}}
            <div class="bg-white p-6 rounded shadow flex flex-col justify-between">
                <div>
                    <p class="text-sm text-gray-dark uppercase tracking-wide font-semibold mb-2">KNEC Training</p>
                    <h3 class="text-xl font-bold text-gray-dark mb-2">KNEC Training Reimbursement</h3>
                    <p class="text-gray-dark mb-4 text-sm">
                        Application for reimbursement of duly registered teachers of KUPPET Homa Bay Branch who applied and attended KNEC training.
                    </p>
                </div>
                <div>
                    <a href="{{ route('knec-reimbursements.index') }}" 
                       class="inline-flex items-center gap-2 bg-green hover:bg-green-dark text-white px-5 py-2 rounded font-semibold transition">
                        Apply Now
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Link to TSC Regulation 20 Page --}}
            <div class="bg-white p-6 rounded shadow flex flex-col justify-between">
                <div>
                    <p class="text-sm text-gray-dark uppercase tracking-wide font-semibold mb-2">Important Notice for Members</p>
                    <h3 class="text-xl font-bold text-gray-dark mb-2">TSC Regulation 20 Proposed Changes</h3>
                    <p class="text-gray-dark mb-4 text-sm">
                        TSC has invited stakeholders to submit proposals on changes to teacher qualification requirements.
                        Deadline: <span class="font-bold text-red">13th May 2026</span>
                    </p>
                </div>
                <div>
                    <a href="{{ route('tsc.regulation20') }}" 
                       class="inline-flex items-center gap-2 bg-green hover:bg-green-dark text-white px-5 py-2 rounded font-semibold transition">
                        Read Full Notice
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

        </div>

        {{-- Action Cards / Buttons Grid --}}
        <div class="flex flex-col md:flex-row flex-wrap gap-4 items-start">
            {{-- Button to CBA Implementation Status --}}
            <div>
                <a href="{{ route('cba.status-2025-2029') }}" class="inline-flex items-center gap-2 bg-green hover:bg-green-dark text-white px-6 py-3 rounded font-bold transition">
                    Update to Members on the Status of Implementation of the 2025-2029 CBA
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>

            {{-- Button for Medical Scheme Chronic Illness Issues Collection --}}
            <div>
                <a href="{{ route('chronic-illness-infos.create') }}" class="inline-flex items-center gap-2 bg-green hover:bg-green-dark text-white px-6 py-3 rounded font-bold transition">
                    Collection of Teachers Medical Scheme Issues: Chronic Disease Management & Medication
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>

    </div>
</section>