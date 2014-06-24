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
 
 $wp04_theme_options = get_option( 'wp04_theme_options' );
 $wp04_custom_header = $wp04_theme_options['header_img'];
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
	<link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,700,800" rel="stylesheet" type="text/css">
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
	<!--[if lte IE 8]><script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css" /><![endif]-->
	<!--[if lte IE 7]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie7.css"><![endif]-->
<?php if( !empty( $wp04_custom_header ) ) : ?>
	<style>#header-wrapper{background-image:url('<?php echo $wp04_custom_header; ?>');}</style>
<?php 
endif;

wp_head(); 
?>
</head>
	<body <?php if( is_home() ) : body_class('homepage'); else: body_class(); endif; ?>>

		<!-- Header Wrapper -->
			<div id="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">

								<header id="header">
									<div class="inner">
									
											<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="logo"><?php bloginfo( 'name' ); ?></a></h1>
										
											<nav id="nav">
											<!--
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
											-->
											<?php wp_nav_menu( array( 'theme_location' => 'Top Nav' ) ); ?>
											</nav>  <!-- #nav -->
									</div>  <!-- .inner -->
								</header>  <!-- #header -->

<?php 
if( is_home() ) : 
	$centerpiece_headline     = $wp04_theme_options[ 'centerpiece_headline' ];
	$centerpiece_subheading   = $wp04_theme_options[ 'centerpiece_subheading' ];
	$centerpiece_button_label = $wp04_theme_options[ 'centerpiece_button_label' ];
	$centerpiece_button_link  = $wp04_theme_options[ 'centerpiece_button_link' ];
	$centerpiece_button_type  = $wp04_theme_options[ 'centerpiece_button_type' ];
	$centerpiece_button_icon  = $wp04_theme_options[ 'centerpiece_button_icon' ];
?>
								<div id="banner">
	<?php if( !empty( $centerpiece_headline ) ) : ?>
									<h2><?php echo $centerpiece_headline; ?></h2>
	<?php 
	endif; 
	if( !empty( $centerpiece_subheading ) ) :
	?>
									<p><?php echo $centerpiece_subheading; ?></p>
	<?php 
	endif; 
	if( !empty( $centerpiece_button_label ) ) :
		if( !empty( $centerpiece_button_icon ) ) :
			$centerpiece_button_class = ' fa fa-' . $centerpiece_button_icon . '-circle';
		endif;
		if( !empty( $centerpiece_button_type ) && $centerpiece_button_type == 'secondary' ) :
			$centerpiece_button_class = ' alt'. $centerpiece_button_class;
		endif;
	?>
									<a href="<?php echo $centerpiece_button_link; ?>" class="button big<?php echo $centerpiece_button_class; ?>"><?php echo $centerpiece_button_label; ?></a>
	<?php endif; ?>
								</div>
<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		
		<!-- Main Wrapper -->
			<div id="main-wrapper">