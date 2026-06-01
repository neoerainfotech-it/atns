<?php
use App\Models\CommonModel;
use App\Models\Cms\ServiceModel;
use App\Models\FrontModel;


$this->AdminModel = new CommonModel();
$FrontModel = new FrontModel();
$ServiceModel = new ServiceModel();

$wconfig =[];
use App\Models\coreModule\SettingModel;
$setmodel = new SettingModel();
$setting = $setmodel->asObject()->where('code','config')->findAll();
    foreach($setting as $value){
     $wconfig[$value->key] = $value->value;
}

$menucoloum1 = $this->AdminModel->all_fetch('front_menu',array('footer'=>1,'status'=>1,'position'=>1),'sort_order_footer','asc');

$serviceList = $ServiceModel->asObject()->select('id,slug,name')->where('status',1)->orderBy('name','asc')->findAll();

$menucoloum2 = $this->AdminModel->all_fetch('front_menu',array('footer'=>1,'status'=>1,'position'=>2),'sort_order_footer','asc');   

$menucoloum3 = $this->AdminModel->all_fetch('front_menu',array('footer'=>1,'status'=>1,'position'=>3),'sort_order_footer','asc');   

$footerList = $FrontModel->get_slider('footerList');

// echo '<pre>';
// print_r($footerList);
// exit;


?>


</main>

