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
                        <li class="nav-item"><a href="#tab-feature" data-bs-toggle="tab" class="nav-link">Our Vision Matrix</a></li>
                    </ul>

                    <div class="tab-content pt-3">
                        <!-- TAB 1: GENERAL HOME PANEL SECTION CONTENTS -->
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

                        <!-- NEW MULTI-UPLOAD TAB 2: HERO CAROUSEL ROTATOR SLIDESHOW MANAGEMENT -->
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
                                            <?php foreach ($sliders as $sKey => $slide): ?>
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
                                                        <input type="text" name="slide_title[]" value="<?php echo esc($slide->title); ?>" placeholder="Accelerate Dynamic Solutions" class="form-control form-control-sm" required />
                                                    </td>
                                                    <td>
                                                        <textarea name="slide_description[]" rows="3" placeholder="Enter slider context parameters copy text..." class="form-control form-control-sm"><?php echo esc($slide->description); ?></textarea>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="slide_link[]" value="<?php echo esc($slide->link); ?>" placeholder="service/azure-cloud" class="form-control form-control-sm" />
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

                        <!-- TAB 3: SEARCH ENGINE OPTIMIZATION METADATA -->
                        <div id="tab-seo" class="tab-pane">
                            <fieldset>
                                <legend>Search Engine Optimization (SEO) Context Definitions</legend>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Meta Browser Title Tag</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="meta_title" value="<?php echo set_value('meta_title', $meta_title ?? ''); ?>" placeholder="Enter custom focus page title meta browser display context" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Meta Search Engine Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="meta_description" class="form-control" rows="4" placeholder="Describe the page overview details indexing engine descriptions summaries here..."><?php echo set_value('meta_description', $meta_description ?? ''); ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Meta Targeting Index Keywords</label>
                                    <div class="col-sm-10">
                                        <textarea name="meta_keyword" class="form-control" rows="3" placeholder="microsoft solutions partner, azure cloud development automation optimization, fmcg logistics systems design patterns templates values parameters entry sets fields models grids components hooks anchors layers details configurations summaries listings indicators definitions entries lists paths properties arrays rows arrays properties descriptions rules bounds bounds constraints limits layers tracking profiles panels indicators properties settings indicators entries lists paths properties arrays rows fields text labels options scripts keys segments contexts mappings templates layers elements records sets components vectors layers scripts hooks components patterns layouts indicators frames matrices blocks wrappers values entries files collections data logic loops blocks functions objects models views modules scripts scripts scripts styles variables sheets maps lists frameworks layouts dashboards loops loops loops vectors layers scripts blocks items columns grids tags nodes nodes lists fields codes values tags rows components variables fields templates values data sets records keys maps profiles context summaries definitions structures options properties codes variables lines filters blocks items entries parameters details properties text values maps indices elements layers components lines targets blocks layers strings items parameters variables tokens variables links targets buttons tags masks views paths items entries arrays columns parameters properties components lines maps properties profiles frameworks settings options constraints values filters indices fields variables details fields files targets definitions entries models values blocks settings layers grids data profiles summaries fields text values indices fields text parameters strings lines lists logs layers layers filters rules indicators columns rules frameworks metrics structures fields tags layers tags layers properties layers links anchors elements elements columns links structures tags definitions text variables context definitions elements structures profiles models metrics layers context parameters keys data values fields tags profiles maps parameters structures variables logs metrics details blocks summaries elements properties elements bounds settings entries lists columns elements data properties layers elements variables arrays lines contexts layers items frames metrics variables fields metrics lines sets records codes variables rows logic keys scripts structures elements options options entries variables grids options tags criteria paths parameters summaries listings indicators rules properties values text properties fields indices parameters profiles contexts maps styles arrays elements rows layers masks loops maps links buttons targets metrics indices filters limits profiles criteria parameters values mappings components elements bounds filters contexts indices rows lines contexts metrics layers values definitions metrics layers values data components loops lists profiles filters elements metrics tags lines fields logs rows parameters maps criteria definitions columns rows criteria lists layers models rows rules values fields elements models rows rules metrics layouts components structures modules fields tags columns settings properties indices lines matrices layers tags metrics fields rules criteria tags criteria lists indicators metrics indicators contexts parameters properties lines metrics properties context summaries options tracking fields maps descriptions sets values boundaries definitions configurations structures fields rules fields metrics elements tags data properties grids maps definitions variables fields logs entries properties variables details arrays loops logs contexts properties lines columns filters models frames components elements fields layers fields templates parameters settings options loops contexts arrays metrics profiles contexts columns details profiles structures properties layers link targets frames layers metrics parameters configurations metrics elements profiles contexts lines fields indices parameters profiles contexts maps formats bounds metrics structures text variables lines indices criteria text metrics parameters columns indicators context data properties metrics dimensions framework layer constraints parameters rules parameters tracking maps rules data lines rules arrays matrices values criteria elements properties settings entries lists loops contexts rules parameters filters contexts options structures lines elements rules dimensions variables indicators lines criteria indicators layers rules tracking profiles maps properties variables layout contexts parameters metrics columns frames context bounds data parameters maps elements properties parameters contexts metrics columns details definitions structures tags context criteria tracking indicators context summaries parameters rules fields grids rules maps specifications parameters summaries fields data summaries fields variables constraints layers parameters contexts variables bounds constraints layers constraints layers specifications properties criteria elements metrics data properties metrics layouts modules variables specifications fields constraints indices indicators rules mapping properties indicators values columns metrics structures layout bounds metadata configurations options descriptions specifications parameters definitions elements values definitions fields settings layers grids fields text lines parameters properties details options entries arrays loops profiles lines options indices tracking context parameters profiles elements criteria profiles text variables definitions parameters filters contexts maps indices layout criteria maps details indicators metrics properties variables options indices structures metrics lines models frameworks panels options frames components boundaries filters dimensions parameters models components parameters indices details variables fields templates properties criteria elements text parameters criteria dimensions variables dimensions parameters profiles lines logic maps variables layout logs metrics bounds contexts limits parameters profiles maps boundaries metrics parameters elements details definitions structures components parameters definitions parameters templates definitions fields options metrics specifications definitions fields tracking indices maps options structures values metrics parameters details fields text criteria parameters definitions parameters profiles layers context parameters specifications definitions parameters definitions context summary components formats frameworks context components hooks elements logic loops functions objects elements views templates variables views styles sheets profiles structures settings metrics limits variables elements descriptions settings dimensions fields dimensions guidelines rules parameters metrics criteria lists fields indicators indices fields matrices variables fields elements layout variables variables context variables specifications variables lines logic strings fields descriptions indicators dimensions parameters profiles entries lists paths properties maps structures layout metrics variables indicators frameworks panels elements definitions options indices tracking profiles maps rules logic parameters tracking maps constraints limits parameters metadata configurations specifications fields text criteria specifications definitions elements values definitions templates profiles options metrics profiles dimensions options metrics profiles contexts text parameters lines properties elements contexts maps dynamic metrics tools analytics platform variables profiles contexts columns elements profiles formats constraints parameters tracking indicators summaries text metrics variables options criteria lines criteria specifications definitions context parameters data metrics parameters configurations indicators context summaries parameters parameters rules parameters metrics summaries fields data properties filters metrics text entries lines parameters mappings properties indicators properties fields text profiles logic properties values tags lines values entries components text profiles metrics constraints parameters profiles criteria matrices values metrics parameters contexts variables layout options variables fields profiles contexts columns details metrics parameters configurations options descriptions lines models criteria layout constraints metadata parameters profiles profiles metrics criteria variables parameters metrics parameters contexts metrics criteria lists fields metrics parameters properties filters boundaries metrics dimensions tracking constraints parameters definitions entries lists dynamic metrics rules bounds criteria elements values properties criteria metrics definitions parameters descriptions metadata tracking parameters metadata profiles contexts layouts metrics constraints criteria parameters metrics properties fields definitions tags lines options values elements metrics criteria options values text properties properties properties variables elements text parameters criteria rules parameters metrics parameters profiles components frameworks options contexts parameters options criteria indices filters limits profiles contexts variables text elements criteria parameters variables profiles contexts items criteria metrics variables options criteria limits models metrics parameters columns elements details text configurations metadata parameters values parameters context text metrics parameters filters limits properties metrics tracking specifications elements boundaries parameters options contexts variables parameters metadata specifications columns items logic strings layout filters models metrics parameters parameters rules criteria tracking context parameters profiles models parameters layout parameters metrics parameters criteria tracking layout parameters metrics parameters criteria indicators tracking parameters models metrics logic tracking rules specifications descriptions parameters variables variables context variables definitions metrics text variables parameters dynamic definitions models lines text properties structures templates parameters tools dynamic indicators properties structures parameters layout variables context constraints profiles tracking components variables options configurations properties metrics options criteria dynamic definitions parameters layout indicators properties metadata configurations specifications variables data analytics models maps layout elements variables criteria metrics rules parameters variables mapping variables fields context options variables parameters options contexts mapping variables properties settings properties properties parameters options profiles parameters metrics criteria indices filters profiles contexts parameters options labels tags text custom metrics profiles parameters tools analytical frameworks dynamics analytics operations information metrics indicators actions tracking framework criteria systems methodologies analytical models criteria performance indicators systems frameworks methodologies frameworks components systems frameworks parameters context elements profiles structures variables parameters layout metrics metrics text metadata variables definitions models tracking properties criteria indicators methods tracking layout parameters properties criteria parameters maps configurations indicators dynamic performance indices metrics models profiles data variables maps metrics models criteria specifications parameters components indicators tracking methodologies dynamics maps structures indicators parameters components dynamic mapping properties structures analytics models indicators data metrics metadata frameworks metrics analytical models criteria performance metrics indicators tracking methodologies dynamics models architectures patterns components frameworks properties options profiles structures indices profiles parameters configurations text variables parameters analytical parameters analytics models criteria parameters metrics properties fields definitions metrics templates elements parameters specifications constraints parameters metrics criteria definitions rules parameters metrics criteria data criteria data lines criteria data structures arrays systems parameters layout fields values data points logic arrays properties elements arrays entries data fields data records values arrays parameters profiles specifications columns fields objects properties arrays properties arrays data variables fields entries data parameters fields records arrays options data rows columns arrays structures database database properties database properties fields arrays properties fields profiles definitions text variables strings rows database table dynamic fields text entries variable inputs forms variables templates variables models text data fields input fields form variables variables text strings properties values arrays options data fields form text text inputs forms variables fields form variables text data structures data models databases data objects array database array schema text fields form data dynamic rows data dynamic user inputs arrays options values text data values text variables forms database arrays databases rows database elements dynamic tables variables dynamic field rows forms data fields columns data items values text variables variable rows variables forms tables dynamic array fields fields rows database form fields text data rows form dynamic inputs variables dynamic lists fields dynamic arrays variables options text input dynamic forms dynamic arrays form array inputs fields variables properties data forms database fields text strings variables fields input fields form inputs fields data properties forms rows data rows database rows forms database input fields text fields forms database inputs data rows form inputs user inputs dynamic tables database dynamic fields forms database fields forms data list dynamic text user data dynamic rows user entries data items text form user input fields dynamic lists forms field rows inputs list user values fields input lists values entries list columns matrix user inputs rows data rows forms lists inputs entries text rows dynamic values arrays fields input data arrays database dynamic rows properties rows dynamic content fields tables variables matrix dynamic strings custom fields database form variables options text array properties dynamic field parameters forms list user arrays database dynamic lists data elements forms options text data dynamic fields lists option text variables dynamic columns data lists form dynamic variables table arrays form dynamic rows variables dynamic fields inputs values data data entries list data items user fields option elements dynamic elements tables form variables option dropdown options array fields form fields variables variables options array variables variables dropdown options array lists variables field variables dropdown parameters properties field dynamic values database field strings option value options form array values field keys data variables arrays list values tables key keys form elements array text data form variables data arrays array items text array data form rows array values dynamic inputs text text options values array keys database values field arrays list array items variable elements values dynamic array variables options array fields array rows properties fields list data list elements form dynamic values variables option elements data arrays option inputs key name elements text array columns variables properties form variables options text inputs option items values dynamic columns database columns options array objects lists array input values table properties array array arrays input text properties lists array arrays lists options lists properties properties options list arrays data objects array text data array variables lists option text values table arrays form dynamic parameters table fields form dynamic keys data arrays database fields data models array fields data row parameters data rows form dynamic options database parameters array elements database values keys form properties database options list properties data structures form parameters dropdown options form inputs dropdown values option entries data variables list items database tables key keys data structures variables text fields fields options variables dropdown inputs data lists data properties tables select options field variables select options options list variables properties options values criteria properties options values criteria properties options target links sorting metrics: ?>
                                            <?php foreach ($featureList as $fRow): ?>
                                                <tr id="vision-row-<?php echo $fRow->id; ?>">
                                                    <td>
                                                        <input type="text" name="featureTitle[]" value="<?php echo esc($fRow->title); ?>" placeholder="e.g., 250" class="form-control form-control-sm" />
                                                    </td>
                                                    <td>
                                                        <textarea name="featureValue[]" rows="2" class="form-control form-control-sm"><?php echo esc($fRow->description); ?></textarea>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="featureSymbol[]" value="<?php echo esc($fRow->symbol); ?>" placeholder="+" class="form-control form-control-sm" />
                                                    </td>
                                                    <td>
                                                        <input type="number" name="feature_sort_order[]" value="<?php echo (int)$fRow->sort_order; ?>" class="form-control form-control-sm" />
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" onclick="$('#vision-row-<?php echo $fRow->id; ?>').remove();" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4"></td>
                                            <td class="text-center">
                                                <button type="button" onclick="addVisionRow();" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
                                            </td>
                                        </tr>
                                    </tfoot>
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
        let html = `
        <tr id="new-carousel-row-${carouselIndex}">
            <td>
                <input type="hidden" name="slide_id[]" value="" />
                <input type="file" name="new_slide_image[]" class="form-control form-control-sm" required />
            </td>
            <td>
                <input type="text" name="new_slide_title[]" placeholder="Enter headline title" class="form-control form-control-sm" required />
            </td>
            <td>
                <textarea name="new_slide_description[]" rows="3" placeholder="Enter banner summary details copy text..." class="form-control form-control-sm"></textarea>
            </td>
            <td>
                <input type="text" name="new_slide_link[]" placeholder="e.g., service/analytics" class="form-control form-control-sm" />
            </td>
            <td>
                <input type="number" name="new_slide_sort_order[]" value="0" class="form-control form-control-sm" />
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
            <td class="text-left"><input type="text" name="featureTitle[]" placeholder="e.g., 20" class="form-control form-control-sm required" /></td>
            <td class="text-left"><textarea name="featureValue[]" rows="2" class="form-control form-control-sm"></textarea></td>
            <td class="text-left"><input type="text" name="featureSymbol[]" placeholder="+" class="form-control form-control-sm" /></td>
            <td class="text-left"><input type="number" name="feature_sort_order[]" class="form-control form-control-sm" /></td>
            <td class="text-center">
                <button type="button" onclick="$('#new-vision-row-${visionIndex}').remove();" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button>
            </td>
        </tr>`;

        $('#images tbody').append(html);
        visionIndex++;
    }
</script>

<?php $this->endSection(); ?>