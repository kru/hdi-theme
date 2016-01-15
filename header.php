<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title ('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo THEMEROOT; ?>/magnific-popup/magnific-popup.css">
	

	<?php wp_head(); ?>
</head> 

<body <?php body_class(); ?>> 
	<!--navbar-->
	<nav class="navbar navbar-default" id="main-navbar">
		<div class="container">
			
				<a href="<?php echo home_url(); ?>"></a>

				<?php 
					$args = array(
						'menu'			=> 'header-menu',
						'menu_class'	=> 'nav navbar-nav',
						'container'		=> 'false'
					);

					wp_nav_menu ($args);
				?>
			
		</div>
	</nav><!--end navbar-header-->
