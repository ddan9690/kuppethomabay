@extends('layouts.frontend')

@section('title', 'BBF Terms & Conditions')

@section('content')
<section class="bg-white py-10">
    <div class="container mx-auto max-w-4xl px-4">

        <h2 class="text-2xl font-bold text-green mb-6">
            BBF Welfare Scheme Terms & Conditions
        </h2>

        {{-- TERMS CONTENT --}}
        <div class="bg-gray-50 p-6 rounded shadow text-sm space-y-6 leading-relaxed">

            {{-- INTRO --}}
            <section>
                <h3 class="font-semibold text-green mb-2">1. Overview of the Welfare Scheme</h3>
                <p>
                    The KUPPET Homa Bay Branch Welfare Scheme (BBF) is a member-based support fund
                    established to assist members during bereavement. It provides financial and moral support
                    to members and their registered dependents during difficult times.
                </p>
            </section>

            {{-- MEMBERSHIP --}}
            <section>
                <h3 class="font-semibold text-green mb-2">2. Membership Eligibility</h3>
                <p>
                    Membership is open to all KUPPET members employed by the Teachers Service Commission (TSC)
                    within Homa Bay Branch. Membership is voluntary and becomes active upon registration and payment of fees.
                </p>
                <ul class="list-disc ml-6 mt-2">
                    <li>Each member must register officially and complete the TSC check-off process.</li>
                    <li>Members may remain in the scheme even after transfer if they choose.</li>
                    <li>A member must have active contributions to remain eligible for benefits.</li>
                </ul>
            </section>

            {{-- DEPENDENTS --}}
            <section>
                <h3 class="font-semibold text-green mb-2">3. Registered Dependents</h3>
                <p>Members are required to register dependents who will benefit from the scheme:</p>
                <ul class="list-disc ml-6 mt-2">
                    <li>One spouse</li>
                    <li>Up to seven (7) biological or legally adopted children (below 24 years)</li>
                    <li>Biological parents</li>
                </ul>
                <p class="mt-2">
                    All dependents must be properly documented and verified using official records such as birth certificates
                    and TSC next-of-kin records.
                </p>
            </section>

            {{-- CONTRIBUTIONS --}}
            <section>
                <h3 class="font-semibold text-green mb-2">4. Contributions</h3>
                <ul class="list-disc ml-6">
                    <li>Membership registration fee: Ksh 200 (non-refundable)</li>
                    <li>Monthly contribution: Ksh 200 or as reviewed by the National Governing Council</li>
                    <li>Payments are made through TSC check-off system</li>
                </ul>
                <p class="mt-2">
                    Members must contribute for at least <strong>three (3) consecutive months</strong>
                    before becoming eligible for benefits.
                </p>
            </section>

            {{-- CLAIM REQUIREMENTS --}}
            <section>
                <h3 class="font-semibold text-green mb-2">5. Claim Requirements</h3>
                <p>To process any claim, the following documents must be provided:</p>
                <ul class="list-disc ml-6 mt-2">
                    <li>Death certificate or burial permit (or birth notification for child cases)</li>
                    <li>Duly filled claim form</li>
                    <li>Latest payslip of the member</li>
                    <li>Identification documents for verification</li>
                </ul>
                <p class="mt-2">
                    All documents must be submitted through the Sub-County Welfare Representative for verification before approval.
                </p>
            </section>

            {{-- WAITING PERIOD --}}
            <section>
                <h3 class="font-semibold text-green mb-2">6. Waiting Period</h3>
                <p>
                    New members must complete a waiting period of <strong>three (3) consecutive months</strong>
                    of contributions before they can qualify for any benefits.
                </p>
            </section>

            {{-- APPROVAL --}}
            <section>
                <h3 class="font-semibold text-green mb-2">7. Claim Approval Process</h3>
                <ul class="list-disc ml-6">
                    <li>All claims are verified at Sub-County and Branch level.</li>
                    <li>Approval is not automatic and follows official BBF governance procedures.</li>
                    <li>The Branch Executive Committee has final oversight on all approvals.</li>
                </ul>
            </section>

            {{-- GOVERNANCE --}}
            <section>
                <h3 class="font-semibold text-green mb-2">8. Governance Structure</h3>
                <p>
                    The scheme is managed through structured committees including:
                </p>
                <ul class="list-disc ml-6 mt-2">
                    <li>Branch Executive Committee (policy oversight)</li>
                    <li>Welfare Executive Committee (operations management)</li>
                    <li>Central Management Committee (coordination and reporting)</li>
                </ul>
            </section>

            {{-- IMPORTANT NOTICE --}}
            <section>
                <h3 class="font-semibold text-red-600 mb-2">9. Important Notice</h3>
                <ul class="list-disc ml-6">
                    <li>Providing false information may lead to rejection of a claim.</li>
                    <li>All claims are subject to verification and audit.</li>
                    <li>Benefits are only payable to eligible and active members.</li>
                </ul>
            </section>

            {{-- CONTACT --}}
            <section>
                <h3 class="font-semibold text-green mb-2">10. Contact Information</h3>
                <p>
                    KUPPET Homa Bay Branch Welfare Office<br>
                    P.O Box 378 - 40300, Homa Bay<br>
                    Rang’wena Bridge – Off Kisumu Road<br>
                    Phone: +254710709061<br>
                    Email: kuppethombay2011@gmail.com
                </p>
            </section>

        </div>

        {{-- ACCEPT FORM --}}
        <form method="POST" action="{{ route('bbf.claims.terms.accept') }}" class="mt-6">

            @csrf

            <label class="flex items-start space-x-2 mb-4">
                <input type="checkbox" name="agree" required class="mt-1">
                <span>
                    I confirm that I have read, understood, and agree to the BBF Welfare Scheme Terms & Conditions and By-Laws.
                </span>
            </label>

            <button type="submit"
                class="bg-green text-white px-6 py-2 rounded hover:bg-green-dark transition">
                Proceed to Claim Form →
            </button>

        </form>

    </div>
</section>
@endsection