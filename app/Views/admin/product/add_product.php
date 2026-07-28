<?php 
$this->extend('layouts/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
use App\Models\cms\ProductCategoryModel;
$model = new ProductCategoryModel();
?>

<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="float-end">
        <button type="submit" form="form-user" data-bs-toggle="tooltip" title="Save All Settings" class="btn btn-primary">
          <i class="fa-solid fa-floppy-disk"></i>
        </button>
        <a href="<?php echo base_url('admin/products');?>" data-bs-toggle="tooltip" title="Back" class="btn btn-light">
          <i class="fa-solid fa-reply"></i>
        </a>
      </div>
      <h1><?php echo $page_title; ?></h1>
      <ol class="breadcrumb"></ol>
    </div>
  </div>

  <div class="container-fluid">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white py-3"><i class="fa-solid fa-pencil text-primary"></i> <strong><?php echo $page_title; ?></strong></div>
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
          
          <!-- ================================================================
               NAVIGATION TABS
               ================================================================ -->
          <ul class="nav nav-tabs border-bottom mb-4" id="productTabs" role="tablist">
            <li class="nav-item">
              <a href="#tab-hero" data-bs-toggle="tab" class="nav-link active text-primary fw-bold">
                <i class="fa-solid fa-rectangle-ad"></i> 1. Hero Banner
              </a>
            </li>
            <li class="nav-item">
              <a href="#tab-overview" data-bs-toggle="tab" class="nav-link text-primary fw-bold">
                <i class="fa-solid fa-desktop"></i> 2. Product Overview
              </a>
            </li>
            <li class="nav-item">
              <a href="#tab-trust-strip" data-bs-toggle="tab" class="nav-link text-info fw-bold">
                <i class="fa-solid fa-building-shield"></i> 3. Partner Ecosystem
              </a>
            </li>
            <li class="nav-item">
              <a href="#tab-why-choose-us" data-bs-toggle="tab" class="nav-link text-success fw-bold">
                <i class="fa-solid fa-square-check"></i> 4. Why Choose Us
              </a>
            </li>
            <li class="nav-item">
              <a href="#tab-capabilities" data-bs-toggle="tab" class="nav-link fw-bold">
                <i class="fa-solid fa-cubes"></i> 5. Key Capabilities
              </a>
            </li>
            <li class="nav-item">
              <a href="#tab-partnerships" data-bs-toggle="tab" class="nav-link text-warning fw-bold">
                <i class="fa-solid fa-handshake"></i> 6. Strategic Value
              </a>
            </li>
            <li class="nav-item">
              <a href="#tab-feature" data-bs-toggle="tab" class="nav-link fw-bold">
                <i class="fa-solid fa-photo-film"></i> 7. Use Cases & Media
              </a>
            </li>
            <li class="nav-item">
              <a href="#tab-business-benefits" data-bs-toggle="tab" class="nav-link text-success fw-bold">
                <i class="fa-solid fa-chart-simple"></i> 8. Business Metrics
              </a>
            </li>
            <li class="nav-item">
              <a href="#tab-industries" data-bs-toggle="tab" class="nav-link fw-bold">
                <i class="fa-solid fa-industry"></i> 9. Target Industries
              </a>
            </li>
            <li class="nav-item">
              <a href="#tab-testimonials" data-bs-toggle="tab" class="nav-link text-success fw-bold">
                <i class="fa-solid fa-comments"></i> 10. Testimonials
              </a>
            </li>
            <li class="nav-item">
              <a href="#tab-seo-settings" data-bs-toggle="tab" class="nav-link text-secondary fw-bold">
                <i class="fa-solid fa-gear"></i> 11. SEO & Status
              </a>
            </li>
          </ul>

          <div class="tab-content">

            <!-- ================================================================
                 TAB 1: HERO BANNER STAGE & SCROLLING TICKER
                 ================================================================ -->
            <div id="tab-hero" class="tab-pane active">
              <fieldset>
                <legend class="text-primary fw-bold mb-4">
                  <i class="fa-solid fa-rectangle-ad"></i> Hero Banner Stage Configuration
                </legend>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label fw-bold">Top Pill Badge Text</label>
                  <div class="col-sm-10">
                    <input type="text" name="heroBadge" value="<?php echo set_value('heroBadge', isset($heroBadge) ? $heroBadge : 'SOLUTIONS PROFILE'); ?>" placeholder="e.g., SOLUTIONS PROFILE" class="form-control" />
                  </div>
                </div>

                <div class="row mb-3 required">
                  <label class="col-sm-2 col-form-label fw-bold">Main Headline Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" value="<?php echo set_value('name', $name); ?>" placeholder="e.g., Accounts Payable Automation" class="form-control" />
                    <?php echo $validation->hasError('name') ? $validation->showError('name','my_single') : ''; ?>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label fw-bold">Headline Highlight (Cyan Text)</label>
                  <div class="col-sm-10">
                    <input type="text" name="heroTitleHighlight" value="<?php echo set_value('heroTitleHighlight', isset($heroTitleHighlight) ? $heroTitleHighlight : 'Built To Scale.'); ?>" placeholder="e.g., Built To Scale." class="form-control" />
                    <div class="form-text text-muted">Appears next to or directly below the main title with cyan accent styling.</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label fw-bold">Hero Subtitle / Description</label>
                  <div class="col-sm-10">
                    <textarea name="shortDescription" class="form-control" rows="3" placeholder="Modernize your operations, eliminate infrastructure gaps..."><?php echo set_value('shortDescription', $shortDescription); ?></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label fw-bold">Call-To-Action Button</label>
                  <div class="col-sm-5">
                    <input type="text" name="heroCtaText" value="<?php echo set_value('heroCtaText', isset($heroCtaText) ? $heroCtaText : 'Request Demo'); ?>" placeholder="Button Text (e.g., Request Demo)" class="form-control" />
                  </div>
                  <div class="col-sm-5">
                    <input type="text" name="heroCtaLink" value="<?php echo set_value('heroCtaLink', isset($heroCtaLink) ? $heroCtaLink : '#contact'); ?>" placeholder="Button Link (e.g., #contact or /contact-us)" class="form-control" />
                  </div>
                </div>

                <div class="row mb-3 border-top pt-3">
                  <label class="col-sm-2 col-form-label fw-bold">Floating Card Badge</label>
                  <div class="col-sm-5">
                    <input type="text" name="floatingBadgeTitle" value="<?php echo set_value('floatingBadgeTitle', isset($floatingBadgeTitle) ? $floatingBadgeTitle : 'Accounts payable automation'); ?>" placeholder="Badge Title (e.g., Accounts payable automation)" class="form-control" />
                  </div>
                  <div class="col-sm-5">
                    <input type="text" name="floatingBadgeSubtitle" value="<?php echo set_value('floatingBadgeSubtitle', isset($floatingBadgeSubtitle) ? $floatingBadgeSubtitle : 'Active & Optimized'); ?>" placeholder="Badge Subtitle (e.g., Active & Optimized)" class="form-control" />
                  </div>
                </div>

                <div class="row mb-3 border-top pt-3">
                  <label class="col-sm-2 col-form-label fw-bold">Hero Background Image</label>
                  <div class="col-sm-10">
                    <?php if (!empty($hero_banner)): ?>
                      <div class="mb-2">
                        <img src="<?php echo base_url($hero_banner); ?>" width="200" height="90" style="object-fit:cover;" class="border rounded shadow-sm" alt="Hero Background Preview">
                      </div>
                    <?php endif ?>
                    <input type="file" name="hero_banner" id="input-hero-banner" class="form-control" />
                  </div>
                </div>

              </fieldset>
              

              <!-- HERO SCROLLING TICKER ITEMS REPEATER -->
              <fieldset class="mt-4 pt-3 border-top">
                <legend class="text-primary fw-bold mb-3">
                  <i class="fa-solid fa-bars-staggered"></i> Below Hero Scrolling Ticker Items
                </legend>

                <div class="table-responsive">
                  <table id="hero-ticker-table" class="table table-striped table-bordered table-hover align-middle">
                    <thead class="table-dark">
                      <tr>
                        <td style="width: 75%;">Ticker Text Label</td>
                        <td style="width: 15%;">Sort Order</td>
                        <td style="width: 10%;" class="text-center">Action</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($tickerItemsList)): ?>
                        <?php foreach ($tickerItemsList as $tRow): ?>
                          <tr id="ticker-row-<?php echo $tRow->id; ?>">  
                            <td>
                              <input type="text" name="tickerTitle[]" value="<?php echo esc($tRow->title); ?>" placeholder="e.g., Real-Time Analytics" class="form-control" />
                            </td>
                            <td>
                              <input type="number" name="tickerSortOrder[]" class="form-control text-center" value="<?php echo $tRow->sort_order; ?>" />
                            </td>
                            <td class="text-center">
                              <button type="button" onclick="$('#ticker-row-<?php echo $tRow->id; ?>').remove();" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger btn-sm">
                                <i class="fa fa-minus-circle"></i>
                              </button>
                            </td>
                          </tr>  
                        <?php endforeach; ?>
                      <?php endif; ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="2"></td>
                        <td class="text-center">
                          <button type="button" onclick="addHeroTickerRow();" data-bs-toggle="tooltip" title="Add Ticker Item" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus-circle"></i>
                          </button>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </fieldset>
            </div><!-- /#tab-hero -->

            <!-- ================================================================
                 TAB 2: PRODUCT OVERVIEW & SHOWROOM CANVAS
                 ================================================================ -->
            <div id="tab-overview" class="tab-pane">
              <fieldset>
                <legend class="text-primary fw-bold mb-4"><i class="fa-solid fa-desktop"></i> Header & Narrative Canvas</legend>
                
                <div class="row mb-4">
                  <label class="col-sm-2 col-form-label fw-bold">Overview Eyebrow</label>
                  <div class="col-sm-10">
                    <input type="text" name="overviewEyebrow" value="<?php echo set_value('overviewEyebrow', isset($overviewEyebrow) ? $overviewEyebrow : 'Understanding Platform Context'); ?>" placeholder="e.g., Understanding Platform Context" class="form-control" />
                  </div>
                </div>

                <div class="row mb-4">
                  <label class="col-sm-2 col-form-label fw-bold">Overview Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="overviewTitle" value="<?php echo set_value('overviewTitle', isset($overviewTitle) ? $overviewTitle : 'Product Overview'); ?>" placeholder="e.g., Product Overview" class="form-control" />
                  </div>
                </div>

                <div class="row mb-4">
                  <label class="col-sm-2 col-form-label fw-bold">Overview Description</label>
                  <div class="col-sm-10">
                    <textarea name="description" class="form-control ckeditor" rows="5" placeholder="Achieve up to 50% time savings..."><?php echo set_value('description', $description); ?></textarea>
                  </div>
                </div>

                <div class="row mb-4">
                  <label class="col-sm-2 col-form-label fw-bold">Showroom Main Showcase Image</label>
                  <div class="col-sm-10">
                    <?php if (!empty($image)): ?>
                      <div class="mb-2"><img src="<?php echo base_url($image); ?>" width="120" height="90" style="object-fit:cover;" class="border rounded shadow-sm" alt="Showroom Asset"></div>
                    <?php endif ?>
                    <input type="file" name="image" id="input-image" class="form-control" />
                  </div>
                </div>

                <div class="row mb-4">
                  <label class="col-sm-2 col-form-label fw-bold">Thumbnail Grid Icon</label>
                  <div class="col-sm-10">
                    <?php if (!empty($thumbnail)): ?>
                      <div class="mb-2"><img src="<?php echo base_url($thumbnail); ?>" width="50" height="50" style="object-fit:contain;" class="border rounded p-1" alt="Thumbnail"></div>
                    <?php endif ?>
                    <input type="file" name="thumbnail" id="input-thumbnail" class="form-control" />
                  </div>
                </div>
              </fieldset>

              <fieldset class="mt-4">
                <legend class="text-primary fw-bold mb-3"><i class="fa-solid fa-list-check"></i> Interactive Checklist Grid Matrix</legend>
                <div class="table-responsive">
                  <table id="overview-matrix" class="table table-striped table-bordered table-hover align-middle">
                    <thead class="table-dark">
                      <tr>
                        <td style="width: 30%;">Matrix Point Label</td>
                        <td style="width: 55%;">Matrix Description text</td>
                        <td style="width: 10%;">Sort Order</td>
                        <td style="width: 5%;" class="text-center">Action</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($overviewMatrixList)): ?>
                        <?php foreach ($overviewMatrixList as $key => $matrixRow): ?>
                          <tr id="overview-matrix-row<?php echo $matrixRow->id; ?>">  
                            <td>
                              <input type="text" name="overviewMatrixLabel[]" value="<?php echo esc($matrixRow->label); ?>" placeholder="e.g., Financial Consolidation" class="form-control" />
                            </td>
                            <td>
                              <textarea name="overviewMatrixText[]" placeholder="Describe the capabilities..." class="form-control" rows="2"><?php echo esc($matrixRow->text); ?></textarea>
                            </td>
                            <td>
                              <input type="number" name="overviewMatrixSortOrder[]" class="form-control text-center" value="<?php echo isset($matrixRow->sort_order) ? $matrixRow->sort_order : '0'; ?>" />
                            </td>
                            <td class="text-center">
                              <button type="button" onclick="$('#overview-matrix-row<?php echo $matrixRow->id; ?>').remove();" data-bs-toggle="tooltip" title="Remove Point" class="btn btn-danger btn-sm">
                                <i class="fa fa-minus-circle"></i>
                              </button>
                            </td>
                          </tr>  
                        <?php endforeach; ?>
                      <?php endif; ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="3"></td>
                        <td class="text-center">
                          <button type="button" onclick="addOverviewMatrixPoint();" data-bs-toggle="tooltip" title="Add New Checklist Point" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus-circle"></i>
                          </button>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </fieldset>

              <fieldset class="mt-4 pt-4 border-top">
                <legend class="text-primary fw-bold mb-3">
                  <i class="fa-solid fa-cloud-arrow-up"></i> Azure Marketplace Layout Payload
                </legend>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label fw-bold">Marketplace Hub HTML Markup</label>
                  <div class="col-sm-10">
                    <textarea name="marketplace_payload" class="form-control ckeditor" rows="12" placeholder="Paste or design the Marketplace structure here..."><?php echo isset($marketplace_payload) ? $marketplace_payload : ''; ?></textarea>
                  </div>
                </div>
              </fieldset>
            </div>

            <!-- ================================================================
                 TAB 3: PARTNER ECOSYSTEM / TRUST STRIP
                 ================================================================ -->
            <div id="tab-trust-strip" class="tab-pane">
              <fieldset>
                <legend class="text-info fw-bold mb-4"><i class="fa-solid fa-building-shield"></i> Trust Strips & Partner Branding Matrix</legend>
                
                <div class="row mb-4">
                  <label class="col-sm-2 col-form-label fw-bold">Section Heading Text</label>
                  <div class="col-sm-10">
                    <input type="text" name="trust_strip_title" value="<?php echo set_value('trust_strip_title', isset($trust_strip_title) ? $trust_strip_title : 'Our Partner Ecosystem'); ?>" placeholder="e.g., Our Partner Ecosystem" class="form-control" />
                  </div>
                </div>

                <div class="table-responsive mt-3">
                  <table id="trust-badges-matrix-table" class="table table-striped table-bordered table-hover align-middle">
                    <thead class="table-dark">
                      <tr>
                        <td style="width: 25%;">Logo Image Asset</td>
                        <td style="width: 35%;">Short Title</td>
                        <td style="width: 30%;">Short Subtitle</td>
                        <td style="width: 9%;">Sort Order</td>
                        <td style="width: 1%;" class="text-center">Action</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($trustBadgesList)): ?>
                        <?php foreach ($trustBadgesList as $badgeRow): ?>
                          <tr id="trust-badge-row-<?php echo $badgeRow->id; ?>">  
                            <td class="text-center">
                              <?php if (!empty($badgeRow->image)): ?>
                                <div class="mb-2">
                                  <img src="<?php echo base_url($badgeRow->image); ?>" width="40" height="40" style="object-fit: contain;" class="border rounded p-1" />
                                </div>
                                <input type="hidden" name="trust_badge_old_image[]" value="<?php echo $badgeRow->image; ?>" />
                              <?php endif; ?>
                              <input type="file" class="form-control form-control-sm" name="trustBadgeFiles[]" />
                            </td>
                            <td>
                              <input type="text" name="trustBadgeTitle[]" value="<?php echo esc($badgeRow->title); ?>" placeholder="e.g., Microsoft" class="form-control form-control-sm" />
                            </td>
                            <td>
                              <input type="text" name="trustBadgeSubtitle[]" value="<?php echo esc($badgeRow->subtitle); ?>" placeholder="e.g., Partner" class="form-control form-control-sm" />
                            </td>
                            <td>
                              <input type="number" name="trustBadgeSortOrder[]" class="form-control form-control-sm text-center" value="<?php echo $badgeRow->sort_order; ?>" />
                            </td>
                            <td class="text-center">
                              <button type="button" onclick="$('#trust-badge-row-<?php echo $badgeRow->id; ?>').remove();" data-bs-toggle="tooltip" title="Remove Badge" class="btn btn-danger btn-sm">
                                <i class="fa fa-minus-circle"></i>
                              </button>
                            </td>
                          </tr>  
                        <?php endforeach; ?>
                      <?php endif; ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="4"></td>
                        <td class="text-center">
                          <button type="button" onclick="addTrustBadgeRow();" data-bs-toggle="tooltip" title="Add New Badge Element" class="btn btn-success btn-sm">
                            <i class="fa fa-plus-circle"></i>
                          </button>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </fieldset>
            </div>

            <!-- ================================================================
                 TAB 4: "WHY CHOOSE US" / BENEFIT CARDS
                 ================================================================ -->
            <div id="tab-why-choose-us" class="tab-pane">
              <fieldset>
                <legend class="text-success fw-bold mb-4">
                  <i class="fa-solid fa-square-check"></i> "Why Choose Us" / Benefit Cards Section
                </legend>
                
                <div class="row mb-4">
                  <label class="col-sm-2 col-form-label fw-bold">Section Main Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="benefitsSectionTitle" value="<?php echo set_value('benefitsSectionTitle', isset($benefitsSectionTitle) ? $benefitsSectionTitle : 'Why Accounts payable automation?'); ?>" placeholder="e.g., Why Accounts payable automation?" class="form-control" />
                  </div>
                </div>

                <div class="table-responsive">
                  <table id="why-choose-us-table" class="table table-striped table-bordered table-hover align-middle">
                    <thead class="table-dark">
                      <tr>
                        <td style="width: 25%;">Card Title Header</td>
                        <td style="width: 35%;">Card Description</td>
                        <td style="width: 15%;">Icon Circle Color</td>
                        <td style="width: 15%;">FontAwesome Icon</td>
                        <td style="width: 8%;">Sort</td>
                        <td style="width: 2%;" class="text-center">Action</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($whyChooseUsList)): ?>
                        <?php foreach ($whyChooseUsList as $whyRow): ?>
                          <tr id="why-row-<?php echo $whyRow->id; ?>">  
                            <td>
                              <input type="text" name="whyTitle[]" value="<?php echo esc($whyRow->title); ?>" placeholder="e.g., Faster Financial Close" class="form-control form-control-sm" />
                            </td>
                            <td>
                              <textarea name="whySubtitle[]" placeholder="e.g., Reduce month-end closing timelines..." class="form-control form-control-sm" rows="2"><?php echo esc($whyRow->subtitle); ?></textarea>
                            </td>
                            <td>
                              <select name="whyCardTheme[]" class="form-select form-select-sm">
                                <option value="blue-theme" <?php echo ($whyRow->card_theme == 'blue-theme') ? 'selected' : ''; ?>>🔵 Blue (#0066cc)</option>
                                <option value="green-theme" <?php echo ($whyRow->card_theme == 'green-theme') ? 'selected' : ''; ?>>🟢 Green (#00a86b)</option>
                                <option value="purple-theme" <?php echo ($whyRow->card_theme == 'purple-theme') ? 'selected' : ''; ?>>🟣 Purple (#7c3aed)</option>
                                <option value="teal-theme" <?php echo ($whyRow->card_theme == 'teal-theme') ? 'selected' : ''; ?>>🌊 Dark Teal (#0d9488)</option>
                              </select>
                            </td>
                            <td>
                              <select name="whyIconClass[]" class="form-select form-select-sm">
                                <option value="fas fa-bolt" <?php echo ($whyRow->icon_class == 'fas fa-bolt') ? 'selected' : ''; ?>>⚡ Lightning / Bolt</option>
                                <option value="fas fa-database" <?php echo ($whyRow->icon_class == 'fas fa-database') ? 'selected' : ''; ?>>🗄️ Database / Storage</option>
                                <option value="fas fa-chart-line" <?php echo ($whyRow->icon_class == 'fas fa-chart-line') ? 'selected' : ''; ?>>📈 Chart / Analytics</option>
                                <option value="fas fa-shield-alt" <?php echo ($whyRow->icon_class == 'fas fa-shield-alt') ? 'selected' : ''; ?>>🛡️ Shield / Security</option>
                                <option value="fas fa-check-circle" <?php echo ($whyRow->icon_class == 'fas fa-check-circle') ? 'selected' : ''; ?>>✅ Checkmark</option>
                              </select>
                            </td>
                            <td>
                              <input type="number" name="whySortOrder[]" class="form-control form-control-sm text-center" value="<?php echo $whyRow->sort_order; ?>" />
                            </td>
                            <td class="text-center">
                              <button type="button" onclick="$('#why-row-<?php echo $whyRow->id; ?>').remove();" data-bs-toggle="tooltip" title="Remove Card" class="btn btn-danger btn-sm">
                                <i class="fa fa-minus-circle"></i>
                              </button>
                            </td>
                          </tr>  
                        <?php endforeach; ?>
                      <?php endif; ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="5"></td>
                        <td class="text-center">
                          <button type="button" onclick="addWhyChooseUsRow();" data-bs-toggle="tooltip" title="Add Card" class="btn btn-success btn-sm">
                            <i class="fa fa-plus-circle"></i>
                          </button>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </fieldset>
            </div>

            <!-- ================================================================
                 TAB 5: KEY CAPABILITIES (BENTO GRID)
                 ================================================================ -->
            <div id="tab-capabilities" class="tab-pane">
              <fieldset>
                <legend class="fw-bold mb-3"><i class="fa-solid fa-cubes"></i> Core Capabilities Header</legend>
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label fw-bold">Section Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="keyTitle" value="<?php echo set_value('keyTitle', $keyTitle); ?>" placeholder="e.g., Key Capabilities & Features" class="form-control" />
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label fw-bold">Section Description</label>
                  <div class="col-sm-10">
                    <textarea name="keyDescription" class="form-control" rows="3" placeholder="Discover high-performance system configurations..."><?php echo set_value('keyDescription', $keyDescription); ?></textarea>
                  </div>
                </div>
              </fieldset>

              <fieldset class="mt-4">
                <legend class="fw-bold mb-3"><i class="fa-solid fa-list"></i> Capabilities Cards Repeater</legend>
                <div class="table-responsive">
                  <table id="capabilities" class="table table-striped table-bordered table-hover align-middle">
                    <thead class="table-dark">
                      <tr>
                        <td class="text-start required" style="width: 30%;">Title</td>
                        <td class="text-start" style="width: 55%;">Description</td>
                        <td class="text-start" style="width: 10%;">Sort Order</td>
                        <td style="width: 5%;" class="text-center">Action</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($capabilitiesList)){ foreach ($capabilitiesList as $key => $row) {?>
                        <tr id="capabilities-row<?php echo $row->id; ?>">  
                          <td class="text-left"><input type="text" name="capabilitiesTitle[]" value="<?php echo esc($row->title); ?>" placeholder="Title" class="form-control" /></td>
                          <td class="text-left"><textarea name="capabilitiesDescription[]" placeholder="Description" class="form-control" rows="2"><?php echo esc($row->description); ?></textarea></td>
                          <td class="text-right"><input type="number" name="capabilitiesSortOrder[]" placeholder="Sort Order" class="form-control text-center" value="<?php echo $row->sort_order; ?>" /></td>
                          <td class="text-center">
                            <button type="button" onclick="$('#capabilities-row<?php echo $row->id; ?>').remove();" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button>
                          </td>
                        </tr>  
                      <?php } } ?>  
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="3"></td>
                        <td class="text-center">
                          <button type="button" onclick="addCapabilities();" data-bs-toggle="tooltip" title="Add Capability" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </fieldset>
            </div>

            <!-- ================================================================
                 TAB 6: STRATEGIC PARTNERSHIPS
                 ================================================================ -->
            <div id="tab-partnerships" class="tab-pane">
              <fieldset>
                <legend class="text-warning fw-bold mb-4"><i class="fa-solid fa-heading"></i> Partnerships Deck Header</legend>
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label fw-bold">Strategic Subheading</label>
                  <div class="col-sm-10">
                    <input type="text" name="partnershipSubheading" value="<?php echo set_value('partnershipSubheading', isset($partnershipSubheading) ? $partnershipSubheading : 'Strategic Value'); ?>" placeholder="e.g., Strategic Value" class="form-control" />
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label fw-bold">Section Main Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="partnershipTitle" value="<?php echo set_value('partnershipTitle', isset($partnershipTitle) ? $partnershipTitle : 'Why Our Partnerships Matter'); ?>" placeholder="e.g., Why Our Partnerships Matter" class="form-control" />
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label fw-bold">Section Description</label>
                  <div class="col-sm-10">
                    <textarea name="partnershipDescription" class="form-control" rows="3" placeholder="We combine global technology expertise..."><?php echo set_value('partnershipDescription', isset($partnershipDescription) ? $partnershipDescription : ''); ?></textarea>
                  </div>
                </div>
              </fieldset>

              <fieldset class="mt-4">
                <legend class="text-warning fw-bold mb-3"><i class="fa-solid fa-layer-group"></i> Stacking Cards Deck Matrix</legend>
                <div class="table-responsive">
                  <table id="partnership-cards-table" class="table table-striped table-bordered table-hover align-middle">
                    <thead class="table-dark">
                      <tr>
                        <td style="width: 25%;">Card Title</td>
                        <td style="width: 45%;">Card Body Description</td>
                        <td style="width: 15%;">FontAwesome Icon Class</td>
                        <td style="width: 10%;">Sort Order</td>
                        <td style="width: 5%;" class="text-center">Action</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($partnershipCardsList)): ?>
                        <?php foreach ($partnershipCardsList as $cardRow): ?>
                          <tr id="partnership-card-row-<?php echo $cardRow->id; ?>">  
                            <td>
                              <input type="text" name="partnerCardTitle[]" value="<?php echo esc($cardRow->title); ?>" placeholder="e.g., Collaborative Growth" class="form-control" />
                            </td>
                            <td>
                              <textarea name="partnerCardDesc[]" placeholder="Describe the partnership advantage..." class="form-control" rows="2"><?php echo esc($cardRow->description); ?></textarea>
                            </td>
                            <td>
                              <select name="partnerCardIcon[]" class="form-select icon-picker-select">
                                <?php  
                                $iconOptions = [
                                    'fas fa-handshake' => '🤝 Handshake / Collaborative',
                                    'fas fa-rocket' => '🚀 Rocket / Speed to Market',
                                    'fas fa-shield-alt' => '🛡️ Shield / Enterprise Grade',
                                    'fas fa-chart-line' => '📈 Chart / ROI Focused',
                                    'fas fa-people-arrows' => '👥 Community / Team',
                                    'fas fa-bolt' => '⚡ Bolt / High Performance',
                                    'fas fa-database' => '𝘛 Database / Centralized Data',
                                    'fas fa-globe' => '🌐 Globe / Global Footprint',
                                    'fas fa-lock' => '🔒 Lock / Bank-Level Security'
                                ];
                                foreach ($iconOptions as $value => $label): ?>
                                  <option value="<?php echo $value; ?>" <?php echo (isset($cardRow->icon_class) && $cardRow->icon_class == $value) ? 'selected' : ''; ?>>
                                    <?php echo $label; ?>
                                  </option>
                                <?php endforeach; ?>
                              </select>
                            </td>
                            <td>
                              <input type="number" name="partnerCardSortOrder[]" class="form-control text-center" value="<?php echo $cardRow->sort_order; ?>" />
                            </td>
                            <td class="text-center">
                              <button type="button" onclick="$('#partnership-card-row-<?php echo $cardRow->id; ?>').remove();" data-bs-toggle="tooltip" title="Remove Card" class="btn btn-danger btn-sm">
                                <i class="fa fa-minus-circle"></i>
                              </button>
                            </td>
                          </tr>  
                        <?php endforeach; ?>
                      <?php endif; ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="4"></td>
                        <td class="text-center">
                          <button type="button" onclick="addPartnershipCardRow();" data-bs-toggle="tooltip" title="Add Card Row" class="btn btn-warning btn-sm text-dark fw-bold">
                            <i class="fa fa-plus-circle"></i>
                          </button>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </fieldset>
            </div>

            <!-- ================================================================
                 TAB 7: USE CASES & INTERACTIVE MEDIA
                 ================================================================ -->
            <div id="tab-feature" class="tab-pane">
              <fieldset>
                <legend class="fw-bold mb-3"><i class="fa-solid fa-photo-film"></i> Use Cases Section Header</legend>
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label fw-bold">Section Main Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="caseTitle" value="<?php echo set_value('caseTitle', $caseTitle); ?>" placeholder="e.g., Key Benefits & Use Cases" class="form-control" />
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label fw-bold">Section Description</label>
                  <div class="col-sm-10">
                    <textarea name="casetDescription" class="form-control" rows="3"><?php echo set_value('casetDescription', $casetDescription); ?></textarea>
                  </div>
                </div>
              </fieldset>

              <fieldset class="mt-4">
                <legend class="fw-bold mb-3"><i class="fa-solid fa-layer-group"></i> Use Cases Media Items Repeater</legend>
                <div class="table-responsive">
                  <table id="feature" class="table table-striped table-bordered table-hover align-middle">
                    <thead class="table-dark">
                      <tr>
                        <td class="text-start required" style="width: 20%;">Title</td>
                        <td class="text-start required" style="width: 30%;">Description</td>
                        <td class="text-start" style="width: 20%;">Image Asset</td>
                        <td class="text-start" style="width: 15%;">YouTube Video ID</td>
                        <td class="text-start" style="width: 10%;">Sort Order</td>
                        <td style="width: 5%;" class="text-center">Action</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($featureList)){ foreach ($featureList as $key => $row) {?>
                        <tr id="feature-row<?php echo $row->id; ?>">  
                          <td class="text-left"><input type="text" name="featureTitle[]" value="<?php echo esc($row->title); ?>" placeholder="Title" class="form-control" /></td>
                          <td class="text-left"><textarea name="featureDescription[]" placeholder="Description" class="form-control" rows="2"><?php echo esc($row->description); ?></textarea></td>
                          <td class="text-center">
                            <?php if (!empty($row->image)): ?>
                              <div class="mb-1">
                                <img src="<?php echo base_url($row->image) ?>" width="60" height="40" style="object-fit:cover;" class="border rounded" alt="Feature Image">
                                <input type="hidden" name="feature_old_image[]" value="<?php echo $row->image; ?>">
                              </div>
                            <?php endif ?>
                            <input type="file" class="form-control form-control-sm" name="featureImages[]" />
                          </td>
                          <td class="text-left"><input type="text" name="featureYoutube[]" value="<?php echo esc($row->youtube); ?>" placeholder="e.g., dQw4w9WgXcQ" class="form-control" /></td>
                          <td class="text-right"><input type="number" name="featureSortOrder[]" placeholder="Sort Order" class="form-control text-center" value="<?php echo $row->sort_order; ?>" /></td>
                          <td class="text-center">
                            <button type="button" onclick="$('#feature-row<?php echo $row->id; ?>').remove();" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button>
                          </td>
                        </tr>  
                      <?php } } ?>  
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="5"></td>
                        <td class="text-center">
                          <button type="button" onclick="addFeature();" data-bs-toggle="tooltip" title="Add Use Case" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </fieldset>
            </div>

            <!-- ================================================================
                 TAB 8: BUSINESS BENEFITS METRICS
                 ================================================================ -->
            <div id="tab-business-benefits" class="tab-pane">
              <fieldset>
                <legend class="text-success fw-bold mb-4"><i class="fa-solid fa-chart-column"></i> Business Benefits Metrics Matrix</legend>
                
                <div class="table-responsive">
                  <table id="business-benefits-table" class="table table-striped table-bordered table-hover align-middle">
                    <thead class="table-dark">
                      <tr>
                        <td style="width: 20%;">Card Title Header</td>
                        <td style="width: 12%;">Stat Number</td>
                        <td style="width: 10%;">Suffix (%, x7)</td>
                        <td style="width: 25%;">Footer Subtitle</td>
                        <td style="width: 15%;">Accent Theme</td>
                        <td style="width: 12%;">Icon Class</td>
                        <td style="width: 5%;">Sort</td>
                        <td style="width: 1%;" class="text-center">Action</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($businessBenefitsList)): ?>
                        <?php foreach ($businessBenefitsList as $benefitRow): ?>
                          <tr id="benefit-row-<?php echo $benefitRow->id; ?>">  
                            <td><input type="text" name="benefitTitle[]" value="<?php echo esc($benefitRow->title); ?>" placeholder="e.g., Reduce Closing Time" class="form-control form-control-sm" /></td>
                            <td><input type="text" name="benefitStatValue[]" value="<?php echo esc($benefitRow->stat_value); ?>" placeholder="e.g., 41" class="form-control form-control-sm text-center fw-bold" /></td>
                            <td><input type="text" name="benefitStatSuffix[]" value="<?php echo esc($benefitRow->stat_suffix); ?>" placeholder="e.g., %" class="form-control form-control-sm text-center" /></td>
                            <td><input type="text" name="benefitSubtitle[]" value="<?php echo esc($benefitRow->subtitle); ?>" placeholder="e.g., Faster month-end close" class="form-control form-control-sm" /></td>
                            <td>
                              <select name="benefitCardTheme[]" class="form-select form-select-sm">
                                <option value="blue-theme" <?php echo ($benefitRow->card_theme == 'blue-theme') ? 'selected' : ''; ?>>🔵 Blue Theme</option>
                                <option value="green-theme" <?php echo ($benefitRow->card_theme == 'green-theme') ? 'selected' : ''; ?>>🟢 Green Theme</option>
                                <option value="purple-theme" <?php echo ($benefitRow->card_theme == 'purple-theme') ? 'selected' : ''; ?>>🟣 Purple Theme</option>
                                <option value="orange-theme" <?php echo ($benefitRow->card_theme == 'orange-theme') ? 'selected' : ''; ?>>🟠 Orange Theme</option>
                              </select>
                            </td>
                            <td>
                              <select name="benefitIconClass[]" class="form-select form-select-sm">
                                <option value="fa-regular fa-clock" <?php echo ($benefitRow->icon_class == 'fa-regular fa-clock') ? 'selected' : ''; ?>>🕒 Clock</option>
                                <option value="fa-regular fa-circle-check" <?php echo ($benefitRow->icon_class == 'fa-regular fa-circle-check') ? 'selected' : ''; ?>>⦾ Check</option>
                                <option value="fa-regular fa-file-lines" <?php echo ($benefitRow->icon_class == 'fa-regular fa-file-lines') ? 'selected' : ''; ?>>📄 Document</option>
                                <option value="fa-regular fa-eye" <?php echo ($benefitRow->icon_class == 'fa-regular fa-eye') ? 'selected' : ''; ?>>👁 Eye</option>
                              </select>
                            </td>
                            <td><input type="number" name="benefitSortOrder[]" class="form-control form-control-sm text-center" value="<?php echo $benefitRow->sort_order; ?>" /></td>
                            <td class="text-center">
                              <button type="button" onclick="$('#benefit-row-<?php echo $benefitRow->id; ?>').remove();" data-bs-toggle="tooltip" title="Remove Card" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button>
                            </td>
                          </tr>  
                        <?php endforeach; ?>
                      <?php endif; ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="7"></td>
                        <td class="text-center">
                          <button type="button" onclick="addBusinessBenefitRow();" data-bs-toggle="tooltip" title="Add Metric Card" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i></button>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </fieldset>
            </div>

            <!-- ================================================================
                 TAB 9: TARGET INDUSTRIES MATRIX
                 ================================================================ -->
            <div id="tab-industries" class="tab-pane">
              <fieldset>
                <legend class="fw-bold mb-4"><i class="fa-solid fa-industry"></i> Industry Verticals Configuration</legend>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label fw-bold">Section Main Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="industryTitle" value="<?php echo set_value('industryTitle', $industryTitle); ?>" placeholder="e.g., Industries Applicable" class="form-control" />
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label fw-bold">Section Description</label>
                  <div class="col-sm-10">
                    <textarea name="industryDescription" class="form-control" rows="3" placeholder="Elevate your core operating parameters..."><?php echo set_value('industryDescription', $industryDescription); ?></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label fw-bold">Select Applicable Industries</label>
                  <div class="col-sm-10">
                    <select name="industries[]" class="form-control multiple" multiple="multiple">
                      <option value="">-- Select Industries --</option>
                      <?php if(!empty($inudstryList)){ foreach ($inudstryList as $key => $value){ ?>
                        <option value="<?php echo $value->id; ?>" <?php echo @in_array($value->id, $industries) ? 'selected' : ''; ?>>
                          <?php echo esc($value->name); ?>
                        </option>
                      <?php } } ?>
                    </select>
                  </div>
                </div>
              </fieldset>

              <!-- Category Selector Dropdown -->
              <div class="row mb-3 d-none">
                <label class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">        
                  <select name="category_id" class="form-control">
                    <option value="">Select Category</option>
                    <?php if(!empty($categoryList)){ foreach ($categoryList as $key => $value){ ?>
                      <option value="<?php echo $value->id; ?>" <?php echo $value->id == $category_id ? 'selected' : ''; ?>><?php echo $value->name; ?></option>
                    <?php } } ?>
                  </select>
                </div>
              </div>
            </div>

            <!-- ================================================================
                 TAB 10: CLIENT TESTIMONIALS
                 ================================================================ -->
            <div id="tab-testimonials" class="tab-pane">
              <div class="table-responsive">
                <table id="testimonial-table" class="table table-striped table-bordered table-hover align-middle">
                  <thead class="table-dark">
                    <tr>
                      <td class="text-start required" style="width: 20%;">Client Name</td>
                      <td class="text-start required" style="width: 20%;">Designation / Role</td>
                      <td class="text-start required" style="width: 35%;">Feedback / Review Text</td>
                      <td class="text-start" style="width: 15%;">Client Photo</td>
                      <td class="text-start" style="width: 9%;">Sort Order</td>
                      <td style="width: 1%;" class="text-center">Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($testimonialsList)){ foreach ($testimonialsList as $key => $row) { ?>
                      <tr id="testimonial-row<?php echo $row->id; ?>">  
                        <td>
                          <input type="text" name="testimonialName[]" value="<?php echo esc($row->name); ?>" placeholder="e.g., Kirthivasan A." class="form-control" />
                        </td>
                        <td>
                          <input type="text" name="testimonialDesignation[]" value="<?php echo esc($row->designation); ?>" placeholder="e.g., Operations Director" class="form-control" />
                        </td>
                        <td>
                          <textarea name="testimonialDescription[]" placeholder="Review Text" class="form-control" rows="2"><?php echo esc($row->description); ?></textarea>
                        </td>
                        <td class="text-center">
                          <?php if (!empty($row->image)): ?>
                            <div class="mb-1">
                              <img src="<?php echo base_url($row->image); ?>" width="45" height="45" style="object-fit: cover;" class="border rounded-circle">
                              <input type="hidden" name="testimonial_old_image[]" value="<?php echo $row->image; ?>">
                            </div>
                          <?php endif; ?>
                          <input type="file" class="form-control form-control-sm" name="testimonialImages[]" />
                        </td>
                        <td>
                          <input type="number" name="testimonialSortOrder[]" placeholder="Order" class="form-control text-center" value="<?php echo isset($row->sort_order) ? $row->sort_order : '0'; ?>" />
                        </td>
                        <td class="text-center">
                          <button type="button" onclick="$('#testimonial-row<?php echo $row->id; ?>').remove();" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger btn-sm">
                            <i class="fa fa-minus-circle"></i>
                          </button>
                        </td>
                      </tr>  
                    <?php } } ?>  
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="5"></td>
                      <td class="text-center">
                        <button type="button" onclick="addTestimonialRow();" data-bs-toggle="tooltip" title="Add Testimonial" class="btn btn-success btn-sm">
                          <i class="fa fa-plus-circle"></i>
                        </button>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>

            <!-- ================================================================
                 TAB 11: SEO SETTINGS & PUBLISHING STATUS
                 ================================================================ -->
            <div id="tab-seo-settings" class="tab-pane">
              <fieldset>
                <legend class="text-secondary fw-bold mb-4"><i class="fa-solid fa-sliders"></i> Search Engine Optimization & Publishing Controls</legend>

                <div class="row mb-3 required">
                  <label class="col-sm-2 col-form-label fw-bold">Meta Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="metaTitle" value="<?php echo set_value('metaTitle', $metaTitle); ?>" placeholder="Primary SEO Title" class="form-control" />
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label fw-bold">Meta Keywords</label>
                  <div class="col-sm-10">
                    <textarea name="metaKeyword" class="form-control" rows="3" placeholder="Comma-separated SEO keywords..."><?php echo set_value('metaKeyword', $metaKeyword); ?></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label fw-bold">Meta Description</label>
                  <div class="col-sm-10">
                    <textarea name="metaDescription" class="form-control" rows="3" placeholder="Brief search engine description snippet..."><?php echo set_value('metaDescription', $metaDescription); ?></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label fw-bold">URL Slug (Optional)</label>
                  <div class="col-sm-10">
                    <input type="text" name="slug" value="<?php echo set_value('slug', $slug); ?>" placeholder="e.g., product-name-slug" class="form-control" />
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="input-status" class="col-sm-2 col-form-label fw-bold">Publish Status</label>
                  <div class="col-sm-10">
                    <div class="form-check form-switch form-switch-lg">
                      <input type="hidden" name="status" value="0" />
                      <input type="checkbox" name="status" value="1" id="input-status" class="form-check-input" <?php echo $status == 1 ? 'checked' : ''; ?> />
                    </div>
                  </div>
                </div>
              </fieldset>
            </div>

          </div><!-- /.tab-content -->
        </form>

      </div>
    </div>
  </div>
