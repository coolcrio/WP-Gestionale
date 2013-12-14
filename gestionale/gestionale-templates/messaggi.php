<?php
/*
Template Name: Messaggi
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main" style="min-height:1000px">

			<?=get_template_part('heading')?>
            
            <div class="row-fluid">

                        <div class="span4">
                            <div class="box gradient">

                                <div class="title">
                                    <h4>
                                        <span class="icon16 icomoon-icon-users"></span>
                                        <span>Recent users</span>
                                    </h4>
                                </div>
                                <div class="content noPad">
                                    <ul class="recent-users">
                                        <li class="clearfix">
                                            <span class="avatar">
                                                <img src="images/avatar2.jpeg" alt="avatar">
                                            </span>

                                            <a href="#" class="name"><strong>Lazar</strong></a>
                                            <div class="action">
                                                <a href="#" class="btn btn-mini">Profile</a>
                                                <a href="#" class="btn btn-mini">Send PM</a>
                                            </div>
                                            <div class="status">
                                                <span class="label label-success">Online</span>
                                                <small>23 seconds ago</small>
                                            </div>
                                            <a href="#" class="email">info@somemail.com</a>
                                        </li>
                                        <li class="clearfix">
                                            <span class="avatar">
                                                <span class="icon32 icomoon-icon-user-3 gray"></span>
                                            </span>

                                            <a href="#" class="name"><strong>SuggeElson</strong></a>
                                            <div class="action">
                                                <a href="#" class="btn btn-mini">Profile</a>
                                                <a href="#" class="btn btn-mini">Send PM</a>
                                            </div>
                                            <div class="status">
                                                <span class="label label-success">Online</span>
                                                <small>2 minutes ago</small>
                                            </div>
                                            <a href="#" class="email">info@somemail.com</a>
                                        </li>
                                        <li class="clearfix">
                                            <span class="avatar">
                                                <span class="icon32 icomoon-icon-user-3 gray"></span>
                                            </span>

                                            <a href="#" class="name"><strong>Jonny</strong></a>
                                            <div class="action">
                                                <a href="#" class="btn btn-mini">Profile</a>
                                                <a href="#" class="btn btn-mini">Send PM</a>
                                            </div>
                                            <div class="status">
                                                <span class="label label-important">Offline</span>
                                                <small>1 hour ago</small>
                                            </div>
                                            <a href="#" class="email">info@somemail.com</a>
                                        </li>
                                        <li class="clearfix">
                                            <span class="avatar">
                                                <span class="icon32 icomoon-icon-user-3 gray"></span>
                                            </span>

                                            <a href="#" class="name"><strong>Julia</strong></a>
                                            <div class="action">
                                                <a href="#" class="btn btn-mini">Profile</a>
                                                <a href="#" class="btn btn-mini">Send PM</a>
                                            </div>
                                            <div class="status">
                                                <span class="label label-success">Online</span>
                                                <small>21 hours ago</small>
                                            </div>
                                            <a href="#" class="email">info@somemail.com</a>
                                        </li>
                                        <li class="clearfix">
                                            <span class="avatar">
                                                <span class="icon32 icomoon-icon-user-3 gray"></span>
                                            </span>

                                            <a href="#" class="name"><strong>Mickey</strong></a>
                                            <div class="action">
                                                <a href="#" class="btn btn-mini">Profile</a>
                                                <a href="#" class="btn btn-mini">Send PM</a>
                                            </div>
                                            <div class="status">
                                                <span class="label label-important">Offline</span>
                                                <small>2 days ago</small>
                                            </div>
                                            <a href="#" class="email">info@somemail.com</a>
                                        </li>
                                        <li class="clearfix">
                                            <span class="avatar">
                                                <span class="icon32 icomoon-icon-user-3 gray"></span>
                                            </span>

                                            <a href="#" class="name"><strong>Rayan Faith</strong></a>
                                            <div class="action">
                                                <a href="#" class="btn btn-mini">Profile</a>
                                                <a href="#" class="btn btn-mini">Send PM</a>
                                            </div>
                                            <div class="status">
                                                <span class="label label-important">Offline</span>
                                                <small>1 week ago</small>
                                            </div>
                                            <a href="#" class="email">info@somemail.com</a>
                                        </li>
                                    </ul>
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span4 -->

                        <div class="span8">
                            
                            <div class="box gradient">
                                <div class="title">
                                    <h4>
                                        <span class="icon16 icomoon-icon-comments-15"></span>
                                        
                                        <input type="text" id="conversazione" class="span8 text" autocomplete="off" placeholder="Nome conversazione"/>
                                        
                                    </h4>
                                </div>
                                <div class="content noPad">

                                    <ul class="messages">
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

                                        <li class="sendMsg">
                                            <form class="form-horizontal" action="#">
                                                <textarea class="elastic uniform" id="textarea" rows="1" placeholder="Enter your message ..." style="width:98%;"></textarea>
                                                <input type="text" name="destinatario" id="destinatario" class="span8 text ui-autocomplete-input" autocomplete="off" />
                                                <input type="hidden" name="id_destinatario" id="id_destinatario" />
                                                <button type="submit" class="btn btn-info marginT10">Send message</button>
                                            </form>
                                        </li>
                                        
                                    </ul>

                                </div>

                            </div>

                        </div><!-- End .span8 -->
                        
                    </div>
            

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>

<script>
$('document').ready(function(){
	
	$.ajax({
          url: "/wp-admin/admin-ajax.php",
          type: "POST",
          data: {
            action: 'Utenti_Elenco'
          },
          success: function( data ) {
            
            var autocomplete_data = [];
            
            jQuery.map( JSON.parse(data), function( item ) {
              autocomplete_data.push({
                label: item.display_name,
                value: item.ID
              });
            });
            
            $( "#destinatario" ).autocomplete({
		      source: autocomplete_data,
		      select: function( event, ui ) {
		        // clicked = ui.item
		        // input = this
		        if( ui.item ){
			        $(this).val(ui.item.label);
			        $('#id_destinatario').val( ui.item.value );
			        $('#destinatario').autocomplete('close');
			        event.preventDefault();
			    }
		      }
		    });
            
          }
        });

});
</script>