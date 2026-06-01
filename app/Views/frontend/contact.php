<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true
?>


<!--<section class="inner_bnner banner_img animation_tag">-->
<!--    <img src="https://stagingcwt.a2hosted.com/proactive_new/uploads/images/1712321003_6f30416a6fc56f3df61b.png" class="indus_bg" />-->
<!--    <div class="container">-->
<!--        <div class="row ">-->
<!--            <div class="col-md-12">-->
<!--                <div class="banner_content" data-cues="slideInUp">-->
<!--                    <h1>Contact Us</h1>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<section class="inner_banner small_bnnr">
    <img src="<?php echo $meta->image?base_url($meta->image):base_url($config_logo); ?>" loading="eager" alt="background Image" class="inner_bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="text-wrap" data-cues="slideInUp" >
                    <div class="title-wrap mb-4" data-cue="slideInUp" >
                        <h1 class="lg-title mb-0"><?php echo $meta->title; ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class=" sec-p query_form contact_page ">
    <svg class="arrow_svg" viewBox="0 0 332 541" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#a)"><path d="m166.236 121.852-3.299 14.62a1629 1629 0 0 0-11.064 54.028 1956 1956 0 0 0-8.012 45.737 1739 1739 0 0 0-6.846 45.035c-1.6 11.401-3.026 22.826-4.44 34.251a3041 3041 0 0 0-3.932 33.416c-.979 8.847-1.798 17.719-2.641 26.626a5859 5859 0 0 0-2.704 29.459 786 786 0 0 0-1.24 15.334c-.844 11.776-1.724 23.54-2.481 35.316-1.004 16.315-1.947 32.678-2.629 48.981-.372 8.98-.893 17.973-1.129 26.965 0 2.421-.235 4.841-.36 7.262-.124 2.191-.124 2.203-2.418 2.191l-27.075-.182c-8.334 0-16.656 0-24.991-.218-18.74-.436-37.48-.29-56.22-.532-4.404 0-4.478-.073-4.205-4.236.645-10.034 1.389-20.067 2.083-30.1.472-6.85.893-13.713 1.377-20.575.732-10.421 1.5-20.829 2.232-31.25.67-9.368 1.24-18.723 1.997-28.079.868-11.485 1.823-22.995 2.741-34.42.657-8.097 1.24-16.206 1.985-24.303.88-10.203 1.823-20.418 2.765-30.62.658-7.262 1.315-14.451 2.022-21.677q1.24-13.132 2.716-26.263 1.24-11.812 2.605-23.649c1.041-9.126 2.07-18.251 3.212-27.377 1.24-9.791 2.555-19.558 3.894-29.337 1.427-10.445 2.816-20.902 4.403-31.323 1.997-12.998 4.167-25.972 6.288-38.959 3.051-18.711 6.574-37.349 10.32-55.94A1526 1526 0 0 1 68.961 4.2c1.24-4.733.112-4.115 5.346-4.115h184.798c3.994 0 4.031 0 4.874 3.63 6.326 26.857 12.217 53.798 17.5 80.86a2231 2231 0 0 1 11.051 61.12 2398 2398 0 0 1 9.265 60.817c2.282 16.569 4.539 33.15 6.462 49.779 1.922 16.63 3.919 33.428 5.705 50.155 1.414 13.18 2.48 26.384 3.832 39.564 1.352 13.87 2.481 27.752 3.609 41.634a2965 2965 0 0 1 3.572 47.201c.955 14.391 1.997 28.757 2.915 43.135.868 13.422 1.637 26.844 2.48 40.266.385 6.476.782 12.939 1.117 19.365.124 2.263 0 2.276-2.183 2.336H221.229c-4.217 0-3.51.133-3.721-3.365-.62-14.015-1.116-28.03-1.836-42.045-.781-14.971-1.736-29.931-2.666-44.89-.633-10.336-1.241-20.672-2.047-30.983-1.004-13.023-2.145-26.034-3.286-39.032-.819-9.259-1.65-18.505-2.617-27.74a3269 3269 0 0 0-3.907-34.59 2239 2239 0 0 0-3.721-29.652c-1.389-10.36-2.803-20.708-4.428-31.032a2624 2624 0 0 0-6.97-42.36 1402 1402 0 0 0-12.08-61.217c-2.046-9.367-4.229-18.699-6.363-28.03-.235-1.041-.52-2.045-.793-3.074z" fill="#fff" fill-opacity=".08"></path></g><defs><clipPath id="a"><path fill="#fff" d="M.5 0h331v541H.5z"></path></clipPath></defs></svg>
   

    <div class="container">
        <div class="row" >
            <div class="col-md-8 m-auto  mb-5">
                <div class="title-wrap text-center">
                    <h2 class="title" ><?php echo $meta->title1; ?></h2>
                </div>
            </div> 
            <div class="col-md-6 pe-5">
                <div class="title-wrap  pe-5">
                    <p><?php echo $meta->description1; ?></p>
                    <h4>Phone</h4>
                    <?php if (!empty($phoneList)){foreach ($phoneList as $key => $value) {?>
               
                    <p><img src="<?php echo $value->image?base_url($value->image):base_url($config_logo); ?>"  alt="title image"> <?php echo $value->phone; ?></p>

                     <?php } } ?>

                   
                    <h4>For Enquiry</h4>
                    <p><?php echo $wconfig['config_email']; ?></p>
                </div>
            </div> 
            <div class="col-md-6">
                <form id="enquiry_form">
                    <div class="form-floating">
                      <input type="text" class="form-control txtOnly required" id="floatingInput" placeholder="Name" name="name">
                      <label for="floatingInput">Name *</label>
                    </div>
                    <div class="form-floating">
                      <input type="email" class="form-control required "  id="floatingemail" placeholder="Email" name="email">
                      <label for="floatingemail">Work Email *</label>
                    </div>
                    <div class="form-floating">
                      <input type="text" class="form-control inumber required isnumber" maxlength="11" id="floatingmobile" placeholder="Mobile" name="phone">
                      <label for="floatingmobile">Mobile *</label>
                    </div>


                    <div class="form-floating">
                      <input type="radio" class="option" name="option" value="1"> Service
                      <!-- <label for="floatingmobile">Service *</label> -->

                      <input type="radio" class="option" name="option" value="2"> Product
                      <!-- <label for="floatingmobile">Product *</label> -->
                    </div>



                    <div class="form-floating" id="service1" style="display:none;">
                      <select class="form-select" name="service" aria-label="Floating label select example">
                        <option value="">Service You are Looking for</option>
                        <?php if (!empty($serviceList)){foreach ($serviceList as $key => $value) {?>
                      
                        <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>

                    <?php } } ?>
                      
                      </select>
                      <label for="floatingSelect">Select Service</label>
                    </div>



                  <div class="form-floating"  id="product" style="display:none;">
                      <select class="form-select" name="product" id="floatingSelect" aria-label="Floating label select example">
                        <option value="">Product You are Looking for</option>
                        <?php if (!empty($categoryList)){foreach ($categoryList as $key => $value) {  if(!empty($value['list'])){  foreach ($value['list'] as $key => $row) {?>
                       
                        <option value="<?php echo $row->id; ?>"><?php echo $value['name'] .' -> '. $row->name; ?></option>

                    <?php } } } } ?>
                      
                      </select>
                      <label for="floatingSelect">Select Product</label>
                    </div>

                    
                    <!--<div class="form-floating">-->
                    <!--  <input type="text" class="form-control required" name="job" id="floatingjob" placeholder="job">-->
                    <!--  <label for="floatingjob">Job Title *</label>-->
                    <!--</div>-->
                    
                    <div class="form-floating">
                      <select class="form-select required" name="country" id="floatingSelect" aria-label="Floating label select example">
                        <option selected>Select</option>
                     <?php if (!empty($countryList)){foreach ($countryList as $key => $value) {?>
                      
                        <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>

                    <?php } } ?>
                      </select>
                      <label for="floatingSelect">Country *</label>
                    </div>
                    <div class="form-floating">
                      <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="message" style="height: 100px"></textarea>
                      <label for="floatingTextarea">Message</label>
                    </div>
                    <button class="btn btn-theme btn-icon border-0" id="btn_enq">Submit <svg width="18" height="12" viewBox="0 0 25 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M24.581 6.827a.75.75 0 0 0 0-1.06L19.808.994a.75.75 0 0 0-1.06 1.06l4.242 4.243-4.242 4.243a.75.75 0 0 0 1.06 1.06zM.21 7.047h23.841v-1.5H.21z" fill="#fff"></path></svg></button>
                </form>
            </div> 
        </div> 
    </div>
    
