<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true
?>


<section class="sec-p service pro_page">
    <div class="container">
        <div class="row align-items-center mb-4 flex-column">
            <div class="col-lg-12">
                <div class="title-wrap d-flex" data-cues="slideInUp">
                    <div>
                        <?php if (!empty($detail->thumbnail)): ?>
                             <img src="<?php echo $detail->thumbnail; ?>" alt="project page image">
                        <?php endif ?>
                       
                    </div>
                <div>
                   
                   <?php echo $detail->description; ?>
                    </div></div>
            </div>
            
        </div>
    </div>

<div class="value_bg">

    <?php if (!empty($detail->image)): ?>
         <img src="<?php echo $detail->image; ?>" alt="background image">
    <?php endif ?>
</div>

</section>

<section class="key_feat sec-p">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-lg-9 m-auto">
                <div class="title-wrap text-center" data-cues="slideInUp">
                    <h2 class="title"><?php echo $detail->keyTitle?$detail->keyTitle:'Key Features'; ?></h2>
                    <p><?php echo $detail->keyDescription?$detail->keyDescription:'Enabling digital transformation empowering business growth'; ?></p>
                </div>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="key_feat_list d-flex " data-cues="slideInUp">
                   
                    <?php if (!empty($keyFeatureList)){foreach ($keyFeatureList as $key => $value) {?>
                
                    <div class="key_item" >
                        <h6><?php echo $value->title; ?></h6>
                        <p><?php echo $value->description; ?></p>
                    </div>

                <?php } } ?>


                </div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($usecasesList)){?>

<section class="cases sec-p">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-lg-9 m-auto">
                <div class="title-wrap text-center" data-cues="slideInUp">
                    <h2 class="title"><?php echo $detail->caseTitle?$detail->caseTitle:'Use Cases'; ?></h2>
                    <p><?php echo $detail->casetDescription?$detail->casetDescription:'Enabling digital transformation empowering business growth'; ?></p>
                </div>
            </div>
            <div class="col-lg-10 m-auto mt-4">
                <ul class="justify-content-around mb-4 nav nav-pills" id="pills-tab" role="tablist" data-cues="slideInUp">
                  
             <?php foreach ($usecasesList as $key => $value) {?>
  
                  <li class="nav-item" role="presentation">
                    <button class="nav-link <?php echo $key==0?'active':''; ?>" id="pills-home-tab-<?php echo $key; ?>" data-bs-toggle="pill" data-bs-target="#pills-home-<?php echo $key; ?>" type="button" role="tab" 
                    aria-controls="pills-home-<?php echo $key; ?>" aria-selected="true"><?php echo $value->title; ?></button>
                  </li>

                   <?php }  ?>

           
                </ul>
                <div class="tab-content" id="pills-tabContent">
                 
                 <?php foreach ($usecasesList as $key => $value) {?>
   
                  <div class="tab-pane fade <?php echo $key==0?'show active':''; ?> text-center" id="pills-home-<?php echo $key; ?>" role="tabpanel" aria-labelledby="pills-home-tab-<?php echo $key; ?>">
                    <p><?php echo $value->description; ?></p>
                    <?php if (!empty($value->youtube)){ ?>
                        <div class="video-responsive">
                          <iframe
                            src="https://www.youtube.com/embed/<?php echo $value->youtube; ?>?si=Yl9Eco9ejBvf03c8"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin"
                            allowfullscreen
                          ></iframe>
                        </div>

                    <?php }else{ ?>
                    <video  controls>
                      <source src="<?php echo $value->image?base_url($value->image):base_url($config_logo); ?>" type="video/mp4">
                    </video>
                    <?php } ?>
                  </div>

                <?php }  ?>

              
                </div>
            </div>
        </div>
    </div>
</section>

  <?php }  ?>


 <?php if (!empty($industryList)){?>

<section class="industries sec-p pb-0">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-lg-9 m-auto">
                <div class="title-wrap text-center" data-cues="slideInUp">
                     <h2 class="title"><?php echo $detail->industryTitle?$detail->industryTitle:'Industries Applicable for'; ?></h2>
                    <p><?php echo $detail->industryDescription?$detail->industryDescription:'Elevate your digital infrastructure with our transformative technology products. Empower your business to thrive in the digital age with our innovative solutions'; ?></p>
                   
                </div>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="indu_list d-flex justify-content-center text-center flex-wrap" data-cues="slideInUp">
                  
          <?php foreach ($industryList as $key => $value) {?>
       
                    <div class="indu_item" >
                        <img src="<?php echo $value->thumbnail?base_url($value->thumbnail):base_url($config_logo); ?>" loading="lazy" alt="<?php echo $value->name; ?>">
                       <a href="<?php echo base_url('industry/'.$value->slug) ?>"> <h6><?php echo $value->name; ?></h6></a>
                    </div>
            <?php }  ?>


            
                </div>
            </div>
        </div>
    </div>
</section>

        <?php }  ?>



<?php echo $this->include('frontend/includes/bottom_section'); ?>

<?php $this->endSection(); ?>