<section class="bg-green text-white py-16">
    <div class="container mx-auto px-4 text-center">

        {{-- Heading --}}
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
            Take Action for a Better Future
        </h2>

        {{-- Subtext --}}
        <p class="text-lg md:text-xl mb-6 leading-relaxed">
            Join the KUPPET Homabay Branch in advocating for teachers’ welfare, professional growth, and educational development. 
            Together we can make a difference in the lives of educators and students.
        </p>

        {{-- Important Notice for Agency Fee Payers --}}
        <div class="bg-white text-green p-6 rounded mb-8 flex flex-col items-center">
        
            <img src="{{ asset('assets/images/agency-fee-payers-register.jpg') }}" 
                 alt="Agency Fee Payers Registration Poster" 
                 class="max-w-md rounded shadow-lg">
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
        </div>

    </div>
</section>