<?php
/*
Template Name: Corse - Nazionali
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main" style="min-height:1000px">
		
			<?=get_template_part('heading')?>
            
            <div class="row-fluid">

                        <div class="span9">

                            <div class="box gradient">

                                <div class="title">
                                    <h4>
                                        <span>Corse urbane</span>
                                    </h4>
                                </div>
                                <div class="content noPad clearfix">
                                    
                                    <table id="example" class="responsive dynamicTable display table table-bordered dataTable">
									    <thead>
									        <tr>
									            <th>ID</th>
									            <th>Data</th>
									            <th>Orario</th>
									            <th>Moto</th>
									            <th>Da</th>
									            <th>A</th>
									            <th>Note</th>
									            <th>Autista</th>
									        </tr>
									    </thead>
									    <tbody>
										    <tr>
											    <td>#57</td>
											    <td>2013-11-25</td>
											    <td>9 - 18</td>
											    <td>Triumph Bonneville</td>
											    <td>Piazza Santa Maria Liberatrice 4</td>
											    <td>Via Padre Angelo Paoli 70</td>
											    <td>chiamare 10 min prima</td>
											    <td>Nutella</td>
											</tr>
											<tr>
											    <td>#53</td>
											    <td>2013-11-25</td>
											    <td>15 - 17</td>
											    <td>Ducati Monster</td>
											    <td>Piazza di Villa Carpegna</td>
											    <td>Via Diano Marina 74</td>
											    <td></td>
											    <td></td>
											</tr>
											<tr>
											    <td>#54</td>
											    <td>2013-11-27</td>
											    <td></td>
											    <td>Honda CBR</td>
											    <td>Piazza del Quirinale</td>
											    <td>Via Goffredo Mameli 48</td>
											    <td>vedi note</td>
											    <td>Frank</td>
											</tr>
									    </tbody>
									</table>
                                    
                                </div>

                            </div><!-- End .box -->

                        </div>
                        
                        <!-- SIDEBAR -->
                        
                        <div class="span3">
	                        
	                        <div class="box gradient">
								<div class="title">
									<h4><span>Mappa</span></h4>
				                </div>
								<div class="content noPad clearfix">
									<div id="mappa" style="height:300px"></div>
								</div>
							</div>
							
							<div class="box gradient">
								<div class="title">
									<h4><span>Ordine #53</span></h4>
				                </div>
								<div class="content clearfix">
									
									<dl class="dl-horizontal">
			                            <dt>Referente ritiro</dt>
			                            <dd>Joe Casini</dd>
			                            <dt>Telefono</dt>
			                            <dd>333123456</dd>
			                            <dt>Referente consegna</dt>
			                            <dd>Made in Japan</dd>
			                            <dt>Telefono</dt>
			                            <dd>06123456789</dd>
			                            <dt>Ritiro chiavi</dt>
			                            <dd>Chiara Porcheddu</dd>
			                            <dt>&nbsp;</dt>
			                            <dd>Via fasulla 123</dd>
			                        </dl>
									
									<a class="btn btn-block btn-danger"><span class="icomoon-icon-checkmark-2 white"></span> Consegna</a>
									<a class="btn btn-block"><span class="iconic-icon-new-window"></span>  Modifica ordine</a>
								</div>
							</div>
							
							<?php $widget = new GestionaleBoardWidget();  ?>
							
							<div class="box gradient">
                                <div class="title">
                                    <h4>
                                        <span class="icon16 icomoon-icon-comments-15"></span>
                                        <span>Note ordine</span>
                                    </h4>
                                </div>
								<?php $widget->widget(); ?>
                            </div>
	                        
                        </div>

                    </div>
            

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>

<style>
.dl-horizontal dt{ width: 130px; }
.dl-horizontal dd{ margin-left: 140px; }
</style>

<script>
$(document).ready(function() {
    
    var mapCenter = new google.maps.LatLng(41.879083,12.477011);
    var mapOptions = {
	  zoom: 14,
	  center: mapCenter
	}
	
    var map = new google.maps.Map(document.getElementById("mappa"), mapOptions);
    
    //--------------- Data tables ------------------//    
    $('#example').dataTable( {
        "bProcessing": true,
        "bJQueryUI": false,
		"bAutoWidth": false,
		"bLengthChange": false,
		"iDisplayLength": 15,
		"fnInitComplete": function(oSettings, json) {

	    },
        "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
			
			if(aData[7] == '') $(nRow).attr('class','gradeX');
			
			$(nRow).find('td:eq(4)').on('click',function(){
				var indirizzo = aData[4];
				var geocoder = new google.maps.Geocoder();
					geocoder.geocode({
					    "address": indirizzo+', roma'
					}, function(results) {
					    console.log(results[0].geometry.location); //LatLng
					    map.setCenter( results[0].geometry.location );
					});
			});
			
			$(nRow).find('td:eq(5)').on('click',function(){
				var indirizzo = aData[5];
				var geocoder = new google.maps.Geocoder();
					geocoder.geocode({
					    "address": indirizzo+', roma'
					}, function(results) {
					    console.log(results[0].geometry.location); //LatLng
					    map.setCenter( results[0].geometry.location );
					});
			});
			
			return nRow;
		},
        
    } );
    
} );
</script>