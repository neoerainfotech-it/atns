<?php
use App\Models\coreModule\SettingModel;
$setmodel = new SettingModel();
$setting = $setmodel->asObject()->where('code','config')->findAll();
foreach($setting as $value){
    $wconfig[$value->key] = $value->value;
}

// --------------------------------------------------------------------
// DYNAMIC SEO ARCHITECTURE PROCESSING ENGINE
// --------------------------------------------------------------------
// 1. Fallback Rule for Page Title
if (!empty($metaTitle)) {
    $displayTitle = $metaTitle;
} elseif (!empty($heading) && !empty($heading->meta_title)) {
    $displayTitle = $heading->meta_title;
} else {
    $displayTitle = isset($wconfig['config_name']) ? $wconfig['config_name'] : 'ATNA Technologies';
}

// 2. Fallback Rule for Meta Description
if (!empty($metaDescription)) {
    $displayDescription = $metaDescription;
} elseif (!empty($heading) && !empty($heading->meta_description)) {
    $displayDescription = $heading->meta_description;
} else {
    $displayDescription = '';
}

// 3. Fallback Rule for Meta Keywords
if (!empty($metaKeyword)) {
    $displayKeyword = $metaKeyword;
} elseif (!empty($heading) && !empty($heading->meta_keyword)) {
    $displayKeyword = $heading->meta_keyword;
} else {
    $displayKeyword = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Render Dynamic Title -->
    <title><?php echo esc($displayTitle); ?></title>
    
    <link rel="icon" type="image/x-icon" href="<?php echo base_url($wconfig['config_favicon']); ?>">
    <base href="<?php echo base_url(); ?>/" id="base" data-base="<?php echo base_url(); ?>/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Render Dynamic Meta Description -->
    <?php if (!empty($displayDescription)): ?>
        <meta name="description" content="<?php echo esc($displayDescription); ?>"> 
    <?php endif ?>
    
    <!-- Render Dynamic Meta Keywords -->
    <?php if (!empty($displayKeyword)): ?>
        <meta name="keywords" content="<?php echo esc($displayKeyword); ?>">
    <?php endif ?>
    
    <meta name="author" content="<?php echo $wconfig['config_name']; ?>">

    <?php 
    // --------------------------------------------------------------------
    // HIGH-CONVERSION SOCIAL GRAPH PANEL LAYER
    // --------------------------------------------------------------------
    if (!empty($meta)) { 
        // Handles internal subpages (Blogs, Case Studies, Events) dynamically
        $shareTitle = $meta->metaTitle;
        $shareDesc  = strip_tags($meta->metaDescription);
        $shareImage = !empty($meta->image) ? base_url($meta->image) : base_url();
    } elseif (!empty($heading) && !empty($heading->meta_title)) {
        // Automatically targets your homepage configuration inputs if sub-records are empty
        $shareTitle = $heading->meta_title;
        $shareDesc  = !empty($heading->meta_description) ? strip_tags($heading->meta_description) : '';
        $shareImage = !empty($heading->image) ? base_url($heading->image) : base_url();
    } else {
        $shareTitle = $displayTitle;
        $shareDesc  = $displayDescription;
        $shareImage = base_url();
    }
    ?>
    <!-- Open Graph (Facebook) -->
    <meta property="og:title" content="<?php echo esc($shareTitle); ?>">
    <meta property="og:description" content="<?php echo esc($shareDesc); ?>">
    <meta property="og:image" content="<?php echo $shareImage; ?>">
    <meta property="og:url" content="<?php echo current_url(); ?>">

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="<?php echo esc($shareTitle); ?>">
    <meta name="twitter:description" content="<?php echo esc($shareDesc); ?>">
    <meta name="twitter:image" content="<?php echo $shareImage; ?>">
    <meta name="twitter:card" content="summary_large_image">
    
    <!-- Canonical Optimization -->
    <link class="canonical" rel="canonical" href="<?php echo current_url(); ?>">

    <!-- Style Engine Asset Links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?php echo CATALOG; ?>assets/cue/scrollCue.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11.1.1/swiper-bundle.min.css">

    <?php if(isset($needGallery) && $needGallery == true): ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lg-thumbnail.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lg-zoom.min.css"/>
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo CATALOG; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo CATALOG; ?>css/toastr.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WGMN8ES8GH"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-WGMN8ES8GH');
    </script>
</head>

<style>
   input.required.nofillout{
      border: 1px solid #f70101 !important;
   }
   select.required.nofillout{
      border: 1px solid #f70101 !important;
   }
</style>

<body>
<div class="main">
    <?php echo $this->include('frontend/includes/header'); ?>

    <!-- Master View Injection Interface Port -->
    <?= $this->renderSection('page'); ?>

    <!-- BDOW pop up -->
    <script async>(function(s,u,m,o,j,v){j=u.createElement(m);v=u.getElementsByTagName(m)[0];j.async=1;j.src=o;j.dataset.sumoSiteId='c0c6dd6c10105db6035be9a7e5c9fbed2b74579b04607995d1e153fd52c7550e';v.parentNode.insertBefore(j,v)})(window,document,'script','//load.sumome.com/');</script>

    <!-- Zoho SalesIQ Widget -->
    <script>window.$zoho=window.$zoho || {};$zoho.salesiq=$zoho.salesiq||{ready:function(){}}</script>
    <script id="zsiqscript" src="https://salesiq.zohopublic.in/widget?wc=siq111111291e240cd1719aa99db430180a2257da24abe8d97107e226f766961753" defer></script>

    <!-- Microsoft Clarity -->
    <script type="text/javascript">
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "vpd0oxs6cs");
    </script>

    <?php echo $this->include('frontend/includes/footer'); ?>

    <?= $this->renderSection('javascript'); ?>
</div>
</body>
</html>