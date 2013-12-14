<?php
/*
Plugin Name: Random Post Widget
Plugin URI: http://jamesbruce.me/
Description: Random Post Widget grabs a random post and the associated thumbnail to display on your sidebar
Author: James Bruce
Version: 1
Author URI: http://jamesbruce.me/
*/
 
 
class RandomPostWidget extends WP_Widget
{
  function RandomPostWidget()
  {
    $widget_ops = array('classname' => 'RandomPostWidget', 'description' => 'Widget di prova' );
    $this->WP_Widget('RandomPostWidget', 'Gestionale - Widget di prova', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE
    ?>
	    <div class="content">
            <span class="icon16 icomoon-icon-loop left"></span>
            <div class="progress progress-mini progress-danger left tip" oldtitle="87%" title="" data-hasqtip="true" aria-describedby="qtip-4">
              <div class="bar" style="width: 87%;"></div>
            </div>
            <span class="percent">87%</span>
            <div class="stat">194.00 / 220</div>
        </div>
    <?
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("RandomPostWidget");') );?>