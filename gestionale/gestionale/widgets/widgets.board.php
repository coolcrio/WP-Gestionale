<?php
 
 
class GestionaleBoardWidget extends WP_Widget
{
  function GestionaleBoardWidget()
  {
    $widget_ops = array('classname' => 'GestionaleBoardWidget', 'description' => 'Mostra un board di discussione' );
    $this->WP_Widget('GestionaleBoardWidget', 'Gestionale - Board', $widget_ops);
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
    $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;
      
      $Boards = new Elenco( 'messaggio' );
      $args = array(
	      'posts_per_page' => '3',
	      'orderby' => 'post_date',
	      'order' => 'DESC',
	      'meta_query' => array(
		       array(
		           'key' => 'board',
		           'value' => 1
		       )
			)
      );
      
      $messaggi = $Boards->fetchAll($args);
      asort($messaggi);
 
    ?>
            <div class="content noPad">
                <ul class="messages">
<!--
	                <li class="user clearfix">
	                    <a href="#" class="avatar">
	                        <img src="images/avatar2.jpeg" alt="">
	                    </a>
	                    <div class="message">
	                        <div class="head clearfix">
	                            <span class="name"><strong>Lazar</strong> says:</span>
	                            <span class="time">25 seconds ago</span>
	                        </div>
	                        <p>
	                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	                            tempor incididunt ut labore et dolore magna aliqua.
	                        </p>
	                    </div>
	                </li>
	                <li class="admin clearfix">
	                    <a href="#" class="avatar">
	                        <img src="images/avatar3.jpeg" alt="">
	                    </a>
	                    <div class="message">
	                        <div class="head clearfix">
	                            <span class="name"><strong>Sugge</strong> says:</span>
	                            <span class="time">just now</span>
	                        </div>
	                        <p>
	                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	                            tempor incididunt ut labore et dolore magna aliqua.
	                        </p>
	                    </div>
	                </li>
-->

					<?php foreach( $messaggi as $k => $board ): ?>
					<?php
						$Utente = get_userdata( $board->post_author );
					?>
					<li class="admin clearfix">
	                    <a href="#" class="avatar">
	                        <?php echo get_avatar( $board->post_author, 40 );  ?>
	                    </a>
	                    <div class="message">
	                        <div class="head clearfix">
	                            <span class="name"><strong><?=$Utente->display_name?></strong> dice:</span>
	                            <span class="time"><?=$board->post_date?></span>
	                        </div>
	                        <p>
		                        <?=$board->post_content?>
	                        </p>
	                    </div>
	                </li>
					<?php endforeach; ?>
	
	                <li class="sendMsg">
	                    <form class="form-horizontal" action="#">
	                        <textarea class="elastic uniform" id="textarea" rows="1" placeholder="Inserisci un messaggio..." style="width:98%;"></textarea>
	                        <button type="submit" class="btn btn-danger marginT10">Invia</button>
	                    </form>
	                </li>
	                
	            </ul>
            </div>
            
    <?
    
    echo $after_widget;
    if( $size != '' ) echo '</div>';
    
  }
 
}

function _calendario_script() { ?>
	<script>
	  $('document').ready(function(){
		  
		  var $board_textarea = $('.GestionaleBoardWidget textarea');
		  var $ul_messages = $('.GestionaleBoardWidget ul.messages');
		  
		  $('.GestionaleBoardWidget button[type="submit"]').on('click',function(e){
			 var attr = {};
				 attr.post_content = $board_textarea.val();
				 attr.board = 1;
				 attr.post_type = 'messaggio';
			 var msg = gestionaleAjaxNewItem( attr );
				 console.log( JSON.parse(msg) );
			 
			 $ul_messages.load( location.href+' .GestionaleBoardWidget ul.messages' );
			 e.preventDefault();
		  });
	  });
	</script>
<?php }

add_action( 'wp_footer', '_calendario_script' );
add_action( 'widgets_init', create_function('', 'return register_widget("GestionaleBoardWidget");') );?>