</div>

<!-- ================================================================
     DYNAMIC ROW ADDER SCRIPTS (ALL PRESERVED AND COMPLETE)
     ================================================================ -->
<script type="text/javascript">
  var hero_ticker_idx = 0;
  function addHeroTickerRow() {
    var html  = '<tr id="ticker-row-new' + hero_ticker_idx + '">';
    html += '    <td><input type="text" name="tickerTitle[]" placeholder="e.g., Bank-Level Security" class="form-control" /></td>';
    html += '    <td><input type="number" name="tickerSortOrder[]" class="form-control text-center" value="0" /></td>';
    html += '    <td class="text-center"><button type="button" onclick="$(\'#ticker-row-new' + hero_ticker_idx + '\').remove();" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';
    $('#hero-ticker-table tbody').append(html);
    hero_ticker_idx++;
  }

  var feature = 0;
  function addFeature() {
    var html  = '<tr id="feature-row' + feature + '">';
    html += '  <td class="text-left"><input type="text" name="featureTitle[]" placeholder="Title" class="form-control required" /></td>';
    html += '  <td class="text-left"><textarea name="featureDescription[]" placeholder="Description" class="form-control" rows="2"></textarea></td>';
    html += '  <td class="text-center"><input type="file" class="form-control form-control-sm" name="featureImages[]" id="input-image' + feature + '" /></td>';
    html += '  <td class="text-left"><input type="text" name="featureYoutube[]" placeholder="YouTube Video ID" class="form-control" /></td>';
    html += '  <td class="text-right"><input type="number" name="featureSortOrder[]" placeholder="Sort" class="form-control text-center" value="0" /></td>';
    html += '  <td class="text-center"><button type="button" onclick="$(\'#feature-row' + feature  + '\').remove();" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';
    $('#feature tbody').append(html);
    feature++;
  }

  var capabilities = 0;
  function addCapabilities() {
    var html  = '<tr id="capabilities-row' + capabilities + '">';
    html += '  <td class="text-left"><input type="text" name="capabilitiesTitle[]" placeholder="Title" class="form-control required" /></td>';
    html += '  <td class="text-left"><textarea name="capabilitiesDescription[]" placeholder="Description" class="form-control" rows="2"></textarea></td>';
    html += '  <td class="text-right"><input type="number" name="capabilitiesSortOrder[]" placeholder="Sort" class="form-control text-center" value="0" /></td>';
    html += '  <td class="text-center"><button type="button" onclick="$(\'#capabilities-row' + capabilities + '\').remove();" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';
    $('#capabilities tbody').append(html);
    capabilities++;
  }

  var matrix_point_row = 0;
  function addOverviewMatrixPoint() {
    var html  = '<tr id="overview-matrix-row-new' + matrix_point_row + '">';
    html += '  <td><input type="text" name="overviewMatrixLabel[]" placeholder="e.g., Currency Translation" class="form-control required" /></td>';
    html += '  <td><textarea name="overviewMatrixText[]" placeholder="Describe tracking capabilities..." class="form-control required" rows="2"></textarea></td>';
    html += '  <td><input type="number" name="overviewMatrixSortOrder[]" class="form-control text-center" value="0" /></td>';
    html += '  <td class="text-center"><button type="button" onclick="$(\'#overview-matrix-row-new' + matrix_point_row + '\').remove();" data-bs-toggle="tooltip" title="Remove Point" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';
    $('#overview-matrix tbody').append(html);
    matrix_point_row++;
  }

  var partner_card_idx = 0;
  function addPartnershipCardRow() {
    var html  = '<tr id="partner-card-row-new' + partner_card_idx + '">';
    html += '    <td><input type="text" name="partnerCardTitle[]" placeholder="e.g., Speed to Market" class="form-control required" /></td>';
    html += '    <td><textarea name="partnerCardDesc[]" placeholder="Describe the card advantage..." class="form-control required" rows="2"></textarea></td>';
    html += '    <td>';
    html += '      <select name="partnerCardIcon[]" class="form-select">';
    html += '        <option value="fas fa-handshake">🤝 Handshake / Collaborative</option>';
    html += '        <option value="fas fa-rocket">🚀 Rocket / Speed to Market</option>';
    html += '        <option value="fas fa-shield-alt">🛡️ Shield / Enterprise Grade</option>';
    html += '        <option value="fas fa-chart-line">📈 Chart / ROI Focused</option>';
    html += '        <option value="fas fa-people-arrows">👥 Community / Team</option>';
    html += '        <option value="fas fa-bolt">⚡ Bolt / High Performance</option>';
    html += '        <option value="fas fa-database">𝘛 Database / Centralized Data</option>';
    html += '        <option value="fas fa-globe">🌐 Globe / Global Footprint</option>';
    html += '        <option value="fas fa-lock">🔒 Lock / Bank-Level Security</option>';
    html += '      </select>';
    html += '    </td>';
    html += '    <td><input type="number" name="partnerCardSortOrder[]" class="form-control text-center" value="0" /></td>';
    html += '    <td class="text-center"><button type="button" onclick="$(\'#partner-card-row-new' + partner_card_idx + '\').remove();" data-bs-toggle="tooltip" title="Remove Card" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';
    $('#partnership-cards-table tbody').append(html);
    partner_card_idx++;
  }

  var trust_badge_idx = 0;
  function addTrustBadgeRow() {
    var html  = '<tr id="trust-badge-row-new' + trust_badge_idx + '">';
    html += '    <td><input type="file" class="form-control form-control-sm" name="trustBadgeFiles[]" /></td>';
    html += '    <td><input type="text" name="trustBadgeTitle[]" placeholder="e.g., Microsoft" class="form-control form-control-sm" /></td>';
    html += '    <td><input type="text" name="trustBadgeSubtitle[]" placeholder="e.g., Power Platform" class="form-control form-control-sm" /></td>';
    html += '    <td><input type="number" name="trustBadgeSortOrder[]" class="form-control form-control-sm text-center" value="0" /></td>';
    html += '    <td class="text-center"><button type="button" onclick="$(\'#trust-badge-row-new' + trust_badge_idx + '\').remove();" data-bs-toggle="tooltip" title="Remove Row" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';
    $('#trust-badges-matrix-table tbody').append(html);
    trust_badge_idx++;
  }

  var why_card_idx = 0;
  function addWhyChooseUsRow() {
    var html  = '<tr id="why-row-new' + why_card_idx + '">';
    html += '    <td><input type="text" name="whyTitle[]" placeholder="e.g., Faster Financial Close" class="form-control form-control-sm" /></td>';
    html += '    <td><textarea name="whySubtitle[]" placeholder="e.g., Reduce month-end closing timelines..." class="form-control form-control-sm" rows="2"></textarea></td>';
    html += '    <td>';
    html += '      <select name="whyCardTheme[]" class="form-select form-select-sm">';
    html += '        <option value="blue-theme">🔵 Blue (#0066cc)</option>';
    html += '        <option value="green-theme">🟢 Green (#00a86b)</option>';
    html += '        <option value="purple-theme">🟣 Purple (#7c3aed)</option>';
    html += '        <option value="teal-theme">🌊 Dark Teal (#0d9488)</option>';
    html += '      </select>';
    html += '    </td>';
    html += '    <td>';
    html += '      <select name="whyIconClass[]" class="form-select form-select-sm">';
    html += '        <option value="fas fa-bolt">⚡ Lightning / Bolt</option>';
    html += '        <option value="fas fa-database">T Database / Storage</option>';
    html += '        <option value="fas fa-chart-line">📈 Chart / Analytics</option>';
    html += '        <option value="fas fa-shield-alt">🛡️ Shield / Security</option>';
    html += '        <option value="fas fa-check-circle">✅ Checkmark</option>';
    html += '      </select>';
    html += '    </td>';
    html += '    <td><input type="number" name="whySortOrder[]" class="form-control form-control-sm text-center" value="0" /></td>';
    html += '    <td class="text-center"><button type="button" onclick="$(\'#why-row-new' + why_card_idx + '\').remove();" data-bs-toggle="tooltip" title="Remove Card" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';
    $('#why-choose-us-table tbody').append(html);
    why_card_idx++;
  }

  var benefit_card_idx = 0;
  function addBusinessBenefitRow() {
    var html  = '<tr id="benefit-row-new' + benefit_card_idx + '">';
    html += '    <td><input type="text" name="benefitTitle[]" placeholder="e.g., Reduce Closing Time" class="form-control form-control-sm" /></td>';
    html += '    <td><input type="text" name="benefitStatValue[]" placeholder="e.g., 41" class="form-control form-control-sm text-center fw-bold" /></td>';
    html += '    <td><input type="text" name="benefitStatSuffix[]" placeholder="e.g., %" class="form-control form-control-sm text-center" /></td>';
    html += '    <td><input type="text" name="benefitSubtitle[]" placeholder="e.g., Faster month-end close" class="form-control form-control-sm" /></td>';
    html += '    <td>';
    html += '      <select name="benefitCardTheme[]" class="form-select form-select-sm">';
    html += '        <option value="blue-theme">🔵 Blue Theme</option>';
    html += '        <option value="green-theme">🟢 Green Theme</option>';
    html += '        <option value="purple-theme">🟣 Purple Theme</option>';
    html += '        <option value="orange-theme">🟠 Orange Theme</option>';
    html += '      </select>';
    html += '    </td>';
    html += '    <td>';
    html += '      <select name="benefitIconClass[]" class="form-select form-select-sm">';
    html += '        <option value="fa-regular fa-clock">🕒 Clock</option>';
    html += '        <option value="fa-regular fa-circle-check">⦾ Check</option>';
    html += '        <option value="fa-regular fa-file-lines">📄 Document</option>';
    html += '        <option value="fa-regular fa-eye">👁 Eye</option>';
    html += '      </select>';
    html += '    </td>';
    html += '    <td><input type="number" name="benefitSortOrder[]" class="form-control form-control-sm text-center" value="0" /></td>';
    html += '    <td class="text-center"><button type="button" onclick="$(\'#benefit-row-new' + benefit_card_idx + '\').remove();" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';
    $('#business-benefits-table tbody').append(html);
    benefit_card_idx++;
  }

  var testimonial_row = 0;
  function addTestimonialRow() {
    var html  = '<tr id="testimonial-row-new' + testimonial_row + '">';
    html += '  <td class="text-left"><input type="text" name="testimonialName[]" placeholder="Client Name" class="form-control required" /></td>';
    html += '  <td class="text-left"><input type="text" name="testimonialDesignation[]" placeholder="Designation" class="form-control required" /></td>';
    html += '  <td class="text-left"><textarea name="testimonialDescription[]" placeholder="Review Text" class="form-control required" rows="2"></textarea></td>';
    html += '  <td class="text-center"><input type="file" class="form-control form-control-sm" name="testimonialImages[]" /></td>';
    html += '  <td class="text-right"><input type="number" name="testimonialSortOrder[]" placeholder="Order" class="form-control text-center" value="0" /></td>';
    html += '  <td class="text-center"><button type="button" onclick="$(\'#testimonial-row-new' + testimonial_row + '\').remove();" data-bs-toggle="tooltip" title="Remove" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';
    $('#testimonial-table tbody').append(html);
    testimonial_row++;
  }
</script>

<?php $this->endSection(); ?>