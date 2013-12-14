<?php

	class Elenco {
		
		public $post_type = 'post';
		
		function __construct( $type = false ) {
			
			$classname = strtolower(get_class($this));
			$this->post_type = $classname != 'elenco' ? $classname : 'post';
			
			if( $type ) $this->post_type = $type;
			
		}
		
		public function fetchAll( $args ){
			
			$a = array(
				'post_type' => $this->post_type
			);
			
/*
			'meta_key' => 'age',
			'posts_per_page' => '3',
			'orderby' => 'meta_value_num',
			'order' => 'ASC',
			'meta_query' => array(
		       array(
		           'key' => 'age',
		           'value' => array(3, 4),
		           'compare' => 'IN',
		       )
*/
			
			$q = new WP_Query( array_merge($a, $args) );

			return  $q->found_posts > 0 ? $q->posts : array();
			
		}
		
		
	}