<footer class="footer">
    <div class="container">
        <div class="row gx-lg-5">
            <div class="col-lg-4">
                <div class="footer-info">
                    <div class="footer-logo mb-3">
                        <img src="<?php echo $wconfig['config_footer_logo']; ?>" loading="lazy" width="120" height="65" alt="<?php echo $wconfig['config_name']; ?>">
                    </div>
                    <div class="info mb-3">
                        <div class="editor">
                            <p><?php echo $wconfig['config_footer_note']; ?></p>
                        </div>
                    </div>
                    <div class="footer-badge">
                        <div class="img-wrap">
                           
                            <?php if(!empty($footerList)){foreach($footerList as $value){?>
                            
                            
                            <img src="<?php echo $value->image?base_url($value->image):base_url($wconfig['config_logo']); ?>" class="object-fit-contain" loading="lazy" width="170" height="157" alt="config logo">
                            
                            <?php } }?>
                            
                        
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row g-4 justify-content-lg-end">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-menu footer-block">
                            <h4>Company</h4>
                            <ul>
                                 <?php if (!empty($menucoloum1)) {foreach ($menucoloum1 as $key => $value) {?>
                  
                                <li><a href="<?php echo base_url($value->link); ?>"><?php echo $value->name; ?> </a></li>

                                 <?php } } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-menu footer-block">
                            <h4>Services</h4>
                            <ul>
                                
                                <?php if (!empty($menucoloum2)) {foreach ($menucoloum2 as $key => $value) {?>
                  
                                <li><a href="<?php echo base_url($value->link); ?>"><?php echo $value->name; ?> </a></li>

                                 <?php } } ?>
                                                      
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="footer-newsletter footer-block">
                            <h4>Connect With Us</h4>
                            <div class="footer-socials">
                                <ul>

                                     <?php if (!empty($wconfig['config_facebook'])): ?>
                            <li><a href="<?php echo $wconfig['config_facebook']; ?>"><svg width="12" height="23" viewBox="0 0 12 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.795 3.82h2.187V.162A29 29 0 0 0 8.796 0C5.642 0 3.48 1.904 3.48 5.405v3.222H0v4.09h3.481V23H7.75V12.716h3.34l.53-4.089H7.748V5.811c0-1.177.332-1.991 2.047-1.991" fill="#272727"/></svg></a></li>
                         <?php endif ?>

                          <?php if (!empty($wconfig['config_twitter'])): ?>
                            <li><a href="<?php echo $wconfig['config_twitter']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 1226.37 1226.37" xml:space="preserve"><path d="M727.348 519.284 1174.075 0h-105.86L680.322 450.887 370.513 0H13.185l468.492 681.821L13.185 1226.37h105.866l409.625-476.152 327.181 476.152h357.328L727.322 519.284zM582.35 687.828l-47.468-67.894-377.686-540.24H319.8l304.797 435.991 47.468 67.894 396.2 566.721H905.661L582.35 687.854z" data-original="#000000"/></svg></a></li>
                                 <?php endif ?>

                       <?php if (!empty($wconfig['config_instagram'])): ?>
                            <li><a href="<?php echo $wconfig['config_instagram']; ?>"><svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.27 6.554a8 8 0 0 0-.505-2.64 5.6 5.6 0 0 0-3.186-3.2 8 8 0 0 0-2.642-.503C14.772.155 14.401.143 11.445.143S8.12.155 6.957.207a8 8 0 0 0-2.64.507 5.3 5.3 0 0 0-1.933 1.257 5.4 5.4 0 0 0-1.255 1.93A8 8 0 0 0 .623 6.55C.57 7.717.556 8.088.556 11.05s.013 3.331.058 4.494c.02.904.192 1.799.512 2.645a5.6 5.6 0 0 0 3.186 3.191c.845.318 1.739.49 2.642.508 1.16.051 1.531.064 4.487.064 2.955 0 3.326-.013 4.487-.064a8 8 0 0 0 2.642-.508 5.57 5.57 0 0 0 3.186-3.19 8 8 0 0 0 .507-2.646c.051-1.164.063-1.534.063-4.495s0-3.332-.054-4.495zm-1.96 8.903a6 6 0 0 1-.374 2.024 3.62 3.62 0 0 1-2.068 2.07 6 6 0 0 1-2.021.376c-1.148.051-1.493.064-4.398.064-2.906 0-3.255-.013-4.398-.064a6 6 0 0 1-2.021-.375 3.35 3.35 0 0 1-1.256-.814 3.4 3.4 0 0 1-.812-1.257 6 6 0 0 1-.369-2.024c-.051-1.143-.064-1.486-.064-4.4s.013-3.257.064-4.4a6 6 0 0 1 .374-2.024c.173-.476.453-.906.818-1.257a3.4 3.4 0 0 1 1.255-.814 6 6 0 0 1 2.02-.375c1.144-.05 1.489-.064 4.396-.064s3.254.013 4.398.064c.69.007 1.374.134 2.02.375.475.173.904.451 1.256.814.361.353.639.782.813 1.257.237.648.362 1.333.367 2.024.047 1.143.064 1.486.064 4.4s-.013 3.25-.064 4.401z" fill="#272727"/><path d="M11.446 5.446A5.59 5.59 0 0 0 6.28 8.903a5.61 5.61 0 0 0 1.212 6.103 5.59 5.59 0 0 0 9.546-3.96c0-1.485-.59-2.91-1.638-3.96a5.6 5.6 0 0 0-3.954-1.64m0 9.237a3.63 3.63 0 0 1-3.353-2.244 3.64 3.64 0 0 1 .787-3.96 3.627 3.627 0 0 1 6.195 2.57c0 .963-.382 1.888-1.063 2.57a3.63 3.63 0 0 1-2.566 1.064m7.121-9.459a1.31 1.31 0 0 1-.806 1.208 1.304 1.304 0 0 1-1.78-.953 1.31 1.31 0 0 1 1.28-1.562 1.304 1.304 0 0 1 1.306 1.307" fill="#272727"/></svg></a></li>
                             <?php endif ?>

                            <?php if (!empty($wconfig['config_youtube'])): ?>
                            <li><a href="<?php echo $wconfig['config_youtube']; ?>"><svg width="29" height="20" viewBox="0 0 29 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M28.247 3.372A3.52 3.52 0 0 0 25.773.895C23.578.292 14.79.292 14.79.292a85 85 0 0 0-10.98.58 3.59 3.59 0 0 0-2.473 2.5 37 37 0 0 0-.578 6.761c-.015 2.267.179 4.53.578 6.76a3.52 3.52 0 0 0 2.474 2.478c2.22.602 10.983.602 10.983.602a85 85 0 0 0 10.982-.58 3.52 3.52 0 0 0 2.472-2.476c.398-2.231.592-4.494.578-6.76a35.3 35.3 0 0 0-.578-6.785" fill="#272727"/><path d="m11.993 14.347 7.306-4.215-7.306-4.215z" fill="#FCF7FF"/></svg></a></li>
                              <?php endif ?>




                            <li><a href="https://www.linkedin.com/company/atna-technologies-india-pvt-ltd/"><svg xmlns="http://www.w3.org/2000/svg" width="29" height="20" viewBox="0 0 552.77 552.77" xml:space="preserve"><path d="M17.95 528.854h71.861c9.914 0 17.95-8.037 17.95-17.951V196.8c0-9.915-8.036-17.95-17.95-17.95H17.95C8.035 178.85 0 186.885 0 196.8v314.103c0 9.913 8.035 17.951 17.95 17.951m0-405.225h71.861c9.914 0 17.95-8.036 17.95-17.95V41.866c0-9.914-8.036-17.95-17.95-17.95H17.95C8.035 23.916 0 31.952 0 41.866v63.813c0 9.914 8.035 17.95 17.95 17.95m507.782 91.653q-15.145-19.938-44.676-32.791-29.532-12.844-65.197-12.846-72.402-.002-122.699 55.27c-6.672 7.332-11.523 5.729-11.523-4.186V196.8c0-9.915-8.037-17.95-17.951-17.95h-64.192c-9.915 0-17.95 8.035-17.95 17.95v314.103c0 9.914 8.036 17.951 17.95 17.951h71.861c9.915 0 17.95-8.037 17.95-17.951V401.666q0-68.263 8.244-93.574c5.494-16.873 15.66-30.422 30.488-40.649 14.83-10.227 31.574-15.343 50.24-15.343q21.858 0 37.393 10.741c10.355 7.16 17.834 17.19 22.436 30.104q6.905 19.367 6.904 85.33v132.627c0 9.914 8.035 17.951 17.949 17.951h71.861c9.914 0 17.949-8.037 17.949-17.951V333.02q-.001-47.169-5.941-72.48c-5.94-25.311-10.992-31.959-21.096-45.258"/></svg></a></li>
                    





                                </ul>
                            </div>
                            <div class="form-wrap">
                                <form id="subscribe">
                                    <div class="row g-3">
                                        <div class="col-lg-12">
                                            <h4><?php echo $wconfig['config_gst']; ?></h4>
                                        </div>
                                        <div class="col-lg-12">
                                            <input class="form-control required" name="email" type="email" placeholder="Work email...">
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="subscribe" id="btn_save" class="btn btn-theme btn-icon">Subscribe <span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#fff"/></svg></span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-row g-2 row">
            <div class="col-md-8 d-flex gap-4">
                <div class="copy-text"><?php echo $wconfig['config_copywrite']; ?></div>
                <ul>
                     <?php if (!empty($menucoloum3)) {foreach ($menucoloum3 as $key => $value) {?>
                  
                        <li><?php if($key==0){ echo ' '; }?><a href="<?php echo base_url($value->link); ?>"><?php echo $value->name; ?> </a><?php if(count($menucoloum3) > $key+1){ echo ' '; }?> </li>

                    <?php } } ?>
                   
               
                </ul>
            </div>
            <div class="col-md-4">
                <div class="credit-text text-md-end">Designed by <a href="https://cyberworx.in" target="_blank">Cyberworx</a></div>
            </div>
        </div>
    </div>
</footer>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> -->
<script src="<?php echo CATALOG; ?>cue/scrollCue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11.1.1/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js"></script>
<script src="<?php echo CATALOG; ?>js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo CATALOG; ?>js/common.js"></script>
<script src="<?php echo CATALOG; ?>js/toastr.min.js"></script>

