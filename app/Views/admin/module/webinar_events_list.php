<?php 
$this->extend('layouts/master_admin');
$this->section('page');
?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <h1><?php echo $page_title; ?></h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
               <li class="breadcrumb-item active"><?php echo $page_title; ?></li>
            </ol>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white py-3 fw-bold">
                <i class="fa-solid fa-calendar text-primary me-2"></i> Active Corporate Webinar Events List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 70px;">ID</th>
                                <th>Webinar Event Title Name</th>
                                <th>Schedule Date</th>
                                <th style="width: 180px;" class="text-center">Total Registered Leads</th>
                                <th style="width: 180px;" class="text-center">Action Database</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($events)): ?>
                                <?php foreach ($events as $event): ?>
                                    <tr>
                                        <td class="font-monospace text-muted">#<?php echo $event->id; ?></td>
                                        <td>
                                            <div class="fw-bold text-dark"><?php echo htmlspecialchars($event->title); ?></div>
                                            <small class="text-muted"><i class="fa-solid fa-link me-1"></i>/webinar/<?php echo $event->slug; ?></small>
                                        </td>
                                        <td class="small fw-medium text-secondary">
                                            <i class="fa-solid fa-clock me-1 text-muted"></i>
                                            <?php echo htmlspecialchars($event->upcomingDate ?? 'Live Stream'); ?>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-dark px-3 py-2 fs-6 rounded-pill">
                                                <?php echo $event->total_leads; ?> Leads
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('admin/webinar-leads/' . $event->id); ?>" class="btn btn-primary btn-sm fw-bold shadow-sm">
                                                <i class="fa-solid fa-folder-open me-1"></i> View Registrations
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <i class="fa-solid fa-calendar-xmark d-block fs-1 mb-2 text-black-50"></i>
                                        No webinar records found. Create an event in your CMS panel first.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>