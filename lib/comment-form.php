<?php
$aria_req = ( $req ? " aria-required='true'" : '' );

$comment_args = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
    'author' => '<p class="comment-form-author ">' .
                '<label for="author">' . __( 'Name', 'bhinneka' ) .
				( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
                '<input id="author" name="author" type="text" value="' .
                esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />' .
                '</p><!-- #form-section-author .form-section -->',
    'email'  => '<p class="comment-form-email ">' .
                '<label for="email">' . __( 'Email', 'bhinneka' ) .
				( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
                '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' .
		'</p><!-- #form-section-email .form-section -->',
    'url'    => '' ) ),
    'comment_field' => '<div class="clear"></div><p class="comment-form-comment">' .
                '<label for="comment">' . __( 'Message:', 'bhinneka' ) . '</label>' .
                '<br/><textarea id="comment" name="comment" cols="80" rows="7" aria-required="true"></textarea>' .
                '</p><!-- #form-section-comment .form-section -->',
    'comment_notes_after' => '',
);
comment_form($comment_args); ?>