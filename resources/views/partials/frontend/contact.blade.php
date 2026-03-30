<section class="bg-white py-16" x-data="feedbackForm()">
    <div class="container mx-auto px-4 max-w-3xl">
        
        {{-- Section Heading --}}
        <h2 class="text-3xl md:text-4xl font-bold text-green text-center mb-6">
            Contact KUPPET Homa Bay Branch
        </h2>

        {{-- Message --}}
        <p class="text-gray-dark text-lg text-center mb-12 leading-relaxed">
            We would love to hear from you, the teacher! Share your feedback, sentiments, suggestions, complaints, and reports.
        </p>

        {{-- Contact Form --}}
        <form @submit.prevent="submitForm" class="space-y-6">
            @csrf

            {{-- Name --}}
            <div>
                <label class="block text-gray-dark font-medium mb-2">Name</label>
                <input type="text" name="name" x-model="form.name"
                    class="w-full border border-gray p-3 rounded focus:outline-none focus:ring-2 focus:ring-green">
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-gray-dark font-medium mb-2">Email Address</label>
                <input type="email" name="email" x-model="form.email"
                    class="w-full border border-gray p-3 rounded focus:outline-none focus:ring-2 focus:ring-green">
            </div>

            {{-- Message --}}
            <div>
                <label class="block text-gray-dark font-medium mb-2">Message</label>
                <textarea name="message" rows="5" x-model="form.message"
                    class="w-full border border-gray p-3 rounded focus:outline-none focus:ring-2 focus:ring-green"></textarea>
            </div>

            {{-- Submit --}}
            <div class="text-center">
                <button type="submit"
                    class="bg-green hover:bg-green-dark text-white px-6 py-3 rounded font-semibold transition">
                    Send Message
                </button>
            </div>
        </form>
    </div>

   <script>
    function feedbackForm() {
        return {
            form: {
                name: '',
                email: '',
                message: ''
            },
            submitForm() {
                fetch("{{ route('feedback.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(this.form)
                })
                .then(async response => {
                    const data = await response.json();
                    if (response.ok) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thank you!',
                            text: data.message || 'Your feedback has been submitted.',
                        }).then(() => {
                            // Redirect after clicking OK
                            window.location.href = '/';
                        });

                        // Reset form
                        this.form.name = '';
                        this.form.email = '';
                        this.form.message = '';
                    } else {
                        let errors = data.errors || {};
                        let errorMessages = Object.values(errors).flat().join('\n');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: errorMessages || 'Something went wrong!',
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong. Please try again.'
                    });
                    console.error(error);
                });
            }
        }
    }
</script>
</section>