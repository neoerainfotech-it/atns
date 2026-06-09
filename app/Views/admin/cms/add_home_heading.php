<?php 
$this->extend('layouts/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>

<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="float-end">
                <button type="submit" form="form-user" data-bs-toggle="tooltip" title="Save All Settings" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save Settings</button>
                <a href="<?php echo base_url('admin/home_heading');?>" data-bs-toggle="tooltip" title="Back" class="btn btn-light"><i class="fa-solid fa-reply"></i></a>
            </div>
            <h1><?php echo $page_title ?? 'Home Layout Configuration'; ?></h1>
            <ol class="breadcrumb"></ol>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="card">
            <div class="card-header"><i class="fa-solid fa-pencil"></i> Edit Corporate Homepage Portal Configurations</div>
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

                <form action="<?php echo $form_action; ?>" method="post" enctype="multipart/form-data" id="form-user" class="form-horizontal">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a href="#tab-general" data-bs-toggle="tab" class="nav-link active">General Sections</a></li>
                        <li class="nav-item"><a href="#tab-carousel" data-bs-toggle="tab" class="nav-link text-primary fw-bold"><i class="fa-solid fa-images"></i> Hero Slideshow Carousel</a></li>
                        <li class="nav-item"><a href="#tab-seo" data-bs-toggle="tab" class="nav-link">SEO Meta Settings</a></li>
                        <li class="nav-item"><a href="#tab-feature" data-bs-toggle="tab" class="nav-link text-success fw-bold"><i class="fa-solid fa-chart-line"></i> Our Vision Matrix</a></li>
                    </ul>

                    <div class="tab-content pt-3">
                        <div id="tab-general" class="tab-pane active">
                            <fieldset>
                                <legend>Static Layout Section Overrides</legend>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Fallback Hero Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" value="<?php echo set_value('title', $title ?? ''); ?>" placeholder="Fallback main title headline" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Fallback Hero Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" class="form-control" rows="3"><?php echo set_value('description', $description ?? ''); ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Microsoft Partner Badge Asset</label>
                                    <div class="col-sm-10">
                                        <?php if (!empty($image1)): ?>
                                            <div class="mb-2 p-2 border rounded bg-light d-inline-block">
                                                <img src="<?php echo base_url($image1) ?>" width="100" height="50" style="object-fit: contain;" alt="Microsoft Ecosystem Logo">
                                            </div>
                                        <?php endif ?>
                                        <input type="file" name="image1" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Default Global Solution Link URL</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="link" value="<?php echo set_value('link', $link ?? ''); ?>" class="form-control" />
                                    </div>
                                </div>
                                
                                <legend>Our Services Section</legend>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Services Block Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="solutionTitle" value="<?php echo set_value('solutionTitle', $solutionTitle ?? ''); ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Services Block Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="solutionDescription" class="form-control" rows="2"><?php echo set_value('solutionDescription', $solutionDescription ?? ''); ?></textarea>
                                    </div>
                                </div>

                                <legend>Our Products Section</legend>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Products Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="customerTitle" value="<?php echo set_value('customerTitle', $customerTitle ?? ''); ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Products Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="cultureDescription" class="form-control" rows="2"><?php echo set_value('cultureDescription', $cultureDescription ?? ''); ?></textarea>
                                    </div>
                                </div>

                                <legend>Customer Success Stories</legend>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Success Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="successTitle" value="<?php echo set_value('successTitle', $successTitle ?? ''); ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Success Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="successDescription" class="form-control" rows="2"><?php echo set_value('successDescription', $successDescription ?? ''); ?></textarea>
                                    </div>
                                </div>

                                <legend>Industries Matrix Section</legend>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Industries Block Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="whyTitle" value="<?php echo set_value('whyTitle', $whyTitle ?? ''); ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Industries Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="partnerTitle" class="form-control" rows="2"><?php echo set_value('partnerTitle', $partnerTitle ?? ''); ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Success Module Visual Graphic</label>
                                    <div class="col-sm-10">
                                        <?php if (!empty($successImage)): ?>
                                            <div class="mb-2 p-2 border rounded bg-light d-inline-block">
                                                <img src="<?php echo base_url($successImage) ?>" width="60" height="60" style="object-fit: cover;" alt="Success block view">
                                            </div>
                                        <?php endif ?>
                                        <input type="file" name="successImage" class="form-control" />
                                    </div>
                                </div>

                                <legend>Our Vision Statement Headings</legend>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Vision Module Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="blogTitle" value="<?php echo set_value('blogTitle', $blogTitle ?? ''); ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Vision Narrative Body</label>
                                    <div class="col-sm-10">
                                        <textarea name="visionDescription" class="form-control ckeditor" rows="4"><?php echo set_value('visionDescription', $visionDescription ?? ''); ?></textarea>
                                    </div>
                                </div>

                                <legend>Work With Us / Careers CTA</legend>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Careers Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="workTitle" value="<?php echo set_value('workTitle', $workTitle ?? ''); ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Careers Paragraph Summary</label>
                                    <div class="col-sm-10">
                                        <textarea name="workDescription" class="form-control" rows="2"><?php echo set_value('workDescription', $workDescription ?? ''); ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Careers Module Showcase Graphic</label>
                                    <div class="col-sm-10">
                                        <?php if (!empty($workImage)): ?>
                                            <div class="mb-2 p-2 border rounded bg-light d-inline-block">
                                                <img src="<?php echo base_url($workImage) ?>" width="90" height="50" style="object-fit: cover;" alt="work block background">
                                            </div>
                                        <?php endif ?>
                                        <input type="file" name="workImage" class="form-control" />
                                    </div>
                                </div>

                                <legend>In The News Module Framework</legend>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">News Panel Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="newsTitle" value="<?php echo set_value('newsTitle', $newsTitle ?? ''); ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">News Panel Description Brief</label>
                                    <div class="col-sm-10">
                                        <textarea name="newsDescription" class="form-control" rows="2"><?php echo set_value('newsDescription', $newsDescription ?? ''); ?></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="keyTitle" value="<?php echo $keyTitle ?? ''; ?>" />
                            </fieldset>
                        </div>

                        <div id="tab-carousel" class="tab-pane">
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                <h5 class="text-primary m-0"><i class="fa-solid fa-layer-group"></i> Active Homepage Carousel Slide Layers</h5>
                                <button type="button" onclick="addCarouselRow();" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add New Slide Frame</button>
                            </div>
                            
                            <div class="table-responsive">
                                <table id="carousel-table" class="table table-bordered table-striped table-hover align-middle">
                                    <thead class="table-dark">
                                        <tr>
                                            <td style="width: 220px;">Banner Image Asset</td>
                                            <td>Slide Headline Title Text Mapping</td>
                                            <td>Slide Paragraph Content Summary</td>
                                            <td style="width: 180px;">Custom Target Link URL</td>
                                            <td style="width: 100px;">Sort Order</td>
                                            <td style="width: 60px;" class="text-center">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($sliders)): ?>
                                            <?php foreach ($sliders as $slide): ?>
                                                <tr id="carousel-row-<?php echo $slide->id; ?>">
                                                    <td>
                                                        <input type="hidden" name="slide_id[]" value="<?php echo $slide->id; ?>" />
                                                        <?php if (!empty($slide->image)): ?>
                                                            <div class="mb-2 p-1 border bg-white rounded d-inline-block">
                                                                <img src="<?php echo base_url($slide->image); ?>" style="width: 180px; height: 90px; object-fit: cover;" alt="Rotator Frame Preview">
                                                            </div>
                                                        <?php endif; ?>
                                                        <input type="file" name="slide_image_<?php echo $slide->id; ?>" class="form-control form-control-sm" />
                                                    </td>
                                                    <td>
                                                        <input type="text" name="slide_title[]" value="<?php echo esc($slide->title); ?>" class="form-control form-control-sm" required />
                                                    </td>
                                                    <td>
                                                        <textarea name="slide_description[]" rows="3" class="form-control form-control-sm"><?php echo esc($slide->description); ?></textarea>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="slide_link[]" value="<?php echo esc($slide->link); ?>" class="form-control form-control-sm" />
                                                    </td>
                                                    <td>
                                                        <input type="number" name="slide_sort_order[]" value="<?php echo (int)$slide->sort_order; ?>" class="form-control form-control-sm" />
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" onclick="$('#carousel-row-<?php echo $slide->id; ?>').remove();" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="tab-seo" class="tab-pane">
                            <fieldset>
                                <legend>Search Engine Optimization (SEO) Context Definitions</legend>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Meta Browser Title Tag</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="meta_title" value="<?php echo set_value('meta_title', $meta_title ?? ''); ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Meta Search Engine Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="meta_description" class="form-control" rows="4"><?php echo set_value('meta_description', $meta_description ?? ''); ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Meta Targeting Index Keywords</label>
                                    <div class="col-sm-10">
                                        <textarea name="meta_keyword" class="form-control" rows="3"><?php echo set_value('meta_keyword', $meta_keyword ?? ''); ?></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div id="tab-feature" class="tab-pane">
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                <h5 class="text-success m-0"><i class="fa-solid fa-chart-bar"></i> Dynamic Vision Counter Parameters</h5>
                                <button type="button" onclick="addVisionRow();" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Add New Counter Metric</button>
                            </div>

                            <div class="table-responsive">
                                <table id="vision-matrix-table" class="table table-bordered table-striped table-hover align-middle">
                                    <thead class="table-dark">
                                        <tr>
                                            <td>Metric Metric Value Target (e.g., 250)</td>
                                            <td>Strategic Summary Description</td>
                                            <td style="width: 140px;">Symbol Offset (e.g., +)</td>
                                            <td style="width: 120px;">Sort Order</td>
                                            <td style="width: 60px;" class="text-center">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($featureList)): foreach ($featureList as $fRow): ?>
                                            <tr id="vision-row-<?php echo $fRow->id; ?>">
                                                <td>
                                                    <input type="hidden" name="feature_id[]" value="<?php echo $fRow->id; ?>" />
                                                    <input type="text" name="featureTitle[]" value="<?php echo esc($fRow->title); ?>" class="form-control form-control-sm" required />
                                                </td>
                                                <td>
                                                    <textarea name="featureValue[]" rows="2" class="form-control form-control-sm" required><?php echo esc($fRow->description); ?></textarea>
                                                </td>
                                                <td>
                                                    <input type="text" name="featureSymbol[]" value="<?php echo esc($fRow->symbol); ?>" class="form-control form-control-sm" />
                                                </td>
                                                <td>
                                                    <input type="number" name="feature_sort_order[]" value="<?php echo (int)$fRow->sort_order; ?>" class="form-control form-control-sm" />
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" onclick="$('#vision-row-<?php echo $fRow->id; ?>').remove();" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach; endif; ?>
                                    </tbody>
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
    var carouselIndex = 0;
    function addCarouselRow() {
        // FIXED: Renamed input keys to match uniform input structure expected by backend controllers
        let html = `
        <tr id="new-carousel-row-${carouselIndex}">
            <td>
                <input type="hidden" name="slide_id[]" value="" />
                <input type="file" name="slide_image_new[]" class="form-control form-control-sm" required />
            </td>
            <td>
                <input type="text" name="slide_title[]" placeholder="Enter headline title" class="form-control form-control-sm" required />
            </td>
            <td>
                <textarea name="slide_description[]" rows="3" placeholder="Enter banner summary..." class="form-control form-control-sm"></textarea>
            </td>
            <td>
                <input type="text" name="slide_link[]" placeholder="e.g., service/analytics" class="form-control form-control-sm" />
            </td>
            <td>
                <input type="number" name="slide_sort_order[]" value="0" class="form-control form-control-sm" />
            </td>
            <td class="text-center">
                <button type="button" onclick="$('#new-carousel-row-${carouselIndex}').remove();" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button>
            </td>
        </tr>`;
        
        $('#carousel-table tbody').append(html);
        carouselIndex++;
    }

    var visionIndex = 0;
    function addVisionRow() {
        let html = `
        <tr id="new-vision-row-${visionIndex}">
            <td>
                <input type="hidden" name="feature_id[]" value="" />
                <input type="text" name="featureTitle[]" placeholder="e.g., 20" class="form-control form-control-sm" required />
            </td>
            <td>
                <textarea name="featureValue[]" rows="2" placeholder="Enter counter summary..." class="form-control form-control-sm" required></textarea>
            </td>
            <td>
                <input type="text" name="featureSymbol[]" placeholder="+" class="form-control form-control-sm" />
            </td>
            <td>
                <input type="number" name="feature_sort_order[]" value="0" class="form-control form-control-sm" />
            </td>
            <td class="text-center">
                <button type="button" onclick="$('#new-vision-row-${visionIndex}').remove();" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button>
            </td>
        </tr>`;

        $('#vision-matrix-table tbody').append(html);
        visionIndex++;
    }
</script>

<?php $this->endSection(); ?>