<?php
/*
Template Name: Corse - Aggiungi viaggio
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main" style="min-height:1000px">

			<?=get_template_part('heading')?>
            
            <div class="span7">
            
	            <div style="margin-bottom: 20px;">
	                <ul id="myTab2" class="nav nav-tabs">
	                    <li class="active"><a href="#tab1" data-toggle="tab"><span class="icon16 cut-icon-checkbox-checked"></span> Consegne da fare</a></li>
	                    <li><a href="#tab2" data-toggle="tab"><span class="icon16 icomoon-icon-calendar"></span> Itinerario</a></li>
	                    <li><a href="#tab3" data-toggle="tab"><span class="icon16 icomoon-icon-info-2"></span> Dettaglio viaggio</a></li>
	                </ul>
	
	                <div class="tab-content">
	                    
	                    <div class="tab-pane fade in active" id="tab1">
							<table id="example" class="responsive dynamicTable display table table-bordered dataTable">
							    <thead>
							        <tr>
							            <th>#</th>
							            <th>Da</th>
							            <th></th>
							            <th></th>
							            <th>A</th>
							            <th></th>
							            <th></th>
							            <th>Deadline</th>
							        </tr>
							    </thead>
							    <tbody>
								    <tr>
									    <td>56</td>
									    <td>Roma</td>
									    <td>RM</td>
									    <td>Lazio</td>
									    <td>Padova</td>
									    <td>PD</td>
									    <td>Veneto</td>
									    <td>2013/11/15</td>
								    </tr>
								    <tr>
									    <td>59</td>
									    <td>Roma</td>
									    <td>RM</td>
									    <td>Lazio</td>
									    <td>Siena</td>
									    <td>SI</td>
									    <td>Toscana</td>
									    <td>2013/11/29</td>
								    </tr>
								    <tr>
									    <td>53</td>
									    <td>Varese</td>
									    <td>VA</td>
									    <td>Lombardia</td>
									    <td>Napoli</td>
									    <td>NA</td>
									    <td>Campania</td>
									    <td>2013/12/25</td>
								    </tr>
							    </tbody>
							</table>
	                    </div>
	                    
	                    <div class="tab-pane fade" id="tab2">
							
							<div class="row-fluid">
							
								<div id="external-events" class="span4">
									
									<h4><span class="icomoon-icon-box-remove"></span> Ritiri</h4>
									<div class='external-event'>
										#53 - Varese (VA), Lombardia<br/>
										<span class="minia-icon-calendar-2 white"></span> 2013-12-25
									</div>
									<div class='external-event'>
										#56 - Roma (RM), Lazio<br/>
										<span class="minia-icon-calendar-2 white"></span> 2013-11-15
									</div>
									<div class='external-event'>
										#59 - Roma (RM), Lazio<br/>
										<span class="minia-icon-calendar-2 white"></span> 2013-11-29
									</div>
									
									<h4><span class="icomoon-icon-box-add"></span> Consegne</h4>
									<div class='external-event consegna'>
										#53 - Napoli (NA), Campania<br/>
										<span class="minia-icon-calendar-2 white"></span> 2013-12-25
									</div>
									<div class='external-event consegna'>
										#56 - Padova (PD), Veneto<br/>
										<span class="minia-icon-calendar-2 white"></span> 2013-11-15
									</div>
									<div class='external-event consegna'>
										#59 - Siena (SI), Toscana<br/>
										<span class="minia-icon-calendar-2 white"></span> 2013-11-29
									</div>
									
								</div>
								
								<div id="calendar" class="span8"></div>
							
							</div>

	                    </div>
	                    
	                    <div class="tab-pane fade" id="tab3">
							
							<div class="accordion" id="accordion1">
	                            <div class="accordion-group">
	                              <div class="accordion-heading">
	                                <a class="accordion-toggle" data-toggle="collapse" href="#collapseOne1">
	                                  #53 Varese &rarr; Napoli - Gennaro Capuozzo
	                                </a>
	                              </div>
	                              <div id="collapseOne1" class="accordion-body collapse" style="height: 0px; ">
	                                <div class="accordion-inner">
		                                <table style="width:100%">    
			                                <tr>
				                                <td>
					                                <span class="icomoon-icon-bike"></span> 
					                                <strong>Moto</strong>
					                                Triumph Bonneville T100
					                            </td>
					                            <td>
					                                <span class="brocco-icon-calendar"></span> 
					                                <strong>Consegna entro il</strong> 
					                                2013-11-25
					                            </td>
				                            </tr>
			                             </table>
			                             <hr>
			                             <table style="width:100%">   
			                                <tr>
				                                <td colspan="2">
					                                <span class="icomoon-icon-box-remove"></span> 
					                                <strong>Ritiro</strong> 
					                                Indirizzo, Varese (VA) Lombardia
					                            </td>
				                            </tr>
				                            <tr>
				                                <td colspan="2">
					                                <span class="entypo-icon-user"></span> 
					                                <strong>Referente ritiro</strong>
					                                Francesco Amadori
					                            </td>
				                            </tr>
				                            <tr>
				                                <td>
					                                <span class="brocco-icon-phone"></span> 
					                                <strong>Telefono ritiro</strong>
					                                1234567890
					                            </td>
					                            <td>
					                                <span class="icomoon-icon-mail-2"></span> 
					                                <strong>E-mail ritiro</strong>
					                                <a href="#">nome@cognome.it</a>
					                            </td>
				                            </tr>
				                         </table>
				                         <hr>
				                         <table style="width:100%">   
				                            <tr>
				                                <td colspan="2">
					                                <span class="icomoon-icon-box-add"></span> 
					                                <strong>Consegna</strong>
					                                Indirizzo, Napoli (NA) Campania
					                            </td>
				                            </tr>
				                            <tr>
					                            <td colspan="2">
					                                <span class="entypo-icon-user"></span> 
					                                <strong>Referente consegna</strong> 
					                                Gennaro Capuozzo
					                            </td>
				                            </tr>
				                            <tr>
				                                <td>
					                                <span class="brocco-icon-phone"></span> 
					                                <strong>Telefono consegna</strong>
					                                1234567890
					                            </td>
					                            <td>
					                                <span class="icomoon-icon-mail-2"></span> 
					                                <strong>E-mail consegna</strong>
					                                <a href="#">nome@cognome.it</a>
					                            </td>
				                            </tr>
		                                </table>
		                                
		                                <hr>
		                                
		                                <p class="p_right">
			                                <a class="btn btn-mini"><span class="icomoon-icon-zoom-in-2"></span> Zoom mappa</a> 
			                                <a class="btn btn-mini"><span class="iconic-icon-new-window"></span> Dettaglio ordine</a>
		                                </p>
		                                
	                                </div>
	                              </div>
	                            </div>
	                            <div class="accordion-group">
	                              <div class="accordion-heading">
	                                <a class="accordion-toggle" data-toggle="collapse" href="#collapseTwo2">
	                                  #56 Roma &rarr; Padova - Amedeo Amedei
	                                </a>
	                              </div>
	                              <div id="collapseTwo2" class="accordion-body collapse" style="height: 0px; ">
	                                <div class="accordion-inner">
	                                  &nbsp;
	                                </div>
	                              </div>
	                            </div>
	                            <div class="accordion-group">
	                              <div class="accordion-heading">
	                                <a class="accordion-toggle" data-toggle="collapse" href="#collapseThree3">
	                                  #59 Roma &rarr; Siena - Aristide Leonori
	                                </a>
	                              </div>
	                              <div id="collapseThree3" class="accordion-body collapse" style="height: 0px; ">
	                                <div class="accordion-inner">
	                                 &nbsp;
	                                </div>
	                              </div>
	                            </div>
	                          </div>

	                    </div>
	                    
	                </div>
	            </div>
            
            </div>

			<div class="span4">
                
                <div class="box gradient">
					<div class="title">
						<h4><span>Mappa viaggio</span></h4>
	                </div>
					<div class="content noPad clearfix">
						<div id="mappa-viaggio" style="width:370px; height:350px"></div>
						<div>
							<span class="icomoon-icon-checkbox-unchecked-2"> Itinerario 
							<span class="icomoon-icon-checkbox-2"> Ritiri 
							<span class="icomoon-icon-checkbox-2"> Consegne 
						</div>
					</div>
				</div>
				
				<div class="box gradient">
					<div class="title">
						<h4><span>Info viaggio</span></h4>
	                </div>
					<div class="content clearfix">
						<dl class="dl-horizontal">
                            <dt>Distanza</dt>
                            <dd>1032 km</dd>
                            <dt>Moto ritirate</dt>
                            <dd>4</dd>
                            <dt>Moto consegnate</dt>
                            <dd>3</dd>
                            <dt>Fatturato</dt>
                            <dd>3.200 &euro;</dd>
                            <dt>Costi viaggio</dt>
                            <dd>780 &euro;</dd>
                            <dt>Data inizio</dt>
                            <dd>12/11/2013</dd>
                            <dt>Data fine</dt>
                            <dd>14/11/2013</dd>
                            <dt>Furgone</dt>
                            <dd>Ford Transit A15B3</dd>
                            <dt>Autista</dt>
                            <dd>Nutella</dd>
                        </dl>
					</div>
				</div>

			</div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>

<style>
#external-events {
	padding: 0 10px;
	border: 1px solid #ccc;
	background: #eee;
	text-align: left;
	}
	
#external-events h4 {
	font-size: 16px;
	margin-top: 0;
	padding-top: 1em;
	}
	
.external-event { /* try to mimick the look of a real event */
	margin: 10px 0;
	padding: 2px 4px;
	background: #DC5B41;
	color: #fff;
	font-size: .85em;
	cursor: pointer;
	}

