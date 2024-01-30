
 <!DOCTYPE html>
<html lang="en">
   <head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= $meta_description ? $meta_description : ''; ?>">
    <meta name="author" content="<?= $athor? $athor: '';?>">
    
    <!-- Favicons -->
    <link href="/image/sde.jpg" rel="icon">

    <title>Dashbord || <?= $title ? $title : '';?></title>
   

    <!-- VENDOR CSS ICON -->
    <link href="<?= APP_URL;?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= APP_URL;?>assets/vendor/boxicons/css/boxicons.css">
    <link href="<?= APP_URL;?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?= APP_URL;?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?= APP_URL;?>assets/vendor/sb-admin/css/sb-admin-2.min.css" rel="stylesheet">
   	<style type="text/css">
		.border-4{
			border-width: 8px;
		}
		.border-start{
			border-bottom-width: 1px;
			border-right-width: 1px;
			border-top-width: 1px;
		}
		.card-raised{
			margin-bottom: 5px;
		}


	</style>

  </head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php  require_once ROOT_PATH.'mug/partials/sidebar.php';?>
        

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

               <?php   require_once ROOT_PATH.'mug/partials/topbar.php'; ?>
                 <!-- Begin Page Content -->
					<div class="container-fluid">
					
				  	