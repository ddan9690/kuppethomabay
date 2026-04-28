@extends('layouts.frontend')

@section('title', 'Financial Report – March & April 2026 | KUPPET Homa Bay Branch')

@section('content')

{{-- ── HERO ── --}}
<div class="bg-green overflow-hidden relative">
    <div class="absolute inset-0 opacity-5"
         style="background:repeating-linear-gradient(-45deg,#fff 0,#fff 1px,transparent 1px,transparent 28px)">
    </div>
    <div class="relative text-center px-6 py-14">
        <span class="inline-block border border-gold text-gold text-xs font-semibold tracking-widest uppercase px-4 py-1 rounded-sm mb-4">
            Official Financial Statement
        </span>
        <h1 class="text-white font-extrabold text-2xl md:text-4xl leading-tight mb-2">
            Financial Report: March &amp; April 2026
        </h1>
        <p class="text-white/60 text-sm font-light tracking-wide">
            Homa Bay KUPPET Branch · Communication Desk
        </p>
    </div>
</div>

{{-- ── PERIOD STRIP ── --}}
<div class="bg-gold text-gray-dark text-center text-xs font-bold tracking-widest uppercase py-2.5 px-4">
    Period: March 2026 – April 2026
</div>

{{-- ── PAGE BODY ── --}}
<div class="bg-gray-light min-h-screen">
<div class="max-w-3xl mx-auto px-4 pb-20">

    {{-- ── SUMMARY CARDS ── --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-10 mb-10">

        <div class="bg-white rounded-xl border border-gray overflow-hidden relative">
            <div class="h-1 bg-green"></div>
            <div class="p-5">
                <div class="text-gray text-xs font-semibold tracking-widest uppercase mb-2">Total Income</div>
                <div class="text-green text-3xl font-extrabold leading-none mb-1">1,776,070</div>
                <div class="text-gray text-xs">KSh · March &amp; April</div>
                <span class="absolute top-4 right-4 text-2xl opacity-20">💰</span>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray overflow-hidden relative">
            <div class="h-1 bg-red"></div>
            <div class="p-5">
                <div class="text-gray text-xs font-semibold tracking-widest uppercase mb-2">Total Expenditure</div>
                <div class="text-red text-3xl font-extrabold leading-none mb-1">519,380</div>
                <div class="text-gray text-xs">KSh · All categories</div>
                <span class="absolute top-4 right-4 text-2xl opacity-20">📤</span>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray overflow-hidden relative">
            <div class="h-1 bg-gold"></div>
            <div class="p-5">
                <div class="text-gray text-xs font-semibold tracking-widest uppercase mb-2">Balance (BBF)</div>
                <div class="text-gray-dark text-3xl font-extrabold leading-none mb-1">1,256,690</div>
                <div class="text-gray text-xs">KSh · Held in bank</div>
                <span class="absolute top-4 right-4 text-2xl opacity-20">🏦</span>
            </div>
        </div>

    </div>

    {{-- ── INCOME SECTION ── --}}
    <div class="flex items-center gap-3 mt-8 mb-4">
        <h2 class="text-gray-dark font-bold text-lg whitespace-nowrap">Income Received</h2>
        <div class="flex-1 h-px bg-gray"></div>
    </div>

    <div class="bg-white rounded-xl border border-gray overflow-hidden mb-8">
        <table class="w-full text-sm border-collapse">
            <thead class="bg-green text-white">
                <tr>
                    <th class="text-left text-xs font-semibold tracking-wider uppercase px-5 py-3">Date</th>
                    <th class="text-left text-xs font-semibold tracking-wider uppercase px-5 py-3">Description</th>
                    <th class="text-right text-xs font-semibold tracking-wider uppercase px-5 py-3">Amount (KSh)</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-light hover:bg-gray-light transition-colors">
                    <td class="px-5 py-3 text-gray-dark whitespace-nowrap">12 Mar 2026</td>
                    <td class="px-5 py-3">
                        <div class="text-gray-dark font-medium">Branch Remittance</div>
                        <div class="text-gray text-xs mt-0.5">March disbursement received</div>
                    </td>
                    <td class="px-5 py-3 text-right font-mono font-semibold text-green">871,440</td>
                </tr>
                <tr class="border-b border-gray-light hover:bg-gray-light transition-colors">
                    <td class="px-5 py-3 text-gray-dark whitespace-nowrap">13 Apr 2026</td>
                    <td class="px-5 py-3">
                        <div class="text-gray-dark font-medium">Branch Remittance</div>
                        <div class="text-gray text-xs mt-0.5">April disbursement received</div>
                    </td>
                    <td class="px-5 py-3 text-right font-mono font-semibold text-green">855,630</td>
                </tr>
                <tr class="hover:bg-gray-light transition-colors">
                    <td class="px-5 py-3 text-gray-dark text-xs leading-5">15 Mar –<br>14 Apr 2026</td>
                    <td class="px-5 py-3">
                        <div class="text-gray-dark font-medium">Bus Proceeds</div>
                        <div class="text-gray text-xs mt-0.5">Revenue from branch bus operations</div>
                    </td>
                    <td class="px-5 py-3 text-right font-mono font-semibold text-green">49,000</td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="bg-gray-light border-t-2 border-gray">
                    <td colspan="2" class="px-5 py-3 font-bold text-gray-dark text-sm uppercase tracking-wide">Total Income</td>
                    <td class="px-5 py-3 text-right font-mono font-bold text-green text-base">1,776,070</td>
                </tr>
            </tfoot>
        </table>
    </div>

    {{-- ── EXPENDITURE SECTION ── --}}
    <div class="flex items-center gap-3 mt-8 mb-4">
        <h2 class="text-gray-dark font-bold text-lg whitespace-nowrap">Expenditure Breakdown</h2>
        <div class="flex-1 h-px bg-gray"></div>
    </div>

    {{-- MARCH --}}
    <div class="flex items-center gap-3 mb-3">
        <span class="bg-green text-white text-xs font-bold tracking-widest uppercase px-4 py-1 rounded-full">March 2026</span>
        <span class="text-gray text-xs font-mono">Sub-total: KSh 329,920</span>
    </div>

    <div class="bg-white rounded-xl border border-gray overflow-hidden mb-5">
        <table class="w-full text-sm border-collapse">
            <thead class="bg-gray-light">
                <tr>
                    <th class="text-left text-xs font-semibold tracking-wider uppercase px-5 py-3 text-gray w-28">Category</th>
                    <th class="text-left text-xs font-semibold tracking-wider uppercase px-5 py-3 text-gray">Description</th>
                    <th class="text-right text-xs font-semibold tracking-wider uppercase px-5 py-3 text-gray">Amount (KSh)</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-light hover:bg-gray-light/60 transition-colors">
                    <td class="px-5 py-3"><span class="bg-green/10 text-green-dark text-xs font-semibold tracking-wide uppercase px-2 py-0.5 rounded">Welfare</span></td>
                    <td class="px-5 py-3">
                        <div class="text-gray-dark font-medium">Support – 12 Parents</div>
                        <div class="text-gray text-xs mt-0.5">@ KSh 10,000 each</div>
                    </td>
                    <td class="px-5 py-3 text-right font-mono font-semibold text-red">120,000</td>
                </tr>
                <tr class="border-b border-gray-light hover:bg-gray-light/60 transition-colors">
                    <td class="px-5 py-3"><span class="bg-green/10 text-green-dark text-xs font-semibold tracking-wide uppercase px-2 py-0.5 rounded">Welfare</span></td>
                    <td class="px-5 py-3">
                        <div class="text-gray-dark font-medium">Support – 3 Children</div>
                        <div class="text-gray text-xs mt-0.5">@ KSh 20,000 each</div>
                    </td>
                    <td class="px-5 py-3 text-right font-mono font-semibold text-red">60,000</td>
                </tr>
                <tr class="border-b border-gray-light hover:bg-gray-light/60 transition-colors">
                    <td class="px-5 py-3"><span class="bg-green/10 text-green-dark text-xs font-semibold tracking-wide uppercase px-2 py-0.5 rounded">Welfare</span></td>
                    <td class="px-5 py-3">
                        <div class="text-gray-dark font-medium">Benevolent Case (1)</div>
                        <div class="text-gray text-xs mt-0.5">Emergency welfare support</div>
                    </td>
                    <td class="px-5 py-3 text-right font-mono font-semibold text-red">10,000</td>
                </tr>
                <tr class="border-b border-gray-light hover:bg-gray-light/60 transition-colors">
                    <td class="px-5 py-3"><span class="bg-gold/20 text-gold-dark text-xs font-semibold tracking-wide uppercase px-2 py-0.5 rounded">Operations</span></td>
                    <td class="px-5 py-3"><div class="text-gray-dark font-medium">Bus Insurance</div></td>
                    <td class="px-5 py-3 text-right font-mono font-semibold text-red">70,000</td>
                </tr>
                <tr class="border-b border-gray-light hover:bg-gray-light/60 transition-colors">
                    <td class="px-5 py-3"><span class="bg-gold/20 text-gold-dark text-xs font-semibold tracking-wide uppercase px-2 py-0.5 rounded">Operations</span></td>
                    <td class="px-5 py-3"><div class="text-gray-dark font-medium">Bus Servicing</div></td>
                    <td class="px-5 py-3 text-right font-mono font-semibold text-red">23,000</td>
                </tr>
                <tr class="border-b border-gray-light hover:bg-gray-light/60 transition-colors">
                    <td class="px-5 py-3"><span class="bg-gold/20 text-gold-dark text-xs font-semibold tracking-wide uppercase px-2 py-0.5 rounded">Operations</span></td>
                    <td class="px-5 py-3"><div class="text-gray-dark font-medium">Hydraulic Lift Repairs</div></td>
                    <td class="px-5 py-3 text-right font-mono font-semibold text-red">4,000</td>
                </tr>
                <tr class="border-b border-gray-light hover:bg-gray-light/60 transition-colors">
                    <td class="px-5 py-3"><span class="bg-gold/20 text-gold-dark text-xs font-semibold tracking-wide uppercase px-2 py-0.5 rounded">Operations</span></td>
                    <td class="px-5 py-3"><div class="text-gray-dark font-medium">Bus Clutch Replacement</div></td>
                    <td class="px-5 py-3 text-right font-mono font-semibold text-red">17,500</td>
                </tr>
                <tr class="border-b border-gray-light hover:bg-gray-light/60 transition-colors">
                    <td class="px-5 py-3"><span class="bg-gold/20 text-gold-dark text-xs font-semibold tracking-wide uppercase px-2 py-0.5 rounded">Operations</span></td>
                    <td class="px-5 py-3">
                        <div class="text-gray-dark font-medium">Two Batteries</div>
                        <div class="text-gray text-xs mt-0.5">Replacement purchase</div>
                    </td>
                    <td class="px-5 py-3 text-right font-mono font-semibold text-red">20,000</td>
                </tr>
                <tr class="border-b border-gray-light hover:bg-gray-light/60 transition-colors">
                    <td class="px-5 py-3"><span class="bg-gold/20 text-gold-dark text-xs font-semibold tracking-wide uppercase px-2 py-0.5 rounded">Operations</span></td>
                    <td class="px-5 py-3"><div class="text-gray-dark font-medium">Transport &amp; Lunch</div></td>
                    <td class="px-5 py-3 text-right font-mono font-semibold text-red">3,500</td>
                </tr>
                <tr class="hover:bg-gray-light/60 transition-colors">
                    <td class="px-5 py-3"><span class="bg-blue/10 text-blue text-xs font-semibold tracking-wide uppercase px-2 py-0.5 rounded">Banking</span></td>
                    <td class="px-5 py-3">
                        <div class="text-gray-dark font-medium">Bank Charges</div>
                        <div class="text-gray text-xs mt-0.5">March 2026</div>
                    </td>
                    <td class="px-5 py-3 text-right font-mono font-semibold text-red">920</td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="bg-gray-light border-t-2 border-gray">
                    <td colspan="2" class="px-5 py-3 font-bold text-gray-dark text-sm uppercase tracking-wide">March Sub-total</td>
                    <td class="px-5 py-3 text-right font-mono font-bold text-red text-base">329,920</td>
                </tr>
            </tfoot>
        </table>
    </div>

    {{-- APRIL --}}
    <div class="flex items-center gap-3 mb-3">
        <span class="bg-blue text-white text-xs font-bold tracking-widest uppercase px-4 py-1 rounded-full">April 2026</span>
        <span class="text-gray text-xs font-mono">Sub-total: KSh 190,460</span>
    </div>

    <div class="bg-white rounded-xl border border-gray overflow-hidden mb-5">
        <table class="w-full text-sm border-collapse">
            <thead class="bg-gray-light">
                <tr>
                    <th class="text-left text-xs font-semibold tracking-wider uppercase px-5 py-3 text-gray w-28">Category</th>
                    <th class="text-left text-xs font-semibold tracking-wider uppercase px-5 py-3 text-gray">Description</th>
                    <th class="text-right text-xs font-semibold tracking-wider uppercase px-5 py-3 text-gray">Amount (KSh)</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-light hover:bg-gray-light/60 transition-colors">
                    <td class="px-5 py-3"><span class="bg-green/10 text-green-dark text-xs font-semibold tracking-wide uppercase px-2 py-0.5 rounded">Welfare</span></td>
                    <td class="px-5 py-3">
                        <div class="text-gray-dark font-medium">Support – 5 Parents</div>
                        <div class="text-gray text-xs mt-0.5">@ KSh 20,000 each</div>
                    </td>
                    <td class="px-5 py-3 text-right font-mono font-semibold text-red">100,000</td>
                </tr>
                <tr class="border-b border-gray-light hover:bg-gray-light/60 transition-colors">
                    <td class="px-5 py-3"><span class="bg-green/10 text-green-dark text-xs font-semibold tracking-wide uppercase px-2 py-0.5 rounded">Welfare</span></td>
                    <td class="px-5 py-3">
                        <div class="text-gray-dark font-medium">Support – 3 Children</div>
                        <div class="text-gray text-xs mt-0.5">@ KSh 30,000 each</div>
                    </td>
                    <td class="px-5 py-3 text-right font-mono font-semibold text-red">90,000</td>
                </tr>
                <tr class="hover:bg-gray-light/60 transition-colors">
                    <td class="px-5 py-3"><span class="bg-blue/10 text-blue text-xs font-semibold tracking-wide uppercase px-2 py-0.5 rounded">Banking</span></td>
                    <td class="px-5 py-3">
                        <div class="text-gray-dark font-medium">Bank Charges</div>
                        <div class="text-gray text-xs mt-0.5">April 2026</div>
                    </td>
                    <td class="px-5 py-3 text-right font-mono font-semibold text-red">460</td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="bg-gray-light border-t-2 border-gray">
                    <td colspan="2" class="px-5 py-3 font-bold text-gray-dark text-sm uppercase tracking-wide">April Sub-total</td>
                    <td class="px-5 py-3 text-right font-mono font-bold text-red text-base">190,460</td>
                </tr>
            </tfoot>
        </table>
    </div>

    {{-- GRAND TOTAL --}}
    <div class="bg-white border border-gray rounded-lg flex justify-between items-center px-5 py-4 mb-10">
        <span class="text-gray text-xs font-bold tracking-widest uppercase">Total Expenditure (March + April)</span>
        <span class="font-mono font-bold text-red text-lg">KSh 519,380</span>
    </div>

    {{-- ── BALANCE BOX ── --}}
    <div class="bg-gray-dark rounded-2xl p-8 mb-8 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6 relative overflow-hidden">
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-gold/10 rounded-full pointer-events-none"></div>
        <div class="relative">
            <div class="text-gold text-xs font-bold tracking-widest uppercase mb-2">Balance Brought Forward (BBF)</div>
            <div class="text-white font-extrabold text-4xl leading-none mb-3">KSh 1,256,690</div>
            <div class="text-white/50 text-sm font-light leading-relaxed">
                Total Income (1,776,070) minus Total Expenditure (519,380)<br>
                Held in bank · Reserved exclusively for BBF cases
            </div>
        </div>
        <div class="relative bg-gold text-gray-dark text-xs font-bold tracking-widest uppercase text-center px-5 py-3 rounded-lg whitespace-nowrap flex-shrink-0">
            In Bank<br>✓ BBF
        </div>
    </div>

    {{-- ── CLOSING NOTE ── --}}
    <div class="bg-white border border-gray border-l-4 border-l-gold rounded-lg px-5 py-4 mb-10 text-sm text-gray leading-relaxed">
        <strong class="block text-gray-dark text-xs font-bold tracking-widest uppercase mb-1">Commitment Statement</strong>
        The Homa Bay KUPPET Branch remains committed to prudent financial management,
        transparency, and continued support to its members through the Benevolent Fund.
        All figures are as reported by the Communication Desk for the period under review.
    </div>

    {{-- ── BACK BUTTON ── --}}
    <div class="text-center">
        <a href="/" class="inline-flex items-center gap-2 bg-green hover:bg-green-dark text-white font-semibold text-sm px-7 py-3 rounded-lg transition-colors duration-200 tracking-wide">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M19 12H5M12 5l-7 7 7 7"/>
            </svg>
            Back to Home
        </a>
    </div>

</div>{{-- /.max-w-3xl --}}
</div>{{-- /.bg-gray-light --}}

@endsection