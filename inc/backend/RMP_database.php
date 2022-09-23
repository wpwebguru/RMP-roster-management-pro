<?php
		/* =========================================================
				Dynamically create table Function
			========================================================== */

		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$cst_table_name = $wpdb->prefix . 'rmp_roster_management';
		$sql = "CREATE TABLE `rmp_roster_management` (
									 `id` int(11) NOT NULL AUTO_INCREMENT,
									 `name` varchar(150) NOT NULL,
									 `email` varchar(150) NOT NULL,
									 `leader_position` varchar(150) NOT NULL,
									 `region` varchar(150) NOT NULL,
									 `section` varchar(150) NOT NULL,
									 `branch` varchar(150) NOT NULL,
									 `group` varchar(150) NOT NULL,
									 `start_year` varchar(150) NOT NULL,
									 `end_year` varchar(150) NOT NULL,
									 `img_id` varchar(150) NOT NULL,
									 PRIMARY KEY (`id`)
									) ENGINE=MyISAM DEFAULT CHARSET=latin1"; // How to create this query? follow the tutor.

	
		if ($wpdb->get_var("SHOW TABLES LIKE '$cst_table_name'") != $cst_table_name) {
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
			}
			








