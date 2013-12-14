<?php

/* REQUIRES */

	/* 1. shortcodes, widgets, functions */
	require('gestionale/shortcodes.php');
	require('gestionale/widgets.php');
	require('gestionale/utility.php');
	require('gestionale/menu/custom.php');
	require('gestionale/classes.php');
	require('gestionale/filters.php');
	/* 2. ajax functions */
	require('gestionale/ajax.php');
	/* 3. admin customization */
	require('gestionale.admin.php');

add_action( 'admin_enqueue_scripts', 'gestionale_admin_scripts_styles' );
function gestionale_admin_scripts_styles() {
	wp_enqueue_style( 'css-icons', get_template_directory_uri() . '/css/icons.css', array(), '2.09' );
}  

function gestionale_scripts_styles() {
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds Masonry to handle vertical alignment of footer widgets.
	if ( is_active_sidebar( 'sidebar-1' ) )
		wp_enqueue_script( 'jquery-masonry' );

	// Loads JavaScript
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap/bootstrap.js', array( 'jquery' ) );
	//wp_enqueue_script( 'touch-punch', get_template_directory_uri() . '/plugins/misc/touch-punch/jquery.ui.touch-punch.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'ios-orientationchange-fix', get_template_directory_uri() . '/plugins/misc/ios-fix/ios-orientationchange-fix.js', array( 'jquery' ) );
	wp_enqueue_script( 'cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array( 'jquery' ) );
	wp_enqueue_script( 'mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.js', array( 'jquery' ) );
	// Charts plugins
	wp_enqueue_script( 'sparkline', get_template_directory_uri() . '/plugins/charts/sparkline/jquery.sparkline.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'knob', get_template_directory_uri() . '/plugins/charts/knob/jquery.knob.js', array( 'jquery' ) );
	wp_enqueue_script( 'flot', get_template_directory_uri() . '/plugins/charts/flot/jquery.flot.js', array( 'jquery' ) );
	wp_enqueue_script( 'flot-grow', get_template_directory_uri() . '/plugins/charts/flot/jquery.flot.grow.js', array( 'jquery', 'flot' ) );
	wp_enqueue_script( 'flot-pie', get_template_directory_uri() . '/plugins/charts/flot/jquery.flot.pie.js', array( 'jquery', 'flot' ) );
	wp_enqueue_script( 'flot-resize', get_template_directory_uri() . '/plugins/charts/flot/jquery.flot.resize.js', array( 'jquery', 'flot' ) );
	wp_enqueue_script( 'flot-tooltip', get_template_directory_uri() . '/plugins/charts/flot/jquery.flot.tooltip_0.4.4.js', array( 'jquery', 'flot' ) );
	wp_enqueue_script( 'flot-orderbards', get_template_directory_uri() . '/plugins/charts/flot/jquery.flot.orderBars.js', array( 'jquery', 'flot' ) );
	// Misc plugins
	wp_enqueue_script( 'qtip', get_template_directory_uri() . '/plugins/misc/qtip/jquery.qtip.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'totop', get_template_directory_uri() . '/plugins/misc/totop/jquery.ui.totop.min.js', array( 'jquery' ) );
	// Geocomplete Google Maps
	wp_enqueue_script( 'gmap', 'http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places' );
	wp_enqueue_script( 'geocomplete', get_template_directory_uri() . '/plugins/misc/geocomplete/jquery.geocomplete.js', array( 'jquery','gmap' ) );
	// Search plugins
	wp_enqueue_script( 'tipuesearch-set', get_template_directory_uri() . '/plugins/misc/search/tipuesearch_set.js', array( 'jquery' ) );
	wp_enqueue_script( 'tipuesearch-data', get_template_directory_uri() . '/plugins/misc/search/tipuesearch_data.js', array( 'jquery' ) );
	wp_enqueue_script( 'tipuesearch', get_template_directory_uri() . '/plugins/misc/search/tipuesearch.js', array( 'jquery' ) );
	// Calendar plugins
	wp_enqueue_script( 'fullcalendar', get_template_directory_uri() . '/plugins/misc/fullcalendar/fullcalendar.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'timepicker', get_template_directory_uri() . '/js/supr-theme/jquery-ui-timepicker-addon.js', array( 'jquery' ) );
	// Data Tables
	wp_enqueue_script( 'data-tables', get_template_directory_uri() . '/plugins/tables/dataTables/jquery.dataTables.min.js', array( 'jquery' ) );
	// Form plugins
	wp_enqueue_script( 'jquery-validate', get_template_directory_uri() . '/plugins/forms/validate/jquery.validate.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'watermark', get_template_directory_uri() . '/plugins/forms/watermark/jquery.watermark.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'uniform-js', get_template_directory_uri() . '/plugins/forms/uniform/jquery.uniform.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'wizard', get_template_directory_uri() . '/plugins/forms/smartWizzard/jquery.smartWizard-2.0.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'togglebutton', get_template_directory_uri() . '/plugins/forms/togglebutton/jquery.toggle.buttons.js', array( 'jquery' ) );
	wp_enqueue_script( 'elastic', get_template_directory_uri() . '/plugins/forms/elastic/jquery.elastic.js', array( 'jquery' ) );
	wp_enqueue_script( 'select2', get_template_directory_uri() . '/plugins/forms/select/select2.min.js', array( 'jquery' ) );
	// Custom js
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );
	wp_enqueue_script( 'init', get_template_directory_uri() . '/js/init.js', array( 'jquery' ) );
	wp_enqueue_script( 'gestionale', get_template_directory_uri() . '/js/gestionale.js', array( 'jquery' ) );
	wp_enqueue_script( 'gestionale-lang', get_template_directory_uri() . '/js/gestionale.lang.js', array( 'jquery' ) );

	// Loads CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.css', array(), '2.09' );
	wp_enqueue_style( 'bootstrap-responsive', get_template_directory_uri() . '/css/bootstrap/bootstrap-responsive.css', array(), '2.09' );
	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/css/supr-theme/jquery.ui.supr.css', array(), '2.09' );
	wp_enqueue_style( 'css-icons', get_template_directory_uri() . '/css/icons.css', array(), '2.09' );
	wp_enqueue_style( 'uniform', get_template_directory_uri() . '/plugins/forms/uniform/uniform.default.css', array(), '2.09' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', array(), '2.09' );
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css', array(), '2.09' );
	wp_enqueue_style( 'qtip', get_template_directory_uri() . '/plugins/misc/qtip/jquery.qtip.css', array(), '2.09' );
	wp_enqueue_style( 'wizard-css', get_template_directory_uri() . '/plugins/forms/smartWizzard/smart_wizard.css', array(), '2.09' );
	wp_enqueue_style( 'togglebutton-css', get_template_directory_uri() . '/plugins/forms/togglebutton/toggle-buttons.css', array(), '2.09' );
	wp_enqueue_style( 'select2-css', get_template_directory_uri() . '/plugins/forms/select/select2.css', array(), '2.09' );
	wp_enqueue_style( 'data-tables-css', get_template_directory_uri() . '/plugins/tables/dataTables/jquery.dataTables.css', array(), '2.09' );

	// Loads the Internet Explorer specific stylesheet.
	//wp_enqueue_style( 'twentythirteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentythirteen-style' ), '2013-07-18' );
	//wp_style_add_data( 'twentythirteen-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'gestionale_scripts_styles' );

// !REGISTRO LE SIDEBAR

function g_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'gestionale' ),
		'id'            => 'main_sidebar',
		'description'   => __( 'Sidebar principale del gestionale.', 'gestionale' ),
		'before_widget' => '<div id="%1$s" class="%2$s sidebar-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="title">',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Dashboard', 'gestionale' ),
		'id'            => 'dashboard',
		'description'   => __( 'Dashboard del gestionale.', 'gestionale' ),
		'before_widget' => '<div id="%1$s" class="%2$s box gradient">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title"><h4>',
		'after_title'   => '</h4></div>',
	) );

}
add_action( 'widgets_init', 'g_widgets_init' );

/* !REGISTRO I MENU */
register_nav_menus( array(
	'gestionale_header' => 'Header Menu',
) );

// !nascondo la admin bar
add_filter('show_admin_bar', '__return_false');

// !REGISTRO I POST STATUS
function gestionale_post_status(){
	register_post_status( 'preventivo', array(
		'label'                     => _x( 'Preventivo', 'gestionale' ),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => _n_noop( 'Preventivo <span class="count">(%s)</span>', 'Preventivi <span class="count">(%s)</span>' ),
	) );
	
	register_post_status( 'ordine', array(
		'label'                     => _x( 'Ordine', 'gestionale' ),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => _n_noop( 'Ordine <span class="count">(%s)</span>', 'Ordini <span class="count">(%s)</span>' ),
	) );
	
	register_post_status( 'fatturato', array(
		'label'                     => _x( 'Fatturato', 'gestionale' ),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => _n_noop( 'Fatturato <span class="count">(%s)</span>', 'Fatturati <span class="count">(%s)</span>' ),
	) );
	
}
add_action( 'init', 'gestionale_post_status' );