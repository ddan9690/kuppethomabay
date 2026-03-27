@extends('layouts.frontend')

@section('title', 'Agency Fee Payer Form - KUPPET Homabay Branch')

@section('content')
<section class="bg-white py-10">
    <div class="container mx-auto px-4 max-w-3xl">

        {{-- Heading --}}
        <h2 class="text-2xl md:text-3xl font-bold text-green mb-4">
            Agency Fee Payer Form
        </h2>

        {{-- Intro Message --}}
        <p class="mb-6 text-gray-700">
            Are you still paying agency fees? Fill this form and our office will follow up so that you can join KUPPET and enjoy the full benefits of being a union member.
        </p>

        {{-- Form --}}
        <form 
            action="{{ route('agency_payer.store') }}" 
            method="POST" 
            x-data="{
                submitting: false,
                async submitForm(event) {
                    event.preventDefault();
                    this.submitting = true;
                    let formData = new FormData($el);

                    try {
                        let response = await fetch($el.action, {
                            method: $el.method,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
                                'Accept': 'application/json'
                            },
                            body: formData
                        });

                        this.submitting = false;

                        if (response.ok) {
                            let data = await response.json();
                            Swal.fire({
                                icon: 'success',
                                title: 'Thank you!',
                                text: data.success,
                                confirmButtonText: 'OK'
                            }).then(() => window.location.href = '/');
                        } else if (response.status === 422) {
                            let errors = await response.json();
                            let messages = Object.values(errors.errors).flat().join('\n');
                            Swal.fire({
                                icon: 'warning',
                                title: 'Attention!',
                                text: messages,
                                confirmButtonText: 'OK'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops!',
                                text: 'Something went wrong. Please try again.',
                                confirmButtonText: 'OK'
                            });
                        }
                    } catch (error) {
                        this.submitting = false;
                        console.error(error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Unable to submit form. Please check your connection and try again.',
                        });
                    }
                }
            }"
            x-on:submit="submitForm($event)"
            class="space-y-4"
        >
            @csrf

            {{-- Full Name --}}
            <div>
                <label for="full_name" class="block font-medium mb-1 text-gray-dark">Full Name</label>
                <input type="text" name="full_name" id="full_name"
                       class="border border-gray rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-green focus:border-green"
                       placeholder="Enter your full name" required>
            </div>

            {{-- Sub-County --}}
            <div>
                <label for="sub_county_id" class="block font-medium mb-1 text-gray-dark">Select Sub-County</label>
                <select name="sub_county_id" id="sub_county_id" 
                        class="border border-gray rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-green focus:border-green" required>
                    <option value="">-- Select Sub-County --</option>
                    @foreach($subCounties as $subCounty)
                        <option value="{{ $subCounty->id }}">{{ $subCounty->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- TSC Number --}}
            <div>
                <label for="tsc_no" class="block font-medium mb-1 text-gray-dark">TSC Number</label>
                <input type="text" name="tsc_no" id="tsc_no"
                       class="border border-gray rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-green focus:border-green"
                       placeholder="Enter your TSC number" required>
            </div>

            {{-- Phone --}}
            <div>
                <label for="phone" class="block font-medium mb-1 text-gray-dark">Phone Number</label>
                <input type="text" name="phone" id="phone"
                       class="border border-gray rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-green focus:border-green"
                       placeholder="Enter your phone number" required>
            </div>

         
            {{-- Submit Button --}}
            <div>
                <button type="submit"
                        class="bg-green text-white px-6 py-2 rounded hover:bg-green-dark transition disabled:opacity-50"
                        x-bind:disabled="submitting">
                    <span x-text="submitting ? 'Submitting...' : 'Submit'"></span>
                </button>
            </div>
        </form>
    </div>
</section>
@endsection