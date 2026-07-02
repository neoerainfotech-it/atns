<?php 
$this->extend('layouts/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>

<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="float-end">
                <button type="submit" form="form-partner-studio" data-bs-toggle="tooltip" title="Save All Grid Data" class="btn btn-primary shadow-sm">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Save Configurations
                </button>
                <a href="<?php echo base_url('admin/partners'); ?>" data-bs-toggle="tooltip" title="Back" class="btn btn-light border">
                    <i class="fa-solid fa-reply"></i>
                </a>
            </div>
            <h1><?php echo $page_title; ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo current_url(); ?>"><?php echo $page_title; ?></a></li>
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
                <i class="fa-solid fa-cubes text-primary me-2"></i> <strong>Ecosystem Core Portal Studio Framework</strong>
            </div>
            
            <div class="card-body">
                <form action="<?php echo base_url($form_action); ?>" method="post" enctype="multipart/form-data" id="form-partner-studio" class="form-horizontal">
                    <?= csrf_field() ?>

                    <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>" />

                    <ul class="nav nav-tabs role-tablist border-bottom mb-4 flex-wrap" id="masterStudioTabs">
                        <li class="nav-item">
                            <a href="#panel-unique" data-bs-toggle="tab" class="nav-link active fw-semibold py-2">
                                <i class="fa-solid fa-handshake text-primary me-2"></i>1. Partner Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#panel-hero" data-bs-toggle="tab" class="nav-link fw-semibold py-2">
                                <i class="fa-solid fa-window-maximize text-secondary me-2"></i>2. Hero Banner
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#panel-redirection" data-bs-toggle="tab" class="nav-link fw-semibold py-2">
                                <i class="fa-solid fa-arrow-up-right-from-square text-success me-2"></i>3. CTAs &amp; Assets
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#panel-alliances" data-bs-toggle="tab" class="nav-link fw-semibold py-2">
                                <i class="fa-solid fa-circle-nodes text-info me-2"></i>4. Alliances Intro
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#panel-techvalue" data-bs-toggle="tab" class="nav-link fw-semibold py-2">
                                <i class="fa-solid fa-chart-line text-warning me-2"></i>5. Partnerships Value
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#panel-cards" data-bs-toggle="tab" class="nav-link fw-semibold py-2">
                                <i class="fa-solid fa-id-card text-danger me-2"></i>6. Core Spec Cards
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#panel-sectors" data-bs-toggle="tab" class="nav-link fw-semibold py-2">
                                <i class="fa-solid fa-chart-gantt text-indigo me-2" style="color:#6f42c1;"></i>7. Sectors Framework
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#panel-pillars" data-bs-toggle="tab" class="nav-link fw-semibold py-2">
                                <i class="fa-solid fa-shield-halved text-dark me-2"></i>8. Advantage Pillars
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#panel-microsoft" data-bs-toggle="tab" class="nav-link fw-semibold py-2">
                                <i class="fa-brands fa-microsoft text-info me-2"></i>9. Solutions Center
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#panel-accelerators" data-bs-toggle="tab" class="nav-link fw-semibold py-2">
                                <i class="fa-solid fa-rocket text-primary me-2"></i>10. ATNA Accelerators
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content border p-4 rounded bg-white">
                        
                        <!-- PANEL 1: SEPARATE UNIQUE PARTNER DATA -->
                        <div id="panel-unique" class="tab-pane fade show active">
                            <div class="alert alert-light border-start border-primary border-3 py-2 px-3 mb-4">
                                <small class="text-muted"><i class="fa-solid fa-circle-info text-primary me-1"></i> These parameters configure the <strong>singular unique database item row profile</strong> record layout properties.</small>
                            </div>
                            <div class="row mb-3">
                                <label for="type_id" class="col-sm-2 col-form-label fw-semibold">Select Type</label>
                                <div class="col-sm-10">
                                    <select name="type" class="form-select form-control" id="type_id">
                                        <option value="">-- Choose Segment Type --</option>
                                        <?php foreach ($typeList as $key => $value): ?>
                                            <option value="<?php echo $key; ?>" <?php echo (isset($type) && $type == $key) ? 'selected' : ''; ?>><?php echo $value; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php echo $validation->hasError('type') ? '<div class="text-danger small mt-1">' . $validation->showError('type', 'my_single') . '</div>' : ''; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tag_id" class="col-sm-2 col-form-label fw-semibold">Select Partner Tag</label>
                                <div class="col-sm-10">
                                    <select name="tag_id" class="form-select form-control" id="tag_id">
                                        <option value="">-- Choose Integration Tag alignment --</option>
                                        <?php foreach ($tagList as $value): ?>
                                            <option value="<?php echo $value->id; ?>" <?php echo (isset($tag_id) && $tag_id == $value->id) ? 'selected' : ''; ?>><?php echo htmlspecialchars($value->type . ' > ' . $value->name); ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php echo $validation->hasError('tag_id') ? '<div class="text-danger small mt-1">' . $validation->showError('tag_id', 'my_single') . '</div>' : ''; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input-partner-name" class="col-sm-2 col-form-label fw-semibold">Partner Display Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="input-partner-name" value="<?php echo set_value('name', isset($name) ? $name : ''); ?>" placeholder="e.g., Microsoft Dynamics 365, Tally, SAP" class="form-control" />
                                    <?php echo $validation->hasError('name') ? '<div class="text-danger small mt-1">' . $validation->showError('name', 'my_single') . '</div>' : ''; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input-partner-image" class="col-sm-2 col-form-label fw-semibold">Unique Partner Logo</label>
                                <div class="col-sm-10">
                                    <?php if (!empty($image)): ?>
                                        <div class="mb-2 p-2 bg-light border rounded d-inline-block">
                                            <img src="<?php echo base_url($image); ?>" width="100" height="100" class="img-thumbnail object-fit-contain" alt="Current Partner Identity logo">
                                            <div class="form-check mt-1">
                                                <input class="form-check-input text-danger" type="checkbox" name="remove_image" value="1" id="remUniqueLogo">
                                                <label class="form-check-label text-danger small fw-semibold" for="remUniqueLogo">Remove Identity Logo</label>
                                            </div>
                                        </div>
                                    <?php endif ?> 
                                    <input type="file" name="image" id="input-partner-image" class="form-control" />
                                </div>
                            </div>   
                            <div class="row mb-3">
                                <label for="input-sort-order" class="col-sm-2 col-form-label fw-semibold">Grid Sequence Order</label>
                                <div class="col-sm-10">
                                    <input type="number" name="sort_order" id="input-sort-order" value="<?php echo set_value('sort_order', isset($sort_order) ? $sort_order : '0'); ?>" class="form-control w-25" placeholder="0" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input-status" class="col-sm-2 col-form-label fw-semibold">Publish Status</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-switch form-switch-lg mt-1">
                                        <input type="hidden" name="status" value="0" />
                                        <input type="checkbox" name="status" value="1" id="input-status" class="form-check-input" <?php echo (isset($status) && $status == 1) ? 'checked' : ''; ?> />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PANEL 2: COMMON HERO BANNER -->
                        <div id="panel-hero" class="tab-pane fade">
                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="fa-solid fa-window-maximize text-secondary me-2"></i>Section 2: Hero Banner Content</h5>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-medium">Indicator Badge Text 1</label>
                                <div class="col-sm-10">
                                    <input type="text" name="banner_badge_1" value="<?php echo set_value('banner_badge_1', isset($banner_badge_1) ? $banner_badge_1 : 'Strategic Partnerships'); ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-medium">Indicator Badge Text 2</label>
                                <div class="col-sm-10">
                                    <input type="text" name="banner_badge_2" value="<?php echo set_value('banner_badge_2', isset($banner_badge_2) ? $banner_badge_2 : 'Enterprise Ecosystem'); ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-medium">Hero Section Headline Heading</label>
                                <div class="col-sm-10">
                                    <input type="text" name="banner_title" value="<?php echo set_value('banner_title', isset($banner_title) ? $banner_title : 'Digital Transformation Through Strategic Alliances'); ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-medium">Hero Structural Subtext Description</label>
                                <div class="col-sm-10">
                                    <textarea name="banner_description" class="form-control" rows="4"><?php echo set_value('banner_description', isset($banner_description) ? $banner_description : 'At ATNA Technologies, we collaborate with leading global technology providers to deliver innovative ERP, Cloud, Data Analytics, AI, and Digital Transformation solutions. Our strategic partnerships empower organizations to modernize operations, improve decision-making, and achieve sustainable growth with confidence.'); ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3 border-top pt-3 shadow-none">
                                <label for="input-banner-image-primary" class="col-sm-2 col-form-label fw-medium">Primary Banner Image (Meta/Logo Frame)</label>
                                <div class="col-sm-10">
                                    <?php if (!empty($banner_image_primary)): ?>
                                        <div class="mb-2 d-inline-block p-2 bg-light border rounded">
                                            <img src="<?php echo base_url($banner_image_primary); ?>" width="150" class="img-thumbnail" alt="Primary Glass Canvas Showcase">
                                            <div class="form-check mt-1">
                                                <input class="form-check-input text-danger" type="checkbox" name="remove_banner_image_primary" value="1" id="remPrimaryBanner">
                                                <label class="form-check-label text-danger small fw-semibold" for="remPrimaryBanner">Remove Primary Image</label>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" name="banner_image_primary" id="input-banner-image-primary" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input-banner-image-secondary" class="col-sm-2 col-form-label fw-medium">Secondary Banner Image</label>
                                <div class="col-sm-10">
                                    <?php if (!empty($banner_image_secondary)): ?>
                                        <div class="mb-2 d-inline-block p-2 bg-light border rounded">
                                            <img src="<?php echo base_url($banner_image_secondary); ?>" width="150" class="img-thumbnail" alt="Config Fallback Matrix Alignment Image">
                                            <div class="form-check mt-1">
                                                <input class="form-check-input text-danger" type="checkbox" name="remove_banner_image_secondary" value="1" id="remSecondaryBanner">
                                                <label class="form-check-label text-danger small fw-semibold" for="remSecondaryBanner">Remove Background Banner</label>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" name="banner_image_secondary" id="input-banner-image-secondary" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <!-- PANEL 3: COMMON REDIRECTIONS -->
                        <div id="panel-redirection" class="tab-pane fade">
                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="fa-solid fa-arrow-up-right-from-square text-success me-2"></i>Section 3: Interactive Redirection Paths</h5>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-medium">Trusted Verticals Subtitle</label>
                                <div class="col-sm-10">
                                    <input type="text" name="trusted_verticals_text" value="<?php echo set_value('trusted_verticals_text', isset($trusted_verticals_text) ? $trusted_verticals_text : 'TRUSTED BY BUSINESSES ACROSS MANUFACTURING, DISTRIBUTION, RETAIL, TEXTILE, FMCG, AND PROFESSIONAL SERVICES VERTICALS.'); ?>" class="form-control text-uppercase" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-medium">Inline Filter Sectors (| Separated Layout)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="inline_sectors_list" value="<?php echo set_value('inline_sectors_list', isset($inline_sectors_list) ? $inline_sectors_list : 'Manufacturing | Retail & E-comm | BFSI'); ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3 border-top pt-2 shadow-none">
                                <div class="col-sm-6">
                                    <label class="small fw-bold text-muted">CTA Action Button 1 Label</label>
                                    <input type="text" name="cta_label_1" value="<?php echo set_value('cta_label_1', isset($cta_label_1) ? $cta_label_1 : 'Talk to Our Experts'); ?>" class="form-control" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="small fw-bold text-muted">CTA Button 1 Anchor Link Target</label>
                                    <input type="text" name="cta_url_1" value="<?php echo set_value('cta_url_1', isset($cta_url_1) ? $cta_url_1 : '#contact'); ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3 shadow-none">
                                <div class="col-sm-6">
                                    <label class="small fw-bold text-muted">CTA Action Button 2 Label</label>
                                    <input type="text" name="cta_label_2" value="<?php echo set_value('cta_label_2', isset($cta_label_2) ? $cta_label_2 : 'Explore Our Solutions'); ?>" class="form-control" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="small fw-bold text-muted">CTA Button 2 Anchor Link Target</label>
                                    <input type="text" name="cta_url_2" value="<?php echo set_value('cta_url_2', isset($cta_url_2) ? $cta_url_2 : '#ecosystem'); ?>" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <!-- PANEL 4: COMMON ALLIANCES -->
                        <div id="panel-alliances" class="tab-pane fade">
                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="fa-solid fa-circle-nodes text-info me-2"></i>Section 4: Global Alliances Overview Text</h5>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-medium">Ecosystem Badge Header</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ecosystem_badge" value="<?php echo set_value('ecosystem_badge', isset($ecosystem_badge) ? $ecosystem_badge : 'OUR PARTNER ECOSYSTEM'); ?>" class="form-control text-uppercase" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-medium">Ecosystem Main Core Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ecosystem_title" value="<?php echo set_value('ecosystem_title', isset($ecosystem_title) ? $ecosystem_title : 'Global Alliances That Fuel Innovation'); ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-medium">Ecosystem Description Segment Block</label>
                                <div class="col-sm-10">
                                    <textarea name="ecosystem_description" class="form-control" rows="4"><?php echo set_value('ecosystem_description', isset($ecosystem_description) ? $ecosystem_description : 'We believe successful digital transformation requires the right technology, the right expertise, and the right implementation partner. Through our strategic alliances, we help businesses unlock the full potential of industry-leading platforms and technologies.'); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- PANEL 5: COMMON TECH VALUE -->
                        <div id="panel-techvalue" class="tab-pane fade">
                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="fa-solid fa-chart-line text-warning me-2"></i>Section 5: Technology Partnerships &amp; Value Header</h5>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-medium">Partnerships Section Core Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="tech_value_title" value="<?php echo set_value('tech_value_title', isset($tech_value_title) ? $tech_value_title : 'Technology Partnerships That Deliver Business Value'); ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-medium">Partnerships Descriptive Overview Copy</label>
                                <div class="col-sm-10">
                                    <textarea name="tech_value_description" class="form-control" rows="3"><?php echo set_value('tech_value_description', isset($tech_value_description) ? $tech_value_description : "We combine our deep industry expertise with the world's leading platforms to accelerate your digital transformation journey."); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- PANEL 6: PREMIUM CARDS STUDIOS Workspace -->
                        <div id="panel-cards" class="tab-pane fade">
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-4">
                                <h5 class="fw-bold text-dark m-0">
                                    <i class="fa-solid fa-id-card text-danger me-2"></i>Section 6: Premium Business Value Specification Cards
                                </h5>
                                <button type="button" class="btn btn-sm btn-success shadow-sm px-3" onclick="addNewCardContainer()">
                                    <i class="fa-solid fa-plus me-1"></i> Add New Card
                                </button>
                            </div>

                            <div class="row g-3" id="dynamic-cards-repeater-row">
                                <?php 
                                $cardsData = !empty($section_6_cards) ? json_decode($section_6_cards, true) : [];
                                if (!is_array($cardsData) || empty($cardsData)) {
                                    $cardsData = [
                                        [
                                            'type' => 'pills_card',
                                            'title' => 'Microsoft Core Stack',
                                            'subtitle' => 'Solutions Partner Integration',
                                            'description' => 'We architect, deploy, and manage enterprise-grade solutions seamlessly across the entire Microsoft ecosystem.',
                                            'meta_items' => 'Unified Data | Hybrid Cloud',
                                            'points' => []
                                        ]
                                    ];
                                }

                                foreach ($cardsData as $index => $card): 
                                    $cardType = $card['type'] ?? 'pills_card';
                                ?>
                                    <div class="col-xl-4 col-md-6 dynamic-card-item-node" id="card-node-<?= $index; ?>">
                                        <div class="card border rounded shadow-sm h-100">
                                            
                                            <div class="card-header bg-light d-flex justify-content-between align-items-center py-2 px-3">
                                                <strong class="text-uppercase tracking-wider font-monospace text-secondary fs-8">Card Layout Settings</strong>
                                                <button type="button" class="btn btn-link link-danger p-0 border-0" onclick="removeCardContainer(<?= $index; ?>)" title="Remove This Card">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </div>

                                            <div class="card-body p-3">
                                                <div class="mb-3">
                                                    <label class="form-label small fw-bold text-secondary">Card Display Style</label>
                                                    <select name="cards[<?= $index; ?>][type]" class="form-select form-select-sm" onchange="toggleCardFieldLayout(this, <?= $index; ?>)">
                                                        <option value="pills_card" <?= $cardType === 'pills_card' ? 'selected' : ''; ?>>Style 1: Title + Subtitle + Description + Pills</option>
                                                        <option value="list_card"  <?= $cardType === 'list_card' ? 'selected' : ''; ?>>Style 2: Core Capabilities (Text Rows Only)</option>
                                                        <option value="benefit_card" <?= $cardType === 'benefit_card' ? 'selected' : ''; ?>>Style 3: Strategic Benefits (Title + Desc Rows Only)</option>
                                                    </select>
                                                </div>

                                                <div class="mb-2">
                                                    <label class="form-label small fw-semibold text-muted mb-0">Card Main Title</label>
                                                    <input type="text" name="cards[<?= $index; ?>][title]" value="<?= htmlspecialchars($card['title'] ?? ''); ?>" class="form-control form-control-sm fw-bold" placeholder="Card Title" />
                                                </div>

                                                <div class="style-fields-pills-card-<?= $index; ?>" style="display: <?= $cardType === 'pills_card' ? 'block' : 'none'; ?>;">
                                                    <div class="mb-2">
                                                        <label class="form-label small text-muted mb-0">Subtitle</label>
                                                        <input type="text" name="cards[<?= $index; ?>][subtitle]" value="<?= htmlspecialchars($card['subtitle'] ?? ''); ?>" class="form-control form-control-sm" placeholder="e.g., Solutions Partner Integration" />
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label small text-muted mb-0">Description Paragraph</label>
                                                        <textarea name="cards[<?= $index; ?>][description]" class="form-control form-control-sm fs-7" rows="3"><?= htmlspecialchars($card['description'] ?? ''); ?></textarea>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label small text-muted mb-0">Bottom Pills (| Separated)</label>
                                                        <input type="text" name="cards[<?= $index; ?>][meta_items]" value="<?= htmlspecialchars($card['meta_items'] ?? ''); ?>" class="form-control form-control-sm text-muted fs-7" placeholder="Unified Data | Hybrid Cloud" />
                                                    </div>
                                                </div>

                                                <div class="style-fields-list-card-<?= $index; ?>" style="display: <?= $cardType === 'list_card' ? 'block' : 'none'; ?>;">
                                                    <div class="mb-2">
                                                        <label class="form-label small text-muted mb-0">Inline Badge Text</label>
                                                        <input type="text" name="cards[<?= $index; ?>][card_badge]" value="<?= htmlspecialchars($card['card_badge'] ?? ''); ?>" class="form-control form-control-sm" placeholder="e.g., Enterprise-Grade" />
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <label class="form-label small fw-bold text-success mb-0">Capability Text Elements</label>
                                                        <button type="button" class="btn btn-sm btn-outline-success py-0 px-2 fs-8" onclick="addNewPointRow(<?= $index; ?>, 'list')">
                                                            <i class="fa-solid fa-plus me-1"></i>Add Row
                                                        </button>
                                                    </div>
                                                    <div class="point-rows-vertical-stack d-flex flex-column gap-2" id="points-stack-container-list-<?= $index; ?>">
                                                        <?php 
                                                        if ($cardType === 'list_card' && isset($card['points'])):
                                                            foreach ($card['points'] as $pIdx => $point): 
                                                        ?>
                                                            <div class="d-flex gap-1 align-items-center point-input-line-node">
                                                                <div class="input-group input-group-sm">
                                                                    <span class="input-group-text bg-light text-muted"><i class="fa-solid fa-circle-dot fs-8"></i></span>
                                                                    <input type="text" name="cards[<?= $index; ?>][points][<?= $pIdx; ?>][title]" value="<?= htmlspecialchars($point['title'] ?? ''); ?>" class="form-control fs-7" placeholder="Capability Name" />
                                                                    <button type="button" class="btn btn-outline-danger" onclick="this.parentElement.parentElement.remove()"><i class="fa-solid fa-circle-minus"></i></button>
                                                                </div>
                                                            </div>
                                                        <?php 
                                                            endforeach;
                                                        endif; 
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="style-fields-benefit-card-<?= $index; ?>" style="display: <?= $cardType === 'benefit_card' ? 'block' : 'none'; ?>;">
                                                    <div class="d-flex justify-content-between align-items-center mb-2 mt-2">
                                                        <label class="form-label small fw-bold text-info mb-0">Strategic Benefit Elements</label>
                                                        <button type="button" class="btn btn-sm btn-outline-info py-0 px-2 fs-8" onclick="addNewPointRow(<?= $index; ?>, 'benefit')">
                                                            <i class="fa-solid fa-plus me-1"></i>Add Benefit
                                                        </button>
                                                    </div>
                                                    <div class="point-rows-vertical-stack d-flex flex-column gap-2" id="points-stack-container-benefit-<?= $index; ?>">
                                                        <?php 
                                                        if ($cardType === 'benefit_card' && isset($card['points'])):
                                                            foreach ($card['points'] as $pIdx => $point): 
                                                        ?>
                                                            <div class="border p-2 rounded bg-light-subtle point-input-line-node position-relative pt-3 shadow-none">
                                                                <button type="button" class="btn btn-sm btn-link link-danger position-absolute end-0 top-0 p-1 mt-0.5 me-1 border-0" onclick="this.parentElement.remove()" title="Delete"><i class="fa-solid fa-trash-can small"></i></button>
                                                                <div class="row g-2">
                                                                    <div class="col-12">
                                                                        <input type="text" name="cards[<?= $index; ?>][points][<?= $pIdx; ?>][title]" value="<?= htmlspecialchars($point['title'] ?? ''); ?>" class="form-control form-control-sm fw-bold fs-7" placeholder="Bold Heading (e.g., Reduce Time-to-Value)" />
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <input type="text" name="cards[<?= $index; ?>][points][<?= $pIdx; ?>][desc]" value="<?= htmlspecialchars($point['desc'] ?? ''); ?>" class="form-control form-control-sm fs-7 text-muted" placeholder="Details descriptive text context..." />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php 
                                                            endforeach;
                                                        endif; 
                                                        ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- PANEL 7: SECTORS LAYER FRAMEWORK MATRIX -->
                        <div id="panel-sectors" class="tab-pane fade">
                            <div class="border-bottom pb-2 mb-4">
                                <h5 class="fw-bold text-dark m-0">
                                    <i class="fa-solid fa-chart-gantt me-2" style="color:#6f42c1;"></i>Section 7: Targeted Sector Functional Columns
                                </h5>
                            </div>

                            <div class="row g-3">
                                <!-- SECTOR 1: MANUFACTURING -->
                                <div class="col-xl-3 col-md-6 shadow-none">
                                    <div class="card border rounded-3 h-100 bg-light-subtle">
                                        <div class="card-body p-3">
                                            <div class="mb-3">
                                                <label class="form-label small fw-bold text-secondary mb-1">Sector Column 1 Title</label>
                                                <input type="text" name="vertical_title_1" value="<?php echo set_value('vertical_title_1', isset($vertical_title_1) ? $vertical_title_1 : 'Manufacturing'); ?>" class="form-control form-control-sm fw-bold text-primary bg-white rounded-2" />
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <label class="small fw-bold text-dark m-0">Application List</label>
                                                <button type="button" class="btn btn-sm btn-outline-success py-0 px-2 fs-8 rounded-2" onclick="addSectorItemRow('mfg')">
                                                    <i class="fa-solid fa-plus me-1"></i>Add Point
                                                </button>
                                            </div>
                                            <div class="d-flex flex-column gap-2" id="sector-stack-mfg">
                                                <?php 
                                                $mfgNodes = isset($vertical_mfg_nodes) ? explode("\n", trim($vertical_mfg_nodes)) : [];
                                                foreach ($mfgNodes as $idx => $node): 
                                                    if(trim($node) == '') continue;
                                                ?>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-text bg-white text-primary border-end-0"><i class="fa-solid fa-circle-dot fs-8"></i></span>
                                                        <input type="text" name="sector_items[mfg][]" value="<?php echo htmlspecialchars(trim($node)); ?>" class="form-control fs-7 border-start-0" placeholder="Application node" />
                                                        <button type="button" class="btn btn-outline-danger" onclick="this.parentElement.remove()"><i class="fa-solid fa-trash-can fs-8"></i></button>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- SECTOR 2: RETAIL & DISTRIBUTION -->
                                <div class="col-xl-3 col-md-6 shadow-none">
                                    <div class="card border rounded-3 h-100 bg-light-subtle">
                                        <div class="card-body p-3">
                                            <div class="mb-3">
                                                <label class="form-label small fw-bold text-secondary mb-1">Sector Column 2 Title</label>
                                                <input type="text" name="vertical_title_2" value="<?php echo set_value('vertical_title_2', isset($vertical_title_2) ? $vertical_title_2 : 'Retail & Distribution'); ?>" class="form-control form-control-sm fw-bold text-primary bg-white rounded-2" />
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <label class="small fw-bold text-dark m-0">Application List</label>
                                                <button type="button" class="btn btn-sm btn-outline-success py-0 px-2 fs-8 rounded-2" onclick="addSectorItemRow('retail')">
                                                    <i class="fa-solid fa-plus me-1"></i>Add Point
                                                </button>
                                            </div>
                                            <div class="d-flex flex-column gap-2" id="sector-stack-retail">
                                                <?php 
                                                $retailNodes = isset($vertical_retail_nodes) ? explode("\n", trim($vertical_retail_nodes)) : [];
                                                foreach ($retailNodes as $idx => $node): 
                                                    if(trim($node) == '') continue;
                                                ?>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-text bg-white text-primary border-end-0"><i class="fa-solid fa-circle-dot fs-8"></i></span>
                                                        <input type="text" name="sector_items[retail][]" value="<?php echo htmlspecialchars(trim($node)); ?>" class="form-control fs-7 border-start-0" placeholder="Application node" />
                                                        <button type="button" class="btn btn-outline-danger" onclick="this.parentElement.remove()"><i class="fa-solid fa-trash-can fs-8"></i></button>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- SECTOR 3: TEXTILE & APPAREL -->
                                <div class="col-xl-3 col-md-6 shadow-none">
                                    <div class="card border rounded-3 h-100 bg-light-subtle">
                                        <div class="card-body p-3">
                                            <div class="mb-3">
                                                <label class="form-label small fw-bold text-secondary mb-1">Sector Column 3 Title</label>
                                                <input type="text" name="vertical_title_3" value="<?php echo set_value('vertical_title_3', isset($vertical_title_3) ? $vertical_title_3 : 'Textile & Apparel'); ?>" class="form-control form-control-sm fw-bold text-primary bg-white rounded-2" />
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <label class="small fw-bold text-dark m-0">Application List</label>
                                                <button type="button" class="btn btn-sm btn-outline-success py-0 px-2 fs-8 rounded-2" onclick="addSectorItemRow('textile')">
                                                    <i class="fa-solid fa-plus me-1"></i>Add Point
                                                </button>
                                            </div>
                                            <div class="d-flex flex-column gap-2" id="sector-stack-textile">
                                                <?php 
                                                $textileNodes = isset($vertical_textile_nodes) ? explode("\n", trim($vertical_textile_nodes)) : [];
                                                foreach ($textileNodes as $idx => $node): 
                                                    if(trim($node) == '') continue;
                                                ?>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-text bg-white text-primary border-end-0"><i class="fa-solid fa-circle-dot fs-8"></i></span>
                                                        <input type="text" name="sector_items[textile][]" value="<?php echo htmlspecialchars(trim($node)); ?>" class="form-control fs-7 border-start-0" placeholder="Application node" />
                                                        <button type="button" class="btn btn-outline-danger" onclick="this.parentElement.remove()"><i class="fa-solid fa-trash-can fs-8"></i></button>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- SECTOR 4: FOOD & BEVERAGE -->
                                <div class="col-xl-3 col-md-6 shadow-none">
                                    <div class="card border rounded-3 h-100 bg-light-subtle">
                                        <div class="card-body p-3">
                                            <div class="mb-3">
                                                <label class="form-label small fw-bold text-secondary mb-1">Sector Column 4 Title</label>
                                                <input type="text" name="vertical_title_4" value="<?php echo set_value('vertical_title_4', isset($vertical_title_4) ? $vertical_title_4 : 'Food & Beverage'); ?>" class="form-control form-control-sm fw-bold text-primary bg-white rounded-2" />
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <label class="small fw-bold text-dark m-0">Application List</label>
                                                <button type="button" class="btn btn-sm btn-outline-success py-0 px-2 fs-8 rounded-2" onclick="addSectorItemRow('fnb')">
                                                    <i class="fa-solid fa-plus me-1"></i>Add Point
                                                </button>
                                            </div>
                                            <div class="point-rows-vertical-stack d-flex flex-column gap-2" id="sector-stack-fnb">
                                                <?php 
                                                $fnbNodes = isset($vertical_fnb_nodes) ? explode("\n", trim($vertical_fnb_nodes)) : [];
                                                foreach ($fnbNodes as $idx => $node): 
                                                    if(trim($node) == '') continue;
                                                ?>
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-text bg-white text-primary border-end-0"><i class="fa-solid fa-circle-dot fs-8"></i></span>
                                                        <input type="text" name="sector_items[fnb][]" value="<?php echo htmlspecialchars(trim($node)); ?>" class="form-control fs-7 border-start-0" placeholder="Application node" />
                                                        <button type="button" class="btn btn-outline-danger" onclick="this.parentElement.remove()"><i class="fa-solid fa-trash-can fs-8"></i></button>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PANEL 8: COMMON ADVANTAGE PILLARS -->
                        <div id="panel-pillars" class="tab-pane fade">
                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="fa-solid fa-shield-halved text-dark me-2"></i>Section 8: Strategic Alliance Advantage Pillars (6 Layout Pillars)</h5>
                            <div class="row mb-3 shadow-none">
                                <div class="col-sm-4 mb-2">
                                    <label class="fs-7 text-muted fw-bold">Sub-Badge Header Meta Text</label>
                                    <input type="text" name="alliances_badge" value="<?php echo set_value('alliances_badge', isset($alliances_badge) ? $alliances_badge : 'The ATNA Strategic Advantage'); ?>" class="form-control font-weight-medium small" />
                                </div>
                                <div class="col-sm-8 mb-2">
                                    <label class="fs-7 text-muted fw-bold">Main Core Alliance Headline Title Text</label>
                                    <input type="text" name="alliances_title" value="<?php echo set_value('alliances_title', isset($alliances_title) ? $alliances_title : 'Why Our Strategic Alliances Matter'); ?>" class="form-control font-weight-bold" />
                                </div>
                                <div class="col-12">
                                    <label class="fs-7 text-muted fw-bold">Advantage Core Section Subtext Summary Block Description</label>
                                    <textarea name="alliances_description" class="form-control" rows="2"><?php echo set_value('alliances_description', isset($alliances_description) ? $alliances_description : 'Technology deployment requires rigorous engineering experience combined with verified frameworks to maximize architectural investments safely.'); ?></textarea>
                                </div>
                            </div>
                            <div class="row g-2 border-top pt-3 shadow-none">
                                <div class="col-md-4">
                                    <input type="text" name="pillar_label_1" value="<?php echo set_value('pillar_label_1', isset($pillar_label_1) ? $pillar_label_1 : 'Certified Expertise'); ?>" class="form-control mb-1 fw-bold fs-7 bg-light" />
                                    <textarea name="pillar_desc_1" class="form-control fs-7" rows="2"><?php echo set_value('pillar_desc_1', isset($pillar_desc_1) ? $pillar_desc_1 : 'Engineers carrying comprehensive technical certifications across cloud architectures.'); ?></textarea>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="pillar_label_2" value="<?php echo set_value('pillar_label_2', isset($pillar_label_2) ? $pillar_label_2 : 'Faster Deployment'); ?>" class="form-control mb-1 fw-bold fs-7 bg-light" />
                                    <textarea name="pillar_desc_2" class="form-control fs-7" rows="2"><?php echo set_value('pillar_desc_2', isset($pillar_desc_2) ? $pillar_desc_2 : 'Accelerators and deployment code blueprints designed to scale cycles safely.'); ?></textarea>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="pillar_label_3" value="<?php echo set_value('pillar_label_3', isset($pillar_label_3) ? $pillar_label_3 : 'Innovation Engines'); ?>" class="form-control mb-1 fw-bold fs-7 bg-light" />
                                    <textarea name="pillar_desc_3" class="form-control fs-7" rows="2"><?php echo set_value('pillar_desc_3', isset($pillar_desc_3) ? $pillar_desc_3 : 'Continuous functional integration of emerging artificial intelligence layers.'); ?></textarea>
                                </div>
                                <div class="col-md-4 pt-1">
                                    <input type="text" name="pillar_label_4" value="<?php echo set_value('pillar_label_4', isset($pillar_label_4) ? $pillar_label_4 : 'End-to-End Managed'); ?>" class="form-control mb-1 fw-bold fs-7 bg-light" />
                                    <textarea name="pillar_desc_4" class="form-control fs-7" rows="2"><?php echo set_value('pillar_desc_4', isset($pillar_desc_4) ? $pillar_desc_4 : 'Complete ecosystem oversight including system performance scaling audits.'); ?></textarea>
                                </div>
                                <div class="col-md-4 pt-1">
                                    <input type="text" name="pillar_label_5" value="<?php echo set_value('pillar_label_5', isset($pillar_label_5) ? $pillar_label_5 : 'Secure Compliance'); ?>" class="form-control mb-1 fw-bold fs-7 bg-light" />
                                    <textarea name="pillar_desc_5" class="form-control fs-7" rows="2"><?php echo set_value('pillar_desc_5', isset($pillar_desc_5) ? $pillar_desc_5 : 'Enterprise compliance structures built inside high-performance standards.'); ?></textarea>
                                </div>
                                <div class="col-md-4 pt-1">
                                    <input type="text" name="pillar_label_6" value="<?php echo set_value('pillar_label_6', isset($pillar_label_6) ? $pillar_label_6 : 'Global Distribution'); ?>" class="form-control mb-1 fw-bold fs-7 bg-light" />
                                    <textarea name="pillar_desc_6" class="form-control fs-7" rows="2"><?php echo set_value('pillar_desc_6', isset($pillar_desc_6) ? $pillar_desc_6 : 'Multi-currency structures configured for complex cross-border trade layouts.'); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- PANEL 9: SOLUTIONS HUB METRIC BLOCK -->
                        <div id="panel-microsoft" class="tab-pane fade">
                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="fa-brands fa-microsoft text-info me-2"></i>Section 9: Microsoft Solutions Center Hub Metrics &amp; Operational Counters</h5>
                            <input type="text" name="ms_center_title" value="<?php echo set_value('ms_center_title', isset($ms_center_title) ? $ms_center_title : 'Microsoft Solutions Center'); ?>" class="form-control mb-1 fw-bold text-dark bg-light" />
                            <input type="text" name="ms_center_subtitle" value="<?php echo set_value('ms_center_subtitle', isset($ms_center_subtitle) ? $ms_center_subtitle : 'Helping Organizations Maximize Their Enterprise Solutions Investment'); ?>" class="form-control mb-2 text-muted" />
                            <textarea name="ms_center_description" class="form-control mb-3" rows="2"><?php echo set_value('ms_center_description', isset($ms_center_description) ? $ms_center_description : 'ATNA Technologies delivers comprehensive business integrations designed to automate legacy operational structures securely. Our functional focal areas include:'); ?></textarea>
                            
                            <div class="row g-2 mb-3 border-top pt-3 shadow-none">
                                <div class="col-sm-6">
                                    <input type="text" name="ms_bullet_t1" value="<?php echo set_value('ms_bullet_t1', isset($ms_bullet_t1) ? $ms_bullet_t1 : 'Business Frameworks'); ?>" class="form-control mb-1 fw-bold fs-7" />
                                    <input type="text" name="ms_bullet_d1" value="<?php echo set_value('ms_bullet_d1', isset($ms_bullet_d1) ? $ms_bullet_d1 : 'Transform finance operations via modern automated enterprise tracking setups.'); ?>" class="form-control fs-7" />
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="ms_bullet_t2" value="<?php echo set_value('ms_bullet_t2', isset($ms_bullet_t2) ? $ms_bullet_t2 : 'Cloud Architecture'); ?>" class="form-control mb-1 fw-bold fs-7" />
                                    <input type="text" name="ms_bullet_d2" value="<?php echo set_value('ms_bullet_d2', isset($ms_bullet_d2) ? $ms_bullet_d2 : 'Construct modern cloud spaces equipped with active threat compliance filters.'); ?>" class="form-control fs-7" />
                                </div>
                                <div class="col-sm-6 pt-1">
                                    <input type="text" name="ms_bullet_t3" value="<?php echo set_value('ms_bullet_t3', isset($ms_bullet_t3) ? $ms_bullet_t3 : 'Data &amp; Analytics Hubs'); ?>" class="form-control mb-1 fw-bold fs-7" />
                                    <input type="text" name="ms_bullet_d3" value="<?php echo set_value('ms_bullet_d3', isset($ms_bullet_d3) ? $ms_bullet_d3 : 'Leverage system analytics data layers into automated real-time visualizations.'); ?>" class="form-control fs-7" />
                                </div>
                                <div class="col-sm-6 pt-1">
                                    <input type="text" name="ms_bullet_t4" value="<?php echo set_value('ms_bullet_t4', isset($ms_bullet_t4) ? $ms_bullet_t4 : 'AI Workflow Automation'); ?>" class="form-control mb-1 fw-bold fs-7" />
                                    <input type="text" name="ms_bullet_d4" value="<?php echo set_value('ms_bullet_d4', isset($ms_bullet_d4) ? $ms_bullet_d4 : 'Deploy autonomous logic processors to eliminate manual application overhead.'); ?>" class="form-control fs-7" />
                                </div>
                            </div>

                            <div class="row g-2 border-top pt-3 shadow-none">
                                <p class="small mb-1 fw-bold text-secondary text-uppercase tracking-wider ms-1">Certified Footprint Matrix Counters</p>
                                <div class="col-3">
                                    <input type="text" name="stat_val_1" value="<?php echo set_value('stat_val_1', isset($stat_val_1) ? $stat_val_1 : '250+'); ?>" class="form-control font-weight-bold text-primary border-primary" />
                                    <input type="text" name="stat_lbl_1" value="<?php echo set_value('stat_lbl_1', isset($stat_lbl_1) ? $stat_lbl_1 : 'Global Clients'); ?>" class="form-control form-control-sm mt-1" />
                                </div>
                                <div class="col-3">
                                    <input type="text" name="stat_val_2" value="<?php echo set_value('stat_val_2', isset($stat_val_2) ? $stat_val_2 : '100+'); ?>" class="form-control font-weight-bold text-primary border-primary" />
                                    <input type="text" name="stat_lbl_2" value="<?php echo set_value('stat_lbl_2', isset($stat_lbl_2) ? $stat_lbl_2 : 'Deployments'); ?>" class="form-control form-control-sm mt-1" />
                                </div>
                                <div class="col-3">
                                    <input type="text" name="stat_val_3" value="<?php echo set_value('stat_val_3', isset($stat_val_3) ? $stat_val_3 : '20+'); ?>" class="form-control font-weight-bold text-primary border-primary" />
                                    <input type="text" name="stat_lbl_3" value="<?php echo set_value('stat_lbl_3', isset($stat_lbl_3) ? $stat_lbl_3 : 'Years Active'); ?>" class="form-control form-control-sm mt-1" />
                                </div>
                                <div class="col-3">
                                    <input type="text" name="stat_val_4" value="<?php echo set_value('stat_val_4', isset($stat_val_4) ? $stat_val_4 : '20+'); ?>" class="form-control font-weight-bold text-primary border-primary" />
                                    <input type="text" name="stat_lbl_4" value="<?php echo set_value('stat_lbl_4', isset($stat_lbl_4) ? $stat_lbl_4 : 'Regions Served'); ?>" class="form-control form-control-sm mt-1" />
                                </div>
                            </div>
                        </div>

                        <!-- PANEL 10: ATNA SYSTEM ACCELERATORS -->
                        <div id="panel-accelerators" class="tab-pane fade">
                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="fa-solid fa-rocket text-primary me-2"></i>Section 10: ATNA Accelerators &amp; Solutions Layout</h5>
                            <div class="row mb-3 shadow-none">
                                <div class="col-sm-4 mb-2">
                                    <label class="fs-7 text-muted fw-bold">Proprietary Sub-Header Badge</label>
                                    <input type="text" name="accelerators_badge" value="<?php echo set_value('accelerators_badge', isset($accelerators_badge) ? $accelerators_badge : 'PROPRIETARY BUSINESS IP MODULES'); ?>" class="form-control text-uppercase small" />
                                </div>
                                <div class="col-sm-8 mb-2">
                                    <label class="fs-7 text-muted fw-bold">Main Core Solutions Section Title Text</label>
                                    <input type="text" name="accelerators_title" value="<?php echo set_value('accelerators_title', isset($accelerators_title) ? $accelerators_title : 'ATNA Accelerators &amp; Solutions'); ?>" class="form-control font-weight-bold" />
                                </div>
                                <div class="col-12">
                                    <label class="fs-7 text-muted fw-bold">Accelerators Section Sub-text Summary Block Description</label>
                                    <textarea name="accelerators_description" class="form-control" rows="2"><?php echo set_value('accelerators_description', isset($accelerators_description) ? $accelerators_description : 'Custom-engineered systems built directly on premium logic stacks to dramatically reduce integration timelines.'); ?></textarea>
                                </div>
                            </div>
                            
                            <div class="row g-2 border-top pt-3 shadow-none">
                                <div class="col-md-6 mb-2">
                                    <label class="small fw-bold text-dark">Module 1 Title / Description Content</label>
                                    <input type="text" name="sol_title_1" value="<?php echo set_value('sol_title_1', isset($sol_title_1) ? $sol_title_1 : 'Financial Consolidation Engine (FINCON)'); ?>" class="form-control mb-2 fw-semibold small bg-light" />
                                    <input type="text" name="sol_desc_1" value="<?php echo set_value('sol_desc_1', isset($sol_desc_1) ? $sol_desc_1 : 'Unify disparate fiscal data schemas across multiple subsidiaries automatically into singular operational ledgers.'); ?>" class="form-control fs-7" />
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="small fw-bold text-dark">Module 2 Title / Description Content</label>
                                    <input type="text" name="sol_title_2" value="<?php echo set_value('sol_title_2', isset($sol_title_2) ? $sol_title_2 : 'Accounts Payable Automation'); ?>" class="form-control mb-2 fw-semibold small bg-light" />
                                    <textarea name="sol_desc_2" class="form-control fs-7" rows="2"><?php echo set_value('sol_desc_2', isset($sol_desc_2) ? $sol_desc_2 : 'Extract, validate, and bridge transaction receipts directly into backend registers without entry delays.'); ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="small fw-bold text-dark">Module 3 Title / Description Content</label>
                                    <input type="text" name="sol_title_3" value="<?php echo set_value('sol_title_3', isset($sol_title_3) ? $sol_title_3 : 'Advance Shipping Notice Framework'); ?>" class="form-control mb-2 fw-semibold small bg-light" />
                                    <textarea name="sol_desc_3" class="form-control fs-7" rows="2"><?php echo set_value('sol_desc_3', isset($sol_desc_3) ? $sol_desc_3 : 'Automate complex outbound logistics networks with real-time supply chain updates.'); ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="small fw-bold text-dark">Module 4 Title / Description Content</label>
                                    <input type="text" name="sol_title_4" value="<?php echo set_value('sol_title_4', isset($sol_title_4) ? $sol_title_4 : 'Predictive Inventory Optimizer'); ?>" class="form-control mb-2 fw-semibold small bg-light" />
                                    <textarea name="sol_desc_4" class="form-control fs-7" rows="2"><?php echo set_value('sol_desc_4', isset($sol_desc_4) ? $sol_desc_4 : 'Forecast enterprise logistical needs utilizing advanced baseline statistical trend configurations.'); ?></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
window.CKFinder = {
    setupCKEditor: function() { return false; },
    define: function() { return false; }
};

(function() {
    var checkExistInterval = setInterval(function() {
        if (typeof window.CKEDITOR !== 'undefined' && window.CKEDITOR.replace) {
            clearInterval(checkExistInterval);
            
            var originalReplace = window.CKEDITOR.replace;
            
            window.CKEDITOR.replace = function(elementId, config) {
                var brokenMasterIds = ['editor', 'editor1', 'editor2', 'editor3', 'editor4'];
                if (brokenMasterIds.indexOf(elementId) !== -1) {
                    console.log("✔ [ATNA SHIELD]: Suppressed broken master layout editor call: " + elementId);
                    return {
                        on: function() {},
                        setData: function() {},
                        getData: function() { return ''; }
                    };
                }
                
                var targetNode = document.getElementById(elementId) || document.getElementsByName(elementId)[0];
                if (!targetNode) {
                    return {
                        on: function() {},
                        setData: function() {},
                        getData: function() { return ''; }
                    };
                }
                
                return originalReplace.apply(this, arguments);
            };
        }
    }, 10);
})();

// REPEATER MANAGEMENT OPERATIONS FOR CARD WORKSPACE GRID
function toggleCardFieldLayout(selectNode, cardIndex) {
    var val = selectNode.value;
    document.querySelector('.style-fields-pills-card-' + cardIndex).style.display = (val === 'pills_card') ? 'block' : 'none';
    document.querySelector('.style-fields-list-card-' + cardIndex).style.display = (val === 'list_card') ? 'block' : 'none';
    document.querySelector('.style-fields-benefit-card-' + cardIndex).style.display = (val === 'benefit_card') ? 'block' : 'none';
}

function removeCardContainer(cardIndex) {
    var node = document.getElementById('card-node-' + cardIndex);
    if (node) { node.remove(); }
}

function addNewCardContainer() {
    var nextCardIndex = document.querySelectorAll('.dynamic-card-item-node').length;
    var html = `
        <div class="col-xl-4 col-md-6 dynamic-card-item-node" id="card-node-${nextCardIndex}">
            <div class="card border rounded shadow-sm h-100">
                <div class="card-header bg-light d-flex justify-content-between align-items-center py-2 px-3">
                    <strong class="text-uppercase tracking-wider font-monospace text-secondary fs-8">Card Workspace</strong>
                    <button type="button" class="btn btn-link link-danger p-0 border-0" onclick="removeCardContainer(${nextCardIndex})"><i class="fa-solid fa-trash-can"></i></button>
                </div>
                <div class="card-body p-3">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary mb-1">Card Display Style</label>
                        <select name="cards[${nextCardIndex}][type]" class="form-select form-select-sm" onchange="toggleCardFieldLayout(this, ${nextCardIndex})">
                            <option value="pills_card">Style 1: Title + Subtitle + Description + Pills</option>
                            <option value="list_card">Style 2: Core Capabilities (Text Rows Only)</option>
                            <option value="benefit_card">Style 3: Strategic Benefits (Title + Desc Rows Only)</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label small fw-semibold text-muted mb-0">Card Main Title</label>
                        <input type="text" name="cards[${nextCardIndex}][title]" class="form-control form-control-sm fw-bold" placeholder="Card Title" />
                    </div>
                    <div class="style-fields-pills-card-${nextCardIndex}">
                        <div class="mb-2">
                            <input type="text" name="cards[${nextCardIndex}][subtitle]" class="form-control form-control-sm" placeholder="Subtitle" />
                        </div>
                        <div class="mb-2">
                            <textarea name="cards[${nextCardIndex}][description]" class="form-control form-control-sm fs-7" rows="3" placeholder="Description paragraph..."></textarea>
                        </div>
                        <div class="mb-2">
                            <input type="text" name="cards[${nextCardIndex}][meta_items]" class="form-control form-control-sm text-muted fs-7" placeholder="Pill 1 | Pill 2" />
                        </div>
                    </div>
                    <div class="style-fields-list-card-${nextCardIndex}" style="display:none;">
                        <div class="mb-2">
                            <input type="text" name="cards[${nextCardIndex}][card_badge]" class="form-control form-control-sm" placeholder="e.g., Enterprise-Grade" />
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="small fw-bold text-success m-0">Capability Text Elements</label>
                            <button type="button" class="btn btn-sm btn-outline-success py-0 px-2 fs-8" onclick="addNewPointRow(${nextCardIndex}, 'list')"><i class="fa-solid fa-plus"></i> Add Row</button>
                        </div>
                        <div class="point-rows-vertical-stack d-flex flex-column gap-2" id="points-stack-container-list-${nextCardIndex}"></div>
                    </div>
                    <div class="style-fields-benefit-card-${nextCardIndex}" style="display:none;">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="small fw-bold text-info m-0">Strategic Benefit Elements</label>
                            <button type="button" class="btn btn-sm btn-outline-info py-0 px-2 fs-8" onclick="addNewPointRow(${nextCardIndex}, 'benefit')"><i class="fa-solid fa-plus"></i> Add Benefit</button>
                        </div>
                        <div class="point-rows-vertical-stack d-flex flex-column gap-2" id="points-stack-container-benefit-${nextCardIndex}"></div>
                    </div>
                </div>
            </div>
        </div>`;
    document.getElementById('dynamic-cards-repeater-row').insertAdjacentHTML('beforeend', html);
}

function addNewPointRow(cardIndex, targetType) {
    if (targetType === 'list') {
        var container = document.getElementById('points-stack-container-list-' + cardIndex);
        var pIdx = container.querySelectorAll('.point-input-line-node').length;
        var row = `
            <div class="d-flex gap-1 align-items-center point-input-line-node">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-light text-muted"><i class="fa-solid fa-circle-dot fs-8"></i></span>
                    <input type="text" name="cards[${cardIndex}][points][${pIdx}][title]" class="form-control fs-7" placeholder="Capability Name" />
                    <button type="button" class="btn btn-outline-danger" onclick="this.parentElement.parentElement.remove()"><i class="fa-solid fa-circle-minus"></i></button>
                </div>
            </div>`;
        container.insertAdjacentHTML('beforeend', row);
    } else {
        var container = document.getElementById('points-stack-container-benefit-' + cardIndex);
        var pIdx = container.querySelectorAll('.point-input-line-node').length;
        var block = `
            <div class="border p-2 rounded bg-light-subtle point-input-line-node position-relative pt-3 shadow-none">
                <button type="button" class="btn btn-sm btn-link link-danger position-absolute end-0 top-0 p-1 mt-0.5 me-1 border-0" onclick="this.parentElement.remove()"><i class="fa-solid fa-trash-can small"></i></button>
                <div class="row g-2">
                    <div class="col-12"><input type="text" name="cards[${cardIndex}][points][${pIdx}][title]" class="form-control form-control-sm fw-bold fs-7" placeholder="Heading Title" /></div>
                    <div class="col-12"><input type="text" name="cards[${cardIndex}][points][${pIdx}][desc]" class="form-control form-control-sm fs-7 text-muted" placeholder="Details description..." /></div>
                </div>
            </div>`;
        container.insertAdjacentHTML('beforeend', block);
    }
}

// SECTORS FRAMEWORK APPLICATION REPEATER GENERATOR (TAB 7)
function addSectorItemRow(sectorKey) {
    var containerStack = document.getElementById('sector-stack-' + sectorKey);
    var rowBlueprint = `
        <div class="input-group input-group-sm mb-1">
            <span class="input-group-text bg-white text-primary border-end-0"><i class="fa-solid fa-circle-dot fs-8"></i></span>
            <input type="text" name="sector_items[${sectorKey}][]" class="form-control fs-7 border-start-0" placeholder="Enter application row..." />
            <button type="button" class="btn btn-outline-danger" onclick="this.parentElement.remove()"><i class="fa-solid fa-trash-can fs-8"></i></button>
        </div>`;
    containerStack.insertAdjacentHTML('beforeend', rowBlueprint);
}
</script>

<?php $this->endSection(); ?>