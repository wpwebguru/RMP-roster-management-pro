<?php

/**
 * Plugin Name: Roster Management Pro
 * Description: Roster Management Plugin. Shortcodes: <code>[RMP_Management]</code>
 * Version: 1.2.4
 * Plugin URI: https://github.com/wpwebguru
 * Author: Mirza
 * Author URI: https://github.com/wpwebguru
 */
 
 if ( !defined( 'ABSPATH' ) ) {
		die;
	}

	define( 'RMP_VERSION', '1.0.0' );
	define( 'RMP_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
	define( 'RMP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
	
	
	// File include
	include RMP_PLUGIN_PATH . 'inc/backend/RMP_Menu_Func.php';
	include RMP_PLUGIN_PATH . 'inc/frontend/RMP_Management.php';
	
	
	
	
	
	// Stylesheet and Script for Backend
	add_action('admin_enqueue_scripts', 'RMP_admin_scripts');	
	function RMP_admin_scripts() {
		
		wp_register_style('bootstrap_css', plugins_url('assets/backend/css/bootstrap.min.css', __FILE__));
		wp_enqueue_style('bootstrap_css');
		
		wp_register_style('custom_css', plugins_url('assets/backend/css/custom.css', __FILE__));
		wp_enqueue_style('custom_css');
		
		wp_enqueue_script('jquery');
		
		wp_register_script('bootstrap_js', plugins_url('assets/backend/js/bootstrap.min.js', __FILE__), array('jquery'));
		wp_enqueue_script('bootstrap_js');
		
	}
	
	// Stylesheet and Script for Frontend
	add_action('wp_enqueue_scripts', 'RMP_frontend_script');	
	function RMP_frontend_script() {
		
		wp_register_style('bootstrap_css', plugins_url('assets/frontend/css/bootstrap.min.css', __FILE__));
		wp_enqueue_style('bootstrap_css');
		
		wp_register_style('custom_css', plugins_url('assets/frontend/css/custom.css', __FILE__));
		wp_enqueue_style('custom_css');
		
		wp_enqueue_script('jquery');
		
		wp_register_script('bootstrap_js', plugins_url('assets/frontend/js/bootstrap.min.js', __FILE__), array('jquery'));
		wp_enqueue_script('bootstrap_js');
		
		wp_register_script('jquery_js', plugins_url('assets/frontend/js/jquery-1.11.1.min.js', __FILE__), array('jquery'));
		wp_enqueue_script('jquery_js');
		
	}
	
	
	
	
	
		/* =========================================================
				Dynamically create table Function
			========================================================== */
	register_activation_hook(__FILE__,'custom_plugin_tables');
 	function custom_plugin_tables(){
		require RMP_PLUGIN_PATH . 'inc/backend/RMP_database.php';
	}
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	