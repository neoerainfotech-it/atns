<?php 
$this->extend('layouts/master');
$this->section('page');

?>

<section class="sec-p story_detail pt-0">
    <div class="container" data-cue="slideInUp">
        <div class="row gx-5">
            <div class="col-lg-12">
                <img src="<?php echo $detail->image?base_url($detail->image):base_url($config_logo); ?>" loading="eager" alt="Detail_image" class="story_img" />
            </div>
            <div class="col-lg-4">
                <div class="story_title">
                    <a href="<?php echo current_url(); ?>#intro" class="story_tag">
                        <h2>Introduction</h2>
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m1 13 6-6-6-6" stroke="#272727" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                      <?php if (!empty($detail->challenge)): ?>
                    <a href="<?php echo current_url(); ?>#chall" class="story_tag">
                        <h2>Challenges</h2>
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m1 13 6-6-6-6" stroke="#272727" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                        <?php endif ?>

                      <?php if (!empty($detail->solution)): ?>
                    <a href="<?php echo current_url(); ?>#sol" class="story_tag">
                        <h2>Solution</h2>
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m1 13 6-6-6-6" stroke="#272727" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                        <?php endif ?>

                      <?php if (!empty($detail->benefit)): ?>
                    <a href="<?php echo current_url(); ?>#key" class="story_tag">
                        <h2>Key Benefits</h2>
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m1 13 6-6-6-6" stroke="#272727" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                        <?php endif ?>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="flex-middle">
                    <div class="text-wrap">
                        <div class="wrap">
                            <div class="editor" data-cue="slideInUp" id="intro">
                                <h2 class="title"  ><?php echo $detail->description; ?></h2>
                                <h4>Introduction</h4>
                                <p><?php echo $detail->title; ?></p>
                            </div>
                           
                            <?php if (!empty($detail->challenge)): ?>
                            <div class="editor" data-cue="slideInUp" id="chall">
                                <h4>Challenges</h4>
                                <?php echo $detail->challenge; ?>
                            </div>
                            <?php endif ?>


                             <?php if (!empty($detail->solution)): ?>
                            <div class="editor" data-cue="slideInUp" id="sol"> 
                                <h4>Solution</h4>
                               <?php echo $detail->solution; ?>
                               
                            </div>
                               <?php endif ?>

                             <?php if (!empty($detail->benefit)): ?>
                             <div class="editor" data-cue="slideInUp" id="key"> 
                                <h4>Key Benefits</h4>
                               <?php echo $detail->benefit; ?>
                               
                            </div>
                               <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class=" sec-p query_form contact_page story_detail_page pt-0">
    <div class="container">
        <div class="row" >
            <div class="col-md-8 m-auto  mb-5">
                <div class="title-wrap text-center">
                    <h2 class="title" ><?php echo $heading->title2; ?></h2>
                    <p><?php echo $heading->description2; ?></p>
                </div>
            </div> 
            <div class="col-md-6 pe-5">
                <div>
                    <img src="<?php echo $heading->additionalImage ? base_url($heading->additionalImage) : base_url($config_logo); ?>" loading="eager" alt="<?php echo !empty($heading->title) ? htmlspecialchars($heading->title) : 'Image'; ?>">
                </div>
            </div> 
            <div class="col-md-6">
                <form id="blog_form">
                    <div class="form-floating">
                      <input type="text" class="form-control txtOnly required" name="name" id="floatingInput" placeholder="Name">
                      <label for="floatingInput">Name *</label>
                    </div>
                    <div class="form-floating">
                      <input type="email" class="form-control required" name="email" id="floatingemail" placeholder="Email">
                      <label for="floatingemail">Work Email *</label>
                    </div>
                    <div class="form-floating">
                      <input type="text" class="form-control isnumber required" maxlength="11" name="phone" id="floatingmobile" placeholder="Mobile">
                      <label for="floatingmobile">Mobile *</label>
                    </div>
                    <div class="form-floating">
                      <select name="industry" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option value="">Select </option>
                       <?php if (!empty($industryList)){foreach ($industryList as $key => $value) {?>
                       <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                   <?php } } ?>
                      </select>
                      <label for="floatingSelect">Select Industry</label>
                    </div>
                    
                    <div class="form-floating">
                      <textarea name="message" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px"></textarea>
                      <label for="floatingTextarea">Message</label>
                    </div>
                    <button id="btn_save" class="btn btn-theme btn-icon border-0">Submit <svg width="18" height="12" viewBox="0 0 25 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M24.581 6.827a.75.75 0 0 0 0-1.06L19.808.994a.75.75 0 0 0-1.06 1.06l4.242 4.243-4.242 4.243a.75.75 0 0 0 1.06 1.06zM.21 7.047h23.841v-1.5H.21z" fill="#fff"></path></svg></button>
                </form>
            </div> 
        </div> 
    </div>
    
</section>


<?php $this->endSection(); ?>