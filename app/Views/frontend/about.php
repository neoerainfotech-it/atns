<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true
?>


<section class="inner_banner about_bnner">
    <svg width="332" height="541" viewBox="0 0 332 541" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#a)"><path d="m166.236 121.852-3.299 14.62a1629 1629 0 0 0-11.064 54.028 1956 1956 0 0 0-8.012 45.737 1739 1739 0 0 0-6.846 45.035c-1.6 11.401-3.026 22.826-4.44 34.251a3041 3041 0 0 0-3.932 33.416c-.979 8.847-1.798 17.719-2.641 26.626a5859 5859 0 0 0-2.704 29.459 786 786 0 0 0-1.24 15.334c-.844 11.776-1.724 23.54-2.481 35.316-1.004 16.315-1.947 32.678-2.629 48.981-.372 8.98-.893 17.973-1.129 26.965 0 2.421-.235 4.841-.36 7.262-.124 2.191-.124 2.203-2.418 2.191l-27.075-.182c-8.334 0-16.656 0-24.991-.218-18.74-.436-37.48-.29-56.22-.532-4.404 0-4.478-.073-4.205-4.236.645-10.034 1.389-20.067 2.083-30.1.472-6.85.893-13.713 1.377-20.575.732-10.421 1.5-20.829 2.232-31.25.67-9.368 1.24-18.723 1.997-28.079.868-11.485 1.823-22.995 2.741-34.42.657-8.097 1.24-16.206 1.985-24.303.88-10.203 1.823-20.418 2.765-30.62.658-7.262 1.315-14.451 2.022-21.677q1.24-13.132 2.716-26.263 1.24-11.812 2.605-23.649c1.041-9.126 2.07-18.251 3.212-27.377 1.24-9.791 2.555-19.558 3.894-29.337 1.427-10.445 2.816-20.902 4.403-31.323 1.997-12.998 4.167-25.972 6.288-38.959 3.051-18.711 6.574-37.349 10.32-55.94A1526 1526 0 0 1 68.961 4.2c1.24-4.733.112-4.115 5.346-4.115h184.798c3.994 0 4.031 0 4.874 3.63 6.326 26.857 12.217 53.798 17.5 80.86a2231 2231 0 0 1 11.051 61.12 2398 2398 0 0 1 9.265 60.817c2.282 16.569 4.539 33.15 6.462 49.779 1.922 16.63 3.919 33.428 5.705 50.155 1.414 13.18 2.48 26.384 3.832 39.564 1.352 13.87 2.481 27.752 3.609 41.634a2965 2965 0 0 1 3.572 47.201c.955 14.391 1.997 28.757 2.915 43.135.868 13.422 1.637 26.844 2.48 40.266.385 6.476.782 12.939 1.117 19.365.124 2.263 0 2.276-2.183 2.336H221.229c-4.217 0-3.51.133-3.721-3.365-.62-14.015-1.116-28.03-1.836-42.045-.781-14.971-1.736-29.931-2.666-44.89-.633-10.336-1.241-20.672-2.047-30.983-1.004-13.023-2.145-26.034-3.286-39.032-.819-9.259-1.65-18.505-2.617-27.74a3269 3269 0 0 0-3.907-34.59 2239 2239 0 0 0-3.721-29.652c-1.389-10.36-2.803-20.708-4.428-31.032a2624 2624 0 0 0-6.97-42.36 1402 1402 0 0 0-12.08-61.217c-2.046-9.367-4.229-18.699-6.363-28.03-.235-1.041-.52-2.045-.793-3.074z" fill="#fff" fill-opacity=".08"/></g><defs><clipPath id="a"><path fill="#fff" d="M.5 0h331v541H.5z"/></clipPath></defs></svg>
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


<section class="sec-p mission">
    <div class="container">
        <div class="row align-items-center mb-4 flex-column">
            <div class="col-lg-10 m-auto">
                <div class="title-wrap " data-cues="slideInUp">
                    <h4 ><?php echo $heading->title ?></h4>
                    <h3><?php echo $heading->description ?></h3>
                </div>
            </div>
            
            <div class="col-lg-12">
                <div class="title-wrap d-flex" data-cues="slideInUp">
                    <div>
                        <h2 class="title "><?php echo $heading->wtitle ?></h2>
                    </div><div>
                    <p><?php echo $heading->wdescription ?></p>
                    <a href="<?php echo base_url('contact-us'); ?>" class="btn btn-theme mt-4 btn-icon">Contact Now <span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#fff"></path></svg></span></a>
                </div></div>
            </div>
            
        </div>
    </div>
</section>




<div class="value_bg">
    <img alt="heading_img" src="<?php echo $heading->image?base_url($heading->image):base_url($config_logo); ?>">
</div>

