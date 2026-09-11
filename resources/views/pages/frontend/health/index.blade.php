@extends('layouts.frontend')

@section('title', 'Teacher Healthcare & SHA Guide - KUPPET Homabay Branch')

@section('content')
<section class="bg-gradient-to-b from-gray-50 to-white py-12 md:py-16">
    <div class="container mx-auto px-4 max-w-4xl">

        {{-- Page Header --}}
        <div class="border-b border-gray-200 pb-6 mb-8">
            <span class="text-xs font-bold text-green uppercase tracking-widest">KUPPET Homabay Branch Advisory</span>
            <h1 class="text-3xl md:text-4xl font-extrabold text-green-dark mt-2 mb-3">
                Comprehensive Guide to Teacher Healthcare & SHA Access in Homabay
            </h1>
            <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                An essential reference document outlining medical scheme entitlements, Social Health Authority (SHA) procedures, dependant management, and local empanelled health facilities for post-primary educators across Homabay County.
            </p>
        </div>

        {{-- Main Document Content --}}
        <div class="space-y-10 text-sm md:text-base text-gray-800 leading-relaxed">

            {{-- Notice Callout --}}
            <div class="bg-amber-50 border border-amber-200 p-5 rounded-2xl text-amber-900 text-xs md:text-sm shadow-sm flex items-start gap-3">
                <span class="text-lg">&#9888;</span>
                <div>
                    <strong>Important Notice:</strong> Under the Teachers Service Commission (TSC) medical framework, all active teachers and their registered beneficiaries access comprehensive inpatient and outpatient services via the Public Officers Medical Scheme Fund (POMSF) managed through the Social Health Authority (SHA) architecture.
                </div>
            </div>

            {{-- Prominent Top Callout: Accredited Facilities Directory --}}
            <div class="bg-green-dark text-white p-6 md:p-8 rounded-2xl shadow-md relative overflow-hidden space-y-4">
                <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-green rounded-full opacity-25 pointer-events-none"></div>
                <div class="relative z-10 space-y-3">
                    <span class="text-xs font-bold text-gold uppercase tracking-widest">Quick Access Directory</span>
                    <h2 class="text-xl md:text-2xl font-bold">
                        Accredited Healthcare Facilities in Homabay & Regional Partners
                    </h2>
                    <p class="text-gray-200 text-sm leading-relaxed max-w-2xl">
                        We maintain an exhaustive, filterable directory of all empanelled public hospitals, faith-based facilities, private clinics, dental centers, and optical units across all Homa Bay sub-counties and regional hubs (Kisumu, Kisii, Migori).
                    </p>
                    <div class="pt-2">
                        <a href="{{ route('health.facilities') }}"
                           class="inline-flex items-center gap-2 px-5 py-3 text-xs md:text-sm font-bold text-green-dark bg-gold hover:bg-gold-light rounded-xl transition shadow-sm">
                            Click here to view full health facilities directory &rarr;
                        </a>
                    </div>
                </div>
            </div>

            {{-- Section 1 --}}
            <div class="bg-white p-6 md:p-8 rounded-2xl border border-gray-200 shadow-sm space-y-4">
                <h2 class="text-xl md:text-2xl font-bold text-green-dark flex items-center gap-2">
                    <span class="w-8 h-8 rounded-lg bg-green-50 text-green flex items-center justify-center text-sm font-extrabold">1</span> 
                    Overview of the Three Health Funds
                </h2>
                <p class="text-gray-600">
                    The healthcare transition is anchored on three statutory funding pillars designed to ensure seamless coverage from primary care up to specialized critical medical interventions:
                </p>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-2.5">
                        <span class="text-green mt-1">&#10003;</span>
                        <div><strong>Primary Healthcare Fund (PHC):</strong> Handles primary medical interventions, routine screenings, consultations, and basic laboratory services at dispensaries and health centres (Levels 2 & 3).</div>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="text-green mt-1">&#10003;</span>
                        <div><strong>Social Health Insurance Fund (SHIF):</strong> Covers secondary and tertiary inpatient hospital stays, major surgeries, specialized clinical reviews, and diagnostic imaging across Level 4 to Level 6 facilities.</div>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="text-green mt-1">&#10003;</span>
                        <div><strong>Emergency, Chronic & Critical Illness Fund (ECCIF):</strong> Manages high-cost medical treatments, including intensive care unit (ICU) admissions, oncology/cancer care, renal dialysis, and emergency evacuations.</div>
                    </li>
                </ul>
            </div>

            {{-- Section 2 --}}
            <div class="bg-white p-6 md:p-8 rounded-2xl border border-gray-200 shadow-sm space-y-4">
                <h2 class="text-xl md:text-2xl font-bold text-green-dark flex items-center gap-2">
                    <span class="w-8 h-8 rounded-lg bg-green-50 text-green flex items-center justify-center text-sm font-extrabold">2</span> 
                    Family and Dependant Entitlements
                </h2>
                <p class="text-gray-600">
                    As a principal member under the TSC scheme, your medical cover extends to your immediate family based on verified regulatory guidelines:
                </p>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-2.5">
                        <span class="text-green mt-1">&#8226;</span>
                        <div><strong>Principal Member:</strong> One active post-primary teacher under TSC employment.</div>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="text-green mt-1">&#8226;</span>
                        <div><strong>Spouse:</strong> Exactly one legally recognized spouse, verified through valid marriage documentation or legal affidavits.</div>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="text-green mt-1">&#8226;</span>
                        <div><strong>Children:</strong> Up to five (5) biological or legally adopted children aged between 0 and 18 years. Eligibility extends up to 25 years provided the child is enrolled as a full-time student in an accredited educational institution.</div>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="text-green mt-1">&#8226;</span>
                        <div><strong>Persons Living with Disabilities (PWD):</strong> Certified dependants living with severe disabilities have no upper age limit restriction on their coverage.</div>
                    </li>
                </ul>
            </div>

            {{-- Section 3 --}}
            <div class="bg-white p-6 md:p-8 rounded-2xl border border-gray-200 shadow-sm space-y-4">
                <h2 class="text-xl md:text-2xl font-bold text-green-dark flex items-center gap-2">
                    <span class="w-8 h-8 rounded-lg bg-green-50 text-green flex items-center justify-center text-sm font-extrabold">3</span> 
                    Registration & Dependant Management Procedure
                </h2>
                <p class="text-gray-600">
                    Teachers seeking to update records, register new dependants, or check status compliance should utilize official channels:
                </p>
                <ol class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-gray-100 text-gray-800 flex items-center justify-center text-xs font-bold">1</span>
                        <div><strong>USSD Code:</strong> Dial <code class="bg-gray-50 px-1.5 py-0.5 rounded border border-gray-200 text-green-dark font-mono font-bold">*147#</code> on your registered mobile number for quick account validations.</div>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-gray-100 text-gray-800 flex items-center justify-center text-xs font-bold">2</span>
                        <div><strong>Web Portal:</strong> Access the official portal at <a href="https://sha.go.ke" target="_blank" rel="noopener noreferrer" class="text-green underline font-semibold hover:text-green-dark">afyangu.go.ke / sha.go.ke</a> using your National Identity card number.</div>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-gray-100 text-gray-800 flex items-center justify-center text-xs font-bold">3</span>
                        <div><strong>Document Uploads:</strong> Ensure correct documents (birth certificates for children, marriage certificates, or NCPWD cards) are uploaded to avoid authorization delays during hospital visits.</div>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-gray-100 text-gray-800 flex items-center justify-center text-xs font-bold">4</span>
                        <div><strong>Spouse Updates:</strong> Note that replacing a registered spouse incurs a standard 30-day waiting period, except in bereavement cases supported by a valid death certificate.</div>
                    </li>
                </ol>
            </div>

            {{-- Section 4 --}}
            <div class="bg-white p-6 md:p-8 rounded-2xl border border-gray-200 shadow-sm space-y-4">
                <h2 class="text-xl md:text-2xl font-bold text-green-dark flex items-center gap-2">
                    <span class="w-8 h-8 rounded-lg bg-green-50 text-green flex items-center justify-center text-sm font-extrabold">4</span> 
                    Union Escalation & Support
                </h2>
                <p class="text-gray-600">
                    KUPPET Homabay Branch maintains an active liaison desk to assist members experiencing system rejections, delayed pre-authorizations, or unauthorized scheme deductions at any health facility.
                </p>
                <p class="text-gray-700">
                    If you encounter service hurdles or require union intervention regarding your healthcare rights, please visit the branch secretariat in Homabay Town or contact the <a href="{{ url('/bec-office') }}" class="text-green font-semibold underline hover:text-green-dark">Branch Executive Committee (BEC) Office</a> for immediate support.
                </p>
            </div>

        </div>

    </div>
</section>
@endsection