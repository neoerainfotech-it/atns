<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true
?>


<section class="sec-p service">
    <div class="container">
        <div class="row align-items-center mb-4 flex-column">
            <div class="col-lg-12">
                <div class="title-wrap d-flex" data-cues="slideInUp">
                    <div>
                        <h2 class="title text-white"><?php echo $detail->name; ?></h2>
                    </div><div>
                    <p class=" text-white"><?php echo $detail->fullDescription; ?></p>
                    </div></div>
            </div>
            
        </div>
    </div>

<div class="value_bg">
    <img src="<?php echo $detail->image?base_url($detail->image):base_url($config_logo); ?>" alt="value image">
</div>

</section>


<section class="sec-p work_sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="title-wrap " data-cues="slideInUp">
                    <h2 class="title"><?php echo $detail->featureHeading; ?></h2>
                    <p><?php echo $detail->description;  ?></p>
                </div>
            </div>
        </div>
        <div class="row align-items-center mt-4">
          



    <?php $arr = array_splice($featureList, 0,2);    ?>

     <?php if (!empty($arr)){foreach ($arr as $key => $value) {?>

            <div class="col-lg-3">
                <div class="work_sec_detail " data-cues="slideInUp">
                    <h2><?php echo $value->title; ?></h2>
                    <p><?php echo $value->description; ?></p>
                </div>
            </div>

          <?php } } ?>

     
            <div class="col-lg-6">
               
          <?php if (!empty($featureList)){foreach ($featureList as $key => $value) {?>
      
                <div class="work_sec_detail " data-cues="slideInUp">
                   <h2><?php echo $value->title; ?></h2>
                    <p><?php echo $value->description; ?></p>
                </div>

            <?php } } ?>
               

            </div>


        </div>
    </div>
</section>



<section class="industries newindustry">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-lg-9 m-auto">
                <div class="title-wrap text-center" data-cues="slideInUp">
                    <h2 class="title"> <?php echo $detail->productTitle?$detail->productTitle:'Industries Applicable for'; ?>   </h2>
                    <p><?php echo $detail->productDescription?$detail->productDescription:'Elevate your digital infrastructure with our transformative technology products. Empower your business to thrive in the digital age with our innovative solutions'; ?></p>
                </div>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="indu_list d-flex justify-content-center text-center flex-wrap" data-cues="slideInUp">
                    

             <?php if (!empty($industryList)){foreach ($industryList as $key => $value) {?>
 
                    <div class="indu_item" >
                        <a href="<?php echo base_url('industry/'.$value->slug); ?>"><img src="<?php echo $value->thumbnail?base_url($value->thumbnail):base_url($config_logo); ?>" loading="lazy" alt="<?php echo $value->name; ?>"></a>
                        <h6><?php echo $value->name; ?></h6>
                    </div>

            <?php } } ?>

                   
                 
                </div>
            </div>
        </div>
    </div>
</section>



<section class="sec-p home-customer-success case_study pb-0">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-lg-9">
                <div class="title-wrap" data-cues="slideInUp">
                    <h2 class="title">Our Case Studies</h2>
                    <p>Enabling digital transformation empowering business growth</p>
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
                        <div class="swiper-wrapper align-items-start">
                            

                            <?php if (!empty($caseStudyList)){foreach ($caseStudyList as $key => $value) {?>

                            <div class="swiper-slide">
                                <a href="<?php echo base_url('case-study/'.$value->slug); ?>" class="success-story-item">
                                    <div class="img-wrap">
                                        <div class="logo_icon">
                                        <img src="<?php echo CATALOG; ?>img/taglogo1.png" loading="lazy" alt="tag_logo"></div>
                                        <img src="<?php echo $value->thumbnail?base_url($value->thumbnail):base_url($config_logo); ?>" loading="lazy" alt="logo">
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