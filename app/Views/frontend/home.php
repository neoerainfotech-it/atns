<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true;
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<style>
    /* ==========================================================================
       PREMIUM MICROSOFT PARTNER ENTERPRISE UI
       ========================================================================== */
    :root {
        --ms-blue: #0083BF;
        --ms-blue-dark: #005f8a;
        --ms-blue-light: #38bdf8;
        --ms-dark: #111827;
        --ms-gray: #475569;
        --ms-light: #f8fafc;
        --ms-border: #e2e8f0;
    }

    body { font-family: 'Work Sans', sans-serif; background-color: #ffffff; }

    /* --- MODERN FULL-BACKGROUND HERO SLIDER --- */
    .premium-hero-slider {
        position: relative;
        width: 100%;
        height: 90vh; /* Takes up 90% of the screen height */
        min-height: 600px;
        background-color: var(--ms-dark);
        overflow: hidden;
    }

    .swiper-slide {
        position: relative;
        display: flex;
        align-items: center;
    }

    /* Background Image */
    .hero-bg-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 0;
        transform: scale(1.05); /* Slight zoom for animation */
        transition: transform 6s ease-out;
    }

    .swiper-slide-active .hero-bg-image {
        transform: scale(1);
    }

    /* Gradient Overlay for Text Readability */
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(17, 24, 39, 0.95) 0%, rgba(17, 24, 39, 0.6) 50%, rgba(17, 24, 39, 0.1) 100%);
        z-index: 1;
    }

    /* Text Content */
    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 650px;
        padding-top: 60px; /* Offset for header */
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1) 0.3s;
    }

    .swiper-slide-active .hero-content {
        opacity: 1;
        transform: translateY(0);
    }

    .hero-tag {
        display: inline-block;
        padding: 6px 16px;
        background: rgba(56, 189, 248, 0.15); /* Light blue tint */
        color: var(--ms-blue-light);
        font-weight: 700;
        font-size: 12px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        border-radius: 4px;
        margin-bottom: 20px;
        border-left: 3px solid var(--ms-blue-light);
    }

    .hero-title {
        font-size: 4rem;
        font-weight: 800;
        color: #ffffff;
        line-height: 1.1;
        margin-bottom: 24px;
        letter-spacing: -0.02em;
    }

    .hero-title span { color: var(--ms-blue-light); } /* Pop of color on dark bg */

    .hero-desc {
        font-size: 1.15rem;
        color: #e2e8f0; /* Light slate text */
        line-height: 1.6;
        margin-bottom: 35px;
    }

    .btn-hero-primary {
        background-color: var(--ms-blue);
        color: white !important;
        padding: 16px 36px;
        font-size: 1.05rem;
        font-weight: 600;
        border-radius: 6px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        border: 1px solid var(--ms-blue);
    }

    .btn-hero-primary:hover {
        background-color: var(--ms-blue-light);
        border-color: var(--ms-blue-light);
        color: #111827 !important; /* Dark text on hover for contrast */
        box-shadow: 0 10px 25px rgba(56, 189, 248, 0.3);
    }

    /* Slider Controls */
    .hero-pagination {
        position: absolute;
        bottom: 30px !important;
        text-align: center;
        z-index: 10;
    }
    .swiper-pagination-bullet {
        width: 30px;
        height: 4px;
        border-radius: 2px;
        background: rgba(255,255,255,0.4);
        opacity: 1;
        transition: 0.3s;
    }
    .swiper-pagination-bullet-active { background: var(--ms-blue-light); width: 45px; }

    /* --- TRUST BAR --- */
    .partner-trust-bar {
        border-bottom: 1px solid var(--ms-border);
        padding: 40px 0;
        background: #ffffff;
    }

    /* --- MICROSOFT CARDS --- */
    .ms-feature-card {
        background: #ffffff;
        border: 1px solid var(--ms-border);
        border-radius: 8px;
        padding: 40px 30px;
        height: 100%;
        transition: all 0.3s ease;
        position: relative;
    }
    .ms-feature-card:hover {
        box-shadow: 0 20px 40px rgba(0,0,0,0.06);
        border-color: var(--ms-blue);
        transform: translateY(-5px);
    }
    .ms-icon-box {
        width: 60px; height: 60px;
        background: var(--ms-light);
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 25px;
        color: var(--ms-blue);
    }

    /* --- RESPONSIVE ADJUSTMENTS --- */
    @media (max-width: 991px) {
        .hero-overlay {
            background: linear-gradient(180deg, rgba(17, 24, 39, 0.8) 0%, rgba(17, 24, 39, 0.9) 100%);
        }
        .hero-content { padding-top: 100px; text-align: center; margin: 0 auto; }
        .hero-title { font-size: 2.8rem; }
    }
