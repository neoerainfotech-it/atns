<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true
?>



<section class="inner_banner ">
    <img src="<?php echo $detail->image?base_url($detail->image):base_url($config_logo); ?>" loading="eager" alt="background image" class="inner_bg" />
    <div class="cstm-container">
        <div class="row">
            <div class="col-lg-8">
                <div class="text-wrap" data-cues="slideInUp" data-group="banner-content-1">
                    <div class="title-wrap mb-4">
                        <h1 class="lg-title mb-0"><?php echo $detail->name; ?></h1>
                    </div>
                    <div class="editor fs-20">
                        <p><?php echo $detail->banner_title; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec-p award_page">
    <div class="container cta-wrap" data-cue="slideInUp">
        <div class="row g-0 align-items-center">
            <div class="col-lg-10 m-auto text-center">
                <div class="flex-middle">
                    <div class="text-wrap">
                        <div class="wrap">
                            <div class="editor">
                               <?php echo $detail->shortDescription; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>


<section class="key_sec">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div>
                    <?php if (!empty($detail->keyImage)): ?>
                        <img src="<?php echo base_url($detail->keyImage); ?>" loading="eager" alt="Key image"  />
                    <?php endif ?>
                    
                </div>
            </div>
            <div class="col-lg-6">
                <div class="title-wrap " data-cues="slideInUp">
                    <h2 class="title">Key Challenges</h2>
                </div>
                
                <div class="key_list mt-4">
                   
                   
                    <?php if (!empty($featureList)) {foreach ($featureList as $key => $value) {?>

                    <div class="key_item d-flex">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="12" fill="#0083BF"/>
                            <path d="M6 11.5a.5.5 0 0 0 0 1zm12.354.854a.5.5 0 0 0 0-.708l-3.182-3.182a.5.5 0 1 0-.708.708L17.293 12l-2.828 2.828a.5.5 0 1 0 .707.708zM6 12.5h12v-1H6z" fill="#fff"/>
                        </svg>
                        <div class="key_detail">
                            <h6><?php echo $value->title; ?></h6>
                            <p><?php echo $value->description; ?></p>
                        </div>
                    </div>
                     <?php } }  ?>

                </div>
            </div>
        </div>
    </div>
</section>



<section class="sec-p ">
    <div class="container">
       
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="title-wrap text-center mb-4" data-cues="slideInUp">
                    <h2 class="title"><?php echo $detail->solution_title?$detail->solution_title:'Our Process'; ?></h2>
                    <p><?php echo $detail->solutionDescription?$detail->solutionDescription:'Elevate your digital infrastructure with our transformative technology products'; ?></p>
                </div>
            </div>
        </div>

        <div class="row mt-2">
           
            <?php if (!empty($processList)) {foreach ($processList as $key => $value) {?>

            <div class="col-lg-3">
                <div class="process_box">
                    <img src="<?php echo $value->image?base_url($value->image):base_url($config_logo); ?>" alt="process box image" />
                    <h4><?php echo $value->title; ?></h4>
                    <p><?php echo $value->description; ?></p>
                </div>
            </div>
            <?php } }  ?>
          
        </div>
    </div>
</section>

 <?php if (!empty($solutionList)){?>

<section class="sec-p pb-0 home-services">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="title-wrap text-center mb-4" data-cues="slideInUp">
                  

                 <h2 class="title"><?php echo $detail->sol_title?$detail->sol_title:'Our Solutions'; ?> </h2>
                    <p><?php echo $detail->solDescription?$detail->solDescription:'Empower your business with our transformative digital solutions. From streamlined processes to enhanced customer experiences, we pave the way for your digital evolution'; ?> </p>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="accordion accordion-flush" data-cues="slideInUp" data-group="service-openings" id="accordionExample">
                    
               <?php foreach ($solutionList as $key => $value) {?>
 

                    <div class="accordion-item">
                        <h2 class="accordion-header ">
                        <button class="accordion-button <?php echo $key==0?'':'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $value->id; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $value->id; ?>">
                            <div class="icon"><img src="<?php echo $value->thumbnail ? base_url($value->thumbnail) : base_url($config_logo); ?>" alt="<?php echo !empty($value->title) ? htmlspecialchars($value->title) : 'Image'; ?>"></div>
                            <div class="h4 service-title"><?php echo $value->name; ?></div>
                             <a href="<?php echo base_url('service/'.$value->slug); ?>" class="service-link"><svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 3.5a.5.5 0 0 0 0 1zm12.354.854a.5.5 0 0 0 0-.708L10.172.464a.5.5 0 0 0-.708.708L12.293 4 9.464 6.828a.5.5 0 1 0 .708.708zM1 4.5h12v-1H1z" fill="#0083BF"/></svg></a> 
                        </button>
                        </h2>
                        <div id="collapseOne<?php echo $value->id; ?>" class="accordion-collapse collapse <?php echo $key==0?'show':''; ?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="service-desc-wrap">
                                    <div class="editor">
                                        <?php echo $value->description; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php }  ?>

               
                </div>
            </div>
        </div>
       <!--  <div class="row">
            <div class="col-lg-12">
                <div class="btn-wrap text-center mt-4" data-cues="slideInUp">
                    <a href="<?php echo base_url('services'); ?>" class="btn btn-theme btn-icon">View All <span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#fff"/></svg></span></a>
                </div>
            </div>
        </div> -->
    </div>
</section>

<?php }  ?>


<section class="sec-p home-customer-success case_study pb-0">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-lg-9">
                <div class="title-wrap" data-cues="slideInUp">
                    <h2 class="title"><?php echo $detail->case_title?$detail->case_title:'Our Case Studies'; ?> </h2>
                    <p><?php echo $detail->caseDescription?$detail->caseDescription:'Enabling digital transformation empowering business growth'; ?> </p>
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
                    <div class="swiper case-study-swiper">
                        <div class="swiper-wrapper">
                            

                            <?php if (!empty($caseStudyList)){foreach ($caseStudyList as $key => $value) {?>

                            <div class="swiper-slide">
                                <a href="<?php echo base_url('case-study/'.$value->slug); ?>" class="success-story-item">
                                    <div class="img-wrap">
                                        <div class="logo_icon">
                                        <img src="<?php echo CATALOG; ?>img/taglogo1.png" loading="lazy" alt="logo"></div>
                                        <img src="<?php echo $value->thumbnail ? base_url($value->thumbnail) : base_url($config_logo); ?>" loading="lazy" alt="<?php echo !empty($value->title) ? htmlspecialchars($value->title) : 'Image'; ?>">
                                    </div>
                                    <div class="info">
                                        <div class="editor">
                                            <h4><?php echo $value->title; ?></h4>
                                            <p><?php echo $value->shortDescription; ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                             <?php } } ?>
                          
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="col-lg-12">-->
            <!--    <div class="btn-wrap text-center mt-4" data-cue="slideInUp">-->
            <!--        <a href="#" class="btn btn-theme btn-icon">View All <span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#fff"/></svg></span></a>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
    </div>
</section>




<?php echo $this->include('frontend/includes/bottom_section'); ?>

<?php $this->endSection(); ?>