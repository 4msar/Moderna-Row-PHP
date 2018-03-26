<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title><?php echo get_title().' - '.(!empty(APP_NAME) ? APP_NAME : 'My App'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<link href="assets/favicon.ico" rel="icon">
	<!-- css -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/fancybox/jquery.fancybox.css" rel="stylesheet">
	<link href="assets/css/jcarousel.css" rel="stylesheet" />
	<link href="assets/css/flexslider.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet" />

	<!-- Theme skin -->
	<?php $skin = get_data('settings', 'data_key', 'ws_skin', 'data_value'); ?>
	<link href="assets/skins/<?php echo ($skin!=false ? $skin : 'default' ); ?>.css" rel="stylesheet" />

	<!-- =======================================================
    Theme Name: Moderna
    Theme URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
	======================================================= -->

</head>
<?php
    $navbar_style = get_data('settings', 'data_key','ws_menu', 'data_value');
?>
<body>
	<div id="wrapper">
		<!-- start header -->
		<header class="<?php if($navbar_style=='fixed'){ echo 'fixed-header'; } ?>"> <!-- add fixed header functionality here -->
			<div class="navbar navbar-default <?php if($navbar_style=='fixed'){ echo 'navbar-static-top'; } ?>"> <!-- add fixed header functionality here -->
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
						<a class="navbar-brand" href="?home">
						<?php $name = !empty(APP_NAME) ? APP_NAME : 'MyApp';
                            echo '<span>'.substr($name,0,1).'</span>'.substr($name, 1);?></a>
					</div>
					<div class="navbar-collapse collapse ">
						<ul class="nav navbar-nav">
							<li class="<?= active_menu(); ?>"><a href="?home">Home</a></li>
							
							<li class='<?= active_menu('portfolio'); ?>'><a href="?page=portfolio">Portfolio</a></li>
							<li class='<?= active_menu('blog'); ?>'><a href="?page=blog">Blog</a></li>
							<li class='<?= active_menu('contact'); ?>'><a href="?page=contact">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<!-- end header -->