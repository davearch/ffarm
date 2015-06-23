<?php
/*
 * Template Name: Contact Page
 * Description: A Page Template with Contact Form
 */
?>

<?php

if(isset($_POST['submitted'])) {
	if(trim($_POST['contactName']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}

	if(trim($_POST['email']) === '')  {
		$emailError = 'Please enter a valid email address.';
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(trim($_POST['comments']) === '') {
		$commentError = 'Please enter your message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}
	
	if(trim($_POST['phone']) !== '') {
		if(function_exists('stripslashes')) {
			$phone = stripslashes(trim($_POST['phone']));
		} else {
			$phone = trim($_POST['phone']);
		}
	}

	if(!isset($hasError)) {
		$emailTo = $smof_data['bnk_email'];
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = '[Message] From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nPhone: $phone \n\nComments: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}

} ?>
<?php get_header(); ?>

	<!-- CONTAINER BEGIN -->
	<div class="container"> 

		<!-- PAGE TITLE BEGIN -->
		<div class="row"><div class="col_16">
			<h1 class="page-title replace">
				<?php the_title(); ?>
			</h1>
		</div></div>
		<!-- PAGE TITLE END -->
		
		<!-- PAGE CONTENT BEGIN -->
		<div class="page-content row">
			<div class="col_16">
			
				<!-- MODULE BEGIN -->
				<section class="module">
					<?php if (function_exists('bnk_breadcrumbs')) bnk_breadcrumbs(); ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                      <?php get_template_part( 'content', 'page' ); ?>
                    <?php endwhile; // end of the loop. ?>
                    
                    <div class="col_two"> 
                    	
                        
						<?php if(isset($emailSent) && $emailSent == true) { ?>
                            <p class="success"><strong><?php if ( $smof_data['bnk_msg_success'] != '') { echo $smof_data['bnk_msg_success']; } else { _e( 'Your message has been sent.', 'bhinneka' ); } ?></strong></p>
                        <?php } else { ?>
                            
                        <?php if(isset($hasError) || isset($captchaError)) { ?>
                            <p class="error"><strong><?php if ( $smof_data['bnk_msg_fail'] != '') { echo $smof_data['bnk_msg_fail']; } else { _e( 'Sorry, an error occured while sending your message.', 'bhinneka' );  } ?> </strong><p>
                        <?php } ?>
                    
                        <!-- FORM BEGIN -->
                        <form action="<?php the_permalink(); ?>" id="contacform" method="post">
                            <div class="form_field">
                                <label for="contactName"><?php _e( 'Name*:', 'bhinneka' ); ?></label>
                                <input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField text"  />
                                <?php if($nameError != '') { ?>
                                    <strong><span class="error"><?php $nameError; ?></span></strong>
                                <?php } ?>
                            </div>
                        
                            <div class="form_field">
                                <label for="email"><?php _e( 'Email*:', 'bhinneka' ); ?></label>
                                <input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email text" size="44" />
                                <?php if($emailError != '') { ?>
                                    <strong><span class="error"><?php $emailError; ?></span></strong>
                                <?php } ?>
                            </div>
                            
                            <div class="form_field">
                                <label for="phone"><?php _e( 'Phone:', 'bhinneka' ); ?></label>
                                <input type="text" name="phone" id="phone" value="<?php if(isset($_POST['phone']))  echo $_POST['phone'];?>" class="phone text" size="44" />
                            </div>
                        
                            <div class="form_field">
                                <label for="commentsText"><?php _e( 'Message*:', 'bhinneka' ); ?></label>
                                <textarea name="comments" id="commentsText" rows="8" cols="34" class="required requiredField textarea"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
                                <?php if($commentError != '') { ?>
                                    <strong><span class="error"><?php $commentError; ?></span></strong>
                                <?php } ?>
                            </div>
                            <div class="form_field">
                                <input type="submit" class="btn primary" id="submit" value="<?php _e( 'Send Message', 'bhinneka' ); ?>"/>
                            </div>
                            <input type="hidden" name="submitted" id="submitted" value="true" />
                        </form>
                        <!-- FORM END -->
                    
                        <?php } ?>			
                    </div>
                    
                    <div class="col_two omega">
                        <?php if(get_post_meta($post->ID, 'map', true) && get_post_meta($post->ID, 'map-api', true) ): ?> 
                            <a href="<?php echo get_post_meta($post->ID, 'map', true); ?>" target="_blank">
                            <img src="<?php echo get_post_meta($post->ID, 'map-api', true); ?>" alt="map"/>
                            </a>
                        <?php endif; ?>                        
						<?php if(get_post_meta($post->ID, 'address', true)): ?>
                            <p><?php echo get_post_meta($post->ID, 'address', true); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="clear"></div>
                    
				</section>
				<!-- MODULE END -->
                
			</div>			
		</div>
		<!-- PAGE CONTENT END -->
		
	</div>
	<!-- CONTAINER END -->
<?php get_footer(); ?>