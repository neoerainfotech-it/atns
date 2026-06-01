<?php
if(@$meta->link=='home'){
   $transparentHeader = FALSE;
}

use App\Models\CommonModel;
$this->AdminModel = new CommonModel();

$wconfig =[];
use App\Models\coreModule\SettingModel;
$setmodel = new SettingModel();
$setting = $setmodel->asObject()->where('code','config')->findAll();
    foreach($setting as $value){
     $wconfig[$value->key] = $value->value;
}

$menu = $this->AdminModel->all_fetch('front_menu',array('parent_id'=>0,'header'=>1,'status'=>1),'sort_order','asc');  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= @$meta->title ?? 'Site Title'; ?></title>
    
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5BFG6JL7');</script>
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/style.css'); ?>">

    <style>
        @media screen and (min-width: 992px) {
            /* Level 1 Main Navigation Dropdown Hover Activation */
            header.main-header .navbar-nav .nav-item.dropdown:hover > .dropdown-menu {
                display: block;
                margin-top: 0;
            }

            /* Level 2 and Level 3 Nested Multi-level Dropdown Hover Activation */
            header.main-header .navbar-nav .dropdown-menu .dropdown:hover > .dropdown-menu {
                display: block;
                position: absolute;
                left: 100% !important;
                top: 0;
            }
        }
    </style>
</head>

<body>

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BFG6JL7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<header class="main-header <?php if(isset($transparentHeader) && $transparentHeader == true): ?>transparent-header<?php endif; ?>">
    <nav class="navbar navbar-expand-lg" data-cue="slideInDown">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">
                <img src="<?php echo $wconfig['config_logo']; ?>" width="90" height="48" loading="eager" alt="config_logo">
            </a>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1">
                        
                   <?php if (!empty($menu)) {
                    
                     foreach ($menu as $key => $value) {
                     

                     $level1 = $this->AdminModel->all_fetch('front_menu',array('parent_id'=>$value->id,'header'=>1,'status'=>1),'sort_order','asc'); 
                   
                     if(!empty($level1)){?>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside"  aria-expanded="false">
                            <?php echo $value->name; ?>
                            </a>
                            <ul class="dropdown-menu">


                               <?php 
                                    
                                 foreach ($level1 as $key => $l1) {

                                $level2 = $this->AdminModel->all_fetch('front_menu',array('parent_id'=>$l1->id,'header'=>1,'status'=>1),'sort_order','asc'); 
                                    
                                 if(!empty($level2)){?>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                                    <?php echo $l1->name; ?>
                                    </a>
                                    <ul class="dropdown-menu thirdLevel">


                                       <?php 
                                            
                                         foreach ($level2 as $key => $l2) {                          
                                            ?>
                                                                                                            
                                        <li><a class="dropdown-item" href="<?php echo base_url($l2->link); ?>"><?php echo $l2->name; ?></a></li>

                                       <?php } ?>

                                    </ul>
                                </li>
                                             

                               <?php }   else{ ?> 

                                <li><a class="dropdown-item" href="<?php echo base_url($l1->link); ?>"><?php echo $l1->name; ?></a></li>
                            <?php }} ?>

                            </ul>
                        </li>


                         <?php  } else{ ?>

                    
                       <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo base_url($value->link); ?>"><?php echo $value->name; ?> </a>
                        </li>
                   
                    <?php } ?>

                 
                  <?php }  } ?>

                    
                 
                    </ul>
                </div>
            </div>

            <div class="header-extra">
                <button class="search-btn no-btn" data-bs-toggle="modal" data-bs-target="#searchModal">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.167 15.833a6.667 6.667 0 1 0 0-13.333 6.667 6.667 0 0 0 0 13.333M17.5 17.5l-3.625-3.625" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
                <a href="<?php echo base_url('contact-us'); ?>" class="btn btn-theme btn-theme-dark btn-icon">Contact Us <span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#fff"/></svg></span></a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>


        </div>
    </nav>
</header>

<div class="modal fade" id="searchModal" aria-hidden="true" aria-labelledby="searchModalLabel" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body bg-dark">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="search-wrap">
                    <div class="suggestion-wrap">
                        <form action="">
                        
                            <input type="search" name="keyword" id="keyword" class="form-control" placeholder="Search...">
                           <ul id="searchResult">
                                </ul>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<main>