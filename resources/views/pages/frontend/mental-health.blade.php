@extends('layouts.frontend')

@section('title', 'KUPPET Homa Bay | Teacher Mental Health & Wellness Awareness Campaign')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400;1,600&family=Outfit:wght@300;400;500;600;700&display=swap');

    :root {
        --forest:    #0d2b1d;
        --canopy:    #1a4731;
        --moss:      #2d6a4f;
        --leaf:      #52b788;
        --mist:      #b7e4c7;
        --dew:       #e9f7ef;
        --gold:      #e9a84c;
        --gold-pale: #fdf0dc;
        --ivory:     #f8f6f1;
        --ink:       #111b14;
        --sage:      #5a7d68;
        --stone:     #8fa89a;
        --white:     #ffffff;
        --shadow-sm: 0 2px 12px rgba(13,43,29,0.08);
        --shadow-md: 0 8px 40px rgba(13,43,29,0.12);
        --shadow-lg: 0 20px 80px rgba(13,43,29,0.18);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    .kp-root {
        font-family: 'Outfit', sans-serif;
        background: var(--ivory);
        color: var(--ink);
        min-height: 100vh;
        overflow-x: hidden;
        position: relative;
    }

    /* ─── READING PROGRESS ─── */
    .kp-progress {
        position: fixed; top: 0; left: 0; right: 0;
        height: 3px; z-index: 1000;
        background: rgba(13,43,29,0.08);
    }
    .kp-progress-fill {
        height: 100%;
        background: linear-gradient(90deg, var(--leaf), var(--gold));
        transition: width 0.15s linear;
        border-radius: 0 2px 2px 0;
    }

    /* ─── HERO ─── */
    .kp-hero {
        min-height: 100vh;
        background: var(--forest);
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        overflow: hidden;
        padding: 100px 24px 80px;
    }

    /* animated grain texture */
    .kp-hero::before {
        content: '';
        position: absolute; inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
        background-size: 200px 200px;
        opacity: 0.6;
        pointer-events: none;
        z-index: 0;
    }

    /* soft radial glows */
    .kp-hero-glow {
        position: absolute; border-radius: 50%;
        pointer-events: none; z-index: 0;
    }
    .glow-a {
        width: 70vw; height: 70vw; max-width: 700px; max-height: 700px;
        background: radial-gradient(circle, rgba(82,183,136,0.12) 0%, transparent 70%);
        top: -15%; left: -15%;
        animation: glow-drift 12s ease-in-out infinite;
    }
    .glow-b {
        width: 50vw; height: 50vw; max-width: 500px; max-height: 500px;
        background: radial-gradient(circle, rgba(233,168,76,0.10) 0%, transparent 70%);
        bottom: -10%; right: -10%;
        animation: glow-drift 9s ease-in-out infinite reverse;
    }
    .glow-c {
        width: 30vw; height: 30vw; max-width: 300px; max-height: 300px;
        background: radial-gradient(circle, rgba(82,183,136,0.08) 0%, transparent 70%);
        top: 50%; left: 60%;
        animation: glow-drift 15s ease-in-out infinite 3s;
    }
    @keyframes glow-drift {
        0%,100% { transform: translate(0,0) scale(1); }
        33%      { transform: translate(2%,3%) scale(1.04); }
        66%      { transform: translate(-2%,-2%) scale(0.97); }
    }

    /* thin horizontal lines behind hero */
    .kp-hero-lines {
        position: absolute; inset: 0; z-index: 0; pointer-events: none;
        overflow: hidden;
    }
    .kp-hero-lines span {
        position: absolute; left: 0; right: 0; height: 1px;
        background: rgba(82,183,136,0.06);
    }

    .kp-hero-inner { position: relative; z-index: 1; max-width: 700px; }

    .kp-campaign-tag {
        display: inline-flex; align-items: center; gap: 8px;
        background: rgba(82,183,136,0.12);
        border: 1px solid rgba(82,183,136,0.3);
        color: var(--mist);
        font-size: 10px; font-weight: 600;
        letter-spacing: 3px; text-transform: uppercase;
        padding: 7px 20px; border-radius: 99px;
        margin-bottom: 36px;
        animation: fadeslide 0.8s ease both;
    }
    .kp-campaign-tag::before {
        content: '';
        width: 6px; height: 6px; border-radius: 50%;
        background: var(--leaf);
        box-shadow: 0 0 0 3px rgba(82,183,136,0.25);
        animation: pulse 2s ease infinite;
    }
    @keyframes pulse {
        0%,100% { box-shadow: 0 0 0 3px rgba(82,183,136,0.25); }
        50%      { box-shadow: 0 0 0 7px rgba(82,183,136,0.0); }
    }

    .kp-hero h1 {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(3.5rem, 10vw, 7rem);
        font-weight: 600;
        color: var(--white);
        line-height: 1.0;
        letter-spacing: -0.02em;
        margin-bottom: 12px;
        animation: fadeslide 0.8s ease 0.2s both;
    }
    .kp-hero h1 em {
        color: var(--gold);
        font-style: italic;
    }
    .kp-hero-sub-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(1.2rem, 3vw, 1.8rem);
        color: rgba(183,228,199,0.7);
        font-style: italic;
        margin-bottom: 28px;
        animation: fadeslide 0.8s ease 0.35s both;
    }

    .kp-hero-divider {
        width: 60px; height: 1px;
        background: linear-gradient(90deg, transparent, var(--leaf), transparent);
        margin: 0 auto 28px;
        animation: fadeslide 0.8s ease 0.45s both;
    }

    .kp-hero-desc {
        color: rgba(255,255,255,0.55);
        font-size: 1rem; font-weight: 300;
        line-height: 1.8;
        max-width: 500px;
        margin: 0 auto 48px;
        animation: fadeslide 0.8s ease 0.55s both;
    }

    .kp-hero-stats {
        display: flex; justify-content: center; gap: 0;
        flex-wrap: wrap;
        border: 1px solid rgba(82,183,136,0.2);
        border-radius: 20px;
        overflow: hidden;
        background: rgba(255,255,255,0.03);
        backdrop-filter: blur(8px);
        animation: fadeslide 0.8s ease 0.7s both;
    }
    .kp-stat {
        flex: 1; min-width: 120px;
        padding: 24px 20px;
        text-align: center;
        border-right: 1px solid rgba(82,183,136,0.15);
    }
    .kp-stat:last-child { border-right: none; }
    .kp-stat strong {
        display: block;
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.4rem; font-weight: 600;
        color: var(--gold);
        line-height: 1;
        margin-bottom: 6px;
    }
    .kp-stat span {
        font-size: 0.7rem; font-weight: 500;
        letter-spacing: 1.5px; text-transform: uppercase;
        color: rgba(255,255,255,0.35);
    }

    .kp-scroll-cue {
        position: absolute; bottom: 36px; left: 50%; transform: translateX(-50%);
        display: flex; flex-direction: column; align-items: center; gap: 8px;
        color: rgba(255,255,255,0.2);
        font-size: 0.65rem; letter-spacing: 2px; text-transform: uppercase;
        z-index: 1;
        animation: fadeslide 1s ease 1.2s both;
    }
    .kp-scroll-cue-line {
        width: 1px; height: 48px;
        background: linear-gradient(to bottom, rgba(82,183,136,0.5), transparent);
        animation: scroll-line 2s ease infinite;
    }
    @keyframes scroll-line {
        0%   { height: 0; opacity: 1; }
        80%  { height: 48px; opacity: 0.5; }
        100% { height: 48px; opacity: 0; }
    }

    @keyframes fadeslide {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ─── CONTAINER ─── */
    .kp-wrap { max-width: 900px; margin: 0 auto; padding: 0 24px; }
    .kp-section { padding: 88px 24px; }

    /* ─── OPENING PULL QUOTE ─── */
    .kp-pullquote-section {
        background: var(--forest);
        padding: 80px 24px;
    }
    .kp-pullquote {
        max-width: 740px; margin: 0 auto;
        text-align: center;
    }
    .kp-pullquote-mark {
        font-family: 'Cormorant Garamond', serif;
        font-size: 6rem; line-height: 0.6;
        color: rgba(82,183,136,0.25);
        display: block; margin-bottom: 24px;
    }
    .kp-pullquote p {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(1.4rem, 3vw, 2rem);
        font-style: italic; font-weight: 400;
        color: rgba(255,255,255,0.85);
        line-height: 1.55;
        margin-bottom: 24px;
    }
    .kp-pullquote cite {
        font-size: 0.75rem; font-style: normal;
        font-weight: 600; letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--leaf);
    }

    /* ─── SECTION EYEBROW ─── */
    .kp-eyebrow {
        display: flex; align-items: center; gap: 14px;
        margin-bottom: 16px;
    }
    .kp-eyebrow-line {
        width: 32px; height: 1px; background: var(--leaf);
    }
    .kp-eyebrow-text {
        font-size: 0.68rem; font-weight: 600;
        letter-spacing: 3px; text-transform: uppercase;
        color: var(--leaf);
    }
    .kp-heading {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(2rem, 5vw, 3rem);
        font-weight: 600; line-height: 1.15;
        color: var(--canopy);
        margin-bottom: 20px;
    }
    .kp-heading em { font-style: italic; color: var(--moss); }
    .kp-body-text {
        font-size: 0.95rem; font-weight: 300;
        line-height: 1.85; color: var(--sage);
        max-width: 600px;
    }

    /* ─── STRESSOR CARDS ─── */
    .kp-stressor-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
        margin-top: 40px;
    }
    @media (max-width: 600px) {
        .kp-stressor-grid { grid-template-columns: 1fr; }
    }
    .kp-stressor-card {
        background: var(--white);
        border-radius: 20px;
        padding: 32px 28px;
        box-shadow: var(--shadow-sm);
        border: 1px solid rgba(13,43,29,0.06);
        position: relative; overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: default;
    }
    .kp-stressor-card::before {
        content: '';
        position: absolute; top: 0; left: 0;
        width: 4px; height: 100%;
        background: linear-gradient(to bottom, var(--leaf), var(--moss));
        border-radius: 4px 0 0 4px;
        transform: scaleY(0); transform-origin: top;
        transition: transform 0.35s ease;
    }
    .kp-stressor-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
    .kp-stressor-card:hover::before { transform: scaleY(1); }
    .kp-stressor-icon {
        width: 52px; height: 52px; border-radius: 14px;
        background: var(--dew);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.4rem; margin-bottom: 18px;
        transition: background 0.3s;
    }
    .kp-stressor-card:hover .kp-stressor-icon { background: var(--mist); }
    .kp-stressor-title {
        font-weight: 600; font-size: 1rem;
        color: var(--canopy); margin-bottom: 8px;
    }
    .kp-stressor-desc {
        font-size: 0.84rem; color: var(--stone);
        line-height: 1.7; font-weight: 300;
    }

    /* ─── IMPACT (large dark section) ─── */
    .kp-impact-section {
        background: var(--canopy);
        padding: 88px 24px;
    }
    .kp-impact-section .kp-heading { color: var(--white); }
    .kp-impact-section .kp-eyebrow-text { color: var(--mist); }
    .kp-impact-section .kp-eyebrow-line { background: var(--mist); }
    .kp-impact-section .kp-body-text { color: rgba(255,255,255,0.5); }

    .kp-accordion { margin-top: 44px; display: flex; flex-direction: column; gap: 10px; }
    .kp-acc-item {
        border-radius: 16px;
        border: 1px solid rgba(255,255,255,0.08);
        background: rgba(255,255,255,0.04);
        overflow: hidden;
        transition: border-color 0.3s, background 0.3s;
    }
    .kp-acc-item.is-open {
        border-color: rgba(82,183,136,0.35);
        background: rgba(82,183,136,0.06);
    }
    .kp-acc-trigger {
        width: 100%; background: none; border: none; cursor: pointer;
        padding: 22px 24px;
        display: flex; align-items: center; gap: 18px; text-align: left;
    }
    .kp-acc-num {
        width: 34px; height: 34px; flex-shrink: 0;
        border-radius: 50%;
        background: rgba(82,183,136,0.15);
        border: 1px solid rgba(82,183,136,0.25);
        color: var(--leaf); font-size: 0.8rem; font-weight: 600;
        display: flex; align-items: center; justify-content: center;
        transition: background 0.3s, color 0.3s;
    }
    .is-open .kp-acc-num { background: var(--leaf); color: var(--forest); border-color: var(--leaf); }
    .kp-acc-label {
        flex: 1; font-size: 0.97rem; font-weight: 500; color: rgba(255,255,255,0.85);
    }
    .kp-acc-chevron {
        color: rgba(255,255,255,0.3);
        transition: transform 0.35s cubic-bezier(.4,0,.2,1);
        flex-shrink: 0;
    }
    .is-open .kp-acc-chevron { transform: rotate(180deg); color: var(--leaf); }
    .kp-acc-body {
        padding: 0 24px 22px 76px;
        font-size: 0.88rem; font-weight: 300;
        color: rgba(255,255,255,0.55);
        line-height: 1.85;
    }

    /* ─── TIPS SECTION ─── */
    .kp-tips-section { background: var(--dew); padding: 88px 24px; }
    .kp-tips-section .kp-heading { color: var(--canopy); }
    .kp-tip-stage {
        margin-top: 44px;
        position: relative;
    }
    .kp-tip-card {
        background: var(--white);
        border-radius: 24px;
        padding: 44px 40px;
        box-shadow: var(--shadow-md);
        position: relative; overflow: hidden;
        min-height: 200px;
        display: flex; flex-direction: column; justify-content: center;
    }
    .kp-tip-card::after {
        content: '';
        position: absolute; bottom: 0; left: 0;
        height: 4px; width: 100%;
        background: linear-gradient(90deg, var(--leaf), var(--gold));
    }
    .kp-tip-num {
        font-size: 0.68rem; font-weight: 600;
        letter-spacing: 2.5px; text-transform: uppercase;
        color: var(--leaf); margin-bottom: 16px;
    }
    .kp-tip-text {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(1.15rem, 2.5vw, 1.55rem);
        font-style: italic;
        color: var(--canopy); line-height: 1.55;
    }
    .kp-tip-nav {
        display: flex; align-items: center;
        justify-content: center; gap: 16px;
        margin-top: 24px;
    }
    .kp-tip-btn {
        width: 44px; height: 44px; border-radius: 50%;
        border: 1.5px solid rgba(45,106,79,0.3);
        background: white; color: var(--moss);
        cursor: pointer; font-size: 1.1rem;
        display: flex; align-items: center; justify-content: center;
        transition: all 0.2s;
    }
    .kp-tip-btn:hover { background: var(--moss); color: white; border-color: var(--moss); }
    .kp-tip-dots { display: flex; gap: 6px; }
    .kp-tip-dot {
        width: 7px; height: 7px; border-radius: 50%;
        border: none; cursor: pointer;
        transition: all 0.25s;
    }

    /* ─── COMMITMENT PILLS ─── */
    .kp-commitment-section { padding: 88px 24px; background: var(--ivory); }
    .kp-pills {
        display: flex; flex-wrap: wrap; gap: 10px;
        margin-top: 32px;
    }
    .kp-pill {
        background: var(--white);
        border: 1.5px solid rgba(45,106,79,0.18);
        color: var(--moss);
        border-radius: 99px;
        padding: 10px 22px;
        font-size: 0.83rem; font-weight: 500;
        cursor: pointer;
        transition: all 0.22s ease;
        user-select: none;
    }
    .kp-pill:hover {
        border-color: var(--leaf);
        background: var(--dew);
        transform: translateY(-2px);
    }
    .kp-pill.active {
        background: var(--canopy); color: white;
        border-color: var(--canopy);
    }
    .kp-affirm-msg {
        margin-top: 20px; font-size: 0.85rem;
        color: var(--moss); font-weight: 500;
        display: flex; align-items: center; gap: 8px;
    }
    .kp-affirm-dot {
        width: 8px; height: 8px; border-radius: 50%;
        background: var(--leaf); flex-shrink: 0;
    }

    /* ─── CALL TO ACTION BANNER ─── */
    .kp-cta-section { padding: 0 24px 88px; }
    .kp-cta-inner {
        background: var(--forest);
        border-radius: 28px;
        padding: 64px 48px;
        display: flex; flex-direction: column; align-items: center;
        text-align: center; position: relative; overflow: hidden;
    }
    .kp-cta-inner::before {
        content: ''; position: absolute;
        inset: 0;
        background: 
            radial-gradient(ellipse at 20% 50%, rgba(82,183,136,0.12) 0%, transparent 60%),
            radial-gradient(ellipse at 80% 20%, rgba(233,168,76,0.08) 0%, transparent 55%);
        pointer-events: none;
    }
    .kp-cta-inner h2 {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(2rem, 5vw, 3.2rem);
        color: white; line-height: 1.15; font-weight: 600;
        position: relative; margin-bottom: 16px;
    }
    .kp-cta-inner h2 em { font-style: italic; color: var(--gold); }
    .kp-cta-inner p {
        color: rgba(255,255,255,0.5); font-size: 0.95rem;
        max-width: 460px; line-height: 1.75; font-weight: 300;
        position: relative; margin-bottom: 36px;
    }
    .kp-btn {
        display: inline-flex; align-items: center; gap: 10px;
        border: none; cursor: pointer;
        font-family: 'Outfit', sans-serif;
        font-weight: 600; font-size: 0.88rem;
        letter-spacing: 0.3px;
        padding: 16px 36px; border-radius: 99px;
        transition: transform 0.2s, box-shadow 0.2s;
        position: relative;
    }
    .kp-btn-gold {
        background: var(--gold); color: var(--forest);
    }
    .kp-btn-gold:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 36px rgba(233,168,76,0.4);
    }
    .kp-btn-outline {
        background: transparent;
        color: rgba(255,255,255,0.6);
        border: 1.5px solid rgba(255,255,255,0.2);
        margin-top: 12px;
    }
    .kp-btn-outline:hover {
        border-color: rgba(255,255,255,0.5);
        color: white;
        transform: translateY(-2px);
    }

    /* ─── PLEDGE ─── */
    .kp-pledge-section { background: var(--dew); padding: 88px 24px; }
    .kp-pledge-section .kp-heading { text-align: center; }
    .kp-pledge-section .kp-eyebrow { justify-content: center; }
    .kp-pledge-card {
        background: var(--white);
        border-radius: 24px;
        padding: 52px 44px;
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(82,183,136,0.15);
        text-align: center;
        max-width: 680px;
        margin: 40px auto 0;
        position: relative; overflow: hidden;
    }
    .kp-pledge-card::before {
        content: '';
        position: absolute; top: 0; left: 0; right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--leaf), var(--moss), var(--gold));
    }
    .kp-pledge-text {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(1.1rem, 2.5vw, 1.45rem);
        font-style: italic; line-height: 1.65;
        color: var(--canopy); margin-bottom: 36px;
    }
    .kp-pledge-btn {
        background: var(--canopy); color: white;
        padding: 16px 40px;
        font-size: 0.9rem; font-weight: 600;
    }
    .kp-pledge-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 32px rgba(13,43,29,0.25);
    }
    .kp-pledge-success {
        animation: successPop 0.5s cubic-bezier(.175,.885,.32,1.275) both;
    }
    @keyframes successPop {
        from { transform: scale(0.85); opacity: 0; }
        to   { transform: scale(1); opacity: 1; }
    }
    .kp-pledge-count-big {
        font-family: 'Cormorant Garamond', serif;
        font-size: 4rem; font-weight: 600;
        color: var(--canopy); line-height: 1;
        margin-bottom: 4px;
    }
    .kp-pledge-count-label {
        font-size: 0.7rem; font-weight: 600;
        letter-spacing: 2.5px; text-transform: uppercase;
        color: var(--stone); margin-bottom: 24px;
    }
    .kp-pledge-badge {
        display: inline-flex; align-items: center; gap: 10px;
        background: var(--dew); color: var(--moss);
        border: 1px solid rgba(82,183,136,0.3);
        border-radius: 14px; padding: 14px 24px;
        font-size: 0.88rem; font-weight: 500;
    }

    /* ─── FOOTER ─── */
    .kp-footer {
        background: var(--forest);
        padding: 60px 24px 40px;
        text-align: center;
    }
    .kp-footer-logo {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.5rem; font-weight: 600;
        color: white; margin-bottom: 8px;
    }
    .kp-footer-logo span { color: var(--leaf); font-style: italic; }
    .kp-footer-tagline {
        font-size: 0.78rem; font-weight: 300;
        letter-spacing: 1.5px; color: rgba(255,255,255,0.3);
        text-transform: uppercase; margin-bottom: 28px;
    }
    .kp-footer-divider {
        width: 40px; height: 1px;
        background: rgba(82,183,136,0.4);
        margin: 0 auto 20px;
    }
    .kp-footer-copy {
        font-size: 0.78rem; color: rgba(255,255,255,0.2);
        line-height: 2;
    }

    /* ─── REVEAL ANIMATIONS ─── */
    .reveal {
        opacity: 0; transform: translateY(32px);
        transition: opacity 0.7s ease, transform 0.7s ease;
    }
    .reveal.visible {
        opacity: 1; transform: translateY(0);
    }
    .reveal-delay-1 { transition-delay: 0.1s; }
    .reveal-delay-2 { transition-delay: 0.2s; }
    .reveal-delay-3 { transition-delay: 0.3s; }
    .reveal-delay-4 { transition-delay: 0.4s; }

    [x-cloak] { display: none !important; }
