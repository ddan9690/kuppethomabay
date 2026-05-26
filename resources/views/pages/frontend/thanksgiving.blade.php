@extends('layouts.frontend')

@section('title', 'KUPPET Homa Bay Thanksgiving Ceremony & Fundraiser')

@section('content')
    <section
        class="relative bg-gradient-to-br from-green-dark via-green to-green-dark text-white py-16 px-4 overflow-hidden border-b-4 border-gold">
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                <defs>
                    <pattern id="grid" width="20" height="20" patternUnits="userSpaceOnUse">
                        <path d="M 20 0 L 0 0 0 20" fill="none" stroke="#C8A265" stroke-width="0.5" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        <div class="container mx-auto max-w-5xl text-center relative z-10">
            <div class="flex justify-center mb-6">
                <img src="{{ asset('assets/images/thanksgiving/kuppet-hb-logo.png') }}" alt="KUPPET Homa Bay Logo"
                    class="h-24 md:h-28 object-contain bg-white p-2 rounded-full shadow-xl ring-4 ring-gold/50">
            </div>

            <h4 class="text-xs md:text-sm tracking-widest uppercase font-bold text-gold mb-2">
                Kenya Union of Post Primary Education Teachers
            </h4>
            <h3 class="text-lg md:text-xl font-semibold tracking-wider text-white mb-6 uppercase">
                Homa Bay Branch
            </h3>

            <div class="inline-block bg-green-dark/40 backdrop-blur-sm border border-gold/30 px-6 py-2 rounded-full mb-4">
                <span class="text-gold font-serif italic text-lg md:text-xl">An Invitation to All KUPPET Members</span>
            </div>

            <h1
                class="text-4xl md:text-6xl font-black tracking-tight uppercase leading-none text-white drop-shadow-md mb-2">
                Thanksgiving Day <span class="text-gold">&amp; Fundraiser</span>
            </h1>

            <p class="text-white/80 text-sm md:text-base max-w-xl mx-auto mt-4 font-light">
                Join us as we celebrate our milestones and unite for a collective vision towards completing the landmark
                KUPPET Centre.
            </p>

            <div x-data="{
                targetDate: new Date('2026-05-30T08:30:00').getTime(),
                days: 0,
                hours: 0,
                minutes: 0,
                seconds: 0,
                init() {
                    setInterval(() => {
                        let now = new Date().getTime();
                        let diff = this.targetDate - now;
                        if (diff > 0) {
                            this.days = Math.floor(diff / (1000 * 60 * 60 * 24));
                            this.hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            this.minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                            this.seconds = Math.floor((diff % (1000 * 60)) / 1000);
                        }
                    }, 1000);
                }
            }"
                class="flex justify-center items-center gap-3 md:gap-4 mt-10 max-w-md mx-auto bg-black/30 p-4 rounded-2xl border border-white/10 backdrop-blur-md">
                <div class="text-center w-16">
                    <span x-text="days" class="block text-2xl md:text-3xl font-bold text-gold">0</span>
                    <span class="text-[10px] uppercase tracking-wider text-white/70">Days</span>
                </div>
                <span class="text-gold font-bold text-xl mb-4">:</span>
                <div class="text-center w-16">
                    <span x-text="hours" class="block text-2xl md:text-3xl font-bold text-white">0</span>
                    <span class="text-[10px] uppercase tracking-wider text-white/70">Hrs</span>
                </div>
                <span class="text-gold font-bold text-xl mb-4">:</span>
                <div class="text-center w-16">
                    <span x-text="minutes" class="block text-2xl md:text-3xl font-bold text-white">0</span>
                    <span class="text-[10px] uppercase tracking-wider text-white/70">Min</span>
                </div>
                <span class="text-gold font-bold text-xl mb-4">:</span>
                <div class="text-center w-16">
                    <span x-text="seconds" class="block text-2xl md:text-3xl font-bold text-white">0</span>
                    <span class="text-[10px] uppercase tracking-wider text-white/70">Sec</span>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-light py-8 -mt-6 relative z-20 px-4">
        <div
            class="container mx-auto max-w-5xl grid grid-cols-1 md:grid-cols-3 gap-4 shadow-lg rounded-xl overflow-hidden bg-white p-4 border border-gray/20">
            <div class="flex items-center p-4 bg-gray-light/50 rounded-xl border-l-4 border-green">
                <div class="p-3 bg-green rounded-lg text-white mr-4 shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <div>
                    <span class="text-xs uppercase tracking-wider text-gray shadow-none block font-semibold">When</span>
                    <p class="text-gray-dark font-bold">Saturday, 30th May 2026</p>
                    <p class="text-xs text-gray-dark/70">Starting from 8:30 A.M.</p>
                </div>
            </div>

            <div class="flex items-center p-4 bg-gold/10 rounded-xl border-l-4 border-gold">
                <div class="p-3 bg-gold rounded-lg text-white mr-4 shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <div>
                    <span class="text-xs uppercase tracking-wider text-gray block font-semibold">Where</span>
                    <p class="text-gray-dark font-bold">Raila Odinga Stadium</p>
                    <p class="text-xs text-gray-dark/70">Homa Bay Town</p>
                </div>
            </div>

            <div class="flex items-center p-4 bg-gray-light/50 rounded-xl border-l-4 border-green-dark">
                <div class="p-3 bg-green-dark rounded-lg text-white mr-4 shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                </div>
                <div>
                    <span class="text-xs uppercase tracking-wider text-gray block font-semibold">Transport Logistics</span>
                    <p class="text-gray-dark text-sm font-medium">Coordinated via Sub-County Welfare & BBF Representatives.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 px-4 bg-white">
        <div class="container mx-auto max-w-5xl">
            <div class="text-center mb-12">
                <span class="text-green font-bold tracking-widest text-xs uppercase block mb-1">Leadership Profile</span>
                <h2 class="text-3xl font-extrabold text-gray-900">Key Guests & Organizers</h2>
                <div class="w-16 h-1 bg-gold mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-stretch">
                <div
                    class="bg-gradient-to-b from-gray-light to-white border border-gray/20 rounded-2xl shadow-xl overflow-hidden flex flex-col justify-between transform transition hover:-translate-y-1 duration-300">
                    <div
                        class="relative group overflow-hidden bg-gray aspect-[4/3] md:aspect-[1/1] flex items-center justify-center">
                        <img src="{{ asset('assets/images/thanksgiving/john-mbadi.jpeg') }}"
                            alt="FCPA Hon. John Mbadi Ng'ongo"
                            class="w-full h-full object-cover object-top transition duration-500 group-hover:scale-105">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end p-6">
                            <div>
                                <span
                                    class="bg-gold text-gray-dark font-bold text-xs uppercase px-3 py-1 rounded-full shadow-md tracking-wider">
                                    Chief Guest
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-gray-dark tracking-tight leading-tight mb-2">
                                FCPA Hon. John Mbadi Ng'ongo, EGH
                            </h3>
                            <p class="text-green-dark text-sm font-semibold tracking-wide uppercase mb-4">
                                Cabinet Secretary, The National Treasury and Economic Planning
                            </p>
                            <p class="text-gray-dark/80 text-sm leading-relaxed">
                                We are profoundly privileged to be graced by the Cabinet Secretary, who alongside other
                                prominent national leaders, will champion our definitive <strong
                                    class="text-green font-bold">Fundraising Drive</strong> aimed explicitly at
                                accelerating the structural completion of the ultra-modern <strong
                                    class="text-gold-dark font-bold">KUPPET Centre</strong>.
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-gradient-to-b from-gray-light to-white border border-gray/20 rounded-2xl shadow-xl overflow-hidden flex flex-col justify-between transform transition hover:-translate-y-1 duration-300">
                    <div
                        class="relative group overflow-hidden bg-gray aspect-[4/3] md:aspect-[1/1] max-h-[380px] sm:max-h-[450px] md:max-h-none flex items-center justify-center">
                        <img src="{{ asset('assets/images/thanksgiving/tom-odhiambo.jpg') }}" alt="Tom Thomas Odhiambo"
                            class="w-full h-full object-cover object-top transition duration-500 group-hover:scale-105">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end p-6">
                            <div>
                                <span
                                    class="bg-green text-white font-bold text-xs uppercase px-3 py-1 rounded-full shadow-md tracking-wider">
                                    Host
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-gray-dark tracking-tight leading-tight mb-2">
                                Mr. Tom Thomas Odhiambo
                            </h3>
                            <p class="text-green-dark text-sm font-semibold tracking-wide uppercase mb-4">
                                Executive Secretary, KUPPET Homa Bay Branch
                            </p>
                            <p class="text-gray-dark/80 text-sm leading-relaxed">
                                On behalf of the Branch Executive Committee (BGC), your Executive Secretary cordially calls
                                upon all regional delegates, branch stakeholders, and valued educators to come out in large
                                numbers to secure our union's future.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 px-4 bg-gray-light border-t border-b border-gray/20" x-data="{ currentTab: 'morning' }">
        <div class="container mx-auto max-w-3xl">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-gray-dark uppercase">Program Outline</h3>
                <p class="text-sm text-gray font-medium">Saturday Timeline At A Glance</p>
            </div>

            <div class="flex justify-center border-b border-gray/30 mb-6">
                <button @click="currentTab = 'morning'"
                    :class="currentTab === 'morning' ? 'border-green text-green font-bold' :
                        'border-transparent text-gray hover:text-gray-dark'"
                    class="px-6 py-2 border-b-2 text-sm transition-all focus:outline-none">Morning Session</button>
                <button @click="currentTab = 'midday'"
                    :class="currentTab === 'midday' ? 'border-green text-green font-bold' :
                        'border-transparent text-gray hover:text-gray-dark'"
                    class="px-6 py-2 border-b-2 text-sm transition-all focus:outline-none">Main Agenda</button>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray/20">
                <div x-show="currentTab === 'morning'" class="space-y-4">
                    <div class="flex gap-4 items-start pb-4 border-b border-gray-light">
                        <span class="bg-green/10 text-green font-bold text-xs px-3 py-1 rounded">08:30 AM</span>
                        <div>
                            <h4 class="font-bold text-gray-dark">Arrival & Assembly</h4>
                            <p class="text-sm text-gray-dark/70">Delegates, guests, and union members arrive at Raila
                                Odinga Stadium.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 items-start">
                        <span class="bg-green/10 text-green font-bold text-xs px-3 py-1 rounded">09:30 AM</span>
                        <div>
                            <h4 class="font-bold text-gray-dark">Thanksgiving Devotion & Welcoming Remarks</h4>
                            <p class="text-sm text-gray-dark/70">Opening prayers followed directly by introductory
                                addresses from the BGC panel.</p>
                        </div>
                    </div>
                </div>

                <div x-show="currentTab === 'midday'" class="space-y-4" x-cloak>
                    <div class="flex gap-4 items-start pb-4 border-b border-gray-light">
                        <span class="bg-gold/20 text-gold-dark font-bold text-xs px-3 py-1 rounded">11:00 AM</span>
                        <div>
                            <h4 class="font-bold text-gray-dark">Address by Host & Key Stakeholders</h4>
                            <p class="text-sm text-gray-dark/70">Key addresses from Executive Secretary Mr. Tom Odhiambo
                                and local leadership.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 items-start">
                        <span class="bg-green/10 text-green font-bold text-xs px-3 py-1 rounded">12:30 PM</span>
                        <div>
                            <h4 class="font-bold text-gray-dark">Fundraising Drive & Keynote Speech</h4>
                            <p class="text-sm text-gray-dark/70">Led by Chief Guest FCPA Hon. John Mbadi Ng'ongo towards
                                completion of the KUPPET Centre.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gradient-to-br from-green-dark to-gray-dark py-14 px-4 text-white" x-data="{ rsvpStatus: false }">
        <div class="container mx-auto max-w-4xl text-center">
            <div class="inline-block p-3 bg-gold/10 rounded-full border border-gold/20 text-gold mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>
                </svg>
            </div>
            <h2 class="text-2xl md:text-4xl font-extrabold uppercase tracking-tight text-white">
                The Purpose: Building The <span class="text-gold">KUPPET Centre</span>
            </h2>
            <p class="text-gray-light/80 mt-4 max-w-2xl mx-auto leading-relaxed text-sm md:text-base">
                Every post-primary education worker's professional hub is getting its final foundation completed. Our
                flagship structure requires our unified presence and financial drive to realize total operational
                self-reliance.
            </p>

            <div class="mt-8 max-w-md mx-auto bg-white/10 border border-white/10 backdrop-blur p-6 rounded-2xl">
                <template x-if="!rsvpStatus">
                    <div>
                        <p class="text-sm text-gray-light mb-4">Will you be joining your fellow union colleagues?</p>
                        <button @click="rsvpStatus = true"
                            class="bg-gold text-gray-dark font-bold px-6 py-2.5 rounded-xl hover:bg-gold-dark transition shadow-md w-full">
                            Yes, I Will Attend!
                        </button>
                    </div>
                </template>
                <template x-if="rsvpStatus">
                    <div class="text-center py-2">
                        <span class="text-gold text-lg font-bold block mb-1">🎉 Confirmation Logged!</span>
                        <p class="text-xs text-white/90">Thank you for committing to support the branch development
                            framework.</p>
                    </div>
                </template>
            </div>

            <div class="mt-8">
                <span class="block text-gold uppercase tracking-widest text-xs font-bold mb-3">RSVP Status</span>
                <div
                    class="inline-flex bg-green-dark border border-white/20 rounded-xl px-6 py-3 font-serif italic text-lg shadow-inner text-gray-light">
                    "Yours in Service — BGC KUPPET HB"
                </div>
            </div>

            <div class="mt-8 block text-center">
                <span
                    class="inline-block bg-gold text-gray-dark text-xs font-black tracking-widest uppercase px-6 py-2.5 rounded-full shadow-lg">
                    PURPOSE TO ATTEND!
                </span>
            </div>
        </div>
    </section>
@endsection
