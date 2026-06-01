<?php 
$this->extend('layouts/master');
$this->section('page');
?>

<style>
    .reg_content {
        padding-top:140px;
    }
    header {
        background: #000000db;
    }
</style>


<section class="reg_content animation_tag section pb-0">
    <div class="custom_container">
        <div class="row" >
            <div class="col-md-12 text-center">
                <div class="reg_content_top">
                    <img src="<?php echo base_url($config_logo); ?>" alt="custom image">
                    <img src="<?php echo $detail->event_image?base_url($detail->event_image):base_url($meta->image); ?>" alt="event image" >
                </div>
                <div class="reg_content_bottom">
                    <h3><?php echo $detail->title?$detail->title:$meta->title; ?></h3>
                    <p><?php echo $detail->event_description?$detail->event_description:$meta->subTitle; ?></p>
                </div>
            </div> 
        </div>
    </div>
</section>

<section class="paper_list animation_tag section">
    <div class="custom_container">
        <div class="row" >
            <div class="col-md-8 m-auto ">
                <div class="title text-center dark">
                    <?php echo $detail->event_description1?$detail->event_description1:$meta->description; ?>
                </div>
            </div> 
            
                <div class="col-md-12 reg_form">
                    <form id="registration">
                        <input type="hidden" name="blog_id"  value="<?php echo $detail->id; ?>">
                        <div class="d-flex gap-4">
                            <div class="form-floating col">
                            <input type="text" name="firstName" class="form-control required txtOnly" id="floatingInput" placeholder="First Name">
                            <label for="floatingInput">First Name *</label>
                            </div>
                            <div class="form-floating col">
                            <input type="text" name="lastName" class="form-control txtOnly" id="floatingemail" placeholder="Last Name">
                            <label for="floatingemail">Last Name</label>
                            </div>
                        </div>
                        <div class="form-floating">
                        <input type="text" name="company_name" class="form-control required"  placeholder="XYZ Company Ltd.">
                        <label for="floatingmobile">Company Name *</label>
                        </div>
                        <div class="form-floating">
                        <input type="text" name="job_title" class="form-control" id="floatingmobile" placeholder="">
                        <label for="floatingmobile">Job Title </label>
                        </div>
                        <div class="form-floating">
                        <input type="text" name="email" class="form-control required" id="floatingmobile" placeholder="Work Email">
                        <label for="floatingmobile">Work Email *</label>
                        <p id="error_email" class="text-danger"></p>
                        </div>
                        <div class="form-floating">
                        <input type="text"  name="phone" class="form-control required isnumber" maxlength="11" minlength="10" id="floatingmobile" placeholder="Mobile">
                        <label for="floatingmobile">Phone *</label>
                        </div>
                        <div class="form-floating">
                        <input type="text" name="location" class="form-control" id="floatingmobile" placeholder="location">
                        <label for="floatingmobile">Location </label>
                        </div>

                          <?php  echo $this->include('frontend/includes/captcha');?>


                        <div class="text-center">
                        <button type="submit" id="btn_save" class="btn_proactive border-0">Submit <svg width="18" height="12" viewBox="0 0 25 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24.581 6.827a.75.75 0 0 0 0-1.06L19.808.994a.75.75 0 0 0-1.06 1.06l4.242 4.243-4.242 4.243a.75.75 0 0 0 1.06 1.06zM.21 7.047h23.841v-1.5H.21z" fill="#fff"></path></svg></button>
                </div> 

                </form>
            </div> 



            <section class="query_form animation_tag section thankyou1" id="thankyou1" style="display:none;">
                <div class="custom_container">
                    <div class="row" >
                        <div class="col-md-7 m-auto">
                            <div class="formcss">
                            <svg width="61" height="61" viewBox="0 0 61 61" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#a)"><path d="M30.473 61C13.753 61-.019 47.203-.01 30.48S13.787-.012 30.51 0 61 13.794 60.99 30.517 47.193 61.012 30.473 61m-3.697-24.386c-2.306-2.326-4.396-4.456-6.502-6.558-1.372-1.366-2.957-1.453-4.075-.282-1.117 1.17-1.006 2.616.31 3.95a941 941 0 0 0 7.988 7.992c1.515 1.502 2.905 1.533 4.422.022q8.614-8.567 17.181-17.187a3.7 3.7 0 0 0 .93-1.39c.392-1.267.04-2.394-1.143-3.063s-2.282-.49-3.242.465q-5.43 5.4-10.837 10.837c-1.666 1.672-3.273 3.39-5.023 5.214z" fill="#26ACC5"/></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h61v61H0z"/></clipPath></defs></svg>
                             <h2 class="my-4">Thank You! </h2>
                             <!--<p class="mb-5">Enjoy your Whitepaper. We have sent you a link in your inbox to download the whitepaper</p>   -->
                             <!--<a href="" class="send_css">Send Link Again</a>-->
                             </div>
                        </div> 
                    </div> 
                </div>
                
            </section>
            
            <div class="col-md-8 m-auto ">
                <div class="title text-center dark">
                    <p><?php echo $meta->title1; ?><br><br>

                    <?php echo $meta->description1; ?>
                    </p>

                    <p class="copy_right"> <?php echo $meta->title2; ?>
                </div>
            </div> 

        </div> 
    </div>
    
</section>




<?php $this->endSection(); ?>