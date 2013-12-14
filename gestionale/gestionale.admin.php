<?php

require('gestionale-admin/admin-bar.php');


// create theme settings menu
add_action('admin_menu', 'gestionale_admin_create_menu');

function gestionale_admin_create_menu() {

	//create new top-level menu
	add_menu_page('Gestionale', 'Gestionale', 'administrator', 'gestionale-admin', 'gestionale_admin_settings_page', get_template_directory_uri().'/images/admin-icon.png');

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}


function register_mysettings() {
	//register our settings
	register_setting( 'gestionale-settings-group', 'top_right_header' );
	register_setting( 'gestionale-settings-group', 'some_other_option' );
	register_setting( 'gestionale-settings-group', 'option_etc' );
	register_setting( 'gestionale-style-group', 'gestionale_logo' );
}

function gestionale_admin_tabs( $current = 'homepage' ) {
    $tabs = array( 
				    'main' => 'Generali', 
				    'style' => 'Style',
				 );

    echo '<div class="icon32" style="margin-top:20px"><img src="'.get_template_directory_uri().'/images/admin-icon-large.png'.'"/></div>';
    echo '<h1 style="color:#34759E; margin-top:30px">Impostazioni Gestionale</h1>';
    
    echo '<h2 class="nav-tab-wrapper" style="margin-top:30px">';
    foreach( $tabs as $tab => $name ):
        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
        echo "<a class='nav-tab$class' href='?page=gestionale-admin&tab=$tab'>$name</a>";

    endforeach;
    echo '</h2>';
    
    require('gestionale-admin/'.$current.'.php');
}

function gestionale_admin_settings_page() {
	
	if ( isset ( $_GET['tab'] ) ): 
		gestionale_admin_tabs($_GET['tab']); 
	else:
		gestionale_admin_tabs('main');
	endif;
	
}