<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title('•', true, 'right'); ?><?php bloginfo('name'); ?> • <?php bloginfo('description'); ?></title>
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
</head>

<body <?php body_class(); ?>>

<div class="header" role="banner">
	<div class="row">
		<div class="twelve columns">
			<h1 class="logo"><a href="<?php bloginfo( 'url' ); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/img/header/logo.png" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>" gumby-retina /></a></h1>
		</div>
	</div>
	<div class="row">
		<div class="twelve columns">
			<h2 class="tagline"><?php bloginfo('description'); ?></h2>
		</div>
	</div>
</div>

<div class="row">
	<div class="twelve columns">
		<div class="navbar" id="tccnav" role="navigation">
			<div class="row">
				<a class="toggle" gumby-trigger="#tccnav ul.menu" href="#"><i class="icon-menu"></i></a>
				<?php wp_nav_menu( array( 'theme_location' => 'tccmenu', 'container' => false, 'walker' => new Walker_Page_Custom ) ); ?>
			</div>
		</div>
	</div>
</div>

<div class="row" role="main" id="pageContent">