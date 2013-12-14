<?php

function redirect($url){
	echo "<script>location.href = '".$url."';</script>";
}

function is_dashboard(){
	$template = get_post_meta( get_the_ID(), '_wp_page_template', TRUE );
    return ($template == 'templates/dashboard.php');
}

function get_breadcrumb() {
 
	global $post;
	
	$divider = '<span class="icon16 icomoon-icon-arrow-right-2"></span>';
 
	$trail = '<ul class="breadcrumb">
                        <li>'.__('Sei qui','gestionale').':</li>
                        <li>
                            <a href="#" class="tip" oldtitle="back to dashboard" title="" data-hasqtip="true">
                                <span class="icon16 icomoon-icon-screen-2"></span>
                            </a> 
                            <span class="divider">'.$divider.'</span>
                        </li>';
                        
	$page_title = get_the_title($post->ID);
 
	if($post->post_parent) {
		$parent_id = $post->post_parent;
 
		while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a> '.$divider.' </li> ';
			$parent_id = $page->post_parent;
		}
 
		$breadcrumbs = array_reverse($breadcrumbs);
		foreach($breadcrumbs as $crumb) $trail .= $crumb;
	}
 
	$trail .= '<li class="active">'.$page_title.'</li>';
	$trail .= '</ul>';
 
	return $trail;	
 
}

function user_data( $field = false ){
	
	global $current_user;
	
	get_currentuserinfo();
	
	if( $field ):
		if( $field == 'avatar' ) return get_avatar( $current_user->ID, 20 );
		return $current_user->$field;
	endif;
	
	return $current_user;
	
}