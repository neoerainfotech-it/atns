<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true
?>

<?php echo $this->include('frontend/includes/banner') ?>


<section class="sec-p news_page">
    <div class="container cta-wrap" data-cue="slideInUp">
        <div class="row g-0 align-items-center">
            <div class="col-lg-8">
                <div class="text-wrap">
                    <div class="wrap">
                        <div class="title-wrap mb-4">
                            <h2 class="title" data-cue="slideInUp" ><?php echo $meta->title1; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row" data-cues="slideInUp">
          
        <?php if (!empty($featureList)){ foreach ($featureList as $key => $value) {?>
            <div class="col-lg-6 blog_item">
                <div class="blog_img">
                    <img src="<?php echo $value->thumbnail?base_url($value->thumbnail):base_url($config_logo); ?>" alt="<?php echo $value->title; ?>" />
 
              <span><?php echo $value->category_name; ?></span>
                <div class="blog_content">
                    <h4><?php echo $value->title; ?></h4>
                   
                    <a href="<?php echo $value->link?$value->link:base_url('news/'.$value->slug); ?>" >Read More <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#fff"/></svg></a>
                </div>
                </div>
            </div>
         <?php } } ?>



        </div>
    </div>
</section>




<section class="sec-p news_latest pt-0">
    <div class="container cta-wrap" data-cue="slideInUp">
        <div class="row g-0 align-items-center">
            <div class="col-lg-8">
                <div class="text-wrap">
                    <div class="wrap">
                        <div class="title-wrap mb-4">
                            <h2 class="title" data-cue="slideInUp" ><?php echo $meta->title2; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row g-5" data-cues="slideInUp" id="ajaxdata">
          
        <?php if (!empty($blogList)){ foreach ($blogList as $key => $value) {?>

            <a href="<?php echo $value->link?$value->link:base_url('news/'.$value->slug); ?>" class="col-lg-4 blog_item">
                <div class="blog_img">
                 <img src="<?php echo $value->thumbnail?base_url($value->thumbnail):base_url($config_logo); ?>" alt="<?php echo $value->title; ?>" />
               
                 </div>
                <div class="blog_content">
                    <h4><?php echo $value->title; ?></h4>
                    <span><?php echo $value->category_name; ?></span>
                </div>
            </a>

          <?php } } ?>


        </div>
        <div class="text-center mt-4">
            <input type="hidden" name="offset" value="<?php echo $offset; ?>" id="offset">
            <a class="btn btn-theme btn-icon  justify-content-center" id="load">Load More</a>
        </div>
    </div>
</section>

<script>
       $('body').delegate("#load","click",function(){

        var offset =  $('#offset').val();

       $.ajax({
           url:"<?php echo base_url('get_news_ajax'); ?>",
           type:"POST",
           data:{offset:offset,type:'NEWS'},
           beforeSend:function(){
               $('#load').html('<label>Loading...</label> <span></span>');
           },
           success:function(res){ 
             
                obj = JSON.parse(res);
                if(obj.status==1){

                    $('#load').html('<label>Load More</label> <span></span>');
                    $('#ajaxdata').append(obj.data);
                    $('#offset').val(obj.offset);
                                       
                }else{
                    $('#load').html('<label>'+obj.msg+'</label> <span></span>');
                }
               
           }
       });
       
       
});
</script>

<?php echo  $this->include('frontend/includes/bottom_section'); ?>

<?php $this->endSection(); ?>