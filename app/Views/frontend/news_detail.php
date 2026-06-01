
<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true
?>

<section class="blog_banner">
    <img src="<?php echo $detail->image?base_url($detail->image):base_url($config_logo); ?>" loading="eager" alt="<?php echo $detail->title; ?>" class="inner_bg" />
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto pb-5">
                <div class="text-wrap" data-cues="slideInUp" data-group="banner-content-1">
                    <div class="title-wrap mb-4">
                        <h1 class="lg-title mb-0"><?php echo $detail->title; ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog_page_detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="blog_content_detail">
                      <div class="d-flex justify-content-between mb-5">
                        
                               <div class="post_by"> Published: <?php echo $detail->publish?date('d M Y',strtotime($detail->publish)):''; ?></span>
                        </div>
                  
                     
                          <?php echo $this->include('frontend/includes/share');?>
                      </div>
                      
                      <?php echo $detail->description; ?>
                      
                    </div>
            </div>
        </div>
    </div>
</section>

<section class="sec-p blog_page blog_latest">
    <div class="container cta-wrap" data-cue="slideInUp">
        <div class="row g-0 align-items-center for-bor">
            <div class="col-lg-8 text-center m-auto">
                <div class="text-wrap">
                    <div class="wrap">
                        <div class="title-wrap mb-4">
                            <h2 class="title" data-cue="slideInUp" >Related News</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row" data-cues="slideInUp">
           
           <?php if (!empty($relatedPost)){ foreach ($relatedPost as $key => $value) {?>

              <div class="col-lg-4 blog_item">
                <div class="blog_img">
                    <img src="<?php echo $value->thumbnail?base_url($value->thumbnail):base_url($config_logo); ?>" alt="<?php echo $value->title; ?>" />
                </div>
                <div class="blog_content">
                   <span> <?php echo $value->publish?date('d M Y',strtotime($value->publish)):'' ; ?></span>
                     <h4><?php echo $value->title; ?></h4>
                    <a href="<?php echo base_url('blog/'.$value->slug); ?>" >Read More <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#272727"/></svg></a>
                 </div>
            </div>
            
            <?php } } ?>
       
        </div>
    </div>
</section>

<?php $this->endSection(); ?>