<?php
/*
 * Template Name: Product Page 2
 * Description: Page template for HDI product
*/
?>
<html> 
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/ajax.css">
</head>
<body>
<div class="wrapper white-background  text-center">
	<div class="img-wrapper">
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<?php the_post_thumbnail('featured-large', array('class' => 'img-size')); ?>
		<?php endwhile; endif; ?>
	</div>

	<div class="inner-wrapper">
		<?php 
			$id=37; 
			$post = get_post($id); 
			$content = apply_filters('the_content', $post->post_content); 
			echo $content;  
		?>
	</div>
	
</div>

</body>
</html>
