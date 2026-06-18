@extends('layouts.frontend')

@section('title', 'Omondi Churchill Aroko - Organising Secretary - KUPPET Homabay Branch')

@section('content')
<section class="bg-gray-light py-12 px-4 min-h-screen">
    <div class="container mx-auto max-w-5xl">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('bec.officials') }}" 
               class="inline-flex items-center gap-2 text-green hover:text-green-dark transition-colors font-semibold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to BEC
            </a>
        </div>

        <!-- Main Profile Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-green to-green-dark p-6 md:p-8 text-white">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <span class="text-xs font-bold tracking-widest uppercase text-gold">Branch Executive Committee</span>
                        <h1 class="text-2xl md:text-3xl font-bold mt-1">Organising Secretary</h1>
                        <p class="text-sm text-white/80">KUPPET Homabay Branch</p>
                    </div>
                </div>
            </div>

            <!-- Profile Content -->
            <div class="p-6 md:p-8">
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Left Column - Photo & Quick Info -->
                    <div class="lg:w-1/3 flex-shrink-0">
                        <div class="sticky top-8">
                            <!-- Main Photo -->
                            <div class="w-full rounded-xl border-4 border-gold shadow-lg overflow-hidden bg-gray-100" style="max-height: 400px;">
                                <img src="{{ asset('assets/images/profiles/churchill-aroko-1.jpg') }}" 
                                     alt="Omondi Churchill Aroko" 
                                     class="w-full h-full object-cover object-top">
                            </div>
                            
                            <!-- Name & Position -->
                            <div class="mt-4 text-center lg:text-left">
                                <h2 class="text-xl font-bold text-gray-900">Omondi Churchill Aroko</h2>
                                <p class="text-green font-semibold text-sm">Organising Secretary</p>
                            </div>

                            <!-- Contact Info -->
                            <div class="mt-4 space-y-2 text-sm">
                                <div class="flex items-center gap-3 text-gray-600">
                                    <svg class="w-4 h-4 text-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    <span>organising@kuppethomabay.or.ke</span>
                                </div>
                                <div class="flex items-center gap-3 text-gray-600">
                                    <svg class="w-4 h-4 text-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    <span>0729683807</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Details -->
                    <div class="lg:w-2/3">
                        <!-- Biography -->
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">
                                <span class="w-1 h-6 bg-green rounded-full"></span>
                                Biography
                            </h3>
                            <div class="space-y-3 text-gray-600 text-sm leading-relaxed">
                                <p>
                                    <strong class="text-gray-800">Omondi Churchill Aroko</strong> is a dedicated and passionate unionist currently serving as the <strong class="text-gray-800">Organising Secretary</strong> of the KUPPET Homabay Branch. With a strong commitment to the welfare and professional development of post-primary education teachers, he plays a pivotal role in the branch's leadership team.
                                </p>
                                <p>
                                    As Organising Secretary, Churchill brings exceptional organizational skills and a deep understanding of union operations. He is known for his ability to mobilize members and coordinate activities that advance the union's objectives. His proactive approach to information dissemination ensures that all members and stakeholders are well-informed about union activities, programs, and initiatives.
                                </p>
                                <p>
                                    Churchill's dedication to the teaching profession and the union movement is evident in his hands-on approach to organizing events, preparing venues for meetings, and coordinating press conferences. He ensures that the branch's voice is heard through effective communication strategies and media engagement.
                                </p>
                                <p>
                                    A respected member of the <strong class="text-gray-800">Teachers Affairs Committee</strong>, Churchill contributes meaningfully to policy discussions and decisions that affect the teaching profession. His collaborative spirit and commitment to service make him an invaluable asset to the KUPPET Homabay Branch Executive Committee.
                                </p>
                            </div>
                        </div>

                        <!-- Duties and Functions -->
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                                <span class="w-1 h-6 bg-gold rounded-full"></span>
                                Duties and Functions
                            </h3>
                            <div class="space-y-3">
                                <div class="flex items-start gap-3 p-3 bg-gray-light/50 rounded-lg hover:bg-gray-light transition-colors">
                                    <span class="flex-shrink-0 w-6 h-6 bg-green/10 rounded-full flex items-center justify-center text-green text-xs font-bold">1</span>
                                    <div>
                                        <p class="text-gray-700 text-sm font-medium">Information Dissemination</p>
                                        <p class="text-gray-600 text-xs">Disseminates information regarding Union activities to members and stakeholders, ensuring timely and accurate communication of all union matters.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3 p-3 bg-gray-light/50 rounded-lg hover:bg-gray-light transition-colors">
                                    <span class="flex-shrink-0 w-6 h-6 bg-green/10 rounded-full flex items-center justify-center text-green text-xs font-bold">2</span>
                                    <div>
                                        <p class="text-gray-700 text-sm font-medium">Event Coordination</p>
                                        <p class="text-gray-600 text-xs">Coordinates and prepares venues for meetings and official Union events, ensuring all logistics are handled professionally.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3 p-3 bg-gray-light/50 rounded-lg hover:bg-gray-light transition-colors">
                                    <span class="flex-shrink-0 w-6 h-6 bg-green/10 rounded-full flex items-center justify-center text-green text-xs font-bold">3</span>
                                    <div>
                                        <p class="text-gray-700 text-sm font-medium">Media Coordination</p>
                                        <p class="text-gray-600 text-xs">Organizes venues for broadcasts and coordinates press conferences, facilitating effective media engagement for the branch.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Committees -->
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                                <span class="w-1 h-6 bg-green-dark rounded-full"></span>
                                Committees
                            </h3>
                            <div class="flex flex-wrap gap-2">
                                <span class="inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-green/5 to-green/10 rounded-lg text-sm font-medium text-gray-700 border border-green/20">
                                    <svg class="w-4 h-4 text-gold" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd"/>
                                    </svg>
                                    Teachers Affairs Committee <span class="text-xs text-gray-500 font-normal">(Member)</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection