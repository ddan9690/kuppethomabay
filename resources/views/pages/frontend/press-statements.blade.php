@extends('layouts.frontend')

@section('title', 'Press Statements & Releases - KUPPET Homabay Branch')

@section('content')
<section class="bg-gray-light py-12 px-4 min-h-screen" x-data="pressStatements()">
    <div class="container mx-auto max-w-6xl">
        <!-- Page Header -->
        <div class="text-center mb-12">
            {{-- <span class="text-green font-bold tracking-widest text-xs uppercase block mb-1">Official Communications</span> --}}
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">Press Statements &amp; Releases</h1>
            <div class="w-16 h-1 bg-gold mx-auto mt-3 rounded-full"></div>
        </div>

        <!-- Press Statements List -->
        <div class="space-y-6">
            <template x-for="(statement, index) in paginatedStatements" :key="index">
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow border border-gray-100">
                    <div class="p-6 md:p-8">
                        <div class="flex flex-col gap-4">
                            <div>
                                <div class="flex flex-wrap items-center gap-3 mb-2">
                                    <span class="bg-red-600 text-white text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wide" x-text="statement.type"></span>
                                    <span class="text-sm text-gray-500 font-medium" x-text="statement.date"></span>
                                </div>
                                <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-3" x-text="statement.title"></h2>
                                
                                <!-- Short Preview -->
                                <p class="text-gray-600 text-sm leading-relaxed" x-show="!statement.expanded" x-text="statement.preview"></p>
                                
                                <!-- Full Content -->
                                <div x-show="statement.expanded" x-transition.duration.300ms>
                                    <div class="text-gray-600 text-sm leading-relaxed whitespace-pre-line" x-text="statement.fullContent"></div>
                                </div>
                            </div>
                            
                            <!-- Read More / Show Less Button -->
                            <div class="flex justify-center md:justify-start">
                                <button @click="toggleStatement(index)" 
                                        class="inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-green text-white font-semibold text-sm rounded-lg hover:bg-green-dark transition-colors shadow-md hover:shadow-lg w-full md:w-auto">
                                    <span x-text="statement.expanded ? 'Show Less' : 'Read More'"></span>
                                    <svg class="w-4 h-4" :class="statement.expanded ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-10" x-show="totalPages > 1">
            <nav class="flex items-center gap-2">
                <button @click="previousPage" 
                        class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 hover:bg-gray-50 transition-colors"
                        :disabled="currentPage === 1"
                        :class="currentPage === 1 ? 'opacity-50 cursor-not-allowed' : ''">
                    Previous
                </button>
                
                <template x-for="page in totalPages" :key="page">
                    <button @click="goToPage(page)"
                            class="px-4 py-2 rounded-lg text-sm font-semibold transition-colors"
                            :class="currentPage === page ? 'bg-green text-white' : 'border border-gray-200 text-gray-600 hover:bg-gray-50'">
                        <span x-text="page"></span>
                    </button>
                </template>
                
                <button @click="nextPage" 
                        class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 hover:bg-gray-50 transition-colors"
                        :disabled="currentPage === totalPages"
                        :class="currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : ''">
                    Next
                </button>
            </nav>
        </div>
    </div>
</section>

<script>
    function pressStatements() {
        return {
            currentPage: 1,
            itemsPerPage: 3,
            statements: [
                {
                    type: 'Press Statement',
                    date: '18 June 2026',
                    title: 'STATEMENT BY THE EXECUTIVE SECRETARY ON THE PROPOSED REVIEW OF THE CAREER PROGRESSION GUIDELINES (CPG)',
                    preview: 'As the Executive Secretary of Homa Bay KUPPET Branch, I wish to inform members that during yesterday\'s National Governing Council (NGC) online meeting, I presented the branch position on the ongoing review of the Career Progression Guidelines (CPG)...',
                    fullContent: `As the Executive Secretary of Homa Bay KUPPET Branch, I wish to inform members that during yesterday's National Governing Council (NGC) online meeting, I presented the branch position on the ongoing review of the Career Progression Guidelines (CPG). My submission was informed by the concerns, experiences, and expectations of teachers across Homa Bay County who have consistently expressed dissatisfaction with a promotion framework that has resulted in prolonged career stagnation despite years of dedicated service, satisfactory performance, and continuous professional development. While I appreciate the intention behind the introduction of the CPG, I firmly stated that the current framework requires substantial reforms to make it fair, transparent, and responsive to the realities facing teachers in the classroom.

In my presentation, I strongly advocated for the adoption of automatic promotion after every three years of satisfactory service within a grade. I argued that professional progression should be predictable and should recognize experience, competence, commitment, and performance. I noted that many teachers have remained in the same grades for extended periods because promotions have largely been tied to limited vacancies and competitive interviews. I therefore urged the Teachers Service Commission to embrace a progression system that rewards service and professional growth while restoring morale and motivation among teachers.

I further submitted that professional progression and leadership appointments are fundamentally different processes and should not be treated as one and the same. My position is that competitive interviews should be reserved for administrative positions such as Deputy Head Teacher, Deputy Principal, Head Teacher, Principal, and other leadership offices. I maintained that classroom teachers should not be subjected to interviews simply to move from one teaching grade to another. In my view, interviews are appropriate where managerial, supervisory, financial, and institutional leadership responsibilities are involved.

I also raised concerns regarding the inadequate recognition of academic advancement within the current framework. I informed the Council that many teachers invest significant personal resources in pursuing higher academic qualifications, including degrees, master's degrees, doctoral studies, and professional certifications. I therefore proposed that such qualifications should attract meaningful career progression benefits, salary recognition, and additional promotion consideration. I emphasized that recognizing academic achievement would encourage innovation, improve instructional quality, and strengthen professionalism within the teaching service.

Another key issue I presented was the need to establish a distinct career pathway for classroom teachers. I observed that the current framework creates the impression that meaningful career advancement can only be achieved through movement into administration. I argued that highly effective classroom teachers should have opportunities to progress professionally based on instructional excellence, mentorship, curriculum innovation, and learner achievement without necessarily leaving teaching to pursue management positions. I believe that classroom teaching should remain a respected and rewarding professional pathway in its own right.

I further called for greater consideration of teachers serving in hardship, marginalized, and remote areas. I pointed out that such teachers often work under difficult conditions and shoulder responsibilities that extend beyond ordinary classroom instruction. I therefore urged the Commission to incorporate mechanisms that recognize and reward service in challenging environments as part of a fair and equitable career progression framework.

Additionally, I proposed that teachers who have stagnated in the same grade for more than six years should be prioritized during promotions. I also called for greater transparency through the publication of annual promotion targets and statistics and recommended the institutionalization of regular consultations between the Teachers Service Commission and teacher unions whenever career progression policies are reviewed.

In conclusion, I informed the National Governing Council that the position presented by Homa Bay KUPPET Branch is anchored on fairness, predictability, transparency, and recognition of service. I reiterated my support for automatic promotion after every three years of satisfactory service and the reservation of competitive interviews for administrative positions only. I expressed confidence that these reforms would eliminate unnecessary stagnation, improve teacher morale, and create a more equitable and motivating career progression system for all teachers across the country.

Thomas Odhiambo
Executive Secretary
Homa Bay KUPPET Branch`,
                    expanded: false
                }
            ],
            
            get totalPages() {
                return Math.ceil(this.statements.length / this.itemsPerPage);
            },
            
            get paginatedStatements() {
                const start = (this.currentPage - 1) * this.itemsPerPage;
                const end = start + this.itemsPerPage;
                return this.statements.slice(start, end);
            },
            
            toggleStatement(index) {
                const actualIndex = (this.currentPage - 1) * this.itemsPerPage + index;
                this.statements[actualIndex].expanded = !this.statements[actualIndex].expanded;
            },
            
            goToPage(page) {
                if (page >= 1 && page <= this.totalPages) {
                    this.currentPage = page;
                }
            },
            
            previousPage() {
                if (this.currentPage > 1) {
                    this.currentPage--;
                }
            },
            
            nextPage() {
                if (this.currentPage < this.totalPages) {
                    this.currentPage++;
                }
            }
        }
    }
</script>
@endsection