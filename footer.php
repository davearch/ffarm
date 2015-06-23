<?php
/*
 * The template for displaying the footer.
 */
?>

<!-- FOOTER BEGIN -->
<footer id="footer">
    <div class="container">
        <div class="row">
            <?php	if ( ! is_404() ) get_sidebar( 'footer' ); ?>
        </div>

        <!-- FOOTER WIDGETS END -->
        <div class="row">
            <!-- CREDIT BEGIN -->
            <div class="footer-credit-wrapper">
                <div class="footer-credit seriftype">
                    <span>
                    <?php
                    global $smof_data;
                    if ( $smof_data['bnk_credit'] != "") : echo stripslashes($smof_data['bnk_credit']); else: ?>
                        <a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> Theme by <a href="http://themeforest.net/user/population2/profile?ref=population2" target="_blank">Population 2</a>, designed for <a href="http://themeforest.net/" target="_blank">Themeforest</a>.
                    <?php endif; ?>
                    </span>
                </div>
            </div>
            <!-- CREDIT END -->

            <!-- SROLL TO TOP BEGIN-->
            <?php
            global $smof_data;
            if ( $smof_data['bnk_totop'] == 1) { ?>
                <p id="back-top" class="mobile-hide">
                    <a href="#top">&nbsp;<span></span></a>
                </p>
            <?php } ?>
            <!-- SROLL TO TOP END-->
        </div>
	</div>
</footer>
<!-- FOOTER END -->

<?php wp_footer(); ?>

</body>
</html>