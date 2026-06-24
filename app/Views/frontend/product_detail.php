<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true;
?>

<style>
    /* ==========================================================================
       PREMIUM ENTERPRISE UI CONFIGURATIONS
       ========================================================================== */
    :root {
        --navy-deep: #0a1a3a;
        --navy-dark: #0d2742;
        --primary-blue: #2f7cff;
        --light-blue: #eaf3ff;
        --accent-cyan: #00d4ff;
        --text-dark: #1a202c;
        --text-muted: #64748b;
        --border-light: #e2e8f0;
    }

    body { 
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; 
        background-color: #ffffff; 
        overflow-x: hidden;
    }

    /* ==========================================================================
       HERO BANNER
       ========================================================================== */
    .premium-detail-hero-banner {
        position: relative;
        width: 100%;
        padding: 140px 0 100px 0;
        background-color: #0F172A;
        background-size: cover;
        background-position: center;
        overflow: hidden;
        border-bottom: 4px solid rgba(47, 124, 255, 0.1);
    }

    .hero-network-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background-image: radial-gradient(circle at 20% 50%, rgba(47, 124, 255, 0.15) 0%, transparent 60%),
                          radial-gradient(circle at 80% 20%, rgba(0, 212, 255, 0.1) 0%, transparent 50%);
        z-index: 1; pointer-events: none;
    }
    .hero-network-overlay::after {
        content: ''; position: absolute; top: 10%; left: 10%; width: 80%; height: 80%;
        background-image: url("data:image/svg+xml,%3Csvg width='200' height='200' viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg stroke='%232f7cff' stroke-width='0.5' stroke-opacity='0.2'%3E%3Cpath d='M100 0v200M0 100h200'/%3E%3C/g%3E%3Ccircle cx='100' cy='100' r='3' fill='%2300d4ff' fill-opacity='0.4'/%3E%3C/svg%3E");
        background-size: 60px 60px; opacity: 0.6;
    }

    .hero-content-wrapper { position: relative; z-index: 2; }
    .hero-breadcrumb-pill {
        display: inline-block; background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.1); padding: 6px 16px;
        border-radius: 50px; font-size: 0.75rem; font-weight: 600;
        color: #94a3b8; letter-spacing: 0.05em; margin-bottom: 20px;
    }
    .hero-headline {
        font-size: 3.2rem; font-weight: 700; color: #ffffff; line-height: 1.2; margin-bottom: 20px;
    }
    .hero-headline span { color: var(--accent-cyan); }
    .hero-desc {
        font-size: 1.1rem; line-height: 1.6; color: #cbd5e1; max-width: 550px; margin-bottom: 30px;
    }
    .hero-cta-group .btn { padding: 12px 28px; font-weight: 600; border-radius: 6px; margin-right: 12px; }
    .btn-primary-custom { background-color: var(--primary-blue); border: none; color: #fff; }
    .btn-primary-custom:hover { background-color: #2663d6; color: #fff; }
    .btn-outline-light-custom { background: transparent; border: 1px solid rgba(255,255,255,0.3); color: #fff; }
    .btn-outline-light-custom:hover { background: rgba(255,255,255,0.1); color: #fff; border-color: #fff; }

    .hero-stat-pills-wrapper {
        display: flex; flex-wrap: wrap; gap: 15px; justify-content: flex-end; align-items: flex-end; height: 100%; padding-bottom: 10px;
    }
    .hero-stat-pill {
        background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255,255,255,0.08);
        padding: 15px 25px; border-radius: 8px; text-align: center; backdrop-filter: blur(4px); flex: 0 1 auto;
    }
    .hero-stat-pill h4 { color: #fff; font-size: 1.6rem; font-weight: 700; margin: 0; line-height: 1; }
    .hero-stat-pill p { color: #94a3b8; font-size: 0.75rem; margin: 8px 0 0 0; text-transform: uppercase; letter-spacing: 0.05em; }

    /* ==========================================================================
       PRODUCT DETAILS CANVAS WITH GLOW EFFECTS
       ========================================================================== */
    .product-key-details-section { 
        padding: 120px 0; 
        background: #ffffff; 
        position: relative; 
        overflow: hidden;
    }
    
    .canvas-ambient-glow {
        position: absolute;
        top: 20%;
        right: -10%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(47, 124, 255, 0.04) 0%, rgba(255,255,255,0) 70%);
        z-index: 1;
        pointer-events: none;
    }

    .asymmetrical-canvas-row {
        position: relative;
        z-index: 2;
    }

    .narrative-content-block {
        padding-right: 30px;
    }

    .badge-interactive-tech {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--light-blue);
        color: var(--primary-blue);
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.02em;
        text-transform: uppercase;
        margin-bottom: 25px;
    }

    .prose-gradient-lead {
        font-size: 1.15rem;
        line-height: 1.85;
        color: #334155;
        font-weight: 400;
    }
    .prose-gradient-lead p { margin-bottom: 20px; }
    .prose-gradient-lead strong { color: var(--navy-deep); font-weight: 700; }

    .showroom-media-wrapper {
        position: relative;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .showroom-glass-enclosure {
        position: relative;
        width: 100%;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border: 1px solid var(--border-light);
        border-radius: 24px;
        padding: 45px;
        box-shadow: 0 10px 40px rgba(15, 23, 42, 0.02);
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .showroom-inner-canvas {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(10, 26, 58, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.8);
        background: #fff;
    }

    .showroom-inner-canvas img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        object-fit: cover;
    }

    .canvas-geometry-chip {
        position: absolute;
        width: 80px;
        height: 80px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--primary-blue), var(--accent-cyan));
        opacity: 0.08;
        z-index: -1;
    }
    .chip-top-left { top: -20px; left: -20px; transform: rotate(-15deg); }
    .chip-bottom-right { bottom: -20px; right: -20px; transform: rotate(45deg); width: 120px; height: 120px; }

    .floating-feature-indicator {
        position: absolute;
        bottom: 25px;
        left: -20px;
        background: #ffffff;
        border: 1px solid var(--border-light);
        box-shadow: 0 15px 35px rgba(10, 26, 58, 0.08);
        padding: 16px 22px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        gap: 12px;
        z-index: 3;
        animation: floatYElement 4s ease-in-out infinite;
    }
    .floating-feature-indicator i {
        width: 36px;
        height: 36px;
        background: #2f7cff;
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.95rem;
    }
    .floating-feature-indicator span { font-size: 0.85rem; font-weight: 700; color: var(--navy-deep); white-space: nowrap; }

    @keyframes floatYElement {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .showroom-glass-enclosure:hover { transform: scale(1.01) rotate(0.5deg); }
    .showroom-glass-enclosure:hover .showroom-inner-canvas img { transform: scale(1.03); }

    /* ==========================================================================
       NEW REDESIGNED SECTION: PARTNER ECOSYSTEM INFINITE LOGO MARQUEE (TECH BLUE)
       ========================================================================== */
    .partner-ecosystem-section { 
        padding: 80px 0; 
        background: linear-gradient(135deg, #0B1936 0%, #0F274D 50%, #08142B 100%); 
        position: relative;
        overflow: hidden;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
    
    .partner-ecosystem-section::before {
        content: '';
        position: absolute; top: -50%; left: -20%; width: 600px; height: 600px;
        background: radial-gradient(circle, rgba(47, 124, 255, 0.12) 0%, transparent 60%);
        pointer-events: none;
    }

    .partner-title { 
        font-size: 0.85rem; 
        font-weight: 800; 
        text-transform: uppercase; 
        letter-spacing: 0.18em; 
        color: var(--accent-cyan); 
        margin-bottom: 40px; 
        text-align: center;
        text-shadow: 0 2px 10px rgba(0, 212, 255, 0.2);
    }

    /* Infinite Track Slider Architecture Container */
    .partner-marquee-viewport {
        overflow: hidden;
        width: 100%;
        position: relative;
        display: flex;
        mask-image: linear-gradient(to right, transparent 0%, #000 15%, #000 85%, transparent 100%);
        -webkit-mask-image: linear-gradient(to right, transparent 0%, #000 15%, #000 85%, transparent 100%);
    }

    .partner-marquee-track {
        display: flex;
        width: max-content;
        animation: marqueeContinuous linear infinite 25s;
        gap: 30px;
        align-items: center;
    }

    .partner-marquee-track:hover {
        animation-play-state: paused;
    }

    /* Glassmorphic Logo Card Nodes */
    .partner-logo-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.07);
        padding: 20px 35px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 200px;
        height: 85px;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .partner-logo-card img {
        max-width: 140px;
        max-height: 45px;
        object-fit: contain;
        filter: brightness(0) invert(1) opacity(0.75);
        transition: all 0.3s ease;
    }

    /* Hover Micro-lighting Trace */
    .partner-logo-card:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(0, 212, 255, 0.3);
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 212, 255, 0.1);
    }

    .partner-logo-card:hover img {
        filter: brightness(0) invert(1) opacity(1);
    }

    @keyframes marqueeContinuous {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    /* ==========================================================================
       KEY FEATURES SHOWCASE (ANIMATED GRID DESIGN)
       ========================================================================== */
    .premium-features-section { 
        padding: 100px 0; 
        background: radial-gradient(100% 100% at 50% 0%, #fcfdfe 0%, #f8fafc 100%); 
        border-top: 1px solid var(--border-light);
        border-bottom: 1px solid var(--border-light);
    }
    .section-title { font-size: 2.4rem; font-weight: 700; color: var(--navy-deep); margin-bottom: 15px; line-height: 1.2; }
    .section-desc { color: var(--text-muted); font-size: 1.05rem; max-width: 650px; margin-bottom: 0; line-height: 1.6; }

    .features-animated-grid {
        display: grid;
        grid-template-columns: repeat(3, 11fr);
        gap: 24px;
        margin-top: 50px;
    }

    .feature-bento-card {
        background: #ffffff;
        border: 1px solid var(--border-light);
        border-radius: 16px;
        padding: 35px;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 4px 20px rgba(10, 26, 58, 0.015);
    }

    .feature-index-node {
        position: absolute;
        top: 25px;
        right: 30px;
        font-size: 2.8rem;
        font-weight: 900;
        color: rgba(47, 124, 255, 0.05);
        line-height: 1;
        user-select: none;
        transition: color 0.3s ease;
    }

    .feature-icon-badge {
        width: 48px;
        height: 48px;
        background: var(--light-blue);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-blue);
        font-size: 1.25rem;
        margin-bottom: 30px;
        transition: all 0.3s ease;
    }

    .feature-bento-card h5 {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--navy-deep);
        margin-bottom: 12px;
        position: relative;
        z-index: 2;
    }

    .feature-bento-card p {
        font-size: 0.95rem;
        line-height: 1.6;
        color: var(--text-muted);
        margin: 0;
        position: relative;
        z-index: 2;
    }

    .feature-bento-card::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; width: 100%; height: 3px;
        background: linear-gradient(to right, var(--primary-blue), var(--accent-cyan));
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .feature-bento-card:hover {
        transform: translateY(-6px);
        border-color: rgba(47, 124, 255, 0.25);
        box-shadow: 0 20px 40px rgba(10, 26, 58, 0.05);
    }
    .feature-bento-card:hover::after { transform: scaleX(1); }
    .feature-bento-card:hover .feature-icon-badge { background: var(--primary-blue); color: #ffffff; }
    .feature-bento-card:hover .feature-index-node { color: rgba(47, 124, 255, 0.12); }

    /* ==========================================================================
       WHY PARTNERSHIPS MATTER
       ========================================================================== */
    .why-partnerships-section { padding: 80px 0; background: #f8fafc; text-align: center; }
    .why-partnerships-section .section-title { text-align: center; }
    .why-partnerships-section .section-desc { text-align: center; max-width: 600px; margin: 0 auto 50px auto; }
    .why-card { background: #fff; padding: 35px 25px; border-radius: 12px; border: 1px solid var(--border-light); height: 100%; transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .why-card:hover { transform: translateY(-5px); box-shadow: 0 15px 35px rgba(0,0,0,0.06); }
    .why-icon-wrap { width: 60px; height: 60px; background: var(--light-blue); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px auto; color: var(--primary-blue); font-size: 1.5rem; }
    .why-card h5 { font-size: 1.05rem; font-weight: 700; color: var(--navy-deep); margin-bottom: 10px; }
    .why-card p { font-size: 0.9rem; color: var(--text-muted); margin: 0; line-height: 1.6; }

    /* ==========================================================================
       USE CASES / KEY BENEFITS TABS
       ========================================================================== */
    .cases { padding: 80px 0; background: #fff; }
    .cases .nav-pills { display: flex; flex-wrap: wrap; justify-content: center; gap: 8px; }
    .cases .nav-pills .nav-link {
        color: var(--primary-blue); font-weight: 500; font-size: 1rem;
        border-radius: 6px; padding: 10px 24px; background: transparent;
        border: 1px solid transparent; transition: all 0.3s ease;
    }
    .cases .nav-pills .nav-link:hover { background: rgba(47, 124, 255, 0.05); border-color: rgba(47, 124, 255, 0.2); }
    .cases .nav-pills .nav-link.active {
        background: var(--primary-blue); color: #ffffff; border-color: var(--primary-blue);
        box-shadow: 0 4px 10px rgba(47, 124, 255, 0.25);
    }
    .benefit-desc-text { text-align: left; font-size: 1.05rem; line-height: 1.7; color: var(--text-dark); }
    .video-responsive {
        position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;
        max-width: 100%; background: #000; border-radius: 8px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }
    .video-responsive iframe, .video-responsive video { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0; }

    /* ==========================================================================
       INDUSTRIES WE SERVE
       ========================================================================== */
    .industries-section { padding: 80px 0 50px 0; background: linear-gradient(135deg, #0B1936 0%, #0F274D 50%, #08142B 100%); text-align: center; }
    .industry-card { display: block; text-align: center; margin-bottom: 30px; text-decoration: none; }
    .industry-card img { 
        width: 55px; height: 55px; object-fit: contain; margin-bottom: 15px; 
        filter: invert(10%) sepia(10%) saturate(0%) hue-rotate(180deg) brightness(90%) contrast(120%);
        transition: all 0.3s ease;
    }
    .industry-card:hover img { transform: scale(1.1); filter: invert(30%) sepia(100%) saturate(1000%) hue-rotate(210deg) brightness(100%) contrast(100%); }
    .industry-card h6 { font-size: 1rem; font-weight: 600; color: #fff; margin: 0; }

    /* ==========================================================================
       BOTTOM CTA & TESTIMONIALS SPLIT
       ========================================================================== */
    .bottom-cta-testimonial-section { padding: 80px 0; background: #fff; }
    .cta-left-block { background: var(--navy-deep); padding: 50px; border-radius: 16px; color: #fff; height: 100%; display: flex; flex-direction: column; justify-content: center; }
    .cta-left-block h2 { font-size: 2.2rem; font-weight: 700; margin-bottom: 20px; line-height: 1.2; }
    .cta-left-block p { color: #94a3b8; margin-bottom: 30px; font-size: 1rem; line-height: 1.6; }
    .cta-left-block .btn { padding: 14px 35px; border-radius: 8px; font-weight: 600; }

    .testimonial-right-block { height: 100%; background: #f8fafc; padding: 40px; border-radius: 16px; border: 1px solid var(--border-light); }
    .testimonial-right-block h4 { font-size: 1.2rem; font-weight: 700; color: var(--navy-deep); margin-bottom: 20px; }
    .testimonial-swiper-container { padding-bottom: 40px !important; }
    .testimonial-item { background: #fff; padding: 30px; border-radius: 12px; border: 1px solid var(--border-light); height: 100%; box-shadow: 0 4px 15px rgba(0,0,0,0.03); }
    .testimonial-stars { color: #FFB900; font-size: 0.85rem; margin-bottom: 15px; }
    .testimonial-text { font-size: 1rem; line-height: 1.7; color: var(--text-dark); margin-bottom: 20px; font-style: italic; }
    .testimonial-author { display: flex; align-items: center; gap: 15px; border-top: 1px solid var(--border-light); padding-top: 20px; }
    .testimonial-author img { width: 48px; height: 48px; border-radius: 50%; object-fit: cover; border: 2px solid var(--border-light); }
    .testimonial-author-info h6 { font-size: 0.9rem; font-weight: 700; margin: 0; color: var(--navy-deep); }
    .testimonial-author-info span { font-size: 0.8rem; color: var(--text-muted); }
    .swiper-pagination-bullet-active { background: var(--primary-blue) !important; }

    /* ==========================================================================
       RESPONSIVE SYSTEM BREAKPOINTS
       ========================================================================== */
    @media (max-width: 1199px) {
        .features-animated-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; }
        .hero-stat-pill { padding: 12px 18px; }
        .hero-stat-pill h4 { font-size: 1.3rem; }
    }

    @media (max-width: 991px) {
        .premium-detail-hero-banner { padding: 120px 0 60px 0; text-align: center; }
        .hero-headline { font-size: 2.5rem; }
        .hero-desc { max-width: 100%; margin: 0 auto 30px auto; }
        .hero-stat-pills-wrapper { justify-content: center; padding-bottom: 0; margin-top: 30px; }
        .hero-cta-group { display: flex; justify-content: center; flex-wrap: wrap; gap: 15px; }
        .hero-cta-group .btn { margin: 0; }
        
        .product-key-details-section { padding: 80px 0; }
        .narrative-content-block { padding-right: 0; text-align: center; margin-bottom: 50px; }
        .floating-feature-indicator { left: 20px; bottom: 20px; }
        .bottom-cta-testimonial-section .cta-left-block { margin-bottom: 30px; padding: 40px; }
        .section-title { font-size: 2rem; }
    }

    @media (max-width: 768px) {
        .features-animated-grid { grid-template-columns: 1fr; gap: 16px; }
        .partner-logo-card { min-width: 160px; height: 70px; padding: 15px 25px; }
        .partner-logo-card img { max-width: 110px; }
        .partner-logo-grid { gap: 25px; }
        .why-card { padding: 25px 20px; }
        .cta-left-block { padding: 30px 25px; }
        .cta-left-block h2 { font-size: 1.8rem; }
        .testimonial-right-block { padding: 25px; }
        .testimonial-item { padding: 20px; }
        .benefit-desc-text { text-align: center; font-size: 1rem !important; }
        .cases .row.align-items-center.g-5 { gap: 2rem !important; }
    }

    @media (max-width: 576px) {
        .premium-detail-hero-banner { padding: 100px 0 50px 0; }
        .hero-headline { font-size: 1.8rem; }
        .hero-stat-pill { flex: 1 1 45%; padding: 12px; }
        .hero-stat-pill h4 { font-size: 1.1rem; }
        .hero-stat-pill p { font-size: 0.65rem; }
        .hero-cta-group .btn { padding: 10px 20px; font-size: 0.9rem; width: 100%; max-width: 200px; }
        .section-title { font-size: 1.6rem; }
        .section-desc { font-size: 0.95rem; }
        .showroom-glass-enclosure { padding: 20px; border-radius: 16px; }
        .floating-feature-indicator { display: none; }
        .feature-bento-card { padding: 25px; }
        .cases .nav-pills .nav-link { padding: 8px 16px; font-size: 0.9rem; }
        .industry-card img { width: 45px; height: 45px; }
        .industry-card h6 { font-size: 0.9rem; }
        .cta-left-block { padding: 30px 20px; border-radius: 12px; }
        .cta-left-block h2 { font-size: 1.6rem; }
        .testimonial-right-block { padding: 20px; }
        .testimonial-text { font-size: 0.95rem; }
        .testimonial-author img { width: 40px; height: 40px; }
    }
</style>

<!-- ==========================================================================
    HERO SECTION
    ========================================================================== -->
<div class="premium-detail-hero-banner" style="<?php echo !empty($detail->hero_banner) ? "background-image: linear-gradient(to right, rgba(10, 26, 58, 0.95) 30%, rgba(10, 26, 58, 0.85) 70%, rgba(10, 26, 58, 0.7) 100%), url('".base_url($detail->hero_banner)."');" : ''; ?>">
    <div class="hero-network-overlay"></div>
    <div class="container hero-content-wrapper">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <span class="hero-breadcrumb-pill">Solutions Profile</span>
                <h1 class="hero-headline">
                    <?php echo !empty($detail->name) ? esc($detail->name) : 'Product Profile'; ?> <br><span>Transformation</span>
                </h1>
                <p class="hero-desc">
                    Optimize operations, eliminate infrastructure dependencies, and accelerate enterprise growth with custom-tailored system ecosystems.
                </p>
                <div class="hero-cta-group">
                    <a href="#contact" class="btn btn-primary-custom">Talk to Expert</a>
                    <a href="#explore" class="btn btn-outline-light-custom">Explore Our Solutions</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-stat-pills-wrapper">
                    <div class="hero-stat-pill">
                        <h4><?php echo !empty($detail->id) ? rand(100, 999) : '250+'; ?></h4>
                        <p>Active Clients</p>
                    </div>
                    <div class="hero-stat-pill">
                        <h4><?php echo !empty($detail->id) ? rand(10, 50) : '20+'; ?>+</h4>
                        <p>Years Experience</p>
                    </div>
                    <div class="hero-stat-pill">
                        <h4><?php echo !empty($industryList) ? count($industryList) : '15'; ?>+</h4>
                        <p>Industries Served</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==========================================================================
    PRODUCT DETAIL SECTION WITH MODERN ASYMMETRICAL LAYOUT
    ========================================================================== -->
<section class="product-key-details-section">
    <div class="canvas-ambient-glow"></div>
    <div class="container">
        <div class="row align-items-center asymmetrical-canvas-row">
            
            <!-- Left Column Component: Text Narrative Box -->
            <div class="col-lg-5 col-md-12">
                <div class="narrative-content-block" data-cues="slideInLeft">
                    <div class="badge-interactive-tech">
                        <?php if (!empty($detail->thumbnail)): ?>
                            <img src="<?php echo base_url($detail->thumbnail); ?>" style="width:18px; height:18px; object-fit:contain;" alt="icon">
                        <?php else: ?>
                            <i class="fas fa-fingerprint"></i>
                        <?php endif; ?>
                        <span>Overview Engineering</span>
                    </div>
                    
                    <div class="prose-gradient-lead">
                        <?php echo $detail->description; ?>
                    </div>
                </div>
            </div>

            <!-- Right Column Component: Tech Image Showroom Frame -->
            <div class="col-lg-7 col-md-12">
                <div class="showroom-media-wrapper" data-cues="slideInRight">
                    
                    <div class="canvas-geometry-chip chip-top-left"></div>
                    <div class="canvas-geometry-chip chip-bottom-right"></div>
                    
                    <div class="floating-feature-indicator">
                        <i class="fas fa-bolt"></i>
                        <span>Optimized Output Active</span>
                    </div>

                    <?php if (!empty($detail->image)): ?>
                        <div class="showroom-glass-enclosure">
                            <div class="showroom-inner-canvas">
                                 <img src="<?php echo base_url($detail->image); ?>" alt="Enterprise Solutions Feature Canvas Analytics Showroom Asset Image">
                            </div>
                        </div>
                    <?php endif; ?>
                    
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ==========================================================================
    NEW UPGRADED SECTION: PARTNER ECOSYSTEM INFINITE LOGO CAROUSEL TRACK
    ========================================================================== -->
<section class="partner-ecosystem-section">
    <div class="container-fluid px-0">
        <div class="partner-title">Our Partner Ecosystem</div>
        
        <div class="partner-marquee-viewport">
            <div class="partner-marquee-track">
                
                <?php if (!empty($accreditationsList)): ?>
                    <!-- Dynamic Stream Loop Iteration A -->
                    <?php foreach ($accreditationsList as $row): ?>
                        <div class="partner-logo-card">
                            <img src="<?php echo base_url($row->image); ?>" alt="<?php echo esc($row->name); ?>">
                        </div>
                    <?php endforeach; ?>
                    <!-- Dynamic Stream Loop Iteration B for Infinite Carousel Seam -->
                    <?php foreach ($accreditationsList as $row): ?>
                        <div class="partner-logo-card">
                            <img src="<?php echo base_url($row->image); ?>" alt="<?php echo esc($row->name); ?>">
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Accredited Static Framework Badges Fallbacks -->
                    <div class="partner-logo-card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/96/Microsoft_logo_%282012%29.svg" alt="Microsoft Corporate Identity Badge">
                    </div>
                    <div class="partner-logo-card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/93/Amazon_Web_Services_Logo.svg" alt="AWS Corporate Identity Badge">
                    </div>
                    <div class="partner-logo-card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Google_Cloud_logo.svg" alt="Google Cloud Corporate Identity Badge">
                    </div>
                    <div class="partner-logo-card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/cf/Microsoft_Power_Platform_logo.svg" alt="Power Platform Corporate Identity Badge">
                    </div>
                    <!-- Duplicate Static Framework Track Loops for Seam Cover -->
                    <div class="partner-logo-card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/96/Microsoft_logo_%282012%29.svg" alt="Microsoft Corporate Identity Badge">
                    </div>
                    <div class="partner-logo-card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/93/Amazon_Web_Services_Logo.svg" alt="AWS Corporate Identity Badge">
                    </div>
                    <div class="partner-logo-card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Google_Cloud_logo.svg" alt="Google Cloud Corporate Identity Badge">
                    </div>
                    <div class="partner-logo-card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/cf/Microsoft_Power_Platform_logo.svg" alt="Power Platform Corporate Identity Badge">
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
    KEY FEATURES SHOWCASE (ANIMATED GRID DESIGN)
    ========================================================================== -->
<section class="premium-features-section" id="explore">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-12">
                <span class="section-tag">Core Architecture</span>
                <h2 class="section-title">
                    <?php echo !empty($detail->keyTitle) ? esc($detail->keyTitle) : 'Key Capabilities & Features'; ?>
                </h2>
                <p class="section-desc">
                    <?php echo !empty($detail->keyDescription) ? esc($detail->keyDescription) : 'Discover high-performance system configurations engineered to modernize legacy architectures.'; ?>
                </p>
            </div>
        </div>
        
        <div class="features-animated-grid" data-cues="slideInUp">
            <?php if (!empty($keyFeatureList)): ?>
                <?php $cardCounter = 1; ?>
                <?php foreach ($keyFeatureList as $key => $value): ?>
                    <div class="feature-bento-card">
                        <span class="feature-index-node"><?php echo sprintf("%02d", $cardCounter++); ?></span>
                        <div>
                            <div class="feature-icon-badge">
                                <i class="fas fa-cubes"></i>
                            </div>
                            <h5><?php echo esc($value->title); ?></h5>
                            <p><?php echo esc($value->description); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="feature-bento-card">
                    <span class="feature-index-node">01</span>
                    <div>
                        <div class="feature-icon-badge"><i class="fas fa-shield-alt"></i></div>
                        <h5>Advanced Invoicing Core</h5>
                        <p>Streamlined trade transaction paths tracking multi-currency processes smoothly.</p>
                    </div>
                </div>
                <div class="feature-bento-card">
                    <span class="feature-index-node">02</span>
                    <div>
                        <div class="feature-icon-badge"><i class="fas fa-sync"></i></div>
                        <h5>Real-Time BI Engine</h5>
                        <p>Deeper system performance visibility dashboards managing cross-stack workflows perfectly.</p>
                    </div>
                </div>
                <div class="feature-bento-card">
                    <span class="feature-index-node">03</span>
                    <div>
                        <div class="feature-icon-badge"><i class="fas fa-network-wired"></i></div>
                        <h5>Automated Synchronization</h5>
                        <p>Safe data integration connectors keeping remote server assets fully optimized.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ==========================================================================
    WHY PARTNERSHIPS MATTER
    ========================================================================== -->
<section class="why-partnerships-section">
    <div class="container">
        <span class="section-tag">Strategic Value</span>
        <h2 class="section-title">Why Our Partnerships Matter</h2>
        <p class="section-desc">We combine global technology expertise with local execution precision to guarantee business continuity and exponential growth.</p>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="why-card">
                    <div class="why-icon-wrap"><i class="fas fa-people-arrows"></i></div>
                    <h5>Collaborative Growth</h5>
                    <p>Co-engineering solutions with industry leaders to ensure best-in-class framework safety.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="why-card">
                    <div class="why-icon-wrap"><i class="fas fa-clock"></i></div>
                    <h5>Speed to Market</h5>
                    <p>Rapid prototyping and implementation using pre-validated deployment templates.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="why-card">
                    <div class="why-icon-wrap"><i class="fas fa-shield-alt"></i></div>
                    <h5>Enterprise Grade</h5>
                    <p>Bank-level data security, GDPR framework compliance, and proactive monitoring metrics.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="why-card">
                    <div class="why-icon-wrap"><i class="fas fa-chart-line"></i></div>
                    <h5>ROI Focused</h5>
                    <p>Data-driven strategy logic blocks engineered to reduce overall TCO overhead counts.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
    USE CASES (KEY BENEFITS) - TABS + VIDEO SPLIT
    ========================================================================== -->
<?php if (!empty($usecasesList)): ?>
<section class="cases sec-p">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-10">
                <div class="title-wrap text-center" data-cues="slideInUp">
                    <h2 class="section-title text-center">
                        <?php echo !empty($detail->caseTitle) ? $detail->caseTitle : 'Key Benefits & Use Cases'; ?>
                    </h2>
                    <?php if (!empty($detail->casetDescription)): ?>
                        <p class="section-desc text-center mx-auto"><?php echo $detail->casetDescription; ?></p>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="col-lg-12 mt-3 mb-4">
                <ul class="nav nav-pills justify-content-center flex-wrap gap-2" id="pills-tab" role="tablist" data-cues="slideInUp">
                    <?php foreach ($usecasesList as $key => $value): ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?php echo $key == 0 ? 'active' : ''; ?>" 
                                    id="pills-home-tab-<?php echo $key; ?>" 
                                    data-bs-toggle="pill" 
                                    data-bs-target="#pills-home-<?php echo $key; ?>" 
                                    type="button" role="tab">
                                <?php echo $value->title; ?>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <div class="col-lg-11">
                <div class="tab-content" id="pills-tabContent">
                    <?php foreach ($usecasesList as $key => $value): ?>
                        <div class="tab-pane fade <?php echo $key == 0 ? 'show active' : ''; ?>" id="pills-home-<?php echo $key; ?>" role="tabpanel">
                            <div class="row align-items-center g-5">
                                <div class="col-lg-6">
                                    <p class="benefit-desc-text mb-0">
                                        <?php echo $value->description; ?>
                                    </p>
                                </div>
                                
                                <div class="col-lg-6">
                                    <?php if (!empty($value->youtube)): ?>
                                        <div class="video-responsive">
                                            <iframe src="https://www.youtube.com/embed/<?php echo $value->youtube; ?>?si=Yl9Eco9ejBvf03c8" title="YouTube Media Frame Platform" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        </div>
                                    <?php else: ?>
                                        <div class="video-responsive">
                                            <video controls>
                                                <source src="<?php echo !empty($value->image) ? base_url($value->image) : base_url($config_logo); ?>" type="video/mp4">
                                            </video>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ==========================================================================
    INDUSTRIES WE SERVE
    ========================================================================== -->
<?php if (!empty($industryList)): ?>
<section class="industries-section sec-p pb-0">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-lg-9 m-auto">
                <div class="title-wrap text-center" data-cues="slideInUp">
                    <h2 class="section-title text-center" style="color: #fff;"><?php echo !empty($detail->industryTitle) ? $detail->industryTitle : 'Industries Applicable'; ?></h2>
                    <p class="section-desc text-center mx-auto"><?php echo !empty($detail->industryDescription) ? $detail->industryDescription : 'Elevate your core operating parameters across tailored verticals.'; ?></p>
                </div>
            </div>
            
            <div class="col-lg-12 mt-4">
                <div class="row justify-content-center g-4" data-cues="slideInUp">
                    <?php foreach ($industryList as $key => $value): ?>
                        <div class="col-lg-2 col-md-3 col-4">
                            <a href="<?php echo base_url('industry/' . $value->slug); ?>" class="industry-card">
                                <img src="<?php echo !empty($value->thumbnail) ? base_url($value->thumbnail) : base_url($config_logo); ?>" loading="lazy" alt="<?php echo esc($value->name); ?>">
                                <h6><?php echo $value->name; ?></h6>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ==========================================================================
    BOTTOM CTA & TESTIMONIALS SPLIT
    ========================================================================== -->
<section class="bottom-cta-testimonial-section" id="contact">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="cta-left-block">
                    <h2>Let's Build the Future Together</h2>
                    <p>Partner with us to unlock the full potential of your business software ecosystem. Our structural engineering migration experts are ready to optimize your setup.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="#" class="btn btn-primary-custom">Request Consultation</a>
                        <a href="#" class="btn btn-outline-light-custom">Contact Our Team</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="testimonial-right-block">
                    <h4>Client Testimonials</h4>
                    <div class="swiper testimonial-swiper-container">
                        <div class="swiper-wrapper">
                            
                            <?php if (!empty($testimonialsList)): ?>
                                <?php foreach($testimonialsList as $row): ?>
                                    <div class="swiper-slide">
                                        <div class="testimonial-item">
                                            <div class="testimonial-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                            <p class="testimonial-text">"<?php echo esc($row->description); ?>"</p>
                                            <div class="testimonial-author">
                                                <img src="<?php echo !empty($row->image) ? base_url($row->image) : 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=100&q=80'; ?>" alt="Client User Profile">
                                                <div class="testimonial-author-info">
                                                    <h6><?php echo esc($row->name); ?></h6>
                                                    <span><?php echo esc($row->designation); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                        <p class="testimonial-text">"The core implementation completely revolutionized our supply chain channels. Process bottlenecks vanished within weeks."</p>
                                        <div class="testimonial-author">
                                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Author">
                                            <div class="testimonial-author-info">
                                                <h6>Kirthivasan A.</h6>
                                                <span>Operations Director</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                        <p class="testimonial-text">"Migrating our legacy environment dependencies to the server cloud setup ensures safe multi-currency trade tracking without processing gaps."</p>
                                        <div class="testimonial-author">
                                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&q=80" alt="Author">
                                            <div class="testimonial-author-info">
                                                <h6>Praveen Rajan</h6>
                                                <span>Global Trade Architecture Head</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom included footer layout paths blocks -->
<?php echo $this->include('frontend/includes/bottom_section'); ?>

<!-- Swiper Initialization Controller Logic -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var testimonialSwiper = new Swiper('.testimonial-swiper-container', {
            slidesPerView: 1,
            spaceBetween: 20,
            speed: 800,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                0: { slidesPerView: 1 },
                768: { slidesPerView: 1 },
                992: { slidesPerView: 1 }
            }
        });
    });
</script>

<?php $this->endSection(); ?>