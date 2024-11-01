<?php
/*
 * Plugin Name: twEasy
 * Version: 1.0.1
 * Description: A quick and easy solution to install a Twitter feed on your website.
 * Author: Theunis Cilliers
 * Author URI: https://digitalreliance.co.za
 * Requires at least: 4.5.0
 * Tested up to: 4.8.1
 *
 * Text Domain: twitterease
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Theunis Cilliers
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Namespace Prefix and other constant(s)
define( 'TE_BASE', 'te_' );

// Load plugin class files
require_once( 'includes/class-twitterease.php' );
require_once( 'includes/class-twitterease-settings.php' );
require_once( 'includes/class-twitterease-widget.php' );

// Load plugin libraries
require_once( 'includes/lib/class-twitterease-admin-api.php' );

// Load vendor libraries
if ( !class_exists( 'Cache' ) ) {
	require_once( 'vendor/cache.class.php' );
}

/**
 * Returns the main instance of TwitterEase to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object TwitterEase
 */
function TwitterEase () {
	$instance = TwitterEase::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = TwitterEase_Settings::instance( $instance );
	}

	return $instance;
}

TwitterEase();