</style>

<div class="kp-root" x-data="kuppetMH()" @scroll.window="onScroll()">

    {{-- PROGRESS --}}
    <div class="kp-progress">
        <div class="kp-progress-fill" :style="`width:${progress}%`"></div>
    </div>

    {{-- ══ HERO ══ --}}
    <section class="kp-hero">
        <div class="kp-hero-glow glow-a"></div>
        <div class="kp-hero-glow glow-b"></div>
        <div class="kp-hero-glow glow-c"></div>
        <div class="kp-hero-lines">
            @foreach([15,30,45,60,75,90] as $pct)
            <span style="top:{{$pct}}%"></span>
            @endforeach
        </div>

        <div class="kp-hero-inner">
            <div class="kp-campaign-tag">
                KUPPET Homa Bay Branch &nbsp;·&nbsp; May 2026  Awareness Campaign
            </div>

            <h1>Your Mind<br><em>Matters.</em></h1>
            <p class="kp-hero-sub-title">Protecting Teacher Mental Health &amp; Wellness</p>
            <div class="kp-hero-divider"></div>
            <p class="kp-hero-desc">
                A message of solidarity, care, and hope for every teacher across Homa Bay County.
                You pour your whole self into shaping lives. Let us help protect yours.
            </p>

            <div class="kp-hero-stats">
                <div class="kp-stat">
                    <strong>1 in 3</strong>
                    <span>Teachers face burnout</span>
                </div>
                <div class="kp-stat">
                    <strong>60%</strong>
                    <span>Report high daily stress</span>
                </div>
                <div class="kp-stat">
                    <strong>100%</strong>
                    <span>We stand with you</span>
                </div>
            </div>
        </div>

        <div class="kp-scroll-cue">
            <div class="kp-scroll-cue-line"></div>
            Scroll
        </div>
    </section>

    {{-- ══ PULL QUOTE ══ --}}
    <section class="kp-pullquote-section">
        <div class="kp-pullquote reveal">
            <span class="kp-pullquote-mark">"</span>
            <p>
                Teaching is a calling that demands patience, sacrifice, and resilience —
                but no calling should cost you your peace of mind.
            </p>
            <cite>— KUPPET Homa Bay Branch</cite>
        </div>
    </section>

    {{-- ══ WHAT TEACHERS CARRY ══ --}}
    <section class="kp-section" style="background:var(--ivory);">
        <div class="kp-wrap">
            <div class="kp-eyebrow reveal">
                <span class="kp-eyebrow-line"></span>
                <span class="kp-eyebrow-text">Understanding the struggle</span>
            </div>
            <h2 class="kp-heading reveal reveal-delay-1">What Teachers Carry <em>Daily</em></h2>
            <p class="kp-body-text reveal reveal-delay-2">
                Behind every cheerful classroom is a teacher quietly managing burdens that rarely make it into the staffroom conversation.
            </p>

            <div class="kp-stressor-grid">
                <div class="kp-stressor-card reveal reveal-delay-1">
                    <div class="kp-stressor-icon">📚</div>
                    <div class="kp-stressor-title">Heavy Workload</div>
                    <div class="kp-stressor-desc">Lesson planning, marking, reporting, and performance targets stretch well beyond contracted hours — often bleeding into evenings and weekends.</div>
                </div>
                <div class="kp-stressor-card reveal reveal-delay-2">
                    <div class="kp-stressor-icon">🏠</div>
                    <div class="kp-stressor-title">Work–Life Balance</div>
                    <div class="kp-stressor-desc">Carrying the emotional weight of a full classroom home alongside personal and family responsibilities is an invisible daily marathon.</div>
                </div>
                <div class="kp-stressor-card reveal reveal-delay-3">
                    <div class="kp-stressor-icon">💸</div>
                    <div class="kp-stressor-title">Financial Pressure</div>
                    <div class="kp-stressor-desc">Rising costs, loan obligations, and salary delays create silent, grinding anxiety that follows teachers everywhere they go.</div>
                </div>
                <div class="kp-stressor-card reveal reveal-delay-4">
                    <div class="kp-stressor-icon">🫀</div>
                    <div class="kp-stressor-title">Emotional Labour</div>
                    <div class="kp-stressor-desc">Absorbing students' pain, community expectations, and parental pressure takes a profound toll that is rarely acknowledged or compensated.</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══ WHY IT MATTERS ══ --}}
    <section class="kp-impact-section">
        <div class="kp-wrap">
            <div class="kp-eyebrow reveal">
                <span class="kp-eyebrow-line"></span>
                <span class="kp-eyebrow-text">The ripple effect</span>
            </div>
            <h2 class="kp-heading reveal reveal-delay-1">Why Your Mental Health<br><em>Shapes Everything</em></h2>
            <p class="kp-body-text reveal reveal-delay-2">
                A teacher's inner world radiates outward. When you are depleted, every part of your work — and life — feels it. Tap each area to understand why this matters.
            </p>

            <div class="kp-accordion reveal reveal-delay-3">
                <template x-for="(item, i) in impacts" :key="i">
                    <div class="kp-acc-item" :class="{ 'is-open': openAcc === i }">
                        <button class="kp-acc-trigger" @click="openAcc = openAcc === i ? null : i">
                            <span class="kp-acc-num" x-text="i + 1"></span>
                            <span class="kp-acc-label" x-text="item.title"></span>
                            <svg class="kp-acc-chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>
                        </button>
                        <div class="kp-acc-body" x-show="openAcc === i" x-transition x-cloak x-text="item.body"></div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    {{-- ══ TIPS ══ --}}
    <section class="kp-tips-section">
        <div class="kp-wrap">
            <div class="kp-eyebrow reveal">
                <span class="kp-eyebrow-line"></span>
                <span class="kp-eyebrow-text">Small steps, big difference</span>
            </div>
            <h2 class="kp-heading reveal reveal-delay-1">Daily Wellness <em>Practices</em></h2>
            <p class="kp-body-text reveal reveal-delay-2" style="margin-bottom:0;">
                You don't need a grand gesture. Tiny, consistent acts of self-care rebuild the resilience that teaching demands.
            </p>

            <div class="kp-tip-stage reveal reveal-delay-3">
                <div class="kp-tip-card">
                    <div class="kp-tip-num">Practice <span x-text="tipIdx + 1"></span> of <span x-text="tips.length"></span></div>
                    <div class="kp-tip-text" x-text="tips[tipIdx]"></div>
                </div>
                <div class="kp-tip-nav">
                    <button class="kp-tip-btn" @click="tipIdx = (tipIdx - 1 + tips.length) % tips.length">←</button>
                    <div class="kp-tip-dots">
                        <template x-for="(t, i) in tips" :key="i">
                            <button class="kp-tip-dot" @click="tipIdx = i"
                                :style="`background: ${tipIdx === i ? 'var(--canopy)' : 'var(--mist)'};`"></button>
                        </template>
                    </div>
                    <button class="kp-tip-btn" @click="tipIdx = (tipIdx + 1) % tips.length">→</button>
                </div>
            </div>
        </div>
    </section>

    {{-- ══ KUPPET COMMITMENTS ══ --}}
    <section class="kp-commitment-section">
        <div class="kp-wrap">
            <div class="kp-eyebrow reveal">
                <span class="kp-eyebrow-line"></span>
                <span class="kp-eyebrow-text">Our promise to you</span>
            </div>
            <h2 class="kp-heading reveal reveal-delay-1">KUPPET Homa Bay <em>Stands With You</em></h2>
            <p class="kp-body-text reveal reveal-delay-2">
                As your union, we are committed to your whole self — not just your career. These are not just words. Select each commitment to affirm it together.
            </p>

            <div class="kp-pills reveal reveal-delay-3">
                <template x-for="(item, i) in commitments" :key="i">
                    <span class="kp-pill" :class="{ active: selected.includes(i) }" @click="toggleSel(i)" x-text="item"></span>
                </template>
            </div>

            <div x-show="selected.length > 0" x-transition class="kp-affirm-msg">
                <span class="kp-affirm-dot"></span>
                <span x-text="selected.length"></span> commitment<span x-show="selected.length > 1">s</span> affirmed. Together, we are stronger.
            </div>
        </div>
    </section>

    {{-- ══ CTA BANNER ══ --}}
    <section class="kp-cta-section">
        <div class="kp-wrap">
            <div class="kp-cta-inner reveal">
                <h2>You Are Not <em>Alone.</em></h2>
                <p>
                    If you are struggling — speak up. Reach out. Seek support.
                    Asking for help is not a sign of weakness. It is an act of profound courage.
                </p>
                <button class="kp-btn kp-btn-gold" onclick="document.getElementById('kp-pledge').scrollIntoView({behavior:'smooth'})">
                    Take the Wellness Pledge
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </button>
                <button class="kp-btn kp-btn-outline">
                    Contact Your KUPPET Rep →
                </button>
            </div>
        </div>
    </section>

    {{-- ══ PLEDGE ══ --}}
    <section class="kp-pledge-section" id="kp-pledge">
        <div class="kp-wrap">
            <div class="kp-eyebrow reveal" style="justify-content:center;">
                <span class="kp-eyebrow-line"></span>
                <span class="kp-eyebrow-text">Join the movement</span>
                <span class="kp-eyebrow-line"></span>
            </div>
            <h2 class="kp-heading reveal reveal-delay-1" style="text-align:center;">The Wellness <em>Pledge</em></h2>

            <div class="kp-pledge-card reveal reveal-delay-2">
                <p class="kp-pledge-text">
                    "I pledge to prioritize my mental well-being, to check on my colleagues with sincerity,
                    to speak openly without shame, and to help build a culture of genuine care in my school community."
                </p>

                <div x-show="!pledged">
                    <button class="kp-btn kp-pledge-btn" @click="pledge()">
                        🤝 &nbsp;I Take This Pledge
                    </button>
                </div>

                <div x-show="pledged" x-cloak class="kp-pledge-success">
                    <div class="kp-pledge-count-big" x-text="pledgeCount"></div>
                    <div class="kp-pledge-count-label">Teachers have pledged</div>
                    <div class="kp-pledge-badge">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        Thank you. You are part of something real.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══ FOOTER ══ --}}
    <footer class="kp-footer">
        <div class="kp-footer-logo">KUPPET <span>Homa Bay</span></div>
        <div class="kp-footer-tagline">Kenya Union of Post Primary Education Teachers</div>
        <div class="kp-footer-divider"></div>
        <div class="kp-footer-copy">
            Caring for Teachers &nbsp;·&nbsp; Strengthening Education &nbsp;·&nbsp; Homa Bay County<br>
            Mental health is not a weakness — it is the foundation of everything we do.
        </div>
    </footer>

