<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true
?>

<?php echo $this->include('frontend/includes/banner') ?>

<section class="sec-p award_page">
    <div class="container cta-wrap" data-cue="slideInUp">
        <div class="row g-0 align-items-center">
            <div class="col-lg-10 m-auto text-center">
                <div class="flex-middle">
                    <div class="text-wrap">
                        <div class="wrap">
                            <div class="editor">
                                <p class="font_bigp"><?php echo $meta->description1; ?></p>
                            </div>
                            <div class="title-wrap mt-5 mb-4">
                                <h2 class="title" data-cue="slideInUp" ><?php echo $meta->title1; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row g-4 " data-cues="slideInUp">
          
          <?php if (!empty($awardList)){foreach ($awardList as $key => $value) {?>
      

            <div class="col-lg-4">
                <div class="award-card">
                    <div class="img-wrap">
                        <div class="icon">
                            <img src="<?php echo $value->image?base_url($value->image):base_url($config_logo); ?>" loading="lazy" alt="<?php echo $value->name; ?>">
                        </div>
                    </div>
                    <div class="info">
                        <div class="text-wrap">
                            <h6><?php echo $value->name; ?></h6>
                            <p> <?php echo $value->description; ?></p>
                        </div>
                    </div>
                </div>
            </div>

        <?php } } ?>


        </div>
    </div>
</section>

<section class="sec-p accred_page pt-0">
    <div class="container cta-wrap" data-cue="slideInUp">
        <div class="row g-0 align-items-center">
            <div class="col-lg-8 m-auto text-center">
                <div class="flex-middle">
                    <div class="text-wrap">
                        <div class="wrap">
                            <div class="title-wrap mb-4">
                                <h2 class="title" data-cue="slideInUp" ><?php echo $meta->title2; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row g-5 " data-cues="slideInUp">
           
       <?php if (!empty($accreditationsList)){foreach ($accreditationsList as $key => $value) {?>
      
            <div class="col-lg-6">
                <div class="accred-card">
                    <div class="img-wrap">
                        <div class="icon">
                            <img src="<?php echo $value->image?base_url($value->image):base_url($config_logo); ?>" loading="lazy" alt="<?php echo $value->name; ?>">
                        </div>
                    </div>
                    <div class="info">
                        <div class="text-wrap">
                            <h6><?php echo $value->name; ?></h6>
                        </div>
                    </div>
                </div>
            </div>

        <?php } } ?>

        </div>
    </div>
</section>


<?php echo  $this->include('frontend/includes/bottom_section'); ?>

<?php $this->endSection(); ?>