</section>



<section class="sec-p">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8">
                <div class="title-wrap " data-cues="slideInUp">
                    <h2 class="title " ><?php echo $meta->title2; ?></h2>
                    <p><?php echo $meta->description2; ?></p>
                </div>
            </div>
        </div>
        <div class="row mt-4 g-4">
           <?php if (!empty($addressList)){foreach ($addressList as $key => $value) {?>
          
            <div class="col-lg-6">
                <div class="contact_info">
                    <img src="<?php echo $value->image?base_url($value->image):base_url($config_logo); ?>" alt="contact info" />
                    <h2><?php echo $value->name; ?></h2>
                    <div class="contact_details ">
                        <h3><?php echo $value->name; ?></h3>
                        <h6>Address</h6>
                        <p><?php echo $value->address; ?></p>
                      <?php if (!empty($value->map)): ?>
                            <a href="<?php echo $value->map;  ?>">View on Map <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.1328 1.81921C11.1328 1.26693 10.6851 0.819213 10.1328 0.819214L1.13281 0.819214C0.580528 0.819214 0.132813 1.26693 0.132813 1.81921C0.132813 2.3715 0.580528 2.81921 1.13281 2.81921L9.13281 2.81921L9.13281 10.8192C9.13281 11.3715 9.58053 11.8192 10.1328 11.8192C10.6851 11.8192 11.1328 11.3715 11.1328 10.8192L11.1328 1.81921ZM1.83992 11.5263L10.8399 2.52632L9.42571 1.11211L0.425706 10.1121L1.83992 11.5263Z" fill="#0083BF"/>
                            </svg></a>
                      <?php endif ?>
                      

                        <h6>Contact</h6>
                        <p><?php echo $value->phone; ?></p>
                        <h6>Mail</h6>
                        <p><?php echo $value->email; ?></p>
                    </div>
                </div>
            </div>

        <?php } } ?>



        </div>
    </div>
</section>

<script type="text/javascript">
    $('.option').on('click',function(){
        let val = Number($(this).val());
    
     $('#service1').hide()
            $('#product').hide()
            
        if(val==1){
            $('#service1').show()
        }else if(val==2){
            $('#product').show()
        }else{
            $('#service1').hide()
            $('#product').hide()
        }
    });
</script>


<?php $this->endSection(); ?>