<section class="sec-p value">
    <div class="container">
        <div class="row align-items-center mb-4 flex-column">
            <div class="col-lg-9 m-auto">
                <div class="title-wrap text-center" data-cues="slideInUp">
                    <h2 class="title text-white"><?php echo $heading->jfTitle ?></h2>
                    <p class="text-white"><?php echo $heading->jfDescription ?></p>
                </div>
            </div>
            
            <div class="row gx-5 mt-5 "  data-cue="slideInUp">
              

            <?php if (!empty($visionsList)){foreach ($visionsList as $key => $value) {?>

                <div class="col-lg-3 text-center">
                    <img src="<?php echo $value->image?base_url($value->image):base_url($config_logo); ?>" alt="image" />
                    <h4><?php echo $value->title; ?></h4>
                    <p><?php echo $value->description; ?></p>
                </div>
                    <?php } } ?>

              
            </div>
        </div>
    </div>
</section>




<section class="sec-p leadship">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-lg-9 m-auto">
                <div class="title-wrap text-center" data-cues="slideInUp">
                    <h2 class="title"><?php echo $heading->description2 ?></h2>
                    <p><?php echo $heading->jDescription2 ?></p>
                </div>
            </div>
        </div>
        <!--<div class="row g-5"  data-cue="slideInUp">-->
           

        <!--  <?php if (!empty($teamList)){foreach ($teamList as $key => $value) {?>-->
    

        <!--    <div class="col-lg-3">-->
        <!--        <img src="<?php echo $value->photo?base_url($value->photo):base_url($config_logo); ?>" class="team_img" alt="<?php echo $value->name; ?>">-->
        <!--        <div class="title-wrap d-flex justify-content-between" data-cues="slideInUp">-->
        <!--            <div>-->
        <!--                <h4><?php echo $value->name; ?></h4>-->
        <!--                <p><?php echo $value->designation; ?></p>-->
        <!--            </div>-->
        <!--            <?php if (!empty($value->linkedin)): ?>-->
        <!--                <a href="<?php echo $value->linkedin; ?>"> <img alt = "linkedin" src="<?php echo CATALOG; ?>img/linkdin.png" /></a> -->
        <!--            <?php endif ?>-->
                  
        <!--        </div>-->
        <!--    </div>-->

        <!--  <?php } } ?>-->

         
        <!--</div>-->
        
        
        
        <div class="row g-5"  data-cue="slideInUp">
           
   
            <div class="col-md-12">
                <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                        Executive Team</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                        Directors 
                    </button>
                  </li>
                </ul>
                <div class="tab-content " id="pills-tabContent">
                  <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        
                <div class="row">
                   
                      <?php if (!empty($ceoList)){foreach ($ceoList as $key => $value) {?>
    

                    <div class="col-lg-3">
                            <img src="<?php echo $value->photo?base_url($value->photo):base_url($config_logo); ?>" class="team_img" alt="Abdul Salam">
                            <div class="title-wrap d-flex justify-content-between" data-cues="slideInUp" data-disabled="true">
                                <div data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 360ms; animation-direction: normal; animation-fill-mode: both;">
                                     <h4><?php echo $value->name; ?></h4>
                                   <p><?php echo $value->designation; ?></p>
                                </div>
                                 <?php if (!empty($value->linkedin)): ?>
                                    <a href="<?php echo $value->linkedin; ?>"> <img alt="linkedin" src="<?php echo CATALOG; ?>img/linkdin.png" /></a> 
                                <?php endif ?>             
                            </div>
                        </div>
        
                     <?php } } ?>

                </div>
                  </div>
                  <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  
                <div class="row">
          <?php if (!empty($teamList)){foreach ($teamList as $key => $value) {?>
    

            <div class="col-lg-3">
                <img src="<?php echo $value->photo?base_url($value->photo):base_url($config_logo); ?>" class="team_img" alt="image">
                <div class="title-wrap d-flex justify-content-between" data-cues="slideInUp">
                    <div>
                        <h4><?php echo $value->name; ?></h4>
                        <p><?php echo $value->designation; ?></p>
                    </div>
                    <?php if (!empty($value->linkedin)): ?>
                        <a href="<?php echo $value->linkedin; ?>"> <img src="<?php echo CATALOG; ?>img/linkdin.png" alt="Linkedin image" /></a> 
                    <?php endif ?>
                  
                </div>
            </div>

          <?php } } ?>
            </div>
                  </div>
                </div>
            </div>
          <!--<?php if (!empty($teamList)){foreach ($teamList as $key => $value) {?>-->
    

          <!--  <div class="col-lg-3">-->
          <!--      <img src="<?php echo $value->photo?base_url($value->photo):base_url($config_logo); ?>" class="team_img" alt="<?php echo $value->name; ?>">-->
          <!--      <div class="title-wrap d-flex justify-content-between" data-cues="slideInUp">-->
          <!--          <div>-->
          <!--              <h4><?php echo $value->name; ?></h4>-->
          <!--              <p><?php echo $value->designation; ?></p>-->
          <!--          </div>-->
          <!--          <?php if (!empty($value->linkedin)): ?>-->
          <!--              <a href="<?php echo $value->linkedin; ?>"> <img src="<?php echo CATALOG; ?>img/linkdin.png" /></a> -->
          <!--          <?php endif ?>-->
                  
          <!--      </div>-->
          <!--  </div>-->

          <!--<?php } } ?>-->

         
        </div>
    </div>
