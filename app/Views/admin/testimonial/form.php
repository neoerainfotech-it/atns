<?php 
$this->extend('layouts/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>

<div id="content">
 <div class="page-header">
 <div class="container-fluid">
  <div class="float-end">
  <button type="submit" form="form-testimonial" data-bs-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i></button>
  <a href="<?php echo base_url('admin/testimonial');?>" data-bs-toggle="tooltip" title="Back" class="btn btn-light">
  <i class="fa-solid fa-reply"></i>
  </a>
</div>
<h1><?php echo $page_title; ?></h1>
  <ol class="breadcrumb"></ol>
  </div>
 </div>
  <div class="container-fluid">
  <div class="card">
  <div class="card-header"><i class="fa-solid fa-pencil"></i> Profile Properties Configuration</div>
 <div class="card-body">

  <?php if ($success = session()->getFlashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo $success; ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif ?>

  <?php if ($error = session()->getFlashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><?php echo $error; ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif ?>

 <form action="<?php echo $form_action; ?>" method="post" enctype="multipart/form-data" id="form-testimonial" class="form-horizontal">
 <ul class="nav nav-tabs">
  <li class="nav-item"><a href="#tab-general" data-bs-toggle="tab" class="nav-link active">General Profile</a></li>
 </ul>

 <div class="tab-content">
   <div id="tab-general" class="tab-pane active">
      <fieldset>
        
          <div class="row mb-3 required">
              <label class="col-sm-2 col-form-label">Client Name</label>
              <div class="col-sm-10">
                  <input type="text" name="name" value="<?php echo set_value('name', $name); ?>" placeholder="Enter full name" class="form-control" required />
                 <?php echo $validation->hasError('name') ? $validation->showError('name','my_single') : ''; ?>
              </div>
          </div>

          <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Designation / Corporate Node</label>
              <div class="col-sm-10">
                  <input type="text" name="designation" value="<?php echo set_value('designation', $designation); ?>" placeholder="e.g. Operations Director, Coimbatore" class="form-control" />
              </div>
          </div>

          <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Tagline Summary Quote</label>
              <div class="col-sm-10">
                  <input type="text" name="tagLine" value="<?php echo set_value('tagLine', $tagLine); ?>" placeholder="Brief punchline statement headline" class="form-control" />
              </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Short Description </label>
              <div class="col-sm-10">
                   <textarea name="shortDescription" class="form-control" rows="3"><?php echo set_value('shortDescription', $shortDescription); ?></textarea>
              </div>
          </div>

          <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Full Feedback Body</label>
              <div class="col-sm-10">
                    <textarea name="description" class="form-control ckeditor" rows="6"><?php echo set_value('description', $description); ?></textarea>
              </div>
          </div>

          <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Profile Avatar Asset</label>
              <div class="col-sm-10">
               <?php if (!empty($image)): ?>
                <div class="mb-2"><img src="<?php echo base_url($image); ?>" width="100" height="100" style="object-fit:cover;" class="border rounded" alt="avatar"></div>
              <?php endif ?>
              <input type="file" name="image" id="input-image" class="form-control" />
              </div>
          </div>

          <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Rating Value Structure</label>
              <div class="col-sm-10">
                  <select name="rating" class="form-control">
                      <option value="5" <?php echo ($rating == '5') ? 'selected' : ''; ?>>5 Star Rating Score</option>
                      <option value="4" <?php echo ($rating == '4') ? 'selected' : ''; ?>>4 Star Rating Score</option>
                      <option value="3" <?php echo ($rating == '3') ? 'selected' : ''; ?>>3 Star Rating Score</option>
                  </select>
              </div>
          </div>

          <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Sort Order</label>
              <div class="col-sm-10">
                  <input type="number" name="sort_order" value="<?php echo set_value('sort_order', $sort_order); ?>" class="form-control" />
              </div>
          </div>

           <div class="row mb-3">
                <label for="input-status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <div class="form-check form-switch form-switch-lg">
                        <input type="hidden" name="status" value="0" />
                        <input type="checkbox" name="status" value="1" id="input-status" class="form-check-input" <?php echo $status == 1 ? 'checked' : ''; ?> />
                    </div>
                </div>
            </div> 
      </fieldset>
    </div>
   </div>
  </form>
 </div>
</div>
</div>
</div>

<?php $this->endSection(); ?>