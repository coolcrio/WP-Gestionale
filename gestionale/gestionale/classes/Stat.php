<?php

	class Stat extends Elenco {
		
		public $funzioni_badge = array(
									array('func' => 'messaggiNonLetti', 'label' => 'Messaggi non letti')
								);
		
		public function messaggiNonLetti(){
			
			$current_user = wp_get_current_user();
			
			$Messaggi = new Elenco('messaggio');
			$param_msg = array(
								'meta_query' => array(
								       array(
								           'key' => 'destinatario',
								           'value' => $current_user->ID
								       )
								 )
							);

			return count( $Messaggi->fetchAll( $param_msg ) );
			
		}
		
	}