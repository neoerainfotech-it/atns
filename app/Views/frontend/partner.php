<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true;
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
    /* ==========================================================================
       DESIGN TOKENS — Scoped strictly to prevent layout pollution
       ========================================================================== */
    .page-partners {
        --atna-primary:    #0d2c6c;
        --atna-secondary:  rgb(27, 71, 146);
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

    .page-partners h1, .page-partners h2, .page-partners h3, .page-partners h4, .page-partners h5, .page-partners h6 { line-height: 1.25; }
    .page-partners img { display: block; max-width: 100%; height: auto; }

    /* ==========================================================================
       BACKGROUNDS & COMPOSITOR LAYOUTS
       ========================================================================== */
    .bg-enterprise-dark { background: linear-gradient(135deg,  #0083BF 0%, #0d2c6c 100%); }
    .network-glow-bg {
        position: relative;
        background-color:  #0083BF;
        background-image: 
            radial-gradient(circle at 10% 20%, rgba(47, 124, 255, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 90% 80%, rgba(0, 212, 255, 0.1) 0%, transparent 50%);
        overflow: hidden;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }
    .network-glow-bg::before {
        content: '';
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background-image: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg stroke='%232f7cff' stroke-width='0.5' stroke-opacity='0.04'%3E%3Cpath d='M40 0v80M0 40h80'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        z-index: 1; pointer-events: none;
    }
    .hero-blur-orb {
        position: absolute; width: 500px; height: 500px;
        background: radial-gradient(circle, rgba(47, 124, 255, 0.12) 0%, rgba(6, 17, 38, 0) 70%);
        filter: blur(40px); pointer-events: none; z-index: 1;
    }
    .orb-top-right { top: -20%; right: -10%; }
    .orb-bottom-left { bottom: -30%; left: -10%; }

    /* ==========================================================================
       TYPOGRAPHY & BRAND COMPONENT DESIGN ELEMENTS
       ========================================================================== */
    .text-gradient-premium {
        background: linear-gradient(135deg, #ffffff 30%, #a5c7fe 100%);
        -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .tracking-wider { letter-spacing: 0.08em; }
    .hero-badge-glow {
        background: rgba(255, 255, 255, 0.04); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.08); padding: 6px 16px; border-radius: 50px;
        font-size: 0.8rem; font-weight: 600; color: #e2e8f0; display: inline-flex; align-items: center; gap: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    .rounded-pill-custom { border-radius: 50px !important; }
    
    .btn-atna-primary {
        background-color: var(--atna-secondary); border: none; color: #fff;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .btn-atna-primary:hover {
        background-color: #1a62dc; transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(47, 124, 255, 0.3); color: #fff;
    }
    .btn-outline-custom {
        border: 1px solid rgba(255, 255, 255, 0.2); color: #fff;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .btn-outline-custom:hover {
        background: rgba(255, 255, 255, 0.05); border-color: #fff; transform: translateY(-2px); color: #fff;
    }

    .hero-showroom-viewport { position: relative; width: 100%; display: flex; justify-content: center; align-items: center; z-index: 2; }
    .hero-glass-frame {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.01) 100%);
        border: 1px solid rgba(255, 255, 255, 0.07); border-radius: 24px; padding: 30px;
        backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2); width: 100%; max-width: 480px;
    }
    .hero-image-canvas {
        border-radius: 14px; overflow: hidden; border: 1px solid rgba(255, 255, 255, 0.1);
        background: #091428; box-shadow: 0 15px 35px rgba(0,0,0,0.3); display: flex; justify-content: center; align-items: center; min-height: 250px;
    }
    .hero-image-canvas img { width: 100%; height: 100%; object-fit: cover; }

    /* ==========================================================================
       PREMIUM CARD & UI INTERACTIONS
       ========================================================================== */
    .premium-card-hover {
        transition: transform 0.35s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.35s ease;
    }
    .premium-card-hover:hover {
        transform: translateY(-6px) scale(1.01);
        box-shadow: 0 20px 40px rgba(13, 44, 108, 0.08) !important;
    }
    .icon-wrapper-circle {
        width: 52px; height: 52px; background: rgba(47, 124, 255, 0.08); color: var(--atna-secondary);
        display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; font-size: 1.3rem;
        flex-shrink: 0;
    }

    /* ==========================================================================
       MARQUEE STRIP ELEMENTS ALIGNMENTS
       ========================================================================== */
    .ecosystem-marquee-strip {
        display: flex; flex-wrap: wrap; gap: 20px; align-items: center; justify-content: center; width: 100%;
    }
    
    .grayscale-logo-strip:hover { filter: grayscale(0%); opacity: 1; }

    /* ==========================================================================
       REDESIGNED: TECHNOLOGY PARTNERSHIPS CAROUSEL SLIDER 
       ========================================================================== */
    .partner-logo-card {
        height: 90px; transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
        background: #ffffff; border: 1px solid rgba(13, 44, 108, 0.06); box-shadow: 0 4px 10px rgba(0,0,0,0.02);
        display: flex; align-items: center; justify-content: center; padding: 15px 25px; border-radius: 8px;
    }
    .partner-logo-card:hover { border-color: var(--atna-secondary); box-shadow: 0 10px 20px rgba(13, 44, 108, 0.06); }
    
    .logo-greyscale {
        filter: grayscale(0%); transition: all 0.4s ease; max-height: 42px; max-width: 100%; object-fit: contain;
    }
    .partner-logo-card:hover .logo-greyscale { filter: grayscale(0%) opacity(1); transform: scale(1.04); }

    /* Swiper Controls Navigation Positioning Refinements */
    .swiper-partner-wrapper { position: relative; width: 100%; }
    .partner-next, .partner-prev {
        color: var(--atna-secondary) !important; width: 44px !important; height: 44px !important;
        background: #ffffff; border-radius: 50%; box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        top: 50%; transform: translateY(-50%); z-index: 10; transition: all 0.2s ease-in-out;
    }
    .partner-next:hover, .partner-prev:hover { background: var(--atna-secondary); color: #ffffff !important; }
    .partner-next { right: -22px !important; }
    .partner-prev { left: -22px !important; }
    .partner-next:after, .partner-prev:after { font-size: 16px !important; font-weight: 700; }
    
    .hover-bg-light:hover { background-color: var(--atna-bg-light) !important; }
    .hover-lift:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(47, 124, 255, 0.1); }
    .transition-all { transition: all 0.2s ease-in-out; }

    /* Scoped layout padding source of truth rules */
    .page-partners .sec-vpad {
        padding-top: var(--section-py);
        padding-bottom: var(--section-py);
    }

    /* ==========================================================================
       RESPONSIVE SYSTEM BREAKPOINTS
       ========================================================================== */
    @media (max-width: 1200px) {
        .partner-next { right: -10px !notimportant; }
        .partner-prev { left: -10px !notimportant; }
    }
    @media (max-width: 991.98px) {
        .network-glow-bg { padding-top: 140px !important; padding-bottom: 60px !important; }
        .hero-showroom-viewport { margin-top: 40px; }
        .partner-next, .partner-prev { top: auto; bottom: -50px; transform: none; }
        .partner-prev { left: calc(50% - 55px) !important; }
        .partner-next { right: calc(50% - 55px) !important; }
        .swiper-partner-wrapper { padding-bottom: 50px !important; }
    }
    @media (max-width: 767.98px) {
        .page-partners { --section-py: 4rem; --section-py-sm: 2.5rem; }
        .logo-divider { display: none; }
        .ecosystem-marquee-strip { gap: 25px; }
    }
    @media (max-width: 575.98px) {
        .hero-glass-frame { padding: 15px; border-radius: 16px; }
    }
</style>

<div class="page-partners">

<section class="inner_banner position-relative overflow-hidden py-5 d-flex align-items-center network-glow-bg">
    <div class="hero-blur-orb orb-top-right"></div>
    <div class="hero-blur-orb orb-bottom-left"></div>
    
    <div class="container-xl position-relative" style="z-index: 2;">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-6 text-center text-lg-start">
                <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-lg-start mb-4">
                    <span class="hero-badge-glow"><i class="fab fa-microsoft text-info"></i> Strategic Partnerships</span>
                    <span class="hero-badge-glow"><i class="bi bi-cpu-fill text-warning"></i> Enterprise Ecosystem</span>
                </div>

                <h1 class="display-5 fw-bold mb-3 text-gradient-premium">
                    Digital Transformation Through Strategic Alliances
                </h1>

                <p class="lead mb-4 text-white fs-6 lh-base">
                    At ATNA Technologies, we collaborate with leading global technology providers to deliver innovative ERP, Cloud, Data Analytics, AI, and Digital Transformation solutions. Our strategic partnerships empower organizations to modernize operations, improve decision-making, and achieve sustainable growth with confidence.
                </p>

                <div class="pt-3 pb-3 border-top border-bottom border-light border-opacity-10 mb-4">
                    <span class="small text-uppercase tracking-wider text-white fw-semibold d-block mb-3" style="font-size:0.7rem;">Trusted by businesses across manufacturing, distribution, retail, textile, FMCG, and professional services verticals.</span>
                    <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3 text-white small" style="font-size:0.8rem;">
                        <span class="d-flex align-items-center"><i class="bi bi-building-gear text-info me-2"></i>Manufacturing</span>
                        <span class="opacity-25 d-none d-sm-inline">|</span>
                        <span class="d-flex align-items-center"><i class="bi bi-cart3 text-info me-2"></i>Retail &amp; E-comm</span>
                        <span class="opacity-25 d-none d-sm-inline">|</span>
                        <span class="d-flex align-items-center"><i class="bi bi-bank text-info me-2"></i>BFSI</span>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
                    <a href="#contact" class="btn btn-atna-primary rounded-pill-custom px-4 py-2 fw-semibold shadow-sm text-uppercase tracking-wider small" style="font-size:0.75rem;">Talk to Our Experts</a>
                    <a href="#ecosystem" class="btn btn-outline-custom rounded-pill-custom px-4 py-2 fw-semibold text-uppercase tracking-wider small" style="font-size:0.75rem;">Explore Our Solutions</a>
                </div>
            </div>

            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                <div class="hero-showroom-viewport">
                    <div class="hero-glass-frame">
                        <div class="hero-image-canvas">
                            <img src="<?php echo !empty($meta->image) ? base_url($meta->image) : base_url($config_logo ?? 'assets/frontend/img/logo.png'); ?>"
                                 loading="eager"
                                 alt="Ecosystem Matrix Showcase Platform Blueprint"
                                 onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/1/1a/Microsoft_Dynamics_logo.svg';">
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
        
        <div class="row justify-content-center mb-5">
            <div class="col-lg-9 text-center">
                <h3 class="h2 fw-bold text-dark mb-3">Technology Partnerships That Deliver Business Value</h3>
                <p class="lead text-muted mx-auto fs-6" style="max-width: 650px; font-weight: 400;">We combine our deep industry expertise with the world's leading platforms to accelerate your digital transformation journey.</p>
            </div>
        </div>

        <div class="swiper-partner-wrapper position-relative mb-5">
            <div class="swiper partnerSwiper" style="padding: 10px 4px;">
                <div class="swiper-wrapper align-items-center">
                    
                    <?php if (!empty($gallery)): foreach ($gallery as $key => $value): if (!empty($value['list'])): foreach ($value['list'] as $row): ?>
                        <div class="swiper-slide">
                            <div class="partner-logo-card">
                                <img src="<?php echo !empty($row->image) ? base_url($row->image) : base_url($config_logo); ?>" alt="<?php echo !empty($row->name) ? htmlspecialchars($row->name) : 'Partner Logo'; ?>" class="img-fluid logo-greyscale">
                            </div>
                        </div>
                    <?php endforeach; endif; endforeach; else: ?>
                        <div class="swiper-slide">
                            <div class="partner-logo-card">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/c/cf/Power_BI_logo.svg" alt="Power BI" class="img-fluid logo-greyscale">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-logo-card">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/1/1a/Microsoft_Dynamics_logo.svg" alt="Dynamics 365" class="img-fluid logo-greyscale">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-logo-card">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/9/91/Octicons-mark-github.svg" alt="GitHub" class="img-fluid logo-greyscale" style="max-height: 38px;">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-logo-card">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/9/96/Microsoft_logo_%282012%29.svg" alt="Microsoft" class="img-fluid logo-greyscale">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-logo-card">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/9/93/Amazon_Web_Services_Logo.svg" alt="AWS" class="img-fluid logo-greyscale">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-logo-card">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Google_Cloud_logo.svg" alt="Google Cloud" class="img-fluid logo-greyscale">
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
                
            </div>
        </div>

        <div class="row g-4" data-cues="slideInUp">
            
            <div class="col-lg-4 d-flex">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 premium-card-hover bg-white w-100 flex-column d-flex">
                    <div class="d-flex align-items-center gap-3 mb-4 flex-shrink-0">
                        <div class="icon-wrapper-circle bg-primary bg-opacity-10 text-primary">
                            <i class="fas fa-microchip"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0" style="font-size:1.05rem;">Microsoft Core Stack</h5>
                            <span class="text-muted small">Solutions Partner Integration</span>
                        </div>
                    </div>
                    <p class="text-muted mb-4 lh-base flex-grow-1" style="font-size: 0.95rem;">
                        We architect, deploy, and manage enterprise-grade solutions seamlessly across the entire Microsoft ecosystem, ensuring maximum ROI and operational agility.
                    </p>
                    <div class="d-flex flex-wrap gap-2 mt-auto pt-2 border-top border-light border-opacity-50">
                        <span class="badge bg-light text-dark border rounded-pill py-2 px-3 small fw-normal" style="font-size:0.75rem;">Unified Data</span>
                        <span class="badge bg-light text-dark border rounded-pill py-2 px-3 small fw-normal" style="font-size:0.75rem;">Hybrid Cloud</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 d-flex">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 premium-card-hover bg-white w-100 flex-column d-flex">
                    <div class="d-flex align-items-center justify-content-between mb-4 border-bottom pb-3 flex-shrink-0">
                        <h5 class="fw-bold mb-0" style="font-size:1.05rem;"><i class="fas fa-gears text-primary me-2"></i>Core Capabilities</h5>
                        <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary fw-semibold small px-2 py-1" style="font-size:0.7rem;">Enterprise-Grade</span>
                    </div>
                    
                    <div class="d-flex flex-column gap-3 flex-grow-1 justify-content-center">
                        <div class="d-flex align-items-center gap-3 p-2 rounded-3 hover-bg-light transition-all" style="cursor: default;">
                            <div class="bg-light rounded-circle p-2 d-flex align-items-center justify-content-center text-primary flex-shrink-0" style="width: 38px; height: 38px;">
                                <i class="fas fa-cloud-arrow-up"></i>
                            </div>
                            <span class="fw-medium text-dark small" style="font-size:0.85rem;">Cloud Migration &amp; Modernization</span>
                        </div>
                        <div class="d-flex align-items-center gap-3 p-2 rounded-3 hover-bg-light transition-all" style="cursor: default;">
                            <div class="bg-light rounded-circle p-2 d-flex align-items-center justify-content-center text-primary flex-shrink-0" style="width: 38px; height: 38px;">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <span class="fw-medium text-dark small" style="font-size:0.85rem;">Data Analytics &amp; BI Solutions</span>
                        </div>
                        <div class="d-flex align-items-center gap-3 p-2 rounded-3 hover-bg-light transition-all" style="cursor: default;">
                            <div class="bg-light rounded-circle p-2 d-flex align-items-center justify-content-center text-primary flex-shrink-0" style="width: 38px; height: 38px;">
                                <i class="fas fa-robot"></i>
                            </div>
                            <span class="fw-medium text-dark small" style="font-size:0.85rem;">Power Platform Automation</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 d-flex">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 premium-card-hover w-100 flex-column d-flex" style="background: linear-gradient(135deg, #f8f9fb 0%, #ffffff 100%);">
                    <h5 class="fw-bold mb-4 pb-3 border-bottom flex-shrink-0" style="font-size:1.05rem;"><i class="fas fa-circle-check text-success me-2"></i>Strategic Benefits</h5>
                    
                    <div class="d-flex flex-column gap-3 flex-grow-1 justify-content-center">
                        <div class="benefit-item d-flex align-items-start gap-3">
                            <div class="bg-success bg-opacity-10 text-success rounded-circle p-1 mt-1 flex-shrink-0 d-inline-flex align-items-center justify-content-center" style="width:24px; height:24px;">
                                <i class="fas fa-check" style="font-size: 0.7rem;"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.9rem;">Reduce Time-to-Value</h6>
                                <span class="text-muted d-block mt-1" style="font-size:0.8rem; line-height:1.4;">Pre-built accelerators cut deployment timelines by up to 40%.</span>
                            </div>
                        </div>
                        <div class="benefit-item d-flex align-items-start gap-3">
                            <div class="bg-success bg-opacity-10 text-success rounded-circle p-1 mt-1 flex-shrink-0 d-inline-flex align-items-center justify-content-center" style="width:24px; height:24px;">
                                <i class="fas fa-check" style="font-size: 0.7rem;"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.9rem;">Future-Proof Architecture</h6>
                                <span class="text-muted d-block mt-1" style="font-size:0.8rem; line-height:1.4;">Scalable cloud foundations built for modern enterprise growth.</span>
                            </div>
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
                <p class="text-muted mb-0">Our partner ecosystem enables us to deliver specialized enterprise architecture maps configured uniquely for core target sectors.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-xl-3 col-md-6 d-flex">
                <div class="card h-100 border border-light-subtle p-4 shadow-sm bg-white rounded-4 premium-card-hover w-100 d-flex flex-column">
                    <div class="icon-wrapper-circle mb-3"><i class="bi bi-buildings"></i></div>
                    <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">Manufacturing</h5>
                    <ul class="list-unstyled d-flex flex-column gap-2 text-muted small mb-0 flex-grow-1 justify-content-center">
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Production Planning Engines</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Multi-Warehouse Optimization</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Supply Chain Integrations</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Enterprise Cost Management</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex">
                <div class="card h-100 border border-light-subtle p-4 shadow-sm bg-white rounded-4 premium-card-hover w-100 d-flex flex-column">
                    <div class="icon-wrapper-circle mb-3"><i class="bi bi-cart3"></i></div>
                    <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">Retail &amp; Distribution</h5>
                    <ul class="list-unstyled d-flex flex-column gap-2 text-muted small mb-0 flex-grow-1 justify-content-center">
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Automated Omni-Channel Control</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Dynamic Demand Forecasting</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Modern Barcode System Flows</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Integrated Customer Experience</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex">
                <div class="card h-100 border border-light-subtle p-4 shadow-sm bg-white rounded-4 premium-card-hover w-100 d-flex flex-column">
                    <div class="icon-wrapper-circle mb-3"><i class="bi bi-tags"></i></div>
                    <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">Textile &amp; Apparel</h5>
                    <ul class="list-unstyled d-flex flex-column gap-2 text-muted small mb-0 flex-grow-1 justify-content-center">
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Advanced Production Tracking</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Global Currency Trade Logic</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Raw Inventory Management</li>
                        <li class="d-flex align-items-center"><i class="bi bi-circle-fill text-primary me-2" style="font-size:0.4rem;"></i> Financial Consolidation</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex">
                <div class="card h-100 border border-light-subtle p-4 shadow-sm bg-white rounded-4 premium-card-hover w-100 d-flex flex-column">
                    <div class="icon-wrapper-circle mb-3"><i class="bi bi-cup-hot"></i></div>
                    <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom">Food &amp; Beverage</h5>
                    <ul class="list-unstyled d-flex flex-column gap-2 text-muted small mb-0 flex-grow-1 justify-content-center">
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
                                <div class="col-6 p-3 border-end border-bottom">
                                    <p class="fw-bold mb-1 text-primary h2">250+</p>
                                    <span class="small text-muted fw-semibold">Global Clients</span>
                                </div>
                                <div class="col-6 p-3 border-bottom">
                                    <p class="fw-bold mb-1 text-primary h2">100+</p>
                                    <span class="small text-muted fw-semibold">Deployments</span>
                                </div>
                                <div class="col-6 p-3 border-end">
                                    <p class="fw-bold mb-1 text-primary h2">20+</p>
                                    <span class="small text-muted fw-semibold">Years Active</span>
                                </div>
                                <div class="col-6 p-3">
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

<div class="bg-enterprise-dark text-white py-5 position-relative overflow-hidden">
    <div class="container-xl position-relative" style="z-index: 2;">
        <div class="row g-4 justify-content-center align-items-center text-center">
            <div class="col-6 col-md-3">
                <p class="display-5 fw-bold mb-1 text-info">250+</p>
                <span class="small text-uppercase tracking-wider opacity-75 fw-semibold" style="font-size:0.75rem;">Global Customers</span>
            </div>
            <div class="col-6 col-md-3 border-start border-light border-opacity-20">
                <p class="display-5 fw-bold mb-1 text-info">100+</p>
                <span class="small text-uppercase tracking-wider opacity-75 fw-semibold" style="font-size:0.75rem;">Live Systems</span>
            </div>
            <div class="col-6 col-md-3 border-start border-light border-opacity-20">
                <p class="display-5 fw-bold mb-1 text-info">20+</p>
                <span class="small text-uppercase tracking-wider opacity-75 fw-semibold" style="font-size:0.75rem;">Countries Active</span>
            </div>
            <div class="col-6 col-md-3 border-start border-light border-opacity-20">
                <p class="display-5 fw-bold mb-1 text-info">20+</p>
                <span class="small text-uppercase tracking-wider opacity-75 fw-semibold" style="font-size:0.75rem;">Years Experience</span>
            </div>
        </div>
    </div>
</div>



</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper(".partnerSwiper", {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            navigation: {
                nextEl: ".partner-next",
                prevEl: ".partner-prev",
            },
            breakpoints: {
                0: { slidesPerView: 1, spaceBetween: 15 },
                480: { slidesPerView: 2, spaceBetween: 15 },
                768: { slidesPerView: 3, spaceBetween: 20 },
                1024: { slidesPerView: 4, spaceBetween: 30 },
            }
        });
    });
</script>

<?php echo $this->include('frontend/includes/bottom_section'); ?>
<?php $this->endSection(); ?>