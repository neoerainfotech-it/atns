
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
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sec-p  pb-0 story_page">
    <div class="container cta-wrap" data-cue="slideInUp">
        <form accept="<?php echo current_url(); ?>" method="get">
        <div class="row">
            <div class="col-lg-12">
                <div class="open_serach">
                    <select name="product">
                     <option value="" >Select Product</option>
                     <?php if (!empty($productList)){foreach ($productList as $key => $value) {?>
                      <option value="<?php echo $value->id; ?>" <?php echo @$_GET['product']==$value->id?'selected':''; ?> ><?php echo $value->name; ?></option>

                      <?php } } ?>
                    </select>

                     <select name="service">
                                 <option value="" >Select Service</option>
                        <?php if (!empty($serviceList)){foreach ($serviceList as $key => $value) {?>
                      <option value="<?php echo $value->id; ?>" <?php echo @$_GET['service']==$value->id?'selected':''; ?> ><?php echo $value->name; ?></option>

                      <?php } } ?>
                    </select>
                    <select name="industry">
                         <option value="" >Select Industry</option>
                    <?php if (!empty($industryList)){foreach ($industryList as $key => $value) {?>
                      <option value="<?php echo $value->id; ?>" <?php echo @$_GET['industry']==$value->id?'selected':''; ?> ><?php echo $value->name; ?></option>

                      <?php } } ?>
                    </select>
                    <button type="submit" class="btn btn-theme btn-icon  justify-content-center">Submit</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</section>

<section class="sec-p story_page">
    <div class="container cta-wrap" data-cue="slideInUp">
        <div class="row ">
           
      <?php if (!empty($blogList)){ foreach ($blogList as $key => $value) {?>

       
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