</section>


<section class=" home-customer-success ">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-lg-9 m-auto">
                <div class="title-wrap text-center" data-cues="slideInUp">
                    <h2 class="title"><?php echo $heading->patentTitle ?></h2>
                    <p><?php echo $heading->patentDescription ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 m-auto" data-cue="slideInUp">
                    <div class="off_list">
                        <div class="off_item"><h4>office locations </h4> </div>
                        <div class="off_item client"><h4>client locations  </h4> </div>
                    </div>
                <div class="map position-relative">
                    <?php if (!empty($heading->image1)): ?>
                        <img src="<?php echo base_url($heading->image1); ?>" class="map_bg" alt="<?php echo isset($heading->title) ? htmlspecialchars($heading->title) : 'Image'; ?>" />
                    <?php endif ?>
                   
                    <?php if (!empty($globalList)){foreach ($globalList as $key => $value) {?>
                 
                    <div class="loca loca<?php echo $value->sortOrder;?>">
                        <span></span>
                        <div class="loc_detail">
                            <img src="<?php echo $value->image ? base_url($value->image) : base_url($config_logo); ?>" alt="<?php echo !empty($value->name) ? htmlspecialchars($value->name) : 'Location'; ?>" />
                            <h6><?php echo $value->name; ?></h6>
                            <ul>
                                <?php $arr = explode(',', $value->state);
                                    if (!empty($arr)) { foreach ($arr as $key => $row) {?>
                             
                                <li><?php echo $row; ?></li>

                                  <?php } } ?>                               
                            </ul>
                        </div>
                    </div>

                <?php } } ?>


                  <!--   <div class="loca loca2">
                        <span></span>
                        <div class="loc_detail">
                            <img alt="catalogue" src="<?php echo CATALOG; ?>img/flag1.png" />
                            <h6>USA</h6>
                            <ul>
                                <li>Bangalore</li>
                                <li>Coimbatore</li>
                            </ul>
                        </div>
                    </div> -->

              

                </div>
            </div>
        </div>
    </div>
</section>


<section class="sec-p home-customer-success">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-lg-9">
                <div class="title-wrap" data-cues="slideInUp">
                    <h2 class="title"><?php echo $heading->companyTitle ?></h2>
                    <p><?php echo $heading->companyDescription ?></p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="navigation-wrap">
                    <div class="swiper-button-prev cstm-swiper-nav"><svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13 3.5a.5.5 0 0 1 0 1zM.646 4.354a.5.5 0 0 1 0-.708L3.828.464a.5.5 0 1 1 .708.708L1.707 4l2.829 2.828a.5.5 0 1 1-.708.708zM13 4.5H1v-1h12z" fill="#535353"/></svg></div>
                    <div class="swiper-button-next cstm-swiper-nav"><svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 3.5a.5.5 0 0 0 0 1zm12.354.854a.5.5 0 0 0 0-.708L10.172.464a.5.5 0 0 0-.708.708L12.293 4 9.464 6.828a.5.5 0 1 0 .708.708zM1 4.5h12v-1H1z" fill="#535353"/></svg></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="slider-container" data-cue="slideInUp">
                    <div class="swiper home-succes-swiper">
                        <div class="swiper-wrapper">
                            
                         <?php if (!empty($successStoryList)){foreach ($successStoryList as $key => $value) {?>

                            <div class="swiper-slide">
                                <a href="<?php echo base_url('customer-success/'.$value->slug) ?>" class="success-story-item">
                                    <div class="info">
                                        <div class="editor">
                                            <p><?php echo $value->title; ?></p>
                                        </div>
                                    </div>
                                    <div class="img-wrap">
                                   <img src="<?php echo $value->thumbnail ? base_url($value->thumbnail) : base_url($config_logo); ?>" loading="lazy" alt="<?php echo !empty($value->title) ? htmlspecialchars($value->title) : 'Image'; ?>">

                                    </div>
                                </a>
                            </div>

                         <?php } } ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="btn-wrap text-center mt-4" data-cue="slideInUp">
                    <a href="<?php echo base_url('customer-success'); ?>" class="btn btn-theme btn-icon">View All <span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#fff"/></svg></span></a>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="home-customer-success">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-lg-9 m-auto">
                <div class="title-wrap text-center" data-cues="slideInUp">
                    <h2 class="title"><?php echo $heading->mTitle ?></h2>
                    <p><?php echo $heading->letDescription ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" data-cue="slideInUp">
                <div class="partner-card-home">
                 
                <?php if (!empty($partnerList)){foreach ($partnerList as $key => $value) {?>
 
                    <div class="img-wrap">
                        <div class="icon">
                            <img src="<?php echo $value->image ? base_url($value->image) : base_url($config_logo); ?>" loading="lazy" alt="<?php echo !empty($value->name) ? htmlspecialchars($value->name) : 'Image'; ?>">
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