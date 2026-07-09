<?php 
$this->extend('layouts/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 

// =================================================================
// DIRECT VIEW DATABASE FETCH BYPASS ENGINE (Guarantees Data Loads)
// =================================================================
$db = \Config\Database::connect();

// 1. Automatically grab the Event ID number from the end of your browser URL
$uri = service('uri');
$segments = $uri->getSegments();
$event_id = end($segments); // Captures the numeric ID from admin/webinar-leads/ID

// 2. Grab the specific event row information to display the title name dynamically
$eventInfo = $db->table('cyb_blogs')->where('id', $event_id)->get()->getRow();
$page_title = $eventInfo ? 'Leads for: ' . $eventInfo->title : 'Webinar Registrations Ledger';

// 3. Build the backend filter request targeting only this Event ID
$builder = $db->table('cyb_webinar_registration')->where('event_id', $event_id);

// Catch sidebar text filter inputs if submitted
$searchName = isset($_GET['name']) ? trim($_GET['name']) : '';
if (!empty($searchName)) {
    $builder->like('name', $searchName);
}

// 4. Manual Pagination Pipeline processing (Prevents layout view breaks)
$allLeads = $builder->orderBy('id', 'DESC')->get()->getResult();
$total    = count($allLeads);
$perPage  = 10;
$page     = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset   = ($page - 1) * $perPage;

// Slice the array rows cleanly to show exactly 10 lines per pagination group
$detail   = array_slice($allLeads, $offset, $perPage);
$pages    = ceil($total / $perPage);
$pager    = \Config\Services::pager();
// =================================================================
?>

<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="float-end">
                <a href="<?php echo base_url('admin/webinar-events'); ?>" class="btn btn-light border shadow-sm">
                    <i class="fa-solid fa-arrow-left me-1"></i> Back to Events
                </a>&nbsp;
                <button type="button" data-bs-toggle="tooltip" title="Export Selected to Excel" class="btn btn-success shadow-sm" onclick="var form = $('#form-user'); var oldAction = form.attr('action'); var searchVal = $('input[name=\'name\']').val(); var exportUrl = '<?php echo base_url('admin/export_webinar_registration'); ?>'; if(searchVal){ exportUrl += '?name=' + encodeURIComponent(searchVal); } form.attr('action', exportUrl).attr('target', '_blank').submit(); form.attr('action', oldAction).removeAttr('target');">
                    <i class="fa-solid fa-file-excel"></i> Export Excel
                </button>&nbsp;
                <button type="button" class="btn btn-danger shadow-sm" onclick="confirm('Are you sure you want to delete selected entries?') ? $('#form-user').attr('action', '<?php echo base_url('admin/delete_webinar_registration'); ?>').submit() : false;">
                    <i class="fa fa-trash"></i> Delete Selected
                </button>
            </div>
            <h1><?php echo $page_title; ?></h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
               <li class="breadcrumb-item"><a href="<?php echo base_url('admin/webinar-events'); ?>">Webinar Management</a></li>
               <li class="breadcrumb-item active">Registrations Ledger</li>
            </ol>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div id="filter-product" class="col-lg-3 col-md-12 order-lg-last mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white fw-bold"><i class="fa-solid fa-magnifying-glass text-primary me-1"></i> Search Attendee</div>
                    <div class="card-body">
                        <form action="<?php echo base_url('admin/webinar-leads/' . $event_id) ?>" method="get">
                            <div class="mb-3">
                                <label class="form-label small text-muted fw-bold text-uppercase">Attendee Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($searchName); ?>" placeholder="Type name to search...">
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-info btn-sm text-dark fw-bold"><i class="fa-solid fa-filter"></i> Filter</button>&nbsp;
                                <a href="<?php echo base_url('admin/webinar-leads/' . $event_id); ?>" class="btn btn-light btn-sm border"><i class="fa-solid fa-rotate-left"></i> Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col col-lg-9 col-md-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white fw-bold py-3"><i class="fa-solid fa-users text-primary me-1"></i> Isolated Event Registrations Ledger</div>
                    <div id="user" class="card-body">
                        <?php echo form_open('admin/delete_webinar_registration', 'id="form-user"'); ?> 
                            
                            <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <td style="width: 1px;" class="text-start"><input type="checkbox" class="form-check-input" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                                            <td style="width: 50px;">#</td>
                                            <th>Attendee Name</th>
                                            <th>Email Channel Address</th>
                                            <th>Phone Number</th>
                                            <th>Company Corporate Entity</th>
                                            <th>ERP System</th>
                                            <td style="width: 70px;" class="text-center">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($detail)): ?>
                                            <?php foreach ($detail as $key => $value) { ?>
                                                <tr>
                                                    <td class="text-start"><input type="checkbox" class="form-check-input" name="selected[]" value="<?php echo $value->id; ?>" /></td>
                                                    <td class="text-muted font-monospace small"><?php echo $offset + $key + 1; ?></td>
                                                    <td class="fw-bold text-dark"><?php echo htmlspecialchars($value->name); ?></td>
                                                    <td class="small"><a href="mailto:<?php echo esc($value->email); ?>"><?php echo htmlspecialchars($value->email); ?></a></td>
                                                    <td class="font-monospace text-secondary small"><?php echo htmlspecialchars($value->phone); ?></td>
                                                    <td class="text-muted fw-medium"><?php echo htmlspecialchars($value->company_name); ?></td>
                                                    <td><span class="badge bg-info text-dark font-monospace"><?php echo htmlspecialchars($value->erp_system); ?></span></td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $value->id;?>">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="staticBackdrop<?php echo $value->id;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content border-0 shadow">
                                                            <div class="modal-header bg-light border-bottom">
                                                                <h1 class="modal-title fs-5 fw-bold text-dark"><i class="fa-solid fa-address-card text-primary me-2"></i>Registration Lead Profile Details</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body py-4">
                                                                <ul class="list-group list-group-flush border rounded">
                                                                    <li class="list-group-item bg-light text-primary"><span class="text-muted fw-normal">Target Event Title Context:</span> &nbsp;<strong><?php echo htmlspecialchars($value->event_title ?? 'Active Context Webinar'); ?></strong></li>
                                                                    <li class="list-group-item"><span class="text-muted fw-normal">Full Name:</span> &nbsp;<?php echo htmlspecialchars($value->name); ?></li>
                                                                    <li class="list-group-item"><span class="text-muted fw-normal">Email Address Channel:</span> &nbsp;<?php echo htmlspecialchars($value->email); ?></li>
                                                                    <li class="list-group-item"><span class="text-muted fw-normal">Phone Number Instance:</span> &nbsp;<?php echo htmlspecialchars($value->phone); ?></li>
                                                                    <li class="list-group-item"><span class="text-muted fw-normal">Registered Corporate Entity:</span> &nbsp;<?php echo htmlspecialchars($value->company_name); ?></li>
                                                                    <li class="list-group-item"><span class="text-muted fw-normal">Job Title / Designation:</span> &nbsp;<?php echo htmlspecialchars($value->title ?? 'Not Provided'); ?></li>
                                                                    <li class="list-group-item"><span class="text-muted fw-normal">Current Enterprise ERP Architecture:</span> &nbsp;<span class="badge bg-info text-dark font-monospace"><?php echo htmlspecialchars($value->erp_system); ?></span></li>
                                                                    <li class="list-group-item py-3"><span class="text-muted fw-normal">User Expectations Summary Notes:</span> <br><p class="mt-2 fw-normal text-secondary bg-light p-3 rounded border"><?php echo htmlspecialchars($value->expectation); ?></p></li>
                                                                    <li class="list-group-item font-monospace small"><span class="text-muted fw-normal">Submission Pipeline Timestamp:</span> &nbsp;<?php echo htmlspecialchars($value->create_date); ?></li>
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer bg-light border-top">
                                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close Profile</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="8" class="text-center text-muted p-5 bg-light">
                                                    <i class="fa-solid fa-user-slash d-block fs-1 mb-2 text-black-50"></i>
                                                    No corporate registration entries found recorded for this specific event yet.
                                                </td>
                                            </tr>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-sm-6 text-start">
                                    <ul class="pagination mb-0">
                                        <?php if (isset($pager) && $pager && $pages > 1):?>    
                                            <?= $pager->makeLinks($page, $perPage, $total) ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="col-sm-6 text-end align-self-center text-muted small font-monospace">
                                    Showing <?php echo $total > 0 ? $offset + 1 : 0; ?> to <?php echo min($offset + $perPage, $total); ?> of <?php echo $total; ?> (<?php echo $pages; ?> Pages)
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>