.external-event.consegna {
	background: #333;
}

.external-event.added {
	outline: 1px solid #DC5B41;
	background: #FFF;
	color: #DC5B41;
}

.fc-header-title h2 { color: #DC5B41; }
.fc-view-month td{ vertical-align: top }
</style>

<script>
$('document').ready(function(){
	
	//--------------- Data tables ------------------//    
    $('#example').dataTable( {
        "bProcessing": true,
		"bJQueryUI": false,
		"bAutoWidth": false,
		"bLengthChange": false,
		"iDisplayLength": 5,
		"fnInitComplete": function(oSettings, json) {

	    },
    } ).on('click', 'tr', function(event) {
	  //$('#myTable').fnGetData(this);
	  $(this).css({background:'#E84A34', color:'#fff'});
	});
	
	$('.combined-picker').datetimepicker();
	
	var demo = [];
	var mapCenter = new google.maps.LatLng(41.879083,12.477011);
	demo.push( mapCenter );
	demo.push( new google.maps.LatLng(42.488302,11.753798) );
	demo.push( new google.maps.LatLng(43.347152,11.102858) );
	demo.push( new google.maps.LatLng(44.818864,9.257154) );
	demo.push( new google.maps.LatLng(45.8221,8.777876) );
	demo.push( new google.maps.LatLng(45.377232,11.877394) );
	
	var mapOptions = {
	  zoom: 7,
	  center: mapCenter
	}
	
	var ICONS = {
		
		MOTO : {
			IOS_BLACK : '/wp-content/themes/gestionale/images/icons/map/motorcycle-ios-black.png',
			IOS_RED : '/wp-content/themes/gestionale/images/icons/map/motorcycle-ios-red.png',
			RED : '/wp-content/themes/gestionale/images/icons/map/motorcycle-red.png',
			BLACK : '/wp-content/themes/gestionale/images/icons/map/motorcycle-black.png',
			WHITE : '/wp-content/themes/gestionale/images/icons/map/motorcycle-white.png',
			WHITE_RED : '/wp-content/themes/gestionale/images/icons/map/motorcycle-white-red.png'
		},
		
		VAN : {
			IOS_BLACK : '/wp-content/themes/gestionale/images/icons/map/van-ios-black.png',
			IOS_RED : '/wp-content/themes/gestionale/images/icons/map/van-ios-red.png',
			RED : '/wp-content/themes/gestionale/images/icons/map/van-red.png',
			BLACK : '/wp-content/themes/gestionale/images/icons/map/van-black.png',
			WHITE : '/wp-content/themes/gestionale/images/icons/map/van-white.png',
			WHITE_RED : '/wp-content/themes/gestionale/images/icons/map/van-white-red.png'
		},
		
		REPAIR : {
			IOS_BLACK : '/wp-content/themes/gestionale/images/icons/map/repair-ios-black.png',
			IOS_RED : '/wp-content/themes/gestionale/images/icons/map/repair-ios-red.png',
			RED : '/wp-content/themes/gestionale/images/icons/map/repair-red.png',
			BLACK : '/wp-content/themes/gestionale/images/icons/map/repair-black.png',
			WHITE : '/wp-content/themes/gestionale/images/icons/map/repair-white.png',
			WHITE_RED : '/wp-content/themes/gestionale/images/icons/map/repair-white-red.png'
		}
		
	}
	
	var map = new google.maps.Map(document.getElementById("mappa-viaggio"), mapOptions);
	
	$.each(demo,function(k,v){
		
		var infowindow = new google.maps.InfoWindow({
		      content: '<h4>Corsa #287</h4><span class="icomoon-icon-exit"></span> Roma &rarr; Padova</li>'
		  });
		
		var marker = new google.maps.Marker({
		    position: v,
		    map: map,
		    icon: ICONS.MOTO.IOS_RED,
		    title:"Hello World!"
		});
		
		google.maps.event.addListener(marker, 'click', function() {
		    infowindow.open(map,marker);
		  });
		
	});
	
	var flightPath = new google.maps.Polyline({
	    path: demo,
	    geodesic: true,
	    strokeColor: '#EB4530',
	    strokeOpacity: 1.0,
	    strokeWeight: 2
	  });
	
	  flightPath.setMap(map);
	
	
	/* initialize the external events
		-----------------------------------------------------------------*/
	
		$('#external-events div.external-event').each(function() {
		
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			var t = $.trim($(this).text()).split(' ');
			var eventObject = {
				title: t[0],
				backgroundColor: '#DC5B41',
				textColor: '#fff'
			};
			
			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);
			
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
			
		});
	
	
		/* initialize the calendar
		-----------------------------------------------------------------*/
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: ''
			},
			editable: true,
			droppable: true,
			drop: function(date, allDay) {
				
				$(this).addClass('added');
				
				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');
				
				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);
				
				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;
				
				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
				
			}
		});

	
});
</script>