<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true
?>



<?php echo $this->include('frontend/includes/banner') ?>

<section class="sec-p  pb-0">
    <div class="container cta-wrap" data-cue="slideInUp">
        <div class="row">
            <div class="col-lg-10 m-auto text-center">
                <div class="flex-middle">
                    <div class="text-wrap">
                        <div class="wrap">
                            <div class="editor" data-cue="slideInUp">
                                <p class="font_bigp"><?php echo $meta->description; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sec-p whitepaper_page">
    <div class="container cta-wrap" data-cue="slideInUp">
        <div class="row text-center">
           
           <?php if (!empty($blogList)){foreach ($blogList as $key => $value) {?>
            
            <div class="col-lg-4">
                <div class="info">
                    <div class="img-wrap">
                        <img src="<?php echo $value->thumbnail?base_url($value->thumbnail):base_url($config_logo); ?>" loading="lazy" alt="thumbnail">
                    </div>
                    <div>
                        <p><?php echo $value->title; ?></p>
                        <?php if (!empty($value->whitepaper_download)): ?>
                            
                      
                        <a data-bs-toggle="modal" data-blogid="<?php echo $value->id; ?>" data-bs-target="#exampleModal" class="btn btn-theme btn-icon subscribe">Subscribe <span class="icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.5 12.5v3.333a1.666 1.666 0 0 1-1.667 1.667H4.167A1.667 1.667 0 0 1 2.5 15.833V12.5m3.332-4.167L9.999 12.5l4.166-4.167M10 12.5v-10" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span></a>
                          <?php endif ?>
                    </div>
                </div>
            </div>

        <?php } } ?>

        </div>
        
    </div>
</section>



<?php echo $this->include('frontend/includes/download');?>


<?php $this->endSection(); ?>