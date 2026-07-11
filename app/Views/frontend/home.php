<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true;
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<style>
    .ddd {
        display: none;
    }
    
    /* ==========================================================================
       HERO ENGINE: ELITE VISUAL CONSTRAINTS & GLASS SYSTEMS
       ========================================================================== */
    .premium-banner-swiper {
        width: 100%;
        height: 80vh; 
        min-height: 600px;
        background-color: #0b0f19;
        position: relative;
    }

    .premium-banner-swiper .swiper-slide {
        width: 100% !important;
        height: 100% !important;
        position: relative;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .banner-bg-image-layer {
        position: absolute;
        top: 0; left: 0; 
        width: 100%; height: 100%;
        object-fit: cover;
        z-index: 0;
        transform: scale(1.05);
        transition: transform 7s cubic-bezier(0.25, 1, 0.5, 1);
    }

    .swiper-slide-active .banner-bg-image-layer {
        transform: scale(1);
    }

    /* Elite Cine-Gradation Layer */
    .banner-overlay-tint {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(105deg, 
            rgba(11, 15, 25, 0.95) 0%, 
            rgba(11, 15, 25, 0.80) 40%, 
            rgba(11, 15, 25, 0.40) 70%, 
            rgba(11, 15, 25, 0.15) 100%
        );
        z-index: 1;
        pointer-events: none;
    }

    .premium-banner-swiper .cstm-container {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 1320px;
        padding: 0 32px;
        margin: 0 auto;
    }

    .premium-banner-swiper .text-wrap {
        max-width: 820px;
        padding: 40px 0;
    }

    /* Fluid Elite Typography Hierarchy */
    .premium-banner-swiper .lg-title {
        font-size: clamp(2.25rem, 1.2rem + 4.5vw, 3.5rem) !important;
        font-weight: 650 !important;
        color: #ffffff !important;
        line-height: 1.12 !important;
        letter-spacing: -0.03em !important;
    }

    .premium-banner-swiper .editor p {
        font-size: clamp(1.05rem, 0.95rem + 0.4vw, 1.25rem) !important;
        line-height: 1.65 !important;
        color: #cbd5e1 !important;
        margin-top: 20px;
        max-width: 680px;
    }

    .banner-integrated-badge-row {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 28px;
        margin-top: 40px;
    }

    /* Balanced Tech Logo Box Frame */
    .hero-partner-badge-wrapper {
        height: 140px;
        width: 200px;
        background: #ffffff;
        padding: 10px;
        border-radius: 12px;
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.25);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .hero-partner-badge-wrapper img.hero-partner-embedded-logo {
        height: 100% !important;
        width: 100% !important;
        object-fit: contain !important;
    }

    .hero-partner-badge-wrapper:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.35);
    }

    /* Modern Minimalist Pagination Engine */
    .hero-pagination {
        position: absolute;
        bottom: 40px !important;
        left: 32px !important;
        transform: none !important;
        width: auto !important;
        z-index: 10;
        display: flex;
        gap: 8px;
    }

    .hero-pagination .swiper-pagination-bullet {
        background: rgba(255, 255, 255, 0.25) !important;
        opacity: 1 !important;
        width: 24px !important;
        height: 4px !important;
        border-radius: 2px !important;
        transition: all 0.4s ease !important;
        margin: 0 !important;
    }

    .hero-pagination .swiper-pagination-bullet-active {
        background: #0083BF !important;
        width: 48px !important;
    }

    /* Strip Navigation elements cleanly inside Hero wrapper boundary only */
    .premium-banner-swiper .swiper-button-next,
    .premium-banner-swiper .swiper-button-prev,
    .premium-banner-swiper .swiper-button-next::after,
    .premium-banner-swiper .swiper-button-prev::after {
        display: none !important;
        opacity: 0 !important;
        visibility: hidden !important;
        content: none !important;
        width: 0 !important;
        height: 0 !important;
    }

    /* ==========================================================================
       CASE STUDY PLATFORM: PREMIUM FULL-BLEED REALIGNMENT
       ========================================================================== */
    .home-case-study {
        position: relative;
        width: 100%;
        height: 620px; 
        background-color: #0F172A;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .home-case-study .bg-slider-container {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        z-index: 1;
    }

    .home-case-study .case-study,
    .home-case-study .case-study .swiper-wrapper,
    .home-case-study .case-study .swiper-slide {
        width: 100% !important;
        height: 100% !important;
    }

    .home-case-study .case-study-bg {
        width: 100%; height: 100%;
        position: relative;
    }

    .home-case-study .case-study-bg img {
        width: 100%; height: 100%;
        object-fit: cover;
    }

    .home-case-study .case-study-bg::after {
        content: ''; position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(15, 23, 42, 0.35);
        z-index: 2;
    }

    .home-case-study .container {
        position: relative;
        z-index: 5;
    }

    .home-case-study .slider-container {
        background: rgba(255, 255, 255, 0.96);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        padding: 50px 45px 40px 45px;
        border-radius: 4px;
        box-shadow: 0 30px 60px rgba(15, 23, 42, 0.2);
        width: 100%;
        max-width: 560px; 
    }

    .home-case-study .case-study-box {
        width: 100%;
        overflow: hidden;
    }

    .home-case-study .case-study-item .text-wrap {
        width: 100%;
        white-space: normal !important;
    }

    .home-case-study .case-study-item .h3 {
        font-size: 1.95rem !important;
        font-weight: 800 !important;
        line-height: 1.3 !important;
        color: #0F172A !important;
        margin: 0 0 16px 0 !important;
        letter-spacing: -0.02em !important;
        word-wrap: break-word;
    }

    .home-case-study .case-study-item .editor p {
        font-size: 0.98rem !important;
        line-height: 1.65 !important;
        color: #475569 !important;
        margin: 0 0 24px 0 !important;
    }

    .home-case-study .read-btn {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        color: #0083BF !important;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.05em;
        text-decoration: none !important;
        margin-bottom: 24px;
    }

    /* Glassmorphic Next Preview Panel Card */
    .next-slide-card-wrapper {
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        padding: 35px;
        border-radius: 4px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        width: 100%;
        max-width: 380px;
        margin-left: auto;
    }

    .next-slide-card-wrapper h4 {
        color: #0083BF !important;
        font-size: 0.85rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 12px;
    }

    .next-slide-card-wrapper p {
        color: #1e293b !important;
        font-size: 1rem;
        font-weight: 700;
        line-height: 1.4;
        margin: 0;
    }

    /* ==========================================================================
       INLINE PREMIUM NAVIGATION ENGINE
       ========================================================================== */
    .home-case-study .swiper-controls {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: flex-start !important;
        gap: 14px !important;
        margin-top: 10px !important;
        background: transparent !important;
        width: auto !important;
    }

    .home-case-study .case-panel-next,
    .home-case-study .case-panel-prev {
        display: inline-flex !important;
        align-items: center;
        justify-content: center;
        width: 24px !important;
        height: 24px !important;
        cursor: pointer;
        background: none !important;
        border: none !important;
        position: relative !important;
        top: auto !important; left: auto !important; right: auto !important;
        margin: 0 !important;
        transition: transform 0.2s ease;
        z-index: 30 !important;
    }

    .home-case-study .case-panel-prev::after {
        content: '<' !important;
        font-size: 20px !important;
        color: #94a3b8 !important;
        font-weight: 400 !important;
    }

    .home-case-study .case-panel-next::after {
        content: '>' !important;
        font-size: 20px !important;
        color: #94a3b8 !important;
        font-weight: 400 !important;
    }

    .home-case-study .case-panel-prev:hover::after,
    .home-case-study .case-panel-next:hover::after {
        color: #0083BF !important;
    }

    /* Custom Inline Case Study Dashed Pagination Track */
    .home-case-study .case-pagination {
        position: relative !important;
        bottom: auto !important;
        left: auto !important;
        transform: none !important;
        width: auto !important;
        display: inline-flex !important;
        align-items: center;
        gap: 8px !important;
        z-index: 25 !important;
    }

    .home-case-study .case-pagination .swiper-pagination-bullet {
        width: 32px !important;
        height: 4px !important;
        background: #cbd5e1 !important;
        border-radius: 2px !important;
        opacity: 1 !important;
        margin: 0 !important;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }

    .home-case-study .case-pagination .swiper-pagination-bullet-active {
        background: #0083BF !important;
        width: 48px !important;
    }

    /* ==========================================================================
       RESPONSIVE LAYOUT adjustments
       ========================================================================== */
    @media (max-width: 991px) {
        .premium-banner-swiper {
            height: 75vh;
            min-height: 550px;
        }
        .premium-banner-swiper .lg-title { font-size: 2.75rem !important; }
        .premium-banner-swiper .cstm-container {
            padding: 0 24px;
        }
        .premium-banner-swiper .text-wrap { 
            text-align: center; 
            margin: 0 auto; 
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .premium-banner-swiper .editor p {
            margin-left: auto;
            margin-right: auto;
        }
        .banner-integrated-badge-row { 
            justify-content: center; 
            gap: 20px; 
            margin-top: 30px;
        }
        .hero-pagination {
            left: 50% !important;
            transform: translateX(-50%) !important;
            bottom: 25px !important;
        }
        .hero-partner-badge-wrapper {
            height: 110px;
            width: 160px;
            padding: 8px;
        }
        
        .home-case-study { height: auto; min-height: auto; padding: 60px 0; background-color: #F8FAFC; }
        .home-case-study .bg-slider-container { display: none; }
        .home-case-study .slider-container { background: #ffffff; box-shadow: none; border: 1px solid #E2E8F0; padding: 35px 24px; max-width: 100%; }
        .home-case-study .case-study-item .h3 { font-size: 1.6rem !important; }
        .next-slide-card-wrapper { display: none; }
    }

    @media (max-width: 576px) {
        .premium-banner-swiper {
            height: 80vh;
            min-height: 500px;
        }
        .premium-banner-swiper .lg-title { font-size: 2.2rem !important; }
        .premium-banner-swiper .editor p { font-size: 1rem !important; }
        .premium-banner-swiper .text-wrap {
            padding: 20px 0;
        }
        .banner-integrated-badge-row {
            flex-direction: column;
            width: 100%;
            gap: 16px;
        }
        .banner-integrated-badge-row .btn {
            width: 100%;
            justify-content: center;
        }
        .hero-partner-badge-wrapper {
            height: 90px;
            width: 140px;
            padding: 6px;
        }
    }
</style>

<section class="home-banner p-0 m-0">
    <div class="swiper premium-banner-swiper">
        <div class="swiper-wrapper">
            
            <?php if (!empty($sliders)): ?>
                <?php foreach ($sliders as $index => $slide): ?>
                    <div class="swiper-slide">
                        <img src="<?php echo !empty($slide->image) ? base_url($slide->image) : base_url($config_logo); ?>" class="banner-bg-image-layer" loading="<?php echo $index === 0 ? 'eager' : 'lazy'; ?>" alt="<?php echo esc($slide->title); ?>">
                        <div class="banner-overlay-tint"></div>
                        <div class="cstm-container">
                            <div class="row w-100 m-0">
                                <div class="col-lg-12 p-0">
                                    <div class="text-wrap" data-cues="slideInUp" data-group="banner-content-<?php echo $index; ?>">
                                        <div class="title-wrap mb-2">
                                            <h1 class="lg-title mb-0"><?php echo $slide->title; ?></h1>
                                        </div>
                                        <div class="editor fs-20">
                                            <p><?php echo $slide->description; ?></p>
                                        </div>
                                        <div class="banner-integrated-badge-row">
                                            <a href="<?php echo !empty($slide->link) ? base_url($slide->link) : base_url($heading->link ?? ''); ?>" class="btn btn-theme btn-icon m-0">Explore More <span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#fff"/></svg></span></a>
                                            
                                            <?php if (!empty($heading->image1)): ?>
                                                <div class="hero-partner-badge-wrapper">
                                                    <img src="<?php echo base_url($heading->image1); ?>" class="hero-partner-embedded-logo" alt="Partner Badge" />
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="swiper-slide">
                    <img src="<?php echo !empty($heading->image) ? base_url($heading->image) : base_url($config_logo); ?>" class="banner-bg-image-layer" loading="eager" alt="Fallback Backdrop">
                    <div class="banner-overlay-tint"></div>
                    <div class="cstm-container">
                        <div class="row w-100 m-0">
                            <div class="col-lg-12 p-0">
                                <div class="text-wrap">
                                    <h1 class="lg-title mb-0"><?php echo $heading->title ?? 'Welcome To Our Portal'; ?></h1>
                                    <div class="editor fs-20"><p><?php echo $heading->description ?? ''; ?></p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
        <div class="swiper-pagination hero-pagination"></div>
    </div>
</section>

<section class="sec-p pb-0 home-services">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="title-wrap text-center mb-4" data-cues="slideInUp">
                    <h2 class="title"><?php echo $heading->solutionTitle; ?></h2>
                    <p><?php echo $heading->solutionDescription; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ajaxdata" data-cues="slideInUp" >
                    <?php if (!empty($servicesList)){foreach ($servicesList as $key => $value) {?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button">
                                    <div class="icon">
                                        <img src="<?= $value->thumbnail ? base_url($value->thumbnail) : base_url($config_logo); ?>" alt="Service Icon">
                                    </div>
                                    <div class="h4 service-title"><?= esc($value->name) ?></div>
                                    <span class="service-link d-none d-md-inline">
                                        <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 3.5a.5.5 0 0 0 0 1zm12.354.854a.5.5 0 0 0 0-.708L10.172.464a.5.5 0 0 0-.708.708L12.293 4 9.464 6.828a.5.5 0 1 0 .708.708zM1 4.5h12v-1H1z" fill="#0083BF"/>
                                        </svg>
                                    </span>
                                </button>
                            </h2>
                            <div class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="service-desc-wrap">
                                        <div class="editor">
                                            <?= $value->shortDescription ?>
                                            <div class="text-end mt-2">
                                                <a href="<?= base_url('service/' . $value->slug); ?>" class="btn btn-sm btn-outline-primary">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
        <div class="row d-none">
            <div class="col-lg-12">
                <input type="hidden" name="offset" id="offset" value="<?php echo $offset; ?>">
                <div class="btn-wrap text-center mt-4" data-cues="slideInUp">
                    <a href="javascript:void(0);" id="spt" class="btn btn-theme btn-icon">Load More<span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#fff"/></svg></span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-100 home-products">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="title-wrap text-center mb-4" data-cues="slideInUp">
                    <h2 class="title"><?php echo $heading->customerTitle; ?></h2>
                    <p class=""><?php echo $heading->cultureDescription; ?></p>
                </div>
            </div>
        </div>
        <div class="row g-4" data-cues="slideInUp">
            <?php if (!empty($productList)){foreach ($productList as $key => $value) {?>
                <div class="col-lg-4">
                    <div class="product-card">
                        <div class="img-wrap">
                            <div class="icon">
                                <img src="<?php echo $value->thumbnail ? base_url($value->thumbnail) : base_url($config_logo); ?>" loading="lazy" alt="Product Icon">
                            </div>
                        </div>
                        <div class="info">
                            <div class="text-wrap">
                                <p><?php echo character_limiter($value->shortDescription,100); ?></p>
                            </div>
                            <a href="<?php echo base_url('product/'.$value->slug); ?>" class="no-btn">Learn More</a>
                        </div>
                    </div>
                </div>
            <?php } } ?>
        </div>
    </div>
</section>

<section class="home-case-study">
    <div class="bg-slider-container">
        <!-- FIX 1: Stripped thumbsSlider attribute to decouple the sync engine loops -->
        <div class="swiper case-study">
            <div class="swiper-wrapper">
                <?php if (!empty($caseStudyList)): foreach ($caseStudyList as $key => $value): ?>
                    <div class="swiper-slide">
                        <div class="case-study-bg">
                            <img src="<?php echo $value->thumbnail ? base_url($value->thumbnail) : base_url($config_logo); ?>" alt="Case Image Backdrop">
                        </div>
                    </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row align-items-center position-relative w-100 m-0">
            <div class="col-lg-6 position-relative p-0" style="z-index: 10;">
                <div class="slider-container">
                    <div class="swiper case-study-box">
                        <div class="swiper-wrapper">
                            <?php if (!empty($caseStudyList)): foreach ($caseStudyList as $key => $value): ?>
                                <div class="swiper-slide bg-transparent">
                                    <div class="case-study-item">
                                        <div class="text-wrap">
                                            <h3 class="h3"><?php echo esc($value->title); ?></h3>
                                            <div class="editor">
                                                <p><?php echo esc($value->shortDescription); ?></p>
                                            </div>
                                            <?php if(!empty($value->whitepaper_download)): ?>
                                                <a data-bs-toggle="modal" data-blogid="<?php echo $value->id; ?>" data-bs-target="#exampleModal" class="read-btn subscribe">
                                                    <span>View Case Study</span>
                                                    <span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="currentColor"/></svg></span>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; endif; ?>
                        </div>
                    </div>
                    
                    <!-- FIX 2: Swapped out generic class names for isolated control handles -->
                    <div class="swiper-controls">
                        <div class="case-panel-prev"></div>
                        <div class="case-pagination"></div>
                        <div class="case-panel-next"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 d-none d-lg-block" style="z-index: 10;">
                <div class="swiper case-study-next-preview-tracker" style="pointer-events: none; max-width: 360px; margin-left: auto;">
                    <div class="swiper-wrapper">
                        <?php 
                        $count = count($caseStudyList);
                        if (!empty($caseStudyList)): foreach ($caseStudyList as $key => $value): 
                        ?>
                            <div class="swiper-slide bg-transparent">
                                <div class="next-slide-card-wrapper <?php echo $key == $count-1 ? 'ddd' : ''; ?>">
                                    <h4>Up Next</h4>
                                    <p><?php echo isset($caseStudyList[$key+1]) ? esc($caseStudyList[$key+1]->title) : 'End of Case Studies'; ?></p>
                                </div>
                            </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec-p home-customer-success">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-lg-9">
                <div class="title-wrap" data-cues="slideInUp">
                    <h2 class="title"><?php echo $heading->successTitle ?></h2>
                    <p><?php echo $heading->successDescription ?></p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="navigation-wrap">
                    <div class="swiper-button-prev cstm-swiper-nav"><svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13 3.5a.5.5 0 0 1 0 1zM.646 4.354a.5.5 0 0 1 0-.708L3.828.464a.5.5 0 1 1 .708.708L1.707 4l2.829 2.828a.5.5 0 1 1-.708.708zM13 4.5H1v-1h12z" fill="#535353"/></svg></div>
                    <div class="swiper-button-next cstm-swiper-nav"><svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 3.5a.5.5 0 0 0 0 1zm12.354.854a.5.5 0 0 0 0-.708L10.172.464a.5.5 0 0 0-.708.708L12.293 4 9.464 6.828a.5.5 0 1 0 .708.708zM1 4.5h12v-1H1z" fill="#535353"/></svg></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="slider-container" data-cue="slideInUp">
                    <div class="swiper home-succes-swiper">
                        <div class="swiper-wrapper">
                            <?php if (!empty($successStoryList)){foreach ($successStoryList as $key => $value) {?>
                                <div class="swiper-slide">
                                    <a href="<?php echo base_url('customer-success/'.$value->slug) ?>" class="success-story-item">
                                        <div class="info">
                                            <div class="editor">
                                                <p><?php echo $value->title; ?></p>
                                            </div>
                                        </div>
                                        <div class="img-wrap">
                                            <img src="<?php echo $value->thumbnail ? base_url($value->thumbnail) : base_url($config_logo); ?>" loading="lazy" alt="Success Story Reference Card Visual">
                                        </div>
                                    </a>
                                </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="btn-wrap text-center mt-4" data-cue="slideInUp">
                    <a href="<?php echo base_url('customer-success'); ?>" class="btn btn-theme btn-icon">View All <span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#fff"/></svg></span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-5 sec-p home-industry-solution">
    <div class="bg-image have-overlay">
        <img src="<?php echo $heading->successImage ? base_url($heading->successImage) : base_url($config_logo); ?>" loading="lazy" alt="Success Image Framework Background layer">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="title-wrap text-center mb-4" data-cues="slideInUp">
                    <h2 class="title text-white"><?php echo $heading->whyTitle ?></h2>
                    <p class="text-white"><?php echo $heading->partnerTitle ?></p>
                </div>
            </div>
        </div>
        <div class="inner-container mx-auto">
            <div class="row g-lg-5 g-4 justify-content-center" data-cues="slideInUp">
                <?php if (!empty($industryList)){foreach ($industryList as $key => $value) {?>
                    <div class="col-lg-3">
                        <div class="industry-sol-item">
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <div class="wrap">
                                            <div class="icon">
                                                <img src="<?php echo $value->thumbnail?base_url($value->thumbnail):base_url($config_logo); ?>" loading="lazy" alt="flip-card graphic node representation">
                                            </div>
                                            <h3 class="h4"><?php echo $value->name; ?></h3>
                                        </div>
                                    </div>
                                    <div class="flip-card-back " style="place-content: center;">
                                        <h3 class="h4"><?php echo $value->name; ?></h3>
                                        <a href="<?php echo base_url('industry/'.$value->slug) ?>" class="read-btn">Learn More <span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#0083BF"/></svg></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } } ?>
            </div>
        </div>
    </div>
</section>

<section class="sec-p home-vision-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="title-wrap text-center" data-cues="slideInUp">
                    <h2 class="title"><?php echo $heading->blogTitle; ?></h2>
                   <?php echo $heading->visionDescription; ?>
                </div>
            </div>
        </div>
        <div class="">
            <!-- FIX 3: Added grid centering helpers so items align cleanly -->
            <div class="row g-0 counter-trigger justify-content-center text-center" data-cues="slideInUp">
                <?php if (!empty($counterList)){foreach ($counterList as $key => $value) {?>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="number-counter" style="border-right: 1px solid #e2e8f0; padding: 20px 10px;">
                            <div class="number-wrap" style="color: #0083BF; font-weight: 800; font-size: 2.2rem;">
                                <span class="count"><?php echo $value->title; ?></span><?php echo $value->symbol; ?>
                            </div>
                            <h3 class="h4" style="font-size: 0.95rem; font-weight: 700; color: #1e293b;"><?php echo $value->description; ?></h3>
                        </div>
                    </div>
                <?php } } ?>
            </div>
            <div class="row">
                <div class="btn-wrap text-center mt-4" data-cue="slideInUp">
                    <a href="<?php echo base_url('about-us') ?>" class="read-btn">Learn More About Us  <span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#0083BF"/></svg></span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 industries-rec-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9">
                <div class="title-wrap mb-4" data-cues="slideInUp">
                    <h2 class="title mb-0"><?php echo $heading->keyTitle; ?></h2>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="navigation-wrap">
                    <div class="swiper-button-prev cstm-swiper-nav"><svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13 3.5a.5.5 0 0 1 0 1zM.646 4.354a.5.5 0 0 1 0-.708L3.828.464a.5.5 0 1 1 .708.708L1.707 4l2.829 2.828a.5.5 0 1 1-.708.708zM13 4.5H1v-1h12z" fill="#535353"/></svg></div>
                    <div class="swiper-button-next cstm-swiper-nav"><svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 3.5a.5.5 0 0 0 0 1zm12.354.854a.5.5 0 0 0 0-.708L10.172.464a.5.5 0 0 0-.708.708L12.293 4 9.464 6.828a.5.5 0 1 0 .708.708zM1 4.5h12v-1H1z" fill="#535353"/></svg></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="slider-container" data-cue="slideInUp">
                    <div class="swiper industries-rec-swiper">
                        <div class="swiper-wrapper">
                            <?php if (!empty($recognitionList)){foreach ($recognitionList as $key => $value) {?>
                                <div class="swiper-slide">
                                    <div class="ind-rec-item">
                                        <div class="img-wrap">
                                            <img src="<?php echo $value->image ? base_url($value->image) : base_url($config_logo); ?>" loading="lazy" alt="Corporate Certification Credentials Asset">
                                        </div>
                                        <div class="info">
                                            <p><?php echo $value->name; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="work-with-cta sec-p">
    <div class="container cta-wrap">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="text-wrap" data-cues="slideInUp">
                    <div class="title-wrap">
                        <h2 class="title"><?php echo $heading->workTitle ?></h2>
                    </div>
                    <div class="editor">
                        <p><?php echo $heading->workDescription ?></p>
                    </div>
                    <div class="btn-wrap mt-4">
                        <a href="<?php echo base_url('careers') ?>" class="btn btn-theme btn-icon">Explore Careers <span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#fff"/></svg></span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="img-wrap">
                    <div class="ele">
                        <img src="<?php echo CATALOG; ?>img/work-ele.svg" loading="lazy" alt="Visual Vector Graphic Accent Overlay shape">
                    </div>
                    <img src="<?php echo $heading->workImage ? base_url($heading->workImage) : base_url($config_logo); ?>" loading="lazy" alt="Corporate Team Operations Infrastructure">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="home-news-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="title-wrap mb-4" data-cues="slideInUp">
                    <h2 class="title"><?php echo $heading->newsTitle ?></h2>
                    <p><?php echo $heading->newsDescription ?></p>
                </div>
            </div>
        </div>
        <div class="row g-4" data-cues="slideInUp">
            <?php if (!empty($blogList)){foreach ($blogList as $key => $value) {?>
                <div class="col-lg-3">
                    <a href="<?php echo base_url('blog/'.$value->slug); ?>" class="news-item">
                        <div class="img-wrap">
                            <img src="<?php echo $value->thumbnail ? base_url($value->thumbnail) : base_url($config_logo); ?>" loading="lazy" alt="Insight Article Display Header">
                        </div>
                        <div class="info">
                            <h3 class="fs-18"><?php echo $value->title; ?></h3>
                            <ul class="pills-wrap">
                                <li><?php echo $value->category_name; ?></li>
                            </ul>
                        </div>
                    </a>
                </div>
            <?php } } ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="btn-wrap text-center mt-4" data-cue="slideInUp">
                    <a href="<?php echo base_url('blogs'); ?>" class="btn btn-theme btn-icon">View All<span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#fff"/></svg></span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $this->include('frontend/includes/bottom_section'); ?>
<?php echo $this->include('frontend/includes/download'); ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        var premiumBannerSwiper = new Swiper('.premium-banner-swiper', {
            effect: 'fade',
            fadeEffect: { crossFade: true },
            speed: 1400,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.hero-pagination',
                clickable: true,
            }
        });

        // Initialize background layer independently
        var caseBgSwiper = new Swiper('.case-study', {
            effect: 'fade',
            fadeEffect: { crossFade: true },
            allowTouchMove: false,
            speed: 800
        });

        // Initialize 'Up Next' tracker preview card independently
        var caseNextPreviewSwiper = new Swiper('.case-study-next-preview-tracker', {
            effect: 'fade',
            fadeEffect: { crossFade: true },
            allowTouchMove: false,
            speed: 800
        });

        // Initialize master controller text box slider with explicit target elements
        var caseMainBoxSwiper = new Swiper('.case-study-box', {
            speed: 800,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.home-case-study .case-panel-next',
                prevEl: '.home-case-study .case-panel-prev',
            },
            pagination: {
                el: '.home-case-study .case-pagination',
                clickable: true,
            }
        });

        // FIX 4: Bind event hook parameters cleanly to link layouts together without infinite loops
        caseMainBoxSwiper.on('slideChange', function () {
            var activeIndex = caseMainBoxSwiper.activeIndex;
            caseBgSwiper.slideTo(activeIndex, 800, false);
            caseNextPreviewSwiper.slideTo(activeIndex, 800, false);
        });
    });

    $('body').delegate("#spt","click",function(){
        var offset = $('#offset').val();
        $.ajax({
            url:"<?php echo base_url('get_service_ajax'); ?>",
            type:"POST",
            data:{offset:offset},
            beforeSend:function(){
                $('#spt').html('<label>Loading...</label> <span></span>');
            },
            success:function(res){ 
                obj = JSON.parse(res);
                if(obj.status==1){
                    $('#spt').html('<label>Load More</label> <span></span>');
                    $('.ajaxdata').append(obj.data);
                    $('#offset').val(obj.offset);
                }else{
                    $('#spt').html('<label>'+obj.msg+'</label> <span></span>');
                }
            }
        });
    });
</script>

<?php $this->endSection(); ?>