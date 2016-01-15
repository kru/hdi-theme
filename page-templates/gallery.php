<?php
/*
 * Template Name: Gallery
 * Description: Page template for HDI product
*/
?>
<?php get_header(); ?> 
	
	<div class="container">
	<p class="gal-container">
	 	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

			<?php the_content(); ?>

		<?php endwhile; endif; ?>
	</p>
	</div>
	
<?php get_footer(); ?>  