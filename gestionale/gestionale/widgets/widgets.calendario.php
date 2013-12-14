<?php
 
 
class GestionaleCalendarioWidget extends WP_Widget
{
  function GestionaleCalendarioWidget()
  {
    $widget_ops = array('classname' => 'GestionaleCalendarioWidget', 'description' => 'Mostra un calendario' );
    $this->WP_Widget('GestionaleCalendarioWidget', 'Gestionale - Calendario', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'size' => '' ) );
    $title = $instance['title'];
    $size = $instance['size'];
    
    $SIZES = array(
	    '' => 'auto',
	    'span2' => '2',
	    'span4' => '4',
	    'span6' => '6',
	    'span8' => '8',
	    'span10' => '10',
	    'span12' => '12',
    );
    
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('size'); ?>">Size: <select class="widefat" id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>">
	  <?php foreach( $SIZES as $s => $label ):?>
	  <option value="<?=$s?>" <?=$s==$size?'selected':''?>><?=$label?></option>
	  <?php endforeach; ?>
  </select></label></p>
  
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['size'] = $new_instance['size'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
	
	$size = empty($instance['size']) ? '' : $instance['size'];
	//$before_widget = str_replace('gradient', 'plain', $before_widget);
	
	if( $size != '' ) echo '<div class="'.$size.'">';
	
    echo $before_widget;
    $title = empty($instance['title']) ? 'Calendario	 ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;
 
    ?>
            <div class="content noPad">
                <div id="calendario"></div>
            </div>
    <?
    
    echo $after_widget;
    if( $size != '' ) echo '</div>';
    
  }
 
}

function calendario_script() { ?>
	<script>
	  $('document').ready(function(){
		  $('#calendario').datepicker({
		        inline: true,
				showOtherMonths:true
		    });
	  });
	</script>
<?php }

add_action( 'wp_footer', 'calendario_script' );
add_action( 'widgets_init', create_function('', 'return register_widget("GestionaleCalendarioWidget");') );?>