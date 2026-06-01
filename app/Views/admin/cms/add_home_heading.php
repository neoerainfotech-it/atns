<?php 
$this->extend('layouts/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>

<div id="content">
 <div class="page-header">
 <div class="container-fluid">
  <div class="float-end">
  <button type="submit" form="form-user" data-bs-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i></button>
  <a href="<?php echo base_url('admin/home_heading');?>" data-bs-toggle="tooltip" title="Back" class="btn btn-light">
  <i class="fa-solid fa-reply"></i>
  </a>
</div>
<h1><?php echo $page_title; ?></h1>
  <ol class="breadcrumb"></ol>
  </div>
 </div>
  <div class="container-fluid">
  <div class="card">
  <div class="card-header"><i class="fa-solid fa-pencil"></i> <?php echo $page_title; ?></div>
 <div class="card-body">

  <?php if ($success = session()->getFlashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo $success; ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif ?>

  <?php if ($error = session()->getFlashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><?php echo $success; ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif ?>

 <form action="<?php echo $form_action; ?>" method="post" enctype="multipart/form-data" id="form-user" class="form-horizontal">
<ul class="nav nav-tabs">
  <li class="nav-item"><a href="#tab-general" data-bs-toggle="tab" class="nav-link active">General</a></li>
  <li class="nav-item"><a href="#tab-feature" data-bs-toggle="tab" class="nav-link">Our Vision</a></li>


</ul>


 <div class="tab-content">
   <div id="tab-general" class="tab-pane active">
      <fieldset>
        <legend>Banner</legend>
          <div class="row mb-3 ">
              <label for="input-username" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                  <input type="text" name="title" value="<?php echo set_value('title',$title); ?>" placeholder="title"  class="form-control" />

                 <?php echo $validation->hasError('title')?$validation->showError('title','my_single'):''; ?>
              </div>
          </div>

   

            <div class="row mb-3 ">
              <label for="input-lastname" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                 <textarea name="description" class="form-control" rows="5"><?php echo set_value('description',$description); ?></textarea>
          
              </div>
          </div>



           <div class="row mb-3">
              <label for="input-username" class="col-sm-2 col-form-label">Image</label>
              <div class="col-sm-10">
                <?php if (!empty($image)): ?>
                <img src="<?php echo base_url($image) ?>" width="100" height="100" alt="Image description">
                <?php endif ?>
                  <input type="file" name="image"   class="form-control" />

              </div>
          </div>
          
            <div class="row mb-3">
              <label for="input-username" class="col-sm-2 col-form-label">Microsoft Image</label>
              <div class="col-sm-10">
                <?php if (!empty($image1)): ?>
                <img src="<?php echo base_url($image1) ?>" width="100" height="100" alt="Image description">
                <?php endif ?>
                  <input type="file" name="image1"   class="form-control" />

              </div>
          </div>
    
        <div class="row mb-3 ">
              <label for="input-username" class="col-sm-2 col-form-label">Link</label>
              <div class="col-sm-10">
                  <input type="text" name="link" value="<?php echo set_value('link',$link); ?>" placeholder="link"  class="form-control" />
              
              </div>
          </div>
    
        <legend>Our Solution</legend>

   
        <div class="row mb-3">
              <label for="input-username" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                  <input type="text" name="solutionTitle" value="<?php echo set_value('solutionTitle',$solutionTitle); ?>" placeholder=""  class="form-control" />

              </div>
          </div>
       

           <div class="row mb-3 ">
              <label for="input-lastname" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                 <textarea name="solutionDescription" class="form-control" rows="5"><?php echo set_value('solutionDescription',$solutionDescription); ?></textarea>
          
              </div>
          </div>


            <legend>Our Product</legend>

          <div class="row mb-3">
              <label for="input-username" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                  <input type="text" name="customerTitle" value="<?php echo set_value('customerTitle',$customerTitle); ?>" placeholder=""  class="form-control" />

              </div>
          </div>


         <div class="row mb-3 ">
              <label for="input-lastname" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                 <textarea name="cultureDescription" class="form-control" rows="5"><?php echo set_value('cultureDescription',$cultureDescription); ?></textarea>
          
              </div>
          </div>

              <legend>Customer Success Stories</legend>
          
              <div class="row mb-3 ">
              <label for="input-email" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
       
                 <input type="text" name="successTitle" value="<?php echo set_value('successTitle',$successTitle); ?>" placeholder=""  class="form-control" />

              </div>
           </div>
          <div class="row mb-3 ">
              <label for="input-lastname" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                 <textarea name="successDescription" class="form-control" rows="5"><?php echo set_value('successDescription',$successDescription); ?></textarea>
          
              </div>
          </div>


           <legend>Industry </legend>


             <div class="row mb-3">
              <label for="input-username" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                  <input type="text" name="whyTitle" value="<?php echo set_value('whyTitle',$whyTitle); ?>" placeholder=""  class="form-control" />

              </div>
          </div>

          <div class="row mb-3 ">
              <label for="input-lastname" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                 <textarea name="partnerTitle" class="form-control" rows="5"><?php echo set_value('partnerTitle',$partnerTitle); ?></textarea>
          
              </div>
          </div>

            <div class="row mb-3">
              <label for="input-username" class="col-sm-2 col-form-label">Image</label>
              <div class="col-sm-10">
                <?php if (!empty($successImage)): ?>
                 <img src="<?php echo base_url($successImage) ?>" width="100" height="100" alt="Success image">
           
                <?php endif ?>
                  <input type="file" name="successImage"   class="form-control" />

              </div>
          </div>


         <legend>Our Vision</legend>
          <div class="row mb-3">
              <label for="input-username" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                  <input type="text" name="blogTitle" value="<?php echo set_value('blogTitle',$blogTitle); ?>" placeholder=""  class="form-control" />

              </div>
          </div>

    
            <div class="row mb-3 ">
              <label for="input-lastname" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                 <textarea name="visionDescription" class="form-control ckeditor" rows="5"><?php echo set_value('visionDescription',$visionDescription); ?></textarea>
          
              </div>
          </div>


         
          <legend>Industry Recognitions </legend>


             <div class="row mb-3">
              <label for="input-username" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                  <input type="text" name="keyTitle" value="<?php echo set_value('keyTitle',$keyTitle); ?>" placeholder=""  class="form-control" />

              </div>
          </div>

    

         <legend>Work With Us </legend>


             <div class="row mb-3">
              <label for="input-username" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                  <input type="text" name="workTitle" value="<?php echo set_value('workTitle',$workTitle); ?>" placeholder=""  class="form-control" />

              </div>
          </div>

           <div class="row mb-3 ">
              <label for="input-lastname" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                 <textarea name="workDescription" class="form-control" rows="5"><?php echo set_value('workDescription',$workDescription); ?></textarea>
          
              </div>
          </div>
     

                   <div class="row mb-3">
              <label for="input-username" class="col-sm-2 col-form-label">Image</label>
              <div class="col-sm-10">
                <?php if (!empty($workImage)): ?>
                 <img src="<?php echo base_url($workImage) ?>" width="100" height="100" alt="work image">
           
                <?php endif ?>
                  <input type="file" name="workImage"   class="form-control" />

              </div>
          </div>



         <legend>In The News </legend>


             <div class="row mb-3">
              <label for="input-username" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                  <input type="text" name="newsTitle" value="<?php echo set_value('newsTitle',$newsTitle); ?>" placeholder=""  class="form-control" />

              </div>
          </div>

           <div class="row mb-3 ">
              <label for="input-lastname" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                 <textarea name="newsDescription" class="form-control" rows="5"><?php echo set_value('newsDescription',$newsDescription); ?></textarea>
          
              </div>
          </div>
    


      
  
         
      </fieldset>

  </div>





<div id="tab-feature" class="tab-pane">

<div class="table-responsive">
        <table id="images" class="table table-striped table-bordered table-hover">
         <thead>
          <tr>

           <td class="text-start required">Value</td>
      
           <td class="text-start">Description</td>
                  <td class="text-start">Symbol</td>
                <td class="text-start required">Sort Order</td>
           <td>Action</td>
          </tr>
         </thead>
         <tbody>
         <?php if (!empty($featureList)){ foreach ($featureList as $key => $row) {?>
         
         <tr id="image-row<?php  echo $row->id; ?>">  

            <td class="text-left"><input type="text" name="featureTitle[]" value="<?php echo $row->title; ?>"  placeholder="Title" class="form-control" /></td>
             
               
            <td class="text-left">             
              <textarea name="featureValue[]"  rows="3" class="form-control"><?php echo $row->description; ?></textarea>
            </td> 
                                    


                <td class="text-left"><input type="text" name="featureSymbol[]" value="<?php echo $row->symbol; ?>"  placeholder="" class="form-control" /></td>

                 <td class="text-left"><input type="number" name="feature_sort_order[]" value="<?php echo $row->sort_order; ?>"  placeholder="" class="form-control" /></td>



             <td class="text-left"><button type="button" onclick="$('#image-row<?php  echo $row->id; ?>').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
       </td>
     </tr>  



        <?php } } ?>  



         </tbody>

         <tfoot>
          <tr>
           <td colspan="4"></td>
           <td class="text-left">
            <button type="button" onclick="addFeature();" data-toggle="tooltip" title="Add Special" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
           </td>
          </tr>
         </tfoot>
        </table>
       </div>

</div>


  


</div>
</form>
</div>
</div>
</div>
</div>




<script type="text/javascript">
  var feature = 0;

    function addFeature() {
    html  = '<tr id="image-row' + feature + '">';
      html += '  <td class="text-left"><input type="text" name="featureTitle[]"  placeholder="Title" class="form-control required" /></td>';

  
     html += '<td class="text-left"><textarea name="featureValue[]"  rows="3" class="form-control"></textarea></td>';


   html += '  <td class="text-left"><input type="text" name="featureSymbol[]"  placeholder="" class="form-control " /></td>';
 
     html += '<td class="text-left"><input type="number" name="feature_sort_order[]" placeholder="" class="form-control" /></td>';




    html += '  <td class="text-left"><button type="button" onclick="$(\'#image-row' + feature  + ', .tooltip\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';

    $('#images tbody').append(html);

    feature++;
  }



</script>



<?php $this->endSection(); ?>