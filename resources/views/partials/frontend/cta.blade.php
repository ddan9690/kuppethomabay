<section class="bg-green text-white py-16">
    <div class="container mx-auto px-4 text-center">

        {{-- Heading --}}
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
            Take Action for a Better Future
        </h2>

        {{-- Subtext --}}
        <p class="text-lg md:text-xl mb-6 leading-relaxed">
            Join the KUPPET Homabay Branch in advocating for teachers’ welfare, professional growth, and educational
            development.
            Together we can make a difference in the lives of educators and students.
        </p>

        {{-- Important Notice for Agency Fee Payers --}}
        <div class="bg-white text-green p-6 rounded mb-8 flex flex-col items-center">
            <img src="{{ asset('assets/images/agency-fee-payers-register.jpg') }}"
                alt="Agency Fee Payers Registration Poster" class="max-w-md rounded shadow-lg">
        </div>

        {{-- CTA Buttons --}}
        <div class="flex flex-col md:flex-row justify-center gap-4">
            <a href="{{ url('/contact') }}"
                class="bg-gold hover:bg-gold-dark text-white px-6 py-3 rounded font-semibold transition">
                Get in Touch
            </a>
            <a href="{{ url('/about') }}"
                class="bg-white hover:bg-gray-light text-green px-6 py-3 rounded font-semibold transition">
                Learn More
            </a>
            {{-- New Agency Fee Payer Link --}}
            <a href="{{ route('agency_payer.create') }}"
                class="bg-green-dark hover:bg-green text-white px-6 py-3 rounded font-semibold transition">
                Are You Still an Agency Fee Payer? Click Here
            </a>
        </div>

    </div>
</section>

<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-4 text-center">

        {{-- Heading --}}
        <h2 class="text-3xl md:text-4xl font-extrabold text-green mb-6">
            KUPPET HOMA BAY BRANCH YOUTHFUL TEACHERS DATABASE 2026
        </h2>

        {{-- Description Content --}}
        <div class="max-w-3xl mx-auto mb-10">
            <p class="text-lg text-gray-700 leading-relaxed mb-6">
                The Kenya Union of Post Primary Education Teachers (KUPPET) Homa-Bay Branch is establishing a database
                of youthful teachers to strengthen communication, leadership development, professional growth, and
                member engagement. This information will only be used for official KUPPET programmes and will remain
                confidential.
            </p>
            <p class="text-xl font-semibold text-green italic">
                "Connecting, Empowering and Developing the Next Generation of Professionals."
            </p>
        </div>

        {{-- Call to Action --}}
        <div class="animate-pulse">
            <a href="{{ route('youthful-teachers.create') }}"
                class="inline-block bg-green hover:bg-green-dark text-white px-10 py-4 rounded-full font-bold text-xl transition-all duration-300 transform hover:scale-105 shadow-2xl">
                Register Now & Participate
            </a>
            <p class="text-sm text-gray-500 mt-4 font-medium italic">
                Be part of the movement. Register today!
            </p>
        </div>

    </div>
</section>
