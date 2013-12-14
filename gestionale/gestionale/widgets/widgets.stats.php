<?php
 
 
class GestionaleStatsWidget extends WP_Widget
{
  function GestionaleStatsWidget()
  {
    $widget_ops = array('classname' => 'GestionaleStatsWidget', 'description' => 'Statistiche del gestionale' );
    $this->WP_Widget('GestionaleStatsWidget', 'Gestionale - Statistiche', $widget_ops);
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
    $title = empty($instance['title']) ? 'Statistiche ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;
 
    ?>
            <div class="content">
                <div class="rightnow">
                    <ul class="unstyled">
                        <li><span class="number">2</span><span class="icon16 eco-help"></span>Informazioni</li>
                        <li><span class="number">7</span><span class="icon16 eco-pencil-2"></span>Preventivi</li>
                    </ul>
                </div>
            </div>
    <?
    
    echo $after_widget;
    if( $size != '' ) echo '</div>';
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("GestionaleStatsWidget");') );?>