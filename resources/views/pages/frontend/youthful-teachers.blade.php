@extends('layouts.frontend')

@section('title', 'Youthful Teachers Database - KUPPET Homabay')

@section('content')
<section class="bg-white py-10">
    <div class="container mx-auto px-4 max-w-3xl">
        
        <h2 class="text-2xl md:text-3xl font-bold text-green mb-6 border-b pb-4">
            KUPPET HOMA BAY BRANCH OFFICIAL YOUTHFUL TEACHERS DATABASE 2026
        </h2>

        <form action="{{ route('youthful-teachers.store') }}" 
              method="POST" 
              x-data="{ submitting: false }" 
              x-on:submit="submitting = true" 
              class="space-y-6">
            @csrf

            {{-- Basic Info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="full_name" placeholder="Full Name" class="border p-2 w-full rounded" required>
                <input type="email" name="email" placeholder="Email Address" class="border p-2 w-full rounded" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="tsc_number" placeholder="TSC Number" class="border p-2 w-full rounded" required>
                <input type="text" name="phone_number" placeholder="Phone Number" class="border p-2 w-full rounded" required>
            </div>

            <select name="sub_county_id" class="border p-2 w-full rounded" required>
                <option value="">Select Sub-County</option>
                @foreach($subCounties as $sc)
                    <option value="{{ $sc->id }}">{{ $sc->name }}</option>
                @endforeach
            </select>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <select name="age_bracket" class="border p-2 w-full rounded" required>
                    <option value="">Select Age Bracket</option>
                    <option value="20-25">20-25</option>
                    <option value="26-30">26-30</option>
                    <option value="31-35">31-35</option>
                </select>
                <select name="teaching_level" class="border p-2 w-full rounded" required>
                    <option value="">Select Teaching Level</option>
                    <option value="Junior School">Junior School</option>
                    <option value="Senior School">Senior School</option>
                    <option value="Tertiary">Tertiary</option>
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="teaching_subject_1" placeholder="Teaching Subject 1" class="border p-2 w-full rounded" required>
                <input type="text" name="teaching_subject_2" placeholder="Teaching Subject 2" class="border p-2 w-full rounded" required>
            </div>

            {{-- Employment & Service --}}
            <div>
                <label class="block font-bold mb-2">Employment Status:</label>
                <div class="flex gap-4">
                    <label><input type="radio" name="employment_status" value="Permanent and Pensionable" required> Permanent and Pensionable</label>
                    <label><input type="radio" name="employment_status" value="Intern"> Intern</label>
                </div>
            </div>

            <div>
                <label class="block font-bold mb-2">Years in Service:</label>
                <div class="grid grid-cols-2 gap-2">
                    @foreach(['Less than 2 years', '2-5 years', '6-10 years', 'Above 10'] as $yrs)
                        <label><input type="radio" name="years_in_service" value="{{ $yrs }}" required> {{ $yrs }}</label>
                    @endforeach
                </div>
            </div>

            {{-- Training & Interests --}}
            <div>
                <label class="block font-bold mb-2">Have you undertaken any training organized by TSC, Ministry of Education or any other body?</label>
                <div class="flex gap-4">
                    <label><input type="radio" name="has_undertaken_training" value="1" required> Yes</label>
                    <label><input type="radio" name="has_undertaken_training" value="0"> No</label>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold mb-2">Union Activities Interested In:</label>
                    @foreach(['Financial Literacy', 'Professional Development', 'Games & Sports', 'Mentorship'] as $act)
                        <label class="block"><input type="checkbox" name="interested_activities[]" value="{{ $act }}"> {{ $act }}</label>
                    @endforeach
                </div>
                <div>
                    <label class="block font-bold mb-2">Beneficial Trainings:</label>
                    @foreach(['ICT Integration', 'Entrepreneurship', 'Mental Health Support'] as $train)
                        <label class="block"><input type="checkbox" name="beneficial_trainings[]" value="{{ $train }}"> {{ $train }}</label>
                    @endforeach
                </div>
            </div>

            <label class="block">
                <input type="checkbox" name="consent" value="1" required> 
                I agree that this information will only be used for official KUPPET programmes and will remain confidential.
            </label>

            <button type="submit" 
                    class="bg-green hover:bg-green-dark text-white w-full py-4 rounded font-bold text-lg transition" 
                    x-bind:disabled="submitting" 
                    x-text="submitting ? 'Submitting...' : 'Register Now'">
            </button>
        </form>
    </div>
</section>

{{-- SweetAlert Script with Auto-Redirect --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        @if(session('swal_success') || session('swal_info'))
            Swal.fire({
                icon: '{{ session('swal_success') ? 'success' : 'info' }}',
                title: '{{ session('swal_success') ? 'Registration Successful' : 'Notice' }}',
                text: '{{ session('swal_success') ?? session('swal_info') }}',
                confirmButtonColor: '#059669',
                allowOutsideClick: false // Forces the user to click the button
            }).then((result) => {
                // This block runs after the user clicks the "OK" button
                if (result.isConfirmed) {
                    window.location.href = '/';
                }
            });
        @endif
    });
</script>
@endsection