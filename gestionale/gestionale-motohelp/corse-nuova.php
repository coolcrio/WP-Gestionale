<?php
/*
Template Name: Corse - Aggiungi corsa
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main" style="min-height:1000px">

			<?=get_template_part('heading')?>
            
            <div class="span8">
            
            <div class="box gradient">

                <div class="title">

                    <h4>
                        <span>Aggiungi una corsa</span>
                    </h4>

                </div>
                <div class="content noPad clearfix">
                   <!-- Smart Wizard -->
                    <div id="wizard" class="swMain vertical">
                        <ul>
                            <li>
                                <a href="#step-1">
                                    <label class="stepNumber">1</label>
                                    <span class="stepDesc">
                                       Dati ritiro
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-2">
                                    <label class="stepNumber">2</label>
                                    <span class="stepDesc">
                                       Dati consegna
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-3">
                                    <label class="stepNumber">3</label>
                                    <span class="stepDesc">
                                        Dati mezzo
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-4">
                                    <label class="stepNumber">4</label>
                                    <span class="stepDesc">
                                       Dettagli corsa
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div id="step-1">   
                            
                            <h3>Dati ritiro</h3>
                                   
                                    <form class="form-horizontal" action="#">
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="appendedInputButton">Codice utente
	                                                    <span class="help-block">Per popolare i campi</span>
                                                    </label>
                                                    <div class="input-append">
                                                        <input class="span8 text" id="appendedInputButton" size="16" type="number"><button class="btn" type="button">Popola</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Nome</label>
                                                    <input class="span8 text" id="normalInput1" type="text">
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">
                                                        Cognome
                                                        <span class="help-block">Da utilizzare per le officine</span>
                                                    </label>
                                                    <input class="span8 text" id="normalInput1" type="text">
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        <div class="form-row row-fluid">
	                                        <div class="span12">
	                                            <div class="row-fluid">
	                                                <label class="form-label span4" for="normal">
	                                                    Referente ritiro
	                                                    <span class="help-block">Specificare se diverso</span>
	                                                </label>
	                                                <input class="span8 text" id="normalInput1" type="text">
	                                            </div>
	                                        </div> 
	                                    </div>
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="appendedInputButton">Indirizzo email</label>
                                                    <div class="input-append span8">
                                                        <input class="span9 text" id="appendedInputButton" size="16" type="text"><button class="btn" type="button">Controlla</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="appendedInputButton">Numero cellulare</label>
                                                    <div class="input-append input-prepend span8">
                                                        <span class="add-on span2"><span class="icomoon-icon-mobile-2"></span></span>
                                                        <input class="span7 text" id="appendedInputButton" size="16" type="text">
                                                        <button class="btn" type="button">Controlla</button>
                                                    </div>
                                                    
                                                    <span class="help-block blue span8">Esiste gi&agrave; un utente con questo numero!</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="appendedInputButton">Numero fisso</label>
                                                    <div class="input-append input-prepend span8">
                                                        <span class="add-on span2"><span class="icomoon-icon-phone"></span></span>
                                                        <input class="span7 text" id="appendedInputButton" size="16" type="text">
                                                        <button class="btn" type="button">Controlla</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Indirizzo</label>
	                                                <div class="span8 details">
	                                                    <div class="input-prepend span12">
		                                                    <span class="add-on span2"><span class="iconic-icon-map-pin-fill"></span></span>
		                                                    <input class="span10 text geocomplete" id="prependedInput" size="16" type="text">
		                                                </div>
		                                                <div class="input-prepend span12 marginT10">
		                                                    <span class="add-on span2">
			                                                    <span class="icomoon-icon-compass-2"></span>
			                                                </span>
		                                                    <input class="span5 text marginR10" data-geo="lat" readonly="readonly" size="16" type="text"/>
		                                                    <input class="span5 text" data-geo="lng" readonly="readonly" size="16" type="text"/>
		                                                </div>
		                                                <div class="input-prepend span12 marginT10">
			                                                <span class="add-on span2"><span class="icomoon-icon-map-2"></span></span>
		                                                    <input data-geo="formatted_address" readonly="readonly" class="span10 text" size="16" type="text"/>
		                                                </div>
		                                                <div class="input-prepend span12 marginT10">
			                                                <span class="add-on span3">Comune</span>
		                                                    <input data-geo="locality" readonly="readonly" class="span9 text" size="16" type="text"/>
		                                                </div>
		                                                <div class="input-prepend span12 marginT10">
			                                                <span class="add-on span3">Provincia</span>
		                                                    <input data-geo="administrative_area_level_2" readonly="readonly" class="span9 text" size="16" type="text"/>
		                                                </div>
		                                                <div class="input-prepend span12 marginT10">
			                                                <span class="add-on span3">CAP</span>
		                                                    <input data-geo="postal_code" readonly="readonly" class="span9 text" size="16" type="text"/>
		                                                </div>
		                                                <div class="input-prepend span12 marginT10">
			                                                <span class="add-on span3">Regione</span>
		                                                    <input data-geo="administrative_area_level_1" readonly="readonly" class="span9 text" size="16" type="text"/>
		                                                </div>

		                                            </div>

                                                </div>
                                                
                                                <div class="form-row row-fluid">
			                                        <div class="span12">
			                                            <div class="row-fluid">
			                                                <label class="form-label span4" for="normal">Ritiro chiavi</label>
			                                                <div class="iToggle-button-simple">
					                                            <input type="checkbox" class="nostyle">
					                                        </div>
			                                            </div>
			                                        </div> 
			                                    </div>
                                                
                                            </div> 
                                        </div>                                                                               

                                    </form>
                                 
                        </div>
                        
                        <div id="step-2">
	                        
	                        <h3>Dati consegna</h3>
                                   
                                <form class="form-horizontal" action="#">
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="appendedInputButton">Codice utente
                                                    <span class="help-block">Per popolare i campi</span>
                                                </label>
                                                <div class="input-append">
                                                    <input class="span8 text" id="appendedInputButton" size="16" type="number"><button class="btn" type="button">Popola</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Nome</label>
                                                <input class="span8 text" id="normalInput1" type="text">
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">
                                                    Cognome
                                                    <span class="help-block">Da utilizzare per le officine</span>
                                                </label>
                                                <input class="span8 text" id="normalInput1" type="text">
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">
                                                    Referente ritiro
                                                    <span class="help-block">Specificare se diverso</span>
                                                </label>
                                                <input class="span8 text" id="normalInput1" type="text">
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="appendedInputButton">Indirizzo email</label>
                                                <div class="input-append span8">
                                                    <input class="span9 text" id="appendedInputButton" size="16" type="text"><button class="btn" type="button">Controlla</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="appendedInputButton">Numero cellulare</label>
                                                <div class="input-prepend span8">
                                                    <span class="add-on span2"><span class="icomoon-icon-mobile-2"></span></span>
                                                    <input class="span10 text" id="prependedInput" size="16" type="text"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="appendedInputButton">Numero fisso</label>
                                                <div class="input-prepend span8">
                                                    <span class="add-on span2"><span class="icomoon-icon-phone"></span></span>
                                                    <input class="span10 text" id="prependedInput" size="16" type="text"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Indirizzo</label>
                                                <div class="span8 details2">
                                                    <div class="input-prepend span12">
	                                                    <span class="add-on span2"><span class="iconic-icon-map-pin-fill"></span></span>
	                                                    <input class="span10 text geocomplete2" id="prependedInput" size="16" type="text">
	                                                </div>
	                                                <div class="input-prepend span12 marginT10">
	                                                    <span class="add-on span2">
		                                                    <span class="icomoon-icon-compass-2"></span>
		                                                </span>
	                                                    <input class="span5 text marginR10" data-geo="lat" readonly="readonly" size="16" type="text"/>
	                                                    <input class="span5 text" data-geo="lng" readonly="readonly" size="16" type="text"/>
	                                                </div>
	                                                <div class="input-prepend span12 marginT10">
		                                                <span class="add-on span2"><span class="icomoon-icon-map-2"></span></span>
	                                                    <input data-geo="formatted_address" readonly="readonly" class="span10 text" size="16" type="text"/>
	                                                </div>
	                                                <div class="input-prepend span12 marginT10">
		                                                <span class="add-on span3">Comune</span>
	                                                    <input data-geo="locality" readonly="readonly" class="span9 text" size="16" type="text"/>
	                                                </div>
	                                                <div class="input-prepend span12 marginT10">
		                                                <span class="add-on span3">Provincia</span>
	                                                    <input data-geo="administrative_area_level_2" readonly="readonly" class="span9 text" size="16" type="text"/>
	                                                </div>
	                                                <div class="input-prepend span12 marginT10">
		                                                <span class="add-on span3">CAP</span>
	                                                    <input data-geo="postal_code" readonly="readonly" class="span9 text" size="16" type="text"/>
	                                                </div>
	                                                <div class="input-prepend span12 marginT10">
		                                                <span class="add-on span3">Regione</span>
	                                                    <input data-geo="administrative_area_level_1" readonly="readonly" class="span9 text" size="16" type="text"/>
	                                                </div>

	                                            </div>

                                            </div>
                                            
                                        </div> 
                                    </div>                                                                               

                                </form>
	                        
                        </div>
                           
                        <div id="step-3">
                            
                            <h3>Dati mezzo</h3>
                                   
                                <form class="form-horizontal" action="#">
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Marca</label>
                                                <div class="input-prepend span8">
                                                    <span class="add-on span2"><span aria-hidden="true" class="icomoon-icon-factory"></span></span>
                                                    <input class="span10 text" id="prependedInput" size="16" type="text">
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Modello</label>
                                                <div class="input-prepend span8">
                                                    <span class="add-on span2"><span aria-hidden="true" class="icomoon-icon-bike"></span></span>
                                                    <input class="span10 text" id="prependedInput" size="16" type="text">
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Cilindrata</label>
                                                <input class="span8 text" id="prependedInput" type="number"/>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Colore</label>
                                                <input class="span8 text" id="normalInput1" type="text">
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Targa</label>
                                                <input class="span8 text" id="normalInput1" type="text">
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Stato ruote</label>
                                                <div class="iToggle-button">
		                                            <input type="checkbox" checked="checked" class="nostyle">
		                                        </div>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                </form>
                        </div>                      
                        
                        <div id="step-4">
	                        
	                        <h3>Dettagli corsa</h3>
                                   
                                <form class="form-horizontal" action="#">
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Data chiamata</label>
                                                <input type="text" name="combined-picker" class="combined-picker span8" value="" />
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Data prenotazione</label>
                                                <input type="text" name="combined-picker" class="combined-picker span8" value="" />
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Ritiro entro il</label>
                                                <input type="text" name="combined-picker" class="combined-picker span8" value="" />
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Consegna entro il</label>
                                                <input type="text" name="combined-picker" class="combined-picker span8" value="" />
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Data ritiro</label>
                                                <input type="text" name="combined-picker" class="combined-picker span8" value="" />
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Data consegna</label>
                                                <input type="text" name="combined-picker" class="combined-picker span8" value="" />
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Pagamento</label>
                                                <div class="iToggle-button-pagamento">
		                                            <input type="checkbox" checked="checked" class="nostyle">
		                                        </div>
                                            </div>
                                        </div> 
                                    </div> 
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Omaggio</label>
                                                <div class="iToggle-button-simple">
		                                            <input type="checkbox" class="nostyle">
		                                        </div>
                                            </div>
                                        </div> 
                                    </div> 
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Pagato</label>
                                                <div class="iToggle-button-simple">
		                                            <input type="checkbox" class="nostyle">
		                                        </div>
                                            </div>
                                        </div> 
                                    </div>                                                                            

                                </form>
	                        
                        </div>

                    </div><!-- End SmartWizard Content --> 
                       
                </div>

            </div>
            
            </div>

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
						<h4><span>Riepilogo</span></h4>
	                </div>

					<div class="content clearfix">
						<div class="row-fluid">
							<span class="span6">Stato corsa</span>
							<span class="span6">
								<span class="label label-warning">Preventivo</span>
							</span>
						</div>
						<div class="row-fluid">
							<span class="span6">In evidenza</span>
							<span class="span6">
								<div class="iToggle-button-simple">
	                                <input type="checkbox" class="nostyle">
	                            </div>
							</span>
						</div>
					</div>

                </div>

				<div class="box gradient">
					
					<div class="title">
						<h4><span>Preventivo</span></h4>
	                </div>
	                <!-- promozioni -->
					<div class="content clearfix">
						Applica promozione
						<div class="row-fluid">
							<select class="nostyle select2 span12">
								<option>Nessuna</option>
								<option>Promozione Agosto</option>
							</select>
						</div>
					</div>
					<!-- #promozioni -->
					
					<!-- prezzo -->
					<div class="content clearfix">
						<div class="input-append row-fluid" style="text-align:right">
                            <input class="text span6" value="49" style="text-align:right" id="appendedInput" type="number"><span class="add-on">.00</span>
                        </div>
					</div>
					<!-- #prezzo -->
					
				</div>
				
				<div class="box gradient">
					<div class="title">
						<h4><span>Note ordine</span></h4>
	                </div>
					<div class="content">
						<div class="row-fluid">
							<textarea class="span12 elastic uniform" id="textarea1" rows="3" style="overflow: hidden; height: 88px;"></textarea>
						</div>
					</div>
				</div>

			</div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>

<script>
$('document').ready(function(){
	
	$('.iToggle-button').toggleButtons({
	    width: 240,
	    label: {
	        enabled: "<span class='icon16 minia-icon-unlocked white'></span> Sbloccate",
	        disabled: "<span class='icon16 minia-icon-locked white marginL5'></span> Bloccate"
	    }
	});
	
	$('.iToggle-button-simple').toggleButtons({
	    width: 100,
	    label: {
	        enabled: "<span class='icon16 icomoon-icon-checkmark white'></span>",
	        disabled: "<span class='icon16 icomoon-icon-cancel-3 white marginL5'></span>"
	    }
	});
	
	$('.iToggle-button-pagamento').toggleButtons({
	    width: 240,
	    label: {
	        enabled: "<span class='icon16 icomoon-icon-exit white'></span> Destinarario",
	        disabled: "<span class='icon16 icomoon-icon-enter white marginL5'></span> Mittente"
	    }
	});
	
	if ($('textarea').hasClass('elastic')) {
		$('.elastic').elastic();
	}
	
	if($('.combined-picker').length) {
		$('.combined-picker').datetimepicker();
	}
	
	$("input.geocomplete").geocomplete({
		map: "#mappa",
		details: ".details",
		detailsAttribute: "data-geo"
	});
	
	$("input.geocomplete2").geocomplete({
		details: ".details2",
		detailsAttribute: "data-geo"
	}).bind("geocode:result", function(event, result){
	    console.log(result);
	    
	    var myLatlng = new google.maps.LatLng( result.geometry.location.ob , result.geometry.location.pb );
		
		var map = $("input.geocomplete").geocomplete("map");
		
		// To add the marker to the map, use the 'map' property
		var marker = new google.maps.Marker({
		    position: myLatlng,
		    map: map,
		    title:"Hello World!"
		});

	  });
	
	$('#wizard').smartWizard({
  		transitionEffect: 'fade', // Effect on navigation, none/fade/slide/
  		enableAllSteps: true,
  		//onLeaveStep:leaveAStepCallback,
        //onFinish:onFinishCallback
    });

    function leaveAStepCallback(obj){
        var step = obj;
        step.find('.stepNumber').stop(true, true).remove();
        step.find('.stepDesc').stop(true, true).before('<span class="stepNumber"><span class="icon16 iconic-icon-checkmark"></span></span>');
        return true;
    }
    function onFinishCallback(obj){
    	var step = obj;
    	step.find('.stepNumber').stop(true, true).remove();
        step.find('.stepDesc').stop(true, true).before('<span class="stepNumber"><span class="icon16 iconic-icon-checkmark"></span></span>');
      	$.pnotify({
			type: 'success',
		    title: 'Done',
    		text: 'You finish the wizzard',
		    icon: 'picon icon16 iconic-icon-check-alt white',
		    opacity: 0.95,
		    history: false,
		    sticker: false
		});
    }
	
});
</script>