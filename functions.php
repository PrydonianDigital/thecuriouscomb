<?php
	
if ( ! isset( $content_width ) )
	$content_width = 940;
	
function conway_hall_init()  {
	remove_action( 'wp_head', 'wp_generator' );
	show_admin_bar( false );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	//add_theme_support( 'jetpack-responsive-videos' );
	set_post_thumbnail_size( 700, 394, true );
	add_image_size( 'carousel', 880, 395, true );
	add_image_size( 'full', 1000, 563, true );
	add_image_size( 'article', 350, 197, false );
	add_image_size( 'speaker', 290, 290, true );
	$defaults = array(
		'default-image'		  => get_template_directory_uri() . '/img/header/header.png',
		'random-default'		 => true,
		'width'				  => 1920,
		'height'				 => 200,
		'flex-height'			=> false,
		'flex-width'			 => false,
		'default-text-color'	 => '',
		'header-text'			=> false,
		'uploads'				=> true,
		'wp-head-callback'	   => '',
		'admin-head-callback'	=> '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $defaults );
	add_editor_style( 'editor-style.css' );	
	$markup = array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', );
	add_theme_support( 'html5', $markup );	
	
}
add_action( 'after_setup_theme', 'conway_hall_init' );

function tcc_scripts() {
	//wp_deregister_script( 'jquery' );
	//wp_register_script( 'jquery', get_template_directory_uri() . '/js/libs/jquery-1.10.1.min.js', false, '1.10.1', true );
	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/libs/modernizr-2.6.2.min.js', false, '2.6.2', false );
	wp_register_script( 'gumby', get_template_directory_uri() . '/js/libs/gumby.js', false, '2.6', true );
	wp_register_script( 'gumby', get_template_directory_uri() . '/js/libs/ui/gumby.retina.js', false, '2.6', true );
	wp_register_script( 'gumbyfixed', get_template_directory_uri() . '/js/libs/ui/gumby.fixed.js', array( 'gumby' ), '2.6', true );
	wp_register_script( 'gumbyskip', get_template_directory_uri() . '/js/libs/ui/gumby.skiplink.js', array( 'gumby' ), '2.6', true );
	wp_register_script( 'gumbytoggle', get_template_directory_uri() . '/js/libs/ui/gumby.toggleswitch.js', array( 'gumby' ), '2.6', true );
	wp_register_script( 'gumbycheck', get_template_directory_uri() . '/js/libs/ui/gumby.checkbox.js', array( 'gumby' ), '2.6', true );
	wp_register_script( 'gumbyradio', get_template_directory_uri() . '/js/libs/ui/gumby.radiobtn.js', array( 'gumby' ), '2.6', true );
	wp_register_script( 'gumbytabs', get_template_directory_uri() . '/js/libs/ui/gumby.tabs.js', array( 'gumby' ), '2.6', true );
	wp_register_script( 'gumbynav', get_template_directory_uri() . '/js/libs/ui/gumby.navbar.js', array( 'gumby' ), '2.6', true );
	wp_register_script( 'gumbyvalidation', get_template_directory_uri() . '/js/libs/ui/jquery.validation.js', array( 'gumby' ), '2.6', true );
	wp_register_script( 'gumbyinit', get_template_directory_uri() . '/js/libs/gumby.init.js', array( 'gumby' ), '2.6', true );
	wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', false, '2.6', true );	wp_enqueue_script( 'jquery' );
	//wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'gumby' );
	wp_enqueue_script( 'gumbyfixed' );
	wp_enqueue_script( 'gumbyskip' );
	wp_enqueue_script( 'gumbytoggle' );
	wp_enqueue_script( 'gumbycheck' );
	wp_enqueue_script( 'gumbyradio' );
	wp_enqueue_script( 'gumbytabs' );
	wp_enqueue_script( 'gumbynav' );
	wp_enqueue_script( 'gumbyvalidation' );
	wp_enqueue_script( 'gumbyinit' );
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'gumby' );

	wp_enqueue_script( 'main' );
}
add_action( 'wp_enqueue_scripts', 'tcc_scripts' );

function tcc_styles() {
	wp_register_style( 'base', get_template_directory_uri() . '/css/base.css', false, '2.6' );
	wp_register_style( 'normalise', get_template_directory_uri() . '/css/normalize.css', false, '3.0.1' );
	wp_enqueue_style( 'normalise' );
	wp_enqueue_style( 'base' );
}
add_action( 'wp_enqueue_scripts', 'tcc_styles' );

function tcc_menu() {
	$locations = array(
		'tccmenu' => __( 'Main Menu', 'tcc' ),
		'footermenu' => __( 'Footer Menu', 'tcc' ),
	);
	register_nav_menus( $locations );
}
add_action( 'init', 'tcc_menu' );

function add_active_class_to_nav_menu($classes) {
	if (in_array('current-menu-item', $classes, true) || in_array('current_page_item', $classes, true)) {
		$classes = array_diff($classes, array('current-menu-item', 'current_page_item', 'active'));
		$classes[] = 'active';
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_active_class_to_nav_menu');

class Walker_Page_Custom extends Walker_Nav_menu{
	function start_lvl(&$output, $depth=0, $args=array()){
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<div class=\"dropdown\"><ul>\n";
	}
	function end_lvl(&$output , $depth=0, $args=array()){
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul></div>\n";
	}
}

function my_text_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Free' :
			$translated_text = __( 'by quotation', 'woocommerce-bookings' );
		break;
		case 'Start Date' :
			$translated_text = __( 'Booking Date', 'woocommerce-bookings' );
		break;
	}
	return $translated_text;
}
add_filter( 'gettext', 'my_text_strings', 20, 3 );

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );
    unset( $tabs['additional_information'] );
    unset( $tabs['reviews'] ); 

    return $tabs;

}