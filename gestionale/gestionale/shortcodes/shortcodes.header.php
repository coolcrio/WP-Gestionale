<?php

function header_widget_messaggi_func($atts) {

     ?>
		   <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="icon16 icomoon-icon-mail-3"></span>Messaggi 
                    <?php   $messaggi_non_letti = new Stat();
                            $messaggi_non_letti = $messaggi_non_letti->messaggiNonLetti();
                            if( $messaggi_non_letti ){ ?><span class="notification"><?=$messaggi_non_letti?></span><?php } ?>
                </a>
                <ul class="dropdown-menu">
                    <li class="menu">
                        <ul class="messages">    
                            <li class="header"><strong>Messaggi</strong> <?=$messaggi_non_letti?> messaggi</li>
                            
                            <?php foreach( $messaggi_non_letti as $k => $v ): ?>
                            <li>
                               <span class="icon"><span class="icon16 icomoon-icon-user-3"></span></span>
                                <span class="name"><a data-toggle="modal" href="#myModal1"><strong>Sammy Morerira</strong></a><span class="time">35 min ago</span></span>
                                <span class="msg">I have question about new function ...</span>
                            </li>
                            <?php endforeach; ?>
                            
                            <li class="view-all"><a href="/messaggi">Vedi tutti i messaggi <span class="icon16 icomoon-icon-arrow-right-8"></span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>
     
     <?
     
}

add_shortcode('header_widget_messaggi', 'header_widget_messaggi_func');


function header_widget_logout_func($atts) {

     ?>
		   <li><a href="<?=wp_logout_url('/')?>"><span class="icon16 icomoon-icon-exit"></span> Logout</a></li>
     
     <?
     
}

add_shortcode('header_widget_logout', 'header_widget_logout_func');

function header_widget_notifiche_func($atts) {

     ?>
			<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="icon16 icomoon-icon-bell-2"></span><span class="notification">3</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="menu">
                        <ul class="notif">
                            <li class="header"><strong>Notifiche</strong></li>
                            <li>
                                <a href="#">
                                    <span class="icon"><span class="icon16 icomoon-icon-user-3"></span></span>
                                    <span class="event">Joe si &egrave; registrato</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon"><span class="icon16 icomoon-icon-comments-4"></span></span>
                                    <span class="event">Joe ha aperto un ticket</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon"><span class="icon16 icomoon-icon-new-2"></span></span>
                                    <span class="event">Joe ha richiesto un preventivo</span>
                                </a>
                            </li>
                            <li class="view-all"><a href="#">Vedi tutte le notifiche <span class="icon16 icomoon-icon-arrow-right-8"></span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>
<?
     
}

add_shortcode('header_widget_notifiche', 'header_widget_notifiche_func');

function header_widget_profilo_func($atts) {

     ?>
		   <li class="dropdown">
	            <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
	                <?=user_data('avatar')?>
	                <span class="txt"><?=user_data('user_firstname').' '.user_data('user_lastname')?></span>
	                <b class="caret"></b>
	            </a>
	            <ul class="dropdown-menu">
	                <li class="menu">
	                    <ul>
	                        <li>
	                            <a href="#"><span class="icon16 icomoon-icon-user-3"></span>Edit profile</a>
	                        </li>
	                        <li>
	                            <a href="#"><span class="icon16 icomoon-icon-comments-2"></span>Approve comments</a>
	                        </li>
	                        <li>
	                            <a href="#"><span class="icon16 icomoon-icon-plus-2"></span>Add user</a>
	                        </li>
	                    </ul>
	                </li>
	            </ul>
	        </li>
     
     <?
     
}

add_shortcode('header_widget_profilo', 'header_widget_profilo_func');