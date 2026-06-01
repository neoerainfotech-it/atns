<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true
?>


<section class="inner_banner">
    <img src="<?php echo $meta->image?base_url($meta->image):base_url($config_logo); ?>" loading="eager" alt="banner image" class="inner_bg">
    <div class="cstm-container">
        <div class="row">
            <div class="col-lg-8">
                <div class="text-wrap" data-cues="slideInUp" data-group="banner-content-1">
                    <div class="title-wrap mb-4">
                      <h1 class="lg-title mb-0"><?php echo $meta->title; ?></h1>
                    </div>
                    <div class="editor fs-20">
                        <p><?php echo $meta->subTitle; ?></p>
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
                                <p class="font_bigp"><?php echo $meta->description1; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php if (!empty($gallery)){foreach ($gallery as $key => $value) {?>


<section class="sec-p accred_page pt-0">
    <div class="container cta-wrap" data-cue="slideInUp">
        <div class="row g-0 align-items-center">
            <div class="col-lg-8 m-auto text-center">
                <div class="flex-middle">
                    <div class="text-wrap">
                        <div class="wrap">
                            <div class="title-wrap mb-4">
                                <h2 class="title" data-cue="slideInUp" ><?php echo $value['name'] ?></h2>
                                <p data-cue="slideInUp" ><?php echo $value['description'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row g-5" data-cues="slideInUp">
            <div class="col-lg-12">
                <div class="partner-card">
                   <?php if (!empty($value['list'])){foreach ($value['list'] as $key => $row) {?>
                 
                    <div class="img-wrap">
                        <div class="icon">
                            <img src="<?php echo $row->image ? base_url($row->image) : base_url($config_logo); ?>" loading="lazy" alt="<?php echo !empty($row->title) ? htmlspecialchars($row->title) : 'Image'; ?>">
                        </div>
                    </div>

            	<?php } } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php } } ?>



<?php echo $this->include('frontend/includes/bottom_section'); ?>

<?php $this->endSection(); ?>