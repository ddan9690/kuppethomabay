@extends('layouts.frontend')

@section('title', 'BBF Claims Portal - KUPPET Homabay Branch')

@section('content')
    <section class="bg-white py-10">
        <div class="container mx-auto px-4 max-w-4xl">

            {{-- HEADER --}}
            <div class="text-center mb-10">

                <h2 class="text-3xl font-bold text-green mb-2">
                    BBF Welfare Claims Portal
                </h2>

                <p class="text-gray-600">
                    Choose how you want to proceed with your claim submission
                </p>

            </div>

            {{-- OPTIONS --}}
            <div class="grid md:grid-cols-2 gap-6">

                {{-- DOWNLOAD MANUAL FORM --}}
                <a href="{{ asset('assets/documents/KUPPET HB WELFAFE SCHEME CLAIM FORM.pdf') }}" download
                    class="block p-8 bg-white border rounded-lg shadow hover:shadow-lg transition text-center">

                    <div class="text-4xl mb-4">📄</div>

                    <h3 class="text-xl font-semibold text-gray-800 mb-2">
                        Download Manual Claim Form
                    </h3>

                    <p class="text-gray-600 text-sm">
                        Download, print, and fill the physical claim form for submission through your subcounty office.
                    </p>

                    <div class="mt-4 text-green font-semibold">
                        Download Form →
                    </div>

                </a>

                {{-- ONLINE CLAIM SUBMISSION --}}
                <a href="{{ route('bbf.claims.terms') }}"
                    class="block p-8 bg-green text-white rounded-lg shadow hover:bg-green-dark transition text-center">

                    <div class="text-4xl mb-4">🖥️</div>

                    <h3 class="text-xl font-semibold mb-2">
                        Submit Claim Online
                    </h3>

                    <p class="text-sm opacity-90">
                        Fill and submit your claim directly in the system. Faster processing and tracking.
                    </p>

                    <div class="mt-4 font-semibold">
                        Start Online Claim →
                    </div>

                </a>

            </div>

            {{-- FOOTNOTE --}}
            <div class="mt-10 text-center text-sm text-gray-500">
                Ensure all required documents are ready before submitting a claim.
            </div>

        </div>
    </section>
@endsection
