<?php 
$this->extend('layouts/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>

<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="float-end">
                <button type="button" data-bs-toggle="tooltip" title="Export Selected to Excel" class="btn btn-success" onclick="var form = $('#form-user'); var oldAction = form.attr('action'); var searchVal = $('input[name=\'name\']').val(); var exportUrl = '<?php echo base_url('admin/export_webinar_registration'); ?>'; if(searchVal){ exportUrl += '?name=' + encodeURIComponent(searchVal); } form.attr('action', exportUrl).attr('target', '_blank').submit(); form.attr('action', oldAction).removeAttr('target');">
                    <i class="fa-solid fa-file-excel"></i> Export Excel
                </button>&nbsp;
                
                <button type="button" data-toggle="tooltip" title="Delete Selected" class="btn btn-danger" onclick="confirm('Are you sure you want to delete selected entries?') ? $('#form-user').attr('action', '<?php echo base_url('admin/delete_webinar_registration'); ?>').submit() : false;">
                    <i class="fa fa-trash"></i> Delete
                </button>
            </div>
            <h1><?php echo $page_title; ?></h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
               <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $page_title; ?></a></li>
            </ol>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            
            <div id="filter-product" class="col-lg-3 col-md-12 order-lg-last d-none d-lg-block mb-3">
                <div class="card">
                    <div class="card-header"><i class="fa-solid fa-filter"></i> Filter</div>
                    <div class="card-body">
                        <form action="<?php echo base_url('admin/webinar_registrations') ?>" method="get">
                            <div class="mb-3">
                                <label for="input-name" class="form-label">Attendee Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo @$_GET['name']; ?>">
                            </div>
                            
                            <div class="text-end">
                                <button type="submit" id="button-filter" class="btn btn-info"><i class="fa-solid fa-filter"></i> Filter</button>&nbsp;
                                <a href="<?php echo base_url('admin/webinar_registrations'); ?>" class="btn btn-light"><i class="fa-solid fa-rotate-left"></i> Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col col-lg-9 col-md-12">
                <div class="card">
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

                    <style type="text/css">
                      .list-group-item{ font-size: 14px; font-weight: 600; }
                    </style>

                    <div class="card-header"><i class="fa-solid fa-list"></i> Registration List</div>
                    <div id="user" class="card-body">
                        <?php echo form_open('admin/delete_webinar_registration', 'id="form-user"'); ?> 
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td style="width: 1px;" class="text-start"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                                            <td class="text-start">#</td>
                                            <td class="text-start">Name</td>
                                            <td class="text-start">Email</td>
                                            <td class="text-start">Phone</td>
                                            <td class="text-start">Company Name</td>
                                            <td class="text-start">ERP System</td>
                                            <td class="text-start">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($detail)): ?>
                                            <?php foreach ($detail as $key => $value) { ?>
                                                <tr>
                                                    <td class="text-start"><input type="checkbox" name="selected[]" value="<?php echo $value->id; ?>" /></td>
                                                    <td class="text-start"><?php echo $key + 1; ?></td>
                                                    <td class="text-start"><?php echo $value->name; ?></td>
                                                    <td class="text-start"><?php echo $value->email; ?></td>
                                                    <td class="text-start"><?php echo $value->phone; ?></td>
                                                    <td class="text-start"><?php echo $value->company_name; ?></td>
                                                    <td class="text-start"><span class="badge bg-info text-dark"><?php echo $value->erp_system; ?></span></td>
                                                    <td class="text-start">
                                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $value->id;?>">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="staticBackdrop<?php echo $value->id;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5">Registration Lead Profile Details</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul class="list-group">
                                                                    <li class="list-group-item"><span class="text-muted">Full Name:</span> &nbsp;<?php echo $value->name; ?></li>
                                                                    <li class="list-group-item"><span class="text-muted">Email Address:</span> &nbsp;<?php echo $value->email; ?></li>
                                                                    <li class="list-group-item"><span class="text-muted">Phone Number:</span> &nbsp;<?php echo $value->phone; ?></li>
                                                                    <li class="list-group-item"><span class="text-muted">Company Name:</span> &nbsp;<?php echo $value->company_name; ?></li>
                                                                    <li class="list-group-item"><span class="text-muted">Job Title / Designation:</span> &nbsp;<?php echo $value->title; ?></li>
                                                                    <li class="list-group-item"><span class="text-muted">Current ERP Infrastructure:</span> &nbsp;<?php echo $value->erp_system; ?></li>
                                                                    <li class="list-group-item"><span class="text-muted">User Expectations:</span> <br><p class="mt-2 fw-normal text-secondary"><?php echo $value->expectation; ?></p></li>
                                                                    <li class="list-group-item"><span class="text-muted">Submission Timestamp:</span> &nbsp;<?php echo $value->create_date; ?></li>
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="8" class="text-center text-muted p-4">No registration entries found.</td>
                                            </tr>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-sm-6 text-start">
                                    <ul class="pagination mb-0">
                                        <?php if (isset($pager) && $pager):?>    
                                            <?= $pager->makeLinks($page ?? 1, $perPage ?? 10, $total ?? 0) ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="col-sm-6 text-end align-self-center text-muted">
                                    Showing <?php echo ($offset ?? 0) + 1; ?> to <?php echo min(($offset ?? 0) + ($perPage ?? 10), $total ?? 0); ?> of <?php echo $total ?? 0; ?> (<?php echo $pages ?? 1; ?> Pages)
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->endSection(); ?>