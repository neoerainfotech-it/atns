
<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true
?>

<?php echo $this->include('frontend/includes/banner') ?>

<section class="sec-p  pb-0">
    <div class="container cta-wrap" data-cue="slideInUp">
        <div class="row">
            <div class="col-lg-12">
                <div class="flex-middle">
                    <div class="text-wrap">
                        <div class="wrap">
                            <div class="editor" data-cue="slideInUp">
                                <h2 class="title"  ><?php echo $meta->title1; ?></h2>
                                <p class="font_bigp"><?php echo $meta->description1; ?></p>
                            </div>
                        </div>
                    </div>
                </div>8/
            </div>
        </div>
    </div>
</section>
<section class="sec-p  pb-0 story_page">
    <div class="container cta-wrap" data-cue="slideInUp">
        <div class="row">
            <div class="col-lg-12">
                <div class="open_serach">
                    <select>
                      <option value="Select Department">Select Product</option>
                      <option value="Select Department">Sales Manager</option>
                      <option value="Select Department">Sales Manager</option>
                    </select>
                       <select>
                      <option value="Select Department">Select Service</option>
                      <option value="Select Department">Sales Manager</option>
                      <option value="Select Department">Sales Manager</option>
                    </select>
                    <select>
                      <option value="Select Department">Select Industry</option>
                      <option value="Select Department">Gurgaon</option>
                      <option value="Select Department">Gurgaon</option>
                    </select>
                    <button class="btn btn-theme btn-icon  justify-content-center">Submit</button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec-p story_page">
    <div class="container cta-wrap" data-cue="slideInUp">
        <div class="row ">
           
      <?php if (!empty($featureList)){ foreach ($featureList as $key => $value) {?>

       
            <div class="col-lg-4">
                <a href="<?php echo base_url('customer-success/'.$value->slug); ?>" class="success-story-item">
                    <div class="info">
                        <div class="editor">
                            <p><?php echo $value->title; ?></p>
                            <span>Read More</span>
                        </div>
                    </div>
                    <div class="img-wrap">
                        <img src="<?php echo $value->thumbnail?base_url($value->thumbnail):base_url($config_logo); ?>" loading="lazy" alt="<?php echo $value->title; ?>">
                    </div>
                </a>
            </div>
   <?php } } ?>
        </div>
        
    </div>
</section>




<?php $this->endSection(); ?>