<?php

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main" style="min-height:1000px">

			<?=get_template_part('heading')?>
            
            <div class="span7">
            
	            <div style="margin-bottom: 20px;">
	                <ul id="myTab1" class="nav nav-tabs">
	                    <li class="active"><a href="#home1" data-toggle="tab">Consegne da fare</a></li>
	                    <li id="li-itinerario"><a href="#profile1" data-toggle="tab">Itinerario</a></li>
	                </ul>
	
	                <div class="tab-content" style="padding:0">
	                    <div class="tab-pane fade in active" id="home1">
	                        <div id="mappa-viaggio" style="width:668px; height:600px"></div>
	                    </div>
	                    <div class="tab-pane fade" id="profile1">
	                        <div id="mappa-itinerario" style="width:668px; height:600px"></div>
	                    </div>
	                </div>
	            </div>
	            
	            <div class="box gradient">
                    <div class="title">
						<h4><span>Elenco consegne</span></h4>
	                </div>
                    <div class="content noPad clearfix">
                        <table id="example" class="responsive dynamicTable display table table-bordered dataTable">
						    <thead>
						        <tr>
						            <th>#</th>
						            <th>Comune</th>
						            <th>Provincia</th>
						            <th>Regione</th>
						            <th>Comune</th>
						            <th>Provincia</th>
						            <th>Regione</th>
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
                </div><!-- End .box -->
            
            </div>

			<div class="span4">

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
				
				<div class="box gradient">
					<div class="title">
						<h4><span>Itinerario</span></h4>
	                </div>
					<div class="content">
						<ul id="sortable">
						  <li class="ui-state-default">
							  <span class="icomoon-icon-enter"></span> Roma &rarr; Padova <span class="right brocco-icon-trashcan p_red"></span><br/>
							    <span class="input-prepend">
	                                <span class="add-on"><span class="icomoon-icon-calendar"></span></span>
	                                <input class="combined-picker text span2" style="height:22px" id="prependedInput" type="text"/>
								</span>
								<span class="input-prepend marginL5">
	                                <span class="add-on"><span class="icomoon-icon-truck"></span></span>
	                                <input class="text span1" readonly="readonly" style="height:22px;text-align:right" value="3" type="text"/>
								</span>
						  </li>
						  <li class="ui-state-default">
							  <span class="icomoon-icon-enter"></span> Roma &rarr; Siena <span class="right brocco-icon-trashcan p_red"></span><br/>
							    <span class="input-prepend">
	                                <span class="add-on"><span class="icomoon-icon-calendar"></span></span>
	                                <input class="combined-picker text span2" style="height:22px" id="prependedInput" type="text"/>
								</span>
								<span class="input-prepend marginL5">
	                                <span class="add-on"><span class="icomoon-icon-truck"></span></span>
	                                <input class="text span1" readonly="readonly" style="height:22px;text-align:right" value="2" type="text"/>
								</span>
						  </li>
						  <li class="ui-state-default">
							  <span class="icomoon-icon-enter"></span> Canino &rarr; Varzi <span class="right brocco-icon-trashcan p_red"></span><br/>
							    <span class="input-prepend">
	                                <span class="add-on"><span class="icomoon-icon-calendar"></span></span>
	                                <input class="combined-picker text span2" style="height:22px" id="prependedInput" type="text"/>
								</span>
								<span class="input-prepend marginL5">
	                                <span class="add-on"><span class="icomoon-icon-truck"></span></span>
	                                <input class="text span1" readonly="readonly" style="height:22px;text-align:right" value="1" type="text"/>
								</span>
						  </li>
						  <li class="ui-state-default">
							  <span class="icomoon-icon-exit"></span> Roma &rarr; Siena <span class="right brocco-icon-trashcan p_red"></span><br/>
							    <span class="input-prepend">
	                                <span class="add-on"><span class="icomoon-icon-calendar"></span></span>
	                                <input class="combined-picker text span2" style="height:22px" id="prependedInput" type="text"/>
								</span>
								<span class="input-prepend marginL5">
	                                <span class="add-on"><span class="icomoon-icon-truck"></span></span>
	                                <input class="text span1" readonly="readonly" style="height:22px;text-align:right" value="2" type="text"/>
								</span>
						  </li>
						  <li class="ui-state-default">
							  <span class="icomoon-icon-exit"></span> Canino &rarr; Varzi <span class="right brocco-icon-trashcan p_red"></span><br/>
							    <span class="input-prepend">
	                                <span class="add-on"><span class="icomoon-icon-calendar"></span></span>
	                                <input class="combined-picker text span2" style="height:22px" id="prependedInput" type="text"/>
								</span>
								<span class="input-prepend marginL5">
	                                <span class="add-on"><span class="icomoon-icon-truck"></span></span>
	                                <input class="text span1" readonly="readonly" style="height:22px;text-align:right" value="3" type="text"/>
								</span>
						  </li>
						  <li class="ui-state-default">
							  <span class="icomoon-icon-enter"></span> Varese &rarr; Napoli <span class="right brocco-icon-trashcan p_red"></span><br/>
							    <span class="input-prepend">
	                                <span class="add-on"><span class="icomoon-icon-calendar"></span></span>
	                                <input class="combined-picker text span2" style="height:22px" id="prependedInput" type="text"/>
								</span>
								<span class="input-prepend marginL5">
	                                <span class="add-on"><span class="icomoon-icon-truck"></span></span>
	                                <input class="text span1" readonly="readonly" style="height:22px;text-align:right" value="2" type="text"/>
								</span>
						  </li>
						  <li class="ui-state-default">
							  <span class="icomoon-icon-exit"></span> Roma &rarr; Padova <span class="right brocco-icon-trashcan p_red"></span><br/>
							    <span class="input-prepend">
	                                <span class="add-on"><span class="icomoon-icon-calendar"></span></span>
	                                <input class="combined-picker text span2" style="height:22px" id="prependedInput" type="text"/>
								</span>
								<span class="input-prepend marginL5">
	                                <span class="add-on"><span class="icomoon-icon-truck"></span></span>
	                                <input class="text span1" readonly="readonly" style="height:22px;text-align:right" value="3" type="text"/>
								</span>
						  </li>
						  <li style="background-color:#EB4530" class="white">ROMA</li>
						  <li class="ui-state-default">
							  <span class="icomoon-icon-exit"></span> Varese &rarr; Napoli <span class="right brocco-icon-trashcan p_red"></span><br/>
							    <span class="input-prepend">
	                                <span class="add-on"><span class="icomoon-icon-calendar"></span></span>
	                                <input class="combined-picker text span2" style="height:22px" id="prependedInput" type="text"/>
								</span>
								<span class="input-prepend marginL5">
	                                <span class="add-on"><span class="icomoon-icon-truck"></span></span>
	                                <input class="text span1" readonly="readonly" style="height:22px;text-align:right" value="---" type="text"/>
								</span>
						  </li>
						</ul>
					</div>
				</div>

			</div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>

<style>
#sortable{ list-style: none }
#sortable li{ cursor: move; background-color: #FCFCFC; padding: 5px 10px }
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
    } );
	
	$('.combined-picker').datetimepicker();
	
	$( "#sortable" ).sortable({
      revert: true
    }).find('ul,li').disableSelection();
	
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
	
	var map = new google.maps.Map(document.getElementById("mappa-itinerario"), mapOptions);
	var map2 = new google.maps.Map(document.getElementById("mappa-viaggio"), mapOptions);
	
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
		
		var marker = new google.maps.Marker({
		    position: v,
		    map: map2,
		    icon: (k%2 ? ICONS.VAN.RED : ICONS.MOTO.RED),
		    title:"Hello World!"
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
	
});
</script>