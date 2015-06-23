<?php
/*
 * The template for displaying Comments.
 */
?>
<!-- COMMENTS BEGIN -->
<div id="comments">

	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'bhinneka' ); ?></p>
	</div><!-- #comments -->
	<?php
			return;
		endif;
	?>

	<?php if ( have_comments() ) : ?>
		<h2 id="comments-title">
			<?php
				printf( _n( 'One comment', '%1$s comments', get_comments_number(), 'bhinneka' ),
					number_format_i18n( get_comments_number() ));
			?>
		</h2>

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'bnk_comment' ) ); ?>
		</ol>
   		<hr class="thin"/>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<?php previous_comments_link( __( '&larr; Older Comments', 'bhinneka' ) ); ?>
		<?php next_comments_link( __( 'Newer Comments &rarr;', 'bhinneka' ) ); ?>
	<?php endif; // check for comment navigation ?>

	<?php
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'bhinneka' ); ?></p>
	<?php endif; ?>
	<?php include 'lib/comment-form.php';  ?>
</div>
<!-- COMMENTS END -->