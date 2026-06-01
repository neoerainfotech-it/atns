<?php 
$this->extend('layouts/master');
$this->section('page');

 ?>

<section class="error text-center py-5  animation_tag ">
	<div class="error_img">
	    <div class="title text-center mt-5">
            <h4>Oops !</h4>
	    </div>
	    <img src="<?php echo CATALOG; ?>/common/error_img.png" alt="404 Error Image" >
	    <div class="title text-center mt-5">
            <h1>This Page Doesn’t Exist.</h1>
            <p>The page you are looking has been moved or renamed. Please try one of the following links.</p>
	    </div>
	</div>
    <a href="<?php echo base_url(); ?>" class="btn_mns">Go To Homepage 
    </a>
</section>


<?php $this->endSection(); ?>
