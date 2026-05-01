@extends('layouts.frontend')

@section('title', 'Branch Executive Committee - KUPPET Homabay Branch')

@section('content')

{{-- BEC Page Styles --}}
<style>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Exo+2:ital,wght@0,300;0,400;0,500;0,600;1,300&display=swap');

    :root {
        --green: #008C45;
        --green-dark: #006533;
        --gold: #C8A265;
        --gold-dark: #A88744;
        --gray-light: #F5F5F5;
        --gray: #B0B0B0;
        --gray-dark: #333333;
        --white: #FFFFFF;
    }

    .bec-section {
        font-family: 'Exo 2', sans-serif;
        background: #020d06;
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
    }

    .bec-grid-bg {
        position: fixed;
        inset: 0;
        background-image:
            linear-gradient(rgba(0, 140, 69, 0.07) 1px, transparent 1px),
            linear-gradient(90deg, rgba(0, 140, 69, 0.07) 1px, transparent 1px);
        background-size: 60px 60px;
        pointer-events: none;
        z-index: 0;
    }

    .bec-grid-bg::after {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse 80% 60% at 50% 0%, rgba(0,140,69,0.15) 0%, transparent 70%),
                    radial-gradient(ellipse 60% 40% at 80% 100%, rgba(200,162,101,0.08) 0%, transparent 60%);
    }

    .bec-scanlines {
        position: fixed;
        inset: 0;
        background: repeating-linear-gradient(
            0deg,
            transparent,
            transparent 2px,
            rgba(0,0,0,0.03) 2px,
            rgba(0,0,0,0.03) 4px
        );
        pointer-events: none;
        z-index: 0;
    }

    .bec-content {
        position: relative;
        z-index: 1;
    }

    .bec-header {
        text-align: center;
        padding: 3.5rem 1rem 2rem;
        position: relative;
    }

    .bec-logo-wrap {
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .bec-logo-ring {
        position: relative;
        width: 110px;
        height: 110px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .bec-logo-ring::before {
        content: '';
        position: absolute;
        inset: -4px;
        border-radius: 50%;
        border: 2px solid var(--green);
        box-shadow: 0 0 20px rgba(0,140,69,0.6), inset 0 0 20px rgba(0,140,69,0.1);
        animation: ring-pulse 3s ease-in-out infinite;
    }

    .bec-logo-ring::after {
        content: '';
        position: absolute;
        inset: -12px;
        border-radius: 50%;
        border: 1px solid rgba(200,162,101,0.3);
        animation: ring-pulse 3s ease-in-out infinite 1s;
    }

    @keyframes ring-pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(1.05); }
    }

    .bec-logo-img {
        width: 90px;
        height: 90px;
        object-fit: contain;
        border-radius: 50%;
        background: rgba(255,255,255,0.03);
        padding: 6px;
    }

    .bec-branch-label {
        font-family: 'Orbitron', monospace;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.3em;
        color: var(--gold);
        text-transform: uppercase;
        margin-top: 0.75rem;
        text-shadow: 0 0 12px rgba(200,162,101,0.5);
    }

    .bec-org-name {
        font-family: 'Orbitron', monospace;
        font-size: clamp(1.5rem, 4vw, 2.5rem);
        font-weight: 900;
        color: var(--white);
        letter-spacing: 0.05em;
        text-shadow: 0 0 30px rgba(0,140,69,0.4);
        line-height: 1.2;
    }

    .bec-org-name span {
        color: var(--green);
    }

    .bec-subtitle {
        font-family: 'Orbitron', monospace;
        font-size: clamp(0.65rem, 1.8vw, 0.85rem);
        font-weight: 600;
        letter-spacing: 0.25em;
        color: var(--gold);
        margin-top: 0.5rem;
        opacity: 0.85;
        text-shadow: 0 0 10px rgba(200,162,101,0.4);
    }

    .bec-divider {
        display: flex;
        align-items: center;
        gap: 1rem;
        justify-content: center;
        margin: 1.5rem auto;
        max-width: 500px;
    }

    .bec-divider-line {
        flex: 1;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--green), transparent);
        box-shadow: 0 0 8px rgba(0,140,69,0.4);
    }

    .bec-divider-diamond {
        width: 8px;
        height: 8px;
        background: var(--gold);
        transform: rotate(45deg);
        box-shadow: 0 0 10px rgba(200,162,101,0.7);
    }

    .bec-section-label {
        display: inline-block;
        font-family: 'Orbitron', monospace;
        font-size: 0.65rem;
        letter-spacing: 0.35em;
        color: var(--green);
        background: rgba(0,140,69,0.08);
        border: 1px solid rgba(0,140,69,0.25);
        padding: 0.4rem 1.2rem;
        border-radius: 2px;
        margin-bottom: 2rem;
        text-transform: uppercase;
    }

    .bec-hierarchy {
        padding: 0 1rem 4rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .bec-connector {
        display: flex;
        justify-content: center;
        margin: 0;
    }

    .bec-connector-line {
        width: 1px;
        height: 36px;
        background: linear-gradient(180deg, rgba(0,140,69,0.8), rgba(0,140,69,0.3));
        position: relative;
    }

    .bec-connector-line::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 7px;
        height: 7px;
        background: var(--green);
        border-radius: 50%;
        box-shadow: 0 0 8px rgba(0,140,69,0.8);
    }

    .bec-card {
        position: relative;
        background: linear-gradient(135deg, rgba(255,255,255,0.04) 0%, rgba(0,140,69,0.03) 100%);
        border: 1px solid rgba(0,140,69,0.2);
        border-radius: 4px;
        padding: 1.25rem 1rem 1rem;
        text-align: center;
        cursor: default;
        transition: all 0.35s cubic-bezier(0.25,0.8,0.25,1);
        overflow: hidden;
        backdrop-filter: blur(4px);
    }

    .bec-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--green), transparent);
        opacity: 0;
        transition: opacity 0.3s;
    }

    .bec-card::after {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse at 50% 0%, rgba(0,140,69,0.12), transparent 70%);
        opacity: 0;
        transition: opacity 0.3s;
    }

    .bec-card:hover {
        border-color: rgba(0,140,69,0.55);
        transform: translateY(-4px);
        box-shadow: 0 16px 40px rgba(0,0,0,0.5), 0 0 20px rgba(0,140,69,0.15);
    }

    .bec-card:hover::before,
    .bec-card:hover::after {
        opacity: 1;
    }

    .bec-card-apex {
        background: linear-gradient(135deg, rgba(0,140,69,0.12) 0%, rgba(0,101,51,0.06) 100%);
        border: 1px solid rgba(0,140,69,0.45);
        box-shadow: 0 0 30px rgba(0,140,69,0.1), 0 8px 24px rgba(0,0,0,0.4);
        padding: 1.5rem 1.25rem 1.25rem;
    }

    .bec-card-apex::before {
        opacity: 1;
        background: linear-gradient(90deg, transparent, var(--gold), transparent);
        height: 2px;
    }

    .bec-card-gold {
        border-color: rgba(200,162,101,0.3);
    }

    .bec-card-gold::before {
        background: linear-gradient(90deg, transparent, var(--gold), transparent);
    }

    .bec-card-gold:hover {
        border-color: rgba(200,162,101,0.6);
        box-shadow: 0 16px 40px rgba(0,0,0,0.5), 0 0 20px rgba(200,162,101,0.12);
    }

    .bec-photo-wrap {
        position: relative;
        width: 72px;
        height: 72px;
        margin: 0 auto 0.75rem;
    }

    .bec-card-apex .bec-photo-wrap {
        width: 88px;
        height: 88px;
    }

    .bec-photo-ring {
        position: absolute;
        inset: -3px;
        border-radius: 50%;
        border: 1.5px solid rgba(0,140,69,0.5);
    }

    .bec-card-apex .bec-photo-ring {
        border-color: rgba(200,162,101,0.6);
        box-shadow: 0 0 14px rgba(200,162,101,0.3);
    }

    .bec-card-gold .bec-photo-ring {
        border-color: rgba(200,162,101,0.45);
    }

    .bec-photo {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        object-position: center top;
        filter: grayscale(20%) contrast(1.05);
        transition: filter 0.3s;
    }

    .bec-card:hover .bec-photo {
        filter: grayscale(0%) contrast(1.1);
    }

    /* Placeholder circle for missing photo */
    .bec-photo-placeholder {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: rgba(0,140,69,0.08);
        border: 1px dashed rgba(0,140,69,0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(0,140,69,0.35);
        font-size: 1.4rem;
    }

    .bec-badge {
        position: absolute;
        bottom: -2px;
        right: -2px;
        width: 20px;
        height: 20px;
        background: var(--green);
        border-radius: 50%;
        border: 2px solid #020d06;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 9px;
        color: white;
        box-shadow: 0 0 8px rgba(0,140,69,0.6);
    }

    .bec-card-apex .bec-badge {
        background: var(--gold);
        box-shadow: 0 0 8px rgba(200,162,101,0.6);
    }

    .bec-office-title {
        font-family: 'Orbitron', monospace;
        font-size: 0.6rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        color: var(--green);
        text-transform: uppercase;
        margin-bottom: 0.35rem;
        line-height: 1.4;
    }

    .bec-card-apex .bec-office-title {
        color: var(--gold);
        font-size: 0.65rem;
    }

    .bec-card-gold .bec-office-title {
        color: var(--gold);
    }

    .bec-official-name {
        font-family: 'Exo 2', sans-serif;
        font-size: 0.82rem;
        font-weight: 600;
        color: rgba(255,255,255,0.88);
        line-height: 1.3;
    }

    .bec-card-apex .bec-official-name {
        font-size: 0.95rem;
        color: white;
    }

    .bec-card .corner {
        position: absolute;
        width: 10px;
        height: 10px;
        border-color: rgba(0,140,69,0.35);
        border-style: solid;
    }

    .bec-card .corner-tl { top: 5px; left: 5px; border-width: 1px 0 0 1px; }
    .bec-card .corner-tr { top: 5px; right: 5px; border-width: 1px 1px 0 0; }
    .bec-card .corner-bl { bottom: 5px; left: 5px; border-width: 0 0 1px 1px; }
    .bec-card .corner-br { bottom: 5px; right: 5px; border-width: 0 1px 1px 0; }

    .bec-card-apex .corner { border-color: rgba(200,162,101,0.4); }
    .bec-card-gold .corner { border-color: rgba(200,162,101,0.3); }

    .bec-row-single {
        display: flex;
        justify-content: center;
        margin-bottom: 0;
    }

    .bec-row-single .bec-card {
        width: 100%;
        max-width: 260px;
    }

    .bec-row-double {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        max-width: 560px;
        margin: 0 auto;
    }

    .bec-row-triple {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
        max-width: 820px;
        margin: 0 auto;
    }

    .bec-row-quad {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 0.85rem;
        max-width: 1100px;
        margin: 0 auto;
    }

    .bec-tier {
        margin-bottom: 0;
    }

    [data-bec-reveal] {
        opacity: 0;
        transform: translateY(20px);
    }

    .bec-particle {
        position: fixed;
        width: 2px;
        height: 2px;
        background: var(--green);
        border-radius: 50%;
        pointer-events: none;
        opacity: 0;
        box-shadow: 0 0 4px rgba(0,140,69,0.8);
    }

    @media (max-width: 768px) {
        .bec-row-triple {
            grid-template-columns: repeat(2, 1fr);
            max-width: 400px;
        }

        .bec-row-quad {
            grid-template-columns: repeat(2, 1fr);
            max-width: 400px;
        }
    }

    @media (max-width: 480px) {
        .bec-row-double,
        .bec-row-triple,
        .bec-row-quad {
            grid-template-columns: 1fr;
            max-width: 260px;
        }
    }
</style>

<section class="bec-section">
    <div class="bec-grid-bg"></div>
    <div class="bec-scanlines"></div>

    {{-- Floating particles --}}
    @for($i = 0; $i < 12; $i++)
    <div class="bec-particle" id="particle-{{ $i }}"></div>
    @endfor

    <div class="bec-content">

        {{-- ── HEADER ── --}}
        <header class="bec-header" data-bec-reveal>

            <div class="bec-logo-wrap">
                <div class="bec-logo-ring">
                    <img src="{{ asset('assets/images/kuppet-logo.png') }}"
                         alt="KUPPET Logo"
                         class="bec-logo-img"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    <div style="display:none; width:90px; height:90px; border-radius:50%; background:rgba(0,140,69,0.15); align-items:center; justify-content:center; font-family:'Orbitron',monospace; font-size:1.1rem; color:var(--green); font-weight:900; letter-spacing:0.05em;">
                        KUPPET
                    </div>
                </div>
            </div>

            <div class="bec-branch-label">Homabay Branch</div>

            <h1 class="bec-org-name">
                <span>KUPPET</span>
            </h1>
            <div class="bec-subtitle">Kenya Union of Post Primary Education Teachers</div>

            <div class="bec-divider">
                <div class="bec-divider-line"></div>
                <div class="bec-divider-diamond"></div>
                <div class="bec-divider-line"></div>
            </div>

            <div class="bec-section-label">Branch Executive Committee (BEC)</div>
        </header>


        {{-- ── HIERARCHY ── --}}
        <div class="bec-hierarchy">

            @php
                $becBase = 'assets/images/bec-officials/';
            @endphp

            {{-- ══ EXECUTIVE SECRETARY ══ --}}
            <div class="bec-tier" data-bec-reveal>
                <div class="bec-row-single">
                    <div class="bec-card bec-card-apex">
                        <div class="corner corner-tl"></div>
                        <div class="corner corner-tr"></div>
                        <div class="corner corner-bl"></div>
                        <div class="corner corner-br"></div>
                        <div class="bec-photo-wrap">
                            <img src="{{ asset($becBase . 'Thomas-Odhiambo.png') }}"
                                 alt="Executive Secretary"
                                 class="bec-photo"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="bec-photo-placeholder" style="display:none;">👤</div>
                            <div class="bec-badge">★</div>
                            <div class="bec-photo-ring"></div>
                        </div>
                        <div class="bec-office-title">Executive Secretary</div>
                        <div class="bec-official-name">Thomas Odhiambo</div>
                    </div>
                </div>
            </div>

            {{-- Connector --}}
            <div class="bec-connector" data-bec-reveal>
                <div class="bec-connector-line"></div>
            </div>

            {{-- ══ CHAIRPERSON & TREASURER ══ --}}
            <div class="bec-tier" data-bec-reveal>
                <div class="bec-row-double">
                    <div class="bec-card bec-card-gold">
                        <div class="corner corner-tl"></div>
                        <div class="corner corner-tr"></div>
                        <div class="corner corner-bl"></div>
                        <div class="corner corner-br"></div>
                        <div class="bec-photo-wrap">
                            <img src="{{ asset($becBase . 'Peter-Otieno.png') }}"
                                 alt="Chairperson"
                                 class="bec-photo"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="bec-photo-placeholder" style="display:none;">👤</div>
                            <div class="bec-badge">I</div>
                            <div class="bec-photo-ring"></div>
                        </div>
                        <div class="bec-office-title">Chairperson</div>
                        <div class="bec-official-name">Peter Otieno</div>
                    </div>
                    <div class="bec-card bec-card-gold">
                        <div class="corner corner-tl"></div>
                        <div class="corner corner-tr"></div>
                        <div class="corner corner-bl"></div>
                        <div class="corner corner-br"></div>
                        <div class="bec-photo-wrap">
                            <img src="{{ asset($becBase . 'Tembo-Mwadime.png') }}"
                                 alt="Treasurer"
                                 class="bec-photo"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="bec-photo-placeholder" style="display:none;">👤</div>
                            <div class="bec-badge">II</div>
                            <div class="bec-photo-ring"></div>
                        </div>
                        <div class="bec-office-title">Treasurer</div>
                        <div class="bec-official-name">Tembo Mwadime</div>
                    </div>
                </div>
            </div>

            {{-- Connector --}}
            <div class="bec-connector" data-bec-reveal>
                <div class="bec-connector-line"></div>
            </div>

            {{-- ══ VICE CHAIRPERSON & ASSISTANT TREASURER ══ --}}
            <div class="bec-tier" data-bec-reveal>
                <div class="bec-row-double">
                    <div class="bec-card">
                        <div class="corner corner-tl"></div>
                        <div class="corner corner-tr"></div>
                        <div class="corner corner-bl"></div>
                        <div class="corner corner-br"></div>
                        <div class="bec-photo-wrap">
                            <img src="{{ asset($becBase . 'Richard-Otieno.png') }}"
                                 alt="Vice Chairperson"
                                 class="bec-photo"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="bec-photo-placeholder" style="display:none;">👤</div>
                            <div class="bec-photo-ring"></div>
                        </div>
                        <div class="bec-office-title">Vice Chairperson</div>
                        <div class="bec-official-name">Richard Otieno</div>
                    </div>
                    <div class="bec-card">
                        <div class="corner corner-tl"></div>
                        <div class="corner corner-tr"></div>
                        <div class="corner corner-bl"></div>
                        <div class="corner corner-br"></div>
                        <div class="bec-photo-wrap">
                            <img src="{{ asset($becBase . 'Felix-Oduor.jpg') }}"
                                 alt="Assistant Treasurer"
                                 class="bec-photo"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="bec-photo-placeholder" style="display:none;">👤</div>
                            <div class="bec-photo-ring"></div>
                        </div>
                        <div class="bec-office-title">Assistant Treasurer</div>
                        <div class="bec-official-name">Felix Oduor</div>
                    </div>
                </div>
            </div>

            {{-- Connector --}}
            <div class="bec-connector" data-bec-reveal>
                <div class="bec-connector-line"></div>
            </div>

            {{-- ══ ASST EXEC SECRETARY & ORGANISING SEC ══ --}}
            <div class="bec-tier" data-bec-reveal>
                <div class="bec-row-double">
                    <div class="bec-card">
                        <div class="corner corner-tl"></div>
                        <div class="corner corner-tr"></div>
                        <div class="corner corner-bl"></div>
                        <div class="corner corner-br"></div>
                        <div class="bec-photo-wrap">
                            <img src="{{ asset($becBase . 'Kennedy-Atang\'a.png') }}"
                                 alt="Asst Executive Secretary"
                                 class="bec-photo"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="bec-photo-placeholder" style="display:none;">👤</div>
                            <div class="bec-photo-ring"></div>
                        </div>
                        <div class="bec-office-title">Asst. Executive Secretary</div>
                        <div class="bec-official-name">Kennedy Atang'a</div>
                    </div>
                    <div class="bec-card">
                        <div class="corner corner-tl"></div>
                        <div class="corner corner-tr"></div>
                        <div class="corner corner-bl"></div>
                        <div class="corner corner-br"></div>
                        <div class="bec-photo-wrap">
                            <img src="{{ asset($becBase . 'Churchill-Aroko.jpg') }}"
                                 alt="Organising Secretary"
                                 class="bec-photo"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="bec-photo-placeholder" style="display:none;">👤</div>
                            <div class="bec-photo-ring"></div>
                        </div>
                        <div class="bec-office-title">Organising Secretary</div>
                        <div class="bec-official-name">Churchill Aroko</div>
                    </div>
                </div>
            </div>

            {{-- Connector --}}
            <div class="bec-connector" data-bec-reveal>
                <div class="bec-connector-line"></div>
            </div>

            {{-- ══ SECTORAL SECRETARIES ══ --}}
            <div class="bec-tier" data-bec-reveal>
                <div class="bec-row-triple">
                    <div class="bec-card">
                        <div class="corner corner-tl"></div>
                        <div class="corner corner-tr"></div>
                        <div class="corner corner-bl"></div>
                        <div class="corner corner-br"></div>
                        <div class="bec-photo-wrap">
                            <img src="{{ asset($becBase . 'Kennedy-Osewe.png') }}"
                                 alt="Secretary Secondary"
                                 class="bec-photo"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="bec-photo-placeholder" style="display:none;">👤</div>
                            <div class="bec-photo-ring"></div>
                        </div>
                        <div class="bec-office-title">Secretary, Secondary</div>
                        <div class="bec-official-name">Kennedy Osewe</div>
                    </div>
                    <div class="bec-card">
                        <div class="corner corner-tl"></div>
                        <div class="corner corner-tr"></div>
                        <div class="corner corner-bl"></div>
                        <div class="corner corner-br"></div>
                        <div class="bec-photo-wrap">
                            <img src="{{ asset($becBase . 'Philip-Adede.png') }}"
                                 alt="Secretary Junior School"
                                 class="bec-photo"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="bec-photo-placeholder" style="display:none;">👤</div>
                            <div class="bec-photo-ring"></div>
                        </div>
                        <div class="bec-office-title">Secretary, Junior School</div>
                        <div class="bec-official-name">Philip Adede</div>
                    </div>
                    <div class="bec-card">
                        <div class="corner corner-tl"></div>
                        <div class="corner corner-tr"></div>
                        <div class="corner corner-bl"></div>
                        <div class="corner corner-br"></div>
                        <div class="bec-photo-wrap">
                            <img src="{{ asset($becBase . 'Lucas-Okinda.png') }}"
                                 alt="Secretary Tertiary"
                                 class="bec-photo"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="bec-photo-placeholder" style="display:none;">👤</div>
                            <div class="bec-photo-ring"></div>
                        </div>
                        <div class="bec-office-title">Secretary, Tertiary</div>
                        <div class="bec-official-name">Lucas Okinda</div>
                    </div>
                </div>
            </div>

            {{-- Connector --}}
            <div class="bec-connector" data-bec-reveal>
                <div class="bec-connector-line"></div>
            </div>

            {{-- ══ GENDER DESK ══ --}}
            <div class="bec-tier" data-bec-reveal>
                <div class="bec-row-single" style="margin-bottom:1rem;">
                    <div class="bec-card" style="border-color:rgba(200,162,101,0.2);">
                        <div class="corner corner-tl"></div>
                        <div class="corner corner-tr"></div>
                        <div class="corner corner-bl"></div>
                        <div class="corner corner-br"></div>
                        <div class="bec-photo-wrap">
                            <img src="{{ asset($becBase . 'Rose-Okeyo.png') }}"
                                 alt="Gender Secretary"
                                 class="bec-photo"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="bec-photo-placeholder" style="display:none;">👤</div>
                            <div class="bec-photo-ring" style="border-color:rgba(200,162,101,0.4);"></div>
                        </div>
                        <div class="bec-office-title" style="color:var(--gold);">Gender Secretary</div>
                        <div class="bec-official-name">Rose Okeyo</div>
                    </div>
                </div>

                {{-- Connector --}}
                <div class="bec-connector">
                    <div class="bec-connector-line"></div>
                </div>

                {{-- Assistant Gender Secretaries --}}
                <div style="margin-top:0;">
                    <div class="bec-row-triple">
                        <div class="bec-card">
                            <div class="corner corner-tl"></div>
                            <div class="corner corner-tr"></div>
                            <div class="corner corner-bl"></div>
                            <div class="corner corner-br"></div>
                            <div class="bec-photo-wrap">
                                <img src="{{ asset($becBase . 'Quinter-Nyakiye.png') }}"
                                     alt="1st Asst Gender Secretary"
                                     class="bec-photo"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                <div class="bec-photo-placeholder" style="display:none;">👤</div>
                                <div class="bec-badge" style="font-size:8px; background:var(--gold); box-shadow:0 0 8px rgba(200,162,101,0.6);">1</div>
                                <div class="bec-photo-ring"></div>
                            </div>
                            <div class="bec-office-title">1st Asst. Gender Secretary</div>
                            <div class="bec-official-name">Quinter Nyakiye</div>
                        </div>
                        <div class="bec-card">
                            <div class="corner corner-tl"></div>
                            <div class="corner corner-tr"></div>
                            <div class="corner corner-bl"></div>
                            <div class="corner corner-br"></div>
                            <div class="bec-photo-wrap">
                                <img src="{{ asset($becBase . 'Dancun-Alaka.png') }}"
                                     alt="2nd Asst Gender Secretary"
                                     class="bec-photo"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                <div class="bec-photo-placeholder" style="display:none;">👤</div>
                                <div class="bec-badge" style="font-size:8px; background:var(--gold); box-shadow:0 0 8px rgba(200,162,101,0.6);">2</div>
                                <div class="bec-photo-ring"></div>
                            </div>
                            <div class="bec-office-title">2nd Asst. Gender Secretary</div>
                            <div class="bec-official-name">Dancun Alaka</div>
                        </div>
                        <div class="bec-card">
                            <div class="corner corner-tl"></div>
                            <div class="corner corner-tr"></div>
                            <div class="corner corner-bl"></div>
                            <div class="corner corner-br"></div>
                            {{-- Anne Blessings — image pending, show placeholder --}}
                            <div class="bec-photo-wrap">
                                <div class="bec-photo-placeholder">👤</div>
                                <div class="bec-badge" style="font-size:8px; background:var(--gold); box-shadow:0 0 8px rgba(200,162,101,0.6);">3</div>
                                <div class="bec-photo-ring"></div>
                            </div>
                            <div class="bec-office-title">3rd Asst. Gender Secretary</div>
                            <div class="bec-official-name">Anne Blessings</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Footer badge --}}
            <div style="text-align:center; margin-top:3rem;" data-bec-reveal>
                <div class="bec-divider" style="margin-bottom:1.5rem;">
                    <div class="bec-divider-line"></div>
                    <div class="bec-divider-diamond"></div>
                    <div class="bec-divider-line"></div>
                </div>
                <p style="font-family:'Orbitron',monospace; font-size:0.58rem; letter-spacing:0.25em; color:rgba(176,176,176,0.4); text-transform:uppercase;">
                    KUPPET · Homabay Branch · Branch Executive Committee
                </p>
            </div>

        </div>
    </div>
