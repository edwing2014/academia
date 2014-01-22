<!DOCTYPE html>
<!--[if lt IE 7]>

<html class="lt-ie9 lt-ie8 lt-ie7" lang="en">

<![endif]-->
<!--[if IE 7]>

<html class="lt-ie9 lt-ie8" lang="en">

<![endif]-->
<!--[if IE 8]>

<html class="lt-ie9" lang="en">

<![endif]-->
<!--[if gt IE 8]>
<!-->

<html lang="en">

	<!--
	<![endif]-->
	<head>
		<meta charset="utf-8">
		<title> Sistema de gestion de orgenes de trabajo y pedidos </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- bootstrap css -->
 		<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<link href="<?=base_url('plantillas/icomoon/style.css') ?>" rel="stylesheet">
		<!--[if lte IE 7]>
		<script src="css/icomoon-font/lte-ie7.js">
		</script>
		<![endif]-->
		<link href="css/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet">
		<link href="css/wysiwyg/wysiwyg-color.css" rel="stylesheet">
		<link href="<?=base_url('plantillas/css/main.css') ?>" rel="stylesheet">
		<!-- Important. For Theming change primary-color variable in main.css  -->
		<link href="<?=base_url('plantillas/css/charts-graphs.css') ?>" rel="stylesheet">

		<!--Vamos a cargar todos los css del grocery crud-->
		<link href="<?=base_url('assets/grocery_crud/themes/datatables/css/demo_table_jui.css') ?>" rel="stylesheet">
		<link href="<?=base_url('assets/grocery_crud/css/ui/simple/jquery-ui-1.9.0.custom.min.css') ?>" rel="stylesheet">
	
		<link href="<?=base_url('assets/grocery_crud/themes/datatables/css/datatables.css') ?>" rel="stylesheet">
		<link href="<?=base_url('assets/grocery_crud/themes/datatables/css/jquery.dataTables.css') ?>" rel="stylesheet">
		<link href="<?=base_url('assets/grocery_crud/themes/datatables/extras/TableTools/media/css/TableTools.css') ?>" rel="stylesheet">
		<link href="<?=base_url('assets/grocery_crud/css/jquery_plugins/fancybox/jquery.fancybox.css') ?>" rel="stylesheet">

		<!--Vamos a cargar todos los js del grocery crud-->
		<script type="text/javascript" src="<?=base_url('assets/grocery_crud/js/jquery-1.8.2.min.js') ?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/grocery_crud/js/jquery_plugins/ui/jquery-ui-1.9.0.custom.min.js') ?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/grocery_crud/themes/datatables/js/jquery.dataTables.min.js') ?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/grocery_crud/themes/datatables/js/datatables-extras.js') ?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/grocery_crud/themes/datatables/js/datatables.js') ?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/grocery_crud/themes/datatables/extras/TableTools/media/js/ZeroClipboard.js') ?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/grocery_crud/themes/datatables/extras/TableTools/media/js/TableTools.min.js') ?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/grocery_crud/js/jquery_plugins/jquery.fancybox.pack.js') ?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/grocery_crud/js/jquery_plugins/jquery.easing-1.3.pack.js') ?>"></script>
	</head>
	<body>
		<header>
			<a href="#" class="logo"> <img src="<?=base_url('plantillas/img/logo.png') ?>" alt="logo" /> </a>
			<div class="btn-group">
				<button class="btn btn-primary">
					Srinu Baswa
				</button>
				<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
					<span class="caret"> </span>
				</button>
				<ul class="dropdown-menu pull-right">
					<li>
						<a href="#"> Edit Profile </a>
					</li>
					<li>
						<a href="#"> Account Settings </a>
					</li>
					<li>
						<a href="#"> Logout </a>
					</li>
				</ul>
			</div>
			<ul class="mini-nav">
				<li>
					<a href="#"> <div class="fs1" aria-hidden="true" data-icon="&#xe040;"></div> <span class="info-label badge badge-warning"> 3 </span> </a>
				</li>
				<li>
					<a href="#"> <div class="fs1" aria-hidden="true" data-icon="&#xe04c;"></div> <span class="info-label badge badge-info"> 5 </span> </a>
				</li>
				<li>
					<a href="#"> <div class="fs1" aria-hidden="true" data-icon="&#xe037;"></div> <span class="info-label badge badge-success"> 9 </span> </a>
				</li>
			</ul>

		</header>
