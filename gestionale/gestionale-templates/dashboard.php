<?php
/*
Template Name: Dashboard
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main" style="min-height:1000px">

			<?=get_template_part('heading')?>
            
            <?php dynamic_sidebar( 'dashboard' ); ?>
            

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>