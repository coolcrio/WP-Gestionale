<?php

function form_corse_crea_func($atts) {
     //return "foo = {$atts[foo]}";

     ?>
     
     <form class="form-horizontal" method="post" action="#">
     
     <div class="row-fluid">

        <div class="span6">

            <div class="box">

                <div class="title">

                    <h4> 
                        <span>Dati cliente</span>
                    </h4>
                    
                </div>
                <div class="content">
                     
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="normal">Normal field</label>
                                    <input name="pippo" class="span8 text" id="normalInput" type="text">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row row-fluid">
	                        <div class="span12">
	                            <div class="row-fluid">
	                                <label class="form-label span4" for="appendedInputButton">Append with button</label>
	                                <div class="input-append">
	                                    <input class="span8 text" id="appendedInputButton" size="16" type="text"><button class="btn" type="button">Controlla</button>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
						
                </div>

            </div><!-- End .box -->

        </div><!-- End .span6 -->
        
        <div class="span6">

            <div class="box">

                <div class="title">

                    <h4> 
                        <span>Dati corsa</span>
                    </h4>
                    
                </div>
                <div class="content">
                     
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="normal">Normal field</label>
                                    <input name="ciccio" class="span8 text" id="normalInput" type="text">
                                </div>
                            </div>
                        </div>
						
						
                 
                </div>

            </div><!-- End .box -->

        </div><!-- End .span6 -->
       

    </div>
    
    <div class="row-fluid">
	    
	    <div class="span12">
	    
		    <div class="form-actions">
		       <button type="submit" class="btn btn-danger">Save changes</button>
		       <button type="button" class="btn">Cancel</button>
		    </div>
	    
	    </div>
	
	</div>
    
    </form>
     
     <?
     
}

add_shortcode('form_corse_crea', 'form_corse_crea_func');