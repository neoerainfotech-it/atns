<?php 
$this->extend('layouts/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>

<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="float-end">
                <a href="<?php echo base_url('admin/add_partner'); ?>" data-bs-toggle="tooltip" title="Add New Partner" class="btn btn-primary shadow-sm">
                    <i class="fa-solid fa-plus me-1"></i> Add New
                </a>
                <button type="button" data-bs-toggle="tooltip" title="Delete Selected" class="btn btn-danger shadow-sm" onclick="confirm('Are you certain you want to purge the selected profiles?') ? $('#form-partner-list').submit() : false;">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
            <h1><?php echo $page_title; ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $page_title; ?></li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card shadow-sm border-0 rounded-3">
            
            <?php if ($success = session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                    <strong><i class="fa-solid fa-circle-check me-2"></i><?php echo $success; ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <?php if ($error = session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                    <strong><i class="fa-solid fa-circle-xmark me-2"></i><?php echo $error; ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <div class="card-header bg-white border-bottom py-3">
                <i class="fa-solid fa-list text-primary me-2"></i> <strong>Ecosystem Active Directory Profiles</strong>
            </div>
            
            <div class="card-body">
                <?php echo form_open('admin/delete_partner', 'id="form-partner-list"'); ?> 
                    <div class="table-responsive mb-3">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <td style="width: 1px;" class="text-center">
                                        <input type="checkbox" class="form-check-input" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" />
                                    </td>
                                    <td class="text-start fw-semibold" style="width: 70px;">#</td>
                                    <td class="text-start fw-semibold" style="width: 120px;">Image Canvas</td>
                                    <td class="text-start fw-semibold">Profile Identity &amp; Categories</td>
                                    <td class="text-start fw-semibold" style="width: 130px;">Sort Order</td>
                                    <td class="text-start fw-semibold" style="width: 130px;">Status Matrix</td>
                                    <td class="text-center fw-semibold" style="width: 120px;">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($detail)): ?>
                                    <?php foreach ($detail as $key => $value): ?>
                                        <tr>
                                            <td class="text-center"> 
                                                <input type="checkbox" class="form-check-input" name="selected[]" value="<?php echo $value->id; ?>" />
                                            </td>
                                            <td class="text-start text-muted"><?php echo $key + 1; ?></td>
                                            <td class="text-start">
                                                <div class="p-1 border rounded bg-light d-inline-block">
                                                    <img src="<?php echo $value->image ? base_url($value->image) : base_url($config_logo); ?>" width="50" height="50" class="object-fit-contain img-thumbnail border-0" alt="Branding Instance Identity">
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="fw-bold text-dark"><?php echo htmlspecialchars($value->name ?? 'Unnamed Alliance'); ?></div>
                                                <span class="badge bg-primary bg-opacity-10 text-primary small mt-1"><?php echo htmlspecialchars($value->type . ' - ' . ($value->tag_name ?? 'No Tag')); ?></span>
                                            </td>
                                            <td class="text-start font-monospace"><?php echo $value->sort_order; ?></td>
                                            <td class="text-start">
                                                <?php if ($value->status == 1): ?>
                                                    <span class="badge bg-success"><i class="fa-solid fa-circle-check me-1"></i> Active</span>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary"><i class="fa-solid fa-circle-minus me-1"></i> Disabled</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url('admin/add_partner/' . $value->id); ?>" class="btn btn-sm btn-outline-info text-uppercase fw-semibold tracking-wider">
                                                    <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-muted">
                                            <i class="fa-solid fa-folder-open d-block fs-2 mb-2 text-black-50"></i>
                                            No tracking profile records exist inside this dashboard registry.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="row align-items-center bg-light p-2 rounded border m-0">
                        <div class="col-sm-6 text-start mb-2 mb-sm-0">
                            <nav aria-label="Profiles Navigation Workspace">
                                <ul class="pagination pagination-sm m-0">
                                    <?php if ($pager): ?>    
                                        <?= $pager->makeLinks($page, $perPage, $total) ?>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-sm-6 text-center text-sm-end small text-muted font-monospace">
                            Showing <?php echo $offset + 1; ?> to <?php echo min($offset + $perPage, $total); ?> of <?php echo $total; ?> (<?php echo $pages; ?> Pages)
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>