<?php
use App\Models\CommonModel;
$this->AdminModel = new CommonModel();
$wconfig = websetting();
	
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title><?php echo $page_title; ?></title>
<link rel="icon" type="image/x-icon" href="<?php echo base_url($wconfig['config_favicon']); ?>">
<base href="<?php echo base_url(); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="<?php echo $wconfig['config_name'];?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />

<?php echo $this->include('admin/header'); ?>

<?php echo $this->renderSection('page'); ?>

<?php echo $this->include('admin/footer'); ?>

<?php echo  $this->renderSection('javascript'); ?>

</body>
</html>