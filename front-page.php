
<?php get_header(); ?>  

<a href=" http://localhost/hdi/?page_id=131 ">
<?php if ( function_exists( 'soliloquy' ) ) { soliloquy( 'main-slider', 'slug' ); } ?>
</a>

<section>
<article class="row">
		<div class="col-lg-12 about">

			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

			<?php the_content(); ?>

			<?php endwhile; endif; ?>
		</div>
</article><!--end About-->

	<!--vision & mission-->
	<article class="row">
		<div class="col-lg-12">
			<p class="text-center"><strong>Vision</strong></p><br>
			<?php 
				$post_id = 33;
				$queried_post = get_post($post_id);
				echo $queried_post->post_content;
			?>
			<br>
					
		<div class="mission-container clearfix">
			<p class="text-center"><strong>Mission</strong></p>
				<ul class="ul-pad">
				<?php 
					$post_id = 35;
					$queried_post = get_post($post_id);
					echo $queried_post->post_content;
				?>
				</ul>
		</div>
		</div>
	</article><!--end vision & mission-->
</section>

	<!--3 images & modal triggers-->
	<div class="row pop-up">
		<div class="col-xs-4 own-box">
			<a href="http://localhost/hdi/?page_id=68" class="thumbnail box-style">
				<img src="<?php print IMAGES; ?>/static-middle.jpg" class="img-responsive img-fixed-height" alt="carpet1">
			</a>
		</div>
		<div class="col-xs-4 own-box">
			<a href="http://localhost/hdi/?page_id=37" class="thumbnail box-style">
				<img src="<?php print IMAGES; ?>/mattress-ticking.jpg" class="img-responsive img-fixed-height" alt="carpet2">
			</a>
		</div>
		<div class="col-xs-4  own-box">
			<a href=" http://localhost/hdi/?page_id=93" class="thumbnail box-style">
				<img src="<?php print IMAGES; ?>/Carpet.jpg" class="img-responsive img-fixed-height" alt="carpet3">
			</a>
		</div>
	</div><!--end 3 images-->

	<section>
		<!--end Contact-->
		<div class="row cont-box">
			<div class="col-xs-6 text-right contact-us" id="section-contact">
				<p class="title-cont"><strong>Contact us</strong></p>
				<?php 
					$post_id = 100;
					$queried_post = get_post($post_id);
					echo $queried_post->post_content;
				?>
			</div>


<?php 

	add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));

	// Function for email address validation
	function isEmail($verify_email) {
	
		return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$verify_email));
	
	}
	
	$error_name = false;
	$error_email = false;
	$error_subject = false;
	
	

	if (isset($_POST['contact-submit'])) {
		// Initialize the variables
		$name = '';
		$email = '';
		$subject = '';
		
				
		// Get the name
		if (trim($_POST['contact-name']) === '') {
			$error_name = true;
		} else {
			$name = trim($_POST['contact-name']);
		}
		
		// Get the email
		if (trim($_POST['contact-email']) === '' || !isEmail($_POST['contact-email'])) {
			$error_email = true;
		} else {
			$email = trim($_POST['contact-email']);
		}

		// Get the subject
		if (trim($_POST['contact-subject']) === '') {
			$error_subject = true;
		} else {
			$subject = stripslashes(trim($_POST['contact-subject']));
		}

		
		
		//captcha plugin
		if ( ( function_exists( 'cptch_check_custom_form' ) && 
			cptch_check_custom_form() !== true ) || ( function_exists( 'cptchpr_check_custom_form' ) && 
			cptchpr_check_custom_form() !== true ) ) echo "<p class='col-xs-6 in-line pad-left'>Please complete the CAPTCHA.</p>";



		// Check if we have errors
		if (!$error_name && !$error_email && !$error_subject) {
			// Get the receiver email from the WP admin panel
			$receiver_email = get_option('admin_email');

			$sender = "An email from $name";
			$body = "You have a new mail from $name." . PHP_EOL . PHP_EOL;
			$body .= "Description: $subject" . PHP_EOL . PHP_EOL;
			$body .= "You can contact $name via email at $email";
			$body .= PHP_EOL . PHP_EOL;
			
			$headers = "From: $email" . PHP_EOL;
			$headers .= "Reply-To: $email" . PHP_EOL;
			$headers .= "MIME-Version: 1.0" . PHP_EOL;
			$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
			$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

			// If all is good, we send the email
			if (wp_mail($receiver_email, $sender, $body, $headers)) {
				$email_sent = true;
			} else {
				$email_sent_error = true;
			}
		}
	}
	
?>	




<?php if (isset($email_sent) && $email_sent == true) : ?>

	<div class="col-xs-6 in-line pad-left">
		<h2 >Success!</h2>
		<p>You have successfully sent the email. We'll get back to you as soon as possible.</p>
	</div>
<?php elseif (isset($email_sent_error) && $email_sent_error == true) : ?>

	<div class="col-xs-6 in-line pad-left">
		<h2>There was an error!</h2>
		<p>Unfortunately, there was an error while trying to send the email. Please<a href="<?php the_permalink(); ?>"> try again.</a></p>
	</div> 

<?php else : ?>

			<!--Form-->
			<div class="col-xs-6 in-line pad-left">
				<form action="<?php the_permalink(); ?>" method="POST" class="login login-action-login form-inline" id="login" novalidate>		
					<div class="form-group col-xs-4">
						<p <?php if ($error_name) echo 'class="has-error"'; ?>>
						<input type="text" class="form-control" id="contact-name" name="contact-name" placeholder="Name" value="<?php if (isset($_POST['contact-name'])) echo $_POST['contact-name']; ?>" />
						</p>
					</div>
					<div  class="form-group col-xs-4">
						<p <?php if ($error_email) echo 'class="has-error"'; ?>>
						<input type="email" class="form-control" id="contact-email" name="contact-email" placeholder="Email" value="<?php if (isset($_POST['contact-email'])) echo $_POST['contact-email']; ?>" />
						</p>
					</div>					
				<!--</form>-->
			</div>

			<div class="col-xs-6 form-style pad-left">
				<!--<form action="<?php the_permalink(); ?>" method="POST" class="form-inline" novalidate>-->
					<div class="form-group col-xs-8">
						<p <?php if ($error_subject) echo 'class="has-error"'; ?>>
						<textarea type="text" name="contact-subject" id="contact-subject" class="form-control form-style" cols="50" rows="3" placeholder="Subject"><?php if (isset($_POST['contact-subject'])) echo $_POST['contact-subject']; ?></textarea>
						</p>
					</div>	
				<!--</form>-->
			</div>

			<div class="col-xs-6 form-style">
				<!--<form class="form-inline" action="<?php the_permalink(); ?>" method="POST" novalidate>-->
					<div class="form-group col-xs-3 col-xs-offset-2">
						
							<!-- Captcha Plugin -->
							<?php if( function_exists( 'cptch_display_captcha_custom' ) ) { 
								echo "<input type='hidden' name='cntctfrm_contact_action' value='true' />"; 
								echo cptch_display_captcha_custom(); } 
								if( function_exists( 'cptchpr_display_captcha_custom' ) ) { 
								echo "<input type='hidden' name='cntctfrm_contact_action' value='true' />"; 
								echo cptchpr_display_captcha_custom(); } ?>

						
						
					</div>

					<div class="col-xs-2">
								<input type="hidden" id="contact-submit" name="contact-submit" value="true"/>
								<input type="submit" class="btn btn-primary" value="Send"/>
					</div>
				</form>
			</div><!--end Form-->
<?php endif; ?>	
		</div><!--end Contact Wrapper-->
	</section>





<?php get_footer(); ?>  




