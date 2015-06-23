<?php
/**
 * The Header for Bhinneka theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 */
 ?>
<?php global $smof_data; ?>
<!DOCTYPE html>

<!--[if IE 6]>
<html id="ie6" class="ie ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> >
<!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php	wp_title( '|', true, 'right' ); ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" >
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


<link rel="profile" href="http://gmpg.org/xfn/11" />

<!-- Stylesheet -->

<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" type="text/css" media="all" />
<![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php
	global $smof_data;
	if ($smof_data['bnk_stylesheet']) { ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/<?php echo $smof_data['bnk_stylesheet']; ?>"/>
<?php }; ?>


<!-- Favicons -->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">

<!-- RSS -->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- HEADER BEGIN -->
<header id="header">
	<div class="container" id="pre-header">
		<div class="row">
			<?php include 'lib/preheader.php';   ?>
		</div>
	</div>
    <!-- MAIN HEADER BEGIN -->
	<div id="main-header" class="row">
		<!-- LOGO BEGIN -->
        <div id="logo" class="col_5">
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="<?php /* Use the default logo (logo.png) if custom logo does not exist */
						if ( $smof_data['bnk_custom_logo']) : echo $smof_data['bnk_custom_logo']; else: bloginfo('template_directory');?>/img/logo.png<?php endif; ?>" alt="logo" />
			</a>
        </div>
		<!-- LOGO END -->

        <div id="sf-nav">
            <!-- PRIMARY NAVIGATION BEGIN -->
	        <div id="nav-wrapper" role="navigation">
				<?php if ( has_nav_menu( 'primary' ) ) { /* if menu 'Primary' menu exists then use Custom Menu */ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'sf-menu' ) ); ?>
				<?php } else { /* else use wp_list_pages */?>
				<ul class="sf-menu">
					<?php wp_list_pages( 'title_li=&depth=2' ); ?>
				</ul>
				<?php } ?>
			</div>
			<!-- PRIMARY NAVIGATION END -->
        </div>
	</div>
    <!-- MAIN HEADER END -->

	<?php if(is_page_template('template-home.php')) { include 'lib/slide-home.php'; } // Get slide if it is Home Page ?>

</header>
<!-- #HEADER END -->