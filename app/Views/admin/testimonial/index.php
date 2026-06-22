<?php 
$this->extend('layouts/master_admin');
$this->section('page');
?>

<div id="content">
 <div class="page-header">
 <div class="container-fluid">
  <div class="float-end">
  <a href="<?php echo base_url('admin/testimonial/add'); ?>" data-bs-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
  <button type="submit" form="form-testimonial-list" onclick="return confirm('Are you sure you want to delete the selected testimonials?');" data-bs-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
  <a href="<?php echo base_url('admin/dashboard');?>" data-bs-toggle="tooltip" title="Back" class="btn btn-light">
  <i class="fa-solid fa-reply"></i>
  </a>
</div>
<h1><?php echo $page_title; ?></h1>
  <ol class="breadcrumb"></ol>
  </div>
 </div>
  <div class="container-fluid">
  <div class="card">
  <div class="card-header"><i class="fa-solid fa-list"></i> <?php echo $page_title; ?></div>
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

 <form action="<?php echo base_url('admin/testimonial/delete'); ?>" method="post" enctype="multipart/form-data" id="form-testimonial-list" class="form-horizontal">
   <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered table-hover align-middle">
         <thead>
          <tr>
           <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" class="form-check-input" /></td>
           <td class="text-start">Avatar</td>
           <td class="text-start">Client Name</td>
           <td class="text-start">Designation / Corporate Node</td>
           <td class="text-start">Tagline Summary</td>
           <td class="text-start">Sort Order</td>
           <td class="text-end">Action</td>
          </tr>
         </thead>
         <tbody>
         <?php if (!empty($detail)){ foreach ($detail as $row) {?>
         <tr>  
            <td class="text-center">
                <input type="checkbox" name="selected[]" value="<?php echo $row->id; ?>" class="form-check-input" />
            </td>
            <td class="text-start">
              <?php if (!empty($row->image)): ?>
                  <img src="<?php echo base_url($row->image) ?>" width="50" height="50" style="object-fit:cover;" class="border rounded-circle" alt="Avatar">
              <?php else: ?>
                  <div class="border rounded-circle bg-light d-flex align-items-center justify-content-center" style="width:50px; height:50px;"><i class="fa-solid fa-user text-muted"></i></div>
              <?php endif ?>
            </td>
            <td class="text-start fw-bold"><?php echo esc($row->name); ?></td>
            <td class="text-start"><?php echo esc($row->designation); ?></td>
            <td class="text-start text-muted"><?php echo esc($row->tagLine); ?></td>
            <td class="text-start"><?php echo $row->sort_order; ?></td>
            <td class="text-end">
                <a href="<?php echo base_url('admin/testimonial/add/'.$row->id); ?>" data-bs-toggle="tooltip" title="Edit" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i></a>
            </td>
         </tr>  
        <?php } } else { ?>  
         <tr>
             <td colspan="7" class="text-center text-muted py-4">No client records managed inside table grid viewport.</td>
         </tr>
        <?php } ?>
         </tbody>
        </table>
       </div>
    </form>
   </div>
  </div>
 </div>
</div>

<?php $this->endSection(); ?>