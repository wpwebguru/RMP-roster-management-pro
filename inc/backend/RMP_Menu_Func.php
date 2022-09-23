<?php

 /**
	 * Register main menu page.
	 */
	add_action( 'admin_menu', 'RMP_register_menu_func' );
	function RMP_register_menu_func() {
		
		add_menu_page( 'RMP Roster Management', 'RMP Roster', 'manage_options', 'rmp-roster-management', 'rmp_menu_data_func', 'dashicons-admin-users', 3 );
	}
	function rmp_menu_data_func(){
		require('RMP_all_data.php');
		
	}
	
	/**
	 * Register Add new submenu page.
	 */
	add_action( 'admin_menu', 'RMP_register_sub_menu_func' );
	function RMP_register_sub_menu_func() {
		add_submenu_page( 'rmp-roster-management', 'Add New Board Member', 'Add New', 'manage_options', 'add_new_board-member', 'rmp_sub_menu_data_func');
	   
	}

	function rmp_sub_menu_data_func(){
		require('RMP_add_new.php');
	}
	
	
	/**
	 * Register Settings submenu page.
	 */
	add_action( 'admin_menu', 'RMP_register_settings_func' );
	function RMP_register_settings_func() {
		add_submenu_page( 'rmp-roster-management', 'RMP Roster Management Settings', 'Settings', 'manage_options', 'rmp_settings', 'rmp_settings_func');
	   
	}

	function rmp_settings_func(){
		require('RMP_settings.php');
	}
	
	


















