<?php
/*
Plugin Name: Random Post Widget
Plugin URI: http://jamesbruce.me/
Description: Random Post Widget grabs a random post and the associated thumbnail to display on your sidebar
Author: James Bruce
Version: 1
Author URI: http://jamesbruce.me/
*/
 
 
class Prova2Widget extends WP_Widget
{
  function Prova2Widget()
  {
    $widget_ops = array('classname' => 'Prova2Widget', 'description' => 'Widget di prova' );
    $this->WP_Widget('Prova2Widget', 'Gestionale - Widget di prova 2', $widget_ops);
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
	
	echo "<div class='span12'>";
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE
    ?>
	   <div class="content" style="padding-bottom:0;">
           <div class="visitors-chart" style="height: 230px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
           <ul class="chartShortcuts">
                <li>
                    <a href="#">
                        <span class="head">Totale corse</span>
                        <span class="number">509</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="head">Corse nazionali</span>
                        <span class="number">309</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="head">Corse urbane</span>
                        <span class="number">109</span>
                    </a>
                </li>
            </ul>
           
        </div>
        
        <script>
        
        function randNum(){ return Math.floor((Math.random()*100)+1); }
        
        chartColours = ["#88bbc8", "#ed7a53", "#9FC569", "#bbdce3", "#9a3b1b", "#5a8022", "#2c7282"];
        
        $(function () {
		//some data
		var d1 = [[1, 3+randNum()], [2, 6+randNum()], [3, 9+randNum()], [4, 12+randNum()],[5, 15+randNum()],[6, 18+randNum()],[7, 21+randNum()],[8, 15+randNum()],[9, 18+randNum()],[10, 21+randNum()],[11, 24+randNum()],[12, 27+randNum()],[13, 30+randNum()],[14, 33+randNum()],[15, 24+randNum()],[16, 27+randNum()],[17, 30+randNum()],[18, 33+randNum()],[19, 36+randNum()],[20, 39+randNum()],[21, 42+randNum()],[22, 45+randNum()],[23, 36+randNum()],[24, 39+randNum()],[25, 42+randNum()],[26, 45+randNum()],[27,38+randNum()],[28, 51+randNum()],[29, 55+randNum()], [30, 60+randNum()]];
		var d2 = [[1, randNum()-5], [2, randNum()-4], [3, randNum()-4], [4, randNum()],[5, 4+randNum()],[6, 4+randNum()],[7, 5+randNum()],[8, 5+randNum()],[9, 6+randNum()],[10, 6+randNum()],[11, 6+randNum()],[12, 2+randNum()],[13, 3+randNum()],[14, 4+randNum()],[15, 4+randNum()],[16, 4+randNum()],[17, 5+randNum()],[18, 5+randNum()],[19, 2+randNum()],[20, 2+randNum()],[21, 3+randNum()],[22, 3+randNum()],[23, 3+randNum()],[24, 2+randNum()],[25, 4+randNum()],[26, 4+randNum()],[27,5+randNum()],[28, 2+randNum()],[29, 2+randNum()], [30, 3+randNum()]];
		//define placeholder class
		var placeholder = $(".visitors-chart");
		//graph options
		var options = {
				grid: {
					show: true,
				    aboveData: true,
				    color: "#3f3f3f" ,
				    labelMargin: 5,
				    axisMargin: 0, 
				    borderWidth: 0,
				    borderColor:null,
				    minBorderMargin: 5 ,
				    clickable: true, 
				    hoverable: true,
				    autoHighlight: true,
				    mouseActiveRadius: 20
				},
		        series: {
		        	grow: {
		        		active: false,
		        		stepMode: "linear",
		        		steps: 50,
		        		stepDelay: true
		        	},
		            lines: {
	            		show: true,
	            		fill: true,
	            		lineWidth: 4,
	            		steps: false
		            	},
		            points: {
		            	show:true,
		            	radius: 5,
		            	symbol: "circle",
		            	fill: true,
		            	borderColor: "#fff"
		            }
		        },
		        legend: { 
		        	position: "ne", 
		        	margin: [0,-25], 
		        	noColumns: 0,
		        	labelBoxBorderColor: null,
		        	labelFormatter: function(label, series) {
					    // just add some space to labes
					    return label+'&nbsp;&nbsp;';
					 }
		    	},
		        yaxis: { min: 0 },
		        xaxis: {ticks:11, tickDecimals: 0},
		        colors: chartColours,
		        shadowSize:1,
		        tooltip: true, //activate tooltip
				tooltipOpts: {
					content: "%s : %y.0",
					shifts: {
						x: -30,
						y: -50
					}
				}
		    };   
	
        	$.plot(placeholder, [ 

        		{
        			label: "Nazionali", 
        			data: d1,
        			lines: {fillColor: "#f2f7f9"},
        			points: {fillColor: "#88bbc8"}
        		}, 
        		{	
        			label: "Urbane", 
        			data: d2,
        			lines: {fillColor: "#fff8f2"},
        			points: {fillColor: "#ed7a53"}
        		} 

        	], options);
	        
    });
        </script>
        
    <?
 
    echo $after_widget;
    echo "</div>";
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("Prova2Widget");') );?>