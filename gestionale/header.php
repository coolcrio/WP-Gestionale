<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Gestionale
 * @since Twenty Thirteen 1.0
 */
 
	//if( !is_admin() ) header('Location: /wp-admin'); exit();
 
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			
			<!-- loading animation -->
		    <div id="qLoverlay"></div>
		    <div id="qLbar"></div>
		    
		    <div id="header" class="fixed">

		        <div class="navbar">
		            <div class="navbar-inner">
		              <div class="container-fluid">
		                <a class="brand" href="/">
			                <img src="<?=get_option('gestionale_logo')?>" style="height:50px" />
		                </a>
		                
		                <?php wp_nav_menu( array( 
									                'theme_location' => 'gestionale_header', 
									                'container_class' => 'nav-no-collapse', 
									                'menu_class' => 'nav',
									                'walker' => new Gestionale_Header_Walker() 
									      ) ); ?>
		                
		                <div class="nav-no-collapse">
		                    <ul class="nav pull-right usernav">
			                    <?php foreach(get_option('top_right_header') as $k => $widget): ?>
				                    <?php do_shortcode('[header_widget_'.$widget.']'); ?>
			                    <?php endforeach; ?>
		                    </ul>
		                </div><!-- /.nav-collapse -->
		              </div>
		            </div><!-- /navbar-inner -->
		          </div><!-- /navbar --> 
		
		    </div>
	
		    <div id="wrapper">
		
		        <!--Responsive navigation button-->  
		        <div class="resBtn">
		            <a href="#"><span class="icon16 minia-icon-list-3"></span></a>
		        </div>
		        
		        <!--Left Sidebar collapse button-->  
		        <div class="collapseBtn leftbar">
		             <a href="#" class="tipR" title="Hide Left Sidebar"><span class="icon12 minia-icon-layout"></span></a>
		        </div>
		
		        <!--Sidebar background-->
		        <div id="sidebarbg"></div>
		        <!--Sidebar content-->
		        <div id="sidebar">
		
		            <div class="shortcuts">
		                <ul>
		                    <li><a href="support.html" title="Support section" class="tip"><span class="icon24 eco-chat"></span></a></li>
		                    <li><a href="#" title="Database backup" class="tip"><span class="icon24 eco-archive"></span></a></li>
		                    <li><a href="charts.html" title="Sales statistics" class="tip"><span class="icon24 eco-location"></span></a></li>
		                    <li><a href="#" title="Write post" class="tip"><span class="icon24 eco-file"></span></a></li>
		                </ul>
		            </div><!-- End shortcuts -->
		            
		            <div class="sidenav">
		
		                <div class="sidebar-widget" style="margin: -1px 0 0 0;">
		                    <h5 class="title" style="margin-bottom:0">Navigation</h5>
		                </div><!-- End .sidenav-widget -->
						
						<!-- <div class="mainnav"> -->
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'mainnav', 'walker' => new Gestionale_Sidebar_Walker() ) ); ?>
						<!-- </div> -->
		
		            </div><!-- End sidenav -->
		            
		            <?php dynamic_sidebar( 'main_sidebar' ); ?>
		
		        </div><!-- End #sidebar -->
			
		</header><!-- #masthead -->

		<div id="main" class="site-main">

<?php //get_search_form(); ?>