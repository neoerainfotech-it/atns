<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true
?>

<?php echo $this->include('frontend/includes/banner') ?>


<section class="current sec-p bg-white pb-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mb-5 m-auto">
                <div class="title-wrap text-center ">
                    <h2 class="title "><?php echo $meta->title1; ?></h2>
                    <div class="open_serach">
                        

    
                        <select name="department" id="department">
                           <option value="">Select Department</option>
                          <?php if (!empty($departmentList)){foreach ($departmentList as $key => $value) {?>
                          <option value="<?php echo $value->department; ?>"><?php echo $value->department; ?></option>
                          <?php } } ?>
                         
                        </select>
                     
                        <select name="location" id="location">
                            <option value="">Select Location</option>
                          <?php if (!empty($locationList)){foreach ($locationList as $key => $value) {?>
                          <option value="<?php echo $value->location; ?>"><?php echo $value->location; ?></option>
                          <?php } } ?>

                        </select>

                    </div>
                </div>
            </div> 
        </div> 
    </div>
</section>


<section class="current sec-p">
    <div class="container">
        <div class="row">
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
                             <p><?php echo $value->location?$value->location:''; ?></p>
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

<script type="text/javascript">
$('#department,#location').on('change',function(){
  ajax();
});

function ajax(){
      let department = $('select#department').val();
       let location = $('select#location').val();
       $.ajax({
        url:"<?php echo base_url('get_job') ?>",
        type:"POST",
        data:{department:department,location:location},
        success:function(res){   
            console.log(res);
            $('#accordionExample').html('')
            let obj = JSON.parse(res);
            if(obj.status==1){
                $('#accordionExample').html(obj.data)
            }
        }
    })
}
</script>

<?php echo  $this->include('frontend/includes/bottom_section'); ?>

<?php $this->endSection(); ?>