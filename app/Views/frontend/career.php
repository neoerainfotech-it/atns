
<?php 
$this->extend('layouts/master');
$this->section('page');

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
                                <p class="font_bigp"><?php echo $meta->description; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-5 " >
            <div class="col-lg-12 cul_list d-flex justify-content-between text-center" data-cue="slideInUp" >
            <?php if (!empty($benafitList)){foreach ($benafitList as $key => $value) {?>
            
                <div>
                    <img src="<?php echo $value->image ? base_url($value->image) : base_url($config_logo); ?>" alt="Image of <?php echo isset($value->name) ? htmlspecialchars($value->name) : 'Item'; ?>">
                    <h4><?php echo $value->title; ?></h4>
                </div>

            <?php } } ?>

           
            </div>
        </div>
        
        
    </div>
</section>



<section class="sec-p pt-0 ">
    <div class="container cta-wrap" data-cue="slideInUp">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="title-wrap d-flex ">
                    <h2 class="title w-50"><?php echo $heading->title; ?></h2>
                    <p class="w-50"><?php echo $heading->description; ?></p>
                </div>
                
                
            </div>
        </div>
    </div>
    <div class="container-fluid" data-cue="slideInUp">
        <div class="row ">
            <div class="col-lg-12 p-0">
                
                    <div class="swiper value-succes-swiper">
                        <div class="swiper-wrapper value_cards mt-5">
                            
                    
<?php $chunk = array_chunk($cultureList, 2);

    if (!empty($chunk)) {  foreach ($chunk as $key => $arr) {

         if (!empty($arr)) { if ($key%2==0) {?>


                  <div class="swiper-slide value_cards_item">
                    <?php foreach ($arr as $key1 => $row) { if ($row->image) { ?>
                        <div class="value_cards_item_img">
                            <img src="<?php echo $row->image ? base_url($row->image) : base_url($config_logo); ?>" loading="eager" alt="<?php echo !empty($row->title) ? htmlspecialchars($row->title) : 'Image'; ?>" />
                        </div>

                     <?php }else{  ?>

                        <div class="value_cards_item_content">
                            <h4><?php echo $row->title; ?></h4>
                            <p class="text-white"><?php echo $row->description; ?></p>
                        </div>

                     <?php } } ?>

                    </div>

                <?php }else{  ?>

                    <div class="swiper-slide value_cards_item">

                    <?php foreach ($arr as $key1 => $row) { if (!$row->image) { ?>
                          <div class="value_cards_item_content">
                            <h4><?php echo $row->title; ?></h4>
                            <p class="text-white"><?php echo $row->description; ?></p>
                        </div>
                        <?php }else{  ?>

                        <div class="value_cards_item_img">
                            <img src="<?php echo $row->image ? base_url($row->image) : base_url($config_logo); ?>" loading="eager" alt="<?php echo !empty($row->title) ? htmlspecialchars($row->title) : 'Image'; ?>" />
                        </div>
                        <?php } } ?>
                    </div>

                <?php } } } }  ?>

           
                </div>
                
            </div>
            </div>
        </div>
    </div>
</section>



<section class="sec-p hr-msg">
    <div class="container cta-wrap" data-cue="slideInUp">
        <div class="row ">
            <div class="col-lg-6 text-center">
                <img src="<?php echo $heading->image ? base_url($heading->image) : base_url($config_logo); ?>" loading="eager" alt="<?php echo !empty($heading->title) ? htmlspecialchars($heading->title) : 'Image'; ?>" />
                <h5><?php echo $heading->otitle; ?></h5>
                <p><?php echo $heading->opentingTitle; ?></p>
            </div>
            <div class="col-lg-6 text-center">
                <div class="title-wrap ">
                    <h2 class="title" ><?php echo $heading->ctitle; ?></h2>
                    <h6><span><?php echo $heading->cdescription; ?></h6>
                    <p><?php echo $heading->odescription; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="current sec-p">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-5 m-auto">
                <div class="title-wrap text-center ">
                    <h2 class="title "><?php echo $heading->fitTitle; ?></h2>
                    <p><?php echo $heading->fitDescription; ?></p>
                </div>
            </div> 
            <div class="col-md-12">
                <div class="accordion" id="accordionExample">
                 

            <?php if (!empty($jobList)){foreach ($jobList as $key => $value) {?>
        
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne<?php echo $value->id; ?>">
                        <button class="accordion-button  <?php echo $key==0?'':'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $value->id; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $value->id; ?>">
                          <div class="acc_btn">
                            <h4><?php echo strip_tags($value->title); ?></h4>
                            <p><?php echo $value->role?$value->role:''; ?></p>
                            <p><?php echo $value->jobType?$value->jobType:''; ?></p>
                            <span>+</span>
                            <span class="minus">-</span>
                          </div>
                        </button>
                    </h2>

                    <div id="collapseOne<?php echo $value->id; ?>" class="accordion-collapse collapse <?php echo $key==0?'show':''; ?>" aria-labelledby="headingOne<?php echo $value->id; ?>" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="pb-4 text-[14px] sm:text-[16px] text-[#535353]">
                            <p><?php echo $value->description; ?>
                            </p>
                            <a href="<?php echo base_url('job/'.$value->slug); ?>" class="btn btn-theme btn-icon mt-4">Apply Now <svg width="18" height="12" viewBox="0 0 25 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24.581 6.827a.75.75 0 0 0 0-1.06L19.808.994a.75.75 0 0 0-1.06 1.06l4.242 4.243-4.242 4.243a.75.75 0 0 0 1.06 1.06zM.21 7.047h23.841v-1.5H.21z" fill="#fff"></path></svg></a>
                        </div>    
                     </div>
                    </div>
                  </div>

              <?php } } ?>


             
                </div>
            </div> 
        </div> 
    </div>
</section>


<?php echo  $this->include('frontend/includes/bottom_section'); ?>

<?php $this->endSection(); ?>