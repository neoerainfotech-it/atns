<?php 
$this->extend('layouts/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>

<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="float-end">
                <button type="submit" form="form-user" data-bs-toggle="tooltip" title="Save Changes" class="btn btn-primary">
                    <i class="fa-solid fa-floppy-disk"></i> Save
                </button>
                <a href="<?php echo base_url('admin/webinars'); ?>" data-bs-toggle="tooltip" title="Back to List" class="btn btn-light">
                    <i class="fa-solid fa-reply"></i> Cancel
                </a>
            </div>
            <h1><?php echo $page_title ?? 'Edit Webinar'; ?></h1>
            <ol class="breadcrumb"></ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <i class="fa-solid fa-pencil"></i> <?php echo $page_title ?? 'Edit Webinar Configuration'; ?>
            </div>
            <div class="card-body">

                <?php if ($success = session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?php echo $success; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>

                <?php if ($error = session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?php echo $error; ?></strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>

                <form action="<?php echo $form_action ?? ''; ?>" method="post" enctype="multipart/form-data" id="form-user" class="form-horizontal">
                    
                    <ul class="nav nav-tabs mb-4">
                        <li class="nav-item"><a href="#tab-general" data-bs-toggle="tab" class="nav-link active">General Info</a></li>
                        <li class="nav-item"><a href="#tab-authorize" data-bs-toggle="tab" class="nav-link">Media & Schedule</a></li>
                        <li class="nav-item"><a href="#tab-coustomer" data-bs-toggle="tab" class="nav-link">Relations & Specs</a></li>
                    </ul>

                    <div class="tab-content">
                        
                        <div id="tab-general" class="tab-pane active">
                            <fieldset>
                                <div class="row mb-3 required">
                                    <label class="col-sm-2 col-form-label">Webinar Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" value="<?php echo set_value('title', $title ?? ''); ?>" placeholder="Enter webinar title" class="form-control" />
                                        <?php echo $validation->hasError('title') ? $validation->showError('title', 'my_single') : ''; ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Short Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="shortDescription" class="form-control" rows="4" placeholder="Brief summary..."><?php echo set_value('shortDescription', $shortDescription ?? ''); ?></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Detailed Overview</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" class="form-control ckeditor" id="editor" rows="6"><?php echo set_value('description', $description ?? ''); ?></textarea>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <div class="row mb-3 required">
                                    <label class="col-sm-2 col-form-label">Meta Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="metaTitle" value="<?php echo set_value('metaTitle', $metaTitle ?? ''); ?>" class="form-control" placeholder="SEO Page Title" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Meta Keywords</label>
                                    <div class="col-sm-10">
                                        <textarea name="metaKeyword" class="form-control" rows="3" placeholder="Keywords separated by commas..."><?php echo set_value('metaKeyword', $metaKeyword ?? ''); ?></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Meta Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="metaDescription" class="form-control" rows="3" placeholder="SEO Snippet Description..."><?php echo set_value('metaDescription', $metaDescription ?? ''); ?></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div id="tab-authorize" class="tab-pane">
                            <fieldset>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Category Group</label>
                                    <div class="col-sm-10">       
                                        <select name="category" class="form-control">
                                            <option value="">Select Category</option>
                                            <?php if (isset($blogCategoryList)): foreach ($blogCategoryList as $value): ?>
                                                <option value="<?php echo $value->id; ?>" <?php echo (isset($category) && $category == $value->id) ? 'selected' : ''; ?>><?php echo $value->name; ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Event Type</label>
                                    <div class="col-sm-10">       
                                        <select name="type" class="form-control">
                                            <option value="">Select Type</option>
                                            <?php if (isset($typeList)): foreach ($typeList as $key => $value): ?>
                                                <option value="<?php echo $key; ?>" <?php echo (isset($type) && $type == $key) ? 'selected' : ''; ?>><?php echo $value; ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Display Banner</label>
                                    <div class="col-sm-10">       
                                        <?php if (!empty($image)): $ext = pathinfo($image, PATHINFO_EXTENSION); ?>
                                            <div class="mb-2">
                                                <?php if ($ext == 'mp4'): ?>
                                                    <video width="200" height="130" controls><source src="<?php echo base_url($image); ?>" type="video/mp4"></video>
                                                <?php else: ?>
                                                    <img src="<?php echo base_url($image); ?>" width="120" height="90" class="img-thumbnail" alt="Current Banner">
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                        <input type="file" name="image" class="form-control" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Grid Thumbnail</label>
                                    <div class="col-sm-10">       
                                        <?php if (!empty($thumbnail)): $ext = pathinfo($thumbnail, PATHINFO_EXTENSION); ?>
                                            <div class="mb-2">
                                                <?php if ($ext == 'mp4'): ?>
                                                    <video muted autoplay loop playsinline width="150" height="110"><source src="<?php echo base_url($thumbnail); ?>" type="video/mp4"></video>
                                                <?php else: ?>
                                                    <img src="<?php echo base_url($thumbnail); ?>" width="100" height="100" class="img-thumbnail" alt="Current Thumbnail">
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                        <input type="file" name="thumbnail" class="form-control" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Presentation / Brochure Attachment</label>
                                    <div class="col-sm-10">       
                                        <?php if (!empty($whitepaper_download)): ?>
                                            <div class="mb-2">
                                                <a href="<?php echo base_url($whitepaper_download); ?>" target="_blank" class="btn btn-sm btn-outline-danger"><i class="fa fa-file-pdf fa-lg"></i> View Current PDF File</a>
                                            </div>
                                        <?php endif; ?>
                                        <input type="file" name="whitepaper_download" class="form-control" />
                                    </div>
                                </div>

                                <hr class="my-4">

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Event Schedules & Flags</label>
                                    <div class="col-sm-10 d-flex gap-4 align-items-center">       
                                        <div>
                                            <input type="checkbox" name="feature" value="1" id="feature" class="form-check-input" <?php echo (isset($feature) && $feature == 1) ? 'checked' : ''; ?> />
                                            <label for="feature" class="form-check-label ms-1">Featured Event</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="upcoming" value="1" id="upcoming" class="form-check-input" <?php echo (isset($upcoming) && $upcoming == 1) ? 'checked' : ''; ?> />
                                            <label for="upcoming" class="form-check-label ms-1">Upcoming Milestone</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Broadcast Location / Zone</label>
                                    <div class="col-sm-10">       
                                        <input type="text" name="location" value="<?php echo set_value('location', $location ?? ''); ?>" class="form-control" placeholder="e.g. Remote / MS Teams / Zoom" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Webinar Gateway Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="link" value="<?php echo set_value('link', $link ?? ''); ?>" placeholder="https://..." class="form-control" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Publish Internal Date</label>
                                    <div class="col-sm-10">       
                                        <input type="date" name="publish" value="<?php echo set_value('publish', $publish ?? ''); ?>" class="form-control" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Upcoming Descriptive Date</label>
                                    <div class="col-sm-10">       
                                        <input type="text" name="upcomingDate" value="<?php echo set_value('upcomingDate', $upcomingDate ?? ''); ?>" class="form-control" placeholder="e.g. Monday, 25th June" />
                                    </div>
                                </div>
                                 
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Event Stream Time</label>
                                    <div class="col-sm-10">       
                                        <input type="time" name="eventTime" value="<?php echo set_value('eventTime', $eventTime ?? ''); ?>" class="form-control" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">URL Slug (Optional)</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="slug" value="<?php echo set_value('slug', $slug ?? ''); ?>" placeholder="auto-generated-if-blank" class="form-control" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Status Flag</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch form-switch-lg">
                                            <input type="hidden" name="status" value="0" />
                                            <input type="checkbox" name="status" value="1" id="input-status" class="form-check-input" <?php echo (isset($status) && $status == 1) ? 'checked' : ''; ?> />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div id="tab-coustomer" class="tab-pane">
                            <fieldset>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Mapped Product</label>
                                    <div class="col-sm-10">       
                                        <select name="product" class="form-control">
                                            <option value="">Select Core Product Mapping</option>
                                            <?php if (isset($productList)): foreach ($productList as $value): ?>
                                                <option value="<?php echo $value->id; ?>" <?php echo (isset($product) && $product == $value->id) ? 'selected' : ''; ?>><?php echo $value->name; ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Mapped Service</label>
                                    <div class="col-sm-10">       
                                        <select name="service" class="form-control">
                                            <option value="">Select Core Service Mapping</option>
                                            <?php if (isset($serviceList)): foreach ($serviceList as $value): ?>
                                                <option value="<?php echo $value->id; ?>" <?php echo (isset($service) && $service == $value->id) ? 'selected' : ''; ?>><?php echo $value->name; ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Target Industry Domain</label>
                                    <div class="col-sm-10">       
                                        <select name="industry" class="form-control">
                                            <option value="">Select Target Industry Domain</option>
                                            <?php if (isset($industryList)): foreach ($industryList as $value): ?>
                                                <option value="<?php echo $value->id; ?>" <?php echo (isset($industry) && $industry == $value->id) ? 'selected' : ''; ?>><?php echo $value->name; ?></option>
                                            <?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>
                                    
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Industry Challenges Solved</label>
                                    <div class="col-sm-10">
                                        <textarea name="challenge" class="form-control ckeditor" id="editor1" rows="5"><?php echo set_value('challenge', $challenge ?? ''); ?></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Proposed Resolution Strategy</label>
                                    <div class="col-sm-10">
                                        <textarea name="solution" class="form-control ckeditor" id="editor2" rows="5"><?php echo set_value('solution', $solution ?? ''); ?></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Expected Core Benefits</label>
                                    <div class="col-sm-10">
                                        <textarea name="benefit" class="form-control ckeditor" id="editor3" rows="5"><?php echo set_value('benefit', $benefit ?? ''); ?></textarea>
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