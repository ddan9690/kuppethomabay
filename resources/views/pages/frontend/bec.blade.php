@extends('layouts.frontend')

@section('title', 'Branch Executive Committee - KUPPET Homabay Branch')

@section('content')
<section class="bg-gray-light py-8 px-4">
    <div class="container mx-auto max-w-6xl">
        {{-- ── HEADER ── --}}
        <div class="text-center bg-white rounded-xl shadow-md p-8 mb-8 border-b-4 border-gold">
            <div class="flex justify-center mb-4">
                <div class="w-24 h-24 rounded-full border-2 border-green bg-white p-1.5 flex items-center justify-center shadow-lg">
                    <img src="{{ asset('assets/images/kuppet-logo.png') }}" 
                         alt="KUPPET Logo" 
                         class="w-full h-full object-contain rounded-full"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    <div style="display:none;" class="w-full h-full rounded-full bg-gray-100 flex items-center justify-center font-bold text-green text-lg">
                        KUPPET
                    </div>
                </div>
            </div>
            
            <span class="text-xs font-bold tracking-widest uppercase text-gold block mb-1">Homabay Branch</span>
            
            <h1 class="text-3xl md:text-4xl font-black text-gray-900">
                <span class="text-green">KUPPET</span>
            </h1>
            <p class="text-xs md:text-sm font-semibold tracking-wide text-gray-600 uppercase">Kenya Union of Post Primary Education Teachers</p>
            
            <div class="flex items-center justify-center gap-4 my-4 max-w-xs mx-auto">
                <div class="flex-1 h-0.5 bg-gradient-to-r from-transparent to-green"></div>
                <div class="w-2.5 h-2.5 bg-gold rotate-45 flex-shrink-0"></div>
                <div class="flex-1 h-0.5 bg-gradient-to-l from-transparent to-green"></div>
            </div>
            
            <span class="inline-block text-xs font-bold tracking-wider uppercase text-green bg-green/10 border border-green/20 px-4 py-1.5 rounded">
                Branch Executive Committee (BEC)
            </span>
        </div>

        {{-- ── HIERARCHY ── --}}
        @php
            $becBase = 'assets/images/bec-officials/';
        @endphp

        {{-- ══ EXECUTIVE SECRETARY ══ --}}
        <div class="flex justify-center mb-0">
            <div class="w-full max-w-[280px] bg-white rounded-xl border-2 border-gold shadow-lg p-6 text-center hover:shadow-xl transition-shadow">
                <div class="relative w-24 h-24 mx-auto mb-3">
                    <img src="{{ asset($becBase . 'Thomas-Odhiambo.png') }}" 
                         alt="Executive Secretary" 
                         class="w-full h-full rounded-full object-cover object-top bg-gray-100 border-2 border-gold"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    <div class="w-full h-full rounded-full bg-gray-100 border-2 border-gold flex items-center justify-center text-3xl text-gray-400" style="display:none;">👤</div>
                    <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-gold rounded-full border-2 border-white flex items-center justify-center text-white text-[10px] font-bold shadow-md">★</div>
                    <div class="absolute inset-0 rounded-full border-2 border-gold/30 pointer-events-none"></div>
                </div>
                <div class="text-xs font-bold tracking-wide uppercase text-gold mb-1">Executive Secretary</div>
                <div class="text-sm font-semibold text-gray-900">Thomas Odhiambo</div>
                <a href="{{ route('profile.thomas_odhiambo') }}" 
                   class="inline-block mt-3 px-4 py-1.5 text-[10px] font-bold tracking-wide uppercase text-gold border-2 border-gold rounded hover:bg-gold hover:text-white transition-colors">
                    View Profile
                </a>
            </div>
        </div>

        {{-- Connector --}}
        <div class="flex justify-center py-2">
            <div class="w-0.5 h-8 bg-gradient-to-b from-green to-green/30 relative">
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-2 h-2 bg-green rounded-full"></div>
            </div>
        </div>

        {{-- ══ CHAIRPERSON & TREASURER ══ --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-[600px] mx-auto">
            <div class="bg-white rounded-xl border-2 border-gold/50 shadow-md p-5 text-center hover:shadow-lg transition-shadow">
                <div class="relative w-20 h-20 mx-auto mb-3">
                    <img src="{{ asset($becBase . 'Peter-Otieno.png') }}" 
                         alt="Chairperson" 
                         class="w-full h-full rounded-full object-cover object-top bg-gray-100"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    <div class="w-full h-full rounded-full bg-gray-100 flex items-center justify-center text-3xl text-gray-400" style="display:none;">👤</div>
                    <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-gold rounded-full border-2 border-white flex items-center justify-center text-white text-[10px] font-bold shadow-md">I</div>
                    <div class="absolute inset-0 rounded-full border-2 border-gold/30 pointer-events-none"></div>
                </div>
                <div class="text-xs font-bold tracking-wide uppercase text-gold mb-1">Chairperson</div>
                <div class="text-sm font-semibold text-gray-900">Peter Otieno</div>
                <a href="{{ route('profile.peter_otieno') }}" 
                   class="inline-block mt-3 px-4 py-1.5 text-[10px] font-bold tracking-wide uppercase text-gold border-2 border-gold rounded hover:bg-gold hover:text-white transition-colors">
                    View Profile
                </a>
            </div>
            
            <div class="bg-white rounded-xl border-2 border-gold/50 shadow-md p-5 text-center hover:shadow-lg transition-shadow">
                <div class="relative w-20 h-20 mx-auto mb-3">
                    <img src="{{ asset($becBase . 'Tembo-Mwadime.png') }}" 
                         alt="Treasurer" 
                         class="w-full h-full rounded-full object-cover object-top bg-gray-100"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    <div class="w-full h-full rounded-full bg-gray-100 flex items-center justify-center text-3xl text-gray-400" style="display:none;">👤</div>
                    <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-gold rounded-full border-2 border-white flex items-center justify-center text-white text-[10px] font-bold shadow-md">II</div>
                    <div class="absolute inset-0 rounded-full border-2 border-gold/30 pointer-events-none"></div>
                </div>
                <div class="text-xs font-bold tracking-wide uppercase text-gold mb-1">Treasurer</div>
                <div class="text-sm font-semibold text-gray-900">Tembo Mwadime</div>
                <a href="{{ route('profile.tembo_mwadime') }}" 
                   class="inline-block mt-3 px-4 py-1.5 text-[10px] font-bold tracking-wide uppercase text-gold border-2 border-gold rounded hover:bg-gold hover:text-white transition-colors">
                    View Profile
                </a>
            </div>
        </div>

        {{-- Connector --}}
        <div class="flex justify-center py-2">
            <div class="w-0.5 h-8 bg-gradient-to-b from-green to-green/30 relative">
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-2 h-2 bg-green rounded-full"></div>
            </div>
        </div>

        {{-- ══ VICE CHAIRPERSON & ASSISTANT TREASURER ══ --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-[600px] mx-auto">
            <div class="bg-white rounded-xl border border-gray-200 shadow-md p-5 text-center hover:shadow-lg transition-shadow hover:border-green">
                <div class="relative w-20 h-20 mx-auto mb-3">
                    <img src="{{ asset($becBase . 'Richard-Otieno.png') }}" 
                         alt="Vice Chairperson" 
                         class="w-full h-full rounded-full object-cover object-top bg-gray-100"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    <div class="w-full h-full rounded-full bg-gray-100 flex items-center justify-center text-3xl text-gray-400" style="display:none;">👤</div>
                    <div class="absolute inset-0 rounded-full border-2 border-green/20 pointer-events-none"></div>
                </div>
                <div class="text-xs font-bold tracking-wide uppercase text-green mb-1">Vice Chairperson</div>
                <div class="text-sm font-semibold text-gray-900">Richard Otieno</div>
                <a href="{{ route('profile.richard_otieno') }}" 
                   class="inline-block mt-3 px-4 py-1.5 text-[10px] font-bold tracking-wide uppercase text-green border-2 border-green rounded hover:bg-green hover:text-white transition-colors">
                    View Profile
                </a>
            </div>
            
            <div class="bg-white rounded-xl border border-gray-200 shadow-md p-5 text-center hover:shadow-lg transition-shadow hover:border-green">
                <div class="relative w-20 h-20 mx-auto mb-3">
                    <img src="{{ asset($becBase . 'Felix-Oduor.jpg') }}" 
                         alt="Assistant Treasurer" 
                         class="w-full h-full rounded-full object-cover object-top bg-gray-100"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    <div class="w-full h-full rounded-full bg-gray-100 flex items-center justify-center text-3xl text-gray-400" style="display:none;">👤</div>
                    <div class="absolute inset-0 rounded-full border-2 border-green/20 pointer-events-none"></div>
                </div>
                <div class="text-xs font-bold tracking-wide uppercase text-green mb-1">Assistant Treasurer</div>
                <div class="text-sm font-semibold text-gray-900">Felix Oduor</div>
                <a href="{{ route('profile.felix_odour') }}" 
                   class="inline-block mt-3 px-4 py-1.5 text-[10px] font-bold tracking-wide uppercase text-green border-2 border-green rounded hover:bg-green hover:text-white transition-colors">
                    View Profile
                </a>
            </div>
        </div>

        {{-- Connector --}}
        <div class="flex justify-center py-2">
            <div class="w-0.5 h-8 bg-gradient-to-b from-green to-green/30 relative">
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-2 h-2 bg-green rounded-full"></div>
            </div>
        </div>

        {{-- ══ ASST EXEC SECRETARY & ORGANISING SEC ══ --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-[600px] mx-auto">
            <div class="bg-white rounded-xl border border-gray-200 shadow-md p-5 text-center hover:shadow-lg transition-shadow hover:border-green">
                <div class="relative w-20 h-20 mx-auto mb-3">
                    <img src="{{ asset($becBase . "Kennedy-Atang'a.png") }}" 
                         alt="Asst Executive Secretary" 
                         class="w-full h-full rounded-full object-cover object-top bg-gray-100"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    <div class="w-full h-full rounded-full bg-gray-100 flex items-center justify-center text-3xl text-gray-400" style="display:none;">👤</div>
                    <div class="absolute inset-0 rounded-full border-2 border-green/20 pointer-events-none"></div>
                </div>
                <div class="text-xs font-bold tracking-wide uppercase text-green mb-1">Asst. Executive Secretary</div>
                <div class="text-sm font-semibold text-gray-900">Kennedy Atang'a</div>
                <a href="{{ route('profile.kennedy_atanga') }}" 
                   class="inline-block mt-3 px-4 py-1.5 text-[10px] font-bold tracking-wide uppercase text-green border-2 border-green rounded hover:bg-green hover:text-white transition-colors">
                    View Profile
                </a>
            </div>
            
            <div class="bg-white rounded-xl border border-gray-200 shadow-md p-5 text-center hover:shadow-lg transition-shadow hover:border-green">
                <div class="relative w-20 h-20 mx-auto mb-3">
                    <img src="{{ asset($becBase . 'Churchill-Aroko.jpg') }}" 
                         alt="Organising Secretary" 
                         class="w-full h-full rounded-full object-cover object-top bg-gray-100"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    <div class="w-full h-full rounded-full bg-gray-100 flex items-center justify-center text-3xl text-gray-400" style="display:none;">👤</div>
                    <div class="absolute inset-0 rounded-full border-2 border-green/20 pointer-events-none"></div>
                </div>
                <div class="text-xs font-bold tracking-wide uppercase text-green mb-1">Organising Secretary</div>
                <div class="text-sm font-semibold text-gray-900">Churchill Aroko</div>
                <a href="{{ route('profile.churchill_aroko') }}" 
                   class="inline-block mt-3 px-4 py-1.5 text-[10px] font-bold tracking-wide uppercase text-green border-2 border-green rounded hover:bg-green hover:text-white transition-colors">
                    View Profile
                </a>
            </div>
        </div>

        {{-- Connector --}}
        <div class="flex justify-center py-2">
            <div class="w-0.5 h-8 bg-gradient-to-b from-green to-green/30 relative">
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-2 h-2 bg-green rounded-full"></div>
            </div>
        </div>

        {{-- ══ SECTORAL SECRETARIES ══ --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-[820px] mx-auto">
            <div class="bg-white rounded-xl border border-gray-200 shadow-md p-5 text-center hover:shadow-lg transition-shadow hover:border-green">
                <div class="relative w-20 h-20 mx-auto mb-3">
                    <img src="{{ asset($becBase . 'Kennedy-Osewe.png') }}" 
                         alt="Secretary Secondary" 
                         class="w-full h-full rounded-full object-cover object-top bg-gray-100"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    <div class="w-full h-full rounded-full bg-gray-100 flex items-center justify-center text-3xl text-gray-400" style="display:none;">👤</div>
                    <div class="absolute inset-0 rounded-full border-2 border-green/20 pointer-events-none"></div>
                </div>
                <div class="text-xs font-bold tracking-wide uppercase text-green mb-1">Secretary, Secondary</div>
                <div class="text-sm font-semibold text-gray-900">Kennedy Osewe</div>
                <a href="{{ route('profile.kennedy_osewe') }}" 
                   class="inline-block mt-3 px-4 py-1.5 text-[10px] font-bold tracking-wide uppercase text-green border-2 border-green rounded hover:bg-green hover:text-white transition-colors">
                    View Profile
                </a>
            </div>
            
            <div class="bg-white rounded-xl border border-gray-200 shadow-md p-5 text-center hover:shadow-lg transition-shadow hover:border-green">
                <div class="relative w-20 h-20 mx-auto mb-3">
                    <img src="{{ asset($becBase . 'Philip-Adede.png') }}" 
                         alt="Secretary Junior School" 
                         class="w-full h-full rounded-full object-cover object-top bg-gray-100"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    <div class="w-full h-full rounded-full bg-gray-100 flex items-center justify-center text-3xl text-gray-400" style="display:none;">👤</div>
                    <div class="absolute inset-0 rounded-full border-2 border-green/20 pointer-events-none"></div>
                </div>
                <div class="text-xs font-bold tracking-wide uppercase text-green mb-1">Secretary, Junior School</div>
                <div class="text-sm font-semibold text-gray-900">Philip Adede</div>
                <a href="{{ route('profile.philip_adede') }}" 
                   class="inline-block mt-3 px-4 py-1.5 text-[10px] font-bold tracking-wide uppercase text-green border-2 border-green rounded hover:bg-green hover:text-white transition-colors">
                    View Profile
                </a>
            </div>
            
            <div class="bg-white rounded-xl border border-gray-200 shadow-md p-5 text-center hover:shadow-lg transition-shadow hover:border-green">
                <div class="relative w-20 h-20 mx-auto mb-3">
                    <img src="{{ asset($becBase . 'Lucas-Okinda.png') }}" 
                         alt="Secretary Tertiary" 
                         class="w-full h-full rounded-full object-cover object-top bg-gray-100"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    <div class="w-full h-full rounded-full bg-gray-100 flex items-center justify-center text-3xl text-gray-400" style="display:none;">👤</div>
                    <div class="absolute inset-0 rounded-full border-2 border-green/20 pointer-events-none"></div>
                </div>
                <div class="text-xs font-bold tracking-wide uppercase text-green mb-1">Secretary, Tertiary</div>
                <div class="text-sm font-semibold text-gray-900">Lucas Okinda</div>
                <a href="{{ route('profile.lucas_okinda') }}" 
                   class="inline-block mt-3 px-4 py-1.5 text-[10px] font-bold tracking-wide uppercase text-green border-2 border-green rounded hover:bg-green hover:text-white transition-colors">
                    View Profile
                </a>
            </div>
        </div>

        {{-- Connector --}}
        <div class="flex justify-center py-2">
            <div class="w-0.5 h-8 bg-gradient-to-b from-green to-green/30 relative">
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-2 h-2 bg-green rounded-full"></div>
            </div>
        </div>

        {{-- ══ GENDER DESK ══ --}}
        <div class="flex justify-center mb-6">
            <div class="w-full max-w-[280px] bg-white rounded-xl border-2 border-gold/50 shadow-md p-5 text-center hover:shadow-lg transition-shadow">
                <div class="relative w-20 h-20 mx-auto mb-3">
                    <img src="{{ asset($becBase . 'Rose-Okeyo.png') }}" 
                         alt="Gender Secretary" 
                         class="w-full h-full rounded-full object-cover object-top bg-gray-100 border-2 border-gold/30"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    <div class="w-full h-full rounded-full bg-gray-100 border-2 border-gold/30 flex items-center justify-center text-3xl text-gray-400" style="display:none;">👤</div>
                    <div class="absolute inset-0 rounded-full border-2 border-gold/30 pointer-events-none"></div>
                </div>
                <div class="text-xs font-bold tracking-wide uppercase text-gold mb-1">Gender Secretary</div>
                <div class="text-sm font-semibold text-gray-900">Rose Okeyo</div>
                <a href="{{ route('profile.rose_okeyo') }}" 
                   class="inline-block mt-3 px-4 py-1.5 text-[10px] font-bold tracking-wide uppercase text-gold border-2 border-gold rounded hover:bg-gold hover:text-white transition-colors">
                    View Profile
                </a>
            </div>
        </div>

        {{-- Connector --}}
        <div class="flex justify-center py-2">
            <div class="w-0.5 h-8 bg-gradient-to-b from-green to-green/30 relative">
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-2 h-2 bg-green rounded-full"></div>
            </div>
        </div>

        {{-- Assistant Gender Secretaries --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-[820px] mx-auto">
            <div class="bg-white rounded-xl border border-gray-200 shadow-md p-5 text-center hover:shadow-lg transition-shadow hover:border-green">
                <div class="relative w-20 h-20 mx-auto mb-3">
                    <img src="{{ asset($becBase . 'Quinter-Nyakiye.png') }}" 
                         alt="1st Asst Gender Secretary" 
                         class="w-full h-full rounded-full object-cover object-top bg-gray-100"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    <div class="w-full h-full rounded-full bg-gray-100 flex items-center justify-center text-3xl text-gray-400" style="display:none;">👤</div>
                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-gold rounded-full border-2 border-white flex items-center justify-center text-white text-[8px] font-bold shadow-md">1</div>
                    <div class="absolute inset-0 rounded-full border-2 border-green/20 pointer-events-none"></div>
                </div>
                <div class="text-xs font-bold tracking-wide uppercase text-green mb-1">1st Asst. Gender Secretary</div>
                <div class="text-sm font-semibold text-gray-900">Quinter Nyakiye</div>
                <a href="{{ route('profile.quinter_nyakiye') }}" 
                   class="inline-block mt-3 px-4 py-1.5 text-[10px] font-bold tracking-wide uppercase text-green border-2 border-green rounded hover:bg-green hover:text-white transition-colors">
                    View Profile
                </a>
            </div>
            
            <div class="bg-white rounded-xl border border-gray-200 shadow-md p-5 text-center hover:shadow-lg transition-shadow hover:border-green">
                <div class="relative w-20 h-20 mx-auto mb-3">
                    <img src="{{ asset($becBase . 'Dancun-Alaka.png') }}" 
                         alt="2nd Asst Gender Secretary" 
                         class="w-full h-full rounded-full object-cover object-top bg-gray-100"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    <div class="w-full h-full rounded-full bg-gray-100 flex items-center justify-center text-3xl text-gray-400" style="display:none;">👤</div>
                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-gold rounded-full border-2 border-white flex items-center justify-center text-white text-[8px] font-bold shadow-md">2</div>
                    <div class="absolute inset-0 rounded-full border-2 border-green/20 pointer-events-none"></div>
                </div>
                <div class="text-xs font-bold tracking-wide uppercase text-green mb-1">2nd Asst. Gender Secretary</div>
                <div class="text-sm font-semibold text-gray-900">Dancun Alaka</div>
                <a href="{{ route('profile.dancun_alaka') }}" 
                   class="inline-block mt-3 px-4 py-1.5 text-[10px] font-bold tracking-wide uppercase text-green border-2 border-green rounded hover:bg-green hover:text-white transition-colors">
                    View Profile
                </a>
            </div>
            
            <div class="bg-white rounded-xl border border-gray-200 shadow-md p-5 text-center hover:shadow-lg transition-shadow hover:border-green">
                <div class="relative w-20 h-20 mx-auto mb-3">
                    <div class="w-full h-full rounded-full bg-gray-100 flex items-center justify-center text-3xl text-gray-400 border-2 border-gray-200">👤</div>
                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-gold rounded-full border-2 border-white flex items-center justify-center text-white text-[8px] font-bold shadow-md">3</div>
                    <div class="absolute inset-0 rounded-full border-2 border-green/20 pointer-events-none"></div>
                </div>
                <div class="text-xs font-bold tracking-wide uppercase text-green mb-1">3rd Asst. Gender Secretary</div>
                <div class="text-sm font-semibold text-gray-900">Anne Blessings</div>
                <a href="{{ route('profile.anne_blessings') }}" 
                   class="inline-block mt-3 px-4 py-1.5 text-[10px] font-bold tracking-wide uppercase text-green border-2 border-green rounded hover:bg-green hover:text-white transition-colors">
                    View Profile
                </a>
            </div>
        </div>

        {{-- Footer --}}
        <div class="text-center mt-12 pt-6 border-t border-gray-200">
            <div class="flex items-center justify-center gap-4 max-w-xs mx-auto mb-4">
                <div class="flex-1 h-0.5 bg-gradient-to-r from-transparent to-green"></div>
                <div class="w-2.5 h-2.5 bg-gold rotate-45 flex-shrink-0"></div>
                <div class="flex-1 h-0.5 bg-gradient-to-l from-transparent to-green"></div>
            </div>
            <p class="text-[10px] font-bold tracking-widest uppercase text-gray-400">
                KUPPET · Homabay Branch · Branch Executive Committee
            </p>
        </div>
    </div>
</section>
@endsection