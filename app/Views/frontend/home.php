<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<style>
    .ddd{
        display:none;
    }
    
    /* ==========================================================================
       HERO ENGINE: UNIFORM CONTAINER CONSTRAINTS & CONTRAST TINTS
       ========================================================================== */
    .premium-banner-swiper {
        width: 100%;
        height: 80vh; 
        min-height: 600px;
        background-color: #0F172A;
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
        transform: scale(1.02);
        transition: transform 6s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .swiper-slide-active .banner-bg-image-layer {
        transform: scale(1);
    }

    .banner-overlay-tint {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(to right, rgba(15, 23, 42, 0.9) 0%, rgba(15, 23, 42, 0.65) 60%, rgba(15, 23, 42, 0.35) 100%);
        z-index: 1;
        pointer-events: none;
    }

    .premium-banner-swiper .cstm-container {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 1320px;
        padding: 0 24px;
        margin: 0 auto;
    }

    .premium-banner-swiper .text-wrap {
        max-width: 750px;
        padding: 20px 0;
    }

    .premium-banner-swiper .lg-title {
        font-size: 3.75rem !important;
        font-weight: 800 !important;
        color: #ffffff !important;
        line-height: 1.15 !important;
        letter-spacing: -0.02em !important;
    }

    .premium-banner-swiper .editor p {
        font-size: 1.15rem !important;
        line-height: 1.65 !important;
        color: #E2E8F0 !important;
        margin-top: 15px;
    }

    .banner-integrated-badge-row {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 24px;
        margin-top: 35px;
    }

    .hero-partner-embedded-logo {
        height: 52px;
        width: auto;
        object-fit: contain;
        background: #ffffff;
        padding: 8px 16px;
        border-radius: 8px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .hero-pagination {
        position: absolute;
        bottom: 30px !important;
        left: 50% !important;
        transform: translateX(-50%);
        z-index: 10;
    }

    .hero-pagination .swiper-pagination-bullet {
        background: rgba(255, 255, 255, 0.4) !important;
        opacity: 1;
    }

    .hero-pagination .swiper-pagination-bullet-active {
        background: #38bdf8 !important;
        width: 30px;
        border-radius: 4px;
    }

    /* ==========================================================================
       CASE STUDY PLATFORM: FULL-BLEED DESIGN REALIGNMENT & OVERFLOW PROTECTION
       ========================================================================== */
    .home-case-study {
        position: relative;
        width: 100%;
        height: 620px; /* Uniform height constraint boundary */
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
        background: rgba(15, 23, 42, 0.45);
        z-index: 2;
    }

    .home-case-study .container {
        position: relative;
        z-index: 5;
    }

    /* Contained Content Card Box Frame */
    .home-case-study .slider-container {
        background: rgba(255, 255, 255, 0.96);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        padding: 50px 45px;
        border-radius: 24px;
        border: 1px solid rgba(255, 255, 255, 0.6);
        box-shadow: 0 30px 60px rgba(15, 23, 42, 0.25);
        width: 100%;
        max-width: 520px; /* Restricts the title text from breaking out */
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
    }

    /* Up Next Right Side Container Frame */
    .next-slide-card-wrapper {
        background: rgba(30, 41, 59, 0.9);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        padding: 30px;
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        width: 100%;
        max-width: 360px;
        margin-left: auto;
    }

    .next-slide-card-wrapper h4 {
        color: #38bdf8 !important;
        font-size: 0.8rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin-bottom: 12px;
    }

    .next-slide-card-wrapper p {
        color: #F8FAFC !important;
        font-size: 0.95rem;
        font-weight: 600;
        line-height: 1.4;
        margin: 0;
    }

    /* ==========================================================================
       RESPONSIVE MATRIX ADJUSTMENTS
       ========================================================================== */
    @media (max-width: 991px) {
        .premium-banner-swiper .lg-title { font-size: 2.75rem !important; }
        .premium-banner-swiper .text-wrap { text-align: center; margin: 0 auto; }
        .banner-integrated-badge-row { justify-content: center; gap: 16px; }
        
        .home-case-study { height: auto; min-height: auto; padding: 60px 0; background-color: #F8FAFC; }
        .home-case-study .bg-slider-container { display: none; }
        .home-case-study .slider-container { background: #ffffff; box-shadow: none; border: 1px solid #E2E8F0; padding: 35px 24px; max-width: 100%; }
        .home-case-study .case-study-item .h3 { font-size: 1.6rem !important; }
        .next-slide-card-wrapper { display: none; }
    }

    @media (max-width: 576px) {
        .premium-banner-swiper .lg-title { font-size: 2.2rem !important; }
        .premium-banner-swiper .editor p { font-size: 1rem !important; }
        .hero-partner-embedded-logo { height: 44px; }
    }
</style>

<section class="home-banner p-0 m-0">
    <div class="swiper premium-banner-swiper">
        <div class="swiper-wrapper">
            
            <div class="swiper-slide">
                <img src="<?php echo $heading->image ? base_url($heading->image) : base_url($config_logo); ?>" class="banner-bg-image-layer" loading="eager" alt="Main Banner Background">
                <div class="banner-overlay-tint"></div>
                <div class="cstm-container">
                    <div class="row w-100 m-0">
                        <div class="col-lg-12 p-0">
                            <div class="text-wrap" data-cues="slideInUp" data-group="banner-content-1">
                                <div class="title-wrap mb-2">
                                    <h1 class="lg-title mb-0"><?php echo $heading->title; ?></h1>
                                </div>
                                <div class="editor fs-20">
                                    <p><?php echo $heading->description; ?></p>
                                </div>
                                <div class="banner-integrated-badge-row">
                                    <a href="<?php echo base_url($heading->link); ?>" class="btn btn-theme btn-icon m-0">Explore More <span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#fff"/></svg></span></a>
                                    <?php if (!empty($heading->image1)): ?>
                                        <img src="<?php echo base_url($heading->image1); ?>" class="hero-partner-embedded-logo" alt="Partner Badge" />
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1920&q=80" class="banner-bg-image-layer" loading="lazy" alt="Cloud Infrastructure Synergy">
                <div class="banner-overlay-tint"></div>
                <div class="cstm-container">
                    <div class="row w-100 m-0">
                        <div class="col-lg-12 p-0">
                            <div class="text-wrap">
                                <div class="title-wrap mb-2">
                                    <h1 class="lg-title mb-0">Accelerate Your <span>Digital Growth.</span></h1>
                                </div>
                                <div class="editor fs-20">
                                    <p>Secure, cloud-first application architecture strategies tailored to unlock scalable automated enterprise pipelines cleanly.</p>
                                </div>
                                <div class="banner-integrated-badge-row">
                                    <a href="<?php echo base_url($heading->link); ?>" class="btn btn-theme btn-icon m-0">Explore Solutions <span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#fff"/></svg></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=1920&q=80" class="banner-bg-image-layer" loading="lazy" alt="Data Science Processing Infrastructure">
                <div class="banner-overlay-tint"></div>
                <div class="cstm-container">
                    <div class="row w-100 m-0">
                        <div class="col-lg-12 p-0">
                            <div class="text-wrap">
                                <div class="title-wrap mb-2">
                                    <h1 class="lg-title mb-0">Unlock Actionable <span>Business Insights.</span></h1>
                                </div>
                                <div class="editor fs-20">
                                    <p>Integrate Power BI custom visualization suites seamlessly alongside intelligent predictive reporting engines directly at database level.</p>
                                </div>
                                <div class="banner-integrated-badge-row">
                                    <a href="<?php echo base_url($heading->link); ?>" class="btn btn-theme btn-icon m-0">See Analytics Platforms <span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#fff"/></svg></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
        <div thumbsSlider="" class="swiper case-study">
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
                    
                    <div class="swiper-controls" style="--swiper-navigation-color: #0083BF; margin-top: 24px;">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
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
            <div class="row g-0 counter-trigger" data-cues="slideInUp">
                <?php if (!empty($counterList)){foreach ($counterList as $key => $value) {?>
                    <div class="col-lg-2">
                        <div class="number-counter">
                            <div class="number-wrap">
                                <span class="count"><?php echo $value->title; ?></span><?php echo $value->symbol; ?>
                            </div>
                            <h3 class="h4"><?php echo $value->description; ?></h3>
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

<?php echo  $this->include('frontend/includes/bottom_section'); ?>
<?php echo $this->include('frontend/includes/download'); ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        var premiumBannerSwiper = new Swiper('.premium-banner-swiper', {
            effect: 'fade',
            fadeEffect: { crossFade: true },
            speed: 1200,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.hero-pagination',
                clickable: true,
            }
        });

        // Initialize synchronized Case Study components correctly
        var caseBgSwiper = new Swiper('.case-study', {
            effect: 'fade',
            fadeEffect: { crossFade: true },
            allowTouchMove: false,
            speed: 800
        });

        var caseNextPreviewSwiper = new Swiper('.case-study-next-preview-tracker', {
            effect: 'fade',
            fadeEffect: { crossFade: true },
            allowTouchMove: false,
            speed: 800
        });

        var caseMainBoxSwiper = new Swiper('.case-study-box', {
            speed: 800,
            navigation: {
                nextEl: '.home-case-study .swiper-button-next',
                prevEl: '.home-case-study .swiper-button-prev',
            },
            pagination: {
                el: '.home-case-study .swiper-pagination',
                clickable: true,
            },
            controller: {
                control: [caseBgSwiper, caseNextPreviewSwiper]
            }
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

    $('.swiper-button-next').on('click',function(){
        $('.ddd').hide();
    });
</script>

<?php $this->endSection(); ?>   