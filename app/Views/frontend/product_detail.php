<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true;
?>

<!-- Premium UI Configurations Specific for Dynamic Detail Viewports -->
<style>
    /* ==========================================================================
       ADDED ELEMENT: MINIMALIST INTEGRATED PRODUCT HERO BANNER CANVAS
       ========================================================================== */
    .premium-detail-hero-banner {
        position: relative;
        width: 100%;
        padding: 160px 0 100px 0;
        background-color: #0F172A; /* Rich deep tech navy background backdrop */
        overflow: hidden;
        border-bottom: 1px solid rgba(56, 189, 248, 0.15);
    }

    .detail-banner-mesh-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg stroke='%2338bdf8' stroke-width='1.2' stroke-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        z-index: 1; pointer-events: none;
    }

    .detail-banner-radial-glow {
        position: absolute;
        top: -50%; right: -20%; width: 800px; height: 800px;
        background: radial-gradient(circle, rgba(56, 189, 248, 0.08) 0%, rgba(15, 23, 42, 0) 70%);
        z-index: 1; pointer-events: none;
    }

    .banner-bread-node-pills {
        font-size: 0.82rem;
        font-weight: 700;
        color: #38bdf8; /* Clear sky-blue theme accent */
        letter-spacing: 0.1em;
        text-transform: uppercase;
        margin-bottom: 16px;
        display: inline-block;
    }

    .banner-display-headline {
        font-size: 3.5rem;
        font-weight: 800;
        color: #ffffff;
        line-height: 1.15;
        letter-spacing: -0.02em;
        margin-bottom: 24px;
        text-transform: uppercase;
    }

    .banner-lead-paragraph-desc {
        font-size: 1.1rem;
        line-height: 1.65;
        color: #94a3b8;
        max-width: 680px;
        margin: 0;
    }

    .banner-media-showcase-wrapper {
        width: 100%;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 16px;
        padding: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(8px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
    }

    .banner-media-showcase-wrapper img {
        max-width: 100%;
        height: auto;
        max-height: 240px;
        object-fit: contain;
    }

    /* ==========================================================================
       ADDED ELEMENT: PREMIUM LIGHT-MODE TESTIMONIALS SLIDER SECTION
       ========================================================================== */
    .premium-testimonials-section {
        background-color: #F8FAFC; /* Consistent light milk-white background canvas */
        padding: 120px 0;
        position: relative;
        overflow: hidden;
        border-top: 1px solid var(--rento-border);
    }

    .testimonial-subtitle {
        font-size: 0.8rem;
        font-weight: 800;
        letter-spacing: 0.15em;
        color: var(--rento-blue);
        display: block;
        margin-bottom: 14px;
        text-transform: uppercase;
    }

    .testimonial-headline {
        font-size: 3rem;
        font-weight: 800;
        letter-spacing: -0.02em;
        text-transform: uppercase;
        color: var(--rento-dark);
        line-height: 1.15;
    }

    .testimonial-swiper-container {
        padding: 20px 10px 60px 10px !important;
    }

    .testimonial-premium-bento-card {
        background-color: #ffffff;
        border: 1px solid rgba(56, 189, 248, 0.12);
        border-radius: 20px;
        padding: 40px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 4px 20px rgba(15, 23, 42, 0.015);
        position: relative;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .testimonial-quote-mark {
        position: absolute;
        top: 30px;
        right: 40px;
        font-size: 4rem;
        color: rgba(56, 189, 248, 0.08);
        line-height: 1;
        font-family: serif;
    }

    .testimonial-stars-row {
        color: #FFB900;
        font-size: 0.9rem;
        margin-bottom: 20px;
        display: flex;
        gap: 4px;
    }

    .testimonial-feedback-text {
        font-size: 1.05rem;
        line-height: 1.65;
        color: var(--rento-navy);
        font-weight: 500;
        margin-bottom: 30px;
        flex-grow: 1;
    }

    .testimonial-profile-node {
        display: flex;
        align-items: center;
        gap: 16px;
        border-top: 1px solid var(--rento-border);
        padding-top: 20px;
    }

    .testimonial-avatar-frame {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        overflow: hidden;
        background-color: #E2E8F0;
        border: 2px solid var(--rento-blue);
    }

    .testimonial-avatar-frame img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .testimonial-client-info h5 {
        font-size: 1rem;
        font-weight: 800;
        color: var(--rento-dark);
        margin: 0 0 2px 0;
    }

    .testimonial-client-info span {
        font-size: 0.82rem;
        font-weight: 600;
        color: var(--rento-slate);
        text-transform: uppercase;
        letter-spacing: 0.02em;
    }

    .testimonial-pagination {
        bottom: 0px !important;
    }

    .testimonial-swiper-container .swiper-pagination-bullet-active {
        background: var(--rento-blue) !important;
        width: 35px !important;
    }

    .testimonial-premium-bento-card:hover {
        transform: translateY(-5px);
        border-color: rgba(56, 189, 248, 0.3);
        box-shadow: 0 20px 40px rgba(56, 189, 248, 0.05);
    }

    /* ==========================================================================
       RESPONSIVE SYSTEM BREAKPOINTS FOR THE LAYOUT MATRICES
       ========================================================================== */
    @media (max-width: 991px) {
        .premium-detail-hero-banner { padding: 130px 0 70px 0; text-align: center; }
        .banner-display-headline { font-size: 2.5rem; }
        .banner-lead-paragraph-desc { max-width: 100%; font-size: 1rem; }
        .banner-media-showcase-wrapper { margin-top: 40px; }
        .premium-testimonials-section { padding: 80px 0; }
        .testimonial-headline { font-size: 2.3rem; }
        .testimonial-premium-bento-card { padding: 30px; }
    }

    @media (max-width: 576px) {
        .banner-display-headline { font-size: 2rem; }
        .banner-media-showcase-wrapper { padding: 20px; }
        .banner-media-showcase-wrapper img { max-height: 180px; }
        .testimonial-headline { font-size: 1.85rem; }
        .testimonial-feedback-text { font-size: 0.98rem; }
    }
</style>

<!-- ==========================================================================
     ADDED MODULE: HIGH-END ENTERPRISE BRAND BANNER CANVAS INTERFACE
     ========================================================================== -->
<div class="premium-detail-hero-banner">
    <div class="detail-banner-mesh-overlay"></div>
    <div class="detail-banner-radial-glow"></div>
    <div class="container position-relative z-index-2">
        <div class="row align-items-center">
            
            <!-- Left Grid Pane: Context Text Headers Elements -->
            <div class="col-lg-7">
                <span class="banner-bread-node-pills">Solutions Profile</span>
                <h1 class="banner-display-headline">
                    <?php echo !empty($detail->name) ? esc($detail->name) : 'Product Profile'; ?>
                </h1>
                <p class="banner-lead-paragraph-desc">
                    Optimize operations, eliminate infrastructure dependencies, and accelerate enterprise growth with custom-tailored system ecosystems.
                </p>
            </div>

            <!-- Right Grid Pane: Floating Contained Thumbnail Representation Graphic -->
            <?php if (!empty($detail->thumbnail)): ?>
                <div class="col-lg-5">
                    <div class="banner-media-showcase-wrapper">
                        <img src="<?php echo base_url($detail->thumbnail); ?>" alt="<?php echo !empty($detail->name) ? esc($detail->name) : 'Product'; ?> Graphic Node">
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<!-- ==========================================================================
     UNALTERED HISTORICAL CODE BASE PLACEMENT
     ========================================================================== -->
<section class="sec-p service pro_page">
    <div class="container">
        <div class="row align-items-center mb-4 flex-column">
            <div class="col-lg-12">
                <div class="title-wrap d-flex" data-cues="slideInUp">
                    <div>
                        <?php if (!empty($detail->thumbnail)): ?>
                             <img src="<?php echo $detail->thumbnail; ?>" alt="project page image">
                        <?php endif ?>
                    </div>
                    <div>
                        <?php echo $detail->description; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="value_bg">
        <?php if (!empty($detail->image)): ?>
             <img src="<?php echo $detail->image; ?>" alt="background image">
        <?php endif ?>
    </div>
</section>

<section class="key_feat sec-p">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-lg-9 m-auto">
                <div class="title-wrap text-center" data-cues="slideInUp">
                    <h2 class="title"><?php echo $detail->keyTitle?$detail->keyTitle:'Key Features'; ?></h2>
                    <p><?php echo $detail->keyDescription?$detail->keyDescription:'Enabling digital transformation empowering business growth'; ?></p>
                </div>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="key_feat_list d-flex " data-cues="slideInUp">
                    <?php if (!empty($keyFeatureList)){foreach ($keyFeatureList as $key => $value) {?>
                        <div class="key_item" >
                            <h6><?php echo $value->title; ?></h6>
                            <p><?php echo $value->description; ?></p>
                        </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($usecasesList)){?>
<section class="cases sec-p">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-lg-9 m-auto">
                <div class="title-wrap text-center" data-cues="slideInUp">
                    <h2 class="title"><?php echo $detail->caseTitle?$detail->caseTitle:'Use Cases'; ?></h2>
                    <p><?php echo $detail->casetDescription?$detail->casetDescription:'Enabling digital transformation empowering business growth'; ?></p>
                </div>
            </div>
            <div class="col-lg-10 m-auto mt-4">
                <ul class="justify-content-around mb-4 nav nav-pills" id="pills-tab" role="tablist" data-cues="slideInUp">
                    <?php foreach ($usecasesList as $key => $value) {?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?php echo $key==0?'active':''; ?>" id="pills-home-tab-<?php echo $key; ?>" data-bs-toggle="pill" data-bs-target="#pills-home-<?php echo $key; ?>" type="button" role="tab" aria-controls="pills-home-<?php echo $key; ?>" aria-selected="true"><?php echo $value->title; ?></button>
                        </li>
                    <?php }  ?>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <?php foreach ($usecasesList as $key => $value) {?>
                        <div class="tab-pane fade <?php echo $key==0?'show active':''; ?> text-center" id="pills-home-<?php echo $key; ?>" role="tabpanel" aria-labelledby="pills-home-tab-<?php echo $key; ?>">
                            <p><?php echo $value->description; ?></p>
                            <?php if (!empty($value->youtube)){ ?>
                                <div class="video-responsive">
                                  <iframe src="https://www.youtube.com/embed/<?php echo $value->youtube; ?>?si=Yl9Eco9ejBvf03c8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                            <?php }else{ ?>
                                <video controls>
                                  <source src="<?php echo $value->image?base_url($value->image):base_url($config_logo); ?>" type="video/mp4">
                                </video>
                            <?php } ?>
                        </div>
                    <?php }  ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }  ?>

<?php if (!empty($industryList)){?>
<section class="industries sec-p pb-0">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-lg-9 m-auto">
                <div class="title-wrap text-center" data-cues="slideInUp">
                    <h2 class="title"><?php echo $detail->industryTitle?$detail->industryTitle:'Industries Applicable for'; ?></h2>
                    <p><?php echo $detail->industryDescription?$detail->industryDescription:'Elevate your digital infrastructure with our transformative technology products. Empower your business to thrive in the digital age with our innovative solutions'; ?></p>
                </div>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="indu_list d-flex justify-content-center text-center flex-wrap" data-cues="slideInUp">
                    <?php foreach ($industryList as $key => $value) {?>
                        <div class="indu_item" >
                            <img src="<?php echo $value->thumbnail?base_url($value->thumbnail):base_url($config_logo); ?>" loading="lazy" alt="<?php echo $value->name; ?>">
                            <a href="<?php echo base_url('industry/'.$value->slug) ?>"> <h6><?php echo $value->name; ?></h6></a>
                        </div>
                    <?php }  ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }  ?>

<!-- ==========================================================================
     ADDED MODULE: HIGH-CONVERSION TESTIMONIALS SLIDER SECTION
     ========================================================================== -->
<section class="premium-testimonials-section">
    <div class="container">
        
        <div class="row mb-5">
            <div class="col-lg-7">
                <span class="testimonial-subtitle">[ SUCCESS HISTORIES ]</span>
                <h2 class="testimonial-headline">Trusted by Industry Leaders</h2>
            </div>
        </div>

        <!-- Interactive Swiper Track -->
        <div class="swiper testimonial-swiper-container">
            <div class="swiper-wrapper">
                
                <!-- Feedback Card Slide 1 -->
                <div class="swiper-slide">
                    <div class="testimonial-premium-bento-card">
                        <span class="testimonial-quote-mark">“</span>
                        <div class="testimonial-stars-row">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="testimonial-feedback-text">
                            "The Microsoft Dynamics 365 implementation completely revolutionized our core supply chain tracking channels. Our execution bottlenecks vanished within weeks."
                        </p>
                        <div class="testimonial-profile-node">
                            <div class="testimonial-avatar-frame">
                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=150&q=80" alt="Client Reference Profile">
                            </div>
                            <div class="testimonial-client-info">
                                <h5>Kirthivasan A.</h5>
                                <span>Operations Director, Coimbatore</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feedback Card Slide 2 -->
                <div class="swiper-slide">
                    <div class="testimonial-premium-bento-card">
                        <span class="testimonial-quote-mark">“</span>
                        <div class="testimonial-stars-row">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="testimonial-feedback-text">
                            "Migrating our legacy infrastructure environments to Azure Cloud with ATNS guarantees seamless multi-currency invoicing tracking without latency gaps."
                        </p>
                        <div class="testimonial-profile-node">
                            <div class="testimonial-avatar-frame">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80" alt="Client Reference Profile">
                            </div>
                            <div class="testimonial-client-info">
                                <h5>Praveen Rajan</h5>
                                <span>Global Trade Architecture Head</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feedback Card Slide 3 -->
                <div class="swiper-slide">
                    <div class="testimonial-premium-bento-card">
                        <span class="testimonial-quote-mark">“</span>
                        <div class="testimonial-stars-row">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="testimonial-feedback-text">
                            "Their automated Copilot and Power BI reporting scripts unlocked predictive deep-dives that instantly maximized our processing output capabilities."
                        </p>
                        <div class="testimonial-profile-node">
                            <div class="testimonial-avatar-frame">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=150&q=80" alt="Client Reference Profile">
                            </div>
                            <div class="testimonial-client-info">
                                <h5>Dr. S. Gomathi</h5>
                                <span>L&D Infrastructure Lead</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Swiper Control Dot Indicators Layout Grid -->
            <div class="swiper-pagination testimonial-pagination"></div>
        </div>

    </div>
</section>

<!-- Bottom included footer layout paths blocks -->
<?php echo $this->include('frontend/includes/bottom_section'); ?>

<!-- Swiper Initialization Controller Logic -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var testimonialSwiper = new Swiper('.testimonial-swiper-container', {
            slidesPerView: 3,
            spaceBetween: 30,
            speed: 800,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.testimonial-pagination',
                clickable: true,
            },
            breakpoints: {
                0: { slidesPerView: 1, spaceBetween: 16 },
                768: { slidesPerView: 2, spaceBetween: 24 },
                1200: { slidesPerView: 3, spaceBetween: 30 }
            }
        });
    });
</script>

<?php $this->endSection(); ?>