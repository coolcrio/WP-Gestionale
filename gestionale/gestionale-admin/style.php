<?php
	wp_enqueue_script('jquery');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
?>

<div class="wrap">

	<form method="post" action="options.php">
	    <?php settings_fields( 'gestionale-style-group' ); ?>
	    <?php do_settings_sections( 'gestionale-style-group' ); ?>
	    <table class="form-table">
	        <tr valign="top">
	        <tr valign="top">
	        <th scope="row">Logo gestionale</th>
	        <td>
	        	<input id="image_location" type="text" name="gestionale_logo" value="<?php echo get_option('gestionale_logo'); ?>" size="50" />
				<input  class="logo-button button" type="button" value="Carica" />
	        </td>
	        </tr>
	    </table>
	    
	    <?php submit_button(); ?>
	
	</form>

</div>

<script>
jQuery(document).ready(function() {
 
    var formfield;
 
    /* user clicks button on custom field, runs below code that opens new window */
    jQuery('.logo-button').click(function() {
        formfield = jQuery(this).prev('input'); //The input field that will hold the uploaded file url
        tb_show('','media-upload.php?TB_iframe=true');
 
        return false;
 
    });
    /*
    Please keep these line to use this code snipet in your project
    Developed by oneTarek http://onetarek.com
    */
    //adding my custom function with Thick box close function tb_close() .
    window.old_tb_remove = window.tb_remove;
    window.tb_remove = function() {
        window.old_tb_remove(); // calls the tb_remove() of the Thickbox plugin
        formfield=null;
    };
 
    // user inserts file into post. only run custom if user started process using the above process
    // window.send_to_editor(html) is how wp would normally handle the received data
 
    window.original_send_to_editor = window.send_to_editor;
    window.send_to_editor = function(html){
        if (formfield) {
            fileurl = jQuery('img',html).attr('src');
            jQuery(formfield).val(fileurl);
            tb_remove();
        } else {
            window.original_send_to_editor(html);
        }
    };
 
});
</script>