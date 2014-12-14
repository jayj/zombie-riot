<?php
/**
 * @package    ZombieRiot
 * @author     Jesper Johansen <kontakt@jayj.dk>
 * @copyright  Copyright (c) 2014, Jesper Johansen
 * @link       http://wpthemes.jayj.dk/zombie-saga
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

add_action( 'after_setup_theme', 'zombie_riot_theme_setup' );

/**
 * Theme setup function.  This is where the theme should register things like headers and add its
 * callback functions for action/filter hooks.
 *
 * @since  0.1
 * @access public
 * @return void
 */
function zombie_riot_theme_setup() {

	/*
	 * Add a custom background color to overwrite the default.
	 */
	add_theme_support(
		'custom-background',
		array(
			'default-color' => '212121',
		)
	);

	/*
	 * Add a custom header text color to overwrite the default.
	 */
	add_theme_support(
		'custom-header',
		array(
			'default-text-color' => 'fafafa',
		)
	);

	/*
	 * Add a custom default color for the "menu" color option.
	 */
	add_filter( 'theme_mod_color_menu', 'zombie_riot_color_menu' );

	/*
	 * Add a custom default color for the "primary" color option.
	 */
	add_filter( 'theme_mod_color_primary', 'zombie_riot_color_primary' );

	/*
	 * Enqueue custom styles and scripts.
	 */
	add_action( 'wp_enqueue_scripts', 'zombie_riot_enqueue_scripts' );
}

/**
 * Registers custom fonts for the front end.
 *
 * @since  0.1
 * @access public
 */
function zombie_riot_enqueue_scripts() {
	wp_deregister_style( 'saga-fonts' );

	wp_register_style( 'saga-fonts', '//fonts.googleapis.com/css?family=Oxygen:300,400,700|Playfair+Display:400,700,900,400italic,700italic,900italic' );
}

/**
 * Add a default custom color for the theme's "menu" color option.  Users can overwrite this from the
 * theme customizer, so we want to make sure to check that there's no value before returning our custom
 * color.
 *
 * @since  0.1
 * @access public
 * @param  string  $hex
 * @return string
 */
function zombie_riot_color_menu( $hex ) {
	return $hex ? $hex : '39b54a';
}

/**
 * Add a default custom color for the theme's "primary" color option.  Users can overwrite this from the
 * theme customizer, so we want to make sure to check that there's no value before returning our custom
 * color.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $hex
 * @return string
 */
function zombie_riot_color_primary( $hex ) {
	return $hex ? $hex : '39b54a';
}
