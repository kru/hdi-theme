<?php
/*
 * Template Name: Feedback True
 * Description: Page template for HDI product
*/
?>

<?php get_header(); ?>


<?php 
	$post_id = 104;
	$queried_post = get_post($post_id);
	echo $queried_post->post_content;
?>

<?php get_footer(); ?> 