<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true;
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
    /* ==========================================================================
       DESIGN TOKENS — scoped to this page only
       ========================================================================== */
    .page-partners {
        --atna-primary:    #0d2c6c;
        --atna-secondary:  #2f7cff;
        --atna-bg-light:   #f8f9fb;
        --atna-text-dark:  #1a1a1a;
        --atna-border:      rgba(13, 44, 108, 0.08);
        --atna-card-rad:   1rem;
        --section-py:      5rem;
        --section-py-sm:   3rem;

        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        color: var(--atna-text-dark);
        overflow-x: hidden;
    }

    .page-partners h1,
    .page-partners h2,
    .page-partners h3,
    .page-partners h4,
    .page-partners h5,
    .page-partners h6 { line-height: 1.25; }

    .page-partners img { display: block; max-width: 100%; height: auto; }

    /* ==========================================================================
       BACKGROUNDS & COMPOSITOR
       ========================================================================== */
    .bg-enterprise-dark {
        background: linear-gradient(135deg, #051433 0%, #0d2c6c 100%);
    }
    .bg-gradient-enterprise {
        background: linear-gradient(135deg, #051433 0%, #0d2c6c 100%);
    }
    
    /* Premium Ultra-Trendy Hero Composition */
    .network-glow-bg {
        position: relative;
        background-color: #061126;
        background-image: 
            radial-gradient(circle at 10% 20%, rgba(47, 124, 255, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 90% 80%, rgba(0, 212, 255, 0.1) 0%, transparent 50%);
        overflow: hidden;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    /* Hardware-Accelerated Vector Network Mesh Grid Overlay */
    .network-glow-bg::before {
        content: '';
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background-image: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg stroke='%232f7cff' stroke-width='0.5' stroke-opacity='0.04'%3E%3Cpath d='M40 0v80M0 40h80'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        z-index: 1;
        pointer-events: none;
    }

    /* Ambient Blur Orb Elements */
    .hero-blur-orb {
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(47, 124, 255, 0.12) 0%, rgba(6, 17, 38, 0) 70%);
        filter: blur(40px);
        pointer-events: none;
        z-index: 1;
    }
    .orb-top-right { top: -20%; right: -10%; }
    .orb-bottom-left { bottom: -30%; left: -10%; }

    /* ==========================================================================
       TRENDING HERO UI COMPONENTS
       ========================================================================== */
    .text-gradient-premium {
        background: linear-gradient(135deg, #ffffff 30%, #a5c7fe 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .tracking-wider { letter-spacing: 0.08em; }

    .hero-badge-glow {
        background: rgba(255, 255, 255, 0.04);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        padding: 6px 16px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
        color: #e2e8f0;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .rounded-pill-custom { border-radius: 50px !important; }
    
    .btn-atna-primary {
        background-color: var(--atna-secondary);
        border: none;
        color: #fff;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .btn-atna-primary:hover {
        background-color: #1a62dc;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(47, 124, 255, 0.3);
        color: #fff;
    }
    .btn-outline-custom {
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #fff;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .btn-outline-custom:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: #fff;
        transform: translateY(-2px);
        color: #fff;
    }

    /* Premium Asymmetrical Interactive Right Image Enclosure */
    .hero-showroom-viewport {
        position: relative;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 2;
    }
    .hero-glass-frame {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.01) 100%);
        border: 1px solid rgba(255, 255, 255, 0.07);
        border-radius: 24px;
        padding: 30px;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 480px;
    }
    .hero-image-canvas {
        border-radius: 14px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
        background: #091428;
        box-shadow: 0 15px 35px rgba(0,0,0,0.3);
    }
    .hero-image-canvas img {
        width: 100%;
        height: auto;
        object-fit: contain;
        display: block;
    }

    /* Floating Micro Stats Badge Inside Hero */
    .hero-floating-indicator {
        position: absolute;
        bottom: 10px;
        left: -15px;
        background: #ffffff;
        padding: 12px 20px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        animation: heroFloatY 4s ease-in-out infinite;
        z-index: 3;
    }
    .hero-floating-indicator i {
        width: 32px; height: 32px;
        background: #eaf3ff; color: var(--atna-secondary);
        border-radius: 50%; display: flex; align-items: center; justify-content: center;
        font-size: 0.9rem;
    }
    .hero-floating-indicator span { font-size: 0.8rem; font-weight: 700; color: #0f172a; }

    @keyframes heroFloatY {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }

    /* ==========================================================================
       BODY SECTIONS CORE COMPONENTS
       ========================================================================== */
    .premium-card-hover {
        transition: transform 0.35s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.35s ease;
    }
    .premium-card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 1.25rem 3rem rgba(13, 44, 108, 0.09) !important;
    }

    .icon-wrapper-circle {
        width: 52px;
        height: 52px;
        background: rgba(47, 124, 255, 0.08);
        color: var(--atna-secondary);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 1.3rem;
        flex-shrink: 0;
    }

    .grayscale-logo-strip {
        filter: grayscale(100%);
        opacity: 0.55;
        transition: filter 0.3s ease, opacity 0.3s ease, transform 0.3s ease;
        max-width: 120px;
        height: auto;
        display: inline-block;
    }
    .grayscale-logo-strip:hover {
        filter: grayscale(0%);
        opacity: 1;
        transform: scale(1.04);
    }

    .logo-grid-cell {
        background: var(--atna-bg-light);
        border: 1px solid var(--atna-border);
        border-radius: 0.5rem;
        padding: 1rem;
        transition: all 0.3s ease;
    }
    .logo-grid-cell:hover {
        background: #ffffff;
        border-color: var(--atna-secondary);
        box-shadow: 0 0.5rem 1rem rgba(13, 44, 108, 0.05);
    }

    .partner-scroll-box {
        overflow-y: auto;
        overflow-x: hidden;
        max-height: 400px;
        padding-right: 4px;
        scrollbar-width: thin;
        scrollbar-color: rgba(47,124,255,0.25) transparent;
    }
    .partner-scroll-box::-webkit-scrollbar { width: 4px; }
    .partner-scroll-box::-webkit-scrollbar-track { background: transparent; }
    .partner-scroll-box::-webkit-scrollbar-thumb {
        background: rgba(47,124,255,0.3);
        border-radius: 4px;
    }

    .page-partners .sec-vpad {
        padding-top: var(--section-py);
        padding-bottom: var(--section-py);
    }
    .page-partners .sec-vpad-sm {
        padding-top: var(--section-py-sm);
        padding-bottom: var(--section-py-sm);
    }

    .ms-stat-grid .ms-stat-cell { padding: 1.5rem 1rem; }
    .ms-stat-grid .ms-stat-cell.border-right-md { border-right: 1px solid #dee2e6; }
    .ms-stat-grid .ms-stat-cell.border-bottom-md { border-bottom: 1px solid #dee2e6; }

    /* ==========================================================================
       RESPONSIVE MODIFIERS 
       ========================================================================== */
    @media (min-width: 992px) {
        .page-partners { --section-py: 5rem; }
    }

    @media (max-width: 991.98px) {
        .network-glow-bg { padding: 120px 0 60px 0 !important; }
        .hero-showroom-viewport { margin-top: 40px; }
        .hero-floating-indicator { left: 15px; }
        .ms-stat-grid .ms-stat-cell.border-right-md { border-right: none; }
        .ms-stat-grid .ms-stat-cell.border-bottom-md { border-bottom: none; }
        .ms-stat-grid .ms-stat-cell {
            border-bottom: 1px solid #dee2e6;
            border-right: 1px solid #dee2e6;
        }
        .ms-stat-grid .ms-stat-cell:nth-child(2n) { border-right: none; }
        .ms-stat-grid .ms-stat-cell:nth-child(3),
        .ms-stat-grid .ms-stat-cell:nth-child(4) { border-bottom: none; }
    }

    @media (max-width: 767.98px) {
        .page-partners {
            --section-py: 4rem;
            --section-py-sm: 2.5rem;
        }
        .logo-divider { display: none !important; }
    }

    @media (max-width: 575.98px) {
        .hero-floating-indicator { display: none; }
        .hero-glass-frame { padding: 15px; border-radius: 16px; }
        .ms-stat-grid .ms-stat-cell {
            border-right: none !important;
            border-bottom: 1px solid #dee2e6 !important;
        }
        .ms-stat-grid .ms-stat-cell:last-child { border-bottom: none !important; }
    }

    @media (prefers-reduced-motion: reduce) {
        .premium-card-hover,
        .grayscale-logo-strip,
        .hero-floating-indicator { transition: none !important; animation: none !important; }
        .premium-card-hover:hover { transform: none !important; }
    }
</style>

<div class="page-partners">

<section class="inner_banner position-relative overflow-hidden py-5 d-flex align-items-center network-glow-bg">
    <div class="hero-blur-orb orb-top-right"></div>
    <div class="hero-blur-orb orb-bottom-left"></div>
    
    <div class="container-xl position-relative" style="z-index: 2;">
        <div class="row align-items-center g-4 g-lg-5">

            <div class="col-lg-6 text-center text-lg-start">
                <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-lg-start mb-4" data-cues="slideInUp">
                    <span class="hero-badge-glow"><i class="fab fa-microsoft text-info"></i> Strategic Partnerships</span>
                    <span class="hero-badge-glow"><i class="bi bi-cpu-fill text-warning"></i> Enterprise Ecosystem</span>
                </div>

                <h1 class="display-5 fw-bold mb-3 text-gradient-premium" data-cues="slideInUp">
                    Accelerating Digital Transformation Through Strategic Partnerships
                </h1>

                <p class="lead mb-4 text-white-50 fs-6 lh-base" data-cues="slideInUp">
                    At ATNA Technologies, we collaborate with leading global technology providers to deliver innovative ERP, Cloud, Data Analytics, AI, and Digital Transformation solutions. Our strategic partnerships empower organizations to modernize operations, improve decision-making, and achieve sustainable growth with confidence.
                </p>

                <div class="pt-3 pb-3 border-top border-bottom border-light border-opacity-10 mb-4" data-cues="slideInUp">
                    <span class="small text-uppercase tracking-wider text-white-50 fw-semibold d-block mb-3" style="font-size:0.7rem;">Trusted by businesses across manufacturing, distribution, retail, textile, FMCG, and professional services verticals.</span>
                    <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3 text-white-50 small" style="font-size:0.8rem;">
                        <span class="d-flex align-items-center"><i class="bi bi-building-gear text-info me-2"></i>Manufacturing</span>
                        <span class="opacity-25 d-none d-sm-inline">|</span>
                        <span class="d-flex align-items-center"><i class="bi bi-cart3 text-info me-2"></i>Retail &amp; E-comm</span>
                        <span class="opacity-25 d-none d-sm-inline">|</span>
                        <span class="d-flex align-items-center"><i class="bi bi-bank text-info me-2"></i>BFSI</span>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start" data-cues="slideInUp">
                    <a href="#contact" class="btn btn-atna-primary rounded-pill-custom px-4 py-2.5 fw-semibold shadow-sm text-uppercase tracking-wider small" style="font-size:0.75rem;">Talk to Our Experts</a>
                    <a href="#ecosystem" class="btn btn-outline-custom rounded-pill-custom px-4 py-2.5 fw-semibold text-uppercase tracking-wider small" style="font-size:0.75rem;">Explore Our Solutions</a>
                </div>
            </div>

            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                <div class="hero-showroom-viewport" data-cues="slideInRight">
                    
                    <div class="hero-floating-indicator">
                        <i class="fas fa-handshake"></i>
                        <span>Global Certified Tier One</span>
                    </div>

                    <div class="hero-glass-frame">
                        <div class="hero-image-canvas">
                            <img src="<?php echo $meta->image ? base_url($meta->image) : base_url($config_logo); ?>"
                                 loading="eager"
                                 alt="Ecosystem Matrix Showcase Platform Blueprint Illustration Graph Canvas Asset">
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
</section>

<section id="ecosystem" class="sec-vpad bg-white border-bottom">
    <div class="container-xl">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-9 col-xl-8 text-center">
                <span class="text-uppercase fw-bold small tracking-wider mb-2 d-block" style="color: var(--atna-secondary);">Our Partner Ecosystem</span>
                <h2 class="h2 fw-bold text-dark mb-3">Global Alliances That Fuel Innovation</h2>
                <p class="fs-5 text-muted lh-base mb-0">We believe successful digital transformation requires the right technology, the right expertise, and the right implementation partner. Through our strategic alliances, we help businesses unlock the full potential of industry-leading platforms and technologies.</p>
            </div>
        </div>

        <div class="d-flex flex-wrap justify-content-center align-items-center gap-4 pt-4 border-top border-light-subtle">
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/96/Microsoft_logo_%282012%29.svg" alt="Microsoft" class="grayscale-logo-strip" style="height: 22px;">
            <span class="text-black-50 opacity-25 logo-divider">|</span>
            <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple" class="grayscale-logo-strip" style="height: 22px;">
            <span class="text-black-50 opacity-25 logo-divider">|</span>
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" alt="Amazon" class="grayscale-logo-strip" style="height: 18px;">
            <span class="text-black-50 opacity-25 logo-divider">|</span>
            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" alt="Google" class="grayscale-logo-strip" style="height: 20px;">
            <span class="text-black-50 opacity-25 logo-divider">|</span>
            <img src="https://upload.wikimedia.org/wikipedia/commons/0/01/Cisco_logo.svg" alt="Cisco" class="grayscale-logo-strip" style="height: 26px;">
        </div>
    </div>
</section>

<section class="sec-vpad bg-light border-bottom">
    <div class="container-xl">

        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h3 class="h2 fw-bold text-dark position-relative d-inline-block pb-3 mb-0">
                    Technology Partnerships That Deliver Business Value
                    <span class="position-absolute bottom-0 start-50 translate-middle-x rounded-pill" style="width: 56px; height: 4px; background-color: var(--atna-secondary);"></span>
                </h3>
            </div>
        </div>

        <div class="row align-items-stretch g-4">

            <div class="col-12 col-lg-5 d-flex">
                <div class="bg-white p-4 p-xl-5 rounded-4 shadow-sm border border-light-subtle w-100 d-flex flex-column justify-content-center">
                    <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                        <div class="icon-wrapper-circle" style="background: rgba(13,44,108,0.08); color: var(--atna-primary);">
                            <i class="fab fa-microsoft"></i>
                        </div>
                        <div>
                            <h4 class="h5 fw-bold text-dark mb-0">Microsoft Solutions</h4>
                            <span class="text-muted small">Gold / Strategic Alliance</span>
                        </div>
                    </div>
                    <p class="text-muted mb-4 lh-base" style="font-size: 0.95rem;">As a specialized technology partner, ATNA Technologies enables enterprise clients to scale with modern solutions deployed directly within Microsoft Ecosystem layers including unified infrastructure modernizations.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-light text-secondary border py-2 px-3 rounded-pill fw-medium" style="font-size: 0.75rem;">Unified Integration</span>
                        <span class="badge bg-light text-secondary border py-2 px-3 rounded-pill fw-medium" style="font-size: 0.75rem;">Enterprise Tier</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-7 d-flex">
                <div class="row g-4 w-100 m-0">
                    
                    <div class="col-12 col-md-6 d-flex p-0 pe-md-2">
                        <div class="bg-white p-4 rounded-4 shadow-sm border border-light-subtle w-100 d-flex flex-column">
                            <div class="d-flex align-items-center justify-content-between gap-2 mb-3 pb-3 border-bottom">
                                <h5 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2" style="font-size: 1rem;">
                                    <i class="bi bi-cpu" style="color: var(--atna-secondary);"></i> Key Capabilities
                                </h5>
                                <span class="badge rounded-pill fw-semibold" style="background: rgba(47,124,255,0.1); color: var(--atna-secondary); font-size: 0.72rem;">
                                    Capabilities Array
                                </span>
                            </div>

                            <div class="partner-scroll-box w-100 flex-grow-1">
                                <div class="row g-2 m-0 p-0">
                                    <?php if (!empty($gallery)): foreach ($gallery as $key => $value): if (!empty($value['list'])): foreach ($value['list'] as $row): ?>
                                    <div class="col-12 col-sm-6 p-1">
                                        <div class="logo-grid-cell d-flex flex-column align-items-center justify-content-center h-100 text-center" title="<?php echo !empty($row->name) ? htmlspecialchars($row->name) : 'Partner Alliance'; ?>">
                                            <div class="d-flex align-items-center justify-content-center mb-1" style="height: 44px; width: 100%;">
                                                <img src="<?php echo !empty($row->image) ? base_url($row->image) : base_url($config_logo); ?>" loading="lazy" alt="<?php echo !empty($row->name) ? htmlspecialchars($row->name) : 'Partner Logo'; ?>" style="max-height: 34px; object-fit: contain;">
                                            </div>
                                            <?php if (!empty($row->name)): ?>
                                                <span class="d-block text-dark fw-semibold text-truncate w-100 px-1 mt-1" style="font-size: 0.72rem;">
                                                    <?php echo htmlspecialchars($row->name); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endforeach; endif; endforeach; else: ?>
                                        <?php 
                                        $fallback_caps = [
                                            'Dynamics 365 Business Central', 'Dynamics 365 Customer Engagement', 
                                            'Microsoft Azure Platform', 'Microsoft Power Platform', 
                                            'Microsoft Fabric Infrastructure', 'Advanced Power BI Analytics', 
                                            'AI Systems & Copilot Architectures', 'Application Modernization'
                                        ];
                                        foreach($fallback_caps as $fc): ?>
                                        <div class="col-12 p-1">
                                            <div class="d-flex align-items-center gap-2 p-2 bg-light rounded-3 border w-100">
                                                <i class="bi bi-patch-check-fill text-primary small flex-shrink-0"></i>
                                                <span class="small fw-semibold text-dark text-truncate"><?php echo $fc; ?></span>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 d-flex p-0 ps-md-2">
                        <div class="bg-white p-4 rounded-4 shadow-sm border border-light-subtle w-100 d-flex flex-column">
                            <div class="d-flex align-items-center gap-2 mb-3 pb-3 border-bottom">
                                <h5 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2" style="font-size: 1rem;">
                                    <i class="bi bi-shield-check text-success"></i> Business Benefits
                                </h5>
                            </div>
                            <ul class="list-unstyled d-flex flex-column gap-3 mb-0 justify-content-center flex-grow-1">
                                <li class="d-flex align-items-start gap-3 p-1">
                                    <i class="bi bi-check-lg text-success fw-bold fs-5 flex-shrink-0" style="line-height: 1;"></i>
                                    <span class="small fw-semibold text-muted">Accelerate digital transformation initiatives</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 p-1">
                                    <i class="bi bi-check-lg text-success fw-bold fs-5 flex-shrink-0" style="line-height: 1;"></i>
                                    <span class="small fw-semibold text-muted">Improve operational infrastructure metrics</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 p-1">
                                    <i class="bi bi-check-lg text-success fw-bold fs-5 flex-shrink-0" style="line-height: 1;"></i>
                                    <span class="small fw-semibold text-muted">Gain global operations deployment visibility</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 p-1">
                                    <i class="bi bi-check-lg text-success fw-bold fs-5 flex-shrink-0" style="line-height: 1;"></i>
                                    <span class="small fw-semibold text-muted">Enable secure multi-region architecture scaling</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 p-1">
                                    <i class="bi bi-check-lg text-success fw-bold fs-5 flex-shrink-0" style="line-height: 1;"></i>
                                    <span class="small fw-semibold text-muted">Drive intelligent data-driven analytical insights</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<section class="sec-vpad bg-white border-bottom">
    <div class="container-xl">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <span class="text-uppercase fw-bold small tracking-wider mb-2 d-block" style="color: var(--atna-secondary);">Industry Solutions Framework</span>
                <h2 class="h2 fw-bold text-dark mb-2">Targeted Vertical Applications</h2>
                <p class="text-muted mb-0">Our partner ecosystem enables us to deliver specialized systems designed specifically for unique manufacturing, retail, distribution and service environments.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-xl-3 col-md-6">
                <div class="card h-100 border border-light-subtle p-4 shadow-sm bg-white rounded-4 premium-card-hover">
                    <div class="icon-wrapper-circle mb-3"><i class="bi bi-buildings"></i></div>
                    <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">Manufacturing</h5>
                    <ul class="list-unstyled d-flex flex-column gap-2 text-muted small mb-0">
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Production Planning Engines</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Multi-Warehouse Optimization</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Supply Chain Integrations</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Enterprise Cost Management</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card h-100 border border-light-subtle p-4 shadow-sm bg-white rounded-4 premium-card-hover">
                    <div class="icon-wrapper-circle mb-3"><i class="bi bi-cart3"></i></div>
                    <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">Retail &amp; Distribution</h5>
                    <ul class="list-unstyled d-flex flex-column gap-2 text-muted small mb-0">
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Automated Omni-Channel Control</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Dynamic Demand Forecasting</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Modern Barcode System Flows</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Integrated Customer Experience</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card h-100 border border-light-subtle p-4 shadow-sm bg-white rounded-4 premium-card-hover">
                    <div class="icon-wrapper-circle mb-3"><i class="bi bi-tags"></i></div>
                    <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">Textile &amp; Apparel</h5>
                    <ul class="list-unstyled d-flex flex-column gap-2 text-muted small mb-0">
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Advanced Production Tracking</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Global Currency Trade Logic</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Raw Inventory Management</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Financial Consolidation</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card h-100 border border-light-subtle p-4 shadow-sm bg-white rounded-4 premium-card-hover">
                    <div class="icon-wrapper-circle mb-3"><i class="bi bi-cup-hot"></i></div>
                    <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">Food &amp; Beverage</h5>
                    <ul class="list-unstyled d-flex flex-column gap-2 text-muted small mb-0">
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Standard Batch Traceability</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Compliance &amp; Regulation Matrix</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Secure Vendor Management</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Production Scaling Loops</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec-vpad bg-white">
    <div class="container-xl">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <span class="text-uppercase fw-bold small tracking-wider mb-2 d-block" style="color: var(--atna-secondary);">The ATNA Strategic Advantage</span>
                <h2 class="h2 fw-bold text-dark mb-2">Why Our Strategic Alliances Matter</h2>
                <p class="text-muted mb-0">Technology deployment requires rigorous engineering experience combined with verified frameworks to maximize architectural investments safely.</p>
            </div>
        </div>

        <div class="row g-4 row-cols-2 row-cols-md-3 row-cols-xl-6 justify-content-center">
            <?php
            $pillars = [
                ['icon' => 'fa-solid fa-user-shield',    'title' => 'Certified Expertise',    'desc' => 'Engineers carrying comprehensive technical certifications across cloud architectures.'],
                ['icon' => 'fa-solid fa-gauge-high',       'title' => 'Faster Deployment',   'desc' => 'Accelerators and deployment code blueprints designed to scale cycles safely.'],
                ['icon' => 'fa-solid fa-lightbulb',        'title' => 'Innovation Engines',   'desc' => 'Continuous functional integration of emerging artificial intelligence layers.'],
                ['icon' => 'fa-solid fa-network-wired',    'title' => 'End-to-End Managed',     'desc' => 'Complete ecosystem oversight including system performance scaling audits.'],
                ['icon' => 'fa-solid fa-lock',             'title' => 'Secure Compliance',     'desc' => 'Enterprise compliance structures built inside high-performance standards.'],
                ['icon' => 'fa-solid fa-globe-americas',   'title' => 'Global Distribution', 'desc' => 'Multi-currency structures configured for complex cross-border trade layouts.']
            ];
            foreach ($pillars as $p): ?>
            <div class="col d-flex">
                <div class="card h-100 border-0 p-2 w-100 premium-card-hover bg-transparent text-center d-flex flex-column align-items-center">
                    <div class="icon-wrapper-circle mb-3">
                        <i class="<?php echo $p['icon']; ?>"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2" style="font-size: 0.85rem; min-height: 34px;"><?php echo $p['title']; ?></h5>
                    <p class="text-muted mb-0 lh-sm" style="font-size: 0.75rem;"><?php echo $p['desc']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="sec-vpad bg-light">
    <div class="container-xl">
        <div class="card border-0 rounded-4 shadow-lg overflow-hidden bg-enterprise-dark text-white">
            <div class="p-4 p-xl-5">
                <div class="row align-items-center g-4 g-xl-5">

                    <div class="col-lg-7 text-center text-md-start">
                        <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-3 mb-4 pb-3 border-bottom border-light border-opacity-10">
                            <i class="fab fa-microsoft fs-1 text-info flex-shrink-0"></i>
                            <h3 class="h2 fw-bold mb-0">Microsoft Solutions Center</h3>
                        </div>
                        <p class="text-white mb-3 fs-5 fw-medium">Helping Organizations Maximize Their Enterprise Solutions Investment</p>
                        <p class="opacity-75 text-white-50 mb-4 small">ATNA Technologies delivers comprehensive business integrations designed to automate legacy operational structures securely. Our functional focal areas include:</p>

                        <div class="row g-4 text-start">
                            <div class="col-sm-6 d-flex align-items-start gap-3">
                                <i class="bi bi-window-sidebar text-info fs-4 flex-shrink-0"></i>
                                <div>
                                    <h6 class="fw-bold mb-1">Business Frameworks</h6>
                                    <p class="small text-white-50 mb-0">Transform finance operations via modern automated enterprise tracking setups.</p>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex align-items-start gap-3">
                                <i class="bi bi-cloud-haze2 text-info fs-4 flex-shrink-0"></i>
                                <div>
                                    <h6 class="fw-bold mb-1">Cloud Architecture</h6>
                                    <p class="small text-white-50 mb-0">Construct modern cloud spaces equipped with active threat compliance filters.</p>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex align-items-start gap-3">
                                <i class="bi bi-graph-up-arrow text-info fs-4 flex-shrink-0"></i>
                                <div>
                                    <h6 class="fw-bold mb-1">Data &amp; Analytics Hubs</h6>
                                    <p class="small text-white-50 mb-0">Leverage system analytics data layers into automated real-time visualizations.</p>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex align-items-start gap-3">
                                <i class="bi bi-robot text-info fs-4 flex-shrink-0"></i>
                                <div>
                                    <h6 class="fw-bold mb-1">AI Workflow Automation</h6>
                                    <p class="small text-white-50 mb-0">Deploy autonomous logic processors to eliminate manual application overhead.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="bg-white text-dark p-4 rounded-4 shadow-lg text-center">
                            <h4 class="h6 fw-bold mb-0 pb-3 border-bottom text-uppercase tracking-wider" style="color: var(--atna-primary);">
                                Certified Ecosystem Footprint
                            </h4>
                            <div class="row g-0 ms-stat-grid">
                                <div class="col-6 ms-stat-cell border-right-md border-bottom-md">
                                    <p class="fw-bold mb-1 text-primary h2">250+</p>
                                    <span class="small text-muted fw-semibold">Global Clients</span>
                                </div>
                                <div class="col-6 ms-stat-cell border-bottom-md">
                                    <p class="fw-bold mb-1 text-primary h2">100+</p>
                                    <span class="small text-muted fw-semibold">Deployments</span>
                                </div>
                                <div class="col-6 ms-stat-cell border-right-md">
                                    <p class="fw-bold mb-1 text-primary h2">20+</p>
                                    <span class="small text-muted fw-semibold">Years Active</span>
                                </div>
                                <div class="col-6 ms-stat-cell">
                                    <p class="fw-bold mb-1 text-primary h2">20+</p>
                                    <span class="small text-muted fw-semibold">Regions Served</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec-vpad bg-white">
    <div class="container-xl">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <span class="text-uppercase fw-bold small tracking-wider mb-2 d-block" style="color: var(--atna-secondary);">Proprietary Business IP Modules</span>
                <h2 class="h2 fw-bold text-dark mb-2">ATNA Accelerators &amp; Solutions</h2>
                <p class="text-muted mb-0">Custom-engineered systems built directly on premium logic stacks to dramatically reduce integration timelines.</p>
            </div>
        </div>

        <div class="row g-4">
            <?php 
            $solutions = [
                ['title' => 'Financial Consolidation Engine (FINCON)', 'icon' => 'bi-journal-check',  'desc' => 'Unify disparate fiscal data schemas across multiple subsidiaries automatically into singular operational ledgers.'],
                ['title' => 'Accounts Payable Automation',               'icon' => 'bi-file-earmark-spreadsheet', 'desc' => 'Extract, validate, and bridge transaction receipts directly into backend registers without entry delays.'],
                ['title' => 'Advance Shipping Notice Framework',               'icon' => 'bi-lightning-charge', 'desc' => 'Automate complex outbound logistics networks with real-time supply chain updates.'],
                ['title' => 'Predictive Inventory Optimizer',                                         'icon' => 'bi-diagram-3',       'desc' => 'Forecast enterprise logistical needs utilizing advanced baseline statistical trend configurations.']
            ];
            foreach($solutions as $sol): ?>
            <div class="col-12 col-md-6 col-lg-3 d-flex">
                <div class="card h-100 border border-light-subtle p-4 w-100 shadow-sm premium-card-hover bg-white rounded-4 d-flex flex-column">
                    <div class="icon-wrapper-circle mb-4">
                        <i class="bi <?php echo $sol['icon']; ?>"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom" style="font-size:0.95rem; min-height:44px;"><?php echo $sol['title']; ?></h5>
                    <p class="text-muted small mb-0 lh-base flex-grow-1"><?php echo $sol['desc']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div class="bg-gradient-enterprise text-white py-5 position-relative overflow-hidden">
    <div class="container-xl position-relative" style="z-index: 2;">
        <div class="row g-4 justify-content-center align-items-center text-center">
            <div class="col-6 col-md-3">
                <p class="display-5 fw-bold mb-1 text-info">250+</p>
                <span class="small text-uppercase tracking-wider opacity-75 fw-semibold">Global Customers</span>
            </div>
            <div class="col-6 col-md-3 border-start-md border-light border-opacity-20">
                <p class="display-5 fw-bold mb-1 text-info">100+</p>
                <span class="small text-uppercase tracking-wider opacity-75 fw-semibold">Live Systems</span>
            </div>
            <div class="col-6 col-md-3 border-start-md border-light border-opacity-20">
                <p class="display-5 fw-bold mb-1 text-info">20+</p>
                <span class="small text-uppercase tracking-wider opacity-75 fw-semibold">Countries Active</span>
            </div>
            <div class="col-6 col-md-3 border-start-md border-light border-opacity-20">
                <p class="display-5 fw-bold mb-1 text-info">20+</p>
                <span class="small text-uppercase tracking-wider opacity-75 fw-semibold">Years Experience</span>
            </div>
        </div>
    </div>
</div>

<section id="contact" class="sec-vpad bg-white">
    <div class="container-xl">
        <div class="row align-items-center g-4 g-lg-5">

            <div class="col-12 col-lg-6 text-center text-lg-start">
                <span class="text-uppercase fw-bold small tracking-wider mb-2 d-block" style="color: var(--atna-secondary);">Initiate Operational Discovery</span>
                <h2 class="display-5 fw-bold text-dark mb-4">Let's Build Future Systems Together</h2>
                <p class="text-muted fs-5 mb-0 lh-base">Connect with an enterprise applications systems architect today to conduct structured architecture gap analyses and product discovery tracks.</p>
            </div>

            <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end">
                <div class="card border-0 shadow-lg p-4 p-md-5 rounded-4 bg-light text-center w-100" style="max-width: 500px;">
                    <div class="icon-wrapper-circle mx-auto mb-3" style="width: 66px; height: 66px; font-size: 1.7rem; background: rgba(13,44,108,0.06); color: var(--atna-primary);">
                        <i class="bi bi-headset"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-2 h4 pb-2 border-bottom">Schedule Technical Consultation</h4>
                    <p class="text-muted small mb-4">Have precise deployment landscape or database logic synchronization queries? Our discovery team coordinates custom diagnostic reviews.</p>

                    <div class="d-flex flex-column gap-3 mb-4 text-start">
                        <div class="d-flex align-items-center gap-3 p-3 bg-white rounded-3 border border-light-subtle shadow-sm">
                            <i class="bi bi-telephone text-primary fs-4 flex-shrink-0"></i>
                            <div class="min-width-0 overflow-hidden">
                                <span class="d-block text-muted fw-bold text-uppercase mb-1" style="font-size: 0.65rem;">Direct Core Line</span>
                                <a href="tel:+15550199234" class="fw-bold text-dark text-decoration-none">+1 (555) 0199-234</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 p-3 bg-white rounded-3 border border-light-subtle shadow-sm">
                            <i class="bi bi-envelope text-primary fs-4 flex-shrink-0"></i>
                            <div class="min-width-0 overflow-hidden">
                                <span class="d-block text-muted fw-bold text-uppercase mb-1" style="font-size: 0.65rem;">Enterprise Inquiries</span>
                                <a href="mailto:alliances@atnatechnologies.com" class="fw-bold text-dark text-decoration-none text-break">alliances@atnatechnologies.com</a>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column gap-2">
                        <a href="mailto:alliances@atnatechnologies.com" class="btn btn-lg w-100 py-3 fw-bold rounded-3 border-0 shadow-sm text-white" style="background-color: var(--atna-primary); font-size: 0.95rem;">
                            Request Ecosystem Discovery
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

</div>
<?php echo $this->include('frontend/includes/bottom_section'); ?>
<?php $this->endSection(); ?>