<section class="bg-white py-16">
    <div class="container mx-auto px-4 max-w-3xl">
        
        {{-- Section Heading --}}
        <h2 class="text-3xl md:text-4xl font-bold text-green text-center mb-6">
            Contact KUPPET Homa Bay Branch
        </h2>

        {{-- Updated Message --}}
        <p class="text-gray-dark text-lg text-center mb-12 leading-relaxed">
            We would love to hear from you, the teacher! Share your feedback, sentiments, suggestions, complaints, and reports. Let’s join hands to build a stronger, better KUPPET Homa Bay.
        </p>

        {{-- Contact Form --}}
        <form action="" method="POST" class="space-y-6">
            @csrf

            {{-- Name --}}
            <div>
                <label class="block text-gray-dark font-medium mb-2" for="name">Full Name</label>
                <input type="text" name="name" id="name" required
                    class="w-full border border-gray p-3 rounded focus:outline-none focus:ring-2 focus:ring-green">
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-gray-dark font-medium mb-2" for="email">Email Address</label>
                <input type="email" name="email" id="email" required
                    class="w-full border border-gray p-3 rounded focus:outline-none focus:ring-2 focus:ring-green">
            </div>

            {{-- Message --}}
            <div>
                <label class="block text-gray-dark font-medium mb-2" for="message">Message</label>
                <textarea name="message" id="message" rows="5" required
                    class="w-full border border-gray p-3 rounded focus:outline-none focus:ring-2 focus:ring-green"></textarea>
            </div>

            {{-- Submit Button --}}
            <div class="text-center">
                <button type="submit"
                    class="bg-green hover:bg-green-dark text-white px-6 py-3 rounded font-semibold transition">
                    Send Message
                </button>
            </div>
        </form>

        {{-- SHA Medical Cover Button at the bottom --}}
        <div class="text-center mt-10">
            <a href="#" 
               class="inline-block bg-red-700 hover:bg-red-800 text-white px-6 py-3 rounded font-semibold shadow-lg transition">
                Facing Mwalimu SHA Medical Cover Challenges? Click here to let Us know
            </a>
        </div>

    </div>
</section>