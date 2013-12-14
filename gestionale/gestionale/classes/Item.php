<?php

class Item {
	
	protected $post_type = 'post';
	
	public $ID = false;
	public $post_title = "Nuovo post";
	public $post_content = "Post content";
	public $post_status = 'publish';
	public $comment_status = 'closed';
	public $post_author = null;
	public $post_date = null;
	public $post_parent = null;
	
	function __construct( $ID = false ) {
       
       $classname = strtolower(get_class($this));
       $this->post_type = $classname != 'item' ? $classname : 'post';
       
       if( $ID ):
	       
	       $this->ID = $ID;
	       
	       $post = get_post( $ID );
	       
	       $this->post_title = $post->post_tile;
	       $this->post_content = $post->post_content;
	       $this->post_status = $post->post_status;
	       $this->comment_status = $post->comment_status;
	       $this->post_author = $post->post_author;
	       $this->post_date = $post->post_date;
	       $this->post_parent = $post->post_parent;
	       
	   endif;
       
       if( !is_null($this->stored) && $ID ):
	       foreach( $this->stored as $prop => $values ):
		       $this->{$prop} = $this->ID ? get_post_meta( $this->ID, $prop, true ) : NULL;
	       endforeach;
       endif;
       
   }
   
   function popola( $POST ){
	   
	   foreach( $POST as $k => $v ):
		   if( !is_null($this->{$k}) ) $this->{$k} = $v;
	   endforeach;
	   
   }
   
   function salva() {
		
		if( !isset($this->ID) || $this->ID==0 || !$this->ID ):
			
			global $user_ID;
			
			$new_post = array(
				'post_title' => $this->post_title,
				'post_content' => $this->post_content,
				'post_status' => $this->post_status,
				'comment_status' => $this->comment_status,
				'post_date' => date('Y-m-d H:i:s'),
				'post_author' => $user_ID,
				'post_type' => $this->post_type,
				'post_category' => array(0),
				'post_parent' => $this->post_parent
			);
			
			$new_post = apply_filters('gestionale_aggiungi_item', $new_post);
			$new_post = apply_filters('gestionale_aggiungi_'. strtolower(get_class($this)), $new_post);
			
			$post_id = wp_insert_post($new_post);
			$this->ID = $post_id;
		
		else:
		
			$upd_post = array(
				'ID' => $this->ID,
				'post_title' => $this->post_title,
				'post_content' => $this->post_content,
				'post_status' => $this->post_status,
				'comment_status' => $this->comment_status,
				'post_date' => date('Y-m-d H:i:s'),
				'post_author' => $user_ID,
				'post_type' => $this->post_type,
				'post_category' => array(0),
				'post_parent' => $this->post_parent
			);
			
			$upd_post = apply_filters('gestionale_aggiorna_item', $upd_post);
			$upd_post = apply_filters('gestionale_aggiorna_'. strtolower(get_class($this)), $upd_post);
			
			wp_update_post( $upd_post );
			
		endif;
		
		foreach( $this->stored as $prop => $values ):
	       update_post_meta( $this->ID, $prop, $this->{$prop} );
		endforeach;
		
		return $this->ID;
   }
	
}