</div>

<script>
function kuppetMH() {
    return {
        progress: 0,
        openAcc: 0,
        tipIdx: 0,
        selected: [],
        pledged: false,
        pledgeCount: 247,

        impacts: [
            {
                title: 'Teaching Effectiveness',
                body: 'Mental exhaustion makes it harder to deliver engaging lessons, respond patiently to students, and sustain the classroom energy that real learning demands. Cognitive load from chronic stress depletes the very resources that make great teaching possible — not from lack of effort, but from a system running on empty.'
            },
            {
                title: 'Decision-Making & Judgement',
                body: 'Chronic stress impairs the prefrontal cortex — the brain region responsible for calm reasoning, planning, and measured judgement. A teacher under sustained pressure tends to react rather than respond thoughtfully, which affects discipline, conflict resolution, and hundreds of daily micro-decisions in the classroom.'
            },
            {
                title: 'Relationships with Students & Colleagues',
                body: 'Emotional fatigue quietly erodes empathy and patience. Small frictions become larger conflicts. When we are running on empty, it becomes harder to listen deeply, collaborate meaningfully, or notice when a student — or a colleague — is silently struggling and needs us to simply see them.'
            },
            {
                title: 'Your Life Beyond the Classroom',
                body: 'The effects do not stay at school. Anxiety, disrupted sleep, irritability, and emotional withdrawal seep into family life, physical health, and your sense of personal purpose and identity. Protecting your mental health is not selfish — it is protecting your whole life, and everyone who depends on you.'
            }
        ],

        tips: [
            'Start your morning with 5 intentional minutes of quiet before the day begins — no phone, no planning, just breathing and stillness.',
            'Take a short walk during break time. Even brief movement resets the nervous system and clears accumulated mental fog.',
            'Name one thing that went well today. Practising gratitude consistently, even imperfectly, gradually rewires how the brain processes stress.',
            'Check on a colleague with sincerity. Asking "How are you really doing?" takes 30 seconds and can mean everything to someone carrying weight silently.',
            'Protect one phone-free hour each evening. Guard your mental space from the constant pull of notifications and obligations.',
            'Treat sleep as a professional responsibility — a rested teacher is measurably more present, patient, and effective than an exhausted one.',
        ],

        commitments: [
            '🗣️ Promote mental health awareness',
            '🤝 Encourage open conversations',
            '⚖️ Advocate for fair working conditions',
            '🚫 Stand firmly against stigma',
            '💚 Support struggling colleagues',
            '📣 Amplify every teacher\'s voice',
            '🌱 Champion whole-teacher wellbeing',
            '🛡️ Defend dignified working environments',
        ],

        onScroll() {
            const el = document.documentElement;
            const s = window.scrollY || el.scrollTop;
            const h = el.scrollHeight - el.clientHeight;
            this.progress = h > 0 ? (s / h) * 100 : 0;

            // reveal on scroll
            document.querySelectorAll('.reveal').forEach(el => {
                const top = el.getBoundingClientRect().top;
                if (top < window.innerHeight * 0.88) {
                    el.classList.add('visible');
                }
            });
        },

        toggleSel(i) {
            const idx = this.selected.indexOf(i);
            if (idx === -1) this.selected.push(i);
            else this.selected.splice(idx, 1);
        },

        pledge() {
            this.pledged = true;
            this.pledgeCount++;
        },

        init() {
            // trigger initial reveal check
            this.$nextTick(() => this.onScroll());
        }
    }
}
</script>

@endsection