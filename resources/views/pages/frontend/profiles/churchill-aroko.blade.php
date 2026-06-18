@extends('layouts.frontend')

@section('title', 'Churchill Aroko | KUPPET Homabay')

@section('content')

<section class="min-h-screen flex items-center justify-center p-4 bg-[#020d06] relative overflow-hidden">
    {{-- Decorative Background --}}
    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 50% 50%, #008C45 0.5px, transparent 0.5px); background-size: 40px 40px;"></div>

    {{-- Main Profile Card --}}
    <div class="relative z-10 w-full max-w-sm">
        <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-2xl p-10 shadow-2xl">
            
            {{-- Initials Avatar --}}
            <div class="mx-auto w-32 h-32 mb-8 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center text-white text-5xl font-black shadow-lg shadow-green-900/50 ring-4 ring-white/5">
                CA
            </div>

            {{-- Profile Details --}}
            <div class="text-center">
                <span class="inline-block px-4 py-1 mb-6 text-[10px] font-bold tracking-[0.2em] text-amber-500 uppercase border border-amber-500/30 bg-amber-500/10 rounded-full">
                    Executive Committee
                </span>
                
                <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Churchill Aroko</h1>
                <p class="text-green-500 font-medium tracking-[0.15em] uppercase text-xs mb-10">Organising Secretary</p>
                
                {{-- Action Area --}}
                <div class="pt-8 border-t border-white/10">
                    <a href="{{ url()->previous() }}" class="inline-flex items-center text-[10px] font-bold tracking-[0.2em] text-amber-500 hover:text-white transition-colors uppercase">
                        <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        Back to Directory
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection