<?php
/*
Template Name: Corse - Urbane
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main" style="min-height:1000px">
		
			<?=get_template_part('heading')?>
            
            <div class="row-fluid">

                        <div class="span12">

                            <div class="box gradient">

                                <div class="title">
                                    <h4>
                                        <span>Data table</span>
                                    </h4>
                                </div>
                                <div class="content noPad clearfix">
                                    
                                    <table id="example" class="responsive dynamicTable display table table-bordered dataTable">
									    <thead>
									        <tr>
									            <th>ID</th>
									            <th>Title</th>
									            <th>Date</th>
									            <th>Data</th>
									        </tr>
									    </thead>
									    <tbody>
									    </tbody>
									</table>
                                    
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span12 -->

                    </div>
            

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>

<script>
$(document).ready(function() {
    
    //--------------- Data tables ------------------//    
    $('#example').dataTable( {
        "bProcessing": true,
        "sAjaxSource": "/wp-admin/admin-ajax.php",
        //"sPaginationType": "full_numbers",
		"bJQueryUI": false,
		"bAutoWidth": false,
		"bLengthChange": false,
		"iDisplayLength": 5,
		"fnInitComplete": function(oSettings, json) {

	    },
        "aoColumns": [
            { "mData": "ID" },
            { "mData": "post_title" },
            { "mData": "post_date", "bSearchable": true, "bVisible": false },
            { "mData": "data" },
        ],
        "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
			
			return nRow;
		},
        "fnServerData": function (sSource, aoData, fnCallback){
                    data = { 
			            "action" : "dataTables", 
			            "post_type" : "ordine",
			            //"fields" : [],
			            //"args" : [],
			            //"var" : {}
			        };
			        
                    $.ajax({
                        "type": "POST",
                        "url": sSource,
                        "data": data,
                        success: function(d) { 
	                        //console.log(JSON.parse(d));
	                        var _data = JSON.parse(d);
		                        $.each( _data.aaData,function(k,row){
			                        
			                        // formatto la data
									var _d = stringToObject( row.post_date );
										row.data = _d.d+' '+__lang.mese[ _d.m ]+' '+_d.y;
			                        
			                        // aggiungo il cancelletto all'ordine
			                        row.ID = '#'+row.ID;
		                        } );
	                        fnCallback( _data ); 
	                    }
                    });
                },
    } );
} );
</script>