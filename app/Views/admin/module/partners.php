<?php 
$this->extend('layouts/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 

// =================================================================
// DIRECT DATABASE FETCH BYPASS (Forces data to show up instantly)
// =================================================================
$db = \Config\Database::connect();
$enquiries = $db->table('cyb_partners')
                ->where('email !=', '')
                ->orderBy('id', 'DESC')
                ->get()
                ->getResult();
// =================================================================
?>

    <div id="content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="float-end">
                    <a href="<?php echo base_url('admin/add_partner'); ?>" data-bs-toggle="tooltip" title="Add New Partner" class="btn btn-primary shadow-sm">
                        <i class="fa-solid fa-plus me-1"></i> Add New Profile
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
            <?php if ($success = session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    <strong><i class="fa-solid fa-circle-check me-2"></i><?php echo $success; ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <?php if ($error = session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                    <strong><i class="fa-solid fa-circle-xmark me-2"></i><?php echo $error; ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <div class="card shadow-sm border-0 rounded-3 mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <i class="fa-solid fa-list text-primary me-2"></i> <strong>Ecosystem Active Directory Profiles</strong>
                </div>
                
                <div class="card-body">
                    <?php echo form_open('admin/delete_partner', 'id="form-partner-list"'); ?> 
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered table-hover align-middle mb-0">
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
                                                    <span class="badge bg-primary bg-opacity-10 text-primary small mt-1"><?php echo htmlspecialchars(($value->type ?? 'product') . ' - ' . ($value->tag_name ?? 'No Tag')); ?></span>
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
                                        <?php if (isset($pager) && $pager): ?>    
                                            <?= $pager->makeLinks($page, $perPage, $total) ?>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-sm-6 text-center text-sm-end small text-muted font-monospace">
                                Showing <?php echo isset($offset) ? $offset + 1 : 1; ?> to <?php echo isset($perPage) ? min($offset + $perPage, $total) : 1; ?> of <?php echo isset($total) ? $total : 0; ?> (<?php echo isset($pages) ? $pages : 1; ?> Pages)
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-dark text-white border-bottom py-3 d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fa-solid fa-envelope-open-text text-warning me-2"></i> 
                        <strong>Incoming Partnership Enquiries Ledger</strong>
                    </div>
                    <button type="button" class="btn btn-sm btn-danger shadow-sm" onclick="confirm('Are you certain you want to delete selected lead submissions?') ? $('#form-enquiry-list').submit() : false;">
                        <i class="fa-solid fa-trash-can me-1"></i> Delete Selected Leads
                    </button>
                </div>
                
                <div class="card-body">
                    <?php echo form_open('admin/delete_enquiry', 'id="form-enquiry-list"'); ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <td style="width: 1px;" class="text-center">
                                            <input type="checkbox" class="form-check-input" onclick="$('input[name*=\'enq_selected\']').prop('checked', this.checked);" />
                                        </td>
                                        <td class="text-start fw-semibold" style="width: 60px;">#</td>
                                        <td class="text-start fw-semibold">Lead Identity &amp; Title</td>
                                        <td class="text-start fw-semibold">Organization / Company</td>
                                        <td class="text-start fw-semibold">Contact Channels</td>
                                        <td class="text-start fw-semibold" style="width: 180px;">Received Date</td>
                                        <td class="text-center fw-semibold" style="width: 120px;">Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($enquiries)): ?>
                                        <?php foreach ($enquiries as $idx => $enq): ?>
                                            <tr>
                                                <td class="text-center">
                                                    <input type="checkbox" class="form-check-input" name="enq_selected[]" value="<?php echo $enq->id; ?>" />
                                                </td>
                                                <td class="text-start text-muted font-monospace"><?php echo $idx + 1; ?></td>
                                                <td class="text-start">
                                                    <div class="fw-bold text-dark"><?php echo htmlspecialchars($enq->name); ?></div>
                                                    <small class="text-muted"><i class="fa-solid fa-briefcase me-1 text-secondary"></i><?php echo htmlspecialchars($enq->title); ?></small>
                                                </td>
                                                <td class="text-start fw-medium text-secondary">
                                                    <i class="fa-solid fa-building me-2 text-muted"></i><?php echo htmlspecialchars($enq->company_name); ?>
                                                </td>
                                                <td class="text-start">
                                                    <div class="small mb-1">
                                                        <i class="fa-solid fa-envelope me-1 text-muted"></i>
                                                        <a href="mailto:<?php echo esc($enq->email); ?>" class="text-decoration-none"><?php echo htmlspecialchars($enq->email); ?></a>
                                                    </div>
                                                    <div class="small text-muted">
                                                        <i class="fa-solid fa-phone me-1 text-muted"></i>
                                                        <a href="tel:<?php echo esc($enq->phone); ?>" class="text-decoration-none text-secondary"><?php echo htmlspecialchars($enq->phone); ?></a>
                                                    </div>
                                                </td>
                                                <td class="text-start text-muted small font-monospace">
                                                    <i class="fa-solid fa-calendar-day me-1"></i>
                                                    <?php echo !empty($enq->create_date) ? date('Y-m-d h:i A', strtotime($enq->create_date)) : 'N/A'; ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="mailto:<?php echo esc($enq->email); ?>?subject=Partnership Discovery Request Inquiry Response" class="btn btn-sm btn-primary">
                                                        <i class="fa-solid fa-reply me-1"></i> Reply
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center py-5 text-muted">
                                                <i class="fa-solid fa-envelope-open d-block fs-1 mb-2 text-muted"></i>
                                                No modern partnership enquiries recorded from the front-end interface form yet.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <?php $this->endSection(); ?>