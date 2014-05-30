<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main-wrapper">
 *
 * @package WordPress
 * @subpackage WP-ZeroFour
 * @since WP-ZeroFour 1.0
 */
?><!DOCTYPE HTML>
<!--
	ZeroFour 2.5 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="keywords" content="">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800" rel="stylesheet" type="text/css">
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.dropotron.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/config.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/skel.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/skel-panels.min.js"></script>
	<noscript>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/skel-noscript.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style-desktop.css">
	</noscript>
	<!--[if lte IE 9]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie9.css"><![endif]-->
	<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css" /><![endif]-->
	<!--[if lte IE 7]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie7.css"><![endif]-->
	<?php wp_head(); ?>
</head>
	<body <?php body_class('homepage'); ?>>

		<!-- Header Wrapper -->
			<div id="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">
						
							<!-- Header -->
								<header id="header">
									<div class="inner">
									
										<!-- Logo -->
											<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="logo"><?php bloginfo( 'name' ); ?></a></h1>
										
										<!-- Nav -->
											<nav id="nav">
												<ul>
													<li class="current_page_item"><a href="index.html">Home</a></li>
													<li>
														<span>Dropdown</span>
														<ul>
															<li><a href="#">Lorem ipsum dolor</a></li>
															<li><a href="#">Magna phasellus</a></li>
															<li>
																<span>Phasellus consequat</span>
																<ul>
																	<li><a href="#">Lorem ipsum dolor</a></li>
																	<li><a href="#">Phasellus consequat</a></li>
																	<li><a href="#">Magna phasellus</a></li>
																	<li><a href="#">Etiam dolore nisl</a></li>
																</ul>
															</li>
															<li><a href="#">Veroeros feugiat</a></li>
														</ul>
													</li>
													<li><a href="left-sidebar.html">Left Sidebar</a></li>
													<li><a href="right-sidebar.html">Right Sidebar</a></li>
													<li><a href="no-sidebar.html">No Sidebar</a></li>
												</ul>
											</nav>
									
									</div>
								</header>

							<!-- Banner -->
								<div id="banner">
									<h2><strong>ZeroFour:</strong> A free responsive site template<br />
									built on HTML5 and CSS3 by <a href="http://html5up.net">HTML5 UP</a></h2>
									<p>Does this statement make you want to click the shiny blue button?</p>
									<a href="#" class="button big fa fa-check-circle">Yes it does</a>
								</div>

						</div>
					</div>
				</div>
			</div>
		
		<!-- Main Wrapper -->
			<div id="main-wrapper">