<?php
/*

************** FUNZIONI AJAX GESTIONALE
************** 1. ITEM
************** 2. ELENCO
************** 3. DATA TABLES

*/

/*

************* 1. ITEM

*/


function Item_Add(){  
	
	$className = $_POST['post_type'];
	$new_item = new $className;
	$new_item -> popola( $_POST );
	$new_item -> salva();
	
	echo json_encode( $new_item );

	die();
}  

add_action( 'wp_ajax_nopriv_Item_Add', 'Item_Add' );  
add_action( 'wp_ajax_Item_Add', 'Item_Add' );

/*

************* 2. ELENCO

*/

function Utenti_Elenco(){  
	
	//$users = get_users('blog_id=1&orderby=nicename&role=subscriber');
	$users = get_users('orderby=display_name');
	
	$return = array();
	
    foreach ($users as $user):
        $return[] = array( 'ID' => $user->ID, 'display_name' => $user->display_name );
    endforeach;

	echo json_encode( $return );

	die();
}  

add_action( 'wp_ajax_nopriv_Utenti_Elenco', 'Utenti_Elenco' );  
add_action( 'wp_ajax_Utenti_Elenco', 'Utenti_Elenco' );

/*

************* 3. DATA TABLES

*/

function dataTables() {
	
	// @PARAMS REQUIRED
	// $_POST['post_type']
	// $_POST['item_class']
	// $_POST['fields'] : definisce le colonne della tabella
	
	// @PARAMS OPTIONAL
	// $_POST['args'] : argomenti da passare al class init
	// $_POST['var'] : aggiunge il parametro var e passa il relativo valore
	
	//$className = $_POST['item_class'];
	$Elenco = isset($_POST['item_class']) ? new $_POST['item_class'] : new Elenco( $_POST['post_type'] );
	$args = isset($_POST['args']) ? $_POST['args'] : array();
	$elenco = $Elenco -> fetchAll( $args );
	
	$return = array();
	$return['aaData'] = $elenco;
	$return['iTotalRecords'] = count($elenco);
	$return['sEcho'] = $params['sEcho'] ? $params['sEcho'] : 1;
	
	$vars = isset($_POST['var']) ? $_POST['var'] : array();
	foreach( $vars as $k => $v ):
		$return[$k] = $v;
	endforeach;
	
	echo json_encode($return);
	die();
	
}
add_action( 'wp_ajax_nopriv_dataTables', 'dataTables' );  
add_action( 'wp_ajax_dataTables', 'dataTables' );