</style>

<div class="swiper premium-hero-slider">
    <div class="swiper-wrapper">
        
        <div class="swiper-slide">
            <img src="<?php echo !empty($heading->image) ? base_url('uploads/images/' . $heading->image) : 'https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&w=1920&q=80'; ?>" class="hero-bg-image" alt="Corporate Team">
            <div class="hero-overlay"></div>
            
            <div class="container h-100 d-flex align-items-center">
                <div class="hero-content">
                    <span class="hero-tag">Microsoft Solutions Partner</span>
                    <h1 class="hero-title">
                        <?php echo str_replace("Think Big.", "<span>Think Big.</span>", $heading->title); ?>
                    </h1>
                    <p class="hero-desc"><?php echo $heading->description; ?></p>
                    <a href="<?php echo base_url($heading->link); ?>" class="btn-hero-primary">
                        Discover Our Strategy <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="swiper-slide">
            <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1920&q=80" class="hero-bg-image" alt="Azure Cloud">
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
            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=1920&q=80" class="hero-bg-image" alt="Data and AI">
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

<div class="partner-trust-bar">
    <div class="container">
        <div class="row align-items-center text-center text-lg-start">
            <div class="col-lg-4 mb-3 mb-lg-0">
                <span style="color: var(--ms-gray); font-weight: 600; font-size: 0.95rem;">Empowering trusted global enterprises:</span>
            </div>
            <div class="col-lg-8">
                <div class="d-flex align-items-center justify-content-center justify-content-lg-end flex-wrap" style="gap: 30px; opacity: 0.6; filter: grayscale(100%);">
                    <h4 class="m-0 fw-bold">Microsoft</h4>
                    <h4 class="m-0 fw-bold">Azure</h4>
                    <h4 class="m-0 fw-bold">Dynamics 365</h4>
                    <h4 class="m-0 fw-bold">Power Platform</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="py-5" style="background-color: #f8fafc;">
    <div class="container">
        <div class="row g-4 justify-content-center" data-cues="slideInUp">
            <div class="col-xl-3 col-md-6">
                <div class="ms-feature-card">
                    <div class="ms-icon-box">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    </div>
                    <h3 class="fs-5 fw-bold mb-3" style="color: var(--ms-dark);">Business Applications</h3>
                    <p style="font-size: 14px; color: var(--ms-gray);">Streamline operations with Dynamics 365 and Power Platform solutions.</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="ms-feature-card">
                    <div class="ms-icon-box">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <h3 class="fs-5 fw-bold mb-3" style="color: var(--ms-dark);">Modern Work</h3>
                    <p style="font-size: 14px; color: var(--ms-gray);">Enhance collaboration and productivity with Microsoft 365 and Copilot.</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="ms-feature-card">
                    <div class="ms-icon-box">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                    </div>
                    <h3 class="fs-5 fw-bold mb-3" style="color: var(--ms-dark);">Data & AI</h3>
                    <p style="font-size: 14px; color: var(--ms-gray);">Drive intelligent decisions using Azure Data, Analytics, and OpenAI.</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="ms-feature-card">
                    <div class="ms-icon-box">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 16V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h8"></path><path d="M12 17v4"></path><path d="M8 21h8"></path></svg>
                    </div>
                    <h3 class="fs-5 fw-bold mb-3" style="color: var(--ms-dark);">Azure Infrastructure</h3>
                    <p style="font-size: 14px; color: var(--ms-gray);">Build secure and scalable environments tailored for enterprise growth.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec-p pb-0 home-services" style="background: white;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="title-wrap text-center mb-5" data-cues="slideInUp">
                    <h2 class="title fw-bold" style="color: var(--ms-dark);"><?php echo $heading->solutionTitle; ?></h2>
                    <p style="color: var(--ms-gray); font-size: 1.1rem;"><?php echo $heading->solutionDescription; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ajaxdata" data-cues="slideInUp">
                    <?php if (!empty($servicesList)) { foreach ($servicesList as $key => $value) { ?>
                        <div class="accordion-item" style="border-bottom: 1px solid var(--ms-border); padding: 20px 0;">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" style="display: flex; align-items: center; width: 100%; text-align: left; background: transparent; border: none;">
                                    <div class="icon me-4">
                                        <img src="<?= $value->thumbnail ? base_url($value->thumbnail) : base_url($config_logo); ?>" alt="Service Icon" style="width: 50px; height: 50px; object-fit: contain;">
                                    </div>
                                    <div class="h4 service-title fw-bold m-0" style="color: var(--ms-dark);"><?= esc($value->name) ?></div>
                                </button>
                            </h2>
                            <div class="accordion-collapse collapse show">
                                <div class="accordion-body ps-5 ms-4 pt-3">
                                    <div class="service-desc-wrap text-muted">
                                        <div class="editor">
                                            <?= $value->shortDescription ?>
                                            <div class="mt-3">
                                                <a href="<?= base_url('service/' . $value->slug); ?>" style="color: var(--ms-blue); font-weight: 600; text-decoration: none;">Learn more &rarr;</a>
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
                <div class="btn-wrap text-center mt-5" data-cues="slideInUp">
                    <a href="javascript:void(0);" id="spt" class="btn-hero-primary">Load More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-100 home-products" style="background-color: var(--ms-light);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="title-wrap text-center mb-5" data-cues="slideInUp">
                    <h2 class="title fw-bold" style="color: var(--ms-dark);"><?php echo $heading->customerTitle; ?></h2>
                    <p style="color: var(--ms-gray);"><?php echo $heading->cultureDescription; ?></p>
                </div>
            </div>
        </div>
        <div class="row g-4" data-cues="slideInUp">
            <?php if (!empty($productList)){ foreach ($productList as $key => $value) { ?>
                <div class="col-lg-4">
                    <div class="product-card" style="background: white; border: 1px solid var(--ms-border); border-radius: 12px; padding: 40px 30px; transition: 0.3s; height: 100%;">
                        <div class="icon mb-4 text-center">
                            <img src="<?php echo $value->thumbnail ? base_url($value->thumbnail) : base_url($config_logo); ?>" loading="lazy" style="height: 60px; object-fit: contain;">
                        </div>
                        <div class="info text-center">
                            <p style="color: var(--ms-gray); font-size: 0.95rem; margin-bottom: 20px;"><?php echo character_limiter($value->shortDescription,100); ?></p>
                            <a href="<?php echo base_url('product/'.$value->slug); ?>" style="color: var(--ms-blue); font-weight: 600; text-decoration: none;">View Details &rarr;</a>
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
                <?php $count = count($caseStudyList); if (!empty($caseStudyList)){ foreach ($caseStudyList as $key => $value) { ?>
                <div class="swiper-slide ">
                    <div class="case-study-bg">
                        <img src="<?php echo $value->thumbnail?base_url($value->thumbnail):base_url($config_logo); ?>" alt="case study image" />
                    </div>
                </div>
                <?php  } } ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="slider-container" data-cue="fadeIn" style="background: rgba(255,255,255,0.95); padding: 40px; border-radius: 12px;">
                    <div class="swiper case-study-box">
                        <div class="swiper-wrapper">
                            <?php if (!empty($caseStudyList)){ foreach ($caseStudyList as $key => $value) { ?>
                            <div class="swiper-slide">
                                <div class="case-study-item">
                                    <h3 class="fw-bold mb-3 text-dark"><?php echo $value->title; ?></h3>
                                    <p class="text-muted"><?php echo $value->shortDescription; ?></p>
                                    <?php if(!empty($value->whitepaper_download)){ ?>
                                        <a data-bs-toggle="modal" data-blogid="<?php echo $value->id; ?>" data-bs-target="#exampleModal" class="btn-hero-primary mt-3" style="cursor:pointer; color: white;">View Case Study</a>
                                    <?php } ?>
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

<section class="pt-5 sec-p home-industry-solution" style="background: var(--ms-dark);">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="title-wrap text-center mb-5" data-cues="slideInUp">
                    <h2 class="title text-white fw-bold"><?php echo $heading->whyTitle ?></h2>
                    <p style="color: #94a3b8;"><?php echo $heading->partnerTitle ?></p>
                </div>
            </div>
        </div>
        <div class="row g-4 justify-content-center" data-cues="slideInUp">
            <?php if (!empty($industryList)){ foreach ($industryList as $key => $value) { ?>
                <div class="col-lg-3 col-md-6">
                    <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; padding: 30px; text-align: center; transition: 0.3s;">
                        <img src="<?php echo $value->thumbnail?base_url($value->thumbnail):base_url($config_logo); ?>" style="height: 50px; margin-bottom: 20px; filter: brightness(0) invert(1);">
                        <h3 class="text-white fs-5 fw-bold mb-3"><?php echo $value->name; ?></h3>
                        <a href="<?php echo base_url('industry/'.$value->slug) ?>" style="color: #38bdf8; text-decoration: none; font-weight: 600;">Learn More &rarr;</a>
                    </div>
                </div>
            <?php } } ?>
        </div>
    </div>
</section>

<section class="work-with-cta sec-p py-5" style="background: var(--ms-blue); color: white;">
    <div class="container py-5">
        <div class="row align-items-center text-center text-lg-start">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h2 class="fw-bold display-5 mb-3 text-white"><?php echo $heading->workTitle ?></h2>
                <p class="fs-5 opacity-75"><?php echo $heading->workDescription ?></p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="<?php echo base_url('careers') ?>" style="background: white; color: var(--ms-blue); padding: 16px 36px; border-radius: 6px; font-weight: bold; text-decoration: none; display: inline-block;">Explore Careers &rarr;</a>
            </div>
        </div>
    </div>
</section>

<section class="home-news-section py-5" style="background: var(--ms-light);">
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-lg-6">
                <h2 class="fw-bold text-dark"><?php echo $heading->newsTitle ?></h2>
                <p class="text-muted"><?php echo $heading->newsDescription ?></p>
            </div>
        </div>
        <div class="row g-4">
         <?php if (!empty($blogList)){ foreach ($blogList as $key => $value) { ?>
            <div class="col-lg-3 col-md-6">
                <a href="<?php echo base_url('blog/'.$value->slug); ?>" class="text-decoration-none" style="display: block; background: white; border: 1px solid var(--ms-border); border-radius: 12px; overflow: hidden; transition: 0.3s;">
                    <div style="height: 180px; overflow: hidden;">
                        <img src="<?php echo $value->thumbnail ? base_url($value->thumbnail) : base_url($config_logo); ?>" style="width: 100%; height: 100%; object-fit: cover;" alt="Blog">
                    </div>
                    <div style="padding: 20px;">
                        <span style="font-size: 12px; font-weight: bold; color: var(--ms-blue); text-transform: uppercase;"><?php echo $value->category_name; ?></span>
                        <h3 class="fs-6 fw-bold text-dark mt-2 mb-0"><?php echo $value->title; ?></h3>
                    </div>
                </a>
            </div>
          <?php } } ?>
        </div>
    </div>
</section>

<?php echo $this->include('frontend/includes/bottom_section'); ?>
<?php echo $this->include('frontend/includes/download'); ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    // Initialize Premium Hero Slider
    var heroSwiper = new Swiper('.premium-hero-slider', {
        effect: 'fade',
        fadeEffect: { crossFade: true },
        speed: 1000,
        autoplay: {
            delay: 6000, // Stays on each slide for 6 seconds
            disableOnInteraction: false,
        },
        pagination: {
            el: '.hero-pagination',
            clickable: true,
        },
    });

    // Existing AJAX Code for Services Load More
    $('body').delegate("#spt","click",function(){
        var offset =  $('#offset').val();
        $.ajax({
            url:"<?php echo base_url('get_service_ajax'); ?>",
            type:"POST",
            data:{offset:offset},
            beforeSend:function(){
                $('#spt').html('Loading...');
            },
            success:function(res){ 
                var obj = JSON.parse(res);
                if(obj.status == 1){
                    $('#spt').html('Load More');
                    $('.ajaxdata').append(obj.data);
                    $('#offset').val(obj.offset);
                } else {
                    $('#spt').html(obj.msg);
                }
            }
        });
    });
</script>

<?php $this->endSection(); ?>