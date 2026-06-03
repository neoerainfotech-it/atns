<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true;
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    /* ==========================================================================
       PREMIUM RENTO ENTERPRISE PLATFORM SYSTEM PALETTE CONFIGURATION
       ========================================================================== */
    :root {
        --rento-blue: #38bdf8;
        --rento-blue-hover: #2563eb;
        --rento-red-hover: #901318;
        --rento-dark: #0F172A;
        --rento-navy: #1E293B;
        --rento-slate: #64748B;
        --rento-light: #F8FAFC;
        --rento-border: #E2E8F0;
        --font-primary: 'Plus Jakarta Sans', sans-serif;
    }

    body { 
        font-family: var(--font-primary); 
        background-color: #ffffff; 
        color: var(--rento-dark);
        overflow-x: hidden;
    }

    /* ==========================================================================
       SECTION MODULE 1: PREMIUM HERO SLIDER FLUID CONTAINER
       ========================================================================== */
    .premium-hero-slider {
        position: relative;
        width: 100%;
        height: 85vh; 
        min-height: 600px;
        background-color: var(--rento-dark);
        overflow: hidden;
    }

    .swiper-slide {
        position: relative;
        display: flex;
        align-items: center;
        width: 100% !important;
        overflow: hidden;
    }

    .hero-bg-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 0;
        transform: scale(1.03);
        transition: transform 6s ease-out;
    }

    .swiper-slide-active .hero-bg-image {
        transform: scale(1);
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(15, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.6) 50%, rgba(15, 23, 42, 0.1) 100%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 720px;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1) 0.1s;
    }

    .swiper-slide-active .hero-content {
        opacity: 1;
        transform: translateY(0);
    }

    .hero-tag {
        display: inline-block;
        padding: 6px 16px;
        background: rgba(184, 29, 36, 0.15); 
        color: #ff8a8f;
        font-weight: 700;
        font-size: 11px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        border-radius: 4px;
        margin-bottom: 20px;
        border-left: 3px solid var(--rento-blue);
    }

    .hero-title {
        font-size: 4rem;
        font-weight: 800;
        color: #ffffff;
        line-height: 1.15;
        margin-bottom: 20px;
        letter-spacing: -0.02em;
    }

    .hero-title span { 
        color: var(--rento-blue); 
    } 

    .hero-desc {
        font-size: 1.05rem;
        color: #cbd5e1;
        line-height: 1.6;
        margin-bottom: 36px;
        max-width: 620px;
    }

    .btn-hero-primary {
        background-color: var(--rento-blue);
        color: white !important;
        padding: 14px 36px;
        font-size: 0.95rem;
        font-weight: 700;
        border-radius: 6px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        transition: all 0.25s ease;
        border: 1px solid var(--rento-blue);
        box-shadow: 0 10px 20px rgba(184, 29, 36, 0.15);
    }

    .btn-hero-primary:hover {
        background-color: var(--rento-blue-hover);
        border-color: var(--rento-blue-hover);
        transform: translateY(-2px);
    }

    .hero-pagination {
        position: absolute;
        bottom: 110px !important;
        text-align: center;
        z-index: 10;
    }
    
    .swiper-pagination-bullet {
        width: 28px;
        height: 4px;
        border-radius: 2px;
        background: rgba(255,255,255,0.35);
        opacity: 1;
        transition: 0.3s;
    }
    
    .swiper-pagination-bullet-active { 
        background: var(--rento-blue); 
        width: 45px; 
    }

    /* ==========================================================================
       SECTION MODULE 2: PARAMETRIC OVERLAY BOOKING FORM ENGINE
       ========================================================================== */
    .booking-floating-widget {
        position: relative;
        width: 100%;
        max-width: 1140px;
        margin: -65px auto 0 auto;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 20px 50px rgba(15, 23, 42, 0.08);
        border: 1px solid var(--rento-border);
        z-index: 30;
    }

    .booking-tab-bar {
        display: flex;
        background-color: #F1F5F9;
        padding: 6px;
        width: fit-content;
        border-radius: 12px;
        margin: 24px 0 0 40px;
    }

    .booking-tab-btn {
        padding: 10px 26px;
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--rento-slate);
        border: none;
        background: transparent;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .booking-tab-btn.active {
        background-color: var(--rento-navy);
        color: #FFFFFF;
    }

    .booking-form-grid {
        display: grid;
        grid-template-columns: 1.1fr 1.1fr 1fr 1fr 140px;
        gap: 0;
        padding: 20px 40px 32px 40px;
        align-items: center;
    }

    .input-field-block {
        padding: 0 24px;
        border-right: 1px solid var(--rento-border);
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .input-field-block:first-of-type { padding-left: 0; }
    .input-field-block:nth-last-of-type(2) { border-right: none; }

    .input-field-block label {
        font-size: 0.85rem;
        font-weight: 700;
        color: var(--rento-dark);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .input-field-block label i {
        color: var(--rento-blue);
        font-size: 0.9rem;
    }

    .input-field-block select,
    .input-field-block input {
        border: none;
        outline: none;
        font-size: 0.9rem;
        color: var(--rento-slate);
        background: transparent;
        width: 100%;
        padding: 4px 0;
    }

    .btn-booking-search {
        background-color: var(--rento-blue);
        color: #FFFFFF;
        width: 100%;
        height: 52px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 1rem;
        border: none;
        cursor: pointer;
        transition: 0.2s ease;
        box-shadow: 0 6px 16px rgba(184, 29, 36, 0.15);
    }

    .btn-booking-search:hover {
        background-color: var(--rento-blue-hover);
    }

    /* ==========================================================================
       SECTION MODULE 3: MODERN BRAND TRUST BAR OVERLAYS
       ========================================================================== */
    .partner-trust-bar {
        background: #ffffff;
        border-bottom: 1px solid #f1f5f9;
        padding: 50px 0;
        position: relative;
        z-index: 10;
    }

    .trust-bar-label {
        font-size: 0.9rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #94a3b8;
        position: relative;
        display: inline-block;
    }

    .enterprise-logo-grid {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 30px;
    }

    .brand-logo-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .brand-logo-text {
        font-size: 1.25rem;
        font-weight: 700;
        letter-spacing: -0.01em;
        color: #1e293b;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        filter: grayscale(100%);
        opacity: 0.45;
        transition: all 0.3s ease;
        user-select: none;
    }

    .brand-icon-quad { width: 18px; height: 18px; }
    .brand-icon-custom { width: 20px; height: 20px; }
    .brand-fa-icon { font-size: 1.2rem; color: #64748b; transition: color 0.3s ease; }

    .brand-logo-wrapper:hover .brand-logo-text { filter: grayscale(0%); opacity: 1; transform: scale(1.04); }
    .brand-logo-wrapper:hover .ms-logo { color: #111827; }
    .brand-logo-wrapper:hover .azure-logo { color: #007fff; }
    .brand-logo-wrapper:hover .dynamics-logo { color: #d83b01; }
    .brand-logo-wrapper:hover .dynamics-logo .brand-fa-icon { color: #d83b01; }
    .brand-logo-wrapper:hover .power-logo { color: #107c41; }
    .brand-logo-wrapper:hover .power-logo .brand-fa-icon { color: #107c41; }

    /* ==========================================================================
       SECTION MODULE 4: PREMIUM INFRASTRUCTURE CORE CAPABILITIES
       ========================================================================== */
    .premium-capabilities-section {
        background-color: #f8fafc;
        padding: 90px 0;
        position: relative;
    }

    .premium-pillar-card {
        background: #ffffff;
        border: 1px solid rgba(56, 189, 248, 0.12); /* FIXED: Blue professional slate boundary */
        border-radius: 16px;
        padding: 45px 35px;
        height: 100%;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        box-shadow: 0 4px 15px rgba(56, 189, 248, 0.015);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .pillar-icon-box {
        width: 54px; height: 54px;
        background-color: rgba(56, 189, 248, 0.06); /* Soft blue backdrop anchor */
        color: var(--rento-blue);
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 28px;
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .pillar-card-title {
        font-size: 1.35rem; font-weight: 800; color: var(--rento-dark);
        line-height: 1.3; margin-bottom: 14px; letter-spacing: -0.01em;
    }

    .pillar-card-desc { font-size: 0.92rem; color: var(--rento-slate); line-height: 1.65; margin: 0; }
    
    .pillar-hover-indicator {
        position: absolute; bottom: 0; left: 0; width: 100%; height: 4px;
        background-color: var(--rento-blue); transform: scaleX(0); transform-origin: left;
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .premium-pillar-card:hover { 
        transform: translateY(-8px); 
        border-color: rgba(56, 189, 248, 0.3) !important; /* FIXED: Active blue glow */
        box-shadow: 0 20px 45px rgba(56, 189, 248, 0.06); 
    }
    .premium-pillar-card:hover .pillar-icon-box { background-color: var(--rento-blue); color: #ffffff; box-shadow: 0 8px 20px rgba(56, 189, 248, 0.25); }
    .premium-pillar-card:hover .pillar-icon-box svg { transform: rotate(5deg) scale(1.05); }
    .premium-pillar-card:hover .pillar-hover-indicator { transform: scaleX(1); }

    /* ==========================================================================
       SECTION MODULE 5: ASYMMETRICAL SERVICES (MINDS SPLIT VIEW DESIGN)
       ========================================================================== */
    .premium-minds-services-section { 
        background-color: #ffffff; 
        padding: 120px 0; 
        position: relative; 
    }
    
    .minds-subtitle { 
        font-size: 0.8rem; 
        font-weight: 800; 
        letter-spacing: 0.15em; 
        color: var(--rento-blue); 
        display: block; 
        margin-bottom: 16px; 
    }
    
    .minds-main-headline { 
        font-size: 3.5rem; 
        font-weight: 800; 
        letter-spacing: -0.03em; 
        text-transform: uppercase; 
        color: var(--rento-dark); 
        line-height: 1.1; 
        margin-bottom: 20px; 
    }
    
    .minds-lead-desc { 
        font-size: 1.05rem; 
        color: var(--rento-slate); 
        line-height: 1.65; 
        max-width: 680px; 
        margin: 0; 
    }
    
    .minds-services-wrapper { 
        margin-top: 60px; 
        border-top: 1px solid var(--rento-border); 
    }
    
    .minds-service-row-item { 
        padding: 50px 0; 
        border-bottom: 1px solid var(--rento-border); 
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); 
        position: relative; 
    }
    
    .minds-header-block { 
        display: flex; 
        flex-direction: column; 
        gap: 10px; 
    }
    
    .service-index-number { 
        font-size: 0.85rem; 
        font-weight: 700; 
        color: var(--rento-slate); 
        opacity: 0.6; 
        letter-spacing: 0.05em; 
    }
    
    .minds-service-title { 
        font-size: 2.25rem; 
        font-weight: 800; 
        letter-spacing: -0.02em; 
        text-transform: uppercase; 
        color: var(--rento-dark); 
        line-height: 1.2; 
        margin: 0; 
        transition: color 0.3s ease; 
    }
    
    .minds-image-frame-box { 
        width: 100%; 
        max-width: 240px; 
        height: 160px; 
        border-radius: 12px; 
        overflow: hidden; 
        margin: 0 auto; 
        background-color: var(--rento-light); 
        border: 1px solid rgba(56, 189, 248, 0.12); /* FIXED: Blue border framework mapping */
        box-shadow: 0 10px 30px rgba(0,0,0,0.03); 
        opacity: 0.3; 
        transform: scale(0.95); 
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); 
    }
    
    .minds-showcase-img { 
        width: 100%; 
        height: 100%; 
        object-fit: cover; 
        transition: transform 0.6s ease; 
    }
    
    .minds-editor-desc { 
        font-size: 0.95rem; 
        line-height: 1.7; 
        color: var(--rento-slate); 
    }
    
    .minds-action-footer-metric { 
        display: flex; 
        align-items: center; 
        justify-content: space-between; 
        flex-wrap: wrap; 
        gap: 20px; 
    }
    
    .btn-minds-action { 
        display: inline-flex; 
        align-items: center; 
        gap: 12px; 
        padding: 12px 28px; 
        border: 1px solid var(--rento-dark); 
        background: transparent; 
        color: var(--rento-dark) !important; 
        font-size: 0.85rem; 
        font-weight: 700; 
        text-transform: uppercase; 
        letter-spacing: 0.05em; 
        text-decoration: none; 
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1); 
    }
    
    .minds-mini-stat { 
        display: flex; 
        flex-direction: column; 
        text-align: right; 
    }
    
    .minds-mini-stat .stat-num { 
        font-size: 1.5rem; 
        font-weight: 800; 
        color: var(--rento-dark); 
        line-height: 1; 
    }
    
    .minds-mini-stat .stat-lbl { 
        font-size: 10px; 
        font-weight: 700; 
        color: var(--rento-slate); 
        letter-spacing: 0.1em; 
        margin-top: 4px; 
    }

    .minds-service-row-item:hover, .minds-service-row-item.active { background-color: rgba(248, 250, 252, 0.6); padding-left: 20px; padding-right: 20px; }
    .minds-service-row-item:hover .minds-service-title, .minds-service-row-item.active .minds-service-title { color: var(--rento-blue); }
    .minds-service-row-item:hover .minds-image-frame-box, .minds-service-row-item.active .minds-image-frame-box { opacity: 1; transform: scale(1); border-color: rgba(56, 189, 248, 0.3) !important; box-shadow: 0 15px 35px rgba(56, 189, 248, 0.08); }
    .minds-service-row-item:hover .btn-minds-action, .minds-service-row-item.active .btn-minds-action { background-color: var(--rento-dark); color: #ffffff !important; }

    /* ==========================================================================
       SECTION MODULE 6: ATTENTION TO DETAIL SIDEBAR CONTEXT ENGINE
       ========================================================================== */
    .premium-detail-breakdown-section { 
        background-color: var(--rento-dark); 
        padding: 120px 0; 
        color: #ffffff; 
        position: relative; 
    }
    
    .detail-subtitle { 
        font-size: 0.8rem; 
        font-weight: 800; 
        letter-spacing: 0.15em; 
        color: var(--rento-blue); 
        display: block; 
        margin-bottom: 18px; 
    }
    
    .detail-main-headline { 
        font-size: 3.5rem; 
        font-weight: 800; 
        letter-spacing: -0.03em; 
        text-transform: uppercase; 
        color: #ffffff; 
        line-height: 1.1; 
    }
    
    .detail-vertical-tabs-nav { 
        display: flex; 
        flex-direction: column; 
        align-items: flex-start; 
        gap: 24px; 
        padding-left: 15px; 
        border-left: 1px solid rgba(56, 189, 248, 0.1); /* FIXED: Slate blue menu guideline */
    }
    
    .detail-nav-tab-link { border: none; background: transparent; color: #ffffff; font-size: 0.9rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.03em; text-align: left; line-height: 1.4; padding: 4px 0; opacity: 0.35; position: relative; cursor: pointer; transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1); }
    .detail-nav-tab-link.active { opacity: 1; color: #ffffff; }
    .detail-nav-tab-link::after { content: ''; position: absolute; bottom: 0; left: 0; width: 100%; height: 2px; background-color: var(--rento-blue); transform: scaleX(0); transform-origin: left; transition: transform 0.3s ease; }
    .detail-nav-tab-link.active::after { transform: scaleX(1); }
    
    .detail-display-stage-container { position: relative; width: 100%; padding-left: 20px; }
    .detail-case-content-card { display: none; opacity: 0; animation: detailFadeIn 0.5s forwards cubic-bezier(0.16, 1, 0.3, 1); }
    .detail-case-content-card.active { display: block; }
    @keyframes detailFadeIn { to { opacity: 1; } }
    
    .detail-image-showcase-frame { width: 100%; height: 480px; border-radius: 8px; overflow: hidden; background-color: var(--rento-navy); border: 1px solid rgba(56, 189, 248, 0.12); box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35); }
    .detail-showcase-img { width: 100%; height: 100%; object-fit: cover; }
    
    .detail-meta-split-row { display: flex; flex-wrap: wrap; width: 100%; gap: 40px; margin-top: 40px; padding-top: 10px; }
    .split-left-heading { flex: 0 0 45%; max-width: 45%; border-bottom: 2px solid var(--rento-blue); padding-bottom: 15px; }
    .split-right-description { flex: 1; }
    .detail-active-sub-title { font-size: 1.5rem; font-weight: 800; text-transform: uppercase; color: #ffffff; letter-spacing: -0.02em; line-height: 1.3; margin: 0; }
    .detail-body-paragraph { font-size: 0.95rem; line-height: 1.7; color: #94a3b8 !important; }
    
    .btn-detail-action-link { font-size: 0.85rem; font-weight: 700; color: var(--rento-blue) !important; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; display: inline-flex; align-items: center; gap: 10px; cursor: pointer; transition: color 0.2s ease; }
    .btn-detail-action-link:hover { color: #ff5c62 !important; }
    .btn-detail-action-link:hover i { transform: translateX(5px); }

    /* ==========================================================================
       SECTION MODULE 7: INDUSTRIES MATRIX (MILK-WHITE CLEAN SHIFT DESIGN)
       ========================================================================== */
    .premium-milk-industry-section { 
        background-color: #F8FAFC; 
        padding: 120px 0; 
        position: relative; 
    }
    
    .industry-milk-headline { 
        font-size: 3.5rem; 
        font-weight: 800; 
        letter-spacing: -0.02em; 
        text-transform: uppercase; 
        color: var(--rento-dark); 
        margin-bottom: 20px; 
    }
    
    .industry-milk-desc { 
        font-size: 1.05rem; 
        color: var(--rento-slate); 
        line-height: 1.65; 
        max-width: 720px; 
        margin: 0 auto; 
    }
    
    .industry-milk-card { 
        display: flex; 
        flex-direction: column; 
        justify-content: space-between; 
        background-color: #ffffff; 
        border: 1px solid rgba(56, 189, 248, 0.12); /* FIXED: Dynamic blueprint border styling */
        border-radius: 16px; 
        padding: 45px 30px 35px 30px; 
        height: 100%; 
        text-decoration: none !important; 
        position: relative; 
        overflow: hidden; 
        box-shadow: 0 4px 15px rgba(56, 189, 248, 0.02); 
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); 
    }
    
    .industry-milk-card-body { width: 100%; text-align: center; }
    
    .industry-milk-icon-box { 
        height: 64px; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        margin-bottom: 30px; 
    }
    
    .industry-milk-img { 
        height: 100%; 
        width: auto; 
        max-width: 64px; 
        object-fit: contain; 
        filter: brightness(0) opacity(0.7); 
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1); 
    }
    
    .industry-milk-card-title { 
        font-size: 1.35rem; 
        font-weight: 800; 
        color: var(--rento-dark); 
        letter-spacing: -0.01em; 
        line-height: 1.35; 
        margin: 0; 
        transition: color 0.3s ease; 
    }
    
    .industry-milk-card-footer { display: flex; align-items: center; justify-content: center; gap: 8px; margin-top: 32px; opacity: 0.85; transition: opacity 0.3s ease; }
    .industry-milk-btn-lbl { font-size: 0.9rem; font-weight: 700; color: var(--rento-slate); letter-spacing: 0.02em; transition: color 0.3s ease; }
    .industry-milk-btn-arrow { font-size: 1.05rem; color: var(--rento-slate); transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1); }
    
    .industry-milk-card-line-indicator { 
        position: absolute; 
        bottom: 0; 
        left: 0; 
        width: 0%; 
        height: 3px; 
        background-color: var(--rento-blue); 
        transition: width 0.4s cubic-bezier(0.16, 1, 0.3, 1); 
    }

    .industry-milk-card:hover { transform: translateY(-6px); border-color: rgba(56, 189, 248, 0.3) !important; box-shadow: 0 20px 45px rgba(56, 189, 248, 0.05); }
    .industry-milk-card:hover .industry-milk-card-title { color: var(--rento-blue); }
    .industry-milk-card:hover .industry-milk-img { filter: brightness(0) sepia(1) saturate(100) hue-rotate(200deg); transform: scale(1.06); }
    .industry-milk-card:hover .industry-milk-btn-lbl { color: var(--rento-blue); }
    .industry-milk-card:hover .industry-milk-btn-arrow { color: var(--rento-blue); transform: translateX(5px); }
    .industry-milk-card:hover .industry-milk-card-line-indicator { width: 100%; }

    /* ==========================================================================
       SECTION MODULE 8: OUR VISION (ASYMMETRICAL LIGHT BENTO MATRIX GRID)
       ========================================================================== */
    .premium-bento-vision-section { 
        background-color: #F8FAFC; 
        padding: 120px 0; 
        position: relative; 
    }
    
    .bento-vision-badge { font-size: 0.8rem; font-weight: 800; color: var(--rento-blue); background-color: rgba(56, 189, 248, 0.06); padding: 6px 16px; border-radius: 4px; letter-spacing: 0.1em; display: inline-block; margin-bottom: 20px; text-transform: uppercase; }
    .bento-vision-headline { font-size: 3.5rem; font-weight: 800; letter-spacing: -0.02em; text-transform: uppercase; color: var(--rento-dark); margin: 0; }
    .bento-vision-statement { font-size: 1.35rem; font-weight: 700; color: var(--rento-navy); line-height: 1.45; margin-bottom: 20px; max-width: 820px; margin-left: auto; margin-right: auto; }
    .bento-vision-desc { font-size: 1.02rem; line-height: 1.65; color: var(--rento-slate); max-width: 860px; margin-left: auto; margin-right: auto; }
    
    .bento-matrix-mesh-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; width: 100%; }
    .item-size-large { grid-column: span 2; }
    .item-size-medium { grid-column: span 1; }
    
    .bento-milk-card { background-color: #ffffff; border: 1px solid rgba(56, 189, 248, 0.12); border-radius: 16px; padding: 40px 30px; height: 100%; display: flex; flex-direction: column; align-items: flex-start; justify-content: space-between; position: relative; overflow: hidden; box-shadow: 0 4px 15px rgba(56, 189, 248, 0.02); transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); }
    .bento-icon-marker { font-size: 1.4rem; color: var(--rento-slate); opacity: 0.5; margin-bottom: 36px; transition: all 0.3s ease; }
    .bento-metric-value { font-size: 3.25rem; font-weight: 800; color: var(--rento-dark); line-height: 1; letter-spacing: -0.03em; margin-bottom: 12px; transition: color 0.35s cubic-bezier(0.16, 1, 0.3, 1); }
    .bento-metric-value .value-plus { font-size: 2rem; font-weight: 600; color: var(--rento-slate); opacity: 0.5; display: inline-block; margin-left: 2px; }
    .bento-metric-label { font-size: 0.95rem; font-weight: 700; color: var(--rento-slate); line-height: 1.4; margin: 0; }
    .bento-card-hover-border { position: absolute; bottom: 0; left: 0; width: 0%; height: 3px; background-color: var(--rento-blue); transition: width 0.4s cubic-bezier(0.16, 1, 0.3, 1); }
    
    .btn-bento-vision-action { display: inline-flex; align-items: center; justify-content: center; gap: 10px; color: var(--rento-dark) !important; font-size: 0.9rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none !important; padding: 8px 0; border-bottom: 1px solid var(--rento-border); transition: all 0.3s ease; }
    .btn-bento-vision-action svg { transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1); }

    .bento-milk-card:hover { transform: translateY(-6px); border-color: rgba(56, 189, 248, 0.3) !important; box-shadow: 0 20px 45px rgba(56, 189, 248, 0.06); }
    .bento-milk-card:hover .bento-metric-value { color: var(--rento-blue); }
    .bento-milk-card:hover .bento-icon-marker { color: var(--rento-blue); opacity: 1; }
    .bento-milk-card:hover .bento-card-hover-border { width: 100%; }
    .btn-bento-vision-action:hover { color: var(--rento-blue) !important; border-color: var(--rento-blue); }
    .btn-bento-vision-action:hover svg { transform: translateX(6px); }

    /* ==========================================================================
       SECTION MODULE 9: PREMIUM HIGH-CONTRAST CAREERS CTA
       ========================================================================== */
    .premium-cta-careers-section {
        background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%); /* FIXED: Professional dark tech gradient */
        padding: 90px 0;
        position: relative;
        overflow: hidden;
        border-radius: 0;
    }

    .cta-geometric-grid-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg stroke='%2338bdf8' stroke-width='1.2' stroke-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        z-index: 1; pointer-events: none;
    }

    .cta-mini-badge {
        font-size: 0.78rem; font-weight: 800; color: #ffffff;
        background-color: rgba(56, 189, 248, 0.15); padding: 6px 14px;
        border-radius: 4px; letter-spacing: 0.15em; display: inline-block;
        margin-bottom: 20px; text-transform: uppercase;
    }

    .cta-display-headline { font-size: 3.5rem; font-weight: 800; letter-spacing: -0.03em; color: #ffffff; line-height: 1.15; margin-bottom: 18px; }
    .cta-paragraph-desc { font-size: 1.05rem; line-height: 1.65; color: rgba(255, 255, 255, 0.88) !important; max-width: 660px; margin: 0; }

    .btn-premium-cta-action {
        display: inline-flex; align-items: center; justify-content: center; gap: 12px;
        background-color: var(--rento-blue); color: #ffffff !important; padding: 18px 42px;
        font-size: 0.95rem; font-weight: 700; border-radius: 8px; text-transform: uppercase;
        letter-spacing: 0.05em; text-decoration: none !important; box-shadow: 0 10px 30px rgba(56, 189, 248, 0.2);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1); position: relative;
    }

    .cta-arrow-icon { transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1); }
    .btn-premium-cta-action:hover { background-color: #ffffff; color: var(--rento-blue) !important; transform: translateY(-3px); box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25); }
    .btn-premium-cta-action:hover .cta-arrow-icon { transform: translateX(6px); }
    .z-index-2 { position: relative; z-index: 2; }

    /* ==========================================================================
       GLOBAL RESPONSIVE ADAPTABILITY ENGINEERING VIEWPORTS
       ========================================================================== */
    @media (max-width: 1200px) {
        .hero-title { font-size: 3rem; }
        .booking-form-grid { grid-template-columns: 1fr 1fr; gap: 20px; padding: 30px; }
        .input-field-block { border-right: none; padding: 12px 16px; background: #F8FAFC; border-radius: 8px; }
        .btn-booking-search { grid-column: span 2; }
        .bento-vision-headline { font-size: 2.75rem; }
        .bento-metric-value { font-size: 2.75rem; }
        .bento-matrix-mesh-grid { grid-template-columns: repeat(2, 1fr); }
        .item-size-large, .item-size-medium { grid-column: span 1; }
    }

    @media (max-width: 991px) {
        .premium-hero-slider { height: auto; min-height: auto; padding-bottom: 100px; }
        .hero-overlay { background: linear-gradient(180deg, rgba(15, 23, 42, 0.85) 0%, rgba(15, 23, 42, 0.98) 100%); }
        .hero-content { padding-top: 80px; text-align: center; margin: 0 auto; }
        .hero-title { font-size: 2.6rem; }
        .booking-floating-widget { margin: 30px 15px 0 15px; }
        .booking-tab-bar { margin: 20px auto 0 auto; }
        .hero-pagination { bottom: 20px !important; }
        .partner-trust-bar { padding: 40px 0; }
        .enterprise-logo-grid { justify-content: center; gap: 32px 40px; }
        .brand-logo-text { font-size: 1.15rem; }
        .premium-capabilities-section { padding: 70px 0; }
        .minds-main-headline { font-size: 2.75rem; }
        .minds-service-row-item { padding: 40px 0; }
        .minds-service-title { font-size: 1.75rem; }
        .minds-image-frame-box { max-width: 100%; height: 180px; margin: 15px 0; opacity: 1; transform: scale(1); }
        .minds-service-row-item:hover, .minds-service-row-item.active { padding-left: 0; padding-right: 0; background: transparent; }
        .detail-main-headline { font-size: 2.5rem; }
        .detail-display-stage-container { padding-left: 0; }
        .detail-vertical-tabs-nav { flex-direction: row; overflow-x: auto; width: 100%; padding-left: 0; padding-bottom: 12px; border-left: none; border-bottom: 1px solid rgba(255,255,255,0.1); gap: 24px; }
        .detail-nav-tab-link { white-space: nowrap; font-size: 0.85rem; }
        .detail-image-showcase-frame { height: 340px; }
        .split-left-heading { flex: 0 0 100%; max-width: 100%; }
        .detail-meta-split-row { gap: 20px; margin-top: 30px; }
        .detail-active-sub-title { font-size: 1.5rem; }
        .industry-milk-headline { font-size: 2.75rem; }
        .premium-milk-industry-section { padding: 80px 0; }
        .industry-milk-card { padding: 35px 24px 28px 24px; }
        .industry-milk-card-title { font-size: 1.2rem; }
        .premium-cta-careers-section { padding: 75px 0; }
        .cta-display-headline { font-size: 2.75rem; }
        .cta-paragraph-desc { margin: 0 auto; max-width: 100%; font-size: 1rem; }
        .btn-premium-cta-action { width: 100%; max-width: 320px; margin-top: 15px; }
    }

    @media (max-width: 768px) {
        .premium-bento-vision-section { padding: 80px 0; }
        .bento-vision-statement { font-size: 1.15rem; }
        .bento-matrix-mesh-grid { grid-template-columns: 100%; gap: 16px; }
        .bento-milk-card { padding: 30px 24px; }
    }

    @media (max-width: 576px) {
        .hero-title { font-size: 2rem; }
        .booking-form-grid { grid-template-columns: 100%; gap: 14px; padding: 20px; }
        .btn-booking-search { grid-column: span 1; }
        .enterprise-logo-grid { grid-template-columns: 1fr 1fr; gap: 24px; }
        .brand-logo-text { font-size: 1.05rem; justify-content: center; }
        .premium-pillar-card { padding: 35px 24px; align-items: center; text-align: center; }
        .pillar-icon-box { margin-bottom: 20px; }
        .minds-main-headline { font-size: 2.2rem; }
        .minds-service-title { font-size: 1.5rem; }
        .btn-minds-action { width: 100%; justify-content: center; }
        .detail-main-headline { font-size: 2rem; }
        .detail-image-showcase-frame { height: 240px; }
        .industry-milk-headline { font-size: 2.25rem; }
        .industry-milk-desc { font-size: 0.95rem; }
        .industry-milk-card { align-items: center; text-align: center; }
        .cta-display-headline { font-size: 2.25rem; }
        .btn-premium-cta-action { width: 100%; max-width: 100%; padding: 16px 24px; }
    }
    
    /* --- TRENDY ASYMMETRICAL HORIZON INTEL BUZZ --- */
    .trendy-buzz-horizon-section {
        background-color: #F8FAFC; 
        padding: 120px 0;
        position: relative;
    }

    .horizon-subtitle {
        font-size: 0.8rem;
        font-weight: 800;
        letter-spacing: 0.15em;
        color: var(--rento-blue);
        display: block;
        margin-bottom: 14px;
    }

    .horizon-main-headline {
        font-size: 3.5rem;
        font-weight: 800;
        letter-spacing: -0.03em;
        text-transform: uppercase;
        color: var(--rento-dark);
        line-height: 1.1;
    }

    .horizon-header-desc {
        font-size: 1.1rem;
        line-height: 1.6;
        max-width: 480px;
        margin-left: auto;
    }

    .layout-bento-double-slide {
        display: flex !important;
        flex-direction: column !important;
        height: auto !important;
    }

    /* ==========================================================================
       LEFT SIDE: GRAND FEATURED SPOTLIGHT ENGINE (IMAGE SPACE FIX)
       ========================================================================== */
    .horizon-featured-spotlight-card {
        display: flex;
        flex-direction: column;
        background-color: #ffffff;
        border: 1px solid rgba(56, 189, 248, 0.12);
        border-radius: 20px; 
        overflow: hidden;
        width: 100%;
        text-decoration: none !important;
        box-shadow: 0 4px 20px rgba(15, 23, 42, 0.02);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .spotlight-media-canvas {
        position: relative;
        width: 100%;
        height: 340px; 
        overflow: hidden;
        background-color: #F1F5F9; 
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .spotlight-img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain; 
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .horizon-pill-badge {
        position: absolute;
        top: 24px; left: 24px;
        background-color: var(--rento-blue);
        color: #ffffff;
        font-size: 10px; font-weight: 800;
        text-transform: uppercase;
        padding: 6px 14px;
        border-radius: 6px;
        letter-spacing: 0.05em;
        box-shadow: 0 6px 15px rgba(56, 189, 248, 0.25);
        z-index: 5;
    }

    .spotlight-content-tray {
        padding: 35px;
        display: flex;
        flex-direction: column;
        background: #ffffff;
    }

    .horizon-meta-node {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.02em;
        color: var(--rento-slate);
    }

    .meta-category-tag { color: var(--rento-blue); text-transform: uppercase; }
    .meta-divider { width: 4px; height: 4px; background-color: var(--rento-border); border-radius: 50%; }

    .spotlight-card-title {
        font-size: 1.6rem;
        font-weight: 800;
        color: var(--rento-dark);
        line-height: 1.4;
        letter-spacing: -0.02em;
        margin: 14px 0 24px 0;
        transition: color 0.3s ease;
    }

    .horizon-action-trigger { display: inline-flex; align-items: center; gap: 10px; }
    .trigger-text { font-size: 0.9rem; font-weight: 700; text-transform: uppercase; color: var(--rento-dark); letter-spacing: 0.02em; transition: color 0.3s ease; }
    .trigger-arrow { color: var(--rento-dark); transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), color 0.3s ease; }

    /* ==========================================================================
       RIGHT SIDE: SLEEK HORIZONTAL STREAM CARD STACK (CONTAINED IMAGES)
       ========================================================================== */
    .horizon-stream-vertical-stack {
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
    }

    .horizon-stream-row-item {
        background-color: #ffffff;
        border: 1px solid rgba(56, 189, 248, 0.12);
        border-radius: 16px;
        padding: 20px;
        text-decoration: none !important;
        position: relative;
        overflow: hidden;
        display: block;
        box-shadow: 0 4px 10px rgba(15, 23, 42, 0.01);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .stream-item-inner-layout {
        display: flex;
        align-items: center;
        gap: 24px;
    }

    .stream-media-frame {
        flex: 0 0 130px;
        width: 130px;
        height: 95px;
        border-radius: 10px;
        overflow: hidden;
        background-color: #F1F5F9; 
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 8px;
    }

    .stream-img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain; 
        transition: transform 0.5s ease;
    }

    .stream-details-block {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .stream-card-title {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--rento-dark);
        line-height: 1.4;
        letter-spacing: -0.01em;
        margin: 4px 0 10px 0;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: color 0.3s ease;
    }

    .stream-action-link {
        font-size: 0.85rem;
        font-weight: 700;
        color: var(--rento-slate);
        text-transform: uppercase;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    
    .stream-action-link i { font-size: 0.75rem; transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1); }
    .horizon-row-border-indicator { position: absolute; bottom: 0; left: 0; width: 0%; height: 3px; background-color: var(--rento-blue); transition: width 0.4s cubic-bezier(0.16, 1, 0.3, 1); }

    /* ==========================================================================
       HOVER EFFECT CONTROLLERS INTERACTION MATRIX
       ========================================================================== */
    .horizon-featured-spotlight-card:hover { transform: translateY(-6px); box-shadow: 0 30px 60px rgba(56, 189, 248, 0.06); border-color: rgba(56, 189, 248, 0.3) !important; }
    .horizon-featured-spotlight-card:hover .spotlight-img { transform: scale(1.03); }
    .horizon-featured-spotlight-card:hover .spotlight-card-title { color: var(--rento-blue); }
    .horizon-featured-spotlight-card:hover .trigger-arrow { color: var(--rento-blue); transform: translateX(6px); }

    .horizon-stream-row-item:hover { transform: translateX(6px); border-color: rgba(56, 189, 248, 0.3) !important; box-shadow: 0 15px 35px rgba(56, 189, 248, 0.04); }
    .horizon-stream-row-item:hover .stream-img { transform: scale(1.04); }
    .horizon-stream-row-item:hover .stream-card-title { color: var(--rento-blue); }
    .horizon-stream-row-item:hover .stream-action-link i { transform: translateX(4px); }
    .horizon-stream-row-item:hover .horizon-row-border-indicator { width: 100%; }

    @media (max-width: 1200px) {
        .spotlight-card-title { font-size: 1.4rem; }
        .spotlight-media-canvas { height: 280px; }
    }

    @media (max-width: 991px) {
        .horizon-main-headline { font-size: 2.75rem; }
        .trendy-buzz-horizon-section { padding: 80px 0; }
    }

    @media (max-width: 576px) {
        .horizon-main-headline { font-size: 2.25rem; }
        .spotlight-media-canvas { height: 220px; }
        .spotlight-content-tray { padding: 24px; }
        .stream-item-inner-layout { gap: 16px; }
        .stream-media-frame { flex: 0 0 90px; width: 90px; height: 75px; }
        .stream-card-title { font-size: 0.95rem; }
        .horizon-stream-row-item:hover { transform: translateY(-4px); }
    }
</style>

<div class="swiper premium-hero-slider">
    <div class="swiper-wrapper">
        
        <div class="swiper-slide">
            <img src="<?php echo (!empty($heading) && !empty($heading->image)) ? base_url('uploads/images/' . $heading->image) : 'https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&w=1920&q=80'; ?>" class="hero-bg-image" alt="Branding Strategy Team">
            <div class="hero-overlay"></div>
            <div class="container h-100 d-flex align-items-center">
                <div class="hero-content">
                    <span class="hero-tag">Microsoft Solutions Partner</span>
                    <h1 class="hero-title">
                        <?php echo (!empty($heading) && !empty($heading->title)) ? str_replace("Digital Transformation.", "<span>Digital Transformation.</span>", $heading->title) : 'Accelerate Your <span>Digital Transformation.</span>'; ?>
                    </h1>
                    <p class="hero-desc">
                        <?php echo (!empty($heading) && !empty($heading->description)) ? esc($heading->description) : 'Secure, scalable, and intelligent cloud infrastructure designed to empower your enterprise for the future of work.'; ?>
                    </p>
                    <?php if(!empty($heading) && !empty($heading->link)): ?>
                        <a href="<?php echo base_url($heading->link); ?>" class="btn-hero-primary">
                            Explore Solutions <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="swiper-slide">
            <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1920&q=80" class="hero-bg-image" alt="Azure Cloud Architecture">
            <div class="hero-overlay"></div>
            <div class="container h-100 d-flex align-items-center">
                <div class="hero-content">
                    <span class="hero-tag">Azure Cloud Innovation</span>
                    <h1 class="hero-title">Accelerate Your <span>Digital Transformation.</span></h1>
                    <p class="hero-desc">Secure, scalable, and intelligent cloud infrastructure designed to empower your enterprise for the future of work.</p>
                    <a href="<?php echo base_url('service/azure-cloud'); ?>" class="btn-hero-primary">
                        Explore Cloud Solutions <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="swiper-slide">
            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=1920&q=80" class="hero-bg-image" alt="Data Science Pipeline">
            <div class="hero-overlay"></div>
            <div class="container h-100 d-flex align-items-center">
                <div class="hero-content">
                    <span class="hero-tag">Data & Artificial Intelligence</span>
                    <h1 class="hero-title">Unlock Insights with <span>Microsoft Copilot.</span></h1>
                    <p class="hero-desc">Leverage advanced analytics and generative AI to drive smarter decision-making and automate complex enterprise workflows.</p>
                    <a href="<?php echo base_url('service/data-ai'); ?>" class="btn-hero-primary">
                        See AI in Action <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="swiper-pagination hero-pagination"></div>
</div>

<div class="container">
    <div class="booking-floating-widget">
        <div class="booking-tab-bar">
            <button class="booking-tab-btn" onclick="switchBookingTab(this, 'hourly')">Hourly</button>
            <button class="booking-tab-btn active" onclick="switchBookingTab(this, 'distance')">Distance</button>
            <button class="booking-tab-btn" onclick="switchBookingTab(this, 'flat')">Flat Rate</button>
        </div>
        <form action="<?php echo base_url('booking/search'); ?>" method="GET" class="booking-form-grid">
            <div class="input-field-block">
                <label><i class="fa-solid fa-circle-dot"></i> Pick Up Address</label>
                <select name="pickup" required>
                    <option value="" disabled selected>Enter pick up address</option>
                    <option value="hub-1">Corporate Terminal Hub</option>
                    <option value="hub-2">Central Node Point</option>
                </select>
            </div>
            <div class="input-field-block">
                <label><i class="fa-solid fa-location-dot"></i> Drop Off Address</label>
                <select name="dropoff" required>
                    <option value="" disabled selected>Enter drop off address</option>
                    <option value="dest-1">Corporate Terminal Hub</option>
                    <option value="dest-2">Central Node Point</option>
                </select>
            </div>
            <div class="input-field-block">
                <label><i class="fa-solid fa-calendar-days"></i> Pick Up Date</label>
                <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <div class="input-field-block">
                <label><i class="fa-solid fa-clock"></i> Pick Up Time</label>
                <input type="time" name="time" value="12:00" required>
            </div>
            <div>
                <button type="submit" class="btn-booking-search">Search</button>
            </div>
        </form>
    </div>
</div>

<div class="partner-trust-bar">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-4 col-lg-5 text-center text-lg-start mb-4 mb-lg-0">
                <span class="trust-bar-label">Empowering trusted global enterprises</span>
            </div>
            <div class="col-xl-8 col-lg-7">
                <div class="enterprise-logo-grid">
                    <div class="brand-logo-wrapper">
                        <span class="brand-logo-text ms-logo">
                            <svg class="brand-icon-quad" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h11v11H0z" fill="#f25022"/><path d="M12 0h11v11H12z" fill="#7fba00"/><path d="M0 12h11v11H0z" fill="#00a4ef"/><path d="M12 12h11v11H12z" fill="#ffb900"/></svg> Microsoft
                        </span>
                    </div>
                    <div class="brand-logo-wrapper">
                        <span class="brand-logo-text azure-logo">
                            <svg class="brand-icon-custom" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M5.9 22.8L0 16.2 12 .3l6.5 6.1z" fill="#007fff"/><path d="M18.1.3l5.9 6.6-12 15.9L5.5 16.7z" fill="#005A9C"/></svg> Azure
                        </span>
                    </div>
                    <div class="brand-logo-wrapper">
                        <span class="brand-logo-text dynamics-logo">
                            <i class="fa-solid fa-square-poll-vertical brand-fa-icon"></i> Dynamics 365
                        </span>
                    </div>
                    <div class="brand-logo-wrapper">
                        <span class="brand-logo-text power-logo">
                            <i class="fa-solid fa-bolt-lightning brand-fa-icon"></i> Power Platform
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="premium-capabilities-section">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-xl-3 col-md-6">
                <div class="premium-pillar-card">
                    <div class="pillar-icon-box">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    </div>
                    <h3 class="pillar-card-title">Business Applications</h3>
                    <p class="pillar-card-desc">Streamline operations with Dynamics 365 and Power Platform solutions.</p>
                    <div class="pillar-hover-indicator"></div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="premium-pillar-card">
                    <div class="pillar-icon-box">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <h3 class="pillar-card-title">Modern Work</h3>
                    <p class="pillar-card-desc">Enhance collaboration and productivity with Microsoft 365 and Copilot.</p>
                    <div class="pillar-hover-indicator"></div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="premium-pillar-card">
                    <div class="pillar-icon-box">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                    </div>
                    <h3 class="pillar-card-title">Data & AI</h3>
                    <p class="pillar-card-desc">Drive intelligent decisions using Azure Data, Analytics, and OpenAI.</p>
                    <div class="pillar-hover-indicator"></div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="premium-pillar-card">
                    <div class="pillar-icon-box">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 16V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h8"></path><path d="M12 17v4"></path><path d="M8 21h8"></path></svg>
                    </div>
                    <h3 class="pillar-card-title">Azure Infrastructure</h3>
                    <p class="pillar-card-desc">Build secure and scalable environments tailored for enterprise growth.</p>
                    <div class="pillar-hover-indicator"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="premium-minds-services-section" id="servicesSection">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8">
                <div class="minds-title-wrap">
                    <span class="minds-subtitle">[ WHAT WE OFFER ]</span>
                    <h2 class="minds-main-headline"><?php echo (!empty($heading) && !empty($heading->solutionTitle)) ? esc($heading->solutionTitle) : 'Our Services'; ?></h2>
                    <p class="minds-lead-desc"><?php echo (!empty($heading) && !empty($heading->solutionDescription)) ? esc($heading->solutionDescription) : ''; ?></p>
                </div>
            </div>
        </div>
        <div class="minds-services-wrapper ajaxdata">
            <?php if (!empty($servicesList)): ?>
                <?php foreach ($servicesList as $key => $value): ?>
                    <div class="minds-service-row-item <?php echo $key === 0 ? 'active' : ''; ?>">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-md-5 mb-4 mb-lg-0">
                                <div class="minds-header-block">
                                    <span class="service-index-number">0<?= $key + 1 ?></span>
                                    <h3 class="minds-service-title"><?= esc($value->name) ?></h3>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 mb-4 mb-lg-0 text-center">
                                <div class="minds-image-frame-box">
                                    <img src="<?= !empty($value->thumbnail) ? base_url($value->thumbnail) : (!empty($config_logo) ? base_url($config_logo) : ''); ?>" alt="Service Thumbnail" class="minds-showcase-img">
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-4">
                                <div class="minds-details-block ps-lg-4">
                                    <div class="minds-editor-desc"><?= $value->shortDescription ?></div>
                                    <div class="minds-action-footer-metric mt-4">
                                        <a href="<?= base_url('service/' . esc($value->slug)); ?>" class="btn-minds-action">Learn More <i class="fa-solid fa-arrow-up-right"></i></a>
                                        <div class="minds-mini-stat d-none d-xl-flex">
                                            <span class="stat-num">Ready</span>
                                            <span class="stat-lbl">DEPLOYMENT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="row d-none">
            <div class="col-lg-12">
                <input type="hidden" name="offset" id="offset" value="<?php echo isset($offset) ? esc($offset) : 0; ?>">
                <div class="btn-wrap text-center mt-5">
                    <a href="javascript:void(0);" id="spt" class="btn-hero-primary">Load More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 home-products" style="background-color: var(--rento-light); padding: 80px 0 !important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="title-wrap text-center mb-5">
                    <h2 class="fw-bold" style="color: var(--rento-dark); font-size: 2.5rem;"><?php echo (!empty($heading) && !empty($heading->customerTitle)) ? esc($heading->customerTitle) : ''; ?></h2>
                    <p style="color: var(--rento-slate);"><?php echo (!empty($heading) && !empty($heading->cultureDescription)) ? esc($heading->cultureDescription) : ''; ?></p>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <?php if (!empty($productList)): ?>
                <?php foreach ($productList as $key => $value): ?>
                    <div class="col-lg-4">
                        <div class="product-card" style="background: white; border: 1px solid var(--rento-border); border-radius: 12px; padding: 40px 30px; transition: 0.3s; height: 100%;">
                            <div class="icon mb-4 text-center">
                                <img src="<?php echo !empty($value->thumbnail) ? base_url($value->thumbnail) : (!empty($config_logo) ? base_url($config_logo) : ''); ?>" loading="lazy" style="height: 54px; object-fit: contain;" alt="Product Icon">
                            </div>
                            <div class="info text-center">
                                <p style="color: var(--rento-slate); font-size: 0.95rem; margin-bottom: 20px; line-height: 1.6;">
                                    <?php echo helper('text') ? character_limiter(strip_tags($value->shortDescription), 100) : substr(strip_tags($value->shortDescription), 0, 100) . '...'; ?>
                                </p>
                                <a href="<?php echo base_url('product/'.esc($value->slug)); ?>" style="color: var(--rento-blue); font-weight: 700; text-decoration: none;">View Details &rarr;</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if (!empty($caseStudyList)): ?>
<section class="premium-detail-breakdown-section" id="caseStudiesSection">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12">
                <span class="detail-subtitle">[ FEATURED WORKCASE ]</span>
                <h2 class="detail-main-headline">Attention to Detail<br>At Every Level</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-3 col-lg-4 mb-5 mb-lg-0 order-2 order-lg-1">
                <div class="detail-vertical-tabs-nav">
                    <?php foreach ($caseStudyList as $key => $value): ?>
                        <button class="detail-nav-tab-link <?php echo $key === 0 ? 'active' : ''; ?>" onclick="switchCaseStudy(this, <?= $key ?>)">
                            <?= esc($value->title) ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 order-1 order-lg-2">
                <div class="detail-display-stage-container">
                    <?php foreach ($caseStudyList as $key => $value): ?>
                        <div class="detail-case-content-card <?php echo $key === 0 ? 'active' : ''; ?>" id="case-card-<?= $key ?>">
                            <div class="detail-image-showcase-frame">
                                <img src="<?php echo !empty($value->thumbnail) ? base_url($value->thumbnail) : (!empty($config_logo) ? base_url($config_logo) : ''); ?>" alt="Case Image" class="detail-showcase-img">
                            </div>
                            <div class="detail-meta-split-row">
                                <div class="split-left-heading">
                                    <h3 class="detail-active-sub-title"><?= esc($value->title) ?></h3>
                                </div>
                                <div class="split-right-description">
                                    <div class="detail-body-paragraph"><?= esc($value->shortDescription) ?></div>
                                    <?php if (!empty($value->whitepaper_download)): ?>
                                        <div class="mt-4">
                                            <a data-bs-toggle="modal" data-blogid="<?php echo esc($value->id); ?>" data-bs-target="#exampleModal" class="btn-detail-action-link">View Case Study <i class="fa-solid fa-arrow-right"></i></a>
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

<section class="premium-milk-industry-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto">
                <div class="industry-milk-header text-center">
                    <h2 class="industry-milk-headline"><?php echo (!empty($heading) && !empty($heading->whyTitle)) ? esc($heading->whyTitle) : 'Industries We Serve'; ?></h2>
                    <p class="industry-milk-desc"><?php echo (!empty($heading) && !empty($heading->partnerTitle)) ? esc($heading->partnerTitle) : ''; ?></p>
                </div>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            <?php if (!empty($industryList)): ?>
                <?php foreach ($industryList as $key => $value): ?>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <a href="<?php echo base_url('industry/' . esc($value->slug)); ?>" class="industry-milk-card">
                            <div class="industry-milk-card-body">
                                <div class="industry-milk-icon-box">
                                    <img src="<?php echo !empty($value->thumbnail) ? base_url($value->thumbnail) : (!empty($config_logo) ? base_url($config_logo) : ''); ?>" class="industry-milk-img" alt="Industry Icon">
                                </div>
                                <h3 class="industry-milk-card-title"><?php echo esc($value->name); ?></h3>
                            </div>
                            <div class="industry-milk-card-footer">
                                <span class="industry-milk-btn-lbl">Learn More</span>
                                <span class="industry-milk-btn-arrow">&rarr;</span>
                            </div>
                            <div class="industry-milk-card-line-indicator"></div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="premium-bento-vision-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-xl-8 col-lg-10 mx-auto text-center">
                <span class="bento-vision-badge">Corporate Strategy</span>
                <h2 class="bento-vision-headline">Our Vision</h2>
                <div class="bento-vision-intro-wrapper mt-4">
                    <h4 class="bento-vision-statement">Empower People and Enterprises with Digital Solutions through value-added consulting.</h4>
                    <p class="bento-vision-desc">We truly believe in the power of leveraging cloud computing to streamline operations and enhance customer experiences. By integrating Power BI, AI, and ML frameworks, we break data silos, deliver actionable insights, simplify complex workflows, and drive rapid business growth through custom automation.</p>
                </div>
            </div>
        </div>
        <div class="bento-matrix-mesh-grid mt-5">
            <div class="bento-mesh-item item-size-large">
                <div class="bento-milk-card">
                    <div class="bento-icon-marker"><i class="fa-solid fa-users-gear"></i></div>
                    <div>
                        <div class="bento-metric-value">250<span class="value-plus">+</span></div>
                        <p class="bento-metric-label">Global Customers Active</p>
                    </div>
                    <div class="bento-card-hover-border"></div>
                </div>
            </div>
            <div class="bento-mesh-item item-size-medium">
                <div class="bento-milk-card">
                    <div class="bento-icon-marker"><i class="fa-solid fa-earth-asia"></i></div>
                    <div>
                        <div class="bento-metric-value">20</div>
                        <p class="bento-metric-label">Countries Serviced</p>
                    </div>
                    <div class="bento-card-hover-border"></div>
                </div>
            </div>
            <div class="bento-mesh-item">
                <div class="bento-milk-card">
                    <div class="bento-icon-marker"><i class="fa-solid fa-briefcase"></i></div>
                    <div>
                        <div class="bento-metric-value">20</div>
                        <p class="bento-metric-label">Years in Business</p>
                    </div>
                    <div class="bento-card-hover-border"></div>
                </div>
            </div>
            <div class="bento-mesh-item">
                <div class="bento-milk-card">
                    <div class="bento-icon-marker"><i class="fa-solid fa-cubes-stacked"></i></div>
                    <div>
                        <div class="bento-metric-value">100<span class="value-plus">+</span></div>
                        <p class="bento-metric-label">Implementations Completed</p>
                    </div>
                    <div class="bento-card-hover-border"></div>
                </div>
            </div>
            <div class="bento-mesh-item item-size-large">
                <div class="bento-milk-card">
                    <div class="bento-icon-marker"><i class="fa-solid fa-user-tie"></i></div>
                    <div>
                        <div class="bento-metric-value">300<span class="value-plus">+</span></div>
                        <p class="bento-metric-label">Tech & Functional Consultants Available</p>
                    </div>
                    <div class="bento-card-hover-border"></div>
                </div>
            </div>
            <div class="bento-mesh-item item-size-medium">
                <div class="bento-milk-card">
                    <div class="bento-icon-marker"><i class="fa-solid fa-diagram-project"></i></div>
                    <div>
                        <div class="bento-metric-value">10<span class="value-plus">+</span></div>
                        <p class="bento-metric-label">Industry Custom Solutions</p>
                    </div>
                    <div class="bento-card-hover-border"></div>
                </div>
            </div>
        </div>
        <div class="row mt-5 pt-3">
            <div class="col-lg-12 text-center">
                <a href="<?php echo base_url('about'); ?>" class="btn-bento-vision-action">
                    <span>Learn More About Our Journey</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="premium-cta-careers-section">
    <div class="cta-geometric-grid-overlay"></div>
    <div class="container position-relative z-index-2">
        <div class="row align-items-center">
            <div class="col-lg-8 text-center text-lg-start mb-4 mb-lg-0">
                <span class="cta-mini-badge">WE ARE HIRING</span>
                <h2 class="cta-display-headline"><?php echo (!empty($heading) && !empty($heading->workTitle)) ? esc($heading->workTitle) : 'Work With Us'; ?></h2>
                <p class="cta-paragraph-desc"><?php echo (!empty($heading) && !empty($heading->workDescription)) ? esc($heading->workDescription) : ''; ?></p>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <a href="<?php echo base_url('careers'); ?>" class="btn-premium-cta-action">
                    <span>Explore Careers</span>
                    <svg class="cta-arrow-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="trendy-buzz-horizon-section">
    <div class="container">
        <div class="row mb-5 align-items-end">
            <div class="col-lg-6">
                <div class="horizon-header-block">
                    <span class="horizon-subtitle">[ INSIGHTS & KNOWLEDGE ]</span>
                    <h2 class="horizon-main-headline">Catch up on Our<br>Latest Buzz</h2>
                </div>
            </div>
            <div class="col-lg-6 text-lg-end d-none d-lg-block">
                <p class="horizon-header-desc text-muted">
                    Stay updated with our latest happenings, deep-dives, and enterprise technological breakthroughs.
                </p>
            </div>
        </div>

        <?php if (!empty($blogList)): ?>
            <div class="row g-5">
                <div class="col-xl-6 col-lg-5">
                    <div class="swiper horizon-left-deck-swiper">
                        <div class="swiper-wrapper">
                            <?php 
                            $blogChunks = array_chunk($blogList, 2);
                            foreach ($blogChunks as $chunk): 
                            ?>
                                <div class="swiper-slide layout-bento-double-slide">
                                    <?php if (isset($chunk[0])): $b1 = $chunk[0]; ?>
                                        <a href="<?php echo base_url('blog/' . esc($b1->slug)); ?>" class="horizon-featured-spotlight-card">
                                            <div class="spotlight-media-canvas">
                                                <img src="<?php echo !empty($b1->thumbnail) ? base_url($b1->thumbnail) : (!empty($config_logo) ? base_url($config_logo) : ''); ?>" alt="Featured Visual Assets" class="spotlight-img">
                                                <?php if (!empty($b1->category_name)): ?>
                                                    <span class="horizon-pill-badge"><?= esc($b1->category_name); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="spotlight-content-tray">
                                                <div class="horizon-meta-node">
                                                    <span class="meta-author">BY ATNS INTEL</span>
                                                    <span class="meta-divider"></span>
                                                    <span class="meta-date">FEATURED TRENDS</span>
                                                </div>
                                                <h3 class="spotlight-card-title"><?php echo esc($b1->title); ?></h3>
                                                <div class="horizon-action-trigger">
                                                    <span class="trigger-text">Read Full Perspective</span>
                                                    <svg class="trigger-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (isset($chunk[1])): $b2 = $chunk[1]; ?>
                                        <a href="<?php echo base_url('blog/' . esc($b2->slug)); ?>" class="horizon-stream-row-item normal-size-modifier mt-4">
                                            <div class="stream-item-inner-layout">
                                                <div class="stream-media-frame">
                                                    <img src="<?php echo !empty($b2->thumbnail) ? base_url($b2->thumbnail) : (!empty($config_logo) ? base_url($config_logo) : ''); ?>" alt="Buzz Row Frame" class="stream-img">
                                                </div>
                                                <div class="stream-details-block">
                                                    <div class="horizon-meta-node mb-2">
                                                        <?php if (!empty($b2->category_name)): ?>
                                                            <span class="meta-category-tag"><?= esc($b2->category_name); ?></span>
                                                            <span class="meta-divider"></span>
                                                        <?php endif; ?>
                                                        <span class="meta-author">ATNS INSIGHTS</span>
                                                    </div>
                                                    <h4 class="stream-card-title"><?php echo esc($b2->title); ?></h4>
                                                    <div class="stream-action-link">
                                                        <span>Explore Post</span> <i class="fa-solid fa-arrow-right"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="horizon-row-border-indicator"></div>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-7">
                    <div class="swiper horizon-right-stack-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide vertical-stack-slide">
                                <div class="horizon-stream-vertical-stack">
                                    <?php 
                                    foreach ($blogList as $key => $value): 
                                        if($key < 2) continue; 
                                    ?>
                                        <a href="<?php echo base_url('blog/' . esc($value->slug)); ?>" class="horizon-stream-row-item">
                                            <div class="stream-item-inner-layout">
                                                <div class="stream-media-frame">
                                                    <img src="<?php echo !empty($value->thumbnail) ? base_url($value->thumbnail) : (!empty($config_logo) ? base_url($config_logo) : ''); ?>" alt="Buzz Row Frame" class="stream-img">
                                                </div>
                                                <div class="stream-details-block">
                                                    <div class="horizon-meta-node mb-2">
                                                        <?php if (!empty($value->category_name)): ?>
                                                            <span class="meta-category-tag"><?= esc($value->category_name); ?></span>
                                                            <span class="meta-divider"></span>
                                                        <?php endif; ?>
                                                        <span class="meta-author">ATNS CORE</span>
                                                    </div>
                                                    <h4 class="stream-card-title"><?php echo esc($value->title); ?></h4>
                                                    <div class="stream-action-link">
                                                        <span>Explore</span> <i class="fa-solid fa-arrow-right"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="horizon-row-border-indicator"></div>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php echo $this->include('frontend/includes/bottom_section'); ?>
<?php echo $this->include('frontend/includes/download'); ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var heroSwiper = new Swiper('.premium-hero-slider', {
            effect: 'fade',
            fadeEffect: { crossFade: true },
            speed: 1000,
            autoplay: { delay: 6000, disableOnInteraction: false },
            pagination: { el: '.hero-pagination', clickable: true },
        });

        const serviceRows = document.querySelectorAll('.minds-service-row-item');
        if (serviceRows.length > 0) {
            serviceRows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    serviceRows.forEach(item => item.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        }

        var rightStackSwiper = new Swiper('.horizon-right-stack-swiper', {
            effect: 'fade',
            fadeEffect: { crossFade: true },
            allowTouchMove: false,
            speed: 800
        });

        var leftDeckSwiper = new Swiper('.horizon-left-deck-swiper', {
            speed: 800,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            controller: {
                control: rightStackSwiper 
            }
        });
    });

    function switchBookingTab(buttonElement, chosenMode) {
        const structuralButtons = buttonElement.parentElement.querySelectorAll('.booking-tab-btn');
        structuralButtons.forEach(btn => btn.classList.remove('active'));
        buttonElement.classList.add('active');
    }

    function switchCaseStudy(buttonElement, targetIndex) {
        const tabLinks = buttonElement.parentElement.querySelectorAll('.detail-nav-tab-link');
        tabLinks.forEach(link => link.classList.remove('active'));
        
        const stageContainer = buttonElement.closest('.row').querySelector('.detail-display-stage-container');
        const contentCards = stageContainer.querySelectorAll('.detail-case-content-card');
        contentCards.forEach(card => card.classList.remove('active'));
        
        buttonElement.classList.add('active');
        const targetCard = stageContainer.querySelector(`#case-card-${targetIndex}`);
        if (targetCard) { targetCard.classList.add('active'); }
    }
</script>

<!-- ==========================================================================
     ZOHO SALESIQ HIGH-CONVERSION CONVERSATIONAL CHATBOT ENGINE
     ========================================================================== -->
<script type="text/javascript" id="zsiqchat">
    var $zoho = $zoho || {};
    $zoho.salesiq = $zoho.salesiq || {
        widgetcode: "YOUR_UNIQUE_ZOHO_SALESIQ_WIDGET_CODE_HERE", 
        values: {},
        ready: function() {
            // Optional: Programmatic custom initial behavior configurations
            // Automatically minimizes or hides chat on extra small viewports if necessary
            if(window.innerWidth < 576) {
                //$zoho.salesiq.widget.floatwindow.visible("hide");
            }
        }
    };
    
    // Asynchronous injection layer to guarantee absolute zero degradation of your core page load speed
    (function() {
        var d = document;
        var s = d.createElement("script");
        s.type = "text/javascript";
        s.id = "zsiqscript";
        s.defer = true;
        s.src = "https://salesiq.zohopublic.com/widget";
        var t = d.getElementsByTagName("script")[0];
        t.parentNode.insertBefore(s, t);
    })();
</script>

<?php $this->endSection(); ?>