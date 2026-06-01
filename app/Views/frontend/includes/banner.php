<section class="inner_banner">
    <img src="<?php echo $meta->image?base_url($meta->image):base_url($config_logo); ?>" loading="eager" alt="<?php echo $meta->title; ?>" class="inner_bg" />
   
    <div class="container">
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