@extends('layouts.frontend')

@section('title', 'BBF Claim Form')

@section('content')
    <section class="bg-white py-10">
        <div class="container mx-auto max-w-6xl px-4">

            {{-- HEADER --}}
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-green">
                    KUPPET HOMA BAY WELFARE SCHEME CLAIM FORM
                </h2>
                <p class="text-sm text-gray-600">
                    Fill all sections before submission
                </p>
            </div>

            {{-- FORM --}}
            <form id="bbfForm" class="space-y-10">

                @csrf

                {{-- ================= PART A ================= --}}
                <div class="border p-5 rounded-lg bg-gray-50">
                    <h3 class="font-bold text-green mb-4">PART A: MEMBER DETAILS</h3>

                    <div class="grid md:grid-cols-2 gap-4">

                        <input type="text" placeholder="Teacher Name" class="border p-2 rounded w-full">
                        <input type="text" placeholder="TSC Number" class="border p-2 rounded w-full">
                        <input type="text" placeholder="Phone Number" class="border p-2 rounded w-full">
                        <input type="text" placeholder="School" class="border p-2 rounded w-full">

                        <select class="border p-2 rounded w-full">
                            <option>School Category</option>
                            <option>Tertiary</option>
                            <option>Senior Secondary</option>
                            <option>Junior Secondary</option>
                            <option>Primary</option>
                        </select>

                        <input type="text" placeholder="Sub County" class="border p-2 rounded w-full">
                        <input type="text" placeholder="Zone" class="border p-2 rounded w-full">

                    </div>
                </div>

                {{-- ================= PART B ================= --}}
                <div class="border p-5 rounded-lg">
                    <h3 class="font-bold text-green mb-4">PART B: DETAILS OF DECEASED</h3>

                    <div class="grid md:grid-cols-2 gap-4">

                        <input type="text" placeholder="Name of Deceased" class="border p-2 rounded w-full">
                        <input type="date" class="border p-2 rounded w-full">

                        <select class="border p-2 rounded w-full">
                            <option>Relationship</option>
                            <option>Spouse</option>
                            <option>Child</option>
                            <option>Parent</option>
                            <option>Self</option>
                        </select>

                        <input type="text" placeholder="Place of Burial" class="border p-2 rounded w-full">
                        <input type="text" placeholder="County" class="border p-2 rounded w-full">

                    </div>
                </div>

                {{-- ================= PART C ================= --}}
                <div class="border p-5 rounded-lg bg-gray-50">
                    <h3 class="font-bold text-green mb-4">PART C: CLAIM DETAILS</h3>

                    <select class="border p-2 rounded w-full mb-4">
                        <option>Type of Claim</option>
                        <option>Burial</option>
                        <option>Benevolent</option>
                    </select>

                    <textarea rows="4" placeholder="Description of claim" class="border p-2 rounded w-full mb-4"></textarea>

                    <input type="number" placeholder="Amount Claimed (Ksh)" class="border p-2 rounded w-full">

                </div>

                {{-- ================= PART D ================= --}}
                <div class="border p-5 rounded-lg">
                    <h3 class="font-bold text-green mb-4">PART D: REQUIRED ATTACHMENTS</h3>

                    <div class="grid md:grid-cols-2 gap-2 text-sm">
                        <label><input type="checkbox"> Latest Payslip</label>
                        <label><input type="checkbox"> Death Certificate / Burial Permit</label>
                        <label><input type="checkbox"> Chief’s Letter</label>
                        <label><input type="checkbox"> Medical Report</label>
                    </div>

                    <input type="file" multiple class="border p-2 rounded w-full mt-4">
                </div>

                {{-- ================= PART E ================= --}}
                <div class="border p-5 rounded-lg">
                    <h3 class="font-bold text-green mb-4">PART E: PAYMENT DETAILS</h3>

                    <div class="grid md:grid-cols-2 gap-4">

                        <select class="border p-2 rounded w-full">
                            <option>Payment Method</option>
                            <option>Cheque</option>
                            <option>Bank Transfer</option>
                            <option>M-PESA</option>
                        </select>

                        <input type="text" placeholder="Bank Account / M-PESA No" class="border p-2 rounded w-full">

                    </div>
                </div>

                {{-- DECLARATION --}}
                <div class="border p-5 rounded-lg">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox">
                        <span>I hereby declare that information provided above is true and correct to the best of my
                            knowledge. I
                            understand that any false information may lead to rejection of this claim
                        </span>
                    </label>
                </div>

                {{-- SUBMIT --}}
                <div class="text-right">
                    <button type="submit" class="bg-green text-white px-6 py-2 rounded hover:bg-green-dark transition">
                        Submit Claim
                    </button>
                </div>

            </form>

        </div>
    </section>

    {{-- ✅ WORKING SWEETALERT HANDLER --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const form = document.getElementById('bbfForm');

            if (!form) return;

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                Swal.fire({
                    icon: 'info',
                    title: 'Notice',
                    text: 'BBF claims cannot be submitted at the moment. This feature will be available soon.',
                    confirmButtonText: 'OK'
                });

            });

        });
    </script>

@endsection