</section>

{{-- ── SCRIPTS ── --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const revealEls = document.querySelectorAll('[data-bec-reveal]');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                anime({
                    targets: entry.target,
                    opacity: [0, 1],
                    translateY: [24, 0],
                    duration: 700,
                    easing: 'easeOutCubic',
                    delay: 60,
                });
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    revealEls.forEach(el => observer.observe(el));

    setTimeout(() => {
        revealEls.forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight) {
                anime({
                    targets: el,
                    opacity: [0, 1],
                    translateY: [24, 0],
                    duration: 700,
                    easing: 'easeOutCubic',
                });
                observer.unobserve(el);
            }
        });
    }, 100);

    document.querySelectorAll('.bec-row-double, .bec-row-triple, .bec-row-quad').forEach(row => {
        const cards = row.querySelectorAll('.bec-card');
        const rowObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    anime({
                        targets: cards,
                        opacity: [0, 1],
                        translateY: [30, 0],
                        delay: anime.stagger(80),
                        duration: 600,
                        easing: 'easeOutCubic',
                    });
                    rowObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });
        rowObserver.observe(row);
    });

    const particles = document.querySelectorAll('.bec-particle');
    particles.forEach((p, i) => {
        const randomX = Math.random() * window.innerWidth;
        const randomY = Math.random() * window.innerHeight;
        p.style.left = randomX + 'px';
        p.style.top = randomY + 'px';

        anime({
            targets: p,
            opacity: [0, 0.6, 0],
            translateY: [0, -(80 + Math.random() * 120)],
            translateX: [(Math.random() - 0.5) * 40],
            duration: 4000 + Math.random() * 3000,
            delay: i * 400,
            easing: 'easeInOutSine',
            loop: true,
        });
    });

    anime({
        targets: '.bec-divider-diamond',
        scale: [1, 1.4, 1],
        opacity: [1, 0.6, 1],
        duration: 2500,
        easing: 'easeInOutSine',
        loop: true,
    });

    anime({
        targets: '.bec-connector-line',
        scaleY: [0, 1],
        duration: 400,
        easing: 'easeOutCubic',
        delay: anime.stagger(100),
    });
});
</script>

@endsection