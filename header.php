<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package web14devsn
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- fonts style -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" /> -->
	  <!-- slick slider -->

	<link rel="stylesheet" href="<?php echo PATH_SN ?>/dist/template/css/slick-theme.css" />
	<!-- font awesome style -->
	<!-- <link href="<?php echo PATH_SN ?>/dist/template/css/font-awesome.min.css" rel="stylesheet" /> -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<!-- Custom styles for this template -->
	<link href="<?php echo PATH_SN ?>/dist/template/css/style.css" rel="stylesheet" />
	<!-- responsive style -->
	<link href="<?php echo PATH_SN ?>/dist/template/css/responsive.css" rel="stylesheet" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="main_body_content">

	    <div class="hero_area">
	      <!-- header section strats -->
	      <header class="header_section">
	        <div class="container-fluid">
	          <nav class="navbar navbar-expand-lg custom_nav-container ">
	            <div class="navbar-brand-sn">
	            	<?php 
	                if ( function_exists( 'the_custom_logo' ) ) {
						    the_custom_logo();
						}
			  		?>
	            </div>
	            </a>
	            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	              <span class=""> </span>
	            </button>

	            <div class="collapse navbar-collapse " id="navbarSupportedContent">
	               <?php
			        wp_nav_menu( array(
			            'theme_location'    => 'menu-primary',
			            'depth'             => 2,
			            'container'         => '',
			            'container_class'   => '',
			            'container_id'      => 'bs-example-navbar-collapse-1',
			            'menu_class'        => 'nav navbar-nav ml-auto',
			            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
			            'walker'            => new WP_Bootstrap_Navwalker(),
			        ) );
			        ?>
	              <div class="quote_btn-container">
	                <form class="form-inline">
	                  <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
	                    <i class="fa fa-search" aria-hidden="true"></i>
	                  </button>
	                </form>
	                <a href="">
	                  <i class="fa fa-user" aria-hidden="true"></i>
	                </a>
	              </div>
	            </div>
	          </nav>
	        </div>
	      </header>
	      <!-- end header section -->