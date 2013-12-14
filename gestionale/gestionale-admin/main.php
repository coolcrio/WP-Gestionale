<div class="wrap">

	<form method="post" action="options.php">
	    <?php settings_fields( 'gestionale-settings-group' ); ?>
	    <?php do_settings_sections( 'gestionale-settings-group' ); ?>
	    <table class="form-table">
	        <tr valign="top">
	        <th scope="row">Mostra nel Top Right Header:</th>
	        <td>
		        <?php $top_right_widgets = array(
											        'messaggi' => 'Messaggi',
											        'notifiche' => 'Notifiche',
											        'profilo' => 'Profilo utente',
											        'logout' => 'Logout'
										        );
				      $top_right_header = get_option('top_right_header');
				      
				      foreach( $top_right_widgets as $k => $label ):
					      echo '<input type="checkbox" '.(in_array($k, $top_right_header)?'checked':'').' name="top_right_header[]" id="trh-'.$k.'" value="'.$k.'" />
						        <label for="trh-'.$k.'">'.$label.'</label> ';
				      endforeach;
				?>
		    </td>
	        </tr>
	         
	        <tr valign="top">
	        <th scope="row">Some Other Option</th>
	        <td><input type="text" name="some_other_option" value="<?php echo get_option('some_other_option'); ?>" /></td>
	        </tr>
	        
	        <tr valign="top">
	        <th scope="row">Options, Etc.</th>
	        <td><input type="text" name="option_etc" value="<?php echo get_option('option_etc'); ?>" /></td>
	        </tr>
	    </table>
	    
	    <?php submit_button(); ?>
	
	</form>

</div>