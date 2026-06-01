
<?php  $wconfig = websetting(); ?>
<section class="sec-p home-cta-section">
    <div class="container cta-wrap" data-cue="slideInUp">
        <div class="row g-0 align-items-center">
            <div class="col-lg-4">
                <div class="img-wrap">
                    <div class="ele">
                        <img src="<?php echo CATALOG; ?>img/cta.svg" loading="lazy" alt="catalog image">
                    </div>
                    <img src="<?php echo base_url($wconfig['form_image']); ?>" loading="lazy" alt="form image">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="flex-middle">
                    <div class="text-wrap">
                        <div class="wrap">
                            <div class="title">
                                <h2 class="title text-white"><?php echo $wconfig['form_title'] ?></h2>
                            </div>
                            <div class="editor">
                                <p class="text-white"><?php echo $wconfig['form_description'] ?></p>
                            </div>
                            <div class="btn-wrap mt-4">
                                <a href="<?php echo base_url('contact-us'); ?>" class="btn btn-theme btn-theme-dark btn-icon">Contact Us<span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#fff"/></svg></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>