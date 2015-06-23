<?php
/*
 * The Footer widget areas.
 */
?>

<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'first-footer-widget'  )
		&& ! is_active_sidebar( 'second-footer-widget' )
		&& ! is_active_sidebar( 'third-footer-widget'  )
		&& ! is_active_sidebar( 'fourth-footer-widget' )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>

<?php if ( is_active_sidebar( 'first-footer-widget' ) ) : ?>
	<div class="col_4"><?php dynamic_sidebar( 'first-footer-widget' ); ?></div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'second-footer-widget' ) ) : ?>
	<div class="col_4"><?php dynamic_sidebar( 'second-footer-widget' ); ?></div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'third-footer-widget' ) ) : ?>
	<div class="col_4"><?php dynamic_sidebar( 'third-footer-widget' ); ?></div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'fourth-footer-widget' ) ) : ?>
	<div class="col_4 omega"><?php dynamic_sidebar( 'fourth-footer-widget' ); ?></div>
<?php endif; ?>