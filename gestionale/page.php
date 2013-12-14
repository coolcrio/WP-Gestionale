<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main" style="min-height:1000px">

			<div class="heading">

                <h3><?=the_title()?></h3>                    

                <div class="resBtnSearch">
                    <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                </div>

                <div class="search">

                    <form id="searchform" action="search.html">
                        <input type="text" id="tipue_search_input" class="top-search text" placeholder="Search here ...">
                        <input type="submit" id="tipue_search_button" class="search-btn nostyle" value="">
                    </form>
            
                </div><!-- End search -->
                
                <?=get_breadcrumb()?>

            </div>
            
            <?php
			    while ( have_posts() ) : 
				    the_post();
			        the_content();
			    endwhile;
			    wp_reset_query();
		    ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php //get_footer(); ?>