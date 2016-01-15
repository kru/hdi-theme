<?php get_header(); ?>  



<!--jumbotron-->
	<div class="jumbotron">
	<div class="container-fluid">
	<!--Carousel-->
	<div class="carousel slide" id="carousel-example-generic" data-ride="carousel">
		<!--Indicators Carousel-->
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>

		<!--Carousel Wrapper-->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="<?php print IMAGES; ?>/static-top-images.png" class="img-responsive center-block" alt="<?php bloginfo('name'); ?>">
				<div class="carousel-caption">
					
				</div>

			</div>

			<div class="item">
				<img src="<?php print IMAGES; ?>/main-images2.png" class="img-responsive center-block" alt="<?php bloginfo('name'); ?>">
				<div class="carousel-caption">
					
				</div>
			</div>

			<div class="item">
				<img src="<?php print IMAGES; ?>/main-image3.png" class="img-responsive center-block" alt="<?php bloginfo('name'); ?>">
				<div class="carousel-caption">
					
				</div>
			</div>

		<!--Controls-->
		<a href="#carousel-example-generic" class="left carousel-control" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>

		<a href="#carousel-example-generic" class="right carousel-control" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		</div><!--end Carousel Wrapper-->
			
		</div><!--end carousel-->
	</div><!--end container-fluid-->
	</div><!--end jumbotron-->


<?php get_footer(); ?>  