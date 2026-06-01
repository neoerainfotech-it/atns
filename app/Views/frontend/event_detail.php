
<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true
?>



<section class="blog_banner">
    <img src="<?php echo $detail->image?base_url($detail->image):base_url($config_logo); ?>" alt="config_logo" class="inner_bg"  />
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto ">
                <div class="text-wrap" data-cues="slideInUp">
                    <div class="title-wrap ">
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
                      <div class="d-flex justify-content-between mb-5 align-items-center">
                        
                           <div class="post_by"> <strong>Updated:</strong> <?php echo $detail->upcomingDate; ?></span> </div>
                            <?php echo $this->include('frontend/includes/share');?>
                       
                      </div>
                      
                   <?php echo $detail->description; ?>
                    </div>
            </div>
        </div>
    </div>
</section>

 <?php if (!empty($relatedPost)){?>
<section class="section blog_latest">
    <div class="container " data-cue="slideInUp">
        <div class="row for-bor">
            <div class="col-lg-8 ">
                <div class="title mb-4">
                    <h2><span>Related Events</span></h2>
                </div>
            </div>
        </div>
        
        <div class="row" data-cues="slideInUp">
           
             
          <?php foreach ($relatedPost as $key => $value) {?>

            <div class="col-md-4">
                <a href="<?php echo base_url('event/'.$value->slug); ?>" class="blog_list"> 
                    <div class="blog_sliderimg"> 
                        <img src="<?php echo $value->thumbnail?base_url($value->thumbnail):base_url($config_logo); ?>" alt="blog image"/>
                    </div>
                    <div class="blog_sliderContent"> 
                      
                         <span><?php echo date('d M Y',strtotime($value->publish)); ?></span>
                        <h4><?php echo $value->title; ?></h4>
                        <p><?php echo substr($value->shortDescription,0,100).'...'; ?></p>


                        <h6 class="learn_btn d-block text-decoration-underline">Read More <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 12L6 6.5L1 1" stroke="#E76E24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg></h6>
                    </div>
                </a>
            </div> 

           <?php } ?>
          
        </div>
    </div>
</section>
  <?php }  ?>

<?php $this->endSection(); ?>