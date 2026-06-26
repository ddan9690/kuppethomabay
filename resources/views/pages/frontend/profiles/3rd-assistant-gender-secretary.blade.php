@extends('layouts.frontend')

@section('title', 'Ann Blessing Inondi Otieno - 3rd Assistant Secretary (Gender) - KUPPET Homa Bay')

@section('content')
<section class="bg-slate-50 py-12 px-4 min-h-screen" x-data="{ activeTab: 'role' }">
    <div class="container mx-auto max-w-5xl">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('bec.officials') }}" 
               class="inline-flex items-center gap-2 text-slate-600 hover:text-blue-700 transition-colors font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back to BEC
            </a>
        </div>

        <!-- Main Profile Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <!-- Header -->
            <div class="bg-slate-900 p-8 text-white">
                <span class="text-xs font-bold tracking-widest uppercase text-blue-400">Branch Executive Committee</span>
                <h1 class="text-3xl font-bold mt-1">Ann Blessing Inondi Otieno</h1>
                <p class="text-blue-100 font-medium">3rd Assistant Secretary (Gender) | KUPPET Homa Bay Branch</p>
            </div>

            <div class="p-8">
                <div class="flex flex-col lg:flex-row gap-10">
                    
                    <!-- Sidebar -->
                    <div class="lg:w-1/3">
                        <div class="sticky top-8">
                            <div class="w-full aspect-square rounded-2xl shadow-md overflow-hidden bg-slate-200 border-2 border-white ring-1 ring-slate-200">
                                <img src="{{ asset('assets/images/profiles/ann-belssing.jpg') }}" 
                                     alt="Ann Blessing Inondi Otieno" 
                                     class="w-full h-full object-cover object-center">
                            </div>
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div class="lg:w-2/3">
                        <!-- Biography -->
                        <div class="mb-8">
                            <h2 class="text-xl font-bold text-slate-900 mb-4 flex items-center gap-2">
                                <span class="w-1.5 h-6 bg-blue-600 rounded-full"></span> Biography
                            </h2>
                            <div class="prose prose-slate max-w-none text-slate-600 text-sm leading-relaxed space-y-4">
                                <p>Ann Blessing Inondi Otieno is a dedicated teacher and union leader committed to the empowerment of the teaching fraternity. Serving as the <strong>3rd Assistant Secretary (Gender)</strong> for KUPPET Homa Bay, she is a staunch advocate for teacher welfare, gender mainstreaming, and professional excellence.</p>
                                <p>Her leadership approach centers on inclusivity and mentorship. By championing gender-responsive initiatives and youth-led programs, Ann ensures that the voices of all teachers—particularly young teachers are heard and nurtured within the union’s strategic framework.</p>
                            </div>
                        </div>

                        <!-- Interactive Duties Section -->
                        <div class="mb-8">
                            <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                                <span class="w-1.5 h-6 bg-slate-900 rounded-full"></span> Key Responsibilities
                            </h3>
                            
                            <!-- Tab Navigation -->
                            <div class="flex gap-2 mb-4 border-b border-slate-200">
                                <button @click="activeTab = 'role'" :class="activeTab === 'role' ? 'border-blue-600 text-blue-600' : 'border-transparent text-slate-500'" class="pb-2 px-2 border-b-2 font-medium text-sm transition">Gender & Youth</button>
                                <button @click="activeTab = 'finance'" :class="activeTab === 'finance' ? 'border-blue-600 text-blue-600' : 'border-transparent text-slate-500'" class="pb-2 px-2 border-b-2 font-medium text-sm transition">Finance Committee</button>
                            </div>

                            <!-- Tab Content -->
                            <div class="bg-blue-50 p-6 rounded-xl text-sm text-slate-700 min-h-[140px]" x-show="activeTab === 'role'">
                                <ul class="list-disc ml-4 space-y-2">
                                    <li>Coordinate youth programs and mentorship initiatives on behalf of the Branch Executive Committee.</li>
                                    <li>Support the Executive Secretary in developing gender-responsive policies.</li>
                                    <li>Promote inclusivity and address emerging social and professional challenges facing teachers.</li>
                                </ul>
                            </div>

                            <div class="bg-blue-50 p-6 rounded-xl text-sm text-slate-700 min-h-[140px]" x-show="activeTab === 'finance'">
                                <p>As a member of the Finance Committee, Ann ensures the fiscal health of the branch by:</p>
                                <ul class="list-disc ml-4 mt-2 space-y-2">
                                    <li>Participating in strategic budgeting and financial planning.</li>
                                    <li>Upholding the highest standards of accountability and transparency.</li>
                                    <li>Ensuring the prudent utilization of union resources for member welfare.</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Areas of Interest -->
                        <div>
                            <h3 class="text-sm font-bold text-slate-900 uppercase tracking-widest mb-3">Core Focus Areas</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach(['Teacher Welfare', 'Financial Literacy', 'Leadership Development', 'Mentorship', 'Gender Mainstreaming'] as $interest)
                                    <span class="px-3 py-1 bg-white border border-slate-200 rounded-full text-xs font-medium text-slate-600 shadow-sm">{{ $interest }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection